<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Auth;
class ChatController extends Controller
{
    //
    public function index(Request $request,$id=null){
        $messages = [];
        $otherUser= [];
        
        if($id){
            $otherUser = User::findorfail($id);
            $group_id = (Auth::id()>$id)?Auth::id().$id:$id.Auth::id();
            $messages = Chat::where('group_id',$group_id)->get()->toArray();
        }
        $friend = User::where('id','!=',Auth::id())->get()->toArray();
       
        return view('chat',compact('friend','messages','otherUser','id'));
    }
}
