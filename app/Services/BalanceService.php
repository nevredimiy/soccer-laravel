<?php

namespace App\Services;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class BalanceService
{
    public function deposit(User $user, float $amount, string $description = 'Поповнення балансу')
    {
        DB::transaction(function () use ($user, $amount, $description) {
            $user->increment('balance', $amount);
            Transaction::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'type' => 'deposit',
                'description' => $description,
            ]);
        });
    }

    public function withdraw(User $user, float $amount, string $description = 'Списання коштів')
    {
        if ($user->balance < $amount) {
            throw new \Exception('Недостатньо коштів');
        }

        DB::transaction(function () use ($user, $amount, $description) {
            $user->decrement('balance', $amount);
            Transaction::create([
                'user_id' => $user->id,
                'amount' => -$amount,
                'type' => 'withdraw',
                'description' => $description,
            ]);
        });
    }
}
