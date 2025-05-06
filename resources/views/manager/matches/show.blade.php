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
<div class="flex justify-center gap-2 mt-4">
   <button class="button button--black">Додати подію</button>
   <button class="button button--black">Крок назад</button>
</div>
<div class="flex flex-col items-center gap-2 mt-4">
   @php
      $colors = ['#0053a0', '#59c65d', '#ed1c24'];
   @endphp
   @for ($i = 0; $i < 3; $i++)
      <div class="flex gap-1">
         @for ($j = 0; $j < 9; $j++)
            <button style="background: {{ $colors[$i] }}" class="social__item ball">
               {{ $j + 1 }}
            </button>
         @endfor
      </div>
   @endfor
</div>
<div class="flex justify-center gap-2 mt-4">
   <button class="button button--black">Завершити Матч</button>
   <button class="button button--black">Завершити серію</button>
</div>
<div class="flex justify-center gap-2 mt-4">
   <section class="home__protocol protocol">
      <h2 class="protocol__title section-title section-title--margin">Протокол серії</h2>
      <div data-simplebar="init" class="protocol__body"><div class="simplebar-wrapper" style="margin: 0px 0px -50px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px 0px 50px;">
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 1
               </div>
               <span class="blue-bg">2</span>
               <span class="yellow-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__shoe up">
                     4
                     <img src="/img/player/shoe.svg" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__yellow">
                     1
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     6
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__red up">
                     4
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 2
               </div>
               <span class="blue-bg">0</span>
               <span class="green-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 3
               </div>
               <span class="green-bg">1</span>
               <span class="yellow-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item green-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__yellow">
                     1
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball up">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__yellow up">
                     6
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 1
               </div>
               <span class="blue-bg">2</span>
               <span class="yellow-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__yellow">
                     1
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     6
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__red up">
                     4
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 2
               </div>
               <span class="blue-bg">0</span>
               <span class="green-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 3
               </div>
               <span class="green-bg">1</span>
               <span class="yellow-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item green-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__yellow">
                     1
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball up">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__yellow up">
                     6
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 1
               </div>
               <span class="blue-bg">2</span>
               <span class="yellow-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__yellow">
                     1
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     6
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__red up">
                     4
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 2
               </div>
               <span class="blue-bg">0</span>
               <span class="green-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item blue-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item blue-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
            </div>
         </div>
         <div class="protocol__block">
            <div class="protocol__match match-protocol">
               <div class="match-protocol__label">
                  МАТЧ 3
               </div>
               <span class="green-bg">1</span>
               <span class="yellow-bg">1</span>
            </div>
            <div class="protocol__content">
               <div class="protocol__item green-bg">
                  <span class="protocol__yellow up">
                     5
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__ball">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball up">
                     4
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__red">
                     3
                  </span>
               </div>
               <div class="protocol__item yellow-bg">
                  <span class="protocol__yellow">
                     1
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__ball up">
                     2
                     <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                  </span>
               </div>
               <div class="protocol__item green-bg">
                  <span class="protocol__yellow up">
                     6
                  </span>
               </div>
            </div>
         </div>
      </div></div></div></div><div class="simplebar-placeholder" style="width: 691px; height: 912px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
   </section>
</div>

