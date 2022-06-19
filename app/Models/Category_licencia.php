<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_licencia extends Model
{
    use HasFactory;
    protected $protected = ['id','created_at','updated_at'];
//relacion de 1 a muchos
    public function conductors(){
        return $this->hasMany(Conductor::class);
    }
}
