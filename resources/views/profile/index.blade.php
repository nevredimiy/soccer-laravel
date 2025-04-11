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
    @if (session()->has('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    

   
    {{-- <form method="POST" action="{{ route('liqpay.pay') }}">
        @csrf
        <input type="number" name="amount" placeholder="Сумма" required class="border p-2">
        <button type="submit" class="bg-green-500 text-white px-4 py-2">Пополнить через LiqPay</button>
    </form> --}}
    

    <div class="page__container">
        <div class="page__wrapper">
            <div class="page__profile profile">
                <div class="profile__block _block">
                    <div class="flex justify-center flex-col items-center mb-4">
                        <h2 class="hero-tournament__label hero-tournament__label--big">Мій профіль</h2>
                        <p>Вітаємо, {{ auth()->user()->name }}!</p>
                    </div>
                    <div class="profile__hero hero-tournament">
                        <div class="hero-tournament__image">
                            <img src="{{ asset('storage/' . $player->photo) }}" alt="Image" class="{{auth()->user()->name}}">
                        </div>
                        <div class="hero-tournament__body">
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label hero-tournament__label--big">
                                    <span>{{ $player->last_name }} {{ $player->first_name }}</span>
                                </div>
                            </div>
                            <div class="hero-tournament__info">
                                <div class="hero-tournament__label">
                                    Email: {{ auth()->user()->email }}
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
                                <form class="flex flex-col gap-2 items-center" action="{{route('profile.updateRating')}}" method="post">
                                    @csrf
                                    <div data-rating="set" data-rating-size="10" data-rating-value="{{ $player->rating}}" class="hero-tournament__rating rating"></div>
                                    <button class="hero-tournament__button button button--green">
                                        <span>ЗМІНИТИ РІВЕНЬ</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                       
                    </div>
                    <div class="hero-tournament__info flex justify-center mb-8">
                        <div class="button button--blue">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                              </svg>
                              
                            <a href="{{route('players.edit')}}">Редагувати дані</a>
                        </div>
                    </div>
                    <section class="profile__teams teams-profile">                        
                        <h2 class="teams-profile__title section-title section-title--margin">
                            УПРАВЛІННЯ КОМАНДАМИ
                        </h2>                          
                        @if($user->teams->isNotEmpty())

                              <livewire:team-list />

                        @else
                            <div class="teams-profile__none">
                                ПОКИ ЩО НЕМАЄ СТВОРЕНИХ КОМАНД
                            </div>
                        @endif                            
                    </section>

        {{-- <h2>ЗАЯВКА №1 Для игрока одиночного турнира</h2>
                    <section class="team__calendar calendar-team">
                        <h2 class="calendar-team__title section-title section-title--margin">
                            КАЛЕНДАР
                        </h2>
                        <div class="calendar-team__items">
                            <div class="calendar-team__item match-info">
                                <div class="match-info__details">
                                    <div class="match-info__label">
                                        27 Червня
                                    </div>
                                    <div class="match-info__label">
                                        ВТ
                                    </div>
                                    <div class="match-info__label">
                                        19:45
                                    </div>
                                    <div class="match-info__label">
                                        9 ТУР
                                    </div>
                                    <div class="match-info__label">
                                        СЕРІЯ Б
                                    </div>
                                </div>
                                <div class="match-info__teams">
                                    <div class="match-info__label blue-bg">
                                        AFC SPARTA
                                    </div>
                                    <div class="match-info__label green-bg">
                                        ДИНАМО ВІДРАДНИЙ
                                    </div>
                                    <div class="match-info__label gray-bg">
                                        КЗПТО
                                    </div>
                                </div>
                            </div>
                            <div class="calendar-team__item match-info">
                                <div class="match-info__details">
                                    <div class="match-info__label">
                                        27 Червня
                                    </div>
                                    <div class="match-info__label">
                                        ВТ
                                    </div>
                                    <div class="match-info__label">
                                        19:45
                                    </div>
                                    <div class="match-info__label">
                                        9 ТУР
                                    </div>
                                    <div class="match-info__label">
                                        СЕРІЯ Б
                                    </div>
                                </div>
                                <div class="match-info__teams">
                                    <div class="match-info__label blue-bg">
                                        AFC SPARTA
                                    </div>
                                    <div class="match-info__label green-bg">
                                        ДИНАМО ВІДРАДНИЙ
                                    </div>
                                    <div class="match-info__label gray-bg">
                                        КЗПТО
                                    </div>
                                </div>
                            </div>
                            <div class="calendar-team__item match-info">
                                <div class="match-info__details">
                                    <div class="match-info__label">
                                        27 Червня
                                    </div>
                                    <div class="match-info__label">
                                        ВТ
                                    </div>
                                    <div class="match-info__label">
                                        19:45
                                    </div>
                                    <div class="match-info__label">
                                        9 ТУР
                                    </div>
                                    <div class="match-info__label">
                                        СЕРІЯ Б
                                    </div>
                                </div>
                                <div class="match-info__teams">
                                    <div class="match-info__label blue-bg">
                                        AFC SPARTA
                                    </div>
                                    <div class="match-info__label green-bg">
                                        ДИНАМО ВІДРАДНИЙ
                                    </div>
                                    <div class="match-info__label gray-bg">
                                        КЗПТО
                                    </div>
                                </div>
                            </div>
                            <div class="calendar-team__item match-info">
                                <div class="match-info__details">
                                    <div class="match-info__label">
                                        27 Червня
                                    </div>
                                    <div class="match-info__label">
                                        ВТ
                                    </div>
                                    <div class="match-info__label">
                                        19:45
                                    </div>
                                    <div class="match-info__label">
                                        9 ТУР
                                    </div>
                                    <div class="match-info__label">
                                        СЕРІЯ Б
                                    </div>
                                </div>
                                <div class="match-info__teams">
                                    <div class="match-info__label blue-bg">
                                        AFC SPARTA
                                    </div>
                                    <div class="match-info__label green-bg">
                                        ДИНАМО ВІДРАДНИЙ
                                    </div>
                                    <div class="match-info__label gray-bg">
                                        КЗПТО
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="team__latest-series latest-series">
                        <h2 class="latest-series__title section-title section-title--margin">
                            ЗАЯВКА НА НАЙБЛИЖЧУ СЕРІЮ
                        </h2>
                        <div class="latest-series__match-info match-info">
                            <div class="match-info__details">
                                <div class="match-info__label">
                                    27 Червня
                                </div>
                                <div class="match-info__label">
                                    ВТ
                                </div>
                                <div class="match-info__label">
                                    19:45
                                </div>
                                <div class="match-info__label">
                                    9 ТУР
                                </div>
                                <div class="match-info__label">
                                    СЕРІЯ Б
                                </div>
                            </div>
                            <div class="match-info__teams">
                                <div class="match-info__label blue-bg">
                                    AFC SPARTA
                                </div>
                                <div class="match-info__label green-bg">
                                    ДИНАМО ВІДРАДНИЙ
                                </div>
                                <div class="match-info__label gray-bg">
                                    КЗПТО
                                </div>
                            </div>
                        </div>
                        <div class="latest-series__items">
                            <div class="latest-series__item">
                                <article class="item-player item-player--stats">
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ 1</a>
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
                                    <div data-rating="" data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                    </div>
                                </article>
                            </div>
                            <div class="latest-series__item">
                                <article class="item-player item-player--stats">
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ 2</a>
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
                                    <div data-rating="" data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                   </div>
                                </article>
                            </div>
                            <div class="latest-series__item">
                                <button class="latest-series__empty">
                                    ЗАЙНЯТИ МІСЦЕ
                                </button>
                            </div>
                            <div class="latest-series__item">
                                <article class="item-player item-player--stats">
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ 3</a>
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
                                    <div data-rating="" data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                    </div>
                                </article>
                            </div>
                            <div class="latest-series__item">
                                <button class="latest-series__empty">
                                    ЗАЙНЯТИ МІСЦЕ
                                </button>
                            </div>
                            <div class="latest-series__item">
                                <article class="item-player item-player--stats">
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ 4</a>
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
                                    <div data-rating="" data-rating-size="10" data-rating-value="8" class="item-player__rating rating">
                                    </div>
                                </article>
                            </div>
                        </div>
                    </section>





                    <h2>ЗАЯВКА №2 Для игрока одиночного турнира (відкритий)</h2>
                    <section class="tournament__schedule schedule-tournament">
                        <h2 class="schedule-tournament__title section-title section-title--margin">
                            РОЗКЛАД
                        </h2>
                        <div class="schedule-tournament__body">
                            <div class="schedule-tournament__block">
                                <div class="schedule-tournament__item schedule-tournament__item--center schedule-tournament__item--info">
                                    <div class="schedule-tournament__label">
                                        27 ЧЕРВНЯ
                                    </div>
                                    <div class="schedule-tournament__label">
                                        ВІВТОРОК
                                    </div>
                                </div>
                                <div class="schedule-tournament__item schedule-tournament__item--info">
                                    <div class="schedule-tournament__label">
                                        ЧАС
                                    </div>
                                    <div class="schedule-tournament__label">
                                        19:00
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 1
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="blue-bg"></span>
                                        <span class="yellow-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 2
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="blue-bg"></span>
                                        <span class="green-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 3
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="yellow-bg"></span>
                                        <span class="green-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 4
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="blue-bg"></span>
                                        <span class="yellow-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 5
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="blue-bg"></span>
                                        <span class="green-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 6
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="yellow-bg"></span>
                                        <span class="green-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 7
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="blue-bg"></span>
                                        <span class="yellow-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 8
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="blue-bg"></span>
                                        <span class="green-bg"></span>
                                    </div>
                                </div>
                                <div class="schedule-tournament__item">
                                    <div class="schedule-tournament__label">
                                        МАТЧ 9
                                    </div>
                                    <div class="schedule-tournament__colors">
                                        <span class="yellow-bg"></span>
                                        <span class="green-bg"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="schedule-tournament__button button button--yellow">
                            <span>ЗАЯВИТИСЬ НА ТУРНІР</span>
                        </button>
                    </section>

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

                    <h2>ЗАЯВКА №3 Для игрока одиночного турнира (приватний)</h2>
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
                    </section> --}}

                    
                    
                    @if($user->teams->isNotEmpty())
                        <livewire:team-details />
                    @endif 
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection