<?php

namespace Database\Factories;

use App\Enums\StatusProject;
use App\Models\{Client, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::query()->pluck('id');
        $clients = Client::query()->pluck('id');

        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'deadline_at' => now()->addDays(rand(1, 30))->format('d-m-Y'),
            'status' => fake()->randomElement(StatusProject::cases())->value,
            'user_id' => $users->random(),
            'client_id' => $clients->random(),
        ];
    }
}
