<?php

namespace App\Filament\Widgets;

use App\Models\ReportCategory;
use Filament\Widgets\ChartWidget;

class TotalReportDataByCategory extends ChartWidget
{
    protected ?string $heading = 'Total Report Data By Category';
    protected int|string|array $columnSpan = '1'; // atau 2, 3, dsb
    protected static ?int $sort = 2;
    protected ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Ambil semua kategori
        $categories = ReportCategory::withCount('reports')->get();

        // Label kategori (nama kategori)
        $categoryLabels = $categories->pluck('name')->toArray();

        // Jumlah laporan di setiap kategori
        $data = $categories->pluck('reports_count')->toArray();

        // Warna dinamis (otomatis beda tiap kategori)
        $colors = collect($categoryLabels)->map(function ($_, $i) {
            $palette = [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)',
            ];
            return $palette[$i % count($palette)];
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Reports per Category',
                    'data' => $data,
                    'backgroundColor' => $colors,
                    'hoverOffset' => 6,
                ],
            ],
            'labels' => $categoryLabels,
        ];
    }


    protected function getType(): string
    {
        return 'pie';
    }
}
