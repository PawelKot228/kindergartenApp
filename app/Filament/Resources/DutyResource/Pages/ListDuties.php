<?php

namespace App\Filament\Resources\DutyResource\Pages;

use App\Filament\Resources\DutyResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDuties extends ListRecords
{
    protected static string $resource = DutyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
