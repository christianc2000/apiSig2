<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class Category_licencia extends Model
{
    use HasFactory,ApiTrait;
    protected $protected = ['id', 'created_at', 'updated_at'];
    protected $allowIncluded = ['conductors', 'conductors.category_licencia'];
    protected $allowFilter = ['id', 'abreviacion'];
    protected $allowSort = ['id', 'abreviacion'];

    //relacion de 1 a muchos
    public function conductors()
    {
        return $this->hasMany(Conductor::class);
    }
   
}
