<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionResource\Pages;
use App\Filament\Resources\CompetitionResource\RelationManagers;
use App\Models\Competition;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CompetitionResource extends Resource
{
    protected static ?string $model = Competition::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = "Sayembara";
    protected static ?string $pluralLabel = "Daftar sayembara";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('is_opened')
                    ->label('Buka sayembara ini?'),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nama Lomba')
                    ->maxLength(255),
                Forms\Components\TextInput::make('title')
                    ->label('Judul di web')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('intro_text')
                    ->label('Intro')
                    ->helperText('Ditampilkan saat awal registrasi')
                    ->required(),
                Forms\Components\RichEditor::make('outro_text')
                    ->label('Outro')
                    ->helperText('Ditampilkan saat selesai registrasi')
                    ->required(),
                Forms\Components\TextInput::make('nominal')
                    ->label('Nominal yang harus dibayar')
                    ->helperText('HARUS Berisi kode digit terakhir')
                    ->required(),
                Forms\Components\TextInput::make('last_digit')
                    ->label('Kode digit terakhir')
                    ->required(),
                Forms\Components\Toggle::make('multiple_registration')
                    ->label('Bisa daftar bertim?')
                    ->required(),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\BooleanColumn::make('is_opened')->label('Pendaftaran dibuka'),
                Tables\Columns\TextColumn::make('name')->label('Nama lomba'),
                Tables\Columns\TextColumn::make('title')->label('Judul di website'),
                Tables\Columns\TextColumn::make('nominal')->label('Nominal transfer'),
                Tables\Columns\BooleanColumn::make('multiple_registration')->label('Bisa daftar bertim'),
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
            'index' => Pages\ListCompetitions::route('/'),
            'create' => Pages\CreateCompetition::route('/create'),
            'edit' => Pages\EditCompetition::route('/{record}/edit'),
        ];
    }
}
