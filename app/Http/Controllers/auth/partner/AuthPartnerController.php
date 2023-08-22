<?php

namespace App\Http\Controllers\auth\partner;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Package;
use App\Models\PurchasePackage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthPartnerController extends Controller
{

    public function partnerConfirmation(Request $request)
    {
        $id = $request["id"];
        $user = User::with('company', 'package')->find($id);

        $package_details = Package::find($user->package->package_id);

        // $addons_id = unserialize($user->package->addons);
        // $addons = PurchasePackageAddon::whereIn('id', $addons_id)->get();

        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.partner.partner-confirmation', ['pageConfigs' => $pageConfigs, 'user' => $user, 'package_details' => $package_details]);
    }

    public function partner()
    {

        $pageConfigs = ['myLayout' => 'blank'];
        return view('auth.partner.auth-register-multisteps', ['pageConfigs' => $pageConfigs]);

    }

    public function ajaxRequestPost(Request $request)
    {
        $result = json_encode($request->data, true);
        $decodedObject = json_decode($result, true);
        parse_str($decodedObject, $output);
        $output["email"];

        $myArrays = explode(',', $output['package_duration']);
        $package_duration = $myArrays[0];
        $package_duration_price = $myArrays[1];
        $package_id = $myArrays[2];

        $user = new User();
        $user->role = "partner";
        $user->first_name = $output["firstName"];
        $user->last_name = $output["lastName"];
        $user->address = $output["address"];
        $user->zip = $output["zip"];
        $user->phone = $output["phone"];
        $user->country = $output["country"];
        $user->email = $output["email"];
        $user->password = Hash::make($output["password"]);
        $user->coc_number = $output["cocnumber"];
        $user->tax_number = $output["taxnumber"];

        DB::transaction(function () use ($output, $user, $request) {
            $user->save();
            /*
             * insert new record for company
             */
            $user_id = $user->id;
            $company = new Company();
            $company->user_id = $user_id;
            $company->company_name = $output["companyName"];
            $company->website_url = $output["websiteLink"];
            $company->save();

        });

        /*
         *  insert new package for user
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

    public function ajaxRequestPost1(Request $request)
    {
        $result = json_encode($request->data, true);
        $decodedObject = json_decode($result, true);
        parse_str($decodedObject, $output);
        $output["email"];

        $user = new User();
        $user->role = "partner";
        $user->first_name = $output["firstName"];
        $user->last_name = $output["lastName"];
        $user->address = $output["address"];
        $user->zip = $output["zip"];
        $user->phone = $output["phone"];
        $user->country = $output["country"];
        $user->email = $output["email"];
        $user->password = Hash::make($output["password"]);
        $user->coc_number = $output["cocnumber"];
        $user->tax_number = $output["taxnumber"];

        DB::transaction(function () use ($output, $user, $request) {
            $user->save();
            /*
             * insert new record for company
             */
            $user_id = $user->id;
            $company = new Company();
            $company->user_id = $user_id;
            $company->company_name = $output["companyName"];
            $company->website_url = $output["websiteLink"];
            $company->save();

        });

        /*
         *  insert new package for user
         */
        $package = new PurchasePackage();
        $package->user_id = $user->id;
        $package->package_id = 4;
        $package->package_duration_price = 0;
        $package->package_duration = "14 days trail";

        $package->save();
        return response()->json(['success' => 'Got Simple Ajax Request.', 'id' => $user->id]);
    }
}
