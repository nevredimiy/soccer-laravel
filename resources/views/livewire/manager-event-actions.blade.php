 <div class="">
     @if (session()->has('error'))
            <p class="text-red-500 text-center my-4 ">{{session('error')}}</p>
    @endif
    <div class="flex justify-center gap-2 my-4">
        <button wire:click="addEvent" class="button button--black">Додати подію</button>
        <button wire:click="deleteEvent" class="button button--black">Крок назад</button>
        <button class="button button--black">Завершити серію</button>

        @if ($isActiveVoteButton)
            <a href="{{route('manager.series.vote', $seriesId)}}" class="button button--red outline outline-offset-2">Голосування</a>            
        @endif
        
    </div>
 </div>