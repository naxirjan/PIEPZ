<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;

    protected $fillable=[
        'sender_id',
        'receiver_id',
        'module',
        'module_id',
        'total_charges',
        'net_amount',
        'gateway_fee',
        'platform_fee',
        'gateway_transaction_id',
        'gateway_response',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    public static function insertData($data){
        return self::create($data);
    }
}
