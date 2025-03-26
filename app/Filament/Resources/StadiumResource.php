<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StadiumResource\Pages;
use App\Filament\Resources\StadiumResource\RelationManagers;
use App\Models\Stadium;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;

class StadiumResource extends Resource
{
    protected static ?string $model = Stadium::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Стадіони';
    
    protected static ?string $pluralModelLabel = 'Список стадіонів';
    
    protected static ?string $navigationGroup = 'Дані матчів';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Назва'),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255)
                    ->label('Адреса'),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('img/stadium')
                    ->default('/img/stadium/stadium_placeholder.png')
                    ->label('Фото'),
                PhoneInput::make('phone')
                    ->onlyCountries(['ua']),
                Forms\Components\TextInput::make('fields_40x20')
                    ->numeric()
                    ->default(0)
                    ->label('Полів 40х20 (шт.)'),
                Forms\Components\TextInput::make('fields_60x40')
                    ->numeric()
                    ->default(0)
                    ->label('Поле 60х40 (шт.)'),
                Forms\Components\TextInput::make('parking_spots')
                    ->numeric()
                    ->default(0)
                    ->label('Парковчні місця'),
                Forms\Components\Toggle::make('has_shower')
                    ->label('Наявність душа'),
                Forms\Components\Toggle::make('has_speaker_system')
                    ->label('Наявність гучномовця'),
                Forms\Components\Toggle::make('has_wardrobe')
                    ->label('Наявність гардеробу'),
                Forms\Components\Toggle::make('has_toilet')
                    ->label('Наявність туалету'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Назва'),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->label('Адреса'),
                Tables\Columns\ImageColumn::make('photo')
                    ->searchable()
                    ->label('Фото'),                    
                    Tables\Columns\TextColumn::make('phone')
                    ->label('Телефон'),
                Tables\Columns\TextColumn::make('fields_40x20')
                    ->numeric()
                    ->sortable()
                    ->label('Поле 40х20'),
                Tables\Columns\TextColumn::make('fields_60x40')
                    ->numeric()
                    ->sortable()
                    ->label('Поле 60х40'),
                Tables\Columns\TextColumn::make('parking_spots')
                    ->numeric()
                    ->sortable()
                    ->label('Парковки'),
                Tables\Columns\IconColumn::make('has_shower')
                    ->boolean()
                    ->label('Душ'),
                Tables\Columns\IconColumn::make('has_speaker_system')
                    ->boolean()
                    ->label('Гучномовець'),
                Tables\Columns\IconColumn::make('has_wardrobe')
                    ->boolean()
                    ->label('Гардероб'),
                Tables\Columns\IconColumn::make('has_toilet')
                    ->boolean()
                    ->label('Туалет'),
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
            'index' => Pages\ListStadia::route('/'),
            'create' => Pages\CreateStadium::route('/create'),
            'view' => Pages\ViewStadium::route('/{record}'),
            'edit' => Pages\EditStadium::route('/{record}/edit'),
        ];
    }
}
