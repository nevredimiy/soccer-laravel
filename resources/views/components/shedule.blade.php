<section class="tournament__schedule schedule-tournament schedule-tournament--super">
    <h2 class="schedule-tournament__title section-title section-title--margin">
        РОЗКЛАД
    </h2>
    <div class="schedule-tournament__body">
        @foreach ($seriesGroupedByRound as $round => $item)
            <div class="schedule-tournament__block">                                
                <div class="schedule-tournament__item schedule-tournament__item--info schedule-tournament__item--center">
                    <div class="schedule-tournament__label uppercase">
                        {{ \Carbon\Carbon::parse($item->first()->start_date)->locale('uk')->settings(['formatFunction' => 'translatedFormat'])->format('d F') }}

                    </div>
                    <div class="schedule-tournament__label">
                        {{ \Carbon\Carbon::parse($item->first()->start_date)->locale('uk')->settings(['formatFunction' => 'translatedFormat'])->format('l') }}
                    </div>
                </div>
                <div class="schedule-tournament__item schedule-tournament__item--info">
                    <div class="schedule-tournament__label">
                        ЧАС
                    </div>
                        @foreach ($item as $v)
                            <div class="schedule-tournament__label">
                                {{ $v ? \Carbon\Carbon::parse($v->start_time)->format('H:i') : '' }}
                            </div>                            
                        @endforeach
                                                         
                    
                </div>
                <div class="schedule-tournament__item schedule-tournament__item--info">
                    <div class="schedule-tournament__label">
                        {{$round}} ТУР
                    </div>
                    @foreach ($item as $v)
                    <div class="schedule-tournament__label">
                        СЕРІЯ {{$v->series}}
                    </div>                                        
                    @endforeach                                   
                </div>
                {{-- @foreach ($matchTeamColors[$round] as $k => $mat) --}}
                <div class="schedule-tournament__item">
                    <div class="schedule-tournament__label">
                        {{-- МАТЧ {{$k}} --}}
                    </div>
                    <div class="schedule-tournament__colors">
                        {{-- @foreach ($mat as $v) --}}
                            {{-- <span class="{{$v}}"></span>                                                 --}}
                        {{-- @endforeach                                             --}}
                    </div>         
                </div>     
                {{-- @endforeach --}}

                @foreach ($item as $seriesMeta)
                @php
                    $seriesNumber = $seriesMeta->series;
                    $triples = $templateSeries[$seriesNumber] ?? [];
                @endphp

                    @foreach ($templateMatches as $matchIndex => $matchTeams)
                    <div class="schedule-tournament__item">
                        <div class="schedule-tournament__label">
                            МАТЧ {{$matchIndex+1}}
                        </div>
                        <div class="schedule-tournament__colors">
                            {{-- @foreach ($mat as $v) --}}
                                {{-- <span class="{{$v}}"></span>                                                 --}}
                            {{-- @endforeach                                             --}}
                        </div>         
                    </div>     
                    @endforeach
                @endforeach


            </div>  
            
           

        @endforeach
    </div>
</section>