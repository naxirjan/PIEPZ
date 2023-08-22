<?php

namespace App\Http\Controllers\AdminPanel\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  //
  public function index()
  {
    return view('admin.orders.index');
  } // End Method

  public function analytics()
  {
    return view('admin.orders.analytics');
  } // End Method

  public function orderCreate()
  {
    return view('admin.orders.order-create');
  } // End Method

  public function orderDetails()
  {
    return view('admin.orders.order-detail');
  } // End Method

  public function orderInvoice()
  {
    return view('admin.orders.order-invoice');
  } // End Method
}
