<?php

namespace App\Filament\Resources\PlayerSeriesRegistrationResource\Pages;

use App\Filament\Resources\PlayerSeriesRegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerSeriesRegistration extends EditRecord
{
    protected static string $resource = PlayerSeriesRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
