<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Services\LiqPayService;
use Illuminate\Support\Facades\Log;

class LiqPayController extends Controller
{
    protected $liqpay;

    public function __construct(LiqPayService $liqpay)
    {
        $this->liqpay = $liqpay;
    }

    // 1️⃣ Генерируем платежную форму
    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = auth()->user();
        $amount = $request->amount;
        $order_id = uniqid();

        $form = $this->liqpay->getForm(
            $amount,
            $order_id,
            "Пополнение баланса на {$amount} грн",
            route('liqpay.result'),
            route('liqpay.callback')
        );

        return view('liqpay.pay', compact('form'));
    }

    // 2️⃣ Страница после успешного платежа
    public function result()
    {
        return redirect()->route('profile')->with('success', 'Оплата прошла успешно!');
    }

    // 3️⃣ Обработка callback от LiqPay
    public function callback(Request $request)
    {
        $data = $request->input('data');
        $signature = $request->input('signature');

        $generated_signature = base64_encode(sha1(env('LIQPAY_PRIVATE_KEY') . $data . env('LIQPAY_PRIVATE_KEY'), true));

        if ($signature !== $generated_signature) {
            Log::error('LiqPay: Неверная подпись!', ['data' => $data]);
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
        }

        $response = json_decode(base64_decode($data), true);
        Log::info('LiqPay callback:', $response);

        if ($response['status'] === 'success' || $response['status'] === 'sandbox') {
            $user = User::where('id', $response['order_id'])->first();

            if ($user) {
                $user->increment('balance', $response['amount']);

                Transaction::create([
                    'user_id' => $user->id,
                    'amount' => $response['amount'],
                    'type' => 'deposit',
                    'description' => 'Пополнение через LiqPay',
                ]);
            }
        }

        return response()->json(['status' => 'success']);
    }
}
