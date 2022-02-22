<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FakeCompetitionRegistrationResource\Pages;
use App\Filament\Resources\FakeCompetitionRegistrationResource\RelationManagers;
use App\Models\FakeCompetitionRegistration;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class FakeCompetitionRegistrationResource extends Resource
{
    protected static ?string $model = FakeCompetitionRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = "Voting";

    protected static ?string $pluralLabel = "Vote Standings";


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
                Tables\Columns\TextColumn::make('competition.name')
                    ->label('Nama Kompetisi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('names')
                    ->label('Nama Peserta'),
                // Tables\Columns\TextColumn::make('origins')
                //     ->label('Instansi'),
                // Tables\Columns\TextColumn::make('regions')
                //     ->label('Daerah'),
                // Tables\Columns\TextColumn::make('whatsapp_no')
                //     ->label('No.WA'),
                // Tables\Columns\TextColumn::make('line_id')
                //     ->label('ID Line'),
                
                // Tables\Columns\TextColumn::make('created_at')
                //     ->label('Tanggal daftar')
                //     ->dateTime(),
                Tables\Columns\TextColumn::make('vote_count')
                    ->label('Jumlah Vote')->sortable(),
                // Tables\Columns\TextColumn::make('competition.vote_status')
                //     ->label('Status Voting Open'),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('Berdasarkan kompetisi')
                    ->relationship('competition', 'name')
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
            'index' => Pages\ListFakeCompetitionRegistrations::route('/'),
            'create' => Pages\CreateFakeCompetitionRegistration::route('/create'),
            'edit' => Pages\EditFakeCompetitionRegistration::route('/{record}/edit'),
        ];
    }
}