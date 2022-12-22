<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChildGroupResource\Pages;
use App\Filament\Resources\ChildGroupResource\RelationManagers;
use App\Models\ChildGroup;
use Filament\Forms;
use Filament\Pages\Actions\DeleteAction;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ChildGroupResource extends Resource
{
    protected static ?string $model = ChildGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('school')
                    ->relationship('school', 'name')
                    ->required(),
                Forms\Components\Select::make('employee')
                    ->relationship('employee', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')->required()->maxLength(255),
                Forms\Components\TextInput::make('capacity')->required()->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school.name'),
                Tables\Columns\TextColumn::make('employee.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('capacity'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListChildGroups::route('/'),
            'create' => Pages\CreateChildGroup::route('/create'),
            'edit' => Pages\EditChildGroup::route('/{record}/edit'),
        ];
    }
}
