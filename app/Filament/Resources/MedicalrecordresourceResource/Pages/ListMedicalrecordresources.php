<?php

namespace App\Filament\Resources\MedicalrecordresourceResource\Pages;

use App\Filament\Resources\MedicalrecordresourceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMedicalrecordresources extends ListRecords
{
    protected static string $resource = MedicalrecordresourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
