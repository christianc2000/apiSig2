<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class Conductor extends Model
{
    use HasFactory, ApiTrait;
    protected $protected = ['id', 'created_at', 'updated_at'];
    protected $allowIncluded = ['transportes', 'transportes.conductor'];
    protected $allowFilter = ['id', 'ci', 'names', 'lastname', 'date', 'sex', 'phone', 'mail'];
    protected $allowSort=['id', 'ci', 'names', 'lastname', 'date', 'sex', 'phone', 'mail'];
    //relación inversa de uno a uno
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //relación de 1 a muchos
    public function transportes()
    {
        return $this->hasMany(Transporte::class);
    }
    //relación inversa de 1 a muchos
    public function category_licencia()
    {
        return $this->belongsTo(Category_licencia::class);
    }
    //relación polimorfica
    public function image()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
    //para hacer una consulta http
    
}
