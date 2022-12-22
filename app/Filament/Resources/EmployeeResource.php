<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make([
                    'default' => 1,
                    'md' => 2,
                ])->schema([
                    Forms\Components\Select::make('duties')
                        ->multiple()
                        ->relationship('duties', 'title'),
                ]),

                Forms\Components\Grid::make([
                    'default' => 1,
                    'md' => 2,
                ])->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('surname')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('contract_start_date')
                        ->required()
                        ->after(now()),
                    Forms\Components\DatePicker::make('birthday')
                        ->required()
                        ->rules(['required', 'date']),

                ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('surname'),
                Tables\Columns\TextColumn::make('contract_start_date')->date(),
                Tables\Columns\TextColumn::make('birthday')->date(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
