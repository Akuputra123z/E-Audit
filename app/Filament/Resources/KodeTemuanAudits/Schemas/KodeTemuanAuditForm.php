<?php

namespace App\Filament\Resources\KodeTemuanAudits\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KodeTemuanAuditForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sub_kelompok')
                    ->label('Sub Kelompok')
                    ->required()
                    ->maxLength(255),

                TextInput::make('jenis')
                    ->label('Jenis')
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull()
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->maxLength(1000),
                ]);
            
    }
}
