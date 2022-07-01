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
            'image'=>'public/lineas/linea1.png'
        ]);
        Linea::create([
            'linea'=>2,
            'image'=>'public/lineas/linea2.png'
        ]);
        Linea::create([
            'linea'=>5,
            'image'=>'public/lineas/linea5.png'
        ]);
        Linea::create([
            'linea'=>8,
            'image'=>'public/lineas/linea8.png'
        ]);
        Linea::create([
            'linea'=>9,
            'image'=>'public/lineas/linea9.png'
        ]);Linea::create([
            'linea'=>10,
            'image'=>'public/lineas/linea10.png'
        ]);
        Linea::create([
            'linea'=>11,
            'image'=>'public/lineas/linea11.png'
        ]);
        Linea::create([
            'linea'=>16,
            'image'=>'public/lineas/linea16.png'
        ]);
        Linea::create([
            'linea'=>17,
            'image'=>'public/lineas/linea17.png'
        ]);
        Linea::create([
            'linea'=>18,
            'image'=>'public/lineas/linea18.png'
        ]);
    }
}
