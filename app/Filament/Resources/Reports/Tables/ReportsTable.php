<?php

namespace App\Filament\Resources\Reports\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReportsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('report_number')
                    ->copyable()
                    ->copyMessage('Kode berhasil disalin!')
                    ->copyMessageDuration(1500)
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('description')
                    ->limit(20)
                    ->searchable(),
                TextColumn::make('category.name')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Reported By')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'gray',
                        'in_progress' => 'warning',
                        'reviewed' => 'info',
                        'rejected' => 'danger',
                        'resolved' => 'success',
                    }),
                TextColumn::make('priority')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'low' => 'gray',
                        'medium' => 'warning',
                        'high' => 'info',
                        'urgent' => 'danger',
                    }),
                TextColumn::make('reported_at')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                TextColumn::make('assigned_to')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('category', 'name'),
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'reviewed' => 'Reviewed',
                        'rejected' => 'Rejected',
                        'resolved' => 'Resolved',
                    ])
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->label('Update Status')
                    ->icon('heroicon-o-arrow-path')
                    ->schema([
                        Grid::make(2)
                            ->schema([

                                TextEntry::make('user.name')
                                    ->label('Reported By'),
                                TextEntry::make('category.name')
                                    ->label('Category'),
                                TextEntry::make('title'),
                                TextEntry::make('description')
                                    ->columnSpanFull(),
                                TextEntry::make('location_address'),
                                TextEntry::make('latitude')
                                    ->numeric(),
                                TextEntry::make('longitude')
                                    ->numeric(),
                                Select::make('status')
                                    ->default(fn($record) => $record?->status ?? 'pending')
                                    ->options([
                                        'pending' => 'Pending',
                                        'in_progress' => 'In Progress',
                                        'reviewed' => 'Reviewed',
                                        'rejected' => 'Rejected',
                                        'resolved' => 'Resolved',
                                    ]),
                                TextEntry::make('priority')
                                    ->default('medium'),
                                TextEntry::make('report_number'),
                                TextEntry::make('reported_at'),
                                TextEntry::make('resolved_at'),
                                TextEntry::make('admin_notes')
                                    ->columnSpanFull(),
                                TextEntry::make('assigned_to'),
                                TextEntry::make('views_count')
                                    ->numeric()
                                    ->default(0),
                            ])
                    ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
