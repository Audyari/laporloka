<?php

namespace App\Filament\Widgets;

use App\Models\Report;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ReportsDataByMonth extends ChartWidget
{
    protected ?string $heading = 'Reports Data Each Month';
    protected int|string|array $columnSpan = '1'; // atau 2, 3, dsb
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        if ($this->filter) {
            $year = $this->filter   ;
        } else {
            $year = now()->year;
        }


        $reports = Report::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Buat array bulan (1–12)
        $months = range(1, 12);
        $monthLabels = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec',
        ];

        // Samakan format data (jika ada bulan tanpa data, isi 0)
        $data = [];
        foreach ($months as $m) {
            $data[] = $reports[$m] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Reports created',
                    'data' => $data,
                ],
            ],
            'labels' => $monthLabels,
        ];
    }


    protected function getType(): string
    {
        return 'bar';
    }

    protected function getFilters(): ?array
    {
        // Ambil tahun sekarang
        $currentYear = date('Y');

        // Buat array 10 tahun terakhir (misalnya 2016–2025)
        $years = range($currentYear - 9, $currentYear);

        // Ubah menjadi format yang sesuai untuk filter
        $filters = [];
        foreach ($years as $year) {
            $filters[$year] = (string) $year;
        }

        return $filters;
    }
}
