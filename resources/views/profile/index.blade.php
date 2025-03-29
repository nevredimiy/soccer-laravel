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


                              <livewire:team-list />


                        @else
                            <div class="teams-profile__none">
                                ПОКИ ЩО НЕМАЄ СТВОРЕНИХ КОМАНД
                            </div>
                        @endif                            
                    </section>
                    @if($user->teams->isNotEmpty())
                    <livewire:team-details />
                    @endif 
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection