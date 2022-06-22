<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category_licencia extends Model
{
    use HasFactory;
    protected $protected = ['id', 'created_at', 'updated_at'];
    protected $allowIncluded = ['conductors', 'conductors.category_licencia'];
    protected $allowFilter = ['id', 'abreviacion'];
    protected $allowSort = ['id', 'abreviacion'];

    //relacion de 1 a muchos
    public function conductors()
    {
        return $this->hasMany(Conductor::class);
    }
   /******************************** */
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
