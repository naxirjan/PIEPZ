<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrderItem extends Model
{
    use HasFactory;
    protected $fillable=[ 
        'order_id',
        'customer_id',
        'vendor_id',
        'product_id',
        'quantity',
        'product_price',
        'total_price',
        'status',
        'net_amount',
        'gateway_fee',
        'plat_form',
        'shipping',
        'created_at',
        'updated_at'
    ];

    public static function createOrderItem($data){
        return self::create($data);
    }
}
