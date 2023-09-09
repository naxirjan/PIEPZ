<?php
namespace Tests;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ProductOperation{

public $product;

    // add a new product
	public function getInsertedProduct(){

		Storage::fake('public/storage/products');
     	$images = UploadedFile::fake()->image('product-'.rand(1,100).'.jpg');

   		 // Add new product
    	$response = $this->from(route('admin.product.add'))->post(route('admin.product.store'),[
      		'user_id' => $this->user->id,
      		'seller' => $this->user->id,
      		'is_featured' => 1,
            'category' => array(1),
            'status' => 1,
            'type' => 1,
            'sku' => Str::random(5),
            'slug' => Str::random(10),
            'name' => 'Product 1',
            'price' => rand(100, 200),
            'stock' => rand(20, 50),
            'in_stock' => rand(20, 50),
            'low_stock' => rand(5, 10),
            'short_description' => Str::random(30),
            'description' => Str::random(30),
            'images' => $images
            
    	]);


    	# works if the refresh database is on
    	// Check product count
    	$this->assertEquals(1, Product::count());

        // Get inserted product and validate
    	$this->product = Product::first();
    	$this->assertEquals($this->product->user_id, $this->user->id);
    	$this->assertEquals($this->product->name, 'Product 1');

    	return $response;
	}


	public function getInsertedProductNoRedirect(){

		Storage::fake('public/storage/products');
     	$images = UploadedFile::fake()->image('product-'.rand(1,100).'.jpg');

   		 // Add new product
    	$response = $this->post(route('admin.product.store'),[
      		'user_id' => $this->user->id,
      		'seller' => $this->user->id,
      		'is_featured' => 1,
            'category' => array(1),
            'status' => 1,
            'type' => 1,
            'sku' => Str::random(5),
            'slug' => Str::random(10),
            'name' => 'Product 1',
            'price' => rand(100, 200),
            'stock' => rand(20, 50),
            'in_stock' => rand(20, 50),
            'low_stock' => rand(5, 10),
            'short_description' => Str::random(30),
            'description' => Str::random(30),
            'images' => $images
            
    	]);


    	# works if the refresh database is on
    	// Check product count
    	$this->assertEquals(1, Product::count());

        // Get inserted product and validate
    	$this->product = Product::first();
    	$this->assertEquals($this->product->user_id, $this->user->id);
    	$this->assertEquals($this->product->name, 'Product 1');
	}

}