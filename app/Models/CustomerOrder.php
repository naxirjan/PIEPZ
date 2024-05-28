<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;





    protected $fillable=['customer_id','vendor_id','total_price','total_discount','total_delivery','total_item','order_number','funnel',
        'status','payment_status','is_refund','transaction_id','gatway_response','created_at','updated_at'
        ];

    public static function createOrder($data){
        return self::insert($data);
    }
}
