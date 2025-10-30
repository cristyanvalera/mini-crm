<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Cache;

final readonly class TaskObserver
{
    public function created(Task $task): void
    {
        $this->clearCache();
    }

    public function updated(Task $task): void
    {
        dd($task);

        $this->clearCache();
    }

    public function deleted(Task $task): void
    {
        $this->clearCache();
    }

    private function clearCache(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            $key = 'tasks-page' . $i;

            if (Cache::has($key)) {
                Cache::forget($key);
            } else {
                break;
            }
        }
    }
}
