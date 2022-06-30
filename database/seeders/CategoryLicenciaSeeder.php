<?php

namespace Database\Seeders;

use App\Models\Category_licencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryLicenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category_licencia::create([
            'abreviacion'=>'B',//PROFESIONAL B
        ]);
        Category_licencia::create([
            'abreviacion'=>'C',//PROFESIONAL C
        ]);
        Category_licencia::create([
            'abreviacion'=>'T', //MOTORISTA
        ]);

    }
}
