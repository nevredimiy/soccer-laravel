<?php

namespace App\Services;

class LiqPayService
{
    private $public_key;
    private $private_key;

    public function __construct()
    {
        $this->public_key = env('LIQPAY_PUBLIC_KEY');
        $this->private_key = env('LIQPAY_PRIVATE_KEY');
    }

    public function getForm($amount, $order_id, $description, $result_url, $server_url)
    {
        $liqpay = new \LiqPay($this->public_key, $this->private_key);

        $params = [
            'action'        => 'pay',
            'amount'        => $amount,
            'currency'      => 'UAH',
            'description'   => $description,
            'order_id'      => $order_id,
            'version'       => '3',
            'sandbox'       => env('LIQPAY_SANDBOX', 1),
            'result_url'    => $result_url,
            'server_url'    => $server_url,
        ];

        return $liqpay->cnb_form($params);
    }
}
