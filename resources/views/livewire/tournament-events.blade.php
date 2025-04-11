<section class="home__tournament-table table-section">
    @if ($events)
    <ul class="flex flex-col flex-wrap gap-2">
        @foreach ($events as $event)
            <li>
            <button  
                data-eventid = "{{$event->id}}"
                wire:click="selectEvent('{{$event->id}}')" 
                class="{{ $activeEvent == $event->id ? 'border' : ''}}"
            >
                <span class="text-xs">
                    {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F') }} 
                    ({{$event->id}})
                    ({{$event->tournament->name}}) 
                    ({{$event->tournament->type}}) 
    
                </span>
            </button>
            </li>
        @endforeach
    </ul>                
    @else
        <h2>Ніяких подій немає у вибраній локації</h2>
    @endif
</section>