@extends('layouts.app')

@section('title', 'Мій профіль')

@section('content')
<div class="container block-center">

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session()->has('notice'))
        <div class="alert alert-notice">
            {{ session('notice') }}
        </div>
    @endif
    {{-- <div class="flex justify-center flex-col items-center mb-4">
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
    </form> --}}
    

    <div class="page__container">
        <div class="page__wrapper">
            <div class="page__profile profile">
                <div class="profile__block _block">
                    <div class="profile__hero hero-tournament">
                        <div class="hero-tournament__image">
                            <img src="{{ asset('storage/' . $player->photo) }}" alt="Image" class="ibg">
                        </div>
                        <div class="hero-tournament__body">
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label hero-tournament__label--big">
                                    <span>{{ $player->last_name }} {{ $player->first_name }}</span>
                                </div>
                            </div>
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label">
                                    {{ $formattedBithDate }} 
                                </div>
                            </div>
                            <div class="hero-tournament__info">

                                <div class="hero-tournament__label">
                                    РІВЕНЬ ПІДГОТОВКИ
                                </div>
                                <form class="flex flex-col gap-2 items-center" action="{{route('profile')}}" method="post">
                                    @csrf
                                    <div data-rating="set" data-rating-size="10" data-rating-value="{{ $player->rating}}" class="hero-tournament__rating rating"></div>
                                    <button class="hero-tournament__button button button--green">
                                        <span>ЗМІНИТИ РІВЕНЬ</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <section class="profile__teams teams-profile">
                        <h2 class="teams-profile__title section-title section-title--margin">
                            УПРАВЛІННЯ КОМАНДАМИ
                        </h2>  
                        
                        @if($user->teams->isNotEmpty())
                            <div class="teams-profile__items">

                                @foreach($user->teams as $team)
                                <div class="flex flex-col max-w-60">
                                    <button wire:click="$emit('toggleEditing')" class="teams-profile__item team-card">
                                        <h3 class="team-card__name">{{ $team->name }}</h3>
                                        <div class="team-card__logo">
                                            <img src="{{ asset('storage/' . $team->logo) }}" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div data-rating data-rating-size="10" data-rating-value="8" class="team-card__rating rating">
                                        </div>
                                        <div class="team-card__label">
                                            БЕРКОВЩИНА
                                        </div>
                                    </button>
                                    
                                    <livewire:team-editor :team="$team"/>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="teams-profile__none">
                                ПОКИ ЩО НЕМАЄ СТВОРЕНИХ КОМАНД
                            </div>
                        @endif

                       
                    </section>
                    @if($user->teams->isNotEmpty())
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
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection