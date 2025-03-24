@extends('layouts.app')

@section('title', 'Стадіони')

@section('content')

<livewire:dependent-dropdown />

<div class="tables__container _block">
    <text class="uppercase block mb-4 text-center font-bold text-3xl text-gray-400">Командні турніри</text>
    
    <section class="home__tournament-table table-section">
        <h2 class="table-section__title section-title section-title--margin">
            Турнірна таблиця
        </h2>
        <div class="table-section__subtitle">
            Меридіан - Суперліга
        </div>
        <div data-simplebar="init" class="table-section__body"><div class="simplebar-wrapper" style="margin: 0px 0px -18px -6px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px 0px 18px 6px;">
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
                                <span class="digit">I</span>
                            </th>
                            <th>
                                <span class="digit">II</span>
                            </th>
                            <th>
                                <span class="digit">III</span>
                            </th>
                            <th>
                                <span class="digit">IV</span>
                            </th>
                            <th>
                                <span class="digit">V</span>
                            </th>
                            <th>
                                <span class="digit">VI</span>
                            </th>
                            <th>
                                <span class="digit">VII</span>
                            </th>
                            <th>
                                <span class="digit">IIX</span>
                            </th>
                            <th>
                                <span class="digit">IX</span>
                            </th>
                            <th>
                                <span class="digit">X</span>
                            </th>
                            <th>
                                <span class="digit">XI</span>
                            </th>
                            <th>
                                <span class="digit">XII</span>
                            </th>
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
                        <tr>
                            <td>
                                <span class="fz-big">1</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #ff0000;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">2</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #00b050;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">3</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #ffff00;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">4</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #ff7f27;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">5</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #0070c0;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ <div class="small-label">(Дружківка)</div></span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">6</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #808080;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">7</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #99d9ea;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">8</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #9bbb59;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                        <tr>
                            <td>
                                <span class="fz-big">9</span>
                            </td>
                            <td class="color">
                                <span style="background-color: #ff99ff;">
                                </span>
                            </td>
                            <td>
                                <span class="team fz-big">ДП АНТОНОВ</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">3</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">2</span>
                            </td>
                            <td>
                                <span class="digit">1</span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
                            </td>
                            <td>
                                <span class="digit"></span>
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
                    </tbody>
                </table>
            </div>
        </div></div></div></div><div class="simplebar-placeholder" style="width: 1000px; height: 399px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
    </section>
</div>

<text class="uppercase block mb-4 text-center font-bold text-3xl text-gray-400">Індивідуальні турніри</text>

@endsection