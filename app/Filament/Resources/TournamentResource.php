<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TournamentResource\Pages;
use App\Filament\Resources\TournamentResource\RelationManagers;
use App\Models\Tournament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    protected static ?string $navigationGroup = 'Дані матчів';

    protected static ?string $navigationLabel = 'Турнири';
    
    protected static ?string $pluralModelLabel = 'Список турнірів';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->label('Тип турніра')
                    ->options([
                        'team' => 'Командний',
                        'solo' => 'Індивідуальний',
                        'solo_private' => 'Індивідуальний (приватний)',
                    ])
                    ->default('team')
                    ->required(),
                Forms\Components\Select::make('subtype')
                    ->label('Підтип турніра')
                    ->options([
                        'one-day' => 'Одноденний',
                        'regular' => 'Регулярний',
                    ])
                    ->default('regular')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('name')
                    ->label('Назва турніру')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Тип турніра')
                    ->formatStateUsing(function ($state) {
                        switch ($state) {
                            case 'team' : 
                                return 'Командний';
                            case 'solo': 
                                return 'Індивідуальний';
                            default:
                            return 'Індивідуальний (приватний)';
                    }
                    })
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
            'index' => Pages\ListTournaments::route('/'),
            'create' => Pages\CreateTournament::route('/create'),
            'view' => Pages\ViewTournament::route('/{record}'),
            'edit' => Pages\EditTournament::route('/{record}/edit'),
        ];
    }
}
