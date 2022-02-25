<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IllustrationResource\Pages;
use App\Filament\Resources\IllustrationResource\RelationManagers;
use App\Models\illustration;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class IllustrationResource extends Resource
{
    protected static ?string $model = Illustration::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('file_path')->label('Upload gambar')->required()->disk('public')->image()->directory('img/PameranIlustrasi'),
                Forms\Components\TextInput::make('name')->label('Nama pembuat')->required(),
                Forms\Components\TextInput::make('caption')->label('Caption')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('file_path')->label('Lokasi/Link gambar'),
                Tables\Columns\TextColumn::make('name')->label('Nama pembuat'),
                Tables\Columns\TextColumn::make('caption')->label('Caption'),
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
            'index' => Pages\ListIllustration::route('/'),
            'create' => Pages\CreateIllustration::route('/create'),
            'edit' => Pages\EditIllustration::route('/{record}/edit'),
        ];
    }
}
