<?php
namespace App\Liberary\Payment;

class Stripe{

    public static function pay($payment_method,$amount,$back_url,$id,$module){
        if($payment_method=='ideal'|| $payment_method=='bancontact' || $payment_method=='alipay' ){
            $currency="eur";
        }else{
            $currency="usd";
        }
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        header('Content-Type: application/json');
        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => [
                        'name' => "Order Total",
                    ],
                    'unit_amount' => $amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'payment_method_types'=> [$payment_method],

            'success_url' => route('success') . '?amount=' . $amount ."&id=".$id."&module=".$module."&return_back=".$back_url."&session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cancel'),
        ]);

        header("HTTP/1.1 303 See Other");
        return $checkout_session->url;
        dd($checkout_session->url);
        return redirect()->to($checkout_session->url);
    }
}

?>