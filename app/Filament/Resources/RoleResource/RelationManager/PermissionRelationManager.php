<?php

namespace App\Filament\Resources\RoleResource\RelationManager;


use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\BelongsToManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;

class PermissionRelationManager extends BelongsToManyRelationManager
{
    protected static string $relationship = 'permissions';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('admin.label.name')),
                TextInput::make('guard_name')
                    ->label(__('admin.label.guard_name')),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('admin.label.name')),
                TextColumn::make('guard_name')
                    ->label(__('admin.label.guard_name')),
            ])
            ->filters([
                //
            ]);
    }
}
