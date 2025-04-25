@extends('layouts.app')

@section('title', 'Заявка гравця')

@section('content')

<livewire:dependent-dropdown />

<div class="page__container">
    <div class="page__wrapper">
        <div class="page__bid bid">
            <div class="bid__block _block">
                <div class="bid__filter filter-block">
                    <a href="#" class="filter-block__link _active button button--blue">
                        <span>ЗАПЛАНОВАНІ</span>
                    </a>
                    <a href="#" class="filter-block__link button button--blue">
                        <span>РОЗПОЧАТІ</span>
                    </a>
                </div>
                <h1 class="bid__title section-title">
                    ВІДКРИТІ ЗАЯВКИ НА НАЙБЛИЖЧІ ТУРНІРИ
                </h1>

                @foreach ($tournaments as $tournament)
                    @if ($tournament->type == 'solo' || $tournament->type == 'solo_private')
                    <div class="bid__group">
                        <h2 class="bid__group-title section-title section-title--margin">
                            {{ $tournament->name }}
                        </h2>

                        @if ($tournament->events->count())
                            @foreach ($tournament->events as $event)
                            {{$event->id}}
                            <div data-simplebar data-simplebar-media="799.98" class="bid__wrapper">
                                <div class="bid__items">
                                    <div class="bid__item item-bid">
                                        <div class="item-bid__details">
                                            <div class="item-bid__info">
                                                <svg class="icon">
                                                    <use xlink:href="img/icons.svg#clock"></use>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('j F') }}
                                            </div>
                                            <div class="item-bid__info">
                                                <svg class="icon">
                                                    <use xlink:href="img/icons.svg#calendar"></use>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }} {{ \Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('(D)') }}
                                            </div>
                                            <div class="item-bid__info">
                                                <svg class="icon">
                                                    <use xlink:href="img/icons.svg#location-empty"></use>
                                                </svg>
                                                {{ $event->stadium->location->address }}      
                                            </div>
                                        </div>
                                        <div class="item-bid__fill">
                                            <div class="item-bid__label">
                                                Гравців зареєстровано
                                            </div>
                                            <div data-prgs="18" data-prgs-value="{{$countPlayersOfEvent[$event->id] ?? 0}}" class="item-bid__progress">
                                                @for ($i=0; $i<18; $i++)
                                                    <span @if ($i<($countPlayersOfEvent[$event->id] ?? 0))
                                                        class="_active"
                                                    @endif></span>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="item-bid__fill">
                                            <div class="item-bid__label">
                                                Середній рівень гравців
                                            </div>
                                            <div style="--color: #FFF" data-rating data-rating-size="10" data-rating-value="{{$averageRating[$event->id] ?? 0}}" class="item-bid__rating rating">
        
                                            </div>
                                        </div>
                                        {{-- <form action="{{route('players.events.show', $event->id)}}" method="get">
                                            
                                            <input type="hidden" name="date" value="this is date">
                                            <input type="hidden" name="location" value="this is location">
                                            <button type="submit" class="item-bid__link button _icon-info"><span>Детальніше</span></button>
                                            
                                        </form> --}}
                                        <a href="{{ route( 'players.events.show', ['id' => $event->id] ) }}" class="item-bid__link button _icon-info"><span>Детальніше</span></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <p>На даний момент в цьому турнірі немає подій</p>
                        @endif
                    </div>                        
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection