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
                        <img src="{{asset('storage/' . $topScorer->player->photo)}}" alt="{{$topScorer->player->full_name}}" class="ibg">
                    </a>
                    <div class="item-player__details">
                        <div class="item-player__info">
                            {{$playerOfSeries[$topScorer->player->id]['series_count'] ?? 0}}
                            <img src="img/player/field.webp" alt="Кількість серій" class="ibg ibg--contain">
                        </div>
                        <div class="item-player__info">
                            {{$topScorer->goals_count}}
                            
                            <img src="img/player/ball.webp" alt="Кількість абитих м'ячів" class="ibg ibg--contain">
                        </div>
                    </div>
                    <div class="item-player__name">
                        <div>{{$topScorer->player->full_name}}</div>
                    </div>

                    <div data-rating-size="10" data-rating-value="{{$topScorer->player->rating}}" class="item-player__rating rating">
                        <div class="rating__items">
                            @for ($star=0; $star<10; $star++)
                                @php
                                    $ratingClass = $star < $topScorer->player->rating ? 'rating__item--active' : '';
                                @endphp
                                <label class="rating__item {{$ratingClass}}">                                    
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </label>                                        
                            @endfor
                        </div>
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
                        <img src="{{asset('storage/' . $topAssist->player->photo)}}" alt="{{$topAssist->player->full_name}}" class="ibg">
                    </a>
                    <div class="item-player__details">
                        <div class="item-player__info">
                            {{$playerOfSeries[$topAssist->player->id]['series_count'] ?? 0}}
                            <img src="img/player/field.webp" alt="Кільсть серій" class="ibg ibg--contain">
                        </div>
                        <div class="item-player__info">
                            {{$topAssist->assists_count}}
                            <img src="img/player/shoe.svg" alt="Кількість асистентів" class="ibg ibg--contain">
                        </div>
                    </div>
                    <div class="item-player__name">
                        <div>{{$topAssist->player->full_name}}</div>
                    </div>

                    <div data-rating-size="10" data-rating-value="{{$topAssist->player->rating}}" class="item-player__rating rating">
                        <div class="rating__items">
                            @for ($star=0; $star<10; $star++)
                                @php
                                    $ratingClass = $star < $topAssist->player->rating ? 'rating__item--active' : '';
                                @endphp
                                <label class="rating__item {{$ratingClass}}">                                    
                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </label>                                        
                            @endfor
                        </div>
                    </div>
                </article>
                
            @endforeach
            
        </div>
    </div>

</section>