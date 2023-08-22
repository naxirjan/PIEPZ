<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table="products";
    // use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable=['sku','slug','user_id','price','name','short_description','is_featured','stock','in_stock','low_stock','description','image','status','is_approved','category_id','created_at','updated_at','deleted_at'];
}
