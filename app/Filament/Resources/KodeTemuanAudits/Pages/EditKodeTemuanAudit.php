<?php

namespace App\Filament\Resources\KodeTemuanAudits\Pages;

use App\Filament\Resources\KodeTemuanAudits\KodeTemuanAuditResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKodeTemuanAudit extends EditRecord
{
    protected static string $resource = KodeTemuanAuditResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect ke halaman index
        return static::getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
