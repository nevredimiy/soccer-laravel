<div class='filter__container max-w-md mx-auto'>
    <div class="flex gap-4 flex-wrap">
        <div class="">
            <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedCity" name="cities" id="">
                <option value="">Вибери місто</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach                    
            </select>
        </div>

        <div class="">
           <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedDistrict" name="" id="">
                <option value="">Вибери район</option>

                @if ($districts)
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}"> {{ $district->name }}</option>
                    @endforeach                                        
                @endif
            </select>
        </div>

        <div class="">
           <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" wire:model.live="selectedLocation" name="" id="">
                <option value="">Вибери локацію</option>
                @if ($locations)
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}"> {{ $location->name }}</option>
                    @endforeach                                        
                @endif
            </select>
        </div>

        <div class="">
           <select class="bg-[#00539f] text-white py-1.5 px-2 min-w-44 rounded" name="" id="">
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
