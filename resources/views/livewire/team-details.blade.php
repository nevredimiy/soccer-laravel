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
            <div class="players-tournament__items">
                <div class="players-tournament__item">
                    <article class="item-player item-player--stats">
                        <a href="#" class="item-player__image-link">
                            <img src="img/player/player.webp" alt="Image" class="ibg">
                        </a>
                        <div class="item-player__name">
                            <a href="#">МАКСИМ МАМЕДОВ</a>
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
                        <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                        </div>
                    </article>
                    <div class="players-tournament__actions">
                        <div class="players-tournament__label green-bg">
                            ОСНОВИЙ
                        </div>
                        <button class="players-tournament__label red-bg">
                            ВИДАЛИТИ
                        </button>
                    </div>
                </div>
                <div class="players-tournament__item">
                    <article class="item-player item-player--stats">
                        <a href="#" class="item-player__image-link">
                            <img src="img/player/player.webp" alt="Image" class="ibg">
                        </a>
                        <div class="item-player__name">
                            <a href="#">МАКСИМ МАМЕДОВ</a>
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
                        <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                        </div>
                    </article>
                    <div class="players-tournament__actions">
                        <div class="players-tournament__label gray-bg">
                            РЕЗЕРВНИЙ
                        </div>
                    </div>
                </div>
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
            <div class="prop-profile__block">
                <h2 class="prop-profile__title section-title section-title--margin">Максимальна кількість
                    гравців,<br>що приймають участь у серії
                </h2>
                <div class="prop-profile__radiobox">
                    <label class="prop-profile__radio">
                        6
                        <input type="radio" name="max-players">
                    </label>
                    <label class="prop-profile__radio">
                        7
                        <input checked type="radio" name="max-players">
                    </label>
                    <label class="prop-profile__radio">
                        8
                        <input type="radio" name="max-players">
                    </label>
                    <label class="prop-profile__radio">
                        9
                        <input type="radio" name="max-players">
                    </label>
                </div>
            </div>
            <div class="prop-profile__block">
                <h2 class="prop-profile__title section-title section-title--margin">Бажаючі приєднатися до вашої
                    команди
                </h2>
                <div class="prop-profile__subtitle label-prop">
                    Залишок часу на прийняття рішення
                </div>
                <div class="prop-profile__body">
                    <div class="prop-profile__requests">
                        @forelse ($team->applications as $application)
                            @foreach ($application->user->player as $player)
                            <div class="prop-profile__request request">
                                <div class="request__time">
                                    16хв
                                </div>
                                <article class="request__body item-player item-player--stats">
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__name">
                                        <a href="#">{{ $player['first_name'] }} {{ $player['last_name'] }} </a>
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
                                    <div data-rating data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                    </div>
                                    <div class="item-player__age">{{ \Carbon\Carbon::parse($player['birth_date'])->age }}  років</div>
                                </article>
                                <div class="request__footer">
                                    <button class="request__button request__button--red">ВІДМОВА</button>
                                    <button class="request__button request__button--green">ПІДПИСАТИ</button>
                                </div>
                            </div>
                            @endforeach
                        @empty
                            <div class="text-gray-500">Немає жодної заявки</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="prop-profile__block">
                <h2 class="prop-profile__title section-title section-title--margin">
                    ТРАНСФЕРНІ ФІЛЬТРИ
                </h2>
                <div class="prop-profile__filters filters-prop">
                    <div class="filters-prop__block">
                        <h3 class="filters-prop__title label-prop">
                            ВІК ГРАВЦЯ
                        </h3>
                        <div class="filters-prop__body">
                            <div class="filters-prop__label">ВІД</div>
                            <div class="filters-prop__field">
                                <input type="text" value="16">
                                <button class="filters-prop__change">
                                    ЗМІНИТИ
                                </button>
                            </div>
                            <div class="filters-prop__label ">ДО</div>
                            <div class="filters-prop__field">
                                <input type="text" value="X">
                                <button class="filters-prop__change">
                                    ЗМІНИТИ
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="filters-prop__block">
                        <h3 class="filters-prop__title label-prop">
                            РІВЕНЬ
                        </h3>
                        <div class="filters-prop__body">
                            <div class="filters-prop__label">ВІД</div>
                            <div class="filters-prop__field">
                                <input type="text" value="16">
                                <button class="filters-prop__change">
                                    ЗМІНИТИ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <livewire:team-player-status :team="$team" wire:key="team-player-status-{{ $team->id }}"/>


    @else
        <p>Виберіть команду для перегляду інформації</p>
    @endif
</div>
