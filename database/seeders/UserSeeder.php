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
        $u=User::create([
            'name'=>'christian',
            'email'=>'chess@gmail.com',
            'password'=>bcrypt(12345678)
        ]);
        $cl=Category_licencia::all();
        Conductor::create([
            'ci' => '1100026',
            'names' => 'Juanito',
            'lastname' => 'Perez',
            'date' => '2000-01-04',
            'sex' => 'M',
            'phone' => '67637282',
            'mail' => $u->email,
            'category_licencia_id' => 2,
            'user_id' => $u->id
        ]);

        $u=User::create([
            'name'=>'juancito',
            'email'=>'juan@gmail.com',
            'password'=>bcrypt(12345678)
        ]);
        $cl=Category_licencia::all();
        Conductor::create([
            'ci' => '1100026',
            'names' => 'Juan',
            'lastname' => 'Parraga',
            'date' => '1999-01-04',
            'sex' => 'M',
            'phone' => '69837282',
            'mail' => $u->email,
            'category_licencia_id' => 3,
            'user_id' => $u->id
        ]);
    }
}
