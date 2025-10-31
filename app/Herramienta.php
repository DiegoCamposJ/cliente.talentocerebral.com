<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    public function variables()
    {
        return $this->hasMany(Variable::class);
    }
}
