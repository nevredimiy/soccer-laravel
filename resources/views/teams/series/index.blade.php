@extends('layouts.app')

@section('title', 'Заявка Команды')

@section('content')

    <livewire:dependent-dropdown />


    <div class="page__container">
        <div class="page__wrapper"> <div class="page__bid bid">
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

                @foreach ($tournaments as $k => $tournament)
                    <div wire:key="{{$k}}" class="bid__group">
                        
                        <h2 class="bid__group-title section-title section-title--margin">
                            {{ $tournament->name }}
                        </h2>
                        
                        @if ($tournament->events->count())                       

                        
                        @livewire('series-list', ['tournamentId' => $tournament->id], key($tournament->id))

                        @else
                            <p>На даний момент в цьому турнірі немає подій</p>
                        @endif

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection