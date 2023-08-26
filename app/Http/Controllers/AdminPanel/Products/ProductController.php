<?php
namespace App\Http\Controllers\AdminPanel\Products;

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
        $categories = Category::all();
        $vendors = User::where('role', '=', 'vendor')->get();

        return view('admin.products.product-add', compact('categories', 'vendors'));
    } // End Method
    public function productStore(ProductRequest $request)
    {
        $validated = $request->validated();
        $feature = Media::uploadMedia('products', $request->file('images'));
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
        if (!$p) {
            $pro = Product::create($insert_data);
            $cat = Category::insertRecord(implode(";", $request->category), $pro->id, $request->sku);
            $images = Image::uploadImage($feature, $pro->id, 'products', $request->sku);
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

        return view('admin.products.product-view', compact('product'));
    } // End Method
    public function productDelete($id)
    {
        $product = Product::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'product deleted successfully!');

    } // End Method
    public function productEdit($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $categories = Category::all();
        $vendors = User::where('role', '=', 'vendor')->get();
        return view('admin.products.product-edit', compact('product', 'categories', 'vendors'));
    } // End Method
    public function productUpdate(EditProductRequest $request)
    {

        $validated = $request->validated();
        $feature = null;
        if ($request->file('images')) {
            $feature = Media::uploadMedia('products', $request->file('images'));
        }
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
            'image' => ($feature) ? $feature[0] : $p->image,
            'status' => $request->status,
            'type' => $request->type,
            'updated_at' => Carbon::now(),
        ];

        $pro = Product::where('id', '=', $request->product_id)->update($insert_data);
        if ($feature) {
            $images = Image::uploadImage($feature, $p->id, 'products', $p->sku);
        }
        $cat = Category::insertRecord(implode(";", $request->category), $p->id, $p->sku);
        return redirect()->back()->withSuccess('Product Updated Successfuly');

    }

    public function BulkEditProducts()
    {
        $objVendors = User::where("role", "vendor")->get();
        $objCategories = Category::where("status", "1")->get();
        return view('admin.products.product-bulk-edit', ["objVendors" => $objVendors, "objCategories" => $objCategories]);
    } // End Method

    public function AjaxGetBulkEditProducts()
    {
        $aProducts = DB::table('products')->orderBy('id', 'desc')->limit(10)->get()->toArray();
        $objCategories = Category::where("status", "1")->get();
       
        return view('admin.products.ajax.ajax-get-bulk-edit-products', ["aProducts" => $aProducts, "objCategories" => $objCategories]);

    } // End Method

    public function AjaxGetBulkEditProductsByFilters(Request $request)
    {
        $aFilters = $request->all();
        $iCategoryId = $request->Input('iCategoryId');
        $iStatusId = $request->Input('iStatusId');
        $iVendor = $request->Input('iVendor');
        $objCategories = Category::where("status", "1")->get();

        $sQuery = DB::table('products');

        if ($iCategoryId > 0) {
            $sQuery->where('category_id', $iCategoryId);
        }

        if ($iStatusId > 0) {
            $sQuery->where('status', $iStatusId);
        }

        if ($iVendor > 0) {
            $sQuery->where('user_id', $iVendor);
        }

        $aProducts = $sQuery->get()->toArray();

        return view('admin.products.ajax.ajax-get-bulk-edit-products', ["aProducts" => $aProducts, "objCategories" => $objCategories]);

    } // End Method

    public function BulkUpdateProductsProcess(Request $request)
    {
        $aFormData = $request->all();    
        
        for ($iIndex = 0;isset($aFormData["SelectedProduct_" . $iIndex]); $iIndex++) {
            $iId = base64_decode($aFormData["SelectedProduct_" . $iIndex]);
            $objProduct = Product::find($iId);
            $objProduct->name = $aFormData["name_" . $iIndex];
            $objProduct->type = $aFormData["type_" . $iIndex];
            $objProduct->category_id = $aFormData["category_id_" . $iIndex];
            $objProduct->price = $aFormData["price_" . $iIndex];
            $objProduct->short_description = $aFormData["short_description_" . $iIndex];
            $objProduct->is_featured = (($aFormData["is_featured_" . $iIndex] ?? "") == "on" ? 1 : 0);
            $objProduct->is_approved = (($aFormData["is_approved_" . $iIndex] ?? "") == "on" ? 1 : 0);
            $objProduct->status = (($aFormData["status_" . $iIndex] ?? "") == "on" ? 1 : 0);

            $objProduct->save();
        }
        
        return redirect("admin/products/bulk-edit-products")->with("msg", "Product(s) Updated Successfully !...");

    

    }
    public function productCustomization()
    {
        return view('admin.products.customization');
    } // End Method

}
