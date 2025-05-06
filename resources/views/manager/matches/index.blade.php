@extends('layouts.app')

@section('title', 'Матчі')




@section('content')

<livewire:dependent-dropdown />
    <div class="page__container">
        <div class="page__wrapper">
            <livewire:manager-match-list />
        </div>
    </div>
@endsection	
   