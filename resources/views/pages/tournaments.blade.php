@extends('layouts.app')

@section('title', 'Турніри')




@section('content')

<livewire:dependent-dropdown />



    <div class="page__container">
        <div class="page__wrapper">
            {{-- <div class="flex flex-wrap">
            @foreach ($tours as $k => $tour )
            <ul class="border p-2">
                <span>{{$k+1}}.</span>
                @foreach ($tour as $k => $v )
                 <li>   <p> {{$v}}</p></li>
                    
                @endforeach
            </ul>
            @endforeach
            </div>
            <hr /> --}}
            {{-- <div class="flex">
                @foreach ($series1 as $k => $tour )
                <ul class="border p-2">
                    <span>{{$k+1}}.</span>
                    @foreach ($tour as $k => $v )
                     <li>   <p> {{$v}}</p></li>
                        
                    @endforeach
                </ul>
                @endforeach
            </div>
            <div class="flex">
                @foreach ($series2 as $k => $tour )
                <ul class="border p-2">
                    <span>{{$k+1}}.</span>
                    @foreach ($tour as $k => $v )
                     <li>   <p> {{$v}}</p></li>
                        
                    @endforeach
                </ul>
                @endforeach
            </div> --}}
            <livewire:tournament-events />
            <livewire:tournament-info />
            <livewire:tabs />
        </div>
    </div>
@endsection	
   