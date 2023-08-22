<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use \App\Models\User;

class UserList extends Controller
{
    public function index()
    {
        $data = User::get();
        $data = ["data" => $data];

        $encoded_data = json_encode($data);

        Storage::disk('tmp')->put('user-list.json', $encoded_data);

        return view('admin.users.app-user-list');
    }
}
