<?php

namespace App\Http\Controllers\Partner\OrderPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderPanelController extends Controller
{
  //
  public function index()
  {
    return view('partners.orders.index');
  } // End Method

  public function orderDetails()
  {
    return view('partners.orders.order-detail');
  } // End Method

  public function orderInvoice()
  {
    return view('partners.orders.order-invoice');
  } // End Method
}
