<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LiqPay\LiqPay;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $amount = $request->input('amount');

        if (!$amount || $amount <= 0) {
            return redirect()->back()->with('error', 'Невірна сума!');
        }

        $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));

        $params = [
            'action'    => 'pay',
            'amount'    => $amount,
            'currency'  => 'UAH',
            'description' => 'Поповнення балансу',
            'order_id'  => uniqid(),
            'version'   => '3',
            'sandbox'   => 1, // 1 - тестовий режим, 0 - бойовий
            'server_url' => route('liqpay.callback'),
            'result_url' => route('liqpay.result'),
        ];

        $form = $liqpay->cnb_form($params);

        return view('payment.pay', compact('form'));
    }
}
