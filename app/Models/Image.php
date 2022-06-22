<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    use HasFactory;
    protected $protected = ['id','created_at','updated_at'];
    //relación polimorfica
    public function imageable()
    {
        return $this->morphTo();
    }

}
