<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DriveLinkResource\Pages;
use App\Filament\Resources\DriveLinkResource\RelationManagers;
use App\Models\DriveLink;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class DriveLinkResource extends Resource
{
    protected static ?string $model = DriveLink::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = "Sayembara";
    protected static ?string $pluralLabel = "Link Google Drive";
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('names')->label('Nama'),
                Tables\Columns\TextColumn::make('google_drive_link')->label('Link Google Drive'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
           
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDriveLinks::route('/'),
            'create' => Pages\CreateDriveLink::route('/create'),
            'edit' => Pages\EditDriveLink::route('/{record}/edit'),
        ];
    }
}
