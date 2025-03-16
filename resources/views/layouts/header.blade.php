<header class="header">
    <div class="header__container">
        <div class="header__images">
            <a href="#" class="header__logo">
                <img src="/img/header/logo.svg" alt="Image" class="ibg ibg--contain">
            </a>
        </div>
        <div class="header__menu">
            <div class="header__block">
                <!--Активному пукнту додати клас _active-->
                <a href="#" class="header__link button _icon-ch-right">
                    <span>Заявити команду</span>
                </a>
                <a href="#" class="header__link button _icon-ch-right">
                    <span>Заявка гравця</span>
                </a>
            </div>
            <div data-da=".header__images, 767.98, last" class="header__city">
                КИЇВ
                <img src="/img/header/kyiv.webp" alt="Image" class="ibg ibg--contain">
            </div>


            <div class="header__block">
                @auth
                    <!-- Пользователь авторизован -->
                    <div class="header__profile profile-header">
                        <div class="profile-header__image">
                            <img src="{{ auth()->user()->avatar ?? asset('/img/header/profile.webp') }}" alt="Avatar" class="ibg">
                        </div>
                        <div class="profile-header__label">
                            {{ number_format(auth()->user()->balance ?? 0, 2) }} грн
                        </div>
                        <button id="top-up-balance" class="profile-header__add _icon-add-circle"></button>
                    </div>
                    <a href="{{ route('profile') }}" class="header__link button button--transparent _icon-user-circle">
                        <span>Профіль</span>
                    </a>
                    <a href="#" onclick="document.getElementById('logout-form').submit();" class="header__link button button--transparent _icon-logout">
                        <span>Вихід</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <!-- Гость (не авторизован) -->
                    <a href="{{ route('register') }}" class="header__link button button--transparent _icon-user-add">
                        <span>Реєстрація</span>
                    </a>
                    <a href="{{ route('login') }}" class="header__link button button--transparent _icon-login">
                        <span>Вхід</span>
                    </a>
                @endauth
            </div>
            
        </div>
        <div class="header__contacts">
            <a href="#" class="header__phone">+38(093) 431 94 92</a>
            <div class="header__social social">
                <a href="#" class="social__item _icon-s-fb">
                </a>
                <a href="#" class="social__item _icon-s-inst">
                </a>
            </div>
        </div>
    </div>
</header>

<div class="page__nav nav">
    <div class="nav__container">
        <div data-simplebar class="nav__body">
            <ul class="nav__list">
                <!--Активному пукнту додати клас _active-->
                <li>
                    <a href="#">
                        Головна
                    </a>
                </li>
                <li>
                    <a href="#">
                        Місто
                    </a>
                </li>
                <li>
                    <a href="#">
                        Таблиці
                    </a>
                </li>
                <li>
                    <a href="#">
                        Календар
                    </a>
                </li>
                <li>
                    <a href="#">
                        Команди
                    </a>
                </li>
                <li>
                    <a href="#">
                        Стадіони
                    </a>
                </li>
                <li>
                    <a href="#">
                        Регламент
                    </a>
                </li>
                <li>
                    <a href="#">
                        Архів
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
<div id="balance-modal" class="modal hidden">
    <div class="modal-content">
        <h2>Поповнити баланс</h2>
        <input type="number" id="balance-amount" placeholder="Введіть суму (грн)">
        <button id="pay-button">Оплатити</button>
    </div>
</div>
