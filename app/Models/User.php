<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\ApiTrait;
use Illuminate\Database\Query\Builder;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use  HasApiTokens, Notifiable,ApiTrait;
    protected $allowIncluded = ['conductors', 'conductors.user'];
    protected $allowFilter = ['id', 'name', 'email'];
    protected $allowSort=['id', 'name', 'email'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //relación de 1 a 1
    public function conductors(){
        return $this->hasOne(Conductor::class);
    }
    //************************************************* */
    
}
