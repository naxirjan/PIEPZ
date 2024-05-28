<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItem;
use App\Models\Product;
use App\Models\ShippingAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class APIsController extends Controller
{
    //
  public static function productStoreApi(Request $request)
  {

    if(self::checkAuthentication($request->header()) == false) return response()->json(["sErrors" => "Authentication failed, wrong CLIENT ID & CLIENT SECRECT entered !..."]);

    $product = Product::where('sku', $request->sku)->first();

    if(($product->id ?? false)) return response()->json(["bReturn" => false, "sMessage" => "Product with SKU '".$request->sku."' already exists !..."]);

    $insert_data = [
      'sku' => $request->sku,
      'slug' => uniqid() . time(),
      'user_id' => Auth::id()??$request->user_id,
      'price' => $request->price,
      'name' => $request->name,
      'short_description' => $request->short_description,
      'is_featured' => $request->is_featured,
      'stock' => $request->stock,
      'in_stock' => $request->in_stock,
      'low_stock' => $request->low_stock,
      'description' => $request->description,
      'image' => $request->image,
      'status' => $request->status,
      'manufacturer' => $request->manufacturer,
      'shipping_price' => $request->shipping_price,
      'b2b_shipping' => $request->b2b_shipping,
      'additional_image2' => $request->additional_image2,
      'additional_image1' => $request->additional_image1,
      'additional_image3' => $request->additional_image3,
      'additional_image4' => $request->additional_image4,
      'additional_image5' => $request->additional_image5,
      'is_featured' => $request->is_featured,
      'type' => $request->type,
      'created_at' => Carbon::now(),
    ];

      $product = Product::create($insert_data);
      Category::insertRecord( explode(">",$request->category), $product->id, $request->sku);

      if($product) return response()->json(["bReturn" => true, "sMessage" => "Product added successfully !..."]);
      else return response()->json(["bReturn" => false, "sMessage" => "Something went wrong !.."]);
    }




  public static function insertOrderApi(Request $request){

    if(self::checkAuthentication($request->header()) == false) return response()->json(["sErrors" => "Authentication failed, wrong CLIENT ID & CLIENT SECRECT entered !..."]);


    $sErrors = "";
    $aReturnResult = array();
    $iSuccess = $iFailed = 0;
    $aOrders = ($request->orders ?? array());

    if(empty($aOrders)) return response()->json(["sErrors" => "Please add valid data !..."]);

    foreach($aOrders as $aOrder){

      $order = CustomerOrder::where('order_number', '=', $aOrder['order_data']['order_number'])->get()->count();

      if($order) {
        $sErrors .= $aOrder['order_data']['order_number'] . ",";
        $iFailed++;
      }
      else{
        $aOrder['order_data']['created_at'] = Carbon::now();
        $order = CustomerOrder::create($aOrder['order_data']);
        if($order->id){
          $aOrder['order_items_data']['order_id'] = $order->id;
          $aOrder['shipping_details_data']['order_id'] = $order->id;
          $aOrder['order_items_data']['created_at'] = Carbon::now();
          $aOrder['shipping_details_data']['created_at'] = Carbon::now();

          CustomerOrderItem::createOrderItem($aOrder['order_items_data']);
          ShippingAddress::insertAddress($aOrder['shipping_details_data']);

          $iSuccess++;
        }
      }
    }

    if($iSuccess > 0) {
      $aReturnResult["bReturn"] = true;
      $aReturnResult["sMessage"] = "$iSuccess order(s) inserted successfully !...";
    }
    if($iFailed > 0)
      $aReturnResult["sErrors"] = "Orders already exists with order number(s): ".rtrim($sErrors, ",");

    return response()->json($aReturnResult);

  }
  public static function updateOrderApi(Request $request){

    if(self::checkAuthentication($request->header()) == false) return response()->json(["sErrors" => "Authentication failed, wrong CLIENT ID & CLIENT SECRECT entered !..."]);

    $sErrors = "";
    $aReturnResult = array();
    $iSuccess = $iFailed = 0;
    $aOrders = ($request->orders ?? array());

    foreach($aOrders as  $aOrder){

      $sOrderNumber = $aOrder['order_number'];
      unset($aOrder['order_number']);

      $order = CustomerOrder::where("order_number", "=", $sOrderNumber)->get();

      if( $order->count() <= 0 ) {
        $sErrors .= "$sOrderNumber,";
        $iFailed++;
      }
      else{
        $update = CustomerOrder::where("id", "=" ,($order[0]->id ?? 0))->update($aOrder);
        if($update) $iSuccess++;
      }

    }

    if($iSuccess > 0) {
      $aReturnResult["bReturn"] = true;
      $aReturnResult["sMessage"] = "$iSuccess order(s) updated successfully !...";
    }

    if($iFailed > 0) $aReturnResult["sErrors"] = "Orders number(s): ".rtrim($sErrors, ",")." not found";

    return response()->json($aReturnResult);

  }

  public static function checkAuthentication($aParams){
    return (($aParams['clientid'][0] ?? "") == "cGllcHpfYXBpX3VzZXJuYW1lX2FkbWlu" && ($aParams['clientsecret'][0] ?? "") == "cGllcHpfYXBpX3Bhc3N3b3JkX2FkbWlu");
  }

}
