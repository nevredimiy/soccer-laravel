<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MatcheResource\Pages;
use App\Filament\Resources\MatcheResource\RelationManagers;
use App\Models\Matche;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('tournament_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('team_home_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('team_away_id')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('match_date')
                    ->required(),
                Forms\Components\TextInput::make('score_home')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('score_away')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tournament_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team_home_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team_away_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('match_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score_home')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('score_away')
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
