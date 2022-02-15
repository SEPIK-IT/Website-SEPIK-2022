<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialMediaMovementResource\Pages;
use App\Filament\Resources\SocialMediaMovementResource\RelationManagers;
use App\Models\SocialMediaMovement;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class SocialMediaMovementResource extends Resource
{
    protected static ?string $model = SocialMediaMovement::class;

    protected static ?string $navigationIcon = 'heroicon-o-share';

    protected static ?string $navigationGroup = "Pendaftaran Lomba";
    protected static ?string $pluralLabel = "Social Media Movement";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Status verifikasi')
                    ->description('Atur status verifikasi dari pendaftaran ini, lalu klik save.')
                    ->schema([
                        Forms\Components\Radio::make('verification_status')
                            ->label('Status Verifikasi')
                            ->required()
                            ->options([
                                'VERIFIED' => 'Sudah Diverifikasi',
                                'UNVERIFIED' => 'Belum Diverifikasi',
                                'REJECTED' => 'Ditolak'
                            ]),
                    ]),

                Forms\Components\Section::make('Informasi pendaftar')
                    ->description('Informasi dari pendaftar individu / tim')
                    ->schema([
                        Forms\Components\TagsInput::make('names')
                            ->label('Nama peserta')
                            ->required(),

                        Forms\Components\TagsInput::make('identifications')
                            ->label('NRP / NPM peserta')
                            ->required(),

                        Forms\Components\TextInput::make('universities')
                            ->label('Universitas peserta')
                            ->required(),

                        Forms\Components\TagsInput::make('line_ids')
                            ->label('ID Line peserta')
                            ->required(),

                        Forms\Components\TagsInput::make('whatsapp_numbers')
                            ->label('Nomor Whatsapp peserta')
                            ->required(),

                        Forms\Components\TagsInput::make('twibbon_links')
                            ->label('Link twibbon instagram peserta')
                            ->helperText('Link twibbon yang diberikan oleh setiap peserta')
                            ->required(),

                        Forms\Components\TagsInput::make('instagram_usernames')
                            ->label('Username instagram setiap peserta')
                            ->required(),

                        Forms\Components\TextInput::make('delegate_name')
                            ->label('Nama Perwakilan')
                            ->required(),
                        
                        Forms\Components\Select::make('interview_time')
                            ->label('Tanggal dan Jam Wawancara Pertama')
                            ->options([
                                '2022-02-19 10:00:00' => "Sabtu, 19 Februari 2022 (Sesi 1 | 10.00 - 12.00 WIB)",
                                '2022-02-19 17:00:00' => "Sabtu, 19 Februari 2022 (Sesi 2 | 17.00 - 19.00 WIB)",
                                '2022-02-20 10:00:00' => "Minggu, 20 Februari 2022 (Sesi 1 | 10.00 - 12.00 WIB)",
                                '2022-02-20 17:00:00' => "Minggu, 20 Februari 2022 (Sesi 2 | 17.00 - 19.00 WIB)",
                                '2022-02-21 18:00:00' => "Senin, 21 Februari 2022 (18.00 - 20.00 WIB)"
                            ])
                            ->required(),

                        Forms\Components\Select::make('backup_date')
                            ->label('Tanggal dan Jam Wawancara Cadangan')
                            ->options([
                                '2022-02-19 10:00:00' => "Sabtu, 19 Februari 2022 (Sesi 1 | 10.00 - 12.00 WIB)",
                                '2022-02-19 17:00:00' => "Sabtu, 19 Februari 2022 (Sesi 2 | 17.00 - 19.00 WIB)",
                                '2022-02-20 10:00:00' => "Minggu, 20 Februari 2022 (Sesi 1 | 10.00 - 12.00 WIB)",
                                '2022-02-20 17:00:00' => "Minggu, 20 Februari 2022 (Sesi 2 | 17.00 - 19.00 WIB)",
                                '2022-02-21 18:00:00' => "Senin, 21 Februari 2022 (18.00 - 20.00 WIB)"
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('google_drive_interview')
                            ->label('Link google drive pengumpulan abdimas')
                            ->required(),

                    ])->columns(2),

                Forms\Components\Section::make('Bukti Google Drive')
                    ->description('Setiap bukti unggahan berupa link Google Drive')
                    ->schema([
                        Forms\Components\TextInput::make('id_proof_link')
                            ->label('Link google drive berisi foto KTM')
                            ->required(),

                        Forms\Components\TextInput::make('photo_link')
                            ->label('Link google drive berisi foto 3x4')
                            ->required(),

                        Forms\Components\TextInput::make('story_proof_link')
                            ->label('Link google drive berisi bukti unggahan story')
                            ->required(),

                        Forms\Components\TextInput::make('file_proof_link')
                            ->label('Link google drive berisi bukti video/foto instagram')
                            ->required(),

                        Forms\Components\TextInput::make('transfer_proof')
                            ->label('Link google drive berisi bukti transfer gdrive')
                            ->required(),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\BadgeColumn::make('interview_status')
                    ->label('Status interview (sudah memilih atau belum)')
                    ->colors([
                        'primary',
                        'warning' => 'NO_INTERVIEW_TIME',
                        'success' => 'HAS_INTERVIEW_TIME'
                    ])->formatStateUsing(fn(string $state): string => match ($state) {
                        'NO_INTERVIEW_TIME' => 'Belum memilih jadwal',
                        'HAS_INTERVIEW_TIME' => 'Sudah memilih jadwal'
                    })
                    ->sortable(),
                    
                Tables\Columns\BadgeColumn::make('verification_status')
                    ->label('Status verifikasi')
                    ->colors([
                        'primary',
                        'danger' => 'REJECTED',
                        'warning' => 'UNVERIFIED',
                        'success' => 'VERIFIED'
                    ])
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'VERIFIED' => 'Terverifikasi',
                        'UNVERIFIED' => 'Belum Diverifikasi',
                        'REJECTED' => 'Ditolak'
                    })
                    ->sortable(),

                Tables\Columns\TagsColumn::make('names')
                    ->label('Nama pendaftar'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('interview_status')
                    ->label('Pemilihan jadwal interview')
                    ->options([
                        'NO_INTERVIEW_TIME' => 'Belum memilih jadwal',
                        'HAS_INTERVIEW_TIME' => 'Sudah memilih jadwal'
                    ]),

                Tables\Filters\SelectFilter::make('verification_status')
                    ->label('Status verifikasi')
                    ->options([
                        'UNVERIFIED' => 'Yang belum terverifikasi',
                        'VERIFIED' => 'Yang Sudah terverifikasi',
                        'REJECTED' => 'Ditolak'
                    ]),

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
            'index' => Pages\ListSocialMediaMovements::route('/'),
            'create' => Pages\CreateSocialMediaMovement::route('/create'),
            'edit' => Pages\EditSocialMediaMovement::route('/{record}/edit'),
        ];
    }
}
