<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Liberary\Media\Media;
use App\Models\ProductShipping;


use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\{
  GridSearching, User, Product, Category, Image
};

class ProductController extends Controller
{

    // view all products
    public function index()
    {
        // All Categories
        $sCategories = "";
        $aCategories = Category::all();
        foreach ($aCategories as $aCategory){
          $sCategories .= $aCategory->name.":".$aCategory->name.";";
        }

        // All Vendors
        $sVendors = "";
        $aVendors = User::where("role_id", 2)->get();
        foreach ($aVendors as $aVendor){
          $sVendors .= $aVendor->id .":". $aVendor->first_name .' '. $aVendor->last_name .";";
        }

        return view('admin.products.index', ['sCategories' => rtrim($sCategories, ";"), "sVendors" => rtrim($sVendors, ";")]);
    }


    public function productAdd(Request $request)
    {
        $categories = Category::all();
        $vendors = User::where('role_id', '=', 2)->get();

        return view('admin.products.product-add', compact('categories', 'vendors'));
    }

    public function productStore(ProductRequest $request)
    {
        $validated = $request->validated();
        $images=array();
        if ($request->hasFile('images')) {
            $feature = Media::uploadMedia('products', $request->file('images'));
            foreach ($feature as $key => $value) {
                if ($key<5) {
                    $images['additional_image'.$key+1]=$value;
                }
            }
        }
        $p = Product::where('sku', $request->sku)->first();
        $insert_data = [
            'sku' => $request->sku,
            'slug' => uniqid() . time(),
            'user_id' => Auth::id(),
            'price' => $request->price,
            'name' => $request->name,
            'short_description' => $request->short_description,
            'is_featured' => $request->is_featured,
            'stock' => $request->stock,
            'in_stock' => $request->in_stock,
            'low_stock' => $request->low_stock,
            'description' => $request->description,
            'image' => $feature[0],
            'status' => $request->status,
            'type' => $request->type,
            'created_at' => Carbon::now(),
        ];
        $insert_data=array_merge($images,$insert_data);
        if (!$p) {
            $pro = Product::create($insert_data);
            $cat = Category::insertRecord( $request->category, $pro->id, $request->sku);

            // $images = Image::uploadImage($feature, $pro->id, 'products', $request->sku);

            return redirect()->back()->withSuccess('Product Added Successfuly');
        }

    }


    public function productDelete(Request $request)
    {
        $ProductId = $request->input('ProductId');
        $ProductId = base64_decode($ProductId);
        $product = Product::findOrFail($ProductId)->delete();

        if($product)
            return response()->json(['return' => true, 'msg' => 'Product Deleted Successfully !...']);
        else
            return response()->json(['return' => false, 'msg' => 'Sorry, Something went wrong !...']);

    }

    public function Shippingdestroy(ProductShipping $product_shipping){

         $product_shipping->delete();

        return response()->json(['message' => 'Product Shipping deleted successfully']);

    }

    public function updateMultiple(Request $request)
{
    $values = $request->input('values');
    $editable = $request->input('editable');

    foreach ($values as $itemId => $value) {
        $item = ProductShipping::find($itemId);

        if (isset($editable[$itemId])) {
            // Field is editable, update the value
            $item->shipping_price = $value;
            $item->save();
        }
    }
    return redirect()->back()->withSuccess('Product Shipping updated successfully');

    // Redirect or return a response as needed.
}

    public function productUpdate(EditProductRequest $request)
    {
        $validated = $request->validated();
        $p = Product::findOrFail($request->product_id);
        $insert_data = [
            'sku' => $request->sku,
            'slug' => uniqid() . time(),
            'user_id' => $request->seller,
            'price' => $request->price,
            'name' => $request->name,
            'short_description' => $request->short_description,
            'is_featured' => $request->is_featured,
            'stock' => $request->stock,
            'in_stock' => $request->in_stock,
            'low_stock' => $request->low_stock,
            'description' => $request->description,
            'status' => $request->status,
            'type' => $request->type,
            'updated_at' => Carbon::now(),
        ];

        $pro = Product::where('id', '=', $request->product_id)->update($insert_data);
        $cat = Category::insertRecord( $request->category, $p->id, $p->sku);
        return redirect()->back()->withSuccess('Product Updated Successfuly');

    }

    public function BulkEditProducts()
    {
        $objVendors = User::where("role_id", 2)->get();
        $objCategories = Category::where("status", 1)->get();
        return view('admin.products.products-bulk-edit', ["objVendors" => $objVendors, "objCategories" => $objCategories]);
    }

    public function productCustomization()
    {
        return view('admin.products.customization');
    }

    public function productShipping(Request $request){

        $request->validate([
            'shipping_price' => 'required',

        ]);




       foreach($request->shipping_countries as $val){
        $ship = New ProductShipping();
        $ship->product_id =$request->product_id;
        $ship->shipping_price =$request->shipping_price;
        $ship->country_id = $val;
        $ship->save();
       }


        return redirect()->back()->withSuccess('Shippings Added Successfuly');
    }

    public function productImages(Request $request)
{
   $product_id = $request->product_id;
    // Validate and update product details here

    // Handle image additions
    $images=array();
    if ($request->hasFile('images')) {
        $feature = Media::uploadMedia('products', $request->file('images'));
        foreach ($feature as $key => $value) {
            if ($key<5) {
                $images['additional_image'.$key+1]=$value;
            }
        }
        $p = Product::where('id',$request->product_id)->update($images);

    }




    return redirect()->back()->withSuccess('images changed Successfuly');
}


//Apis
public static function productStoreApi(Request $request)
    {
        $p = Product::where('sku', $request->sku)->first();
        $insert_data = [
            'sku' => $request->sku,
            'slug' => uniqid() . time(),
            'user_id' => Auth::id()??$request->user_id,
            'price' => $request->price,
            'name' => $request->name,
            'short_description' => $request->short_description,
            'is_featured' => $request->is_featured,
            'stock' => $request->stock,
            'in_stock' => $request->in_stock,
            'low_stock' => $request->low_stock,
            'description' => $request->description,
            'image' => $request->image,
            'status' => $request->status,
            'manufacturer' => $request->manufacturer,
            'shipping_price' => $request->shipping_price,
            'b2b_shipping' => $request->b2b_shipping,
            'additional_image2' => $request->additional_image2,
            'additional_image1' => $request->additional_image1,
            'additional_image3' => $request->additional_image3,
            'additional_image4' => $request->additional_image4,
            'additional_image5' => $request->additional_image5,
            'is_featured' => $request->is_featured,
            'type' => $request->type,
            'created_at' => Carbon::now(),
        ];
        if (!$p) {
            $pro = Product::create($insert_data);
            $cat = Category::insertRecord( explode(">",$request->category), $pro->id, $request->sku);
        }else{
            $pro = Product::where('id', '=', $p->id)->update($insert_data);
            $cat = Category::insertRecord( explode(">",$request->category), $p->id, $request->sku);

        }
        if($pro)  return response()->json(["return" => true, "error" => ""]);
        else return response()->json(["return" => false, "error" => "Something went wrong"]);
    }

}
