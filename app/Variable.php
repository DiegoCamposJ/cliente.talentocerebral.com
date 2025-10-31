<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    public function herramienta()
    {
        return $this->belongsTo(Herramienta::class);
    }
}
