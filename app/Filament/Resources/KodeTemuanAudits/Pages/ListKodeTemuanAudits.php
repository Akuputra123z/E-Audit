<?php

namespace App\Filament\Resources\KodeTemuanAudits\Pages;

use App\Filament\Resources\KodeTemuanAudits\KodeTemuanAuditResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKodeTemuanAudits extends ListRecords
{
    protected static string $resource = KodeTemuanAuditResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
