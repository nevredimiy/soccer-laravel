<section class="team__latest-series latest-series">

   
   
    <h2 class="latest-series__title section-title section-title--margin">
        ЗАЯВКА НА НАЙБЛИЖЧУ СЕРІЮ
    </h2>
    <div class="latest-series__match-info match-info">
        <div class="match-info__details">
            <div class="match-info__label">
                {{isset($matche) ? $formatDate->translatedFormat('d F') : ''}}
            </div>
            <div class="match-info__label">
                {{isset($matche) ? $formatDate->translatedFormat('D') : ''}}
            </div>
            <div class="match-info__label">
                {{isset($matche) ? $formatDate->translatedFormat('H:i') : ''}}
            </div>
            <div class="match-info__label">
                {{$matche->round ?? ''}} ТУР

            </div>
            <div class="match-info__label">
                СЕРІЯ {{$matche->series?? ''}}
            </div>
        </div>
        <div class="match-info__teams">
            @foreach ($seriesTeams as $key => $seriesTeam)
            <div wire:key="{{$key}}" class="match-info__label {{$seriesTeam['classColor']}}">
                {{$seriesTeam['name']}}
            </div>                        
            @endforeach
            
        </div>
    </div>   

    <h2 class="@if($isPlayerReserve) block @else hidden @endif text-center text-red-400">Ви в резерві! Не можете приймати участь у цій серії.</h2>
    @if (session()->has('message'))
        <div class="text-center bg-yellow-100 text-yellow-800 p-2 rounded mb-2">
            {{ session('message') }}
        </div>
    @endif
    <div class="latest-series__items relative p-2">        
        <div class="@if($isPlayerReserve) block @else hidden @endif absolute inset-0 bg-gray-400 opacity-50 rounded z-10"></div>
       
        {{-- @for ($i=0; $i<$maxPlayer; $i++) --}}
        @for ($i=0; $i<9; $i++)
            @php
                $playerNumber = $i + 1;
                $regPlayer = $regPlayers->firstWhere('player_number', $playerNumber);
            @endphp
            <div wire:key="{{$i}}" class="latest-series__item">
                @if ($regPlayer)
                    <article class="item-player item-player--stats">
                        <a href="#" class="item-player__image-link">
                            <img src="img/player/player.webp" alt="Image" class="ibg">
                        </a>
                        <div class="item-player__name">
                            <a href="#">{{$regPlayer->player->last_name}} {{$regPlayer->player->first_name}}</a>
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
                        <div data-rating="" data-rating-size="10" data-rating-value="{{$regPlayer->player->rating}}" class="item-player__rating rating"></div>
                    </article>
                @elseif ($statusRegistration !== 'closed')
                    <button wire:click="takePlace({{$i + 1}})" class="latest-series__empty">
                        ЗАЙНЯТИ МІСЦЕ
                    </button>
                @endif

                <div class="latest-series__number">{{$playerNumber}}</div>

                @if ($regPlayer && $team->owner_id == $userId)
                    <button wire:click="dropRegPlayer({{$regPlayer->player_id}})" class="button button--yellow button--small">Відкликати</button>
                @elseif($regPlayer && $regPlayer->player_id == $playerId)
                    <button wire:click="dropRegPlayer({{$regPlayer->player_id}})" class="button button--yellow button--small">Вийти</button>
                @endif
            </div>              
        @endfor

    </div>
    @if ($team->owner_id == $userId)
        <div  class="">
            <button 
                type="button"
                wire:click="closeRegistrations"
                wire:confirm="Закрити заявки? \n\nПісля підтвердження у гравців спишуться кошти з балансу"
                class="button button--red button--big @if ($statusRegistration == 'closed')
                    disabled
                @endif"
                
            >
                @if ($statusRegistration == 'closed')
                    Заявка закрыта
                @else
                    Закрити заявки
                @endif
            </button>
        </div>        
    @endif
    @if($showModal)
    <div class="modal" wire:click="closeModal" wire:show="showModal">
        <div wire:click.stop class="modal__block">
            <button wire:click="closeModal" type="button" class="modal__btn-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
            <div>Вам потрібно поповнити не менж ніж на {{ $desiredBalance }} грн</div>
            <div class=""><p>Перейти на сторінку поповнення балансу</p></div>
            <div><a class="button button--blue button--small" href="{{ route('balance.form', ['amount' => round($desiredBalance)]) }}">Перейти</a></div>
        </div>
    </div>
    @endif
</section>