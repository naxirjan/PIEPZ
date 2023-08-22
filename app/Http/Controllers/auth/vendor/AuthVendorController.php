<?php

namespace App\Http\Controllers\auth\vendor;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Liberary\Media\Media;
use App\Models\Category;
use App\Models\Company;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AuthVendorController extends Controller
{
    public function vendorInformation()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.vendor.vendor-information', ['pageConfigs' => $pageConfigs]);
    }
    public function AddVendorInformation(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'coc_number' => 'required',
            'tax_number' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        $user = new User();
        $user->role = "vendor";
        $user->type = "vendor";
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];
        $user->country = $request['country'];
        $user->coc_number = $request['coc_number'];
        $user->tax_number = $request['tax_number'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);

        DB::transaction(function () use ($user, $request) {
            $user->save();

            /*
             * insert new record for company
             */
            $user_id = $user->id;
            $company = new Company();
            $company->user_id = $user_id;
            $company->company_name = $request['company_name'];
            $company->website_url = $request['website_url'];
            $company->save();
        });
        $user_id = $user->id;
        session(['user_id' => $user_id]);

        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.vendor.products-feed', ['pageConfigs' => $pageConfigs, 'user_id']);
    }

    public function productsFeed(Request $request)
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.vendor.products-feed', ['pageConfigs' => $pageConfigs]);
    }

    public function productsFeedSetup()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.vendor.products-feed-setup', ['pageConfigs' => $pageConfigs]);
    }
    public function confirmation(Request $request)
    {
        $id = $request["id"];
        $user = User::with('company')->find($id);
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.vendor.confirmation', ['pageConfigs' => $pageConfigs, 'user' => $user]);
    }

    public function productsImport()
    {
        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.vendor.products-import', ['pageConfigs' => $pageConfigs]);
    }

    public function Import(Request $request)
    {
        $user_data = $request->user_data;
        $user_id = $this->insertVendor($user_data);

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
                        // 'is_featured'=>isset($data[$custom_data['price']])?$data[$custom_data['price']]:0,
                        'stock' => isset($data[$custom_data['stock']]) ? $data[$custom_data['stock']] : 0,
                        'in_stock' => isset($data[$custom_data['in_stock']]) ? $data[$custom_data['in_stock']] : 0,
                        'low_stock' => isset($data[$custom_data['low_stock']]) ? $data[$custom_data['low_stock']] : 0,
                        'description' => isset($data[$custom_data['description']]) ? $data[$custom_data['description']] : null,
                        'image' => isset($data[$custom_data['image']]) ? $feature[0] : null,
                        // 'status'=>isset($data['Published'])?$data['Published']:0,
                        'category_id' => null,
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
        // $data=$request->rows[0];
        // dd($data);

        // dd($request->all());
        // $upload_file=Media::uploadMedia('imports',$request->file('file'));
        // dd($upload_file);
        // dd($request->file('file')->getClientOriginalExtension());
        // $xmlString = file_get_contents(\Storage::path('public/sample.xml'));
        // $xmlObject = simplexml_load_string($xmlString);

        // $json = json_encode($xmlObject);
        // $phpArray = json_decode($json, true);

        // dd($phpArray);
        return true;
        $data = Excel::import(new ProductsImport, $request->file('file'));
        dd($data);

        $data = Excel::importExcel($request->file);
    }

    public function insertVendor($data)
    {
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            $user = new User();
            $user->role = "vendor";
            $user->first_name = $data['firstName'];
            $user->last_name = $data['lastName'];
            $user->address = $data['address'];
            $user->phone = $data['phone'];
            $user->country = $data['country'];
            $user->coc_number = $data['cocnumber'];
            $user->tax_number = $data['taxnumber'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->save();

            $company = new Company();
            $company->user_id = $user->id;
            $company->company_name = $data['companyName'];
            $company->website_url = $data['websiteLink'];
            $company->save();
        }

        return $user->id;
    }
}
