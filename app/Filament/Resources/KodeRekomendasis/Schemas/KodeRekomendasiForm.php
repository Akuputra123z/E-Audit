<?php

namespace App\Filament\Resources\KodeRekomendasis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KodeRekomendasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('jenis')
                    ->label('Jenis Rekomendasi')
                    ->placeholder('Masukkan jenis rekomendasi')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(100)
                    ->columnSpanFull(),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->placeholder('Tuliskan deskripsi rekomendasi')
                    ->maxLength(500)
                    ->required()
                   
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull()
                    ->dehydrateStateUsing(fn ($state) => strip_tags($state)),
            ]);
    }
}
