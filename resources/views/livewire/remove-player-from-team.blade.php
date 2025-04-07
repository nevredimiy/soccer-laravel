<div>
    @if ($confirming)
        <div wire:click="cancel" class="modal">
            <div class="modal__block" wire:click.stop>
                <p>Ви впевнені, що хочете видалити гравця <strong>{{ $player->last_name }}</strong> із команди <strong>{{ $team->name }}</strong>?</p>
                <div class="mt-2 flex gap-2">
                    <button wire:click="remove" class="players-tournament__label red-bg">Видалати</button>
                    <button wire:click="cancel" class="players-tournament__label gray-bg">Відміна</button>
                </div>
            </div>
        </div>
    @else
        <button wire:click="confirm" class="players-tournament__label red-bg">ВИДАЛИТИ</button>
    @endif
</div>
