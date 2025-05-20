<section class="tournament__schedule schedule-tournament">
    <h2 class="schedule-tournament__title section-title section-title--margin">
        РОЗКЛАД
    </h2>

    @foreach ( $seriesMetas as $seriesMeta )
     <div class="schedule-tournament__body">
        <div class="schedule-tournament__block">
            <div class="schedule-tournament__item schedule-tournament__item--center schedule-tournament__item--info">
                <div class="schedule-tournament__label uppercase">
                    {{\Carbon\Carbon::parse($seriesMeta->start_date)->locale('uk')->translatedFormat('j F')}}
                </div>
                <div class="schedule-tournament__label uppercase">
                    {{\Carbon\Carbon::parse($seriesMeta->start_date)->locale('uk')->translatedFormat('l')}}
                </div>
            </div>
            <div class="schedule-tournament__item schedule-tournament__item--info">
                <div class="schedule-tournament__label">
                    ЧАС
                </div>
                @for($i=0; $i<$event->tournament->count_series; $i++)
                <div class="schedule-tournament__label">
                    {{\Carbon\Carbon::parse($seriesMeta->start_date)->translatedFormat('H:i')}}
                </div>
                @endfor
            </div>
            @foreach ($templateMatches as $key => $item)                
            
                <div wire:key="{{$key}}" class="schedule-tournament__item">
                    <div class="schedule-tournament__label">
                        МАТЧ {{$key + 1}}
                    </div>
                    @for($i=0; $i<$event->tournament->count_series; $i++)
                        <div class="schedule-tournament__colors">
                            <span style="background-color:{{$teamColorClass[$seriesMeta->round][$item[0]]}}"></span>
                            <span style="background-color:{{$teamColorClass[$seriesMeta->round][$item[1]]}}"></span>
                        </div>                        
                    @endfor
                </div>

            @endforeach
        </div>
    </div>
        
    @endforeach
    
    {{-- <div class="schedule-tournament__body">
        <div class="schedule-tournament__block">
            <div class="schedule-tournament__item schedule-tournament__item--center schedule-tournament__item--info">
                <div class="schedule-tournament__label uppercase">
                    {{\Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('j F')}}
                </div>
                <div class="schedule-tournament__label uppercase">
                    {{\Carbon\Carbon::parse($event->date)->locale('uk')->translatedFormat('l')}}
                </div>
            </div>
            <div class="schedule-tournament__item schedule-tournament__item--info">
                <div class="schedule-tournament__label">
                    ЧАС
                </div>
                <div class="schedule-tournament__label">
                    {{\Carbon\Carbon::parse($event->start_time)->translatedFormat('H:i')}}
                </div>
            </div>
            @foreach ($template as $key => $item)                
            
                <div wire:key="{{$key}}" class="schedule-tournament__item">
                    <div class="schedule-tournament__label">
                        МАТЧ {{$key + 1}}
                    </div>
                    <div class="schedule-tournament__colors">
                        <span class="{{$teamColorClass[$item[0]]}}"></span>
                        <span class="{{$teamColorClass[$item[1]]}}"></span>
                    </div>
                </div>

            @endforeach
        </div>
    </div> --}}
   
</section>