<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShortCinematicResource\Pages;
use App\Filament\Resources\ShortCinematicResource\RelationManagers;
use App\Models\ShortCinematic;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ShortCinematicResource extends Resource
{
    protected static ?string $model = ShortCinematic::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('deskripsi')->label('Deskripsi')->required(),
                Forms\Components\TextInput::make('youtube_link')->label('Embed Youtube')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('deskripsi')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('youtube_link')->label('Embed Youtube'),
                Tables\Columns\TextColumn::make('updated_at')->label('Waktu'),
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
            'index' => Pages\ListShortCinematics::route('/'),
            'create' => Pages\CreateShortCinematic::route('/create'),
            'edit' => Pages\EditShortCinematic::route('/{record}/edit'),
        ];
    }
}
