<?php

namespace Tests\Feature;


use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_see_login_screen()
{

            $response = $this->get('/login');
    
    $response->assertStatus(200);

}

    public function test_user_can_login_with_username_and_passowrd()
    {
        // Create & Sign In User
        $this->getSignedInUser();

    }




/*
public function test_signed_in_user_can_delete_product(){


   // Create & Sign In User
    $this->getSignedInUser();

   // Get created product
    $this->getInsertedProductNoRedirect(); 
    
    // Delete a product
    $response = $this->from(route('admin.products'))->get(route('admin.delete.product', $this->product->id));

    $response->assertStatus(302);
    $response->assertRedirect(route('admin.products'));

}*/



}
