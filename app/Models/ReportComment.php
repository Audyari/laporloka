<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReportComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'user_id',
        'content',
        'type',
        'is_internal',
    ];

    protected $casts = [
        'is_internal' => 'boolean',
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isStatusChange(): bool
    {
        return $this->type === 'status_change';
    }

    public function isComment(): bool
    {
        return $this->type === 'comment';
    }

    public function isAdminNote(): bool
    {
        return $this->type === 'admin_note';
    }

    public function getTypeLabel(): string
    {
        return match($this->type) {
            'comment' => 'Komentar',
            'status_change' => 'Perubahan Status',
            'admin_note' => 'Catatan Admin',
            default => 'Unknown',
        };
    }

    public function getTypeColor(): string
    {
        return match($this->type) {
            'comment' => 'blue',
            'status_change' => 'green',
            'admin_note' => 'orange',
            default => 'gray',
        };
    }
}
