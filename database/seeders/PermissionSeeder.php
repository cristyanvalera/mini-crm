<?php

namespace Database\Seeders;

use App\Enums\{PermissionEnum, RoleEnum};
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{Permission, Role};

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::ManageUsers]);
        Permission::create(['name' => PermissionEnum::DeleteClients]);
        Permission::create(['name' => PermissionEnum::DeleteProjects]);
        Permission::create(['name' => PermissionEnum::DeleteTasks]);

        Role::findByName(RoleEnum::Admin->value)->givePermissionTo([
            PermissionEnum::ManageUsers,
            PermissionEnum::DeleteClients,
            PermissionEnum::DeleteProjects,
            PermissionEnum::DeleteTasks,
        ]);
    }
}
