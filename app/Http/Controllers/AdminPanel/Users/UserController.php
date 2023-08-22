<?php

namespace App\Http\Controllers\AdminPanel\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use \App\Models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = User::get();
        $data = ["data" => $data];

        $encoded_data = json_encode($data);

        Storage::disk('tmp')->put('user-list.json', $encoded_data);

    }
}
