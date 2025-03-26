<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerResource\Pages;
use App\Filament\Resources\PlayerResource\RelationManagers;
use App\Models\Player;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;


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
                Select::make('user_id')
                    ->label('Користувач')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Прізвище'),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Ім\'я'),
                PhoneInput::make('phone')
                    ->required()
                    ->validateFor(
                        country: 'UA', // default: 'AUTO'
                        lenient: true, // default: false
                    )
                    ->onlyCountries(['ua'])
                    ->label('Телефон'),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->maxSize(2048)
                    ->directory('img/avatars')
                    ->deleteUploadedFileUsing(fn ($record) => 
                        $record->photo ? unlink(storage_path('app/public/' . $record->photo)) : null
                    ),
                Forms\Components\TextInput::make('rating')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(10)
                        ->label('Рейтинг'),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('День народження'),

            ])->columns(3);
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
                    ->searchable(), 
                Tables\Columns\TextColumn::make('last_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('photo')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->label('Фото'), 
                Tables\Columns\TextColumn::make('birth_date')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
