<?php

namespace Database\Factories;

use App\Enums\TaskStatus;
use App\Models\{Client, Project, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    public function definition(): array
    {
        $users = User::query()->pluck('id');
        $clients = Client::query()->pluck('id');
        $projects = Project::query()->pluck('id');

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
            'project_id' => $projects->random(),
            'deadline_at' => fake()->dateTimeBetween('+1 month', '+6 month'),
            'status' => fake()->randomElement(TaskStatus::cases())->value,
        ];
    }
}
