<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorSupportController extends Controller
{
  //
  public function index()
  {
    return view('vendors.support.index');
  } // End Method

  public function singleTicket()
  {
    return view('vendors.support.view');
  } // End Method
}
