@extends('layouts.app')

@section('title', 'Створення команди')

@section('content')

    <div class="page__container">
        <div class="page__wrapper">
            <div class="page__team team">
                <div class="team__block _block">
                    <section class="team__hero hero-team">
                        <h2 class="hero-team__title section-title section-title--margin">
                            Меридіан - Суперліга
                        </h2>
                        <div class="hero-team__body">
                            <div class="hero-team__card team-card">
                                <h3 class="team-card__name">{{$team->name ?? ''}}</h3>
                                <div class="team-card__logo">
                                    <img src="/img/teams/01.webp" alt="Image" class="ibg ibg--contain">
                                </div>
                                <div style="--color: #0053A0" data-rating data-rating-size="10" data-rating-value="8" class="team-card__rating rating">

                                </div>
                            </div>
                            <div class="hero-team__image">
                                <img src="/img/gallery/01.webp" alt="Image" class="ibg">
                            </div>
                        </div>
                    </section>
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

                    <section class="team__members members-team">
                        <h2 class="members-team__title section-title section-title--margin">
                            СКЛАД КОМАНДИ
                        </h2>
                        <div class="members-team__items">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                        </div>
                    </section>
                    <section class="team__members members-team">
                        <h2 class="members-team__title section-title section-title--margin">
                            ДИСКВАЛІФІКАЦІЇ
                        </h2>
                        <div class="members-team__items">
                            <article class="item-player item-player--stats">
                                <a href="#" class="item-player__image-link">
                                    <img src="/img/player/player.webp" alt="Image" class="ibg">
                                </a>
                                <div class="item-player__name">
                                    <a href="#">МАКСИМ МАМЕДОВ</a>
                                </div>
                                <div class="item-player__details">
                                    <div class="item-player__info">
                                        31
                                        <img src="/img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-player__info">
                                        28
                                        <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
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
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



@endsection