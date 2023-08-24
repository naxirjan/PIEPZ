<?php

namespace App\Http\Controllers\AdminPanel\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
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
        $objVendors = User::where("role", "vendor")->get();
        $objCategories = Category::where("status", "1")->get();
        return view('admin.products.product-bulk-edit', ["objVendors" => $objVendors, "objCategories" => $objCategories]);
    } // End Method
    
    public function AjaxGetBulkEditProducts()
    {
        $aProducts =  DB::table('products')->orderBy('id', 'desc')->limit(10)->get()->toArray();
        return view('admin.products.ajax.ajax-get-bulk-edit-products', [ "aProducts" => $aProducts]);
        
    } // End Method
    
    public function AjaxGetBulkEditProductsByFilters(Request $request)
    {
        $aFilters = $request->all();
        $iCategoryId = $request->Input('iCategoryId'); 
        $iStatusId = $request->Input('iStatusId'); 
        $iVendor = $request->Input('iVendor'); 
        
        $sQuery =  DB::table('products');
        
        if($iCategoryId > 0 ) $sQuery->where('category_id', $iCategoryId);
        if($iStatusId > 0 ) $sQuery->where('status', $iStatusId);
        if($iVendor > 0 ) $sQuery->where('user_id', $iVendor);
        
        $aProducts = $sQuery->get()->toArray();
        
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
        
        return redirect("admin/products/bulk-edit-products")->with("msg", "Product(s) Updated Successfully !...");
        
        
    }
    
}
