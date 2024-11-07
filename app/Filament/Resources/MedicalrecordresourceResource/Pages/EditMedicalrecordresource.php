<?php

namespace App\Filament\Resources\MedicalrecordresourceResource\Pages;

use App\Filament\Resources\MedicalrecordresourceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicalrecordresource extends EditRecord
{
    protected static string $resource = MedicalrecordresourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
