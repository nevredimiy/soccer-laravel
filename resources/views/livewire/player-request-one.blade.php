<section class="tournament__players players-tournament ">
    <div class="mb-4">
        @if(session()->has('error'))
            <p class="text-red-500 text-center mb-2">{{ session('error') }}</p>
        @endif
    
        @if(session()->has('error_balance'))
        <div class="flex flex-col items-center mb-2">
            <p class="text-red-500 text-center mb-2">{{ session('error_balance') }}</p>
            <a class="button button--red botton--small" href="{{route('balance.form', ['amount' => $missingAmount])}}">Поповнити баланс</a>
        </div>
        @endif

        @if(session()->has('success'))
            <p class="text-green-500 text-center mb-2">{{ session('success') }}</p>
        @endif
    
        @if ($isSeriesClosed)
            <p class="text-red-500 text-center mb-2">Реєстрація закрита</p>
        @else
            <button 
                wire:click="BookingPlace" 
                wire:confirm="Ви дійстно хочете потрапити до турніру?"
                class="schedule-tournament__button button button--yellow"
            >
                <span>ЗАЯВИТИСЬ НА ТУРНІР</span>
            </button>
        @endif
    </div>
    

    <h2 class="players-tournament__title section-title section-title--margin">
        Гравців зареєстровано
    </h2>
    <div data-prgs="18" data-prgs-value="13" class="players-tournament__progress">
        @for ($i = 0; $i < 18; $i++)
            <span class="@if($i < count($players)) _active @endif"></span>
        @endfor
    </div>

   
    <div class="players-tournament__items">
        @foreach ($players as $player)
            <div wire:key="{{$player['id']}}" data-player-id="{{$player['id']}}" class="players-tournament__item">
                <article class="item-player item-player--stats">
                    <a href="#" class="item-player__image-link">
                        <img src="{{asset('storage/' . $player['photo'])}}" alt="{{$player['last_name']}} {{$player['first_name']}}" class="ibg">
                    </a>
                    <div class="item-player__name">
                        <a href="#">{{$player['last_name']}} {{$player['first_name']}}</a>
                    </div>
                    <div data-rating-size="10" data-rating-value="{{$player['rating']}}" class="item-player__rating rating">
                        <div class="rating__items">
                            @for ($i=0; $i<10; $i++)
                            <label class="rating__item 
                                @if ($i<$player['rating'])
                                    rating__item--active
                                @endif"
                            >
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </label>
                            @endfor
                        </div>
                    </div>
                </article>
                @if ($currentPlayer->id == $player['id'])
                <div class="flex justify-center">
                    <button 
                        wire:click="deletePlayer"
                        wire:confirm="Ви дійсно хочите вийти із турніра?"
                        class="button button--yellow button--small"
                    >
                        Вийти
                    </button>
                </div>                    
                @endif
            </div>
            
        @endforeach
    </div>
    <div class="players-tournament__text">
        ПО ЗАВЕРШЕННЮ РЕЄСТРАЦІЇ ГРАВЦІВ, БУДЕ РОЗПОДІЛЕНО ПО КОМАНДАМ, ІГРОВИМ НОМЕРАМ ТА ПРИЗНАЧЕННО
        КАПІТАНІВ
    </div>
</section>