<?php

namespace App\Enums;

enum TaskStatus: string
{
    case Open = 'open';
    case InProgress = 'in progress';
    case Pendind = 'pending';
    case WaitingClient = 'waiting client';
    case Blocked = 'blocked';
    case Closed = 'closed';
}
