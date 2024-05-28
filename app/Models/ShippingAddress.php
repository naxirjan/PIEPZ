<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable=['name','surname','company','city','order_id',
    'country','address','postalcode','state','created_at','updated_at','mobile','phone','email'];

    public static function insertAddress($data){
        return self::create($data);
    }
}
