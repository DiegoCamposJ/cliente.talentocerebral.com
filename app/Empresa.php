<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    protected $table = 'empresas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'slug','ruc', 'nombre', 'direccion', 'telefono', 'ciudad', 'representante','url','estado','usuario_registra','usuario_actualiza'
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

}



