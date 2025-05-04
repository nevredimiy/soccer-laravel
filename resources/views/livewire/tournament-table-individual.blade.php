<section class="home__indiv-table table-section">
    <h2 class="table-section__title section-title section-title--margin">
        Турнірна таблиця
    </h2>
    <div class="table-section__subtitle">
        Меридіан - Суперліга
    </div>
    <div data-simplebar class="table-section__body">
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
                        @foreach ($roman as $round)
                        <th>
                            <span class="digit">{{$round}}</span>
                        </th>                            
                        @endforeach
                       
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
                    @foreach ($players as $key => $player)
                        <tr wire:key="{{$key}}">
                            <td>
                                <span class="place gold">1</span>
                            </td>
                            <td>
                                <div class="photo">
                                    <img src="{{asset('storage' . $player['photo'])}}" alt="Image" class="ibg">
                                </div>
                            </td>
                            <td>
                                <span class="team fz-big">{{$player['name']}}</span>
                            </td>
                            @for ($round = 1; $round <= 12; $round++)
                            
                                <td>
                                    <span class="digit">1</span>
                                </td>
                                
                            @endfor
                        
                            <td>
                                <span class="border">210</span>
                            </td>
                            <td>
                                <span class="border">127</span>
                            </td>
                            <td>
                                <span class="border">83</span>
                            </td>
                            <td>
                                <span class="border">210</span>
                            </td>
                            <td>
                                <span class="border">127</span>
                            </td>
                            <td>
                                <span class="border">83</span>
                            </td>
                            <td>
                                <span class="border">83</span>
                            </td>
                            <td>
                                <span class="gray-bg">27</span>
                            </td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>