<section class="team__latest-series latest-series">
   
    <h2 class="latest-series__title section-title section-title--margin">
        ЗАЯВКА НА НАЙБЛИЖЧУ СЕРІЮ
    </h2>
    <div class="latest-series__match-info match-info">
        <div class="match-info__details">
            <div class="match-info__label">
                {{$formatDate->translatedFormat('d F')}}
            </div>
            <div class="match-info__label">
                {{$formatDate->translatedFormat('D')}}
            </div>
            <div class="match-info__label">
                {{$formatDate->translatedFormat('H:i')}}
            </div>
            <div class="match-info__label">
                {{$matche->round}} ТУР

            </div>
            <div class="match-info__label">
                СЕРІЯ {{$matche->series}}
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
        
        <div class="@if($isPlayerReserve) block @else hidden @endif absolute inset-0 bg-gray-400 opacity-50 rounded"></div>
       
        @for ($i=0; $i<$maxPlayer; $i++)
            @php
                $playerNumber = $i + 1;
                $regPlayer = $regPlayers->firstWhere('player_number', $playerNumber);
            @endphp
            <div class="latest-series__item">
              

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
                @else
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
    <div class="modal" wire:show="showModal">
        <div class="modal__block">
            <div>Вам потрібно поповнити не менж ніж на {{ $desiredBalance }} грн</div>
            <div class=""><p>Перейти на сторінку поповнення балансу</p></div>
            <div><a class="button button--blue button--small" href="{{ route('balance.form', ['amount' => round($desiredBalance)]) }}">Перейти</a></div>
        </div>
    </div>
</section>