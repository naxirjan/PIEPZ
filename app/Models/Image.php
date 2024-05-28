<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Image extends Model
{
    use HasFactory;

    public static function uploadImage($images,$id,$type,$sku=null){
        if ($sku) {
        self::where('sku','=',$sku)->delete();
        }
        if (is_array($images)) {
            foreach ($images as $key => $value) {
                $media=new self;
                $media->media_url=$value;
                $media->module=$type;
                $media->module_id=$id;
                $media->sku=$sku;
                $media->created_at=Carbon::now();
                $media->save();
            }
        }
        return true;
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
