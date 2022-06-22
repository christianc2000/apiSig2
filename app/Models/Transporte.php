<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class Transporte extends Model
{
    use HasFactory,ApiTrait;
    protected $protected = ['id', 'created_at', 'updated_at'];
    protected $allowIncluded = ['conductors','conductors.transporte'];
    protected $allowFilter = ['id', 'placa', 'modelo', 'linea', 'cantidad_asiento', 'numero_interno', 'fecha_asignacion', 'fecha_baja', 'conductor_id'];
    protected $allowSort = ['id', 'placa', 'modelo', 'linea', 'cantidad_asiento', 'numero_interno', 'fecha_asignacion', 'fecha_baja', 'conductor_id'];
    //relación inversa de 1 a muchos
    public function conductor()
    {
        return $this->belongsTo(Conductor::class);
    }
  
}
