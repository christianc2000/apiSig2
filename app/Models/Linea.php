<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;
    protected $protected = ['id', 'created_at', 'updated_at'];
//relación de 1 a muchos
    public function transportes(){
        return $this->hasMany(Transporte::class);
    }
}
