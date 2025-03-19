<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\LiqPayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TeamController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/districts/{city_id}', [LocationController::class, 'getDistricts']);
Route::get('/locations/{district_id}', [LocationController::class, 'getLocations']);
Route::get('/leagues/{location_id}', [LocationController::class, 'getLeagues']);

// Аутентификация
// Страница входа
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Страница входа
Route::post('/login', [LoginController::class, 'login']);

// Обработка формы входа
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/profile'); // Перенаправляем после входа
    }

    return back()->withErrors([
        'email' => 'Невірний email або пароль',
    ]);
});

// Выход из системы
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Перенаправляем на главную страницу
})->name('logout');

// Регистрация
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Подтверждение email
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// Профиль пользователя
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/balance/deposit/{user}', [BalanceController::class, 'deposit'])->name('balance.deposit');
    Route::post('/balance/withdraw/{user}', [BalanceController::class, 'withdraw'])->name('balance.withdraw');

    Route::post('/liqpay/pay', [LiqPayController::class, 'pay'])->name('liqpay.pay');
    Route::get('/liqpay/result', [LiqPayController::class, 'result'])->name('liqpay.result');
    Route::post('/liqpay/callback', [LiqPayController::class, 'callback'])->name('liqpay.callback');

    Route::get('/balance/pay', [PaymentController::class, 'pay'])->name('balance.pay');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
});



