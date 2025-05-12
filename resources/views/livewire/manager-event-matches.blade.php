<div class="flex justify-center gap-2">
   <section class="home__protocol protocol">
        <h2 class="protocol__title section-title section-title--margin">Протокол серії</h2>
        <div class="protocol__body">
            @foreach ($templateMatches as $i => $teamplateMatche)
                @php
                    $matchNumber = $i + 1;
                    $teamId1 = $teamplateMatche[0] ?? null;
                    $teamId2 = $teamplateMatche[1] ?? null;

                    $color1 = isset($teamId1, $teamIdsInSeries, $teamColors)
                        ? $teamColors[$teamIdsInSeries[$teamId1]] ?? '#ccc'
                        : '#ccc';

                    $color2 = isset($teamId2, $teamIdsInSeries, $teamColors)
                        ? $teamColors[$teamIdsInSeries[$teamId2]] ?? '#ccc'
                        : '#ccc';

                    // Активный класс для кнопки
                    $activeClass = ($i + 1) === $activeMatch ? '__active' : '';
                @endphp

                <div class="protocol__block">
                    <div class="protocol__match match-protocol">
                        <button wire:click="selectedMatch({{ $matchNumber }})" class="match-protocol__label {{ $activeClass }}">
                            МАТЧ {{ $matchNumber }}
                        </button>
                        <span style="background: {{ $color1 }}" class="blue-bg">2</span>
                        <span style="background: {{ $color2 }}" class="yellow-bg">1</span>
                    </div>
                    <div class="protocol__content">
                        @if (isset($matches[$i]['matchEvents']))
                        @foreach ($matches[$i]['matchEvents'] as $matchEvents)
                            <div class="protocol__item yellow-bg">
                                <span class="protocol__ball">
                                    2
                                    <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                                </span>
                            </div>
                        @endforeach                            
                        @endif
                        {{-- <div class="protocol__item blue-bg">
                            <span class="protocol__yellow up">5</span>
                        </div>
                        <div class="protocol__item yellow-bg">
                            <span class="protocol__ball">
                                2
                                <img src="/img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                            </span>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        </div>
   </section>
</div>