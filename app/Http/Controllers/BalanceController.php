<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BalanceService;
use App\Models\User;
use App\Models\Payment;
use LiqPay;
use Illuminate\Support\Facades\Log;

class BalanceController extends Controller
{
    protected $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    public function showForm(Request $request)
    {
        $amount = 0;
        if($request->get('amount')){
            $amount = $request->get('amount');
        }
        return view('balance.top-up', compact('amount'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = auth()->user();
        $amount = $request->amount;

        $orderId = "balance_{$user->id}_" . time(); // Уникальный ID заказа

        // Записываем платёж в таблицу
        \DB::table('payments')->insert([
            'user_id' => $user->id,
            'order_id' => $orderId,
            'amount' => $amount,
            'status' => 'pending', // Ожидание
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));

        $params = [
            'action'         => 'pay',
            'amount'         => $amount,
            'currency'       => 'UAH',
            'description'    => 'Поповнення балансу',
            'order_id'       => "balance_{$user->id}_" . time(),
            'version'        => '3',
            'result_url'     => route('profile'), // Перенаправление после оплаты
            'server_url'     => route('balance.callback'), // Коллбэк от LiqPay
        ];

        $form = $liqpay->cnb_form($params);

        return view('payment.pay', compact('form'));
    }

    public function liqpayCallback(Request $request)
    {
        Log::info('LiqPay callback received', $request->all());

        $data = json_decode(base64_decode($request->input('data')), true);

        if ($data['status'] === 'success' || $data['status'] === 'sandbox') {
            $orderIdParts = explode('_', $data['order_id']);
            $userId = $orderIdParts[1] ?? null;

            if ($userId) {
                $user = User::find($userId);
                if ($user) {
                    $user->increment('balance', $data['amount']);
                    Log::info("Баланс пользователя #{$user->id} пополнен на {$data['amount']} UAH.");
                }
            }
        }
        
        return response()->json(['message' => 'Payment processed']);
    }

    // public function checkPayment(Request $request)
    // {
    //     $user = auth()->user();
    //     if (!$user) {
    //         return response()->json(['message' => 'Не авторизован'], 401);
    //     }

    //     $payment = Payment::where('user_id', $user->id)
    //         ->where('status', 'pending')
    //         ->latest()
    //         ->first();
    
    //     if (!$payment) {
    //         $this->statusMessage = 'Нет ожидаемых платежей';
    //         return;
    //     }
    
    //     $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
    //     $response = $liqpay->api('request', [
    //         'action'   => 'status',
    //         'version'  => '3',
    //         'order_id' => $payment->order_id,
    //     ]);
  
    //     if ($response->status === 'success') {
    //         // Обновляем баланс и статус платежа
    //         $user->increment('balance', $payment->amount);
    //         $payment->update(['status' => 'paid']);
    
    //         session()->flash('message', 'Баланс успешно обновлён');
            
    //         return redirect(request()->header('Referer')); // Перезагрузка страницы
    //     } else {
    //         $this->statusMessage = 'Платёж не завершён: ' . $response->status;
    //     }
    // }

}
