<div class="teams-profile__items">
    @foreach($teams as $team)
    <div wire:key="team-{{ $team->id }}" class="flex flex-col max-w-60">        
        <button  wire:click="selectTeam({{ $team->id }})" class="teams-profile__item team-card {{ $activeTeamId === $team->id ? '_active' : '' }}">
            @if ($team->status)
                <p class="status-message {{ $team->status == 'paid' ? 'text-green-400' : 'text-red-400' }} ">
                    {{ $team->status == 'paid' ? 'Сплачено' : 'Очікування оплати' }}
                </p>
            @endif
            
            <h3 class="team-card__name">{{ $team->name }}</h3>
            <div class="team-card__logo">
                <img src="{{ asset('storage/' . $team->logo) }}" alt="Image" class="ibg ibg--contain">
            </div>
            <div data-rating data-rating-size="10" data-rating-value="8" class="team-card__rating rating">
            </div>
            <div class="team-card__label">
                БЕРКОВЩИНА
            </div>
        </button>
        <livewire:team-editor :team="$team" :key="'edit-'.$team->id" />
        @if ($team->status != 'paid')
        <div class="flex flex-col gap-2 items-center mt-2">
            <div class="">
                <a class="payment-btn button button--yellow" href="{{ route('teams.request.check', $team->id) }}">
                    Оновити статус оплати
                </a>
            </div>
            <div>
                <a  class="payment-btn button button--yellow" href="{{route('teams.request.payment', $team->id)}}">
                    Оплатити
                </a>
            </div>
        </div>
        @endif        
    </div>
    @endforeach
</div>
