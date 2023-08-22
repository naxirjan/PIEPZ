<?php

namespace App\Http\Controllers\Partner\ProductPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductPanelController extends Controller
{
  //

  public function search()
  {
    return view('partners.products.search');
  } // End Method
  public function collection()
  {
    return view('partners.products.collection');
  } // End Method
  public function ViewProduct()
  {
    return view('partners.products.product');
  } // End Method
  public function cart()
  {
    return view('partners.products.cart');
  } // End Method
  public function checkout()
  {
    return view('partners.products.checkout');
  } // End Method
}
