<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeriesMetaResource\Pages;
use App\Filament\Resources\SeriesMetaResource\RelationManagers;
use App\Models\SeriesMeta;
use Filament\Forms;
use App\Models\Event;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeriesMetaResource extends Resource
{
    protected static ?string $model = SeriesMeta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Дані матчів';

    protected static ?int $navigationSort = 7;

    protected static ?string $navigationLabel = 'Дані серії';

    protected static ?string $pluralModelLabel = 'Дані серії';
  
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->options(function () {
                        return Event::orderBy('id', 'desc')
                        ->get()
                        ->mapWithKeys(function ($event) {
                            $stadium = $event->stadium;
                            $location = $stadium->location;
                            $district = $location->district;
                            $city = $district ? $district->city : null;
                            $label = '(' . $event->id . ') ';
                            $label .= $event->date;
                            if($stadium) {
                                $label .= ' - ' . $stadium->name;
                            }
                            if($location) {
                                $label .= ' - ' . $location->address;
                            }

                            if($city) {
                                $label .= ' - ' . $city->name;
                            }

                            return [$event->id => $label];

                        });
                    })
                    ->preload()
                    ->label('Подія')
                    ->required(),
                Forms\Components\DateTimePicker::make('date')
                    ->required(),
                Forms\Components\TextInput::make('series')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('round')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event_id')
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('event')
                //     ->label('Подія')
                //     ->formatStateUsing(function ($state, $record){
                //         if (!$record->event) {
                //             return '—';
                //         }
                
                //         return "({$record->event->id}) - {$record->event->date}";
                //     })                    
                //     ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('series')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('round')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('UAH')
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
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSeriesMetas::route('/'),
            'create' => Pages\CreateSeriesMeta::route('/create'),
            'edit' => Pages\EditSeriesMeta::route('/{record}/edit'),
        ];
    }
}
