<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlayerTeamResource\Pages;
use App\Filament\Resources\PlayerTeamResource\RelationManagers;
use App\Models\PlayerTeam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlayerTeamResource extends Resource
{
    protected static ?string $model = PlayerTeam::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('player_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('player_number')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('team_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('player_number')
                    ->label('Номер гравця')
                    ->type('number')
                    ->minValue(0)
                    ->maxValue(99)
                    ->numeric()
                    ->nullable(),   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('player_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('player_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('player_number')
                    ->label('Номер')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListPlayerTeams::route('/'),
            'create' => Pages\CreatePlayerTeam::route('/create'),
            'edit' => Pages\EditPlayerTeam::route('/{record}/edit'),
        ];
    }
}
