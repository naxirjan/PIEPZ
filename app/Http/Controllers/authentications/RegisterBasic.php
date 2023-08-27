<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterBasic extends Controller
{
  public function index()
  {
    $pageConfigs = ['myLayout' => 'blank'];
    return view('content.authentications.auth-register-basic', ['pageConfigs' => $pageConfigs]);
  }
  
  
  public function RegisterBasicPost(Request $request)
  {
        $aFormData = $request->all();
        $sUsername = $aFormData['username'];
        $sEmail = $aFormData['email'];
        $sPassword = $aFormData['password'];            
      
        // To Do
      
      
      return redirect()->back();
  }
}
