<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

use App\Http\Requests\CrearEmpresa;
use App\Http\Requests\EditarEmpresa;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;

use Illuminate\Support\Str;

class EmpresaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {


        if (auth()->user()->can('crear-empresa'))
        {
            $empresas = DB::table('empresas')
            ->select
            (
            'ruc',
            'nombre',
            'ciudad',
            'slug')
            ->orderBy('id', 'desc')
            ->paginate(10);


            return view('empresas.listar',['empresas' => $empresas]);
        }

        $empresas = DB::table('empresas')
            ->select
            (
            'ruc',
            'nombre',
            'ciudad',
            'slug')
            ->where('id', auth()->user()->empresa_id)
            ->paginate(10);


            return view('empresas.listar',['empresas' => $empresas]);



    }


    public function create()
    {
        if (auth()->user()->can('crear-empresa'))
        {
            return view('empresas.crear');
        }
        return redirect('/home');
    }


    public function store(CrearEmpresa $request)
    {

        if (auth()->user()->can('crear-empresa'))
        {
            $respuesta = Empresa::create([
                'ruc'           => $request->input('ruc'),
                'nombre'        => strtoupper($request->input('nombre')),
                'ciudad'        => strtoupper($request->input('ciudad')),
                'representante' => strtoupper($request->input('representante')),
                'email'         => $request->input('email'),
                'telefono'      => $request->input('telefono'),
                'slug'          => 'em'.Str::of($request->input('nombre'))->slug('-') .Str::random(5),
                'usuario_registra' => Auth::user()->name
                 ]);



            notify()->success('Empresa registrada correctamente');
            // Session::flash('message','Empresa registrada correctamente');
            return redirect('empresa');
        }
        return redirect('/home');
    }


    public function show(Empresa $empresa)
    {
        //
    }


    public function edit($slug)
    {
        if(auth()->user()->can('crear-empresa'))
        {
            $empresa = DB::table('empresas')
            ->where('slug','=',$slug)
            ->select('id','ruc','nombre','ciudad','representante','telefono','slug')
            ->get();

            return view('empresas.editar',['empresa' => $empresa[0]]);
        }
        //abort(403);
        return redirect('/home');
    }

    public function update(EditarEmpresa $request, $slug)
    {
        if (auth()->user()->can('crear-empresa'))
        {
            DB::table('empresas')
            ->where('slug', $slug)
            ->update(['nombre' => strtoupper($request->input('nombre')),
                    'ciudad' => strtoupper($request->input('ciudad')),
                    'representante' => strtoupper($request->input('representante')),
                    'telefono' => $request->input('telefono'),
                    'slug' => Str::of($request->input('nombre'))->slug('-') .'-'. Str::random(5)
                    ]);

            //Session::flash('message','Empresa actualizada correctamente');
            notify()->success('Empresa actualizada correctamente');
            return redirect('empresa');
        }
        return redirect('/home');


    }

}
