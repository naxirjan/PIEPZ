<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImportFile;
use Auth;
class VendorImportProductController extends Controller
{
  //
  public function index()
  {
    $files=ImportFile::with('user')->where('user_id','=',Auth::user()->id)->get();

    return view('vendors.products.imports.index',compact('files'));
  } // End Method

  public function mapping()
  {
    return view('vendors.products.imports.mapping');
  } // End Method

  public function uploadFeed()
  {
    return view('vendors.products.imports.feed');
  } // End Method
}
