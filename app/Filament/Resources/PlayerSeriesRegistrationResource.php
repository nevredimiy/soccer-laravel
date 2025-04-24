<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerSeriesRegistrationResource\Pages;
use App\Filament\Resources\PlayerSeriesRegistrationResource\RelationManagers;
use App\Models\PlayerSeriesRegistration;
use App\Models\Team;
use App\Models\Event;
use App\Models\Player;
use App\Models\PlayerTeam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayerSeriesRegistrationResource extends Resource
{
    protected static ?string $model = PlayerSeriesRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Дані матчів';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationLabel = 'Регістрація гравців у серії';

    protected static ?string $pluralModelLabel = 'Регістрація гравців у серії';

 

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
                    ->live()                    
                    ->label('Подія')
                    ->required(),
                Forms\Components\Select::make('team_id')
                    ->options(fn(Get $get) => Team::query()
                        ->where('event_id', $get('event_id'))
                        ->pluck('name', 'id'))
                    ->label('Команда')
                    ->preload()
                    ->live()
                    ->required(),
                Forms\Components\Select::make('player_id')
                    ->options(function (Get $get) {
                        $teamId = $get('team_id');

                        if (!$teamId) {
                            return [];
                        }
                
                       // Получаем ID занятых игроков в команде
                        $takenPlayerIds = PlayerSeriesRegistration::where('team_id', $teamId)
                        ->pluck('player_id')
                        ->toArray();

                        // Получаем игроков команды, исключая уже занятых
                        return Player::whereHas('teams', function ($query) use ($teamId) {
                                $query->where('team_id', $teamId);
                            })
                            ->whereNotIn('id', $takenPlayerIds)
                            ->get()
                            ->mapWithKeys(function ($player) {
                                return [$player->id => "{$player->last_name} {$player->first_name}"];
                            });
                    })
                    ->preload()
                    ->label('Гравці')
                    ->required(),
                Forms\Components\Select::make('player_number')
                    ->required()
                    ->options(function (Get $get) {
                        $teamId = $get('team_id');
                        if (!$teamId) {
                            return [];
                        }
                        $team = Team::find($teamId);

                        if (!$team || !$team->max_players) {
                            return [];
                        }
                
                        // Получаем занятые номера
                        $takenNumbers = PlayerSeriesRegistration::where('team_id', $teamId)
                            ->pluck('player_number')
                            ->toArray();
                
                        $availableNumbers = [];
                
                        for ($i = 1; $i <= $team->max_players; $i++) {
                            if (!in_array($i, $takenNumbers)) {
                                $availableNumbers[$i] = $i;
                            }
                        }
                
                        return $availableNumbers;
                    })
                    ->label('Номер гравця'),
                Forms\Components\TextInput::make('series_number')
                    ->required()
                    ->label('Номер серії')
                    ->numeric(),
                Forms\Components\TextInput::make('round')
                    ->label('Номер туру')
                    ->numeric(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->default('open')
                    ->label('Статус')
                    ->options([
                        'open' => 'Відкритий',
                        'closed' => 'Закритий'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event')
                    ->label('Подія')
                    ->formatStateUsing(function ($state, $record){
                        if (!$record->event) {
                            return '—';
                        }
                
                        return "({$record->event->id}) - {$record->event->date}";
                    })                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('team.name')
                    ->label('Назва команди')
                    ->formatStateUsing(function ($state, $record){
                        if (!$record->team) {
                            return '—';
                        }
                
                        return "{$record->team->name} - ({$record->team->id})";
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('player')
                    ->label('Гравець')
                    ->formatStateUsing(function ($state, $record){
                        if (!$record->player) {
                            return '—';
                        }
                
                        return "{$record->player->last_name} {$record->player->first_name}";
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('player_number')
                    ->numeric()
                    ->label('Номер гравця')
                    ->sortable(),
                Tables\Columns\TextColumn::make('series_number')
                    ->numeric()
                    ->label('Номер серії')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')                
                    ->label('Статус')
                    ->formatStateUsing(fn ($state) => [
                        'open' => 'Відкритий',
                        'closed' => 'Закритий'
                    ][$state] ?? $state)
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
            'index' => Pages\ListPlayerSeriesRegistrations::route('/'),
            'create' => Pages\CreatePlayerSeriesRegistration::route('/create'),
            'edit' => Pages\EditPlayerSeriesRegistration::route('/{record}/edit'),
        ];
    }
}
