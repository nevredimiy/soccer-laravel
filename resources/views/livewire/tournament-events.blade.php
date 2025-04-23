<section class="home__tournament-table table-section">
    @if ($events)

        <div class="text-center mb-2">
            <h2>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F') }} </h2>
            <h2>{{$event->tournament->name}}</h2>
            ({{$event->id}})
            ({{$event->format_scheme}} команд)
            ({{$event->tournament->name}}) 
        </div>  
        @if (count($events) > 1)
        <ul class="flex flex-wrap gap-2 bg-gray-400 rounded p-1 justify-center ">
            @foreach ($events as $key => $event)
                <li wire:key="{{$key}}">
                <button  
                    data-eventid = "{{$event->id}}"
                    wire:click="selectEvent('{{$event->id}}')" 
                    class="btn-event {{ $activeEvent == $event->id ? 'btn-event--active' : ''}}"
                >
                </button>
                </li>
            @endforeach
        </ul>             
        @endif         
    
    
    @else
        <h2>Ніяких подій немає у вибраній локації</h2>
    @endif
</section>