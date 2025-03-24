@extends('layouts.app')

@section('content')
    <div class="article__container">
        <h1>{{ $article->title }}</h1>
        <div>{!! $article->content !!}</div>
        <a href="{{ url('/') }}">На главную</a>
    </div>
@endsection
