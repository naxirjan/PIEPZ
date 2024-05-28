<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportFile extends Model
{
    use HasFactory;

    protected $fillable=['user_id','file_type','file_url','created_at','updated_at'];
    
    public static function insertData($data){
        return self::create($data);

    }
    public static function updateById($id,$user_id){
        return self::where('id','=',$id)->update(['user_id'=>$user_id]);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
