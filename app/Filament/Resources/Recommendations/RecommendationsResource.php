<?php

namespace App\Filament\Resources\Recommendations;

use App\Filament\Resources\Recommendations\Pages\CreateRecommendations;
use App\Filament\Resources\Recommendations\Pages\EditRecommendations;
use App\Filament\Resources\Recommendations\Pages\ListRecommendations;
use App\Filament\Resources\Recommendations\Schemas\RecommendationsForm;
use App\Filament\Resources\Recommendations\Tables\RecommendationsTable;
use App\Models\Recommendations;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RecommendationsResource extends Resource
{
    protected static ?string $model = Recommendations::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    
    protected static ?string $recordTitleAttribute = 'Kode Rekomendasi';

    public static function form(Schema $schema): Schema
    {
        return RecommendationsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RecommendationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRecommendations::route('/'),
            'create' => CreateRecommendations::route('/create'),
            'edit' => EditRecommendations::route('/{record}/edit'),
        ];
    }
}
