<?php

namespace App\Http\Controllers\Vendor\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorImportProductController extends Controller
{
  //
  public function index()
  {
    return view('vendors.products.imports.index');
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
