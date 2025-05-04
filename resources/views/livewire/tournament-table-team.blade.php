<section class="home__tournament-table table-section">
    <h2 class="table-section__title section-title section-title--margin">
        Турнірна таблиця
    </h2>
    <div class="table-section__subtitle">
        Меридіан - Суперліга
    </div>
    <div  class="table-section__body">
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
                        @foreach ($roman as $value)
                        <th wire:key="{{$value}}">
                            <span class="digit">{{$value}}</span>
                        </th>                                    
                        @endforeach                                
                        
                        <th>
                            <span class="digit">Ф</span>
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
                    @foreach ($teams as $key => $team)
                    <tr wire:key="{{$key}}">
                        <td>
                            <span class="fz-big">{{$key + 1}}</span>
                        </td>
                        <td class="color">
                            <span style="background-color: {{$team->color->color_picker}}">
                            </span>
                        </td>
                        <td>
                            <span class="team fz-big">{{$team->name}}</span>
                        </td>
                        @foreach ($roman as $value)
                        <td>
                            <span class="digit"></span>
                        </td>    
                        @endforeach
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="border">0</span>
                        </td>
                        <td>
                            <span class="gray-bg">0</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>