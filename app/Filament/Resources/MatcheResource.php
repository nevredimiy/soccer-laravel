<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatcheResource\Pages;
use App\Filament\Resources\MatcheResource\RelationManagers;
use App\Models\Matche;
use App\Models\Event;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;

class MatcheResource extends Resource
{
    protected static ?string $model = Matche::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?string $navigationGroup = 'Дані матчів';
    
    protected static ?string $navigationLabel = 'Матчі';
    
    protected static ?string $pluralModelLabel = 'Список матчів';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('event_id')
                    ->options(function () {
                        return Event::with(['stadium'])
                        ->orderBy('id', 'desc')
                        ->get()
                        ->mapWithKeys(function ($event) {
                            $stadium = $event->stadium;
                            $location = $stadium->location;
                            $district = $location->district;
                            $city = $district ? $district->city : null;
                            $label = $event->date;
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
                    ->searchable()
                    ->live()
                    ->required()
                    ->label('Подія')
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Forms\Components\Select::make('team1_id')
                    ->options(fn (Get $get): array => Team::where('event_id', $get('event_id'))
                        ->pluck('name', 'id')
                        ->toArray())
                    ->label('Команда 1')
                    ->required(),
                Forms\Components\Select::make('team2_id')
                    ->options(fn (Get $get): array => Team::where('event_id', $get('event_id'))
                        ->pluck('name', 'id')
                        ->toArray())
                    ->label('Команда 2')
                    ->required(),                    
                Forms\Components\TextInput::make('score_team1')
                    ->numeric()
                    ->label('Рахунок першої команди')
                    ->default(0),
                Forms\Components\TextInput::make('score_team2')
                    ->numeric()
                    ->label('Рахунок другої команди')
                    ->default(0),
                Forms\Components\DateTimePicker::make('start_time')
                    ->label('Початок матчу')    
                    ->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->default('scheduled')
                    ->label('Статус')
                    ->options([
                        'scheluded' => 'Заплановано',
                        'finished' => 'Закінчений',
                        'canceled' => 'Відмінений',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team1_id')
                    ->label('Команда 1')
                    ->getStateUsing(function ($record) {
                        $team = Team::find($record->team1_id);
                        return $team ? $team->name . ' (' . $team->id . ')' : 'Не указана';
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('team2_id')
                    ->label('Команда 2')
                    ->getStateUsing(function ($record) {
                        $team = Team::find($record->team2_id);
                        return $team ? $team->name . ' (' . $team->id . ')' : 'Не указана';
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score_time1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score_time2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListMatches::route('/'),
            'create' => Pages\CreateMatche::route('/create'),
            'view' => Pages\ViewMatche::route('/{record}'),
            'edit' => Pages\EditMatche::route('/{record}/edit'),
        ];
    }
}
