<?php

namespace App\Filament\Resources\MedicalrecordResource\Pages;

use App\Filament\Resources\MedicalrecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicalrecords extends ListRecords
{
    protected static string $resource = MedicalrecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
