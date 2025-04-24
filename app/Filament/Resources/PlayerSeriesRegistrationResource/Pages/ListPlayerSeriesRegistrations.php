<?php

namespace App\Filament\Resources\PlayerSeriesRegistrationResource\Pages;

use App\Filament\Resources\PlayerSeriesRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlayerSeriesRegistrations extends ListRecords
{
    protected static string $resource = PlayerSeriesRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
