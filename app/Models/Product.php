<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = "products";
    // use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['sku','manufacturer','shipping_price','b2b_shipping', 'slug', 'user_id', 'price', 'name', 'short_description', 'is_featured', 'stock', 'in_stock', 'low_stock', 'description', 'image', 'status', 'is_approved', 'category_id', 'created_at', 'updated_at', 'deleted_at'];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_products');

    }

    public function subcategories()
            {
                return $this->belongsToMany(SubCategory::class, 'category_products');
            }
    public function images()
    {
        return $this->hasMany(Image::class, 'sku', 'sku');
    }

    public function vendor(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'product_shippings', 'product_id', 'country_id') ->withPivot('shipping_price','id');
    }

    public function multiple_images()
    {
        return $this->hasMany(ProductImage::class, 'module_id');
    }
}
