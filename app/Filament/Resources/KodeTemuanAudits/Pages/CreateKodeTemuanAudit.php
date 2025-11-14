<?php

namespace App\Filament\Resources\KodeTemuanAudits\Pages;

use App\Filament\Resources\KodeTemuanAudits\KodeTemuanAuditResource;
use Filament\Resources\Pages\CreateRecord;

class CreateKodeTemuanAudit extends CreateRecord
{
    protected static string $resource = KodeTemuanAuditResource::class;
    protected function getRedirectUrl(): string
    {
        // Redirect ke halaman index (ListRecommendations)
        return $this->getResource()::getUrl('index');
    }
}
