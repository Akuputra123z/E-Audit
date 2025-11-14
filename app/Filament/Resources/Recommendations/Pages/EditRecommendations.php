<?php

namespace App\Filament\Resources\Recommendations\Pages;

use App\Filament\Resources\Recommendations\RecommendationsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRecommendations extends EditRecord
{
    protected static string $resource = RecommendationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
