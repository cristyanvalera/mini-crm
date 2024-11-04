<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\Role as EnumsRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => PermissionEnum::ManageUsers]);
        Permission::create(['name' => PermissionEnum::DeleteClients]);
        Permission::create(['name' => PermissionEnum::DeleteProjects]);
        Permission::create(['name' => PermissionEnum::DeleteTasks]);

        $role = Role::findByName(EnumsRole::Admin->value);
        $role->givePermissionTo([
            PermissionEnum::ManageUsers,
            PermissionEnum::DeleteClients,
            PermissionEnum::DeleteProjects,
            PermissionEnum::DeleteTasks,
        ]);
    }
}
