<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 10 pelanggan dengan id_petugas 1
        Pelanggan::factory()->count(10)->create();
    }
}
