<?php

namespace App\Filament\Resources\StadiumResource\Pages;

use App\Filament\Resources\StadiumResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewStadium extends ViewRecord
{
    protected static string $resource = StadiumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
