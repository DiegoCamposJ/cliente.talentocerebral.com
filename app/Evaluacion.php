<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'evaluaciones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'slug','persona_id','herramienta_id','campana_id', 'estado', 'ruta',
        'v1','v2','v3','v4','v5','v6','v7','v8','v9','v10','v11','v12',
    ];




    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
}
