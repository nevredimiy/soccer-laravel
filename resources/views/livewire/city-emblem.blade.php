<div>
    <div wire:modal.live='city' data-da=".header__images, 767.98, last" class="header__city">
        {{$city[0]->name}}
        <img src="{{ asset($city[0]->logo) }}" alt="Image" class="ibg ibg--contain">
    </div>
</div>
