<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\CategoryProduct;

class Category extends Model
{
    use HasFactory;

    public static function insertRecord($categories,$id,$sku){
        $categories=explode(";",$categories);
        $delete=CategoryProduct::where('product_sku','=',$sku)->delete();
        foreach ($categories as $key => $value) {
            $cat=self::where('name',$value)->first();
            if (!$cat) {
            $cat=new self;
            $cat->name=$value;
            $cat->created_at=Carbon::now();
            $cat->save();
            }
            CategoryProduct::insert(['category_id'=>$cat->id,'product_sku'=>$sku,'product_id'=>$id,'created_at'=>Carbon::now()]);

        }
        return true;
    }
}
