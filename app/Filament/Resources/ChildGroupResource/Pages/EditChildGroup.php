<?php

namespace App\Filament\Resources\ChildGroupResource\Pages;

use App\Filament\Resources\ChildGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChildGroup extends EditRecord
{
    protected static string $resource = ChildGroupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
