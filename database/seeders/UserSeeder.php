<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'first_name' => 'Cristyan',
            'last_name' => 'Valera',
            'email' => 'cristyan.valera@mail.com',
            'password' => 'password',
        ]);

        User::factory(99)->create();
    }
}
