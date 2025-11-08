<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReportCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function activeReports(): HasMany
    {
        return $this->reports()->where('is_public', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
