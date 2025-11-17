<?php

namespace App\Filament\Resources\Desas\Pages;

use App\Filament\Resources\Desas\DesaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDesa extends EditRecord
{
    protected static string $resource = DesaResource::class;

    protected function getRedirectUrl(): string
    {
        // Redirect ke halaman index
        return static::getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
