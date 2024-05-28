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

        $brands = Category::withCount('product')->get();
        $vendors = User::where('role_id',2)->get();
        return view('partners.products.search',compact('brands','vendors'));
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


  public function collection(Request $request,$data)
  {


    $vendors = User::where('role_id',2)->get();


    $categoryID = $request['category'];
    $subcategoryId= $request['sub_category'];

    $products = Product::query();

    if(isset($request['category']) && !empty($request['category'])){

      $products->whereHas('categories', function ($subQuery) use ($categoryID) {
          $subQuery->where('category_id', $categoryID);
      });
    }

    if(isset($request['sub_category']) && !empty($request['sub_category'])){
      // dd("sub category");
      $products->whereHas('subcategories', function ($query) use ($subcategoryId) {
        $query->where('sub_category_id', $subcategoryId);
      });
    }
    if($request['data']=="latest" && !empty($request['data'])){
      // dd("latest");
      $products->orderBy('created_at', 'desc');
    }

    if($request['data']=="filter" && !empty($request['data'])){

           // 1. Search by name or SKU
          $searchTerm = $request->input('product_name');
          if (!empty($searchTerm)) {
              $products->where(function($products) use ($searchTerm) {
                  $products->where('name', 'LIKE', "%$searchTerm%")
                        ->orWhere('sku', 'LIKE', "%$searchTerm%");
              });
          }

          // 2. Filter by status (1 or 0)
          $status = $request->input('status');
          if ($status === '1' || $status === '0') {
              $products->where('status', $status);
          }

          // 3. Filter by user_id
          $userId = $request->input('user_id');
          if (!empty($userId)) {
              $products->where('user_id', $userId);
          }

          // 4. Filter by price range (minimum and maximum)
          $minPrice = $request->input('min-price');
          $maxPrice = $request->input('max-price');

          if ($minPrice !== null && $maxPrice !== null) {

            $products->whereBetween('price', [$minPrice, $maxPrice]);
          }
    }
    if(isset($request['by_vendor']) && !empty($request['by_vendor'])){

      $products->where('user_id',$request['by_vendor']);
    }

    $products = $products->paginate(24);

    $categories = Category::with('subCategories')->get();

    if($request['category'] && !empty($request['category'])){
      $categoryID = $request['category'];
      $category = Category::find($categoryID);
      $subcategories = $category->subCategories;

    return view('partners.products.collection',compact('categories','subcategories','products','vendors'));
    }

    return view('partners.products.collection',compact('categories','products','vendors'));
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
      $orders=array();
      foreach(session('cart') as $id => $details){
        $ship=ProductShipping::where([['product_id','=',$id],['country_id','=',$request->country]])->first();
        $product=Product::with('vendor')->findOrFail($id);
        $price=$details['quantity']*$product->price;
        $ship_price=$details['quantity']*isset( $ship)?$ship->shipping_price:0;
        $total+= $price+ $ship_price;
        $t_shiping+=$ship_price;
        $order_number=uniqid().time().uniqid();
        $orders[$id]=$order_number;
        $order_data=[
          'customer_id'=>Auth::user()->id,
          'vendor_id'=>$product->user_id,
          'first_order_charges'=>$request->first_order_charges,
          'total_price'=> $price+ $ship_price,
          'created_at'=>Carbon::now(),
          'order_number'=>$order_number,
          'funnel'=>uniqid().time().uniqid(),
          'total_delivery'=>$ship_price,
        ];
      }
    $total_chareges=$total+$request->first_order_charges;

      $order=CustomerOrder::create( $order_data);

      foreach(session('cart') as $id => $details){
        $ship=ProductShipping::where([['product_id','=',$id],['country_id','=',$request->country]])->first();
        $product=Product::with('vendor')->findOrFail($id);
        $price=$details['quantity']*$product->price;
        $ship_price=$details['quantity']* isset( $ship)?$ship->shipping_price:0;
        $t_price= $price+ $ship_price;
        $plat_form=0.1*(   $t_price);
        $gateway=(( $t_price) * 2.9/100 + 0.30);

        $item_data=[

          'order_id'=> $order->id,
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
        $address= ShippingAddress::insertAddress(array_merge($request->only('name','surname','company','city','order_id',
        'country','address','postalcode','state','created_at','updated_at','mobile','phone','email'),['created_at'=>Carbon::now(),'order_id'=>$order->id]));
      }

     $pay=Stripe::pay($request->payment_method, $total_chareges,url()->previous(),66464,'order');
     $request->session()->forget('cart');
     return redirect()->to($pay);
    return redirect()->back()->with('success', 'Order Placed Successfully...!');

    }

    public function checkShipping(Request $request){
      $ship=false;
      $total_shipping=0;
      foreach(session('cart') as $id => $details){
        $shipping=ProductShipping::where([['product_id','=',$id],['country_id','=',$request->country]])->first();
          if ($shipping) {
            $total_shipping+=$shipping->shipping_price;
            $ship=true;
          }else{
            $ship=false;
          }
      }
      return ['ship'=>$ship,'total_shipping'=>$total_shipping];
    }


    public static function insertOrderApi(Request $request){

       $aOrder = $request->orders;

       dd($aOrder);
      foreach($request->orders as $id => $details){

        $order_data=[
          'customer_id'=>$details['customer_id'],
          'vendor_id'=>$details['vendor_id'],
          'total_price'=>$details['total_price'],
          'created_at'=>Carbon::now(),
          'order_number'=>$details['order_number'],
          'funnel'=>uniqid().time().uniqid(),
          'total_delivery'=>$details['shipping'],
          'status'=>$details['status'],
          'is_refund'=>$details['is_refund'],
          'total_discount'=>$details['total_discount'],
          'payment_status'=>$details['payment_status'],
        ];
      }
      //$order=CustomerOrder::createOrder( $order_data);
      foreach($request->orders as $id => $details){
        $item_data=[
          'order_id'=> $details['order_number'],
          'product_id'=>$details['product_id'],
          'quantity'=>$details['quantity'],
          'product_price'=>$details['product_price'],
          'gateway_fee'=>$details['gateway_fee'],
          'net_amount'=>$details['net_amount'],
          'plat_form'=>$details['plat_form'],
          'shipping'=>$details['shipping'],
          'total_price'=>$details['total_price'],
          'created_at'=>Carbon::now()
        ];
        //$item=CustomerOrderItem::createOrderItem($item_data);
        //$address= ShippingAddress::insertAddress(array_merge($request->only('name','surname','company','city','order_id',
        //'country','address','postalcode','state','created_at','updated_at','mobile','phone','email'),['created_at'=>Carbon::now(),'order_id'=>$details['order_number']]));
      }
      if($item)  return response()->json(["return" => true, "error" => ""]);
        else return response()->json(["return" => false, "error" => "Something went wrong"]);
    }

    public static function updateOrderApi(Request $request){

      $order_data=array();
      $order=CustomerOrder::where("order_number","=",$request->order_number)->first();
        if ($order) {
          foreach($request->all() as $key => $value){
            $order_data[$key]=$value;
          }
          $update=CustomerOrder::where("order_number","=",$request->order_number)->update($order_data);
        }
        if( $update)  return response()->json(["return" => true, "error" => ""]);
        else return response()->json(["return" => false, "error" => "Something went wrong"]);
    }
}

