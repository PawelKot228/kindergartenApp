<?php

namespace App\Filament\Resources;

use App\Enums\AbsenceTypeEnum;
use App\Filament\Resources\ChildAbsenceResource\Pages;
use App\Filament\Resources\ChildAbsenceResource\RelationManagers;
use App\Models\ChildAbsence;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ChildAbsenceResource extends Resource
{
    protected static ?string $model = ChildAbsence::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        $types = collect(AbsenceTypeEnum::cases())
            ->mapWithKeys(
                fn(AbsenceTypeEnum $absenceType): array => [
                    $absenceType->name => trans("admin.absence.$absenceType->value"),
                ])
            ->toArray();

        return $form
            ->schema([
                Forms\Components\Select::make('child')
                    ->relationship('child', 'name')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options($types)
                    ->required(),

                Forms\Components\DatePicker::make('date_from')
                    ->required()
                    ->beforeOrEqual('date_to'),
                Forms\Components\DatePicker::make('date_to')
                    ->required()
                    ->afterOrEqual('date_from'),

                Forms\Components\Textarea::make('reason')
                    ->required()
                    ->maxLength(500),
                Forms\Components\Textarea::make('comment')
                    ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        $types = collect(AbsenceTypeEnum::cases())
            ->mapWithKeys(
                fn(AbsenceTypeEnum $absenceType): array => [
                    $absenceType->name => trans("admin.absence.$absenceType->value"),
                ])
            ->toArray();

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('child.name')->label(trans('admin.label.name')),
                Tables\Columns\TextColumn::make('child.surname')->label(trans('admin.label.surname')),
                Tables\Columns\TextColumn::make('type')->weight('bold'),
                Tables\Columns\TextColumn::make('reason')->words(40)->limit(120)->wrap(),
                Tables\Columns\TextColumn::make('comment')->words(40)->limit(120)->wrap(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('child')
                    ->relationship('child', 'name'),
                Tables\Filters\SelectFilter::make('type')
                    ->options($types),
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
            'index' => Pages\ListChildAbsences::route('/'),
            'create' => Pages\CreateChildAbsence::route('/create'),
            'edit' => Pages\EditChildAbsence::route('/{record}/edit'),
        ];
    }
}
