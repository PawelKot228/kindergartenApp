<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SchoolResource\Pages;
use App\Filament\Resources\SchoolResource\RelationManagers;
use App\Models\School;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SchoolResource extends Resource
{
    protected static ?string $model = School::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(['default' => 1, 'md' => 2])
                    ->schema([
                        Forms\Components\TextInput::make('name')->required()->maxLength(255),
                    ]),
                Forms\Components\Grid::make(['default' => 1, 'md' => 2])
                    ->schema([
                        Forms\Components\TextInput::make('street')->required()->maxLength(255),
                        Forms\Components\TextInput::make('street_number')->required()->maxLength(255),
                        Forms\Components\TextInput::make('zip_code')->required()->maxLength(255),
                        Forms\Components\TextInput::make('city')->required()->maxLength(255),
                        Forms\Components\TextInput::make('email')->email()->maxLength(255),
                        Forms\Components\TextInput::make('phone')->numeric(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('street'),
                Tables\Columns\TextColumn::make('street_number'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('zip_code'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSchools::route('/'),
            'create' => Pages\CreateSchool::route('/create'),
            'edit' => Pages\EditSchool::route('/{record}/edit'),
        ];
    }
}
