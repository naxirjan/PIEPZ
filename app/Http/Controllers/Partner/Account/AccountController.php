<?php

namespace App\Http\Controllers\Partner\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  //
  public function account()
  {
    return view('partners.account.myaccount');
  } // End Method

  public function information()
  {
    return view('partners.account.user-information');
  } // End Method

  public function invoiceInformation()
  {
    return view('partners.account.invoice-information');
  } // End Method

  public function sync()
  {
    return view('partners.account.sync');
  } // End Method

  public function syncPiepz()
  {
    return view('partners.account.sync-piepz');
  } // End Method
}
