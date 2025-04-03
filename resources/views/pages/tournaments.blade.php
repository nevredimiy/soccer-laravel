@extends('layouts.app')

@section('title', 'Турніри')




@section('content')

<livewire:dependent-dropdown />

    <div class="page__container">
        <div class="page__wrapper">
            <div class="page__home home">
                <h1 class="">Сторінка турніри</h1>
                <div class="home__block _block">
                    <section class="home__tournament-table table-section">
                        <h2 class="table-section__title section-title section-title--margin">
                            Турнірна таблиця
                        </h2>
                        <div class="table-section__subtitle">
                            Меридіан - Суперліга
                        </div>
                        <div data-simplebar class="table-section__body">
                            <div class="table-section__table-wrapper">
                                <table class="table-section__table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="fz-big">M</span>
                                            </th>
                                            <th></th>
                                            <th>
                                                <span class="team fz-big">Команда</span>
                                            </th>
                                            <th>
                                                <span class="digit">I</span>
                                            </th>
                                            <th>
                                                <span class="digit">II</span>
                                            </th>
                                            <th>
                                                <span class="digit">III</span>
                                            </th>
                                            <th>
                                                <span class="digit">IV</span>
                                            </th>
                                            <th>
                                                <span class="digit">V</span>
                                            </th>
                                            <th>
                                                <span class="digit">VI</span>
                                            </th>
                                            <th>
                                                <span class="digit">VII</span>
                                            </th>
                                            <th>
                                                <span class="digit">IIX</span>
                                            </th>
                                            <th>
                                                <span class="digit">IX</span>
                                            </th>
                                            <th>
                                                <span class="digit">X</span>
                                            </th>
                                            <th>
                                                <span class="digit">XI</span>
                                            </th>
                                            <th>
                                                <span class="digit">XII</span>
                                            </th>
                                            <th>
                                                <span class="digit">Ф</span>
                                            </th>
                                            <th>
                                                <span>В</span>
                                            </th>
                                            <th>
                                                <span>Н</span>
                                            </th>
                                            <th>
                                                <span>П</span>
                                            </th>
                                            <th>
                                                <span>ЗМ</span>
                                            </th>
                                            <th>
                                                <span>ПМ</span>
                                            </th>
                                            <th>
                                                <span>РМ</span>
                                            </th>
                                            <th>
                                                <span>О</span>
                                            </th>
                                            <th>
                                                <span>Б</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="fz-big">1</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #ff0000;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">2</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #00b050;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">3</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #ffff00;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">4</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #ff7f27;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">5</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #0070c0;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ <div class="small-label">(Дружківка)</div></span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">6</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #808080;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">7</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #99d9ea;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">8</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #9bbb59;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">9</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #ff99ff;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <section class="home__best-players players-section">
                        <h2 class="players-section__title section-title section-title--margin">
                            НАЙКРАЩІ БОМБАРДИРИ ЛІГИ
                        </h2>
                        <div data-simplebar class="players-section__body">
                            <div class="players-section__items">
                                <article style="--color: #FF3B3B" class="players-section__item item-player">
                                    <div class="item-player__position">
                                        1 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article style="--color: #59C65D" class="players-section__item item-player">
                                    <div class="item-player__position">
                                        2 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article style="--color: #FF7F27" class="players-section__item item-player">
                                    <div class="item-player__position">
                                        3 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article style="--color: #FF3B3B" class="players-section__item item-player">
                                    <div class="item-player__position">
                                        4 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article style="--color: #0053A0" class="players-section__item item-player">
                                    <div class="item-player__position">
                                        5 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article style="--color: #F7E10E" class="players-section__item item-player">
                                    <div class="item-player__position">
                                        6 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article class="players-section__item item-player">
                                    <div class="item-player__position">
                                        7 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article class="players-section__item item-player">
                                    <div class="item-player__position">
                                        8 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article class="players-section__item item-player">
                                    <div class="item-player__position">
                                        9 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                                <article class="players-section__item item-player">
                                    <div class="item-player__position">
                                        10 місце
                                    </div>
                                    <a href="#" class="item-player__image-link">
                                        <img src="img/player/player.webp" alt="Image" class="ibg">
                                    </a>
                                    <div class="item-player__details">
                                        <div class="item-player__info">
                                            31
                                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                        <div class="item-player__info">
                                            28
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </div>
                                    </div>
                                    <div class="item-player__name">
                                        <a href="#">МАКСИМ МАМЕДОВ</a>
                                    </div>
                                </article>
                            </div>
                        </div>

                    </section>
                </div>
                <div class="home__block _block">
                    <section class="home__calendar calendar-section">
                        <h2 class="calendar-section__title section-title section-title--margin">
                            Календар
                        </h2>
                        <div class="calendar-section__body">
                            <div class="calendar-section__block">
                                <div class="calendar-section__series">
                                    СЕРІЯ Б ЧТ 18:30
                                </div>
                                <div class="calendar-section__items">
                                    <div class="calendar-section__item item-calendar item-calendar--gray-bg">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                1 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="red-bg"></span>
                                                <span class="yellow-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                2 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="orange-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                3 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="gray-bg"></span>
                                                <span class="green-bg"></span>
                                                <span class="blue-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                4 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                5 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                6 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                7 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="gray-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                8 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="orange-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                9 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                10 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                11 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                12 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                ФІНАЛ (Б)
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calendar-section__block">
                                <div class="calendar-section__series">
                                    СЕРІЯ Б ЧТ 18:30
                                </div>
                                <div class="calendar-section__items">
                                    <div class="calendar-section__item item-calendar item-calendar--gray-bg">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                1 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="red-bg"></span>
                                                <span class="yellow-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                2 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="orange-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                3 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="gray-bg"></span>
                                                <span class="green-bg"></span>
                                                <span class="blue-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                4 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                5 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                6 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                7 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="gray-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                8 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="orange-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                9 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                10 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                11 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                12 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                ФІНАЛ (Б)
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calendar-section__block">
                                <div class="calendar-section__series">
                                    СЕРІЯ Б ЧТ 18:30
                                </div>
                                <div class="calendar-section__items">
                                    <div class="calendar-section__item item-calendar item-calendar--gray-bg">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                1 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="red-bg"></span>
                                                <span class="yellow-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                2 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="orange-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                3 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="gray-bg"></span>
                                                <span class="green-bg"></span>
                                                <span class="blue-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                4 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                5 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                6 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                7 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="gray-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar ">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                8 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="orange-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                9 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                10 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                11 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="blue-bg"></span>
                                                <span class="yellow-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                12 Тур
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="calendar-section__item item-calendar item-calendar--border">
                                        <div class="item-calendar__date">
                                            30.03
                                        </div>
                                        <div class="item-calendar__wrapper">
                                            <div class="item-calendar__label">
                                                ФІНАЛ (Б)
                                            </div>
                                            <div class="item-calendar__body">
                                                <span class="red-bg"></span>
                                                <span class="orange-bg"></span>
                                                <span class="green-bg"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="home__series-result table-section">
                        <h2 class="table-section__title section-title section-title--margin">
                            Результати серії
                        </h2>
                        <div data-simplebar class="table-section__body">
                            <div class="table-section__table-wrapper">
                                <table class="table-section__table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="fz-big">M</span>
                                            </th>
                                            <th></th>
                                            <th>
                                                <span class="team fz-big">Команда</span>
                                            </th>
                                            <th>
                                                <span>В</span>
                                            </th>
                                            <th>
                                                <span>Н</span>
                                            </th>
                                            <th>
                                                <span>П</span>
                                            </th>
                                            <th>
                                                <span>ЗМ</span>
                                            </th>
                                            <th>
                                                <span>ПМ</span>
                                            </th>
                                            <th>
                                                <span>РМ</span>
                                            </th>
                                            <th>
                                                <span>О</span>
                                            </th>
                                            <th>
                                                <span>Б</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="fz-big">1</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #F7E10E;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span>11</span>
                                            </td>
                                            <td>
                                                <span>4</span>
                                            </td>
                                            <td>
                                                <span>7</span>
                                            </td>
                                            <td>
                                                <span class="border">87</span>
                                            </td>
                                            <td>
                                                <span class="border">65</span>
                                            </td>
                                            <td>
                                                <span class="border">16</span>
                                            </td>
                                            <td>
                                                <span class="blue-bg">27</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">3</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">2</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #59C65D;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span>11</span>
                                            </td>
                                            <td>
                                                <span>4</span>
                                            </td>
                                            <td>
                                                <span>7</span>
                                            </td>
                                            <td>
                                                <span class="border">87</span>
                                            </td>
                                            <td>
                                                <span class="border">65</span>
                                            </td>
                                            <td>
                                                <span class="border">16</span>
                                            </td>
                                            <td>
                                                <span class="blue-bg">27</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">3</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="fz-big">3</span>
                                            </td>
                                            <td class="color">
                                                <span style="background-color: #0053A0;">
                                                </span>
                                            </td>
                                            <td>
                                                <span class="team fz-big">ДП АНТОНОВ</span>
                                            </td>
                                            <td>
                                                <span>11</span>
                                            </td>
                                            <td>
                                                <span>4</span>
                                            </td>
                                            <td>
                                                <span>7</span>
                                            </td>
                                            <td>
                                                <span class="border">87</span>
                                            </td>
                                            <td>
                                                <span class="border">65</span>
                                            </td>
                                            <td>
                                                <span class="border">16</span>
                                            </td>
                                            <td>
                                                <span class="blue-bg">27</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">3</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <section class="home__protocol protocol">
                        <h2 class="protocol__title section-title section-title--margin">Протокол серії</h2>
                        <div data-simplebar class="protocol__body">
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 1
                                    </div>
                                    <span class="blue-bg">2</span>
                                    <span class="yellow-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__shoe up">
                                            4
                                            <img src="img/player/shoe.svg" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__yellow">
                                            1
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            6
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__red up">
                                            4
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 2
                                    </div>
                                    <span class="blue-bg">0</span>
                                    <span class="green-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 3
                                    </div>
                                    <span class="green-bg">1</span>
                                    <span class="yellow-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__yellow">
                                            1
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball up">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__yellow up">
                                            6
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 1
                                    </div>
                                    <span class="blue-bg">2</span>
                                    <span class="yellow-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__yellow">
                                            1
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            6
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__red up">
                                            4
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 2
                                    </div>
                                    <span class="blue-bg">0</span>
                                    <span class="green-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 3
                                    </div>
                                    <span class="green-bg">1</span>
                                    <span class="yellow-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__yellow">
                                            1
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball up">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__yellow up">
                                            6
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 1
                                    </div>
                                    <span class="blue-bg">2</span>
                                    <span class="yellow-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__yellow">
                                            1
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            6
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__red up">
                                            4
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 2
                                    </div>
                                    <span class="blue-bg">0</span>
                                    <span class="green-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item blue-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__block">
                                <div class="protocol__match match-protocol">
                                    <div class="match-protocol__label">
                                        МАТЧ 3
                                    </div>
                                    <span class="green-bg">1</span>
                                    <span class="yellow-bg">1</span>
                                </div>
                                <div class="protocol__content">
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__yellow up">
                                            5
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__ball">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball up">
                                            4
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__red">
                                            3
                                        </span>
                                    </div>
                                    <div class="protocol__item yellow-bg">
                                        <span class="protocol__yellow">
                                            1
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__ball up">
                                            2
                                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                        </span>
                                    </div>
                                    <div class="protocol__item green-bg">
                                        <span class="protocol__yellow up">
                                            6
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="home__best-players players-section">
                        <h2 class="players-section__title section-title section-title--margin">
                            НАЙКРАЩІ БОМБАРДИРИ ЛІГИ
                        </h2>
                        <div class="players-section__content">
                            <div data-simplebar class="players-section__body">
                                <div class="players-section__items">
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            1 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #59C65D" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            2 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF7F27" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            3 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            4 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #0053A0" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            5 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #F7E10E" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            6 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            7 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            8 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            9 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            10 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div data-simplebar class="players-section__body">
                                <div class="players-section__items">
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            1 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #59C65D" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            2 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF7F27" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            3 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            4 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #0053A0" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            5 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #F7E10E" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            6 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            7 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            8 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            9 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            10 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>


                    </section>
                    <section class="home__teams teams-section">
                        <h2 class="teams-section__title section-title section-title--margin">
                            Склади команд на гру
                        </h2>
                        <div class="teams-section__body">
                            <div style="--color: #0053A0" class="teams-section__item item-team-home">
                                <div data-rating data-rating-size="10" data-rating-value="7" class="item-team-home__team-rating rating">
                                </div>
                                <div class="item-team-home__header">
                                    <div class="item-team-home__title">
                                        №
                                    </div>
                                    <div class="item-team-home__title">
                                        ГРАВЕЦЬ
                                    </div>
                                    <div class="item-team-home__icon">
                                        <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-team-home__icon">
                                        <img src="img/player/shoe.svg" alt="Image" class="ibg ibg--contain">
                                    </div>
                                </div>
                                <ol class="item-team-home__list">
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span class="active">МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                </ol>
                            </div>
                            <div style="--color: #59C65D" class="teams-section__item item-team-home">
                                <div data-rating data-rating-size="10" data-rating-value="7" class="item-team-home__team-rating rating">
                                </div>
                                <div class="item-team-home__header">
                                    <div class="item-team-home__title">
                                        №
                                    </div>
                                    <div class="item-team-home__title">
                                        ГРАВЕЦЬ
                                    </div>
                                    <div class="item-team-home__icon">
                                        <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-team-home__icon">
                                        <img src="img/player/shoe.svg" alt="Image" class="ibg ibg--contain">
                                    </div>
                                </div>
                                <ol class="item-team-home__list">
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span class="active">МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                    </li>
                                </ol>
                            </div>
                            <div style="--color: #F7E10E" class="teams-section__item item-team-home">
                                <div data-rating data-rating-size="10" data-rating-value="7" class="item-team-home__team-rating rating">
                                </div>
                                <div class="item-team-home__header">
                                    <div class="item-team-home__title">
                                        №
                                    </div>
                                    <div class="item-team-home__title">
                                        ГРАВЕЦЬ
                                    </div>
                                    <div class="item-team-home__icon">
                                        <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-team-home__icon">
                                        <img src="img/player/shoe.svg" alt="Image" class="ibg ibg--contain">
                                    </div>
                                    <div class="item-team-home__icon">
                                        <img src="img/player/star.svg" alt="Image" class="ibg ibg--contain">
                                    </div>
                                </div>
                                <ol class="item-team-home__list">
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span class="active">МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                        <div class="item-team-home__value">4,76</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                        <div class="item-team-home__value">4,76</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                        <div class="item-team-home__value">4,76</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                        <div class="item-team-home__value">4,76</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                        <div class="item-team-home__value">4,76</div>
                                    </li>
                                    <li class="item-team-home__member">
                                        <div class="item-team-home__circle"></div>
                                        <span>МАКСИМ МАМЕДОВ</span>
                                        <div class="item-team-home__value">2</div>
                                        <div class="item-team-home__value">0</div>
                                        <div class="item-team-home__value">4,76</div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </section>
                    <section class="home__gallery gallery-home">
                        <h2 class="gallery-home__title section-title section-title--margin">
                            Фото команд
                        </h2>
                        <div class="gallery-home__items">
                            <img src="img/gallery/01.webp" alt="Image">
                            <img src="img/gallery/02.webp" alt="Image">
                            <img src="img/gallery/03.webp" alt="Image">
                        </div>
                    </section>
                </div>
                <div class="home__block _block">
                    <section class="home__indiv-table table-section">
                        <h2 class="table-section__title section-title section-title--margin">
                            Турнірна таблиця
                        </h2>
                        <div class="table-section__subtitle">
                            Меридіан - Суперліга
                        </div>
                        <div data-simplebar class="table-section__body">
                            <div class="table-section__table-wrapper">
                                <table class="table-section__table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="fz-big">M</span>
                                            </th>
                                            <th></th>
                                            <th>
                                                <span class="team fz-big">Команда</span>
                                            </th>
                                            <th>
                                                <span class="digit">I</span>
                                            </th>
                                            <th>
                                                <span class="digit">II</span>
                                            </th>
                                            <th>
                                                <span class="digit">III</span>
                                            </th>
                                            <th>
                                                <span class="digit">IV</span>
                                            </th>
                                            <th>
                                                <span class="digit">V</span>
                                            </th>
                                            <th>
                                                <span class="digit">VI</span>
                                            </th>
                                            <th>
                                                <span class="digit">VII</span>
                                            </th>
                                            <th>
                                                <span class="digit">IIX</span>
                                            </th>
                                            <th>
                                                <span class="digit">IX</span>
                                            </th>
                                            <th>
                                                <span class="digit">X</span>
                                            </th>
                                            <th>
                                                <span>В</span>
                                            </th>
                                            <th>
                                                <span>Н</span>
                                            </th>
                                            <th>
                                                <span>П</span>
                                            </th>
                                            <th>
                                                <span>ЗМ</span>
                                            </th>
                                            <th>
                                                <span>ПМ</span>
                                            </th>
                                            <th>
                                                <span>РМ</span>
                                            </th>
                                            <th>
                                                <span>О</span>
                                            </th>
                                            <th>
                                                <span>Б</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="place gold">1</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place gold">1</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place gold">1</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place gold">1</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place gold">1</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place silver">2</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place silver">2</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place silver">2</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place silver">2</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place silver">2</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place bronze">3</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place bronze">3</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place bronze">3</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place bronze">3</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place bronze">3</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place">4</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="place">4</span>
                                            </td>
                                            <td>
                                                <div class="photo">
                                                    <img src="img/player/player.webp" alt="Image" class="ibg">
                                                </div>
                                            </td>
                                            <td>
                                                <span class="team fz-big">Мамедов Максим</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">3</span>
                                            </td>
                                            <td>
                                                <span class="digit">1</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit">2</span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="digit"></span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">210</span>
                                            </td>
                                            <td>
                                                <span class="border">127</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="border">83</span>
                                            </td>
                                            <td>
                                                <span class="gray-bg">27</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <section class="home__best-players players-section players-section--full">
                        <h2 class="players-section__title section-title section-title--margin">
                            НАЙКРАЩІ БОМБАРДИРИ ЛІГИ
                        </h2>
                        <div class="players-section__content players-section__content--triple">
                            <div data-simplebar class="players-section__body">
                                <div class="players-section__items">
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            1 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #59C65D" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            2 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF7F27" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            3 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            4 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #0053A0" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            5 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">

                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #F7E10E" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            6 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            7 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            8 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            9 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            10 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div data-simplebar class="players-section__body">
                                <div class="players-section__items">
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            1 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #59C65D" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            2 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF7F27" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            3 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            4 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #0053A0" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            5 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #F7E10E" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            6 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            7 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            8 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            9 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            10 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div data-simplebar class="players-section__body">
                                <div class="players-section__items">
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            1 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #59C65D" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            2 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF7F27" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            3 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #FF3B3B" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            4 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #0053A0" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            5 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article style="--color: #F7E10E" class="players-section__item item-player">
                                        <div class="item-player__position">
                                            6 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            7 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            8 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            9 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                    <article class="players-section__item item-player">
                                        <div class="item-player__position">
                                            10 місце
                                        </div>
                                        <a href="#" class="item-player__image-link">
                                            <img src="img/player/player.webp" alt="Image" class="ibg">
                                        </a>
                                        <div class="item-player__details">
                                            <div class="item-player__info">
                                                31
                                                <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                            <div class="item-player__info">
                                                28
                                                <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                            </div>
                                        </div>
                                        <div class="item-player__name">
                                            <a href="#">МАКСИМ МАМЕДОВ</a>
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>


                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection	
   