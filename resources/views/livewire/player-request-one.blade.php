<section class="tournament__players players-tournament ">
    <h2 class="players-tournament__title section-title section-title--margin">
        Гравців зареєстровано
    </h2>
    <div data-prgs="18" data-prgs-value="13" class="players-tournament__progress">
    </div>
    <div class="players-tournament__items">
        @foreach ($event->teams as $team)
            @foreach ($team->players as $player)
                <div wire:key="{{$team->id}}_{{$player->id}}" data-player-id="{{$player->id}}" class="players-tournament__item">
                    <article class="item-player item-player--stats">
                        <a href="#" class="item-player__image-link">
                            <img src="{{asset($player->photo)}}" alt="{{$player->last_name}} {{$player->first_name}}" class="ibg">
                        </a>
                        <div class="item-player__name">
                            <a href="#">{{$player->last_name}} {{$player->first_name}}</a>
                        </div>
                        <div data-rating data-rating-size="10" data-rating-value="{{$player->rating}}" class="item-player__rating rating">
                        </div>
                    </article>
                </div>                
            @endforeach            
        @endforeach
    </div>
    <div class="players-tournament__text">
        ПО ЗАВЕРШЕННЮ РЕЄСТРАЦІЇ ГРАВЦІВ, БУДЕ РОЗПОДІЛЕНО ПО КОМАНДАМ, ІГРОВИМ НОМЕРАМ ТА ПРИЗНАЧЕННО
        КАПІТАНІВ
    </div>
</section>