<?php

namespace App\Enums;

enum StatusProject: string
{
    case Open = 'open';
    case InProgress = 'in_progress';
    case Blocked = 'blocked';
    case Cancelled = 'cancelled';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Open => 'Open',
            self::InProgress => 'In Progress',
            self::Blocked => 'Blocked',
            self::Cancelled => 'Cancelled',
            self::Completed => 'Completed',
        };
    }
}
