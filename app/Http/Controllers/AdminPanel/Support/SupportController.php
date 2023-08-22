<?php

namespace App\Http\Controllers\AdminPanel\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportController extends Controller
{
  //

  public function index()
  {
    return view('admin.support.index');
  } // End Method

  public function singleTicket()
  {
    return view('admin.support.view');
  } // End Method
}
