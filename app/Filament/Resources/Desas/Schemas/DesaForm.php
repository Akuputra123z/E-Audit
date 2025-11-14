<?php

namespace App\Filament\Resources\Desas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class DesaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_desa')
                    ->label('Kode Desa')
                    ->required()
                    ->readOnly(),
                Select::make('nama_kecamatan')
                    ->label('Nama Kecamatan')
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
                    ->searchable()
                    ->reactive() // penting untuk auto-generate kode desa
                    ->afterStateUpdated(function ($state, callable $set) {
                        $kode = [
                            'Sumber' => '01',
                            'Bulu' => '02',
                            'Gunem' => '03',
                            'Sale' => '04',
                            'Sarang' => '05',
                            'Sedan' => '06',
                            'Pamotan' => '07',
                            'Sulang' => '08',
                            'Kaliori' => '09',
                            'Rembang' => '10',
                            'Pancur' => '11',
                            'Kragan' => '12',
                            'Sluke' => '13',
                            'Lasem' => '14',
                        ];

                        $set('kode_desa', $kode[$state] ?? null);
                    })
                    ->preload(),
                
                TextInput::make('nama_desa')
                    ->required(),
                
                
            ]);
    }
}
