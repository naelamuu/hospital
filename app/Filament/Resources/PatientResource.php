<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationGroup = 'Pasien';

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        TextInput::make('code')->required()->label('Kode Pasien'),
                        TextInput::make('name')->required()->label('Nama Pasien'),
                    ]),
                
                DatePicker::make('date_of_birth')->required()->label('Tanggal Lahir'),
                TextInput::make('age')->label('Umur'),
                Select::make('gender')->label('Jenis Kelamin')
                ->options([
                    'male'=>'Male',
                    'female'=>'Female',
                ])->required(),
                TextInput::make('address')->required()->label('Alamat'),
                TextInput::make('number')->label('Nomor Telepon'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->label('Kode Dokter'),
                TextColumn::make('name')->label('Nama Pasien'),
                TextColumn::make('date_of_birth')->label('Tanggal Lahir'),
                TextColumn::make('age')->label('Umur'),
                TextColumn::make('gender')->label('Jenis Kelamin'),
                TextColumn::make('address')->label('Alamat'),
                TextColumn::make('number')->label('Nomor Telepon'),
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }    
}
