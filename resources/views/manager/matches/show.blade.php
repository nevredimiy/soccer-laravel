@extends('layouts.planshet')

@section('title', 'Дані матча')

<div class="flex justify-center gap-2 mt-4">
   @foreach(['football' => 'Гол', 'boots-icon' => 'Асист', 'red-football' => 'Автогол', 'yellow-card-icon' => 'ЖК', 'red-card-icon' => 'ЧК'] as $key => $label)
      <label>
         <input type="radio" name="event_type" value="{{ $key }}" class="hidden peer">
         <div class="peer-checked:border-black border border-transparent flex flex-col justify-end items-center gap-2 uppercase rounded p-2 w-20 h-30 cursor-pointer hover:border-black">
            <img class="w-10" src="{{ asset('img/icons/' . $key . '.png') }}" alt="{{ $label }}">
            {{ $label }}
         </div>
      </label>
   @endforeach
</div>

