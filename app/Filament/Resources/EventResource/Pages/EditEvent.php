<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;

    class EditEvent extends EditRecord
    {
        protected static string $resource = EventResource::class;

        protected function getHeaderActions(): array
        {
            return [
                Actions\DeleteAction::make(),
            ];
        }

        protected function mutateFormDataBeforeSave(array $data): array
        {
            return $data;
        }

        // Метод позволяет перейти в список, после редактировании
        protected function getRedirectUrl(): string
        {
            // Перенаправление на список событий
            return $this->getResource()::getUrl('index');
        }
    }
