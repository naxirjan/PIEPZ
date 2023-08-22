<?php

namespace App\Http\Controllers;

use App\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $data = [
            'sender_id' => $request->id,
            'receiver_id' => 184,
            'module' => 'subscribe',
            'module_id' => 1,
            'total_charges' => $request->amount,
            'net_amount' => 0,
            'gateway_fee' => 0,
            'platform_fee' => 0,
            'gateway_transaction_id' => $request->session_id,
            'gateway_response' => null,
            'created_at' => Carbon::now(),
        ];

        $transactiondata = UserTransaction::insertData($data);
        return redirect()->route('partner.confirmation', ['id' => $request->id]);

    }
}
