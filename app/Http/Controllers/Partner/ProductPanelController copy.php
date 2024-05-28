<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\CustomerOrder;
use App\Models\User;
use App\Models\CustomerOrderItem;
use App\Models\ShippingAddress;
use App\Models\Country;
use App\Models\ProductShipping;
use Carbon\Carbon;
use Auth;
use App\Liberary\Payment\Stripe;


class ProductPanelController extends Controller
{
  //

  public function search(Request $request)
  {

   
        $brands = Category::pluck('name', 'id');
        $category_id =$request["brand"];
        $searchTerm = $request["product_name"]; 
        $input =$request["price"];
        $minPrice =null;
        $maxPrice =  null;
      
        if (isset($request['price']) && !empty($request['price'])) {
          $input = preg_replace('/[^\d-]+/', '', $input);
          $values = explode('-', $input);
          $minPrice = (int)trim($values[0]);
          $maxPrice =  (int)trim($values[1]);
  
        }


$products = Product::query()
    
    ->when($category_id, function ($query) use ($category_id) {
        // Filter by category
        $query->whereHas('categories', function ($subQuery) use ($category_id) {
            $subQuery->where('category_id', $category_id);
        });
    })

    ->when($searchTerm, function ($query) use ($searchTerm) {
        // Filter by product name
        $query->where('name', 'LIKE', '%' . $searchTerm . '%');
    })
    
    ->when($minPrice || $maxPrice, function ($query) use ($minPrice, $maxPrice) {
        // Filter by product price
        if ($minPrice) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }
    })
    ->get();


    return view('partners.products.search',compact('products','brands'));
  } // End Method


  public function getCategories()
  {
      $categories = Category::all();
      return view('dynamic_dropdown', compact('categories'));
  }

  public function getSubcategories($category)
{
    $subcategories = Subcategory::where('category_id', $category)->get();
    return view('partners.products.subcategories', compact('subcategories'));
}


  public function collection(Category $category,Request $request,$data)
  {

    $products = Product::query();
    
    if($request['data']=="latest" && !empty($request['data'])){
      $products = Product::orderBy('created_at', 'desc')->take(2);
    }
    $products = $products->paginate(6);

    $categories = Category::with('subCategories')->get();
    $categoryID = 1; 
    $category = Category::find($categoryID);
    $subcategories = $category->subCategories;
 
    return view('partners.products.collection',compact('categories','subcategories','products'));
  } // End Method
  public function ViewProduct(Product $product)
  {
    
    $relatedProducts = Product::inRandomOrder()->limit(4)->get();
    return view('partners.products.product_info',["product"=>$product,'relate'=>$relatedProducts]);
  } // End Method
  public function cart()
  {
    return view('partners.products.cart');
  } // End Method
  public function checkout()
  {
    $countries=Country::all();
    $order=CustomerOrder::where('customer_id','=',Auth::user()->id)->first();
    return view('partners.products.checkout',compact('order','countries'));
  } // End Method

  public function addToCart(Request $request)

  {
      $product = Product::findOrFail($request->product_id);
      $cart = session()->get('cart', []);
      if(isset($cart[$request->product_id])) {
          $cart[$request->product_id]['quantity']++;
      } else {

          $cart[$request->product_id] = [

              "name" => $product->name,

              "quantity" => $request->qty,

              "price" => $product->price,

              "image" => $product->image

          ];

      }

        

      session()->put('cart', $cart);

  }

  public function updateCart(Request $request)
    {
      $cart = session()->get('cart');
      if(isset($cart[$request->product_id])) {
        if($request->product_id && $request->qty){
          $cart[$request->product_id]["quantity"] = $request->qty;
        
      }
    } else {
      $product = Product::findOrFail($request->product_id);
        $cart[$request->product_id] = [
            "name" => $product->name,
            "quantity" => $request->qty,
            "price" => $product->price,
            "image" => $product->image
        ];

    }
    session()->put('cart', $cart);
    session()->flash('success', 'Cart Updated');   
    }
  
    public function removeCart(Request $request)
    {
        if($request->product_id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->product_id])) {
                unset($cart[$request->product_id]);

                session()->put('cart', $cart);
            }
            session()->flash('success', 'Book successfully deleted.');
        }
    }

    public function placOrder(Request $request){
      $cart = session()->get('cart');
      $total=0;
      $t_shiping=0;
      foreach(session('cart') as $id => $details){
        $ship=ProductShipping::where([['product_id','=',$id],['county_id','=',$request->country]])->first();
        $product=Product::with('vendor')->findOrFail($id);
        $price=$details['quantity']*$product->price;
        $ship_price=$details['quantity']*$ship->shipping_price;
        $total+= $price+ $ship_price;
        $t_shiping+=$ship_price;

      }
    $total_chareges=$total+$request->first_order_charges;
      $order_data=['customer_id'=>Auth::user()->id,'first_order_charges'=>$request->first_order_charges,'total_price'=> $total_chareges,'created_at'=>Carbon::now(),
      'order_number'=>uniqid().time().uniqid(),
      'funnel'=>uniqid().time().uniqid(),
      'total_delivery'=> $t_shiping
    ];
      $order=CustomerOrder::createOrder( $order_data);
      foreach(session('cart') as $id => $details){
        $ship=ProductShipping::where([['product_id','=',$id],['county_id','=',$request->country]])->first();
        $product=Product::with('vendor')->findOrFail($id);
        $price=$details['quantity']*$product->price;
        $ship_price=$details['quantity']*$ship->shipping_price;
        $t_price= $price+ $ship_price;
        $plat_form=0.1*(   $t_price);
        $gateway=(( $t_price) * 2.9/100 + 0.30);
        
        $item_data=[
          'customer_id'=>Auth::user()->id,
          'order_id'=>$order->id,
          'vendor_id'=>$product->user_id,
          'product_id'=>$product->id,
          'quantity'=>$details['quantity'],
          'product_price'=>$product->price,
          'gateway_fee'=>$plat_form,
          'net_amount'=>$t_price-($gateway+$plat_form),
          'plat_form'=>$plat_form,
          'shipping'=> $ship_price,
          'total_price'=>$t_price,
          'created_at'=>Carbon::now()
        ];
        $item=CustomerOrderItem::createOrderItem($item_data);
        User::where('id','=',$product->user_id)->update(['wallet'=>$product->vendor->wallet+$item->net_amount]);
      }
     $address= ShippingAddress::insertAddress(array_merge($request->only('name','surname','company','city','order_id',
     'country','address','postalcode','state','created_at','updated_at','mobile','phone','email'),['created_at'=>Carbon::now(),'order_id'=>$order->id]));
     $pay=Stripe::pay($request->payment_method, $total_chareges,url()->previous(),$order->id,'order');
     return redirect()->to($pay);
    return redirect()->back()->with('success', 'Order Placed Successfully...!');   

    }

    public function checkShipping(Request $request){
      $ship=false;
      $total_shipping=0;
      foreach(session('cart') as $id => $details){
        $shipping=ProductShipping::where([['product_id','=',$id],['county_id','=',$request->country]])->first();
          if ($shipping) {
            $total_shipping+=$shipping->shipping_price;
            $ship=true;
          }else{
            $ship=false;
          }
      }
      return ['ship'=>$ship,'total_shipping'=>$total_shipping];
    }

  
}
