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
                 *  DESA
                 * --------------------------------*/
                Select::make('desa_id')
                    ->label('Nama Desa')
                    ->relationship('desa', 'nama_desa')
                    ->searchable()
                    ->preload()
                    ->required(),

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
                 *  URAIAN DAN NILAI REKOMENDASI
                 * --------------------------------*/
                Textarea::make('uraian_rekom')
                    ->label('Uraian Rekomendasi')
                    ->columnSpanFull(),

                TextInput::make('nilai_rekom')
                    ->label('Nilai Rekomendasi')
                    ->numeric(),

                /** --------------------------------
                 *  URAIAN TINDAK LANJUT
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
                 *  UPLOAD BANYAK FILE (PDF/IMAGE)
                 * --------------------------------*/
                FileUpload::make('file_tindak_lanjut')
                    ->label('Upload Bukti (PDF / Gambar)')
                    ->disk('public')
                    ->directory('tindaklanjut')
                    ->multiple()                     // <— penting untuk multi file
                    ->visibility('public')
                    ->acceptedFileTypes(['image/*', 'application/pdf'])
                    ->maxSize(5120)
                    ->maxFiles(10)                   // <— batasi jumlah file
                    ->downloadable()                // bisa di-download
                    ->openable()                    // bisa dibuka
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
