<section class="home__calendar calendar-section">
    <h2 class="calendar-section__title section-title section-title--margin">
        Календар
    </h2>
    <div class="calendar-section__body">
    
         <div class="calendar-section__block">
            <div class="calendar-section__series">
                СЕРІЯ I ЧТ 18:30
            </div>
            <div class="calendar-section__items">
                @foreach ($shedule as $round)

                <div class="calendar-section__item item-calendar item-calendar--gray-bg">
                    <div class="item-calendar__date">
                        30.03
                    </div>
                    <div class="item-calendar__wrapper">
                        <div class="item-calendar__label">
                            {{ $round['round'] }} Тур
                        </div>
                        <div class="item-calendar__body">
                            @foreach($round['playing'] as $team)
                            <span class="{{ $this->getBgClass($team->color->name) }}"></span>
                            @endforeach
                        </div>
                    </div>
                </div>
                    
                @endforeach
                <div class="calendar-section__item item-calendar item-calendar--border">
                    <div class="item-calendar__date">
                        30.03
                    </div>
                    <div class="item-calendar__wrapper">
                        <div class="item-calendar__label">
                            ФІНАЛ
                        </div>
                        <div class="item-calendar__body">
                            <span class="-bg"></span>
                            <span class="-bg"></span>
                            <span class="-bg"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
                        
    </div>

  
</section>