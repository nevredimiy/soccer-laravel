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
        @if (!empty($events[1])) 
        @foreach ($events[1] as $event)
                    <div class="bid__group">
                        <h2 class="bid__group-title section-title section-title--margin">                        
                            ОДНОДЕННІ ТУРНІРИ
                        </h2>
                        <div data-simplebar data-simplebar-media="799.98" class="bid__wrapper">
                            <div class="bid__items">
                                <div class="bid__item item-bid">
                                    <div class="item-bid__details">
                                        <div class="item-bid__info">
                                            <svg class="icon">
                                                <use xlink:href="img/icons.svg#clock"></use>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('j F') }}

                                        </div>
                                        <div class="item-bid__info">
                                            <svg class="icon">
                                                <use xlink:href="img/icons.svg#calendar"></use>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($event['start_time'])->format('H:i') }} - {{ \Carbon\Carbon::parse($event['end_time'])->format('H:i') }} {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('(D)') }}
                                        </div>
                                        <div class="item-bid__info">
                                            <svg class="icon">
                                                <use xlink:href="img/icons.svg#location-empty"></use>
                                            </svg>
                                            Берковщина
                                        </div>
                                    </div>
                                    <div class="item-bid__fill">
                                        <div class="item-bid__label">
                                            Команд зареєстровано
                                        </div>
                                        <div data-prgs="6" data-prgs-value="{{ $event['teams_count'] }}" class="item-bid__progress item-bid__progress--rect progress-bloc">

                                        </div>
                                    </div>
                                    <div class="item-bid__fill">
                                        <div class="item-bid__label">
                                            Середній рівень гравців
                                        </div>
                                        <div style="--color: #FFF" data-rating data-rating-size="10" data-rating-value="7" class="item-bid__rating rating">

                                        </div>
                                    </div>
                                    <a href="#" class="item-bid__link button _icon-info"><span>Детальніше</span></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>                    
                @endforeach
            @endif
            
            @if (!empty($events[2])) 
                @foreach ($events[2] as $event)
                    <div class="bid__group">
                        <h2 class="bid__group-title section-title section-title--margin">                        
                            РЕГУЛЯРНІ ТУРНІРИ
                        </h2>
                        <div data-simplebar data-simplebar-media="799.98" class="bid__wrapper">
                            <div class="bid__items">
                                <div class="bid__item item-bid">
                                    <div class="item-bid__details">
                                        <div class="item-bid__info">
                                            <svg class="icon">
                                                <use xlink:href="img/icons.svg#clock"></use>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('j F') }}

                                        </div>
                                        <div class="item-bid__info">
                                            <svg class="icon">
                                                <use xlink:href="img/icons.svg#calendar"></use>
                                            </svg>
                                            {{ \Carbon\Carbon::parse($event['start_time'])->format('H:i') }} - {{ \Carbon\Carbon::parse($event['end_time'])->format('H:i') }} {{ \Carbon\Carbon::parse($event['date'])->locale('uk')->translatedFormat('(D)') }}
                                        </div>
                                        <div class="item-bid__info">
                                            <svg class="icon">
                                                <use xlink:href="img/icons.svg#location-empty"></use>
                                            </svg>
                                            Берковщина
                                        </div>
                                    </div>
                                    <div class="item-bid__fill">
                                        <div class="item-bid__label">
                                            Команд зареєстровано
                                        </div>
                                        <div data-prgs="6" data-prgs-value="{{ $event['teams_count'] }}" class="item-bid__progress item-bid__progress--rect progress-bloc">

                                        </div>
                                    </div>
                                    <div class="item-bid__fill">
                                        <div class="item-bid__label">
                                            Середній рівень гравців
                                        </div>
                                        <div style="--color: #FFF" data-rating data-rating-size="10" data-rating-value="7" class="item-bid__rating rating">

                                        </div>
                                    </div>
                                    <a href="#" class="item-bid__link button _icon-info"><span>Детальніше</span></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>                    
                @endforeach
            @endif
        @else
            <p>Нет событий для отображения.</p>
        @endif
    </div>
</div>