<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Open = 'open';
    case InProgress = 'in_progress';
    case Pending = 'pending';
    case WaitingClient = 'waiting_client';
    case Blocked = 'blocked';
    case Closed = 'closed';

    public function label(): string
    {
        return match ($this) {
            self::Open => 'Open',
            self::InProgress => 'In Progress',
            self::Pending => 'Pending',
            self::WaitingClient => 'Waiting Client',
            self::Blocked => 'Blocked',
            self::Closed => 'Closed',
        };
    }
}
