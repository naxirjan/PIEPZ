<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_signed_in_user_can_create_product()
    {
        // Create & Sign In User
        $this->getSignedInUser();

        // Get created product
        $this->getInsertedProductNoRedirect();

    }

    public function test_signed_in_user_can_update_product()
    {

        // Create & Sign In User
        $this->getSignedInUser();

        // Get created product
        $this->getInsertedProductNoRedirect();

        Storage::fake('public/storage/products');
        $images = UploadedFile::fake()->image('product-' . rand(1, 100) . '.jpg');

        // Update a product
        $response = $this->post(route('admin.product.update', $this->product->id), [
            'product_id' => $this->product->id,
            'seller' => $this->user->id,
            'is_featured' => 0,
            'category' => array(2),
            'status' => 0,
            'type' => 1,
            'sku' => Str::random(5),
            'slug' => Str::random(10),
            'name' => 'Product 1 Updated',
            'price' => rand(50, 100),
            'stock' => rand(20, 50),
            'in_stock' => rand(20, 50),
            'low_stock' => rand(5, 10),
            'short_description' => Str::random(30) . " Updated",
            'description' => Str::random(30) . "Updated",
            'images' => $images,
        ]);

        $product = Product::first();

        $this->assertEquals('Product 1 Updated', $product->name);

    }

 public function test_signed_in_user_can_delete_product(){

//    // Create & Sign In User
     $this->getSignedInUser();

//    // Get created product
     $this->getInsertedProductNoRedirect();

     // Delete a product
     $response = $this->get(route('admin.delete.product', $this->product->id));

  //dd(Product::count());

    // $this->assertEquals(0, Product::count());

 }

}
