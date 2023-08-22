<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
  //
  public function index()
  {
    return view('partners.index');
  } // End Method
  public function feedback()
  {
    return view('partners.account.feedback');
  } // End Method

  public function support()
  {
    return view('partners.support.support');
  } // End Method
  public function chat()
  {
    return view('partners.support.chat');
  } // End Method
}
