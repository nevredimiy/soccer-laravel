@extends('layouts.app')

@section('title', 'Створення команди')

@section('content')
<div class="page__container">
    <div class="page__wrapper">
        <div class="page__tournament tournament">
            <div class="tournament__block _block">
                <div class="tournament__hero hero-tournament">
                    <div class="hero-tournament__location item-stadium">
                        <h3 class="item-stadium__title">
                            БЕРКОВЩИНА
                        </h3>
                        <div class="item-stadium__image">
                            <img src="{{asset('img/stadium/preview.webp')}}" alt="Image" class="ibg">
                        </div>
                        <div class="item-stadium__body">
                            <div class="item-stadium__location _icon-location">
                                Пр-т Степана Бандери 19 (Парк Муромець)
                            </div>
                            <div class="item-stadium__details">
                                <div class="item-stadium__info info-stadium">
                                    4
                                    <div class="info-stadium__icon">
                                        <div class="info-stadium__field">
                                            40х20
                                            <img src="{{asset('img/stadium/01.webp')}}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium">
                                    1
                                    <div class="info-stadium__icon">
                                        <div class="info-stadium__field">
                                            60x40
                                            <img src="{{asset('img/stadium/01.webp')}}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium">
                                    50
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/02.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium _icon-check">
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/03.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium _icon-check">
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/04.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium">
                                    3
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/05.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium _icon-cross">
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/06.webp')}}" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-tournament__body">
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                X-PARK
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                СУПЕРЛІГА
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                27 ЧЕРВНЯ - 3 СЕРПНЯ
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                ФОРМАТ 5Х5Х5
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label _icon-field">
                                40х20м
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label hero-tournament__label--small">
                                <span>ЗАЯВКА КОМАНДИ:</span> 6-20 ГРАВЦІВ
                            </div>
                            <div class="hero-tournament__label hero-tournament__label--small">
                                <span>ЗАЯВКА СЕРІЮ:</span> 5-6 ГРАВЦІВ
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                Середній рівень гравців ЛІГИ
                            </div>
                            <div data-rating data-rating-size="10" data-rating-value="8" class="hero-tournament__rating rating">

                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                ₴ <span>100 ГРН / ГРАВЕЦЬ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="tournament__schedule schedule-tournament schedule-tournament--super">
                    <h2 class="schedule-tournament__title section-title section-title--margin">
                        РОЗКЛАД
                    </h2>
                    <div class="schedule-tournament__body">
                        <div class="schedule-tournament__block">
                            <div class="schedule-tournament__item schedule-tournament__item--info schedule-tournament__item--center">
                                <div class="schedule-tournament__label">
                                    10 КВІТНЯ
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
                                <div class="schedule-tournament__label">
                                    19:45
                                </div>
                            </div>
                            <div class="schedule-tournament__item schedule-tournament__item--info">
                                <div class="schedule-tournament__label">
                                    1 ТУР
                                </div>
                                <div class="schedule-tournament__label">
                                    СЕРІЯ А
                                </div>
                                <div class="schedule-tournament__label">
                                    СЕРІЯ В
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 1
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 2
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 3
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 4
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 5
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 6
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 7
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 8
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 9
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                        </div>
                        <div class="schedule-tournament__block">
                            <div class="schedule-tournament__item schedule-tournament__item--info schedule-tournament__item--center">
                                <div class="schedule-tournament__label">
                                    10 КВІТНЯ
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
                                <div class="schedule-tournament__label">
                                    19:45
                                </div>
                            </div>
                            <div class="schedule-tournament__item schedule-tournament__item--info">
                                <div class="schedule-tournament__label">
                                    1 ТУР
                                </div>
                                <div class="schedule-tournament__label">
                                    СЕРІЯ А
                                </div>
                                <div class="schedule-tournament__label">
                                    СЕРІЯ В
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 1
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 2
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 3
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 4
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 5
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 6
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 7
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 8
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 9
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                        </div>
                        <div class="schedule-tournament__block">
                            <div class="schedule-tournament__item schedule-tournament__item--info schedule-tournament__item--center">
                                <div class="schedule-tournament__label">
                                    10 КВІТНЯ
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
                                <div class="schedule-tournament__label">
                                    19:45
                                </div>
                            </div>
                            <div class="schedule-tournament__item schedule-tournament__item--info">
                                <div class="schedule-tournament__label">
                                    1 ТУР
                                </div>
                                <div class="schedule-tournament__label">
                                    СЕРІЯ А
                                </div>
                                <div class="schedule-tournament__label">
                                    СЕРІЯ В
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 1
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 2
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 3
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 4
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 5
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 6
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 7
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 8
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="orange-bg"></span>
                                    <span class="gray-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="yellow-bg"></span>
                                </div>
                            </div>
                            <div class="schedule-tournament__item">
                                <div class="schedule-tournament__label">
                                    МАТЧ 9
                                </div>
                                <div class="schedule-tournament__colors">
                                    <span class="blue-bg"></span>
                                    <span class="yellow-bg"></span>
                                    <span class="red-bg"></span>
                                    <span class="green-bg"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tournament__price price-tournament">
                    <h2 class="price-tournament__title section-title section-title section-title--margin">
                        ВАРТІСТЬ РЕЄСТРАЦІЇ КОМАНДИ
                    </h2>
                    <div class="price-tournament__body">
                        <div class="price-tournament__block">
                            <div class="price-tournament__item">
                                <span>
                                    КОМАНДА 1
                                </span>
                                <span>
                                    400 ГРН
                                </span>
                            </div>
                            <div class="price-tournament__item">
                                <span>
                                    КОМАНДА 2
                                </span>
                                <span>
                                    450 ГРН
                                </span>
                            </div>
                            <div class="price-tournament__item">
                                <span>
                                    КОМАНДА 3
                                </span>
                                <span>
                                    500 ГРН
                                </span>
                            </div>
                        </div>
                        <div class="price-tournament__block">
                            <div class="price-tournament__item">
                                <span>
                                    КОМАНДА 5
                                </span>
                                <span>
                                    500 ГРН
                                </span>
                            </div>
                            <div class="price-tournament__item">
                                <span>
                                    КОМАНДА 6
                                </span>
                                <span>
                                    550 ГРН
                                </span>
                            </div>
                            <div class="price-tournament__item">
                                <span>
                                    КОМАНДА 7
                                </span>
                                <span>
                                    600 ГРН
                                </span>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="tournament__reg reg-tournament">
                    <h2 class="reg-tournament__title section-title section-title--margin">
                        ЗАЯВИТИ КОМАНДУ
                    </h2>
                    <div class="reg-tournament__body">
                        <div style="--color: #F7E10E" class="reg-tournament__item reg-tournament__item--join">
                            <div class="reg-tournament__label">
                                ПЕРУН
                            </div>
                            <div style="--color: #FFF" class="reg-tournament__rating">
                                <div data-rating data-rating-size="10" data-rating-value="8" class="rating">
                                </div>
                            </div>
                            <div style="--color: #ed1c24" class="reg-tournament__status">
                                <span>Заявка закрита</span>
                            </div>
                        </div>
                        <div style="--color: #1B5BA2" class="reg-tournament__item reg-tournament__item--join">
                            <div class="reg-tournament__label">
                                AFC SPARTA
                            </div>
                            <div style="--color: #FFF" class="reg-tournament__rating">
                                <div data-rating data-rating-size="10" data-rating-value="8" class="rating">
                                </div>
                            </div>
                            <div style="--color: #b5e61d" class="reg-tournament__status">
                                <span>Потрібні гравці</span>
                            </div>
                            <button class="reg-tournament__button button button--yellow">
                                Хочу грати
                            </button>
                        </div>
                        <div style="--color: #59C65D" class="reg-tournament__item reg-tournament__item--join">
                            <div class="reg-tournament__label">
                                ДНІПРО
                            </div>
                            <div style="--color: #FFF" class="reg-tournament__rating">
                                <div data-rating data-rating-size="10" data-rating-value="8" class="rating">
                                </div>
                            </div>
                            <div style="--color: #22b14c" class="reg-tournament__status">
                                <span>Терміново потрібні гравці</span>
                            </div>
                            <button class="reg-tournament__button button button--yellow">
                                Хочу грати
                            </button>
                        </div>
                    </div>
                    <div class="reg-tournament__actions">
                        <a href="{{ route('teams.request.create', ['id' => $event->id]) }}" class="reg-tournament__link button button--yellow"><span>ЗАЯВИТИ КОМАНДУ</span></a>
                    </div>
                </section>
                <section class="tournament__reg-view reg-tournament">
                    <h2 class="reg-tournament__title section-title section-title--margin">
                        ЗАЯВЛЕНІ КОМАНДИ
                    </h2>
                    <div class="reg-tournament__body">
                        <div style="--color: #F7E10E" class="reg-tournament__item">
                            <div class="reg-tournament__label">
                                ПЕРУН
                            </div>
                            <div style="--color: #FFF" class="reg-tournament__rating">
                                <div data-rating data-rating-size="10" data-rating-value="8" class="rating">
                                </div>
                            </div>
                        </div>
                        <div style="--color: #1B5BA2" class="reg-tournament__item">
                            <div class="reg-tournament__label">
                                AFC SPARTA
                            </div>
                            <div style="--color: #FFF" class="reg-tournament__rating">
                                <div data-rating data-rating-size="10" data-rating-value="8" class="rating">
                                </div>
                            </div>
                        </div>
                        <div style="--color: #59C65D" class="reg-tournament__item">
                            <div class="reg-tournament__label">
                                ДНІПРО
                            </div>
                            <div style="--color: #FFF" class="reg-tournament__rating">
                                <div data-rating data-rating-size="10" data-rating-value="8" class="rating">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection