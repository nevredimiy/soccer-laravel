<?php

namespace App\Filament\Resources\PlayerTeamResource\Pages;

use App\Filament\Resources\PlayerTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlayerTeam extends EditRecord
{
    protected static string $resource = PlayerTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
