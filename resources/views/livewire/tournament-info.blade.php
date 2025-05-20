<div class="page__home home">
    <div class="home__block _block">        
        @if ($event->tournament->type == 'team')
            @livewire('tournament-table-team', ['teams' => $teams])            
        @else
            @livewire('tournament-table-individual', ['teams' => $teams, 'eventId' => $eventId])
        @endif

        @livewire('top-scorers-of-tournament', ['teams' => $teams, 'eventId' => $eventId])

    </div>

    <div class="home__block _block">

         @if ($event->tournament->subtype == 'regular')
             @livewire('team-shedule', ['event' => $event])
         @endif

        @if ($event->status == 'finished')
        <section class="home__series-result table-section">
            <h2 class="table-section__title section-title section-title--margin">
                Результати серії
            </h2>
            <div class="table-section__body">
                <div class="table-section__table-wrapper">
                    <table class="table-section__table">
                        <thead>
                            <tr>
                                <th>
                                    <span class="fz-big">M</span>
                                </th>
                                <th></th>
                                <th>
                                    <span class="team fz-big">Команда</span>
                                </th>
                                <th>
                                    <span>В</span>
                                </th>
                                <th>
                                    <span>Н</span>
                                </th>
                                <th>
                                    <span>П</span>
                                </th>
                                <th>
                                    <span>ЗМ</span>
                                </th>
                                <th>
                                    <span>ПМ</span>
                                </th>
                                <th>
                                    <span>РМ</span>
                                </th>
                                <th>
                                    <span>О</span>
                                </th>
                                <th>
                                    <span>Б</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span class="fz-big">1</span>
                                </td>
                                <td class="color">
                                    <span style="background-color: #F7E10E;">
                                    </span>
                                </td>
                                <td>
                                    <span class="team fz-big">ДП АНТОНОВ</span>
                                </td>
                                <td>
                                    <span>11</span>
                                </td>
                                <td>
                                    <span>4</span>
                                </td>
                                <td>
                                    <span>7</span>
                                </td>
                                <td>
                                    <span class="border">87</span>
                                </td>
                                <td>
                                    <span class="border">65</span>
                                </td>
                                <td>
                                    <span class="border">16</span>
                                </td>
                                <td>
                                    <span class="blue-bg">27</span>
                                </td>
                                <td>
                                    <span class="gray-bg">3</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fz-big">2</span>
                                </td>
                                <td class="color">
                                    <span style="background-color: #59C65D;">
                                    </span>
                                </td>
                                <td>
                                    <span class="team fz-big">ДП АНТОНОВ</span>
                                </td>
                                <td>
                                    <span>11</span>
                                </td>
                                <td>
                                    <span>4</span>
                                </td>
                                <td>
                                    <span>7</span>
                                </td>
                                <td>
                                    <span class="border">87</span>
                                </td>
                                <td>
                                    <span class="border">65</span>
                                </td>
                                <td>
                                    <span class="border">16</span>
                                </td>
                                <td>
                                    <span class="blue-bg">27</span>
                                </td>
                                <td>
                                    <span class="gray-bg">3</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="fz-big">3</span>
                                </td>
                                <td class="color">
                                    <span style="background-color: #ff0000;">
                                    </span>
                                </td>
                                <td>
                                    <span class="team fz-big">ДП АНТОНОВ</span>
                                </td>
                                <td>
                                    <span>11</span>
                                </td>
                                <td>
                                    <span>4</span>
                                </td>
                                <td>
                                    <span>7</span>
                                </td>
                                <td>
                                    <span class="border">87</span>
                                </td>
                                <td>
                                    <span class="border">65</span>
                                </td>
                                <td>
                                    <span class="border">16</span>
                                </td>
                                <td>
                                    <span class="blue-bg">27</span>
                                </td>
                                <td>
                                    <span class="gray-bg">3</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>            
        @endif


        @livewire('tournament-protocol', ['teams' => $teams, 'eventId' => $eventId])
       
    
        <section class="home__teams teams-section">
            <h2 class="teams-section__title section-title section-title--margin">
                Склади команд на гру
            </h2>
            <div class="teams-section__body">
                @foreach ($teams as $team)
                <div style="--color: {{$team->color->color_picker}}" class="teams-section__item item-team-home">
                    <div data-rating-size="10" data-rating-value="7" class="item-team-home__team-rating rating">
                        <div class="rating__items">
                            @for ($i=0; $i<10; $i++)
                                    <label class="rating__item @if ($i <= $team->rating)
                                        rating__item--active
                                        @endif">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.669408 7.82732C0.398804 7.57384 0.545797 7.11561 0.911812 7.07165L6.09806 6.44858C6.24723 6.43066 6.3768 6.33578 6.43972 6.19761L8.62721 1.39406C8.78159 1.05505 9.25739 1.05499 9.41177 1.39399L11.5993 6.19751C11.6622 6.33568 11.7909 6.43082 11.9401 6.44873L17.1266 7.07165C17.4926 7.11561 17.6392 7.57398 17.3686 7.82745L13.5347 11.4193C13.4244 11.5226 13.3753 11.6764 13.4046 11.8256L14.4221 17.0141C14.4939 17.3803 14.1092 17.664 13.7876 17.4816L9.23042 14.8972C9.09934 14.8228 8.94009 14.8232 8.80901 14.8975L4.25138 17.481C3.92976 17.6633 3.54432 17.3802 3.61615 17.0141L4.63382 11.8259C4.66309 11.6767 4.61412 11.5226 4.50383 11.4193L0.669408 7.82732Z" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </label>
                            @endfor 
                        </div>
                    </div>
                    <div class="item-team-home__header">
                        <div class="item-team-home__title">
                            №
                        </div>
                        <div class="item-team-home__title">
                            ГРАВЕЦЬ
                        </div>
                        <div class="item-team-home__icon">
                            <img src="img/player/ball.webp" alt="Image" class="ibg ibg--contain">
                        </div>
                        <div class="item-team-home__icon">
                            <img src="img/player/shoe.svg" alt="Image" class="ibg ibg--contain">
                        </div>
                    </div>
                    {{-- <ol class="item-team-home__list">
                        @foreach ($team->players as $player)
                        <li class="item-team-home__member">
                            <div class="item-team-home__circle"></div>
                            <span class="active">{{$player->first_name}} {{$player->last_name}}</span>
                            <div class="item-team-home__value">2</div>
                            <div class="item-team-home__value">0</div>
                        </li>    
                        @endforeach
                    </ol> --}}
                    @if (isset($seriesPlayers[$team->id]))
                        <ol class="item-team-home__list">
                            @foreach ($seriesPlayers[$team->id] as $player)
                                <li class="item-team-home__member">
                                    <div class="item-team-home__circle">
                                        <img src="{{asset('storage/'. $player->player->photo)}}" alt="{{$player->player->full_name}}">
                                    </div>
                                    {{-- <span class="active">{{$player->player->first_name}} {{$player->player->last_name}}</span> --}}
                                    <span class="">{{$player->player->full_name}}</span>
                                    <div class="item-team-home__value">2</div>
                                    <div class="item-team-home__value">0</div>
                                </li>    
                            @endforeach
                        </ol>    
                                        
                    @endif
                </div>
                @endforeach
            </div>      
        </section>
        <section class="home__gallery gallery-home">
            <h2 class="gallery-home__title section-title section-title--margin">
                Фото команд
            </h2>
            <div class="gallery-home__items">
                <img src="img/gallery/01.webp" alt="Image">
                <img src="img/gallery/02.webp" alt="Image">
                <img src="img/gallery/03.webp" alt="Image">
            </div>
        </section>
    </div>
</div>
