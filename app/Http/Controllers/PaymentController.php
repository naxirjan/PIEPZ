<?php

namespace App\Http\Controllers;

use App\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Package;
use App\Models\PurchasePackage;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    //
    public function payment(Request $request)
    {
        $amount = !empty($request->total) ? $request->total : 50;
        \Stripe\Stripe::setApiKey('sk_test_FOL8T70wHhBoMSzdVoIPC5qs00zCh2HlPQ');
        header('Content-Type: application/json');
        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => "Total",
                    ],
                    'unit_amount' => $amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('success') . '?amount=' . $amount . "&id=" . $request->id . "&session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cancel'),
        ]);

        header("HTTP/1.1 303 See Other");
        return redirect()->to($checkout_session->url);
    }
    public function cancel()
    {

    }
    public function success(Request $request)
    {
        // dd($request->all());
       $user= $this->ajaxRequestPost1($request->all());
        $data = [
            'sender_id' => $user->id,
            'receiver_id' => 265,
            'module' => 'subscribe',
            'module_id' => 1,
            'total_charges' => $request['amount'],
            'net_amount' => 0,
            'gateway_fee' => 0,
            'platform_fee' => 0,
            'gateway_transaction_id' => uniqid(),
            'gateway_response' => null,
            'created_at' => Carbon::now(),
        ];

        $transactiondata = UserTransaction::insertData($data);
        return redirect()->route('partner.confirmation', ['id' => $user->id]);

    }

    public function payment1(){
        $stripe = new \Stripe\StripeClient("sk_test_FOL8T70wHhBoMSzdVoIPC5qs00zCh2HlPQ");



                header('Content-Type: application/json');

                try {
                    // retrieve JSON from POST body
                    $jsonStr = file_get_contents('php://input');
                    $jsonObj = json_decode($jsonStr);
                    // dd($jsonObj);

                    // Create a PaymentIntent with amount and currency
                    $paymentIntent = $stripe->paymentIntents->create([
                        'amount' => $this->calculateOrderAmount($jsonObj->items[0]->price),
                        'currency' => 'usd',
                        // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
                        'automatic_payment_methods' => [
                            'enabled' => true,
                        ],
                    ]);

                    $output = [
                        'clientSecret' => $paymentIntent->client_secret,
                    ];

                    echo json_encode($output);
                } catch (Error $e) {
                    http_response_code(500);
                    echo json_encode(['error' => $e->getMessage()]);
                }
            }

            function calculateOrderAmount( $items) {
                // Replace this constant with a calculation of the order's amount
                // Calculate the order total on the server to prevent
                // people from directly manipulating the amount on the client
                return 100*$items;
            }

    
        public function checkout(){
            return view('checkout');
        }
        

public function ajaxRequestPost1( $output)
    {
        $request=$output;
        // $result = json_encode($request->data, true);
        // $decodedObject = json_decode($result, true);
        // parse_str($decodedObject, $output);
        // $output["email"];

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
        return $user;
        return response()->json(['success' => 'Got Simple Ajax Request.', 'id' => $user->id]);
    }
}
