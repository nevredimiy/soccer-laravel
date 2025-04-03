
<button wire:click="apply" 
        class="reg-tournament__button button button--yellow"
        :class="{ 'button--gray': @js($applied), 'bg-blue-500': !@js($applied) }"
        @if($applied) disabled @endif>
    {{ $applied ? 'Заявка відправлена' : 'Хочу грати' }}
</button>