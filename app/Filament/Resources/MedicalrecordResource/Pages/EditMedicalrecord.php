<?php

namespace App\Filament\Resources\MedicalrecordResource\Pages;

use App\Filament\Resources\MedicalrecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicalrecord extends EditRecord
{
    protected static string $resource = MedicalrecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
