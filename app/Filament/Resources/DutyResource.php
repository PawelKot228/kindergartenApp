<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DutyResource\Pages;
use App\Filament\Resources\DutyResource\RelationManagers;
use App\Models\Duty;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class DutyResource extends Resource
{
    protected static ?string $model = Duty::class;
    protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('title'),
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
            'index' => Pages\ListDuties::route('/'),
            'create' => Pages\CreateDuty::route('/create'),
            'edit' => Pages\EditDuty::route('/{record}/edit'),
        ];
    }
}
