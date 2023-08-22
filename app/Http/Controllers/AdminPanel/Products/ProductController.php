<?php

namespace App\Http\Controllers\AdminPanel\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    } // End Method

    public function productAdd(Request $request)
    {

        return view('admin.products.product-add');
    } // End Method

    public function productView($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.product-view', compact('product'));
    } // End Method
    public function productDelete($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'product deleted successfully!');

    } // End Method
    public function productEdit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.product-edit', compact('product'));
    } // End Method

    public function productCustomization()
    {
        return view('admin.products.customization');
    } // End Method
}
