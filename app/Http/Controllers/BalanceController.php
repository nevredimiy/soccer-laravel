<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use LiqPay;
use Illuminate\Support\Facades\Log;

class BalanceController extends Controller
{

    public function showForm(Request $request)
    {
        $amount = $request->get('amount', 0);
        // Запоминаем URL страницы, с которой пришли:
        $return_url = url()->previous(); 
        return view('balance.top-up', compact('amount', 'return_url'));
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

        $liqpay = new LiqPay(config('app.liqpay_public_key'), config('app.liqpay_private_key'));

        $return_url = $request->input('return_url', route('profile'));
        

        $params = [
            'action'         => 'pay',
            'amount'         => $amount,
            'currency'       => 'UAH',
            'description'    => 'Поповнення балансу',
            'order_id'       => $orderId,
            'version'        => '3',
            'server_url'     => route('balance.callback'), // Коллбэк от LiqPay
            'result_url' => $return_url,
        ];

        $form = $liqpay->cnb_form($params);

        return view('payment.pay', compact('form'));
    }

    public function liqpayCallback(Request $request)
    {
        Log::info('LiqPay callback received', $request->all());
        Log::info('LiqPay callback triggered');
        Log::info('Request headers:', $request->headers->all());
        Log::info('Request input:', $request->all());

        $data = json_decode(base64_decode($request->input('data')), true);

        if ($data['status'] === 'success' || $data['status'] === 'sandbox') {

            $orderIdParts = explode('_', $data['order_id']);
            $userId = $orderIdParts[1] ?? null;

            Log::info("номер заказа от ПриватБ #{$data['order_id']}");
            Log::info("Распарсиный номер заказа #{$orderIdParts}");
            Log::info("Вытащеннвый юзер айди #{$userId}");

            if ($userId) {
                $user = User::find($userId);
                if ($user) {
                    $user->increment('balance', $data['amount']);
                    Log::info("Баланс пользователя #{$user->id} пополнен на {$data['amount']} UAH.");
                }
            }

            $payment = \DB::table('payments')->where('order_id', $data['order_id'])->first();

            if (!$payment) {
                Log::warning("Платёж с order_id {$data['order_id']} не найден");
                return response()->json(['message' => 'Платёж не найден'], 404);
            }

            \DB::table('payments')
                ->where('order_id', $data['order_id'])
                ->update(['status' => 'paid', 'updated_at' => now()]);
        }
        
        return response()->json(['message' => 'Payment processed']);
    }

    public function checkPayment(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Не авторизован'], 401);
        }

        $payment = Payment::where('user_id', $user->id)
            ->where('status', 'pending')
            ->latest()
            ->first();
    
        if (!$payment) {
            $this->statusMessage = 'Нет ожидаемых платежей';
            return;
        }
    
        $liqpay = new LiqPay(config('app.liqpay_public_key'), config('app.liqpay_private_key'));
        $response = $liqpay->api('request', [
            'action'   => 'status',
            'version'  => '3',
            'order_id' => $payment->order_id,
        ]);
  
        if ($response->status === 'success') {
            // Обновляем баланс и статус платежа
            $user->increment('balance', $payment->amount);
            $payment->update(['status' => 'paid']);
    
            session()->flash('message', 'Баланс успешно обновлён');
            
            return redirect(request()->header('Referer')); // Перезагрузка страницы
        } else {
            $this->statusMessage = 'Платёж не завершён: ' . $response->status;
        }
    }

}
