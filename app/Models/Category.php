<?php

namespace App\Models;

use App\Models\CategoryProduct;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static function insertRecord($categories, $id, $sku)
    {
        $parent=null;
        $count=0;
        $delete = CategoryProduct::where('product_sku', '=', $sku)->delete();
        foreach ($categories as $key => $value) {
            
            $cat = self::where('name', $value)->first();
            if (!$cat) {
                $cat = new self;
                $cat->name = $value;
                $cat->parent_id = $parent;
                $cat->created_at = Carbon::now();
                $cat->save();
            }
          
                $parent=$cat->id;
            
            $count++;

        }
        CategoryProduct::insert(['category_id' => $cat->id, 'product_sku' => $sku, 'product_id' => $id, 'created_at' => Carbon::now()]);

        return true;
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'category_products');

    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function grandchildren()
    {
        return $this->children()->with('grandchildren');
    }

    // $categories=Category::with('children.grandchildren')->get();
    //   return($categories);
    //   exit;
}
