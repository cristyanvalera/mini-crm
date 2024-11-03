<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case Open = 'open';
    case InProgress = 'in progress';
    case Blocked = 'blocked';
    case Cancelled = 'cancelled';
    case Completed = 'completed';
}
