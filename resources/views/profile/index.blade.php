@extends('layouts.app')

@section('title', 'Мій профіль')

@section('content')
<div class="container block-center">
    <div class="flex justify-center flex-col items-center mb-4">
        <h2>Мій профіль</h2>
        <p>Вітаємо, {{ auth()->user()->nickname }}!</p>
        <p>Email: {{ auth()->user()->email }}</p>
    </div>

    <div class="login-section__block">
        @if(session('success'))
            <div class="text-green-500">{{ session('success') }}</div>
        @endif
    
        @if(session('error'))
            <div class="text-red-500">{{ session('error') }}</div>
        @endif
    
        <form class="flex flex-col gap-4" method="POST" action="{{ route('balance.deposit', auth()->user()) }}">
            @csrf
            <input class="account__input input mb-4" type="number" name="amount" placeholder="Сумма" required class="border p-2">
            <button class="account__button button button--green flex-content-center" type="submit" class="bg-blue-500 text-white px-4 py-2">Пополнить баланс</button>
        </form>

    </div>
    <form method="POST" action="{{ route('liqpay.pay') }}">
        @csrf
        <input type="number" name="amount" placeholder="Сумма" required class="border p-2">
        <button type="submit" class="bg-green-500 text-white px-4 py-2">Пополнить через LiqPay</button>
    </form>
    

    <div class="page__container">
        <div class="page__wrapper">
            <div class="page__profile profile">
                <div class="profile__block _block">
                    <div class="profile__hero hero-tournament">
                        <div class="hero-tournament__image">
                            <img src="img/player/player.webp" alt="Image" class="ibg">
                        </div>
                        <div class="hero-tournament__body">
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label hero-tournament__label--big">
                                    <span>МАМЕДОВ МАКСИМ</span>
                                </div>
                            </div>
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label">
                                    23 БЕРЕЗНЯ 2023
                                </div>
                            </div>
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label">
                                    РІВЕНЬ ПІДГОТОВКИ
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="hero-tournament__rating rating">
                                </div>
                                <button class="hero-tournament__button button button--green">
                                    <span>ЗМІНИТИ РІВЕНЬ</span>
                                </button>
                            </div>
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label">
                                    приват **** **** **** 5687
                                </div>
                                <button class="hero-tournament__button button button--green">
                                    <span>ЗМІНИТИ КАРТКУ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <section class="profile__teams teams-profile">
                        <h2 class="teams-profile__title section-title section-title--margin">
                            УПРАВЛІННЯ КОМАНДАМИ
                        </h2>
                        <!--
                        <div class="teams-profile__none">
                            ПОКИ ЩО НЕМАЄ СТВОРЕНИХ КОМАНД
                        </div>
                        -->
                        <div class="teams-profile__items">
                            <button class="teams-profile__item team-card">
                                <h3 class="team-card__name">afc sparta</h3>
                                <div class="team-card__logo">
                                    <img src="img/teams/01.webp" alt="Image" class="ibg ibg--contain">
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="team-card__rating rating">
                                </div>
                                <div class="team-card__label">
                                    БЕРКОВЩИНА
                                </div>
                            </button>
                            <button class="teams-profile__item team-card _active">
                                <h3 class="team-card__name">afc sparta</h3>
                                <div class="team-card__logo">
                                    <img src="img/teams/02.webp" alt="Image" class="ibg ibg--contain">
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="team-card__rating rating">
                                </div>
                                <div class="team-card__label">
                                    X-PARK
                                </div>
                            </button>
                            <button class="teams-profile__item team-card">
                                <h3 class="team-card__name">afc sparta</h3>
                                <div class="team-card__logo">
                                    <img src="img/teams/03.webp" alt="Image" class="ibg ibg--contain">
                                </div>
                                <div data-rating data-rating-size="10" data-rating-value="8" class="team-card__rating rating">
                                </div>
                                <div class="team-card__label">
                                    МЕРИДІАН
                                </div>
                            </button>
                        </div>
                        <div class="teams-profile__setup">
                            <div class="teams-profile__item team-card">
                                <h3 class="team-card__name">FC DONBASS</h3>
                                <div class="team-card__logo">
                                    <img src="img/teams/01.webp" alt="Image" class="ibg ibg--contain">
                                </div>
                            </div>
                            <button class="teams-profile__button button button--blue">
                                <span>ЗМІНИТИ НАЗВУ</span>
                            </button>
                            <label class="teams-profile__button button button--green upload-btn">
                                <input type="file" name="logo" accept="image.webp, image.webp, image/svg+xml" />
                                <span>ЗМІНИТИ ЛОГОТИП</span>
                            </label>
                        </div>
                    </section>
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
                            <div data-simplebar class="prop-profile__body">
                                <div class="prop-profile__requests">
                                    <div class="prop-profile__request request">
                                        <div class="request__time">
                                            16хв
                                        </div>
                                        <article class="request__body item-player item-player--stats">
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
                                            <div class="item-player__age">27 років</div>
                                        </article>
                                        <div class="request__footer">
                                            <button class="request__button request__button--red">ВІДМОВА</button>
                                            <button class="request__button request__button--green">ПІДПИСАТИ</button>
                                        </div>
                                    </div>
                                    <div class="prop-profile__request request">
                                        <div class="request__time">
                                            10г 6хв
                                        </div>
                                        <article class="request__body item-player item-player--stats">
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
                                            <div class="item-player__age">27 років</div>
                                        </article>
                                        <div class="request__footer">
                                            <button class="request__button request__button--red">ВІДМОВА</button>
                                            <button class="request__button request__button--green">ПІДПИСАТИ</button>
                                        </div>
                                    </div>
                                    <div class="prop-profile__request request">
                                        <div class="request__time">
                                            2дн 15г 7хв
                                        </div>
                                        <article class="request__body item-player item-player--stats">
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
                                            <div class="item-player__age">27 років</div>
                                        </article>
                                        <div class="request__footer">
                                            <button class="request__button request__button--red">ВІДМОВА</button>
                                            <button class="request__button request__button--green">ПІДПИСАТИ</button>
                                        </div>
                                    </div>
                                    <div class="prop-profile__request request">
                                        <div class="request__time">
                                            16хв
                                        </div>
                                        <article class="request__body item-player item-player--stats">
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
                                            <div class="item-player__age">27 років</div>
                                        </article>
                                        <div class="request__footer">
                                            <button class="request__button request__button--red">ВІДМОВА</button>
                                            <button class="request__button request__button--green">ПІДПИСАТИ</button>
                                        </div>
                                    </div>
                                    <div class="prop-profile__request request">
                                        <div class="request__time">
                                            10г 6хв
                                        </div>
                                        <article class="request__body item-player item-player--stats">
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
                                            <div class="item-player__age">27 років</div>
                                        </article>
                                        <div class="request__footer">
                                            <button class="request__button request__button--red">ВІДМОВА</button>
                                            <button class="request__button request__button--green">ПІДПИСАТИ</button>
                                        </div>
                                    </div>
                                    <div class="prop-profile__request request">
                                        <div class="request__time">
                                            2дн 15г 7хв
                                        </div>
                                        <article class="request__body item-player item-player--stats">
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
                                            <div class="item-player__age">27 років</div>
                                        </article>
                                        <div class="request__footer">
                                            <button class="request__button request__button--red">ВІДМОВА</button>
                                            <button class="request__button request__button--green">ПІДПИСАТИ</button>
                                        </div>
                                    </div>
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
                            <div class="prop-profile__subtitle label-prop">
                                СТАТУС ПОШУКУ
                            </div>
                            <div class="prop-profile__status status-prop">
                                <label class="status-prop__item">
                                    Терміново потрібні гравці
                                    <input type="radio" name="status">
                                </label>
                                <label class="status-prop__item">
                                    Потрібні гравці
                                    <input type="radio" name="status">
                                </label>
                                <label class="status-prop__item">
                                    Закрита заявка
                                    <input type="radio" name="status">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection