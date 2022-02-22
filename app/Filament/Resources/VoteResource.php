<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VoteResource\Pages;
use App\Filament\Resources\VoteResource\RelationManagers;
use App\Models\Vote;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Database\Eloquent\Builder;

class VoteResource extends Resource
{
    protected static ?string $model = Vote::class;

    protected static ?string $navigationGroup = "Voting";

    protected static ?string $pluralLabel = "Recent Votes";


    protected static ?string $navigationIcon = 'heroicon-o-collection';

    // public static function form(Form $form): Form
    // {
    //     return $form
    //         ->schema([
    //             //
    //         ]);
    // }

    public static function table(Table $table): Table
    {
        // dd( Vote::join('fake_competition_registrations', 'fake_competition_registrations.id', '=', 'votes.fake_competition_registration_id')
        // ->join('competitions', 'competitions.id', '=', 'fake_competition_registrations.competition_id')
        // ->select('competitions.name')->distinct()->toSql());
        // dd(Tables\Filters\SelectFilter::make('Berdasarkan Lomba')->query(function (Builder $query) {
        //     return $query->join('fake_competition_registrations', 'fake_competition_registrations.id', '=', 'votes.fake_competition_registration_id')
        //         ->join('competitions', 'competitions.id', '=', 'fake_competition_registrations.competition_id')
        //         ->select('competitions.name')->distinct()->get();
        // }));
        // dd(Tables\Filters\SelectFilter::make('Berdasarkan Partisipan')->relationship('fake_competition_registration', 'names'));
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('fake_competition_registration.competition_id')->label('ID Lomba'),
                // Tables\Columns\TextColumn::make('user_id')->label('ID Voter'),
                // Tables\Columns\TextColumn::make('fake_competition_registration_id')->label('ID Partisipan'),
                Tables\Columns\TextColumn::make('competition.name')->label('Nama Lomba'),
                Tables\Columns\TextColumn::make('user.name')->label('Nama Voter'),

                // Tables\Columns\TextColumn::make('user.email')->label('Email Voter'),
                Tables\Columns\TextColumn::make('fake_competition_registration.names')->label('Nama Peserta'),
                // Tables\Columns\TextColumn::make('fake_competition_registration.user.email')->label('Email Partisipan'),
                //count vote
                // Tables\Columns\TextColumn::make('fake_competition_registration.vote_count')->label('Jumlah Vote')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Waktu')->sortable(),

            ])->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('Berdasarkan kompetisi')->relationship('competition', 'name'),
                Tables\Filters\SelectFilter::make('Berdasarkan peserta')->relationship('fake_competition_registration', 'names'),

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
            'index' => Pages\ListVotes::route('/'),
        ];
    }
}