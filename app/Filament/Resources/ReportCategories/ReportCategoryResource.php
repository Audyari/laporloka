<?php

namespace App\Filament\Resources\ReportCategories;

use App\Filament\Resources\ReportCategories\Pages\CreateReportCategory;
use App\Filament\Resources\ReportCategories\Pages\EditReportCategory;
use App\Filament\Resources\ReportCategories\Pages\ListReportCategories;
use App\Filament\Resources\ReportCategories\Schemas\ReportCategoryForm;
use App\Filament\Resources\ReportCategories\Tables\ReportCategoriesTable;
use App\Models\ReportCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReportCategoryResource extends Resource
{
    protected static ?string $model = ReportCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Tag;
    protected static ?string $navigationLabel = 'Categories';


    public static function form(Schema $schema): Schema
    {
        return ReportCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReportCategoriesTable::configure($table);
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
            'index' => ListReportCategories::route('/'),
            'create' => CreateReportCategory::route('/create'),
            'edit' => EditReportCategory::route('/{record}/edit'),
        ];
    }
}
