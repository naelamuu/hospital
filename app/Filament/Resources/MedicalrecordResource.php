<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicalrecordResource\Pages;
use App\Filament\Resources\MedicalrecordResource\RelationManagers;
use App\Models\medical_record;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class MedicalrecordResource extends Resource
{
    protected static ?string $model = medical_record::class;

    protected static ?string $navigationGroup = 'Treatment';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->relationship('patient','name')->required()->label('Pasien'),
                Select::make('doctor_id')
                    ->relationship('doctor', 'name')->required()->label('Dokter'),
                DatePicker::make('record_date')->required()->label('Tanggal Rekam Medis'),
                TextInput::make('blood_type')->required()->label('Golongan Darah'),
                TextInput::make('blood_pressure')->required()->label('Tekanan Darah'),
                TextInput::make('complaint')->required()->label('Keluhan'),
                TextInput::make('diagnosa')->required()->label('Diagnosis'),
                TextInput::make('treatment')->required()->label('Tindakan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient.name')->label('Nama Pasien'),
                TextColumn::make('doctor.name')->label('Dokter'),
                TextColumn::make('record_date'),
                TextColumn::make('blood_type')->label('Golongan Darah'),
                TextColumn::make('blood_pressure')->label('Tekanan Darah'),
                TextColumn::make('complaint')->label('Keluhan'),
                TextColumn::make('diagnosa')->label('Diagnosa'),
                TextColumn::make('treatment')->label('Tindakan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListMedicalrecords::route('/'),
            'create' => Pages\CreateMedicalrecord::route('/create'),
            'edit' => Pages\EditMedicalrecord::route('/{record}/edit'),
        ];
    }    
}
