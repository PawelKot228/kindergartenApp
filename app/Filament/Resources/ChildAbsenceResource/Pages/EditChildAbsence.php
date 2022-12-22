<?php

namespace App\Filament\Resources\ChildAbsenceResource\Pages;

use App\Filament\Resources\ChildAbsenceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChildAbsence extends EditRecord
{
    protected static string $resource = ChildAbsenceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
