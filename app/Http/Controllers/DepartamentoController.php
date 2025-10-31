<?php

namespace App\Http\Controllers;

use App\Departamento;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


use Auth;
use App\Imports\DepartamentosImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class DepartamentoController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Departamento $departamento)
    {
        //
    }


    public function edit(Departamento $departamento)
    {
        //
    }


    public function update(Request $request, Departamento $departamento)
    {
        //
    }


    public function destroy(Departamento $departamento)
    {
        //
    }

    public function excelVista()
    {
        return view('BGR.h1.departamentos.cargar_departamentos');
    }

    //CARGA DESDE EXCEL
    public function excelUpBGR(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new DepartamentosImport, $file);

        notify()->success('Departamentos cargados correctamente');
        return redirect('listarDepartamentos');
    }

    public function listarDepartamentos()
    {
        $departamentos = DB::table('departamentos')
        ->where('empresa_id','=',Auth::user()->empresa_id)
        ->paginate(10);

        return view('BGR.h1.departamentos.listar_departamentos',['departamentos' => $departamentos]);
    }



}
