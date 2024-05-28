<?php
namespace App\Liberary\Import;

use App\Models\Category;
use App\Models\Company;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Auth;
// use App\Liberay\Media\Media;
use App\Liberary\Media\Media;

class ProductImport{

    public static function import($request){
        $user_id =Auth::user()->id;
        $custom_data = $request->form_data;
        $retun_links = array('33');
        if ($request->rows) {
            foreach ($request->rows as $key => $data) {
                if (isset($data[$custom_data['sku']])) {
                    $p = Product::where('sku', $data[$custom_data['sku']])->first();
                    $feature = isset($data[$custom_data['image']]) ? Media::uploadMediaByContent('products', explode(',', $data[$custom_data['image']])) : null;
                    $insert_data = [
                        'sku' => isset($data[$custom_data['sku']]) ? $data[$custom_data['sku']] : 0,
                        'slug' => uniqid() . time(),
                        'user_id' => $user_id,
                        'price' => isset($data[$custom_data['price']]) ? $data[$custom_data['price']] : 0,
                        'name' => isset($data[$custom_data['name']]) ? $data[$custom_data['name']] : null,
                        'short_description' => isset($data[$custom_data['price']]) ? $data[$custom_data['price']] : null,
                        'stock' => isset($data[$custom_data['stock']]) ? $data[$custom_data['stock']] : 0,
                        'in_stock' => isset($data[$custom_data['in_stock']]) ? $data[$custom_data['in_stock']] : 0,
                        'low_stock' => isset($data[$custom_data['low_stock']]) ? $data[$custom_data['low_stock']] : 0,
                        'description' => isset($data[$custom_data['description']]) ? $data[$custom_data['description']] : null,
                        'image' => isset($data[$custom_data['image']]) ? $feature[0] : null,
                        'category_id' => null,
                        'manufacturer' => isset($data[$custom_data['manufacturer']]) ? $data[$custom_data['manufacturer']] : null,
                        'shipping_price' => isset($data[$custom_data['shipping_price']]) ? $data[$custom_data['shipping_price']] : null,
                        'b2b_shipping' => isset($data[$custom_data['b2b_shipping']]) ? $data[$custom_data['b2b_shipping']] : null,

                        'created_at' => Carbon::now(),
                    ];
                    if (!$p) {
                        $pro = Product::create($insert_data);
                        $cat = Category::insertRecord($data['Categories'], $pro->id, $data[$custom_data['sku']]);
                        $images = Image::uploadImage($feature, $pro->id, 'products', $data[$custom_data['sku']]);
                    } else {
                        $pro = Product::where('id', '=', $p->id)->update($insert_data);
                        $cat = Category::insertRecord($data['Categories'], $p->id, $data[$custom_data['sku']]);
                        $images = Image::uploadImage($feature, $p->id, 'products', $data[$custom_data['sku']]);
                    }

                }

            }
        }
        $return_array = array(
            'status' => true,
            'message' => "Record Added Succfully",
            "links" => $retun_links,
            'id' => $user_id,

        );
        echo json_encode($return_array);
        exit;

       
    
    }

    public static function import2($request){
        $user_id =Auth::user()->id;
        $custom_data = $request->form_data;
        unset($custom_data[0]);
        $insert_data=array();
        $retun_links = array('33');
        foreach ($request->rows as $key => $data) {
            foreach($custom_data as $header =>$column){
                if (preg_match('~^\p{Lu}~u', $header)) {
                    $insert_data[$key][$column]=isset($data[$header])?$data[$header]:null;
                    $insert_data[$key]['user_id']=Auth::user()->id;
                    $insert_data[$key]['slug']=uniqid().time();
                }
               
            }
        }
    //   dd($insert_data);
        foreach ($insert_data as $key => $value) {
            if (isset($value['sku'])) {
                $p = Product::where('sku', $value['sku'])->first();
            if (!$p) {
                $pro = Product::create($value);
                if (isset($value['category_id'])){
                    
                    $cat = Category::insertRecord(explode(">", $value['category_id']), $pro->id,  $value['sku']);
                }
            }else {
                $pro = Product::where('id', '=', $p->id)->update($value);
                if (isset($value['category_id'])){
                $cat = Category::insertRecord(explode(">", $value['category_id']), $p->id, $value['sku']);
            
              }
            }
          }  
            
        }
        
        $return_array = array(
            'status' => true,
            'message' => "Record Added Succfully",
            "links" => $retun_links,
            'id' => $user_id,

        );
        echo json_encode($return_array);
        exit;
                
    }
    public function backfun(){
        $columns = array_filter($custom_data);
        $unique_array=[];
        foreach($columns as $key =>$data){
            $unique_array[]= preg_replace("/[^0-9]/", '', $key); 
        
        }
        
        $duplicated=array();
        $values=array_values( $columns);
        foreach($unique_array as $k=>$v) {
        
        if( ($kt=array_search($v,$unique_array))!==false and $k!=$kt )
         { unset($unique_array[$kt]);  $duplicated[]=$v; }
        
        }
        $inter=(array_diff($unique_array,$duplicated));
        $final_ar=[];
        foreach($values as $key1 =>$val1){
            foreach($inter as $key2 => $val2){
            unset($values[$key2]);
         }
        }
        $retun_links = array('33');
        $columns=$values;
        $insert_data=array();
        if ($request->rows) {
            foreach ($request->rows as $key => $data) {
               for ($i=0; $i <count($columns) ; $i+=2) { 
                if ( isset($columns[$i]) || isset($data[$columns[$i]])) {
                    $insert_data[$key][$columns[$i+1]]=isset($data[$columns[$i]])?$data[$columns[$i]]:null;
                    $insert_data[$key]['user_id']=Auth::user()->id;
                    $insert_data[$key]['slug']=uniqid().time();

                }
               }
               
            }
           
        }
    }
}
?>