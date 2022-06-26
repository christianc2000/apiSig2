<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;

class Conductor extends Model
{
    use HasFactory;
    protected $protected = ['id', 'created_at', 'updated_at'];
    protected $allowIncluded = ['transportes', 'transportes.conductor'];
    protected $allowFilter = ['id', 'ci', 'names', 'lastname', 'date', 'sex', 'phone', 'mail'];
    protected $allowSort=['id', 'ci', 'names', 'lastname', 'date', 'sex', 'phone', 'mail'];
    //relación inversa de uno a uno
    /*public function user()
    {
        return $this->belongsTo(User::class);
    }*/
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
    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }
        $relations = explode(',', request('included')); //explode conveierte un string con ',' en array['transportes','relacion'] 

        $allowIncluded = collect($this->allowIncluded);
        foreach ($relations as $key => $relationsShip) {
            if (!$allowIncluded->contains($relationsShip)) {
                unset($relations[$key]);
            }
        }
        $query->with($relations);
    }
    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }
        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);
        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }
    public function scopeSort(Builder $query)
    {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }
        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);
        foreach ($sortFields as $sortField) {
            $direction = 'asc';
            if (substr($sortField, 0, 1) == '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }
            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }
}
