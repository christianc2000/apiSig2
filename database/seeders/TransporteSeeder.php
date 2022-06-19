<?php

namespace Database\Seeders;

use App\Models\Transporte;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transporte::create(
            [
                'placa' => "12kl3",
                'modelo' => "susuki 2015",
                'linea' => 3,
                'cantidad_asiento' => 40,
                'numero_interno' => 12,
                'fecha_asignacion' => "2022-01-03",
                'fecha_baja' => "2022-06-18",
                'conductor_id' => 1
            ]
        );

        Transporte::create(
            [
                'placa' => "n3jk2",
                'modelo' => "Toyota Hilux",
                'linea' => 5,
                'cantidad_asiento' => 38,
                'numero_interno' => 15,
                'fecha_asignacion' => "2021-05-03",
                'fecha_baja' => "2022-06-18",
                'conductor_id' => 1
            ]
        );
    }
}
