@extends('layouts.app')

@section('title', 'Підтвердження email')

@section('content')
<div class="container">
    <h2>Підтвердження email</h2>
    <p>Будь ласка, підтвердіть вашу електронну адресу. Ми надіслали вам листа.</p>
    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">Надіслати повторно</button>
    </form>
</div>
@endsection
