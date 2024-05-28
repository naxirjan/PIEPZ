<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Liberary\Media\Media;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class VendorProductController extends Controller
{
    // Analytics
    public function index()
    {
      return view('vendors.index');
    }

    // Analytics
    public function crm()
    {
      return view('vendors.index');
    }

    // Analytics
    public function ecommerce()
    {
      return view('vendors.index');
    }

    public function products()
    {
        $id = Auth::id();

        $products = Product::where("user_id", $id)->get();
        return view('vendors.products.index', compact('products'));
    } // End Method

    public function productAdd()
    {
        $categories = Category::all();
        $vendors = User::where('role_id', '=', 2)->get();
        return view('vendors.products.product-add', compact('categories', 'vendors'));
    } // End Method

    public function productCustomization()
    {
        return view('vendors.products.customization');
    } // End Method

    public function productDelete($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'product deleted successfully!');

    } // End Method

    public function productUpdate(EditProductRequest $request)
    {

        $validated = $request->validated();

        $p = Product::findOrFail($request->product_id);
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
            'status' => $request->status,
            'type' => $request->type,
            'updated_at' => Carbon::now(),
        ];

        $pro = Product::where('id', '=', $request->product_id)->update($insert_data);

        $cat = Category::insertRecord( $request->category, $p->id, $p->sku);
        return redirect()->back()->withSuccess('Product Updated Successfuly');

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
            $cat = Category::insertRecord($request->category, $pro->id, $request->sku);
            return redirect()->back()->withSuccess('Product Added Successfuly');
        }
    }
    public function productView($id)
    {
        $product = Product::with('images')->findOrFail($id);

        // foreach ($product->categories as $cat) {
        //     echo $cat->name;
        //     echo "<br>";
        // }

        return view('vendors.products.product-view', compact('product'));
    } // End Method
    public function productEdit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        $vendors = User::where('role_id', '=', 2)->get();
        return view('vendors.products.product-edit', compact('product', 'categories', 'vendors'));
    } // End Method

}
