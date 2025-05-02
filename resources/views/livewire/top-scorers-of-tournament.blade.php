<section class="home__best-players players-section">
    <h2 class="players-section__title section-title section-title--margin">
        НАЙКРАЩІ БОМБАРДИРИ ЛІГИ
    </h2>
    <div class="players-section__body">
        <div class="players-section__items">
            @foreach ($topScorers as $topScorer)
                <article style="--color: {{$topScorer->team->color->color_picker}}" class="players-section__item item-player">
                    <div class="item-player__position">
                        {{$loop->iteration}} місце
                    </div>
                    <a href="#" class="item-player__image-link">
                        <img src="{{asset('storage/' . $topScorer->player->photo)}}" alt="Image" class="ibg">
                    </a>
                    <div class="item-player__details">
                        <div class="item-player__info">
                            {{$topScorer->matches_count}}
                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                        </div>
                        <div class="item-player__info">
                            {{$topScorer->goals_count}}
                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                        </div>
                    </div>
                    <div class="item-player__name">
                        <a href="#">{{$topScorer->player->full_name}}</a>
                    </div>
                </article>
                
            @endforeach
            
        </div>
    </div>

    <h2 class="players-section__title section-title section-title--margin">
        НАЙКРАЩІ АСИСТЕНТИ ЛІГИ
    </h2>
    <div class="players-section__body">
        <div class="players-section__items">
            @foreach ($topAssists as $topAssist)
                <article style="--color: {{$topAssist->team->color->color_picker}}" class="players-section__item item-player">
                    <div class="item-player__position">
                        {{$loop->iteration}} місце
                    </div>
                    <a href="#" class="item-player__image-link">
                        <img src="{{asset('storage/' . $topAssist->assister->photo)}}" alt="Image" class="ibg">
                    </a>
                    <div class="item-player__details">
                        <div class="item-player__info">
                            {{$topAssist->matches_count}}
                            <img src="img/player/field.webp" alt="Image" class="ibg ibg--contain">
                        </div>
                        <div class="item-player__info">
                            {{$topAssist->assists_count}}
                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                        </div>
                    </div>
                    <div class="item-player__name">
                        <a href="#">{{$topAssist->assister->full_name}}</a>
                    </div>
                </article>
                
            @endforeach
            
        </div>
    </div>

</section>