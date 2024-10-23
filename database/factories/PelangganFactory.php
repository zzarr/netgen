<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PelangganFactory extends Factory
{
    protected $model = Pelanggan::class;

    public function definition(): array
    {
        return [
            'nama_pelanggan' => $this->faker->name(),
            'id_petugas'     => 1,  // Semua 'id_petugas' diisi dengan 1
            'paket'          => $this->faker->randomElement(['Paket A', 'Paket B', 'Paket C']),
            'alamat'         => $this->faker->address(),
            'no_hp'          => $this->faker->phoneNumber(),
            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}
