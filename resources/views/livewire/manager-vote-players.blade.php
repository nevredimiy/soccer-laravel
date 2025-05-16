<div class="players-tournament__items profile__hero">
     <h2 class="hero-tournament__label">Фото гравців матчу</h2>
        @foreach ($series->teams as $team)
        <div style="--color: {{$team->color->color_picker}}" class="players-tournament__team">
            @for ($i=1; $i<=$team->players->count(); $i++)                
            @if ($playersTeam[$team->id][$i])
            
            <div class="players-tournament__item">
                <article class="item-player item-player--stats">
                    <div class="item-player__image-link">
                        <img src="{{asset('storage/'. $playersTeam[$team->id][$i]->photo)}}" alt="Image" class="{{$playersTeam[$team->id][$i]->full_name}}">
                    </div>
                    <div class="item-player__name">
                        <a href="#">{{$playersTeam[$team->id][$i]->full_name}}</a>
                    </div>
                    <div class="item-player__rating rating">
                        <div class="rating__items">
                            @for ($j = 0; $j < 10; $j++)
                            <label class="rating__item @if ($j<$playersTeam[$team->id][$i]->rating) rating__item--active @endif">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </label>                                        
                            @endfor
                        </div>
                    </div>
                </article>
            </div>
            @endif

            @endfor
        </div>            
        @endforeach
    </div>