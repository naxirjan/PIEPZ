<?php

namespace App\Http\Controllers\AdminPanel\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Liberary\Import\Excel;
use App\Models\User;
use App\Models\Product;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Liberary\Media\Media;
use Carbon\Carbon;
class ImportProductController extends Controller
{
  //
  public function index()
  {
    return view('admin.products.imports.index');
  } // End Method

  public function mapping()
  {
    return view('admin.products.imports.mapping');
  } // End Method

  public function uploadFeed()
  {
    return view('admin.products.imports.feed');
  } // End Method
  public function import(Request $request){


    $retun_links=array('33');

    foreach ($request->rows as $key => $data) {
     $insert= [
      'sku'=>isset($data['SKU'])?$data['SKU']:0,
      'slug'=>uniqid().time(),
      'user_id'=>1,
      'price'=>isset($data['Regular price'])?$data['Regular price']:0,
      'name'=>isset($data['Name'])?$data['Name']:null,
      'short_description'=>isset($data['Short description'])?$data['Short description']:null,
      'is_featured'=>isset($data['Is featured?'])?$data['Is featured?']:0,
      'stock'=>isset($data['Stock'])?$data['Stock']:0,
      'In Stock'=>isset($data['In stock?'])?$data['In stock?']:0,
      'low_stock'=>isset($data['Low stock amount'])?$data['Low stock amount']:0,
      'description'=>isset($data['Description'])?$data['Description']:null,
      'image'=>isset($data['Images'])?Media::uploadMediaByContent('products',$data['Images']):null,
      // 'status'=>isset($data['Published'])?$data['Published']:0,
      'category_id'=>null,
      'created_at'=>Carbon::now()];
      Product::create($insert);
      
    }
    $return_array=array(
      'status'=>true,
       'message'=>"Record Added Succfully",
       "links"=>$retun_links,
       
     );
echo json_encode($return_array);
exit;
    // $data=$request->rows[0];
    // dd($data);
    
      // dd($request->all());
      // $upload_file=Media::uploadMedia('imports',$request->file('file'));
      // dd($upload_file);
    // dd($request->file('file')->getClientOriginalExtension());
    // $xmlString = file_get_contents(\Storage::path('public/sample.xml'));
    // $xmlObject = simplexml_load_string($xmlString);
               
    // $json = json_encode($xmlObject);
    // $phpArray = json_decode($json, true); 

    // dd($phpArray);
    return true;
    $data=Excel::import(new ProductsImport,$request->file('file'));
    dd($data);

    $data=Excel::importExcel($request->file);
  }

  public static function exmlImport(Request $request){
    dd($request->file());
  }
}
