<?php
namespace Tests;
use App\Models\User;

trait UserLogin{

public $user;

	public function getSignedInUser(){

		// Create User
		$this->user = User::factory()->create();

		//Login User
		$response = $this->actingAs($this->user)->post('login', [
		"email" => $this->user->email,
		"password" => 'password',
		]);

		$this->assertAuthenticated();
	}

}