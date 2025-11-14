<?php

namespace App\Filament\Resources\KodeTemuanAudits;

use App\Filament\Resources\KodeTemuanAudits\Pages\CreateKodeTemuanAudit;
use App\Filament\Resources\KodeTemuanAudits\Pages\EditKodeTemuanAudit;
use App\Filament\Resources\KodeTemuanAudits\Pages\ListKodeTemuanAudits;
use App\Filament\Resources\KodeTemuanAudits\Schemas\KodeTemuanAuditForm;
use App\Filament\Resources\KodeTemuanAudits\Tables\KodeTemuanAuditsTable;
use App\Models\KodeTemuanAudit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KodeTemuanAuditResource extends Resource
{
    protected static ?string $model = KodeTemuanAudit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'KodeTemuanAudit ';

    public static function form(Schema $schema): Schema
    {
        return KodeTemuanAuditForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KodeTemuanAuditsTable::configure($table);
        
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
            'index' => ListKodeTemuanAudits::route('/'),
            'create' => CreateKodeTemuanAudit::route('/create'),
            'edit' => EditKodeTemuanAudit::route('/{record}/edit'),
        ];
    }
}
