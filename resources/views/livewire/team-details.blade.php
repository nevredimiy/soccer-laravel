<div class="">
    <div class="">
        @if ($team->event->tournament->type == 'team')                 
        
        <livewire:places-of-series :team="$team" />

        @elseif ($team->event->tournament->type == 'solo')

            <h2>ЗАЯВКА №2 Для индивидуального турнира (відкритий)</h2>
            <section class="tournament__players players-tournament">
                <h2 class="players-tournament__title section-title section-title--margin">
                    Гравців зареєстровано
                </h2>
                <div data-prgs="18" data-prgs-value="13" class="players-tournament__progress">
                    @for ($i = 0; $i < 18; $i++)
                        <span @if ($i < 13)
                            class="_active"
                        @endif></span>
                        
                    @endfor
                </div>
                <div class="players-tournament__items">
                    <div style="--color: #0053A0" class="players-tournament__team">
                        @for ($i=0; $i<6; $i++)
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>                                    
                        @endfor                               
                    </div>
                </div>
            </section>
        @else

            <h2>ЗАЯВКА №3 Для индивидуального турнира (приватний)</h2>
            <section class="tournament__players players-tournament">
                <h2 class="players-tournament__title section-title section-title--margin">
                    Гравців зареєстровано
                </h2>
                <div data-prgs="18" data-prgs-value="13" class="players-tournament__progress">
                    @for ($i = 0; $i < 18; $i++)
                        <span @if ($i < 13)
                            class="_active"
                        @endif></span>
                        
                    @endfor
                </div>
                <div class="players-tournament__items">
                    <div style="--color: #0053A0" class="players-tournament__team">
                    
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <button class="players-tournament__empty">
                                <span>
                                    ЗАЙНЯТИ МІСЦЕ
                                </span>
                            </button>

                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                    </div>
                    <div style="--color: #F7E10E" class="players-tournament__team">
                        <div class="players-tournament__item">
                            <button class="players-tournament__empty">
                                <span>
                                    ЗАЙНЯТИ МІСЦЕ
                                </span>
                            </button>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <button class="players-tournament__empty">
                                <span>
                                    ЗАЙНЯТИ МІСЦЕ
                                </span>
                            </button>

                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                    </div>
                    <div style="--color: #59C65D" class="players-tournament__team">
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <button class="players-tournament__empty">
                                <span>
                                    ЗАЙНЯТИ МІСЦЕ
                                </span>
                            </button>

                        </div>
                        <div class="players-tournament__item">
                            <button class="players-tournament__empty">
                                <span>
                                    ЗАЙНЯТИ МІСЦЕ
                                </span>
                            </button>

                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                        <div class="players-tournament__item">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>

        @endif
    </div>

    @if($team && $team->owner_id == $userId)
    <div class="mt-4 p-4 border rounded bg-white">
    
        <div class="text-center mb-2">
            <h2 class="text-xl font-bold">Команда: {{ $team->name }}</h2>
            <p>Статус: {{ $team->status }}</p>
            <p>Цвет: {{ $team->color->name ?? 'Не указан' }}</p>
    
        </div>
    
       @livewire('team-players', ['team_id' => $team->id])

        <div class="profile__prop prop-profile">
            <livewire:team-max-players :team="$team" />
            <livewire:join-team-list :team="$team" />
            <livewire:transfer-filter :team="$team" />    
            <livewire:team-application-settings :team="$team" />
        </div>

        <livewire:team-player-status :team="$team" wire:key="team-player-status-{{ $team->id }}"/>
    
   
    </div>
    @endif
</div>
