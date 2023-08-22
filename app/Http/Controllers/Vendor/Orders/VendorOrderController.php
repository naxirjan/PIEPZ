<?php

namespace App\Http\Controllers\Vendor\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorOrderController extends Controller
{
  //
  public function index()
  {
    return view('vendors.orders.index');
  } // End Method

  public function orderDetails()
  {
    return view('vendors.orders.order-detail');
  } // End Method

  public function orderInvoice()
  {
    return view('vendors.orders.order-invoice');
  } // End Method
}
