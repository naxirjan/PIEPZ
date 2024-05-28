<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


use App\Models\{CategoryProduct,
  Chat,
  CustomerOrder,
  GridSearching,
  User,
  ProductStatus,
  ProductType,
  Product,
  Category,
  Order};


class VendorController extends Controller
{


  //
  public function index()
  {
    return view('vendors.index');
  } // End Method
  // Analytics
  public function analytics()
  {
    return view('vendors.dashboard.analytics');
  }

  // Analytics
  public function crm()
  {
    return view('vendors.dashboard.crm');
  }

  // Analytics
  public function ecommerce()
  {
    return view('vendors.dashboard.ecommerce');
  }
  public function feedback()
  {
    return view('vendors.account.feedback');
  } // End Method

  public function page()
  {
    return view('vendors.account.myaccount');
  } // End Method

  public function information()
  {
    return view('vendors.account.user-information');
  } // End Method

  public function invoiceInformation()
  {
    return view('vendors.account.invoice-information');
  } // End Method

  public function sync()
  {
    return view('vendors.account.sync');
  } // End Method

  public function packages()
  {
    return view('vendors.account.packages');
  } // End Method



  /* USER - Start */

  // view user profile details
  public function userProfile($sUserId)
  {

    $iUserId =  base64_decode($sUserId);
    $data = User::find($iUserId);

    return view('admin.users.user-profile',["user_id"=>$sUserId,'data'=>$data]);
  }


  // profile setting
  public function myProfile()
  {
    $id = Auth::id();

    $data = User::find($id);

    return view('vendors.account-setting',["data"=>$data]);
  }

  //  profile setting
  public function updateProfile(Request $request)
  {

    $id = Auth::id();
    $user = User::find($id);
    $user->first_name = $request['firstName'];
    $user->last_name = $request['lastName'];
    $user->phone = $request['phone'];
    $user->address = $request['address'];
    $user->zip = $request['zip'];
    $user->country = $request['country'];
    if($request->file('profile_image')){
      $file = $request->file('profile_image');
      $filename = date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('uploads/profile_images'),$filename);
      $user['profile_image']  =    $filename;
    }

    $user->save();
    return back()->with('message', 'Profile Successfully Updated!');
  }


  public function changePassword(Request $request)
  {
    $request->validate([
      'current_password' => ['required', new MatchOldPassword],
      'new_password' => ['required'],
      'new_confirm_password' => ['same:new_password'],
    ]);

    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

    return back()->with('message', 'Password Successfully Updated!');
  }
  public function profileImage(Request $request)
  {
    $request->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('images'), $imageName);

    Image::create(['name' => $imageName]);

    return response()->json('Image uploaded successfully');
  }


  /* USER - Start */


  /* Products - Start */

  public function products($sStatus = "")
  {
    $iStatus = 0;
    $sConditions = "";
    if(!empty($sStatus)){
      $iStatus = base64_decode($sStatus);
      if($iStatus > 0) $sConditions = " AND MT.status = '".$iStatus."'";
    }

    $sQuery = "SELECT
    MT.id, MT.image, MT.name, MT.price, MT.stock, MT.in_stock, MT.sku, MT.created_at, PT.title as 'type', PS.title as 'status',
    CONCAT(U.first_name, ' ', U.last_name) AS 'vendor',
    CASE WHEN C.name IS NULL THEN '' ELSE GROUP_CONCAT(C.name ORDER BY C.name SEPARATOR '|' ) END AS 'categories'
    FROM products AS MT
    INNER JOIN users AS U ON MT.user_id = U.id
    INNER JOIN product_statuses AS PS ON MT.status = PS.id
    INNER JOIN category_products AS CP ON MT.id = CP.product_id AND MT.sku = CP.product_sku
    INNER JOIN categories AS C ON C.id = CP.category_id
    INNER JOIN product_types AS PT ON MT.type = PT.id
    WHERE 1=1
    $sConditions
    AND MT.user_id = '". Auth::id() ."'
    GROUP BY MT.id";

    $aProducts = DB::select($sQuery);

    return view('vendors.products.products', ['aProducts' => $aProducts, 'iStatus' => $iStatus]);
  }

  public function bulkEditProducts($sProductsId){

    $sProductsId = base64_decode($sProductsId);

    $sQuery = "SELECT
    MT.id, MT.image, MT.name, MT.price, MT.stock, MT.in_stock, MT.sku, MT.created_at, PT.title as 'type', PS.title as 'status',
    CONCAT(U.first_name, ' ', U.last_name) AS 'vendor',
    CASE WHEN C.name IS NULL THEN '' ELSE GROUP_CONCAT(C.name ORDER BY C.name SEPARATOR '|' ) END AS 'categories'
    FROM products AS MT
    INNER JOIN users AS U ON MT.user_id = U.id
    INNER JOIN product_statuses AS PS ON MT.status = PS.id
    INNER JOIN category_products AS CP ON MT.id = CP.product_id AND MT.sku = CP.product_sku
    INNER JOIN categories AS C ON C.id = CP.category_id
    INNER JOIN product_types AS PT ON MT.type = PT.id
    WHERE MT.id IN(".$sProductsId.")
    AND MT.user_id = '".Auth::id()."'
    GROUP BY MT.id";

    $aProducts = DB::select($sQuery);

    $aProductStatuses = ProductStatus::all()->toArray();
    $aProductCategories = Category::all()->toArray();
    $aProductTypes = ProductType::all()->toArray();

    return view('vendors.products.products-bulk-edit', ['aProducts' => $aProducts, "aProductStatuses" => $aProductStatuses, "aProductCategories" => $aProductCategories, "aProductTypes" => $aProductTypes]);
  }

  public function bulkEditProductsOperations(Request $request){

    $iCount = 0;
    $aData = $request->input('products');
    if(!is_array($aData)) $aData = array();

    foreach ($aData as $iKey => $aValues){

      $sSKU = $aValues['sku'];
      $sProductId = $aValues['id'];
      $aCategories = ($aValues['categories'] ?? array());

      $sSKU = base64_decode($sSKU);
      $iProductId = base64_decode($sProductId);

      unset($aValues['id']);
      unset($aValues['sku']);
      unset($aValues['categories']);

      $product = Product::where('id','=', $iProductId)->update($aValues);
      if($product) {
        $iCount++;
        if(count($aCategories) > 0) CategoryProduct::where("product_sku", "=", $sSKU)->delete();
        foreach ($aCategories as $iKey => $iCategoryId){
          CategoryProduct::insert(['category_id' => $iCategoryId, 'product_sku' => $sSKU, 'product_id' => $iProductId, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }
      }
    }

    if($iCount > 0) return response()->json(["bReturn" => true, "sMessage" =>"Products updated successully !..."]);
    else return response()->json(["bReturn" => false, "sMessage" => "Something went wrong !..."]);

  }

  /* Products - End */


  /* ORDERS -  Start*/

  // Orders screen
  public function orders($sStatus = "")
  {
    $iStatus = 0;
    $sConditions = "";
    if(!empty($sStatus)) {
      $iStatus = base64_decode($sStatus);
      if($iStatus > 0) $sConditions = " AND MT.status = '".$iStatus."'";
    }

    $sQuery = "SELECT MT.id, MT.order_number, MT.funnel, MT.tracking_code, MT.total_price, SUM(OI.quantity) AS 'quantity', MT.created_at, OS.id AS 'StatusId', OS.title AS 'status', CONCAT(U.first_name, ' ', U.last_name) AS 'customer'
          FROM customer_orders AS MT
          INNER JOIN order_statuses AS OS ON MT.status = OS.id
          INNER JOIN customer_order_items AS OI ON MT.id = OI.order_id
          INNER JOIN users AS U ON MT.customer_id = U.id
          WHERE 1=1
          AND MT.vendor_id = '". Auth::id() ."'
          $sConditions
          GROUP BY MT.id
          ";

    $aOrders = DB::select($sQuery);

    return view('vendors.orders.orders', ["aOrders" => $aOrders, "iStatus" => $iStatus]);
  }


  // view order details
  public function orderDetails($iOrderId)
  {
    $iOrderId = base64_decode($iOrderId);

    $sQuery = "SELECT MT.*, OS.title AS 'sStatus', P.id as 'product_id', P.sku, P.name as 'product_name', P.image as 'product_image', P.price AS 'product_price', OI.quantity AS 'product_quantity',
            CONCAT(U1.first_name, ' ', U1.last_name) AS 'customer',
            CONCAT(U2.first_name, ' ', U2.last_name) AS 'vendor',
            U1.address AS 'customer_address',
            U2.address AS 'vendor_address'
          FROM customer_orders AS MT
          INNER JOIN order_statuses as OS ON MT.status = OS.id
          INNER JOIN shipping_addresses as SA ON MT.id = SA.order_id
          INNER JOIN customer_order_items as OI ON MT.id = OI.order_id
          INNER JOIN products as P ON P.id = OI.product_id
          INNER JOIN users as U1 ON MT.customer_id = U1.id
          INNER JOIN users as U2 ON MT.vendor_id = U2.id
          WHERE 1=1 AND MT.id = '".$iOrderId."'";

    $aOrderData = DB::select($sQuery);

    $aOrderStatuses = DB::table('order_statuses')->get()->toArray();

    return view('vendors.orders.order-detail', ['aOrderData' => $aOrderData, 'aOrderStatuses' => $aOrderStatuses]);
  }

  public  function updateOrderStatus(Request $request){

    $iOrderId = base64_decode($request->input('data-id'));
    unset($request['_token']);
    unset($request['data-id']);

    CustomerOrder::where('id', $iOrderId)->update($request->all());

    return redirect()->back()->with('msg', 'Order information updated successfully...');

  }


  // view order invoice
  public function orderInvoice()
  {
    return view('vendors.orders.order-invoice');
  } // End Method

  /* ORDERS -  End*/



  /* * * ORDER INVOICES - Start * * */

  // Invoices
  public function invoices($sStatus = "")
  {
    $iStatus = 0;
    $sConditions = "";
    if(!empty($sStatus)){
      $iStatus = base64_decode($sStatus);
      if($iStatus > 0) $sConditions = " AND MT.status = '".$iStatus."'";
    }

    // Invoices
    $sQuery = "SELECT MT.id, MT.order_number, MT.funnel, MT.tracking_code, SUM(MT.total_price) as 'total_price', SUM(OI.quantity) AS 'quantity', MT.created_at, OS.id AS 'StatusId', OS.title AS 'status', CONCAT(U.first_name, ' ', U.last_name) AS 'partner', CONCAT(U2.first_name, ' ', U2.last_name) AS 'vendor'
        FROM customer_orders AS MT
        INNER JOIN order_statuses as OS ON MT.status = OS.id
        INNER JOIN customer_order_items as OI ON MT.id = OI.order_id
        INNER JOIN users as U ON MT.customer_id = U.id
        INNER JOIN users as U2 ON MT.vendor_id = U2.id
        WHERE 1=1
        AND MT.vendor_id = '".Auth::id()."'
        $sConditions
        ";

    $aInvoices = DB::select("$sQuery GROUP BY MT.id ORDER BY MT.id ASC");

    return view('vendors.orders.invoices', ["aInvoices" => $aInvoices, "iStatus" => $iStatus]);
  }

  // view invoice details
  public function invoiceDetails($sInvoiceId)
  {
    $iInvoiceId = base64_decode($sInvoiceId);

    $sQuery = "SELECT MT.id, MT.order_number, MT.funnel, MT.tracking_code, MT.total_price, OI.quantity, MT.created_at, MT.status, OS.title AS 'sStatus', CONCAT(U.first_name, ' ', U.last_name) AS 'partner', CONCAT(U2.first_name, ' ', U2.last_name) AS 'vendor'
        FROM customer_orders AS MT
        INNER JOIN order_statuses as OS ON MT.status = OS.id
        INNER JOIN customer_order_items as OI ON MT.id = OI.order_id
        INNER JOIN users as U ON MT.customer_id = U.id
        INNER JOIN users as U2 ON MT.vendor_id = U2.id
        WHERE 1=1
        AND MT.vendor_id = '".Auth::id()."'
        AND MT.id = '".$iInvoiceId."'";

    $aInvoices= DB::select($sQuery);

    return view('vendors.orders.invoice-detail', ['aInvoices' => $aInvoices]);
  }



  public function invoiceDownload($sInvoiceId)
  {
    $iInvoiceId = base64_decode($sInvoiceId);
  }

  /* * * ORDER INVOICES - End * * */


  /* * * SUPPORT - Start * * */

  public function tickets($sStatus = "")
  {
    $iStatus = 0;
    $sConditions = "";

    if(!empty($sStatus)) {
      $iStatus  = base64_decode($sStatus);
      if($iStatus > 0) $sConditions = " AND T.status = '".$iStatus."' ";
    }

    $sQuery = "SELECT T.id, T.title as 'question', CO.order_number, CONCAT(C.first_name, ' ', C.last_name) AS 'customer', T.status
    FROM tickets AS T
    INNER JOIN customer_orders AS CO ON CO.id = T.order_id
    INNER JOIN users AS C ON T.ticket_created_by = C.id
    WHERE 1=1
    AND T.ticket_created_for = '".Auth::id()."'
    $sConditions";

    $aTickets = DB::select($sQuery);

    return view('vendors.support.tickets', ['aTickets' => $aTickets, "iStatus" => $iStatus]);
  }


  // view vendor tickets details
  public function ticketDetails($sTicketId)
  {
    $iTicketId = base64_decode($sTicketId);


    $data = DB::table('tickets')->where('id',$iTicketId)->first();

    $id = $data->customer_id;

    $messages = [];
    $otherUser= [];

    if($id){
      $otherUser = User::findorfail($id);
      $group_id = (Auth::id()>$id)?Auth::id().$id:$id.Auth::id();
      $messages = Chat::where('group_id',$group_id)->get()->toArray();
    }
    $friend = User::where('id','!=',Auth::id())->get()->toArray();

    return view('vendors.support.ticket-details',compact('friend','messages','otherUser', 'id', 'data'));

  } // End Method

  /* * * SUPPORT - End * * */







}
