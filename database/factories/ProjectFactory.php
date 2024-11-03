<?php

namespace Database\Factories;

use App\Enums\ProjectStatus;
use App\Models\{Client, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        $users = User::query()->pluck('id');
        $clients = Client::query()->pluck('id');

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
            'deadline_at' => now()->addDays(rand(1, 30))->format('d-m-Y'),
            'status' => fake()->randomElement(ProjectStatus::cases())->value,
        ];
    }
}
