<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Payment;
use App\Models\User;
use LiqPay;

class CheckBalance extends Component
{
    public $balance;
    public $statusMessage = '';

    public function mount()
    {
        $this->balance = auth()->user()->balance;
    }

    public function checkPayment()
    {
        $user = auth()->user();
        $payment = Payment::where('user_id', $user->id)
            ->where('status', 'pending')
            ->latest()
            ->first();

        if (!$payment) {
            $this->statusMessage = 'Немає очікуваних платежів';
            return;
        }

        $liqpay = new LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
        $response = $liqpay->api('request', [
            'action'   => 'status',
            'version'  => '3',
            'order_id' => $payment->order_id,
        ]);

        if ($response->status === 'success') {
            // Обновляем баланс и статус платежа
            $user->increment('balance', $payment->amount);
            $payment->update(['status' => 'paid']);

            $this->balance = $user->fresh()->balance;
            $this->dispatch('balanceUpdated', balance: $this->balance);
            $this->statusMessage = 'Баланс успешно обновлён!';
            return redirect()->route('profile'); // Перезагрузка страницы
        } else {
            $this->statusMessage = 'Платёж не завершён: ' . $response->status;
        }
    }

    public function render()
    {
        return view('livewire.check-balance');
    }
}
