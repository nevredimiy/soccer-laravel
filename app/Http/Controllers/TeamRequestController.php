<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamColor;
use App\Models\PromoCode;
use App\Models\Team;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use LiqPay\LiqPay;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class TeamRequestController extends Controller
{
    

    public function create(Request $request)
    {

        // Валидация параметра id
        $validated = $request->validate([
            'id' => 'required|exists:events,id',
        ]);

        // Получаем ID события
        $eventId = $validated['id'];

        $event = Event::where('id', '=', $eventId)->first();

        $colors = TeamColor::all();

        $promoCodes = PromoCode::all();

        $teams = Team::where('event_id', '=', $eventId)->get();

        return view('teams.request.create', compact('colors', 'promoCodes', 'teams', 'eventId', 'event'));
    }

    public function store(Request $request)
    {        
        $validated = $request->validate([
            'name' => [
                'required',
                Rule::unique('teams')->where(function ($query) use ($request) {
                    return $query->where('event_id', $request->event_id);
                })
            ],
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'color_id' => 'required',
            'promo_code' => 'nullable|exists:promo_codes,code',
            'event_id' => 'required|integer|exists:events,id',
            'price' => 'required|numeric|min:0',
        ]);

        $color = TeamColor::where('id', $request->color_id)->first();
     
        // Проверка на уникальность цвета
        $existingColor = Team::where('color_id', $color->id)->where('event_id', $request->event_id)->first();
        if ($existingColor) {
            return back()->withErrors(['color' => 'Цей колір вже зайнятий.']);
        }

        // Создание команды
        $team = Team::create([
            'owner_id' => Auth::id(),
            'name' => $request->name,
            'color_id' => $request->color_id,
            'promo_code_id' => PromoCode::where('code', $request->promo_code)->first()->id ?? null,
            'event_id' => $request->event_id,
            'status' => 'awaiting_payment'
        ]);

        // Логика для обработки логотипа
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('img/team_logo', 'public');
            $team->update(['logo' => $logoPath]);
        }

        // return redirect()->route('profile')->with('success', 'Команда успішно створена.');
        // Перенаправление на оплату
        return redirect()->route('teams.request.payment', ['team_id' => $team->id]);
    }

    public function pay($team_id)
    {
        $team = Team::findOrFail($team_id);
        $event = Event::findOrFail($team->event_id);
        $price = $event->price;

        $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));

        $params = [
            'action'      => 'pay',
            'amount'      => $price,
            'currency'    => 'UAH',
            'description' => "Оплата заявки на турнир #{$event->id} командой {$team->name}",
            // 'order_id'    => 'team_' . $team->id . '_' . time(),
            'order_id'    => $team->id,
            'version'     => '3',
            'result_url' => route('teams.request.success', $team->id),            
            'server_url'  => route('teams.request.callback'),
            
        ];

        $form = $liqpay->cnb_form($params);

        return view('payment.pay', compact('form'));
    }

    public function liqpayCallback(Request $request)
    {

        Log::info('LiqPay callback получен', ['request' => $request->all()]);
        // Логируем входящие данные
        Log::info('LiqPay callback', $request->all());
        
        Log::info('I am here Полученные данные от LiqPay');
        // $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));
    
        // Получаем данные от LiqPay
        $data = $request->input('data');
        $signature = $request->input('signature');
    
        // Декодируем данные
        $decodedData = json_decode(base64_decode($data), true);
        Log::info('Полученные данные от LiqPay', $decodedData);

        $privateKey = env('LIQPAY_PRIVATE_KEY');
        $generatedSignature = base64_encode(sha1($privateKey . $data . $privateKey, true));

        if ($generatedSignature !== $signature) {
            Log::warning('Ошибка проверки подписи', ['expected' => $generatedSignature, 'received' => $signature]);
            return response()->json(['message' => 'Invalid signature'], 400);
        }

        // Обновляем статус команды в базе
        $orderIdParts = explode('_', $decodedData['order_id']);
        $teamId = end($orderIdParts); // Берем последний элемент (ID команды)
        $team = Team::find($teamId);


        if ($team) {
            $team->status = 'paid';
            $team->save();
            Log::info("Статус команды #{$team->id} обновлен на 'paid'");
        }

        // Проверяем статус оплаты
        if ($decodedData['status'] === 'success' || $decodedData['status'] === 'sandbox') {
            $team->status = 'paid';
            $team->save();
            Log::info("Статус команды #{$team->id} обновлен на 'paid'");            

        } else {
            Log::warning("Ошибка оплаты LiqPay для команды ID {$decodedData['order_id']}");
            Log::warning("Ошибка оплаты LiqPay для команды ID {$team->id}");
        }

        // if ($liqpay->cnb_signature($data) !== $signature) {
        //     return response()->json(['message' => 'Invalid signature'], 400);
        // }
        
    
        // if ($decodedData['status'] === 'success') {
        //     $orderId = $decodedData['order_id']; // например, "team_15_1713983293"
        //     $teamId = explode('_', $orderId)[1] ?? null;
    
        //     if ($teamId) {
        //         $team = Team::find($teamId);
        //         if ($team && $team->status === 'awaiting_payment') {
        //             $team->update(['status' => 'paid']);
        //         }
        //     }
        // }
    
        return response()->json(['message' => 'Payment processed']);
    }

    public function success($team_id)
    {

        $team = Team::findOrFail($team_id);

        if ($team->status === 'paid') {
            return redirect()->route('profile')->with('success', 'Оплата прошла успешно! Команда зарегистрирована.');
        } else {
            return redirect()->route('profile')->with('error', 'Оплата в обработке, попробуйте позже.');
        }
    }

    public function checkPaymentStatus($team_id)
    {
        $team = Team::findOrFail($team_id);

        $liqpay = new \LiqPay(env('LIQPAY_PUBLIC_KEY'), env('LIQPAY_PRIVATE_KEY'));

        $params = [
            'action'   => 'status',
            'version'  => '3',
            'order_id' => $team->id, // тот же order_id, что ты отправлял при оплате
        ];

        $res = $liqpay->api("request", $params);

        if ($res->status === 'success' || $res->status === 'sandbox') {
            $team->update(['status' => 'paid']);
            return redirect()->route('profile')->with('success', "Оплата підтверджена!");
        } else {
            return redirect()->route('profile')->with('notice', "Оплата не знайдена або в обробці");
        }
    }

}
