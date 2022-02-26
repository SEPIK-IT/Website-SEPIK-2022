<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionRegistrationResource\Pages;
use App\Filament\Resources\CompetitionRegistrationResource\RelationManagers;
use App\Forms\Components\PreviewAndDownload;
use App\Models\CompetitionRegistration;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Query\Builder;

class CompetitionRegistrationResource extends Resource
{
    protected static ?string $model = CompetitionRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $pluralLabel = "Daftar peserta";
    protected static ?string $navigationGroup = "Sayembara";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('verification_status')
                    ->helperText('Ganti status verifikasi dari pendaftar ini')
                    ->options([
                        'VERIFIED' => 'Pendaftar sudah diverifikasi',
                        'WORKS_UNUPLOADED' => 'Pendaftar lomba belum mengupload karya',
                        'UNVERIFIED' => 'Pendaftar sudah mengupload karya tapi belum diverifikasi'
                    ])
                    ->label('Status submisi lomba'),

                Forms\Components\Section::make('Informasi peserta')
                    ->schema([
                        Forms\Components\TagsInput::make('names')
                            ->label('Nama Peserta')
                            ->required(),
                        Forms\Components\TagsInput::make('identifications')
                            ->label('NIK / NPM Peserta')
                            ->required(),
                        Forms\Components\TagsInput::make('origins')
                            ->label('Asal Kampus / Instansi')
                            ->required(),
                        Forms\Components\TagsInput::make('regions')
                            ->label('Asal Daerah')
                            ->required(),
                    ]),

                Forms\Components\Section::make('Dokumen pendukung')
                    ->description('Dokumen pendukung seperti foto dan bukti pembayaran')
                    ->schema([
                        Forms\Components\Fieldset::make('Foto')->schema([
                            Forms\Components\FileUpload::make('upload_ids')
                                ->label("Foto KTM / KTP")
                                ->disk('private')
                                ->directory('id-cards')
                                ->visibility('private')
                                ->multiple(),
                            Forms\Components\FileUpload::make('upload_photos')
                                ->label('Foto 3x4')
                                ->disk('private')
                                ->directory('id-cards')
                                ->visibility('private')
                                ->multiple(),
                        ]),
                        Forms\Components\TagsInput::make('twibbon_links')
                            ->label('Link Twibbon')
                            ->required(),

                        Forms\Components\FileUpload::make('payment_proof')
                            ->label('Bukti pembayaran')
                            ->disk('private')
                            ->directory('payment-proofs')
                            ->visibility('private')
                            ->multiple(),
                    ]),

                Forms\Components\Section::make('Submisi lomba')
                    ->schema([
                        Forms\Components\TextInput::make('google_drive_link')
                            ->label('Link google drive')
                            ->required()
                            ->maxLength(500)
                            ->columnSpan(2),

                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\FileUpload::make('caption')
                                    ->label('Caption')
                                    ->disk('private')
                                    ->directory('captions')
                                    ->visibility('private'),
                                PreviewAndDownload::make('caption')
                                    ->label('Aksi')
                                    ->disk('private'),
                            ])
                            ->columnSpan(2),

                        Forms\Components\Grid::make()
                            ->schema([
                                Forms\Components\FileUpload::make('originality_statement')
                                    ->label('Lembar orisinalitas')
                                    ->disk('private')
                                    ->directory('statements')
                                    ->visibility('private'),
                                PreviewAndDownload::make('originality_statement')
                                    ->label('Aksi')
                                    ->disk('private'),
                            ])
                            ->columnSpan(2)
                    ]),

                Forms\Components\Fieldset::make('Informasi kontak')
                    ->schema([
                        Forms\Components\TextInput::make('whatsapp_no')
                            ->label('No. WA Perwakilan')
                            ->required()
                            ->maxLength(100),
                        Forms\Components\TextInput::make('line_id')
                            ->label('ID Line Perwakilan')
                            ->required()
                            ->maxLength(100),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('verification_status')
                    ->label('Status submisi')
                    ->enum([
                        'VERIFIED' => 'Sudah diverifikasi',
                        'WORKS_UNUPLOADED' => 'Karya belum diupload',
                        'UNVERIFIED' => 'Belum diverifikasi'
                    ]),
                Tables\Columns\TextColumn::make('competition.name')
                    ->label('Nama Kompetisi')
                    ->sortable(),
                Tables\Columns\TagsColumn::make('names')
                    ->label('Nama peserta'),
                Tables\Columns\TagsColumn::make('origins')
                    ->label('Instansi'),
                Tables\Columns\TagsColumn::make('regions')
                    ->label('Daerah'),
                Tables\Columns\TextColumn::make('whatsapp_no')
                    ->label('No.WA'),
                Tables\Columns\TextColumn::make('line_id')
                    ->label('ID Line'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal daftar')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('vote_count')
                    ->label('Jumlah Vote')->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('Berdasarkan kompetisi')
                    ->relationship('competition', 'name'),
                Tables\Filters\SelectFilter::make('verification_status')
                    ->options([
                        'UNVERIFIED' => 'Belum diverifikasi',
                        'VERIFIED' => 'Sudah diverifikasi',
                        'WORKS_UNUPLOADED' => 'Karya belum diupload',
                    ])
                    ->label('Berdasarkan status verifikasi')
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
            'index' => Pages\ListCompetitionRegistrations::route('/'),
            'create' => Pages\CreateCompetitionRegistration::route('/create'),
            'edit' => Pages\EditCompetitionRegistration::route('/{record}/edit'),
        ];
    }
}