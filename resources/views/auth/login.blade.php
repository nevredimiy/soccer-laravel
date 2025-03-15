@extends('layouts.app')

@section('title', 'Вхід')

@section('content')
<div class="container block-center">
    @if ($errors->any())
    <div style="color: red; padding: 12px; text-align: center">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="login-section__block @if ($errors->has('email') || $errors->has('password')) is-invalid @endif">
        <h2 class="title">Вхід</h2>
       
    
        <form method="POST" action="{{ route('login') }}" class="flex flex-col">
            @csrf            
            <div class="account__body">
                <div class="account__field">
                    <label class="account__label" for="email">Email</label>
                    <input class="account__input input @if ($errors->has('email') || $errors->has('password')) is-invalid @endif" type="email" name="email" id="email"  value="{{ old('email') }}" required>
                </div>
                <div class="account__field">
                    <label class="account__label" for="password">Пароль</label>
                    <input class="account__input input @if ($errors->has('email') || $errors->has('password')) is-invalid  @endif" type="password" name="password" id="password" required>
                </div>
                <button class="account__button button button--green flex-content-center" type="submit">Увійти</button>
            </div>
        </form>
    </div>
</div>
@endsection
