<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationResource\Pages;
use App\Filament\Resources\DonationResource\RelationManagers;
use App\Models\Donation;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;

class DonationResource extends Resource
{
    protected static ?string $model = Donation::class;

    protected static ?string $navigationIcon = 'heroicon-o-cash';
    protected static ?string $pluralLabel = 'donasi';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Status konfirmasi')
                    ->description('Ganti status konfirmasi dari donasi')
                    ->schema([
                        Forms\Components\Select::make('confirmation')
                            ->label('Status Konfirmasi')
                            ->options([
                                0 => 'Jangan tampilkan',
                                1 => 'Tampilkan di halaman donasi',
                                2 => 'Belum diverifikasi'
                            ]),
                    ]),
                Forms\Components\Section::make('Informasi donatur')
                    ->description('Informasi dari donatur')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama donatur')
                            ->required(),
                        Forms\Components\Select::make('source')
                            ->label('Asal donatur')
                            ->options([
                                'ukp' => 'Universitas Kristen Petra',
                                'uc' => 'Universitas Ciputra',
                                'wm' => 'Universitas Widya Mandala',
                                'ubaya' => 'Universitas Surabaya',
                                'umum' => 'Pendaftar Umum (Bukan dari kampus)'
                            ])
                            ->helperText('Akan muncul nama universitas bila mendaftar lewat universitas.')
                            ->required(),
                        Forms\Components\TextInput::make('origin')
                            ->label('Instansi')
                            ->helperText('Kosong apabila mendaftar melalui universitas'),
                    ]),
                Forms\Components\Section::make('Donasi')
                    ->description('Informasi donasi')
                    ->schema([
                        Forms\Components\TextInput::make('nominal')
                            ->numeric()
                            ->required(),
                        Forms\Components\FileUpload::make('proof')
                            ->label('Bukti transfer')
                            ->disk('public'),
                        Forms\Components\Textarea::make('message')
                            ->label('Titipan pesan'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('confirmation')
                    ->label('Status verifikasi')
                    ->enum([
                        0 => 'Jangan tampilkan',
                        1 => 'Tampilkan di halaman donasi',
                        2 => 'Belum diverifikasi'
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Donatur'),
                Tables\Columns\TextColumn::make('nominal')
                    ->label('Nominal donasi'),
                Tables\Columns\TextColumn::make('source')
                    ->label('Asal')
                    ->enum([
                        'ukp' => 'Universitas Kristen Petra',
                        'uc' => 'Universitas Ciputra',
                        'wm' => 'Universitas Widya Mandala',
                        'ubaya' => 'Universitas Surabaya',
                        'umum' => 'Pendaftar Umum (Bukan dari kampus)'
                    ])
                    ->sortable()
            ])
            ->filters([
                SelectFilter::make('confirmation')
                    ->label('Filter berdasarkan status donasi')
                    ->options([
                        2 => 'Belum diverifikasi',
                        0 => 'Tidak ditampilkan di halaman donasi',
                        1 => 'Ditampilkan di halaman donasi',
                    ])
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
            'index' => Pages\ListDonations::route('/'),
            'create' => Pages\CreateDonation::route('/create'),
            'edit' => Pages\EditDonation::route('/{record}/edit'),
        ];
    }
}
