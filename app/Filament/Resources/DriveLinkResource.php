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
                Forms\Components\Fieldset::make('Submisi lomba')->schema([
                    Forms\Components\TextInput::make('google_drive_link')
                        ->label('Link google drive')
                        ->required()
                        ->maxLength(500)
                        ->columnSpan(2),
                    Forms\Components\FileUpload::make('caption')
                        ->label('Caption')
                        ->disk('private')
                        ->directory('captions')
                        ->visibility('private'),

                    Forms\Components\FileUpload::make('originality_statement')
                        ->label('Lembar orisinalitas')
                        ->disk('private')
                        ->directory('statements')
                        ->visibility('private'),
                ]),
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
