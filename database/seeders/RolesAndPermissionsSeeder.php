<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Buat Role
        $adminRole = Role::create(['name' => 'admin']);
        $teknisiRole = Role::create(['name' => 'teknisi']);

        // Buat Permission
        $viewDashboard = Permission::create(['name' => 'view dashboard']);
        $manageAntena = Permission::create(['name' => 'manage antena']);
        $manageHubHTB = Permission::create(['name' => 'manage hub htb']);
        $managePelanggan = Permission::create(['name' => 'manage pelanggan']);
        $viewLaporanTagihan = Permission::create(['name' => 'view laporan tagihan']);
        $manageUsers = Permission::create(['name' => 'manage users']);
        // Berikan Permission ke Role
        $adminRole->givePermissionTo([$viewDashboard, $manageUsers, $manageAntena, $manageHubHTB, $managePelanggan, $viewLaporanTagihan]);
        $teknisiRole->givePermissionTo([$viewDashboard, $managePelanggan, $viewLaporanTagihan]);


        $teknisiRole->givePermissionTo($viewDashboard);
    }
}
