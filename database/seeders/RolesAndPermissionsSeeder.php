<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Buat peran
        $adminRole = Role::create(['name' => 'admin']);
        $teknisiRole = Role::create(['name' => 'teknisi']);

        // Buat izin (optional)
        $viewDashboard = Permission::create(['name' => 'view dashboard']);
        $manageUsers = Permission::create(['name' => 'manage users']);

        // Berikan izin ke peran
        $adminRole->givePermissionTo($viewDashboard);
        $adminRole->givePermissionTo($manageUsers);

        $teknisiRole->givePermissionTo($viewDashboard);
    }
}
