<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\Tournament;
use App\Models\League;
use App\Models\Stadium;
use App\Models\TeamColor;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Matche;
use App\Models\SeriesMeta;
use Filament\Notifications\Notification;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationLabel = 'Подія';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('tournament_id')
                    ->options(
                        Tournament::orderBy('sort_order')->get()->mapWithKeys(function ($tournament) {
                            $tournamentType = $tournament->type == 'team' ? 'командний' : 'індивідуальний';
                            return [
                                $tournament->id => $tournament->name . ' (' . $tournamentType . ')',
                            ];
                        })->toArray()
                    )
                    ->searchable()
                    ->label('Турнір')
                    ->required()
                    ->columnSpan('full')
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        $tournament = Tournament::find($state);
                        if ($tournament) {                       
                            
                            // Установка количества команд в зависимости от турнира
                            $countTeams = $tournament->count_teams ?? 0;

                            $teamColors = TeamColor::all()->pluck('name')->values()->all(); // переиндексация

                            if ($tournament->team_creator == 'admin') {
                                $teams = [];
                                $teamNames = [
                                    "Синій"=>"Синіх",
                                    "Червоний"=>"Червоних",
                                    "Зелений"=>"Зелених",
                                    "Жовтий"=>"Жовтих",
                                    "Помаранчевий"=>"Помаранчевих",
                                    "Рожевий"=>"Рожевих",
                                    "Сірий"=>"Сірих",
                                    "Лаймовий"=>"Лаймових",
                                    "Голубий"=>"Блакитних",
                                ];

                                for ($i = 0; $i < $countTeams; $i++) {
                                    $colorName = $teamColors[$i] ?? null;

                                    if (!isset($teamNames[$colorName])) {
                                        continue; // пропустить, если название цвета не найдено
                                    }

                                    $teams[] = [
                                        'name' => 'Команда ' . $teamNames[$colorName],
                                        'color_id' => $i + 1,
                                    ];
                                }

                                $set('teams', $teams);
                            } else {
                                $set('teams', []);
                            }


                            $set('tournament_team_creator', $tournament->team_creator);
                            $set('is_private', $tournament->type == 'solo_private');
                        }
                    }),
    
                Section::make('Інформація Серії')
                    ->schema([

                        DateTimePicker::make('series_start_all')
                            ->label('Дата початку для всіх Серій')
                            ->reactive()
                            ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                $seriesData = $get('series_data') ?? [];
                        
                                foreach ($seriesData as $index => $_) {
                                    $seriesNumber = $index + 1;
                                    $set("series_{$seriesNumber}_start_date", $state);
                                }
                            }),
                        
                        DateTimePicker::make('series_end_all')
                            ->label('Дата кінця для всіх Серій')
                            ->reactive()
                            ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                $seriesData = $get('series_data') ?? [];
                        
                                foreach ($seriesData as $index => $_) {
                                    $seriesNumber = $index + 1;
                                    $set("series_{$seriesNumber}_end_date", $state);
                                }
                            }),

                        // Цена для всех серий
                        TextInput::make('series_price_all')
                            ->label('Ціна для всіх Серій')
                            ->numeric()
                            ->reactive()
                            ->debounce(500)
                            ->afterStateUpdated(function (callable $set, callable $get, $state) {
                                $seriesData = $get('series_data') ?? [];
                        
                                foreach ($seriesData as $index => $_) {
                                    $seriesNumber = $index + 1;
                                    $set("series_{$seriesNumber}_price", $state);
                                }
                            }),
                        Select::make('stadium_id')
                            ->label('Стадіон для всіх Серій')
                            ->options(function () {
                                return Stadium::with(['location.district.city'])->get()->mapWithKeys(function ($stadium) {
                                    $location = $stadium->location;
                                    $district = $location?->district;
                                    $city = $district?->city;
                                    $label = $stadium->name;
                                    if ($location) $label .= ' - ' . $location->address;
                                    if ($district) $label .= ' - ' . $district->name;
                                    if ($city) $label .= ' - ' . $city->name;
                                    return [$stadium->id => $label];
                                });
                            })
                            ->searchable()
                            ->default(1),
                        Select::make('league_id')
                            ->label('Ліга для всіх Серій')
                            ->options(League::all()->pluck('name', 'id'))
                            ->searchable(),
    
                        Select::make('format')
                            ->options(['5x5x5' => '5x5x5', '4x4x4' => '4x4x4', '9x9x9' => '9x9x9'])
                            ->default('5x5x5')
                            ->dehydrated()
                            ->label('Формат'),    
                        Select::make('size_field')
                            ->options(['40x20' => '40x20', '60x40' => '60x40'])
                            ->default('40x20')
                            ->dehydrated()
                            ->label('Розмір стадіона'),    
                        TextInput::make('price')
                            ->numeric()
                            ->inputMode('decimal')
                            ->label('Ціна Першого Внесення при створенні команди гравцем')
                            ->visible(fn (callable $get) => $get('tournament_team_creator') === 'player'),
                        TextInput::make('access_code')
                            ->label('Код доступу для створення команди')
                            ->numeric()
                            ->inputMode('numeric') // важно для мобильных устройств
                            ->maxLength(4)
                            ->rules(['nullable', 'digits:4'])
                            ->visible(fn (callable $get) => $get('is_private')),
                        
                            
                    ])->columns(3),
                // Секция для команд. Количество команд зависит от турнира
                Forms\Components\Repeater::make('teams')
                    ->label('Команды')
                    ->hidden(fn ($get) => empty($get('teams')))
                    ->schema([
                        TextInput::make('name')
                            ->label('Название команды')
                            ->required(),
                        Select::make('color_id')
                            ->label('Цвет команды')
                            ->options(TeamColor::all()->pluck('name', 'id'))
                            ->required(),
                    ])
                    ->disableItemDeletion()
                    ->disableItemCreation()
                    ->disableItemMovement()
                    ->default([])
                    ->columns(2),
                    
               
            ])
            ->columns('full');
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tournament.name')                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time'),
                Tables\Columns\TextColumn::make('end_time')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('format')
                    ->label('Формат')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('size_field')
                    ->label('Розмір поля')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('stadium.name')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                
                Tables\Columns\TextColumn::make('league.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->numeric(decimalPlaces: 0)
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Action::make('createMatches')
                    ->label('Генерувати матчі')
                    ->icon('heroicon-m-calendar-days')
                    ->action(fn (Event $record, array $data) => static::handleMatchGeneration($record, $data))
                    ->form(fn (Event $record) => static::getMatchFormSchema($record)),
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

    public static function getMatchFormSchema(Event $record): array
    {
        $seriesCount = match ($record->format_scheme) {
            3 => 1,
            4 => 1,
            6 => 2,
            9 => 3,
            default => 1,
        };

        $form = [];

        for ($i = 1; $i <= $seriesCount; $i++) {
            $form[] = Fieldset::make("Серія $i")
            ->schema([
                DateTimePicker::make("series_date_$i")
                    ->label("Дата початку Серії $i")
                    ->required()
                    ->seconds(false),
                TextInput::make("series_price_$i")
                    ->label("Ціна Серії $i")
                    ->numeric()
                    ->required(),
            ])
            ->columns(2); // Показывает дату и цену в одной строке
        }

        return $form;
    }



    public static function handleMatchGeneration(Event $event, array $data): void
    {
        $seriesCount = match ($event->format_scheme) {
            3 => 1,
            4 => 1,
            6 => 2,
            9 => 3,
            default => 1,
        };

        $teamIds = $event->teams()->pluck('id')->toArray();

        // Генерация матчей
        for ($i = 1; $i <= $seriesCount; $i++) {
            $startDate = $data["series_date_$i"];
            $price = $data["series_price_$i"];

            // Сохраняем серию в таблицу series_metas
            $seriesMeta = SeriesMeta::create([
                'event_id' => $event->id,
                'date' => $startDate,
                'series' => $i,
                'price' => $price,
            ]);

            self::generateSeriesMatches($event, $startDate, $i, $teamIds);
        }

    }

    public static function generateSeriesMatches($event, $startDate, $seriesIndex, $teamIds)
    {
        // Шаблон матчей в туре на 15 игр.
        $matches = [
            [0, 1],
            [0, 2],
            [1, 2],
            [1, 0],
            [2, 0],
            [2, 1],
            [0, 1],
            [0, 2],
            [1, 2],
            [1, 0],
            [2, 0],
            [2, 1],
            [0, 1],
            [0, 2],
            [1, 2],
        ];
        

        $startDate = Carbon::parse($startDate);

        $subtype = $event->tournament->subtype;
    
        // Генерация для однодневного или регулярного турнира с форматом 4
        if ($event->format_scheme == 3) {
         
            // Шаблон троек команд (3 команды — 12 туров)
            $seriesTemplate = [
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[1], $teamIds[2]],
            ];
            $tours = array_merge($seriesTemplate, $seriesTemplate, $seriesTemplate);
    
            foreach ($tours as $index => $teamSet) {
                $round = $index + 1;
                $seriesNumber = 1;
    
                $date = $subtype === 'one-day'
                    ? $startDate
                    : $startDate->copy()->addWeeks($index);    
    
                foreach ($matches as [$team1, $team2]) {
                    \App\Models\Matche::create([
                        'event_id' => $event->id,
                        'team1_id' => $teamSet[$team1],
                        'team2_id' => $teamSet[$team2],
                        'start_time' => $date->format('Y-m-d H:i:s'),
                        'series' => $seriesNumber,
                        'round' => $round,
                    ]);
                }
            }

            Notification::make()
                ->title('Матчі серії '. $seriesIndex .' згенеровані')
                ->success()
                ->send();
     
            // Notification::make()
            //     ->title('НЕЗГЕНЕРОВАНО, матчі серії '. $seriesIndex)
            //     ->body('Вони вже створені раніше.')
            //     ->warning()
            //     ->send();
     
        } 

        // Генерация для однодневного или регулярного турнира с форматом 4
        if ($event->format_scheme == 4) {
         
            // Шаблон троек команд (4 команды — 12 туров)
            $seriesTemplate = [
                [$teamIds[0], $teamIds[1], $teamIds[2]],
                [$teamIds[0], $teamIds[1], $teamIds[3]],
                [$teamIds[0], $teamIds[2], $teamIds[3]],
                [$teamIds[1], $teamIds[2], $teamIds[3]],
            ];
            $tours = array_merge($seriesTemplate, $seriesTemplate, $seriesTemplate);
    
            foreach ($tours as $index => $teamSet) {
                $round = $index + 1;
                $seriesNumber = 1;
    
                $date = $subtype === 'one-day'
                    ? $startDate
                    : $startDate->copy()->addWeeks($index);    
    
                foreach ($matches as [$team1, $team2]) {
                    \App\Models\Matche::create([
                        'event_id' => $event->id,
                        'team1_id' => $teamSet[$team1],
                        'team2_id' => $teamSet[$team2],
                        'start_time' => $date->format('Y-m-d H:i:s'),
                        'series' => $seriesNumber,
                        'round' => $round,
                    ]);
                }
            }

            Notification::make()
                ->title('Матчі серії '. $seriesIndex .' згенеровані')
                ->success()
                ->send();
     
            // Notification::make()
            //     ->title('НЕЗГЕНЕРОВАНО, матчі серії '. $seriesIndex)
            //     ->body('Вони вже створені раніше.')
            //     ->warning()
            //     ->send();
     
        } 

        // Генерация для однодневного или регулярного турнира с форматом 4
        if ($event->format_scheme == 6) {    

            if($seriesIndex == 1) {
                $series = [
                    [$teamIds[0], $teamIds[1], $teamIds[2]],
                    [$teamIds[4], $teamIds[1], $teamIds[3]],
                    [$teamIds[3], $teamIds[4], $teamIds[2]],
                    [$teamIds[5], $teamIds[1], $teamIds[2]],
                    [$teamIds[4], $teamIds[2], $teamIds[1]],
                    [$teamIds[1], $teamIds[3], $teamIds[0]],
                    [$teamIds[5], $teamIds[1], $teamIds[3]],
                    [$teamIds[3], $teamIds[2], $teamIds[0]],
                    [$teamIds[1], $teamIds[0], $teamIds[4]],
                    [$teamIds[5], $teamIds[4], $teamIds[0]],
                ];
            } else {
                $series = [
                    [$teamIds[3], $teamIds[4], $teamIds[5]],
                    [$teamIds[0], $teamIds[2], $teamIds[5]],
                    [$teamIds[5], $teamIds[0], $teamIds[1]],
                    [$teamIds[3], $teamIds[4], $teamIds[0]],
                    [$teamIds[0], $teamIds[3], $teamIds[5]],
                    [$teamIds[2], $teamIds[5], $teamIds[4]],
                    [$teamIds[0], $teamIds[4], $teamIds[2]],
                    [$teamIds[4], $teamIds[1], $teamIds[5]],
                    [$teamIds[2], $teamIds[5], $teamIds[3]],
                    [$teamIds[1], $teamIds[3], $teamIds[2]],
                ];    
            }    

            foreach ($series as $index => $teamSet) {
                $round = $index + 1;

                $date = $subtype === 'one-day'
                    ? $startDate
                    : $startDate->copy()->addWeeks($index);

                foreach ($matches as [$team1, $team2]) {
                    \App\Models\Matche::create([
                        'event_id' => $event->id,
                        'team1_id' => $teamSet[$team1],
                        'team2_id' => $teamSet[$team2],
                        'start_time' => $date->format('Y-m-d H:i:s'),
                        'series' => $seriesIndex,
                        'round' => $round,
                    ]);
                }
            }
    
            Notification::make()
                ->title('Матчі серії '. $seriesIndex .' згенеровані')
                ->success()
                ->send();
            // }else {
            //     Notification::make()
            //         ->title('НЕЗГЕНЕРОВАНО, матчі серії '. $seriesIndex)
            //         ->body('Вони вже створені раніше.')
            //         ->warning()
            //         ->send();
            // }
        } 

        // Генерация для однодневного или регулярного турнира с форматом 4
        if ($event->format_scheme == 9) {

            if($seriesIndex == 1) {
                $series = [
                    [$teamIds[0], $teamIds[1], $teamIds[2]],
                    [$teamIds[0], $teamIds[3], $teamIds[6]],
                    [$teamIds[0], $teamIds[4], $teamIds[8]],
                    [$teamIds[0], $teamIds[5], $teamIds[7]],
                    [$teamIds[1], $teamIds[2], $teamIds[3]],
                    [$teamIds[1], $teamIds[4], $teamIds[7]],
                    [$teamIds[1], $teamIds[5], $teamIds[0]],
                    [$teamIds[1], $teamIds[6], $teamIds[8]],
                    [$teamIds[2], $teamIds[3], $teamIds[4]],
                    [$teamIds[2], $teamIds[5], $teamIds[6]],
                    [$teamIds[2], $teamIds[6], $teamIds[1]],
                    [$teamIds[2], $teamIds[7], $teamIds[0]],
                ];
            } elseif($seriesIndex == 2) {
                $series = [
                    [$teamIds[3], $teamIds[4], $teamIds[5]],
                    [$teamIds[1], $teamIds[4], $teamIds[7]],
                    [$teamIds[1], $teamIds[5], $teamIds[6]],
                    [$teamIds[1], $teamIds[3], $teamIds[8]],
                    [$teamIds[4], $teamIds[5], $teamIds[6]],
                    [$teamIds[2], $teamIds[5], $teamIds[8]],
                    [$teamIds[2], $teamIds[6], $teamIds[7]],
                    [$teamIds[2], $teamIds[4], $teamIds[0]],
                    [$teamIds[5], $teamIds[6], $teamIds[7]],
                    [$teamIds[3], $teamIds[6], $teamIds[0]],
                    [$teamIds[3], $teamIds[7], $teamIds[8]],
                    [$teamIds[3], $teamIds[5], $teamIds[1]],
                ];    
            } else {
                $series = [
                    [$teamIds[6], $teamIds[7], $teamIds[8]],
                    [$teamIds[2], $teamIds[5], $teamIds[8]],
                    [$teamIds[2], $teamIds[3], $teamIds[7]],
                    [$teamIds[2], $teamIds[4], $teamIds[6]],
                    [$teamIds[7], $teamIds[8], $teamIds[0]],
                    [$teamIds[3], $teamIds[6], $teamIds[0]],
                    [$teamIds[3], $teamIds[4], $teamIds[8]],
                    [$teamIds[3], $teamIds[5], $teamIds[7]],
                    [$teamIds[8], $teamIds[0], $teamIds[1]],
                    [$teamIds[4], $teamIds[7], $teamIds[1]],
                    [$teamIds[4], $teamIds[5], $teamIds[0]],
                    [$teamIds[4], $teamIds[6], $teamIds[8]],
                ];    
            }         

            foreach ($series as $index => $teamSet) {
                $round = $index + 1;

                $date = $subtype === 'one-day'
                    ? $startDate
                    : $startDate->copy()->addWeeks($index);

                foreach ($matches as [$team1, $team2]) {
                    \App\Models\Matche::create([
                        'event_id' => $event->id,
                        'team1_id' => $teamSet[$team1],
                        'team2_id' => $teamSet[$team2],
                        'start_time' => $date->format('Y-m-d H:i:s'),
                        'series' => $seriesIndex,
                        'round' => $round
                    ]);
                }
            }

            Notification::make()
                ->title('Матчі серії '. $seriesIndex .' згенеровані')
                ->success()
                ->send();

                // Notification::make()
                //     ->title('НЕЗГЕНЕРОВАНО, матчі серії '. $seriesIndex)
                //     ->body('Вони вже створені раніше.')
                //     ->warning()
                //     ->send();
        }
    } 
}
