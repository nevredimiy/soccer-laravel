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
                            {{ $event->stadium->name ?? 'Не указано' }}
                        </h3>
                        <div class="item-stadium__image">
                            <img src="{{asset('img/stadium/preview.webp')}}" alt="Image" class="ibg">
                        </div>
                        <div class="item-stadium__body">
                            <div class="item-stadium__location _icon-location">
                                {{ $event->stadium->location->address ?? 'Не указано' }} ({{ $event->stadium->name ?? 'Не указано' }})
                            </div>
                            <div class="item-stadium__details">
                                <div class="item-stadium__info info-stadium">
                                    {{ $event->stadium->fields_40x20 ?? 'Не указано' }}
                                    <div class="info-stadium__icon">
                                        <div class="info-stadium__field">
                                            40х20
                                            <img src="{{asset('img/stadium/01.webp')}}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium">
                                    {{ $event->stadium->fields_60x40 ?? 'Не указано' }}
                                    <div class="info-stadium__icon">
                                        <div class="info-stadium__field">
                                            60x40
                                            <img src="{{asset('img/stadium/01.webp')}}" alt="Image">
                                        </div>
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium">
                                    {{ $event->stadium->parking_spots ?? 'Не указано' }}
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/02.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium {{ $event->stadium->parking_spots ? '_icon-check' : '_icon-cross' }}">
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/03.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium {{ $event->stadium->has_speaker_system ? '_icon-check' : '_icon-cross' }}">
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/04.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium {{ $event->stadium->has_wardrobe ? '_icon-check' : '_icon-cross' }}">
                                    <div class="info-stadium__icon">
                                        <img src="{{asset('img/stadium/05.webp')}}" alt="Image">
                                    </div>
                                </div>
                                <div class="item-stadium__info info-stadium {{ $event->stadium->has_toilet ? '_icon-check' : '_icon-cross' }}">
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
                                {{ $event->stadium->name ?? 'Не вказано' }}
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                СУПЕРЛІГА
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                27 ЧЕРВНЯ - 3 СЕРПНЯ <br />
                                {{ \Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('j F') }} {{ \Carbon\Carbon::parse($event['start_time'])->format('H:i') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }} {{ \Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('(D)') }}
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                ФОРМАТ {{ $event->format ?? '5x5x5' }}
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label _icon-field">
                                {{ $event->size_field  }}м
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
                            <div data-rating-size="10" data-rating-value="8" class="hero-tournament__rating rating">
                                <div class="rating__items">
                                    @for ($i=0; $i<10; $i++)
                                    <label class="rating__item @if ($i <= $event->average_player_rating)
                                        rating__item--active
                                        @endif">
                                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </label>                                        
                                    @endfor                                  
                                </div>
                            </div>
                        </div>
                        <div class="hero-tournament__info">
                            <div class="hero-tournament__label">
                                ₴ <span>{{(int) $event->price}} ГРН / ГРАВЕЦЬ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="tournament__schedule schedule-tournament schedule-tournament--super">
                    <h2 class="schedule-tournament__title section-title section-title--margin">
                        РОЗКЛАД
                    </h2>
                    <div class="schedule-tournament__body">
                        @foreach ($matchesByRound as $round => $roundMatches)
                           
                            <div class="schedule-tournament__block">
                                
                                <div class="schedule-tournament__item schedule-tournament__item--info schedule-tournament__item--center">
                                    <div class="schedule-tournament__label">                                        
                                        {{ Str::upper($roundMatches->dayMonth) }}
                                    </div>
                                    <div class="schedule-tournament__label">
                                        {{ Str::upper($roundMatches->weekday) }}
                                    </div>
                                </div>
                                <div class="schedule-tournament__item schedule-tournament__item--info">
                                    <div class="schedule-tournament__label">
                                        ЧАС
                                    </div>
                                    @foreach ($series as $v)
                                        <div class="schedule-tournament__label">
                                            {{ $v ? \Carbon\Carbon::parse($v->start_time)->format('H:i') : '' }}
                                        </div>                                        
                                    @endforeach
                                </div>
                                <div class="schedule-tournament__item schedule-tournament__item--info">
                                    <div class="schedule-tournament__label">
                                        {{$round}} ТУР
                                    </div>
                                    @foreach ($series as $k => $v)
                                    <div class="schedule-tournament__label">
                                        СЕРІЯ {{$k}}
                                    </div>                                        
                                    @endforeach
                                   
                                </div>

                                   

                                    @foreach ($matchTeamColors[$round] as $k => $mat)
                                    <div class="schedule-tournament__item">
                                        <div class="schedule-tournament__label">
                                            МАТЧ {{$k}}
                                        </div>
                                        <div class="schedule-tournament__colors">
                                            @foreach ($mat as $v)
                                                <span class="{{$v}}"></span>                                                
                                            @endforeach
                                            
                                        </div>         
                                    </div>     
                                    @endforeach
                               
                               
                            </div>                            
                        @endforeach
                       
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
                        ЗАЯВЛЕНІ КОМАНДИ
                    </h2>

                    @if (count($teams))
                    <div class="reg-tournament__body">
                        @foreach ($teams as $team)
                            <div style="--color: #F7E10E; --team-color: {{ $team->team_color }};" class="reg-tournament__item reg-tournament__item--join">
                                <div class="reg-tournament__label">
                                    {{$team->name}}
                                </div>
                                <div style="--color: #FFF" class="reg-tournament__rating">
                                    <div data-rating-size="10" data-rating-value="8" class="rating">
                                        <div class="rating__items">
                                            @for ($i=0; $i<10; $i++)
                                            <label class="rating__item @if ($i <= $team->rating)
                                                rating__item--active
                                                @endif">                                            
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </label>  
                                            @endfor                                          
                                        </div>
                                    </div>
                                </div>
                                <div style="--color: {{ $team->status_color}}" class="reg-tournament__status">
                                    <span>
                                       {{ $team->status_text }}
                                    </span>
                                </div>
                               
                                @if ($team->player_request_status != 'closed' )
                                    @livewire('join-team', ['teamId' => $team->id])
                                @endif
                            </div>                            
                        @endforeach
                    </div>

                    @else
                    <div class="text-center mb-4">
                        <p>Ви перші. У цій події ще немає заявленних команд </p>
                    </div>
                    @endif
                   
                   
                    @if (count($teams) < $event->format_scheme)
                    <div class="reg-tournament__actions">
                        <a href="{{ route('teams.request.create', ['id' => $event->id]) }}" class="reg-tournament__link button button--yellow"><span>ЗАЯВИТИ КОМАНДУ</span></a>
                    </div>                        
                    @endif
                </section>
               
            </div>
        </div>
    </div>
</div>
@endsection