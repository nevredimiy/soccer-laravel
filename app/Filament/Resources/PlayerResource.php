<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Filament\Resources\PlayerResource\RelationManagers;
use App\Models\Player;
use App\Models\User;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;
use Illuminate\Validation\Rule;
use Filament\Forms\Components\Section;


class PlayerResource extends Resource
{
    protected static ?string $model = Player::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Дані матчів';
    
    protected static ?string $navigationLabel = 'Гравці';
    
    protected static ?string $pluralModelLabel = 'Гравці';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основні дані')
                ->schema([
                    Select::make('user_id')
                        ->label('Користувач')
                        ->options(User::all()->pluck('name', 'id'))
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpan([
                            'sm' => 2,
                        ]),

                    Forms\Components\TextInput::make('last_name')
                        ->required()
                        ->maxLength(255)
                        ->label('Прізвище')
                        ->columnSpan([
                            'sm' => 2,
                        ]),
                    Forms\Components\TextInput::make('first_name')
                        ->required()
                        ->maxLength(255)
                        ->label('Ім\'я')
                        ->columnSpan([
                            'sm' => 2,
                        ]),
                ])->columns(6),
                PhoneInput::make('phone')
                    ->required()
                    ->validateFor(
                        country: 'UA', // default: 'AUTO'
                        lenient: true, // default: false
                    )
                    ->onlyCountries(['ua'])
                    ->label('Телефон')
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Forms\Components\TextInput::make('tg')
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->label('Телеграм')
                    ->columnSpan([
                        'sm' => 2,
                    ]),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('День народження')
                    ->columnSpan([
                        'sm' => 2,
                    ]),
               
                Select::make('status')
                    ->label('Статус')
                    ->options([
                        'main' => 'Основний',
                        'reserve' => 'Резервний'
                    ])
                    ->searchable()
                    ->default('reserve')                 
                    ->required(),
                Select::make('teams')
                    ->multiple()
                    ->label('Команда')
                    ->relationship('teams', 'name')
                    ->options(
                        Team::orderBy('id', 'desc')->get()->mapWithKeys(function ($team) {
                            return [
                                $team->id => "{$team->name} ({$team->id})"
                            ];
                        })
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('number')
                    ->label('Номер гравця')
                    ->type('number')
                    ->minValue(0)
                    ->maxValue(99)
                    ->numeric()
                    ->nullable(),                
                Forms\Components\TextInput::make('rating')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(10)
                        ->label('Рейтинг'),
               
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->maxSize(2048)
                    ->directory('img/avatars')
                    ->deleteUploadedFileUsing(fn ($record) => 
                        $record->photo ? unlink(storage_path('app/public/' . $record->photo)) : null
                    )
                    ->columnSpan([
                        'sm' => 2,
                    ]),

            ])->columns(6);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Користувач') 
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('last_name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('first_name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('teams.name')                    
                    ->label('Назва команди')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->teams
                            ->map(fn ($team) => "{$team->name} ({$team->id})")
                            ->implode(', ');
                    }),
                    
                TextColumn::make('number')
                    ->label('Номер')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Статус') 
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tg')
                    ->searchable()
                    ->label('Телеграм')
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('photo')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->label('Фото')
                    ->toggleable(isToggledHiddenByDefault: true), 
                TextColumn::make('birth_date')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('rating')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
