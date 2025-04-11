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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;
use Illuminate\Validation\Rule;


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
                
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Прізвище')
                    ->columnSpan([
                        'sm' => 3,

                    ]),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Ім\'я')
                    ->columnSpan([
                        'sm' => 3,
                    ]),
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
                Select::make('user_id')
                    ->label('Користувач')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('status')
                    ->label('Статус')
                    ->options([
                        'main' => 'Основний',
                        'reserve' => 'Резервний'
                    ])
                    ->searchable()
                    ->default('reserve')                 
                    ->required(),
                Select::make('team_id')
                    ->label('Команда')
                    ->options(
                        Team::orderByDesc('id')->get()->mapWithKeys(function ($team) {
                            return [
                                $team->id => "{$team->name} - ({$team->id})"
                            ];
                        })
                    )
                    ->searchable()
                    ->preload(),
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
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Користувач') 
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('last_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('team.name')
                    ->label('Команда (ID)')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state, $record) => "{$state} ({$record->team_id})"),
                Tables\Columns\TextColumn::make('number')
                    ->label('Номер')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Статус') 
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tg')
                    ->searchable()
                    ->label('Телеграм')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('photo')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->label('Фото')
                    ->toggleable(isToggledHiddenByDefault: true), 
                Tables\Columns\TextColumn::make('birth_date')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('rating')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
