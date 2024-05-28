<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\GridSearching;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class PartnerController extends Controller
{

  public function index()
  {
    return view('partners.index');
  }


  public function feedback()
  {
    return view('partners.account.feedback');
  }

  public function support()
  {
    return view('partners.support.support');
  }


  public function chat()
  {
    return view('partners.support.chat');
  }

  public function analytics()
  {
    return view('admin.orders.analytics');
  }


  // account
  public function account()
  {
    return view('partners.account.myaccount');
  }

  // user information
  public function information()
  {
    return view('partners.account.user-information');
  }


  // invoice information
  public function invoiceInformation()
  {
    return view('partners.account.invoice-information');
  }


  // account sync
  public function sync()
  {
    return view('partners.account.sync');
  }


  // account sync piepz
  public function syncPiepz()
  {
    return view('partners.account.sync-piepz');
  }



  // view order invoice
  public function orderInvoice()
  {
    return view('partners.orders.order-invoice');
  }


  /* ORDERS -  End*/
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

    return view('partners.account-setting',["data"=>$data]);
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
          INNER JOIN customer_order_items AS OI ON MT.order_number = OI.order_id
          INNER JOIN users AS U ON MT.customer_id = U.id
          WHERE 1=1
          AND MT.vendor_id = '". Auth::id() ."'
          $sConditions
          GROUP BY MT.id
          ";

    $aOrders = DB::select($sQuery);

    return view('partners.orders.orders', ["aOrders" => $aOrders, "iStatus" => $iStatus]);
  }

  // view order details
  public function orderDetails($iOrderId)
  {
    $iOrderId = base64_decode($iOrderId);

    $aOrderData = DB::table('customer_orders AS MT')
      ->join("customer_order_items as COI", "MT.id", "=", "COI.order_id")
      ->join("products as P", "P.id", "=", "COI.product_id")
      ->join("users as U", "MT.customer_id", "=", "U.id")
      ->select('P.image','P.sku','P.name','MT.id', 'MT.order_number', 'MT.funnel', 'MT.tracking_code', 'MT.status', DB::raw("CONCAT(U.first_name, ' ', U.last_name) AS customer_id") ,'MT.total_price','MT.total_item', 'MT.created_at as order_date',
        DB::raw('(CASE WHEN MT.status = "0" THEN "Pending" WHEN MT.status = "1" THEN "Completed" ELSE "Cancelled" END) AS sStatus'))
      ->where("MT.id", "=", $iOrderId)
      ->where('MT.vendor_id', "=", Auth::id())
      ->get()->toArray();

    return view('partners.orders.order-detail', ['aOrderData' => $aOrderData]);
  }



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


    return view('partners.orders.invoices', ["aInvoices" => $aInvoices, "iStatus" => $iStatus]);
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

    return view('partners.orders.invoice-detail', ['aInvoices' => $aInvoices]);
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

    return view('partners.support.tickets', ['aTickets' => $aTickets, "iStatus" => $iStatus]);
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

    return view('partners.support.ticket-details',compact('friend','messages','otherUser', 'id', 'data'));

  } // End Method

  /* * * SUPPORT - End * * */




}
