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
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\StadiumController;
use App\Http\Controllers\PlayerRequestController;
use App\Http\Controllers\TeamEventController;
use App\Http\Controllers\TeamRequestController;
use App\Http\Controllers\TournamentController;
use App\Models\Article;

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
    Route::post('/profile/update-rating', [ProfileController::class, 'updateRating'])->name('profile.updateRating');
    Route::post('/profile/update-player-list', [ProfileController::class, 'updatePlayerList'])->name('profile.updatePlayerList');
    Route::post('/profile/toggle-player-status', [ProfileController::class, 'togglePlayerStatus'])->name('profile.togglePlayerStatus');
    Route::get('/players/create', [PlayerController::class, 'create'])->name('players.create'); 
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store'); 
});

Route::middleware(['auth'])->group(function () {
    // Route::post('/balance/deposit/{user}', [BalanceController::class, 'deposit'])->name('balance.deposit');
    // Route::post('/balance/withdraw/{user}', [BalanceController::class, 'withdraw'])->name('balance.withdraw');

    Route::get('/balance/top-up', [BalanceController::class, 'showForm'])->name('balance.form');
    Route::post('/balance/top-up', [BalanceController::class, 'processPayment'])->name('balance.process');
    Route::post('/balance/callback', [BalanceController::class, 'liqpayCallback'])->name('balance.callback');
    Route::post('/balance/check-payment', [BalanceController::class, 'checkPayment'])->name('balance.check');

    Route::post('/liqpay/pay', [LiqPayController::class, 'pay'])->name('liqpay.pay');
    Route::get('/liqpay/result', [LiqPayController::class, 'result'])->name('liqpay.result');
    Route::post('/liqpay/callback', [LiqPayController::class, 'callback'])->name('liqpay.callback');

    Route::get('/balance/pay', [PaymentController::class, 'pay'])->name('balance.pay');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    
    
    Route::post('/teams/{id}/update-name', [TeamController::class, 'updateName'])->middleware('auth');
    Route::post('/teams/{id}/update-logo', [TeamController::class, 'updateLogo'])->middleware('auth');

    Route::get('/player-request', [PlayerRequestController::class, 'index'])->name('player.request');
    Route::get('/player-request/details', [PlayerRequestController::class, 'create'])->name('player.request.create');
    
    Route::get('/teams/events', [TeamEventController::class, 'index'])->name('teams.events');
    Route::get('/teams/events/{id}', [TeamEventController::class, 'show'])->name('teams.events.show');
    Route::get('/teams/request/create', [TeamRequestController::class, 'create'])->name('teams.request.create');
    Route::post('/teams/request/store', [TeamRequestController::class, 'store'])->name('teams.request.store');
    // Route::post('/teams/request/pay', [TeamRequestController::class, 'pay'])->name('teams.request.pay');
    // Route::post('/teams/request/callback', [TeamRequestController::class, 'callback'])->name('teams.request.callback');
    Route::get('/teams/request/pay/{team_id}', [TeamRequestController::class, 'pay'])->name('teams.request.payment');
    Route::post('/teams/request/callback', [TeamRequestController::class, 'liqpayCallback'])->name('teams.request.callback');
    Route::get('/teams/request/success/{team_id}', [TeamRequestController::class, 'success'])->name('teams.request.success');
    Route::get('/teams/request/check/{team_id}', [TeamRequestController::class, 'checkPaymentStatus'])->name('teams.request.check');



});

Route::get('/contacts', function () {
    return view('pages.contacts');
})->name('contacts');

Route::get('/article/{article}', function (Article $article) {
    return view('article.show', compact('article'));
})->name('article.show');

Route::get('/tournaments', [TournamentController::class, 'index'])->name('tournaments');
Route::get('/archive', [ArchiveController::class, 'index'])->name('archive');
Route::get('/cities', [CityController::class, 'index'])->name('cities');
Route::get('/tables', [TableController::class, 'index'])->name('tables');
Route::get('/stadiums', [StadiumController::class, 'index'])->name('stadiums');
Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
Route::get('/no-access', function () {
    return view('no-access');
})->name('no-access');
