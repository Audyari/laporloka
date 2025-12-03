<?php

namespace App\Filament\Resources\Reports\Schemas;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Dotswan\MapPicker\Infolists\MapEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Section;

class ReportInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        TextEntry::make('report_number')
                            ->color('primary'),
                        TextEntry::make('user.name')
                            ->label('Reported By')
                            ->color('primary'),
                        TextEntry::make('reported_at')
                            ->dateTime('d M Y H:i')
                            ->color('primary'),
                    ])
                    ->columnSpanFull(),
                Grid::make(3)
                    ->schema([
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'pending' => 'gray',
                                'in_progress' => 'warning',
                                'reviewed' => 'info',
                                'rejected' => 'danger',
                                'resolved' => 'success',
                            }),
                        TextEntry::make('priority')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'low' => 'gray',
                                'medium' => 'warning',
                                'high' => 'info',
                                'urgent' => 'danger',
                            }),
                        TextEntry::make('resolved_at')
                            ->label('Resolved At')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
                    ->columnSpanFull(),
                TextEntry::make('description')
                    ->color('primary')
                    ->columnSpanFull(),
                Grid::make(3)
                    ->schema([
                        TextEntry::make('admin_notes')
                            ->placeholder('-')
                            ->color('primary'),
                        TextEntry::make('assigned_to')
                            ->placeholder('-')
                            ->color('primary'),
                        TextEntry::make('views_count')
                            ->numeric()
                            ->placeholder('0')
                            ->color('primary'),
                    ])
                    ->columnSpanFull(),
                ViewEntry::make('location_map')
                    ->label('Location')
                    ->view('filament.maps.show-map')
                    ->viewData(function ($record) {
                        return [
                            'lat' => $record->latitude,
                            'lng' => $record->longitude,
                            'address' => $record->location_address,
                        ];
                    })
                    ->columnSpanFull(),
            ]);
    }
}
