<?php

namespace App\Filament\Resources\ReportCategories\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ColorPicker;

class ReportCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->reactive()
                    ->debounce(1000)
                    ->afterStateUpdated(function (string $state, callable $set) {
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug')
                    ->readOnly()
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('icon'),
                ColorPicker::make('color')
                    ->required()
                    ->default('#3B82F6'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
