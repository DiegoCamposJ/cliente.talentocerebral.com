<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{

    public function evaluacion()
    {
        return $this->belongsTo(Evaluacion::class);
    }
}
