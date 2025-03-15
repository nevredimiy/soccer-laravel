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
                    ->preload(),
                Forms\Components\TextInput::make('last_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Прізвище'),
                Forms\Components\TextInput::make('first_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Ім\'я'),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->label('Телефон'),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('День народження'),
                Forms\Components\Select::make('position')
                    ->options([
                        'нападник' => 'Нападник',
                        'захисник' => 'Захисник',
                        'голкіпер' => 'Голкіпер',
                        'менеджер' => 'Менеджер',
                        'тренер' => 'Тренер',
                    ])
                    ->default('нападник')
                    ->native(false), 
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Користувач') 
                    ->sortable()
                    ->searchable(), 
                Tables\Columns\TextColumn::make('last_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->sortable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->sortable(),
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
            'index' => Pages\ListPlayers::route('/'),
            'create' => Pages\CreatePlayer::route('/create'),
            'edit' => Pages\EditPlayer::route('/{record}/edit'),
        ];
    }
}
