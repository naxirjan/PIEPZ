<?php

namespace App\Http\Controllers\auth\partner;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Package;
use App\Models\PurchasePackage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthPartnerController extends Controller
{


    /**
     * Partner redirect to confirmation page untill admin approve user.
     *
     */
    public function partnerConfirmation(Request $request)
    {
        $id = $request["id"];
        $user = User::with('company', 'package')->find($id);

        $package_details = Package::find($user->package->package_id);

        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.partner.partner-confirmation', ['pageConfigs' => $pageConfigs, 'user' => $user, 'package_details' => $package_details]);
    }
    
    /**
     * Redirect to partner-registration multistep view.
     *
     */
     
    public function partner()
    {

        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.partner.auth-register-multisteps', ['pageConfigs' => $pageConfigs]);

    }

     /**
     *  Store new partner with selected package and addons.
     *
     */
     
    public function ajaxRequestPost(Request $request)
    {
        $result = json_encode($request->data, true);
        $decodedObject = json_decode($result, true);
        parse_str($decodedObject, $output);
        $output["email"];
        
         /**
        * Package duration variable contain package information price and duration
        **/
         
        $myArrays = explode(',', $output['package_duration']);
        $package_duration = $myArrays[0];
        $package_duration_price = $myArrays[1];
        $package_id = $myArrays[2];

         /**
          * if condition 
        * check if user email already registered and dispaly email exist message check 2 emails with google login and without google login second if
        * else condition store partner 
        * else has if - else user exist or not
        **/

        if (User::where('email', '=', $output["email"])->where('platform_token', '=', null)->first()) {
            return response()->json(['success' => true, 'msg' => 'You are already in .']);
        } else {
            $result = json_encode($request->data, true);
            $decodedObject = json_decode($result, true);
            parse_str($decodedObject, $output);
            $user = User::where('email', '=', $output["email"])->first();
            if (!$user) {
                $user = new User();
                $user->role = "partner";
                $user->first_name = $output['firstName'];
                $user->last_name = $output['lastName'];
                $user->address = $output['address'];
                $user->phone = $output['phone'];
                $user->country = $output['country'];
                $user->coc_number = $output['cocnumber'];
                $user->tax_number = $output['taxnumber'];
                $user->email = $output['email'];
                $user->password = Hash::make($output['password']);
                $user->save();

                $company = new Company();
                $company->user_id = $user->id;
                $company->company_name = $output['companyName'];
                $company->website_url = $output['websiteLink'];
                $company->save();
            }
            if ($user->role == null) {
                $user->role = "partner";
                $user->first_name = $output['firstName'];
                $user->last_name = $output['lastName'];
                $user->address = $output['address'];
                $user->phone = $output['phone'];
                $user->country = $output['country'];
                $user->coc_number = $output['cocnumber'];
                $user->tax_number = $output['taxnumber'];
                $user->email = $output['email'];
                $user->password = Hash::make($output['password']);
                $user->save();

                $company = new Company();
                $company->user_id = $user->id;
                $company->company_name = $output['companyName'];
                $company->website_url = $output['websiteLink'];
                $company->save();
            }
        }
        /*
         *  insert new package for partner with addons
         */
        $package = new PurchasePackage();
        $package->user_id = $user->id;
        $package->package_id = $package_id;
        $package->package_duration_price = $package_duration_price;
        $package->package_duration = $package_duration;

        if (!empty($output['addons'])) {
            $package->addons = serialize($output['addons']);
        }
        if (!empty($output['marketplaces'])) {
            $package->marketplaces = serialize($output['marketplaces']);
        }
        if (!empty($output['functionalities'])) {
            $package->functionalities = serialize($output['functionalities']);
        }
        if (!empty($output['webshops'])) {
            $package->webshops = serialize($output['webshops']);
        }

        $package->save();
        return response()->json(['success' => 'Got Simple Ajax Request.', 'id' => $user->id]);
    }

    
      /**
         * store partner with free trial package
        **/
    public function ajaxRequestPost1(Request $request)
    {
        $result = json_encode($request->data, true);
        $decodedObject = json_decode($result, true);
        parse_str($decodedObject, $output);

        if (User::where('email', '=', $output["email"])->where('platform_token', '=', null)->first()) {
            return response()->json(['success' => true, 'msg' => 'You are already in .']);
        } else {

            $result = json_encode($request->data, true);
            $decodedObject = json_decode($result, true);
            parse_str($decodedObject, $output);
            $user = User::where('email', '=', $output["email"])->first();
            if (!$user) {
                $user = new User();
                $user->role = "vendor";
                $user->first_name = $output['firstName'];
                $user->last_name = $output['lastName'];
                $user->address = $output['address'];
                $user->phone = $output['phone'];
                $user->country = $output['country'];
                $user->coc_number = $output['cocnumber'];
                $user->tax_number = $output['taxnumber'];
                $user->email = $output['email'];
                $user->password = Hash::make($output['password']);
                $user->save();

                $company = new Company();
                $company->user_id = $user->id;
                $company->company_name = $output['companyName'];
                $company->website_url = $output['websiteLink'];
                $company->save();
            }
            if ($user->role == null) {
                $user->role = "partner";
                $user->first_name = $output['firstName'];
                $user->last_name = $output['lastName'];
                $user->address = $output['address'];
                $user->phone = $output['phone'];
                $user->country = $output['country'];
                $user->coc_number = $output['cocnumber'];
                $user->tax_number = $output['taxnumber'];
                $user->email = $output['email'];
                $user->password = Hash::make($output['password']);
                $user->save();

                $company = new Company();
                $company->user_id = $user->id;
                $company->company_name = $output['companyName'];
                $company->website_url = $output['websiteLink'];
                $company->save();
            }
            /*
             *  insert new package for parner
             */
            $package = new PurchasePackage();
            $package->user_id = $user->id;
            $package->package_id = 1;
            $package->package_duration_price = 0;
            $package->package_duration = "14 days trail";

            $package->save();
            return response()->json(['success' => 'Got Simple Ajax Request.', 'id' => $user->id]);

        }

    }
}
