<?php

namespace Database\Factories;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(Product::class, function(Faker $faker))
    {     
        return [
            'user_id' => 2,
            'category_id' => 1,
            'sku' => Str::random(5),
            'slug' => Str::random(10),
            'name' => Str::random(20),
            'price' => rand(100, 200),
            'stock' => rand(20, 50),
            'in_stock' => rand(20, 50),
            'low_stock' => rand(5, 10),
            'short_description' => Str::random(30),
            'description' => Str::random(30),
            'images' => $this->faker->image('public/storage/products',640,480, null, false),
        ];
    }
    
}
