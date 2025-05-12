<section class="home__calendar calendar-section">
    <h2 class="calendar-section__title section-title section-title--margin">
        Календар
    </h2>
    
    @foreach ($templateCalendar as $series => $template)
    @php
        $seriesData = $seriesMetas[$series+1] ?? [];
        $firstDate = isset($seriesData[0]['start_date']) ? \Carbon\Carbon::parse($seriesData[0]['start_date']) : null;
    @endphp

    <div wire:key="{{$series}}" class="calendar-section__body">
        <div class="calendar-section__block">
            <div class="calendar-section__series uppercase">
                СЕРІЯ {{$series+1}} 
                @if ($firstDate)
                    {{ $firstDate->locale('uk')->settings(['formatFunction' => 'translatedFormat'])->format('D H:i') }}
                @endif
            </div>
            <div class="calendar-section__items">

                @foreach ($template as $idxRound => $round)
                
                <div wire:key="{{$series}}" class="calendar-section__item item-calendar item-calendar--gray-bg">
                    <div class="item-calendar__date">
                        {{ isset($seriesMetas[$series+1][$idxRound]) ?  \Carbon\Carbon::parse($seriesMetas[$series+1][$idxRound]['start_date'])->locale('uk')->settings(['formatFunction' => 'translatedFormat'])->format('d.m') : \Carbon\Carbon::parse($seriesMetas[$series+1][0]['start_date'])->locale('uk')->settings(['formatFunction' => 'translatedFormat'])->format('d.m')}}
                        {{-- @if (isset($seriesMetas[$series+1][$idxRound]))
                        {{\Carbon\Carbon::parse($seriesMetas[$series+1][$idxRound]['start_date'])->locale('uk')->settings(['formatFunction' => 'translatedFormat'])->format('d.m')}}    
                        @else
                        {{\Carbon\Carbon::parse($seriesMetas[$series+1][0]['start_date'])->locale('uk')->settings(['formatFunction' => 'translatedFormat'])->format('d.m')}}
                        @endif --}}
                    </div>
                    <div 
                        wire:click="selectedRound({{ $idxRound + 1 }}, {{ session('current_event', 0) }}, {{$series + 1}})"  
                        class="item-calendar__wrapper 
                        @if ($currentRound['round_number'] == $idxRound + 1 && $currentRound['series_number'] == $series + 1)
                            item-calendar--active
                        @endif"
                    >
                        <div class="item-calendar__label">
                            @if ($loop->last)
                                ФІНАЛ
                            @else
                                {{$idxRound + 1}} Тур
                            @endif
                        </div>
                        <div class="item-calendar__body">
                            @if ( count($seriesMetas[$series+1]) == $event->tournament->count_rounds )
                                @foreach ($seriesMetas[$series+1][$idxRound] as $teamIndex)
                                <span class="blue-bg"></span>                                
                                @endforeach
                            @else
                                @foreach ($round as $item)
                                <span class="{{$colorClasses[$colorNames[$item]]}}"></span>                                    
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>                    
                @endforeach               
            </div>
        </div>
    </div>        
    @endforeach
</section>