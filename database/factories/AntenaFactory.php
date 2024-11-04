<?php

namespace Database\Factories;

use App\Models\Antena;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class AntenaFactory extends Factory
{
    protected $model = Antena::class;

    public function definition()
    {
        $faker = FakerFactory::create('id_ID');
        return [
            'nama' => $this->faker->randomElement([
                'Ubiquiti NanoStation M5',
                'MikroTik SXT Lite5',
                'TP-Link CPE510',
                'Cambium Networks ePMP Force 200',
                'HUAWEI AirEngine 5760-51',
                'Tri Hutchison Indonesia',
                'Starling',
                'Kraftons',
                'Stargazers',
                'Indosat Hutchinson',
                'Smart Technologies'
            ]),
            'IP' => $this->faker->unique()->ipv4,
            'alamat' => $faker->address,
            'username' => 'admin',
            'password' => 'inipassword'
        ];
    }
}
