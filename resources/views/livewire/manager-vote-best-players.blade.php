<div class="players-tournament__items profile__hero">
    <h2 class="hero-tournament__label">Вибрати два найкращих гравців матчу</h2>
        @foreach ($series->teams as $team)
        <div class="players-tournament__team">
            @foreach ( $playersTeam[$team->id] as $playerNumbers => $player )
            <div class="">
                 <button style="background: {{$team->color->color_picker}}" class="social__item ball" >
                    {{ $playerNumbers }}
                </button>
            </div>                
            @endforeach      
        </div>            
        @endforeach
    </div>