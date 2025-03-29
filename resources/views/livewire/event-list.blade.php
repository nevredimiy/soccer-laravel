<div>
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
      
        @if (!empty($events)) 
        <div class="">
            @foreach ($events as $e)
                @foreach ($e as $event)            
                    <div class="">
                        {{ $event['id']}} / 
                        {{ $event['date']}} / 
                        {{ $event['start_time']}} / 
                        {{ $event['end_time']}} / 
                        @if (isset($event['location']->name))
                            {{ $event['location']->name }}
                        @elseif(isset($event['location']['name']))
                            {{ $event['location']['name'] }}
                        @endif
                        
                        {{ $event['teams_count']}}

                    </div>
                @endforeach 
            @endforeach 
        </div>
        @endif

        {{-- <pre>{{ print_r($events1, true) }}</pre> --}}

        @if (!empty($events)) 
            @if (!empty($events[1]))             
            <div class="bid__group">
                <h2 class="bid__group-title section-title section-title--margin">                        
                    ОДНОДЕННІ ТУРНІРИ
                </h2>
                <div class="flex flex-col gap-4">
                    @foreach ($events[1] as $event)                    
                    <div data-simplebar-media="799.98" class="bid__wrapper">
                        <div class="bid__items">
                            <div class="bid__item item-bid">
                                <div class="item-bid__details">
                                    <div class="item-bid__info">
                                        <svg class="icon">
                                            <use xlink:href="{{asset('img/icons.svg#clock')}}"></use>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('j F') }}

                                    </div>
                                    <div class="item-bid__info">
                                        <svg class="icon">
                                            <use xlink:href="{{asset('img/icons.svg#calendar')}}"></use>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($event['start_time'])->format('H:i') }} - {{ \Carbon\Carbon::parse($event['end_time'])->format('H:i') }} {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('(D)') }}
                                    </div>
                                    <div class="item-bid__info">
                                        <svg class="icon">
                                            <use xlink:href="{{asset('img/icons.svg#location-empty')}}"></use>
                                        </svg>
                                        @if (isset($event['location']->name))
                                            {{ $event['location']->name }}
                                        @elseif(isset($event['location']['name']))
                                            {{ $event['location']['name'] }}
                                        @endif
                                    </div>
                                </div>
                                <div class="item-bid__fill">
                                    <div class="item-bid__label">
                                        Команд зареєстровано
                                    </div>
                                    <div data-prgs="6" data-prgs-value="{{ $event['teams_count'] }}" class="item-bid__progress item-bid__progress--rect progress-bloc">
                                        @for ( $i = 1; $i <= 6; $i++)
                                            <span 
                                            @if ($i <= $event['teams_count'])
                                                class="_active"
                                            @endif >
                                            </span>
                                        @endfor
                                    </div>

                                </div>
                                <div class="item-bid__fill">
                                    <div class="item-bid__label">
                                        Середній рівень гравців
                                    </div>
                                    <div style="--color: #FFF" class="item-bid__rating rating">
                                        <div class="rating__items">
                                            @for ( $i = 1; $i <= 10; $i++)
                                                <div class="rating__item @if ($i <= 5)
                                                            rating__item--active
                                                            @endif">
                                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>                                            
                                </div>
                                <a href="{{ route( 'teams.events.show', ['id' => $event['id']] ) }}" class="item-bid__link button _icon-info"><span>Детальніше</span></a>
                            </div>                                    
                        </div>
                    </div>  
                    @endforeach
                </div>
            </div>
            @endif

            @if (!empty($events[2]))             
            <div class="bid__group">
                <h2 class="bid__group-title section-title section-title--margin">                        
                    РЕГУЛЯРНІ ТУРНІРИ
                </h2>
                <div class="flex flex-col gap-4">
                    @foreach ($events[2] as $event)                    
                    <div data-simplebar-media="799.98" class="bid__wrapper">
                        <div class="bid__items">
                            <div class="bid__item item-bid">
                                <div class="item-bid__details">
                                    <div class="item-bid__info">
                                        <svg class="icon">
                                            <use xlink:href="{{asset('img/icons.svg#clock')}}"></use>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('j F') }}

                                    </div>
                                    <div class="item-bid__info">
                                        <svg class="icon">
                                            <use xlink:href="{{asset('img/icons.svg#calendar')}}"></use>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($event['start_time'])->format('H:i') }} - {{ \Carbon\Carbon::parse($event['end_time'])->format('H:i') }} {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('(D)') }}
                                    </div>
                                    <div class="item-bid__info">
                                        <svg class="icon">
                                            <use xlink:href="{{asset('img/icons.svg#location-empty')}}"></use>
                                        </svg>
                                        @if (isset($event['location']->name))
                                            {{ $event['location']->name }}
                                        @elseif(isset($event['location']['name']))
                                            {{ $event['location']['name'] }}
                                        @endif
                                    </div>
                                </div>
                                <div class="item-bid__fill">
                                    <div class="item-bid__label">
                                        Команд зареєстровано
                                    </div>
                                    <div data-prgs="6" data-prgs-value="{{ $event['teams_count'] }}" class="item-bid__progress item-bid__progress--rect progress-bloc">
                                        @for ( $i = 1; $i <= 6; $i++)
                                            <span 
                                            @if ($i <= $event['teams_count'])
                                                class="_active"
                                            @endif >
                                            </span>
                                        @endfor
                                    </div>

                                </div>
                                <div class="item-bid__fill">
                                    <div class="item-bid__label">
                                        Середній рівень гравців
                                    </div>
                                    <div style="--color: #FFF" class="item-bid__rating rating">
                                        <div class="rating__items">
                                            @for ( $i = 1; $i <= 10; $i++)
                                                <div class="rating__item @if ($i <= 5)
                                                            rating__item--active
                                                            @endif">
                                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>                                            
                                </div>
                                <a href="{{ route( 'teams.events.show', ['id' => $event['id']] ) }}" class="item-bid__link button _icon-info"><span>Детальніше</span></a>
                            </div>                                    
                        </div>
                    </div>                      
                    @endforeach
                </div>
            </div>
            @endif
        @else
            <p>Нет событий для отображения.</p>
        @endif

    </div>
</div>
@script
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function updateProgressBars() {
            document.querySelectorAll("[data-prgs]").forEach((prgsEl) => {
                prgsEl.innerHTML = "";
                const total = +prgsEl.getAttribute("data-prgs");
                const active = +prgsEl.getAttribute("data-prgs-value");
                for (let i = 0; i < total; i++) {
                    const span = document.createElement("span");
                    if (i < active) span.classList.add("_active");
                    prgsEl.appendChild(span);
                }
            });
        }

        updateProgressBars(); // Запускаем при загрузке

        document.addEventListener("livewire:updated", updateProgressBars); // Запускаем после обновления
    });
    
    
</script>
@endscript



