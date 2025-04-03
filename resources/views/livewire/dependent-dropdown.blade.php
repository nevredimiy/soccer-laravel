<div class='filter__container max-w-md mx-auto'>
    <div class="flex gap-4 flex-wrap justify-center mb-4">
        <!-- Город -->
        <div class="">
            <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedCity" name="cities" id="">
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}"
                        @if(session()->has('current_city') && session('current_city') == $city->id) selected @endif>{{ $city->name }}</option>
                @endforeach                    
            </select>
        </div>

         <!-- Район -->
        <div class="">
           <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedDistrict" name="district" id="">
                <option value="">Вибери район</option>
                @if ($districts)
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}"> {{ $district->name }}</option>
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
                        <option value="{{ $location->id }}"> {{ $location->address }}</option>
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
