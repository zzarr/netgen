<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'nama' => 'Admin',
            'no_hp' => '089555990294',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin#123'),
        ]);

        $admin->assignRole('admin');

        $teknisi = User::create([
            'nama' => 'Teknisi 1',
            'no_hp' => '089555230294',
            'email' => 'teknisi@gmail.com',
            'password' => Hash::make('Teknisi#123'),
        ]);

        $teknisi->assignRole('teknisi');

        $teknisi2 = User::create([
            'nama' => 'Teknisi 2',
            'no_hp' => '089555230999',
            'email' => 'teknisi2@gmail.com',
            'password' => Hash::make('Teknisi#123'),
        ]);
        $teknisi2->assignRole('teknisi');
    }
}
