<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = "orders";
    // use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = ['customer_id', 'product_id', 'order_number', 'funnel', 'tracking_code', 'quantity', 'price', 'status','updated_at', 'deleted_at'];

}
