<?php

namespace App\Models;

use App\Enums\TaskStatus;
use App\Observers\TaskObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(TaskObserver::class)]
class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function casts(): array
    {
        return [
            'status' => TaskStatus::class,
            'deadline_at' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
