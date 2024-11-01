<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Admin',
            'no_hp' => '089555990294',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin#123'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Teknisi 1',
            'no_hp' => '089555230294',
            'email' => 'teknisi@gmail.com',
            'password' => Hash::make('Teknisi#123'),
            'role' => 'teknisi',
        ]);

        User::create([
            'nama' => 'Teknisi 2',
            'no_hp' => '089555230999',
            'email' => 'teknisi2@gmail.com',
            'password' => Hash::make('Teknisi#123'),
            'role' => 'teknisi',
        ]);
    }
}
