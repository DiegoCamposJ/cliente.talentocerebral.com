<?php

namespace App\Imports;

use App\Departamento;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;






class DepartamentosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new Departamento([
        //
        // ]);



        $Departamento = Departamento::create([
            'empresa_id'            => Auth::user()->empresa_id,
            'nombre'                => strtoupper($row[1]),
            'estado'                => 'ACTIVO',
            'fecha_registro'        => Carbon::now(),
            'usuario_registro'      => Auth::user()->id,
            'codigo'                => strtoupper($row[0]),
            'departamento_padre'    => 0,
        ]);

        return $Departamento;
    }
}
