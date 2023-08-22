<?php

namespace App\Http\Controllers\Vendor\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorProductController extends Controller
{
  //
  public function index()
  {
    return view('vendors.products.index');
  } // End Method

  public function productAdd()
  {
    return view('vendors.products.product_add');
  } // End Method

  public function productCustomization()
  {
    return view('vendors.products.customization');
  } // End Method
}
