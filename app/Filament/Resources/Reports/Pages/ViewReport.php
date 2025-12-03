<?php

namespace App\Filament\Resources\Reports\Pages;

use App\Filament\Resources\Reports\ReportResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ViewReport extends ViewRecord
{
    protected static string $resource = ReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Back')
                ->color('info')
                ->icon('heroicon-o-arrow-left')
                ->url($this->getResource()::getUrl())        ];
    }

    public function getTitle(): string | Htmlable
    {
        if (filled(static::$title)) {
            return static::$title;
        }

        $record = $this->getRecord();

        $badge =
            "
        <br>
        <span style='font-size: 18px; font-weight: 600;'>
            Category: 
            <span style='display: inline-flex; align-items: center; padding: 2px 6px; border-radius: 6px; font-weight: 600; background-color: #E0E7FF; color: #3730A3;'>
                {$record->category->name}
            </span>
        </span>";

        return new HtmlString("{$record->title} $badge");
    }
}
