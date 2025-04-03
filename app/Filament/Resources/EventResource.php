<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\Tournament;
use App\Models\League;
use App\Models\Stadium;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationLabel = 'Подія';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\TimePicker::make('start_time')
                    ->required(),
                Forms\Components\TimePicker::make('end_time')
                    ->required(),
                Forms\Components\Select::make('stadium_id')
                    ->required()
                    ->options(function () {
                        return Stadium::with(['location.district']) // Загружаем связанные данные
                        ->get()
                        ->mapWithKeys(function ($stadium) {
                            $location = $stadium->location; 
                            $district = $location->district;
                            $city = $district ? $district->city : null; // Получаем модель City
                            $label = $stadium->name;


                            if ($location) {
                                $label .= ' - ' . $location->address;
                            }

                            if ($district) {
                                $label .= ' - ' . $district->name;
                            }
                            if ($city) {
                                $label .= ' - ' . $city->name;
                            }

                            return [$stadium->id => $label];
                        });
                    })
                    ->searchable(),
                Forms\Components\Select::make('tournament_id')
                    ->required()
                    ->options(Tournament::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('league_id')
                    ->options(League::all()->pluck('name', 'id'))
                    ->searchable()
                    ->default(null),
                Forms\Components\Select::make('format')
                    ->options([
                        '5x5x5' => '5x5x5', 
                        '4x4x4' => '4x4x4', 
                        '9x9x9' => '9x9x9'
                    ])
                    ->default('5x5x5')
                    ->dehydrated()
                    ->label('Формат'),
                Forms\Components\Select::make('size_field')
                    ->options([
                        '40x20' => '40x20', 
                        '60x40' => '60x40'
                    ])
                    ->default('40x20')
                    ->dehydrated()
                    ->label('Розмір стадіона'),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time'),
                Tables\Columns\TextColumn::make('end_time'),
                Tables\Columns\TextColumn::make('format')->label('Формат'),
                Tables\Columns\TextColumn::make('size_field')->label('Розмір поля'),
                Tables\Columns\TextColumn::make('stadium.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tournament.name')                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('league.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
