<?php

namespace App\Filament\Resources\Recommendations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class RecommendationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([

                /** --------------------------------
                 *  KODE REKOMENDASI
                 * --------------------------------*/
                Select::make('kode_rekom_id')
                    ->label('Kode Rekomendasi')
                    ->relationship('kodeRekom', 'deskripsi')
                    ->searchable()
                    ->preload()
                    ->required(),

                /** --------------------------------
                 *  KODE TEMUAN AUDIT
                 * --------------------------------*/
                Select::make('kode_temuan_audit_id')
                    ->label('Kode Temuan Audit')
                    ->relationship('kodeTemuanAudit', 'deskripsi')
                    ->searchable()
                    ->preload()
                    ->required(),

                /** --------------------------------
                 *  KECAMATAN (wajib dipilih dulu)
                 * --------------------------------*/
                Select::make('nama_kecamatan')
                    ->label('Kecamatan')
                    ->options([
                        'Sumber'   => 'Kecamatan Sumber',
                        'Bulu'     => 'Kecamatan Bulu',
                        'Gunem'    => 'Kecamatan Gunem',
                        'Sale'     => 'Kecamatan Sale',
                        'Sarang'   => 'Kecamatan Sarang',
                        'Sedan'    => 'Kecamatan Sedan',
                        'Pamotan'  => 'Kecamatan Pamotan',
                        'Sulang'   => 'Kecamatan Sulang',
                        'Kaliori'  => 'Kecamatan Kaliori',
                        'Rembang'  => 'Kecamatan Rembang',
                        'Pancur'   => 'Kecamatan Pancur',
                        'Kragan'   => 'Kecamatan Kragan',
                        'Sluke'    => 'Kecamatan Sluke',
                        'Lasem'    => 'Kecamatan Lasem',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('desa_id', null))
                    ->searchable(),

                /** --------------------------------
                 *  DESA (dependen pada kecamatan)
                 * --------------------------------*/
                Select::make('desa_id')
                    ->label('Nama Desa')
                    ->options(function (callable $get) {
                        if (!$get('nama_kecamatan')) {
                            return [];
                        }

                        return \App\Models\Desa::where('nama_kecamatan', $get('nama_kecamatan'))
                            ->orderBy('nama_desa')
                            ->pluck('nama_desa', 'id');
                    })
                    ->required()
                    ->reactive()
                    ->searchable()
                    ->preload()
                    ->disabled(fn(callable $get) => !$get('nama_kecamatan')),

                /** --------------------------------
                 *  STATUS
                 * --------------------------------*/
                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'proses' => 'Proses',
                        'selesai' => 'Selesai',
                    ])
                    ->label('Status Rekomendasi')
                    ->required(),

                /** --------------------------------
                 *  URAIAN & NILAI REKOMENDASI
                 * --------------------------------*/
                Textarea::make('uraian_rekom')
                    ->label('Uraian Rekomendasi')
                    ->columnSpanFull(),

                TextInput::make('nilai_rekom')
                    ->label('Nilai Rekomendasi')
                    ->numeric(),

                /** --------------------------------
                 *  TINDAK LANJUT
                 * --------------------------------*/
                TextInput::make('no_tindak_lanjut')
                    ->label('Nomor Tindak Lanjut'),

                Textarea::make('uraian_tindak_lanjut')
                    ->label('Uraian Tindak Lanjut')
                    ->columnSpanFull(),

                TextInput::make('nilai_tindak_lanjut')
                    ->label('Nilai Tindak Lanjut')
                    ->numeric(),

                /** --------------------------------
                 *  UPLOAD MULTI FILE
                 * --------------------------------*/
                FileUpload::make('file_tindak_lanjut')
                    ->label('Upload Bukti (PDF / Gambar)')
                    ->disk('public')
                    ->directory('tindaklanjut')
                    ->multiple()
                    ->visibility('public')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->maxSize(5120)
                    ->maxFiles(10)
                    ->downloadable()
                    ->openable()
                    ->previewable(true),

                /** --------------------------------
                 *  TANGGAPAN
                 * --------------------------------*/
                Textarea::make('tanggapan')
                    ->label('Tanggapan')
                    ->columnSpanFull(),

            ]);
    }
}
