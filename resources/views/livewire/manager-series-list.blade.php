<div class="">
    <hr />
    <div class="flex justify-center mt-4 gap-2">
        <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded mb-2" wire:model.live="selectedEvent" name="events">
            <option value="0">Вибери подію</option>
            @foreach ($events as $key => $event)            
                <option wire:key="{{$key}}" value="{{ $event->id }}"
                    @if(session()->has('current_event') && session('current_event') == $event->id) selected @endif
                >
                    Подія {{ $event->id }} - {{ $event->name }} 
                </option>
            @endforeach   
        </select>
       
    </div>

    <ul class="grid grid-cols-1 justify-items-center md:grid-cols-2 lg:grid-cols-3 mb-4">
        @forelse ($seriesMetasGroup ?? [] as $round => $seriaMeta)
            <li wire:key="{{$round}}">
                <a 
                    class="border rounded p-2 mb-2 hover:bg-yellow-300" 
                    href="{{route('manager.series.show', ['id' => $round])}}"
                >
                <p>Тур {{$round}}</p>
                @foreach ( $seriaMeta as $item )
                <div wire:key="{{$item->id}}" class="">
                    Серія {{$item->series}}-Початок {{\Carbon\Carbon::parse($item->start_date)->format('H:i - d.m.Y')}}                    
                </div>
                @endforeach

                </a>
            </li>                    
        @empty
            <li>Немає серій</li>
        @endforelse      
    </ul>
    
</div>
