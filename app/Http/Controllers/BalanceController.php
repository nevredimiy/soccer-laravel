<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BalanceService;
use App\Models\User;

class BalanceController extends Controller
{
    protected $balanceService;

    public function __construct(BalanceService $balanceService)
    {
        $this->balanceService = $balanceService;
    }

    // Пополнение баланса (например, через админку)
    public function deposit(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $this->balanceService->deposit($user, $request->amount);

        return back()->with('success', 'Баланс пополнен!');
    }

    // Списание баланса (например, для оплаты участия в турнире)
    public function withdraw(Request $request, User $user)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        try {
            $this->balanceService->withdraw($user, $request->amount);
            return back()->with('success', 'Средства списаны!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
