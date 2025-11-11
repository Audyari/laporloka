<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalReportStatisticWidget extends StatsOverviewWidget
{
    protected ?string $heading = "Total Report Statistic";
    protected int|string|array $columnSpan = 'full'; // atau 2, 3, dsb
    protected static ?int $sort = 1;
    protected ?string $maxHeight = '300px';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Reports', Report::count())
                ->icon('heroicon-m-arrow-down-on-square-stack'),
            Stat::make('Pending Action', Report::where('status', 'pending')->count())
                ->icon('heroicon-m-clock'),
            Stat::make('Resolved', Report::where('status', '!=', 'pending')->count())
                ->icon('heroicon-m-check-circle'),
        ];
    }
}
