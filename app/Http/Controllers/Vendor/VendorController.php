<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{

  	

  //
  public function index()
  {
    return view('vendors.index');
  } // End Method

  public function feedback()
  {
    return view('vendors.account.feedback');
  } // End Method

  public function page()
  {
    return view('vendors.account.myaccount');
  } // End Method

  public function information()
  {
    return view('vendors.account.user-information');
  } // End Method

  public function invoiceInformation()
  {
    return view('vendors.account.invoice-information');
  } // End Method

  public function sync()
  {
    return view('vendors.account.sync');
  } // End Method

  public function packages()
  {
    return view('vendors.account.packages');
  } // End Method


}
