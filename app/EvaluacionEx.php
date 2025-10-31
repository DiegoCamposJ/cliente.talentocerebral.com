<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionEx extends Model
{
    protected $table = 'evaluaciones_ex';

    protected $primaryKey = 'id';
    protected $fillable = [
        'usuario_id','herramienta_id','slug','estado','ruta','eva360','f_inicio','f_fin',
        'v1','v2','v3','v4','v5','v6','v7','v8'
    ];


    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }

    // public function preguntas()
    // {
    //     return $this->hasMany(Pregunta::class);
    // }


}
