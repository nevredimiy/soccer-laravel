<section class="tournament__schedule schedule-tournament">
    <h2 class="schedule-tournament__title section-title section-title--margin">
        РОЗКЛАД
    </h2>
    <div class="schedule-tournament__body">
        <div class="schedule-tournament__block">
            <div class="schedule-tournament__item schedule-tournament__item--center schedule-tournament__item--info">
                <div class="schedule-tournament__label uppercase">
                    {{\Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('j F')}}
                </div>
                <div class="schedule-tournament__label uppercase">
                    {{\Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('l')}}
                </div>
            </div>
            <div class="schedule-tournament__item schedule-tournament__item--info">
                <div class="schedule-tournament__label">
                    ЧАС
                </div>
                <div class="schedule-tournament__label">
                    {{\Carbon\Carbon::parse($event->start_time)->translatedFormat('H:i')}}
                </div>
            </div>
            @foreach ($template as $key => $item)
                
            
            <div class="schedule-tournament__item">
                <div class="schedule-tournament__label">
                    МАТЧ {{$key + 1}}
                </div>
                <div class="schedule-tournament__colors">
                    <span class="{{$teamColorClass[$item[0]]}}"></span>
                    <span class="{{$teamColorClass[$item[1]]}}"></span>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    @if(session()->has('error'))
        <p class="text-red-500 text-center mb-2">{{ session('error') }}</p>
    @endif

    @if(session()->has('error_balance'))
    <div class="flex flex-col items-center mb-2">
        <p class="text-red-500 text-center mb-2">{{ session('error_balance') }}</p>
        <a class="button button--red botton--small" href="{{route('balance.form', ['amount' => $missingAmount])}}">Поповнити баланс</a>
    </div>
    @endif

    @if ($event->tournament->type != 'solo_private')
    <button wire:click="BookingPlace" class="schedule-tournament__button button button--yellow">
        <span>ЗАЯВИТИСЬ НА ТУРНІР</span>
    </button>
    @endif
</section>