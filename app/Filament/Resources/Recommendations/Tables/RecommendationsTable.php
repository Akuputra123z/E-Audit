<?php

namespace App\Filament\Resources\Recommendations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RecommendationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kodeRekom.deskripsi')
                ->label('Deskripsi Rekomendasi')
                ->searchable()
                ->words(10)
                ->sortable(),
                TextColumn::make('nilai_rekom')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('no_tindak_lanjut')
                    ->searchable(),
                TextColumn::make('nilai_tindak_lanjut')
                    ->numeric()
                    ->sortable(),
                ImageColumn::make('file_tindak_lanjut')
                ->label('Bukti Tindak Lanjut')
                    ->disk('public')  
                  
                    ->visibility('public')
                    // gunakan disk 'public'
                    ->height(60)
                    ->width(60)
                    ->square(),
                    TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'Pending',
                        'info'    => 'proses',
                        'success' => 'selesai',
                    ])
                    ->formatStateUsing(fn ($state) => ucfirst($state)) // biar huruf awal besar
                    ->searchable()
                    ->sortable(),
                

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
              
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
   
}
