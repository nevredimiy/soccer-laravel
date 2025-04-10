<div class="mt-4 p-4 border rounded bg-white">

    @if($team)
    <div class="text-center mb-2">
        <h2 class="text-xl font-bold">Команда: {{ $team->name }}</h2>
        <p>Статус: {{ $team->status }}</p>
        <p>Цвет: {{ $team->color->name ?? 'Не указан' }}</p>

    </div>

        <section class="profile__players players-tournament">
            <h2 class="players-tournament__title section-title section-title--margin">
                Гравців зареєстровано
            </h2>
            {{-- @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('notice'))
                <div class="alert alert-notice">
                    {{ session('notice') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif --}}
            <div class="players-tournament__items">
                @forelse ($players as $player)
                <div class="players-tournament__item">
                    <article class="item-player item-player--stats">
                        <a href="#" class="item-player__image-link">
                            <img src="{{ asset('storage/' . $player->photo) }}" alt="Image" class="ibg">
                        </a>
                        <div class="item-player__name">
                            <a href="#"> {{$player->first_name}} {{$player->last_name}}</a>
                        </div>
                        <div class="item-player__details">
                            <div class="item-player__info">
                                31
                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                            </div>
                            <div class="item-player__info">
                                28
                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                            </div>
                            <div class="item-player__info item-player__info--yellow-card">
                                1
                            </div>
                            <div class="item-player__info item-player__info--red-card">
                                0
                            </div>
                        </div>
                        <div class="item-player__rating rating rating__items">
                            @for ($i = 0; $i < 10; $i++)
                            <label class="rating__item @if($i < $player->rating) rating__item--active @endif disable">
                            <input class="rating__input" type="radio" name="rating" value="{{$i}}">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </label>
                            @endfor
                        </div>
                    </article>
                    <div class="players-tournament__actions">
                        <div class="players-tournament__label {{ $player->status === 'main' ? 'green-bg' : 'gray-bg' }}">
                            {{ $player->status === 'main' ? 'ОСНОВИЙ' : 'РЕЗЕРВНИЙ' }}
                        </div>

                      
                        
                        <form action="{{ route('profile.togglePlayerStatus') }}" method="POST">
                            @csrf
                            <input type="hidden" name="player_id" value="{{ $player->id }}">
                            <input type="hidden" name="team_id" value="{{ $player->team_id }}">
                            <button 
                                name="action" 
                                value="{{ $player->status === 'main' ? 'reserve' : 'main' }}"
                                class="players-tournament__label {{ $player->status === 'main' ? 'gray-bg' : 'green-bg' }}"
                            >
                                {{ $player->status === 'main' ? 'РЕЗЕРВНИЙ' : 'ОСНОВИЙ' }}
                            </button>
                        </form>

                        <livewire:remove-player-from-team :player="$player" :key="$player->id" :team="$team" />
                        
                                            
                        
                    </div>
                </div>
                   
                @empty
                <div class="text-gray-500">Немає жодного гравця у цій команді</div>
                @endforelse
              
            </div>
            <div class="players-tournament__info">
                <div class="players-tournament__info-item _icon-star">
                    основний ГРАВЕЦЬ - БУДЕ МАТИ ПРІОРИТЕТНУ МОЖЛИВІСТЬ ДОБАВИТИСЬ HA МАТЧ ЗА 7 ДНІВ ДО ЙОГО ПОЧАТКУ
                </div>
                <div class="players-tournament__info-item _icon-star">
                    ВИДАЛИТИ ГРАВЦЯ МОЖЛИВО, ЯКЩО ВІН НЕ БУВ ЗАГРАННИЙ НА ТУРНІРІ (НЕЗІГРАВ ЖОДНОГО МАТЧУ)
                </div>
                <div class="players-tournament__info-item _icon-star">
                    РЕЗЕРВНИЙ ГРАВЕЦЬ - БУДЕ МАТИ МОЖЛИВІСТЬ ДОБАВИТИСЬ НА МАТЧ ЗА 6 ДНІВ ДО ЙОГО ПОЧАТКУ
                </div>
            </div>
        </section>
        <div class="profile__prop prop-profile">

            <livewire:team-max-players :team="$team" />

            <div class="prop-profile__block">
                <h2 class="prop-profile__title section-title section-title--margin">Бажаючі приєднатися до вашої
                    команди
                </h2>
                <div class="prop-profile__subtitle label-prop">
                    Залишок часу на прийняття рішення
                </div>

                <div class="prop-profile__body">
                    
                  

                    <div class="prop-profile__requests">
                        @forelse ($applications as $application)
                            @foreach ($application['user']['player'] as $player)
                                @livewire('player-request', ['player' => $player, 'application' => $application], key($player['id']))
                            @endforeach
                        @empty
                            <div class="text-gray-500 m-auto">Немає жодної заявки</div>
                        @endforelse
                    </div>
                    
                </div>
            </div>


          
            
            <livewire:transfer-filter :team="$team" />


            <livewire:team-application-settings :team="$team" />

        </div>

        <livewire:team-player-status :team="$team" wire:key="team-player-status-{{ $team->id }}"/>


    @else
        <p>Виберіть команду для перегляду інформації</p>
    @endif
</div>
