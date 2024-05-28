<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CategoryProduct;
use App\Models\Chat;
use App\Models\CustomerOrder;
use App\Models\GridSearching;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\SubCategory;
use Auth;
use Redirect;

class AdminController extends Controller
{
    // view dashboard screen
    public function index()
    {
        return view('admin.index');
    }

    // Analytics
    public function analytics()
    {
      return view('admin.dashboard.analytics');
    }

    // Analytics
    public function crm()
    {
      return view('admin.dashboard.crm');
    }

    // Analytics
    public function ecommerce()
    {
      return view('admin.dashboard.ecommerce');
    }


    /* * * USERS - Start * * */

    // view users screen
    public function users($sRoleId = "")
    {
      $sConditions = "";
      $iRoleId = 0;
      $iUserId = Auth::id();

      if(!empty($sRoleId)) {
        $iRoleId = base64_decode($sRoleId);
        if($iRoleId > 0) $sConditions = " AND U.role_id = '".$iRoleId."'";
      }

      $sQuery = "SELECT U.id, U.first_name AS 'username', U.email, U.role_id, R.role, CO.created_at AS 'date', CONCAT(U1.first_name, ' ', U1.last_name) AS 'customer',
        COUNT(CO.id) AS 'orders', SUM(CO.total_price) AS 'orders_amount'
        FROM users AS U
        LEFT JOIN roles AS R ON U.role_id = R.id
        LEFT JOIN customer_orders AS CO ON CO.customer_id = U.id
        LEFT JOIN users AS U1 ON CO.vendor_id = U1.id
        WHERE 1=1
        AND U.id <> '".$iUserId."'
        $sConditions
        GROUP BY U.id";

      $aUsers = DB::select($sQuery);

      return view('admin.users.users', ['aUsers' => $aUsers, 'iRoleId' => $iRoleId]);
    }

    // users bulk edit
    public function usersBulkEdit($sUsersId){

      $sUsersId = base64_decode($sUsersId);

      $sQuery = "SELECT U.id, U.role_id, U.status, U.first_name, U.last_name, U.country, CASE WHEN U.status = 1 THEN 'Active' ELSE 'Inactive' END AS 'sStatus', R.role FROM users AS U
      INNER JOIN roles AS R ON U.role_id = R.id
      WHERE 1=1 AND U.id IN(".$sUsersId.")";

      $aUsers = DB::select($sQuery);

      $aRoles = User::roles();

      return view('admin.users.users-bulk-edit', ['aUsers' => $aUsers, "aRoles" => $aRoles]);
  }

    public function usersBulkEditOperations(Request $request){

    $aData = $request->input('users');

    if(!is_array($aData)) $aData = array();
    foreach ($aData as  $aValues){

      $sUserId = $aValues['id'];
      $iUserId = base64_decode($sUserId);
      unset($aValues['id']);

      User::where('id','=', $iUserId)->update($aValues);
    }

    return response()->json(["bReturn" => true, "sMessage" =>"Users updated successully !..."]);
  }

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

      return view('admin.account-setting',["data"=>$data]);
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

  /* * * USERS - End * * */


    /* * * PRODUCTS - Start * * */
    public function products($sStatus = "")
    {
      $iStatus = 0;
      $sConditions = "";
      if(!empty($sStatus)){
        $iStatus = base64_decode($sStatus);
        if($iStatus > 0) $sConditions = " AND MT.status = '".$iStatus."'";
      }

      $sQuery = "SELECT
      MT.id, MT.image, MT.name, MT.price, MT.stock, MT.in_stock, MT.sku, MT.created_at, PT.title as 'type', PS.id as 'StatusId', PS.title as 'status',
      CONCAT(U.first_name, ' ', U.last_name) AS 'vendor',
      CASE WHEN C.name IS NULL THEN '' ELSE GROUP_CONCAT(C.name ORDER BY C.name SEPARATOR '|' ) END AS 'categories'
      FROM products AS MT
      INNER JOIN users AS U ON MT.user_id = U.id
      INNER JOIN product_statuses AS PS ON MT.status = PS.id
      INNER JOIN category_products AS CP ON MT.id = CP.product_id AND MT.sku = CP.product_sku
      INNER JOIN categories AS C ON C.id = CP.category_id
      LEFT JOIN product_types AS PT ON MT.type = PT.id
      WHERE 1=1
      $sConditions
      GROUP BY MT.id";

      $aProducts = DB::select($sQuery);

      return view('admin.products.products', ['aProducts' => $aProducts, 'iStatus' => $iStatus]);
    }

    // view product details
    public function productView($iProductId)
  {
    $iProductId = base64_decode($iProductId);
    $product = Product::with('images')->findOrFail($iProductId);

    return view('admin.products.product-view', compact('product'));
  }

    //edit product
    public function productEdit($sProductId)
  {
    $iProductId = base64_decode($sProductId);
    $product = Product::with('category')->findOrFail($iProductId);
    $categories = Category::all();
    $vendors = User::where('role_id', '=', 2)->get();
    return view('admin.products.product-edit', compact('product', 'categories', 'vendors'));
  }

    public function bulkEditProducts($sProductsId){
      $sProductsId = base64_decode($sProductsId);

      $sQuery = "SELECT
      MT.id, MT.image, MT.name, MT.price, MT.stock, MT.in_stock, MT.sku, MT.created_at, PT.title as 'type', PS.id as 'StatusId', PS.title as 'status',
      CONCAT(U.first_name, ' ', U.last_name) AS 'vendor',
      CASE WHEN C.name IS NULL THEN '' ELSE GROUP_CONCAT(C.name ORDER BY C.name SEPARATOR '|' ) END AS 'categories'
      FROM products AS MT
      INNER JOIN users AS U ON MT.user_id = U.id
      INNER JOIN product_statuses AS PS ON MT.status = PS.id
      INNER JOIN category_products AS CP ON MT.id = CP.product_id AND MT.sku = CP.product_sku
      INNER JOIN categories AS C ON C.id = CP.category_id
      LEFT JOIN product_types AS PT ON MT.type = PT.id
      WHERE MT.id IN(".$sProductsId.")
      GROUP BY MT.id";

      $aProducts = DB::select($sQuery);

      $aProductStatuses = ProductStatus::all()->toArray();
      $aProductCategories = Category::all()->toArray();
      $aProductTypes = ProductType::all()->toArray();

      return view('admin.products.products-bulk-edit', ['aProducts' => $aProducts, "aProductStatuses" => $aProductStatuses, "aProductCategories" => $aProductCategories, "aProductTypes" => $aProductTypes]);
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
   /* * * PRODUCTS - End * * */



    /* * * ORDERS - Start * * */

    // create new order
    public function createNewOrder()
    {
      return view('admin.orders.create-new-order');
    }

    // view orders
    public function orders($sStatus = "")
    {
      $iStatus = 0;
      $sConditions = "";
      if(!empty($sStatus)) {
        $iStatus = base64_decode($sStatus);
        if($iStatus > 0) $sConditions = " AND MT.status = '".$iStatus."'";
      }

      $sQuery = "SELECT MT.id, MT.order_number, MT.funnel, MT.tracking_code, MT.total_price, OI.quantity, MT.created_at, OS.id AS 'StatusId', OS.title AS 'status', CONCAT(U.first_name, ' ', U.last_name) AS 'partner', CONCAT(U2.first_name, ' ', U2.last_name) AS 'vendor'
          FROM customer_orders AS MT
          INNER JOIN order_statuses as OS ON MT.status = OS.id
          INNER JOIN customer_order_items as OI ON MT.id = OI.order_id
          INNER JOIN users as U ON MT.customer_id = U.id
          INNER JOIN users as U2 ON MT.vendor_id = U2.id
          WHERE 1=1 $sConditions";

      $aOrders = DB::select($sQuery);

      return view('admin.orders.orders', ["aOrders" => $aOrders, "iStatus" => $iStatus]);
    }


  // view order details
  public function orderDetails($sOrderId)
  {
    $iOrderId = base64_decode($sOrderId);

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

    $aComments = Comment::where('order_id', '=', $iOrderId)->get()->toArray();

    return view('admin.orders.order-detail', ['aOrderData' => $aOrderData, 'aOrderStatuses' => $aOrderStatuses, 'aComments' => $aComments]);
  }

  public  function updateOrderStatus(Request $request){

    $iOrderId = base64_decode($request->input('data-id'));
    unset($request['_token']);
    unset($request['data-id']);

    CustomerOrder::where('id', $iOrderId)->update($request->all());

    return redirect()->back()->with('msg', 'Order information updated successfully...');

  }

  public function  orderComment(Request $request){

    $comment = New Comment();
    $comment->order_id = $request->order_id;
    $comment->comments = $request->comment;
    $comment->save();
    return back()->with('msg', 'Comment Added Successfully !');
  }

   public function orderInvoice()
      {
        return view('admin.orders.order-invoice');
      }

  /* * * ORDERS - End * * */


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
        $sConditions
        ";

    $aInvoices = DB::select("$sQuery GROUP BY MT.id ORDER BY MT.id ASC");


    return view('admin.orders.invoices', ["aInvoices" => $aInvoices, "iStatus" => $iStatus]);
  }

  // view invoice details
  public function invoiceDetails($sInvoiceId)
  {
    $iInvoiceId = base64_decode($sInvoiceId);

    $sQuery = "SELECT MT.id, MT.order_number, MT.funnel, MT.tracking_code, MT.total_price, OI.quantity, MT.created_at, OS.id AS 'StatusId', OS.title AS 'status', CONCAT(U.first_name, ' ', U.last_name) AS 'partner', CONCAT(U2.first_name, ' ', U2.last_name) AS 'vendor'
        FROM customer_orders AS MT
        INNER JOIN order_statuses as OS ON MT.status = OS.id
        INNER JOIN customer_order_items as OI ON MT.id = OI.order_id
        INNER JOIN users as U ON MT.customer_id = U.id
        INNER JOIN users as U2 ON MT.vendor_id = U2.id
        WHERE 1=1
        AND MT.id = '".$iInvoiceId."'";

    $aInvoiceData = DB::select($sQuery);

    return view('admin.orders.invoice-detail', ['aInvoiceData' => $aInvoiceData]);
  }

  public function invoiceDownload($sInvoiceId)
  {
    $iInvoiceId = base64_decode($sInvoiceId);
  }

  /* * * ORDER INVOICES - End * * */




  /* * *Categories start * * */

      public function categories(){
          $sQuery = "SELECT c1.id, c1.name AS 'category',c1.status, c1.created_at,
          GROUP_CONCAT(c2.name ORDER BY c2.id SEPARATOR'|') AS 'sub_categories'
          FROM categories AS c1
              LEFT JOIN categories AS c2 ON c1.id = c2.parent_id
           WHERE c1.parent_id IS NULL
           AND 1=1
           GROUP BY c1.id ORDER BY c1.id";

        $aCategories = DB::select($sQuery);
        $aAllCategories = Category::get();

        return view("admin.products.categories.categories", [ 'aCategories' => $aCategories, 'aAllCategories' => $aAllCategories]);
      }

      public function addCategory(Request $request){
        $data = New Category();
        $data->name = $request->category_name;
        $data->save();

        return redirect()->back();
      }

      public function addSubcategory(Request $request){
        $data = New Category();
        $data->parent_id = $request->category_id;
        $data->name = $request->sub_category_name;
        $data->save();

        return redirect()->back();
      }

      public function updateCategory(Request $request){
        $aCategories = Category::get();
        $aSubCategories = SubCategory::with('category')->get();

        $data = New Category();
        $data->name = $request->category_name;
        $data->save();
        return redirect()->back();
      }

      public function updateSubcategory(Request $request){
        $aCategories = Category::get();
        $aSubCategories = SubCategory::with('category')->get();

        $data = New SubCategory();
        $data->category_id = $request->category_id;
        $data->name = $request->sub_category_name;
        $data->save();
        return redirect()->back();
      }


    /* * * SUPPORT - Start * * */

  public function tickets($sParams = "")
  {
    $iRoleId = 2;
    $iStatus = 0;

    if(!empty($sParams)) {
      $sParams  = base64_decode($sParams);
      $aParams = explode("|", $sParams);
      $iRoleId = ($aParams[0] ?? 2);
      $iStatus = ($aParams[1] ?? 0);
    }

    $sQuery = "SELECT T.id, T.title as 'question', O.order_number, CONCAT(C.first_name, ' ', C.last_name) AS 'customer', T.status
    FROM tickets AS T
    INNER JOIN users AS C ON T.customer_id = C.id
    INNER JOIN customer_orders AS O ON T.order_id = O.id
    WHERE 1=1
    AND C.role_id = '".$iRoleId."'
    AND T.status = '".$iStatus."'";

    $aTickets = DB::select($sQuery);

    return view('admin.support.tickets', ['aTickets' => $aTickets, "iRoleId" => $iRoleId, "iStatus" => $iStatus]);
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

    return view('admin.support.ticket-details',compact('friend','messages','otherUser', 'id', 'data'));

  } // End Method

  /* * * SUPPORT - End * * */


}
