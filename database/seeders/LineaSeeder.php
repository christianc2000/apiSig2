<?php

namespace Database\Seeders;

use App\Models\Linea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class LineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Linea::create([
            'linea'=>1,
            'image'=>'/storage/imagenes/perfil/linea1.png'
        ]);
        Linea::create([
            'linea'=>2,
            'image'=>'/storage/imagenes/perfil/linea2.png'
        ]);
        Linea::create([
            'linea'=>5,
            'image'=>'/storage/imagenes/perfil/linea5.png'
        ]);
        Linea::create([
            'linea'=>8,
            'image'=>'/storage/imagenes/perfil/linea8.png'
        ]);
        Linea::create([
            'linea'=>9,
            'image'=>'/storage/imagenes/perfil/linea9.png'
        ]);Linea::create([
            'linea'=>10,
            'image'=>'/storage/imagenes/perfil/linea10.png'
        ]);
        Linea::create([
            'linea'=>11,
            'image'=>'/storage/imagenes/perfil/linea11.png'
        ]);
        Linea::create([
            'linea'=>16,
            'image'=>'/storage/imagenes/perfil/linea16.png'
        ]);
        Linea::create([
            'linea'=>17,
            'image'=>'/storage/imagenes/perfil/linea17.png'
        ]);
        Linea::create([
            'linea'=>18,
            'image'=>'/storage/imagenes/perfil/linea18.png'
        ]);
    }
}
