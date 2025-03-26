
@extends('layouts.app')

@section('title', 'Заявка гравця')

@section('content')

<livewire:dependent-dropdown />


<div class="page__container">
    <div class="page__wrapper">
        <div class="page__bid bid">

            <livewire:event-list />            

        </div>
    </div>
</div>
@endsection