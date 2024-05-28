<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class UserInsert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->insertUser();

    }

    public function insertUser(){
        \DB::table('users')->insert([
            'role_id'   => 1,
            'last_name'    => 'Admin',
            'first_name'    => 'Piepz',
            'email'       => 'piepz@getnada.com',
            'phone'   => '1-8882051816',
            'password'    => Hash::make('admin@123$'),
            'created_at'  => Carbon::now(),
        ]);
    }
}
