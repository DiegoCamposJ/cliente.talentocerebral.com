<?php

namespace App\Imports;

use App\Persona;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PersonasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $dt = Carbon::now();

        $Persona=Persona::create([
            'identificacion'    => $row[2],
            'slug'              => Str::random(5).$dt->timestamp,
            'id_empresa'        => session('empresa_id'),
            'nombre'            => strtoupper($row[0]),
            'apellido'          => '',
            'sexo'              => $row[3],
            'email'             => $row[1],
            'password'          => '',
            'estado'            => 'ACTIVO',

        ]);

        return $Persona;


    }
}
