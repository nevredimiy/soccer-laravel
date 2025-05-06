<div class="">
    <hr />
    <div class="flex justify-center mt-4">
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
    <ul class="grid grid-cols-1 justify-items-center md:grid-cols-2 lg:grid-cols-3">
        @foreach ($matches as $match)
            <li wire:key="{{$match->id}}">
                <a 
                    class="border rounded p-2 mb-2 hover:bg-yellow-300 
                    @if ($match->status == 'finished')
                        finished
                    @endif" 
                    href="{{route('manager.matches.show', ['id' => $match->id])}}"
                >
                    Матч {{$loop->iteration}} - {{$match->event_id}}-Тур {{$match->round}}-Серія {{$match->series}}-Початок {{\Carbon\Carbon::parse($match->start_time)->format('d.m.Y')}} {{\Carbon\Carbon::parse($match->start_time)->format('H:i')}}

                </a>
            </li>                    
        @endforeach
        
    </ul>
</div>
