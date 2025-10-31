<?php

namespace App\Imports;

use App\User;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new User([
        //     'empresa_id'        => Auth::user()->empresa_id,
        //     'name'              => $row[0],
        //     'email'             => $row[1],
        //     'password'          => bcrypt(($row[2])),
        //     'estado'            => 'CARGADO',
        //     'identificacion'    => $row[2],
        //     'genero'            => $row[2],
        //     'departamento'      => $row[4],
        //     'jefe'              => $row[5],
        //     'test'              => $row[6],
        // ]);


        $Usuario=User::create([
            'empresa_id'        => Auth::user()->empresa_id,
            'name'              => strtoupper($row[0]),
            'email'             => $row[1],
            'identificacion'    => $row[2],
            'genero'            => $row[3],
            'departamento'      => $row[4],
            'jefe'              => $row[5],
            'password'          => bcrypt(($row[2])),
            'estado'            => 'CARGADO',

        ]);


        if($Usuario->jefe == 0)
            $Usuario->assignRole('evaluado');//CARGO ROL

        if($Usuario->jefe == 1)
            $Usuario->assignRole('evaluado');//CARGO ROL
            $Usuario->assignRole('jefe-inmediato');//CARGO ROL

        if($Usuario->jefe == 2)
        {
            $Usuario->assignRole('evaluado');//CARGO ROL
            $Usuario->assignRole('jefe-inmediato');//CARGO ROL
            $Usuario->assignRole('admin');
        }


        return $Usuario;


    }
}
