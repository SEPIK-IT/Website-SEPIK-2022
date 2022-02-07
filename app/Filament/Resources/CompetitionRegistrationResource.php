<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompetitionRegistrationResource\Pages;
use App\Filament\Resources\CompetitionRegistrationResource\RelationManagers;
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
                Forms\Components\Toggle::make('is_verified')
                    ->helperText('Nyalakan bila ingin memverifikasi lalu klik Save')
                    ->label('Status verifikasi'),

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
                Tables\Columns\TextColumn::make('google_drive_link')
                    ->label('Link Google Drive'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal daftar')
                    ->dateTime(),
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
            'index' => Pages\ListCompetitionRegistrations::route('/'),
            'create' => Pages\CreateCompetitionRegistration::route('/create'),
            'edit' => Pages\EditCompetitionRegistration::route('/{record}/edit'),
        ];
    }
}
