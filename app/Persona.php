<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Persona extends Authenticatable implements JWTSubject
{

    use Notifiable;
    protected $table = 'personas';

    protected $primaryKey = 'id';


    protected $fillable = [
        'id_empresa','slug','identificacion','nombre', 'apellido', 'f_nacimiento', 'sexo', 'email', 'password','estado'
    ];




    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
