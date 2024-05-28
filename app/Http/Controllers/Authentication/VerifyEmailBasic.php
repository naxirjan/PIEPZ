<?php

namespace App\Http\Controllers\Authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyEmailBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('auth.authentications.auth-verify-email-basic', ['pageConfigs' => $pageConfigs]);
  }
}
