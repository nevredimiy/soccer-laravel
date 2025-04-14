<div class="prop-profile__block">

    <form wire:submit.prevent>
        
            <h2 class="prop-profile__title section-title section-title--margin">
                Максимальна кількість гравців,<br>що приймають участь у серії
            </h2>
    
            <div class="prop-profile__radiobox">
                @foreach ([6, 7, 8, 9] as $num)
                    <label class="prop-profile__radio">
                        {{ $num }}
                        <input type="radio" 
                               name="max_players" 
                               value="{{ $num }}" 
                               wire:model="max_players" 
                               wire:change="saveMaxPlayers">
                    </label>
                @endforeach
            </div>

        
    </form>   

</div>