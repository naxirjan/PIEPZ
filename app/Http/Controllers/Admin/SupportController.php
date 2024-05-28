<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Auth;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
  //

  public function index(Request $request,$id=null)
  {
    $messages = [];
    $otherUser= [];

    if($id){
        $otherUser = User::findorfail($id);
        $group_id = (Auth::id()>$id)?Auth::id().$id:$id.Auth::id();
        $messages = Chat::where('group_id',$group_id)->get()->toArray();
    }
    $friend = User::where('id','!=',Auth::id())->get()->toArray();
    return view('admin.support.index',compact('friend','messages','otherUser','id'));
  } // End Method


  public function singleTicket(Request $request,$id)
  {
    //$id = base64_decode($id);
    $messages = [];
    $otherUser= [];

    if($id){
        $otherUser = User::findorfail($id);
        $group_id = (Auth::id()>$id)?Auth::id().$id:$id.Auth::id();
        $messages = Chat::where('group_id',$group_id)->get()->toArray();
    }
    $friend = User::where('id','!=',Auth::id())->get()->toArray();

    return view('admin.support.view',compact('friend','messages','otherUser','id'));
  } // End Method
}
