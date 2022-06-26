<?php

namespace Database\Seeders;

use App\Models\Category_licencia;
use App\Models\Conductor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user=conductors
        $u=User::create([
            'ci' => '1100026',
            'name'=>'Christian',
            'lastname' => 'Mamani',
            'fecha_nac' => '2000-01-04',
            'sex' => 'M',
            'phone' => '67637282',
            'email'=>'chess@gmail.com',
            'password'=>bcrypt(12345678),
            'category_licencia_id' => 2,
        ]);
      
    }
}
