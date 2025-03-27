
<header class="header">
    <div class="header__container">
        <div class="header__images">
            <a href="{{ route('home') }}" class="header__logo">
                <img class="ibg ibg--contain" src="{{ asset('storage/' . optional(App\Models\SiteSetting::first())->logo) }}" alt="Logo">
            </a>
        </div>
        <div class="header__menu">
            <div class="header__block">
                <!--Активному пукнту додати клас _active-->
                <a href="{{ route('teams.events') }}" class="header__link button _icon-ch-right">
                    <span>Заявити команду</span>
                </a>
                <a href="{{ route('player.request') }}" class="header__link button _icon-ch-right">
                    <span>Заявка гравця</span>
                </a>
            </div>

            {{-- <div data-da=".header__images, 767.98, last" class="header__city">
                КИЇВ
                <img src="/img/header/kyiv.webp" alt="Image" class="ibg ibg--contain">
            </div> --}}

            <a href="{{route('cities')}}">
                <livewire:city-emblem />
            </a>


            <div class="header__block">
                @auth
                    <!-- Пользователь авторизован -->
                    <div class="header__profile profile-header">
                        <div class="profile-header__image">
                            <img src="{{ auth()->user()->avatar ?? asset('/img/header/profile.webp') }}" alt="{{$authUser->name}}" class="ibg">
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
            <a href="tel:{{ $siteSettings->contacts }}" class="header__phone">{{ $phone }}</a>
            <div class="header__social social">
                <a href="#" class="social__item _icon-s-fb">
                </a>
                <a href="#" class="social__item _icon-s-inst">
                </a>
            </div>
        </div>
    </div>
</header>

@include('layouts.navbar')


<div id="balance-modal" class="modal hidden">
    <div class="modal-content">
        <h2>Поповнити баланс</h2>
        <input type="number" id="balance-amount" placeholder="Введіть суму (грн)">
        <button id="pay-button">Оплатити</button>
    </div>
</div>

