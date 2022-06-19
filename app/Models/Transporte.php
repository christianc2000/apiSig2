<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;
    protected $protected = ['id', 'created_at', 'updated_at'];
    //relación inversa de 1 a muchos
    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }
}
