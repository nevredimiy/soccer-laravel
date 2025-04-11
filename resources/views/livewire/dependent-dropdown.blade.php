<div class='filter__container max-w-md mx-auto'>
    <div class="flex gap-4 flex-wrap justify-center mb-4">
        <!-- Город -->
        <div class="">
            <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedCity" name="cities" id="">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}"
                        @if(session()->has('current_city') && session('current_city') == $city->id) selected @endif
                    >
                        {{ $city->name }}
                    </option>
                @endforeach                    
            </select>
        </div>

         <!-- Район -->
        <div class="">
           <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedDistrict" name="district" id="">
                <option value="">Вибери район</option>
                @if ($districts)
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}"
                            @if(session()->has('current_district') && session('current_district') == $district->id) selected @endif
                        > 
                            {{ $district->name }}
                        </option>
                    @endforeach                                        
                @endif
            </select>
        </div>

        <!-- Локация -->
        <div class="">
           <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedLocation" name="location" id="">
                <option value="">Вибери локацію</option>
                @if ($locations)
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}"
                            @if(session()->has('current_location') && session('current_location') == $location->id) selected @endif
                        > 
                            {{ $location->address }}
                        </option>
                    @endforeach                                        
                @endif
            </select>
        </div>

         {{-- <!-- Турнир -->
         <div class="">
            <select wire:model.live="selectedTournament" class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" name="tournaments" id="">
                 <option value="">Вибери турнір</option>
                 @if ($tournaments)
                     @foreach ($tournaments as $tournament)
                        <option value="{{ $tournament->id }}"
                            @if(session()->has('current_tournament') && session('current_tournament') == $tournament->id) selected @endif
                        > 
                            {{ $tournament->name }}
                        </option>
                     @endforeach                                        
                 @endif
             </select>
         </div> --}}

         <!-- Тип Турнира -->
         <div class="">
            <select wire:model.live="selectedTypeTournament" class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" name="typeTournaments" id="">
                 <option value="">Вибери тип турніра</option>
                 @if ($typeTournaments)
                    @foreach ($typeTournaments as $typeTournament)
                        <option value="{{ $typeTournament }}"
                            @if(session()->has('current_type_tournament') && session('current_type_tournament') == $typeTournament) selected @endif
                        > 
                            {{ $typeTournament == 'team' ? 'Командні' : 'Індивідуальні' }}
                        </option>
                    @endforeach                                        
                @endif
             </select>
         </div>

        <!-- Лига -->
        <div class="">
           <select wire:model.live="selectedLeague" class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" name="league" id="">
                <option value="">Вибери лігу</option>
                @if ($leagues)
                    @foreach ($leagues as $league)
                        <option value="{{ $league->id }}"> {{ $league->name }}</option>
                    @endforeach                                        
                @endif
            </select>
        </div>
    </div>

</div>
