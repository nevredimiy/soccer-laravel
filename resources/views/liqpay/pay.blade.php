@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">Оплата через LiqPay</h2>
        <div class="text-center">
            {!! $form !!}
        </div>
    </div>
@endsection