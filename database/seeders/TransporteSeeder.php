<?php

namespace Database\Seeders;

use App\Models\Linea;
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
        $l=Linea::all()->first();
        Transporte::create(
            [
                'placa' => "12kl3",
                'modelo' => "susuki 2015",
                'cantidad_asiento' => 40,
                'numero_interno' => 12,
                'fecha_asignacion' => "2022-01-03",
                'fecha_baja' => "2022-06-18",
                'user_id' => 1,
                'linea_id' => $l->id,
            ]
        );


    }
}
