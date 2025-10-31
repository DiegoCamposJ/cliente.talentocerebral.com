<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campana extends Model
{
    public $timestamps = false;

    protected $table = 'campanas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'slug','empresa_id','herramienta_id','descripcion', 'estado', 'participantes', 'usuario_crea', 'usuario_actualiza', 'f_creación','f_actualizacion'
    ];




}
