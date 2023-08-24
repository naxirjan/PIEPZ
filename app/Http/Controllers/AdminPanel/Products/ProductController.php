<?php

namespace App\Http\Controllers\AdminPanel\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $product = Product::with('images')->findOrFail($id);

        // foreach ($product->categories as $cat) {
        //     echo $cat->name;
        //     echo "<br>";
        // }

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

    public function BulkEditProducts()
    {
        return view('admin.products.product-bulk-edit');
    } // End Method
    
    public function AjaxGetBulkEditProducts()
    {
        $aProducts =  DB::table('products')->limit(10)->get()->toArray();
        return view('admin.products.ajax.ajax-get-bulk-edit-products', [ "aProducts" => $aProducts]);
        
    } // End Method
    
    public function BulkUpdateProductsProcess(Request $request)
    {
        $aFormData = $request->all();
        $iCount = 0;
        
        for($iIndex = 0; isset($aFormData["SelectedProduct_".$iIndex]); $iIndex++)
        {
            $iId = base64_decode($aFormData["SelectedProduct_".$iIndex]);
            $objProduct = Product::find($iId);
            $objProduct->name = $aFormData["name_".$iIndex];
            $objProduct->type = $aFormData["type_".$iIndex];
            $objProduct->price = $aFormData["price_".$iIndex];
            $objProduct->short_description = $aFormData["short_description_".$iIndex];
            if($objProduct->isDirty()) $iCount++;
            $objProduct->save();
        }
        
        echo "$iCount Record(s) Updated !... <br />";
        
    }
    
}
