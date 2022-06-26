<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use  HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

/*    protected $allowIncluded = ['conductors', 'conductors.user'];
    protected $allowFilter = ['id', 'name', 'email'];
    protected $allowSort = ['id', 'name', 'email'];*/
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ci',
        'name',
        'lastname',
        'fecha_nac',
        'sex',
        'phone',
        'email',
        'password',
        'category_licencia_id',
    ];
    //Relación de 1 a muchos
    public function transportes(){
        return $this->hasMany(Transporte::class);
    }
    //relación de 1 a 1
    /* public function conductors(){
        return $this->hasOne(Conductor::class);
    }*/
    //************************************************* */
  /*  public function scopeIncluded(Builder $query)
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
    }*/
}
