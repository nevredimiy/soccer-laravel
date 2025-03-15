@extends('layouts.app')

@section('title', 'Мій профіль')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center flex-col items-center">
        <h2>Мій профіль</h2>
        <p>Вітаємо, {{ auth()->user()->nickname }}!</p>
        <p>Email: {{ auth()->user()->email }}</p>
    </div>
</div>
@endsection
