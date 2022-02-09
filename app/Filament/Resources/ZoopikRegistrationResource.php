<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZoopikRegistrationResource\Pages;
use App\Filament\Resources\ZoopikRegistrationResource\RelationManagers;
use App\Models\ZoopikRegistration;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ZoopikRegistrationResource extends Resource
{
    protected static ?string $model = ZoopikRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $navigationGroup = "Pendaftaran";
    protected static ?string $pluralLabel = "Pendaftar Zoopik";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->label('Nama lengkap')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nrp')
                    ->required()
                    ->label('NRP peserta')
                    ->maxLength(255),
                Forms\Components\TextInput::make('asalUniv')
                    ->required()
                    ->label('Asal universitas')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('path_img_ktm')
                    ->label('Foto KTM')
                    ->disk('public')
                    ->image()
                    ->directory('img/zoopikRegistration/ktm'),
                Forms\Components\FileUpload::make('path_img_foto')
                    ->label('Pas Foto 3x4')
                    ->required()
                    ->disk('public')
                    ->image()
                    ->directory('img/zoopikRegistration/foto3x4'),
                Forms\Components\FileUpload::make('path_img_bukti_transfer')
                    ->required()
                    ->label('Foto Bukti Transfer')
                    ->disk('public')
                    ->image()
                    ->directory('img/zoopikRegistration/buktiTransfer')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')->label('Nama lengkap'),
                Tables\Columns\TextColumn::make('nrp')->label('NRP'),
                Tables\Columns\TextColumn::make('asalUniv')->label('Asal Universitas'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListZoopikRegistrations::route('/'),
            'create' => Pages\CreateZoopikRegistration::route('/create'),
            'edit' => Pages\EditZoopikRegistration::route('/{record}/edit'),
        ];
    }
}
