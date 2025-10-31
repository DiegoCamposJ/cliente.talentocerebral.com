<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table = 'personas';

    protected $primaryKey = 'id';


    protected $fillable = [
        'id_empresa','slug','identificacion','nombre', 'apellido', 'f_nacimiento', 'sexo', 'email', 'password','estado'
    ];


    // protected $fillable = [
    //     'empresa_id','name','identificacion', 'email', 'password','slug','genero','f_nacimiento','estado',
    //     'cambio_password','f_cambio_password','departamento','jefe','test','f_notificacion','rol'
    // ];


    // protected $hidden = [
    //     'password', 'remember_token',
    // ];


    // public function empresa()
    // {
    //     return $this->belongsTo(Empresa::class);
    // }


    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
