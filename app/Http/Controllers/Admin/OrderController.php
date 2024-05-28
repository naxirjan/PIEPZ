<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\{GridSearching, Product, User, Order};

class OrderController extends Controller
{

  public function analytics()
  {
    return view('admin.orders.analytics');
  }


  public function orderCreate()
  {
    return view('admin.orders.order-create');
  }

  public function orderDetails($iOrderId)
  {
    $iOrderId = base64_encode($iOrderId);

    //do your code here

    return view('admin.orders.order-detail');
  }

  public function orderInvoice()
  {
    return view('admin.orders.order-invoice');
  }

}
