<?php

namespace Database\Seeders;

use App\Models\Antena;
use Illuminate\Database\Seeder;

class AntenaSeeder extends Seeder
{
    public function run()
    {
        // Menghasilkan 10 data antena menggunakan factory
        Antena::factory()->count(30)->create();
    }
}
