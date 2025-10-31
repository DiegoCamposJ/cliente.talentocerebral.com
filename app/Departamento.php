<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    protected $primaryKey = 'id';
    protected $fillable = [
        'empresa_id','nombre','estado','fecha_registro','usuario_registro','codigo','departamento_padre'
    ];
}
