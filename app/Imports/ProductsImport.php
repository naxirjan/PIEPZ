<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Liberary\Media\Media;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        set_time_limit(0);

        // ini_set('max_execution_time', -1); //3 minutes
        // ?Media::uploadMediaByContent('products',file_get_contents($row['images'])):null
        $image=filter_var($row['images'], FILTER_VALIDATE_URL);
        // dd($row);
        // dd($row['images']);
        return new Product([
            'sku'=>$row['sku'],
            'slug'=>time().uniqid(),
            'user_id'=>null,
            'price'=>25,
            'name'=>$row['name'],
            'description'=>$row['description'],
            'image'=>($image),
            'is_approved'=>1,
            'category_id'=>null,
        //    'is_featured'=>$row['is_featured'],
           'type'=>$row['type'],
           'short_description'=>$row['short_description'],
        //    'status'=>$row['published'],
           'stock'=>$row['stock']??0,
           'in_stock'=>$row['in_stock']??0,
           'low_stock'=>$row['low_stock_amount']??0,
            
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
