<?php

namespace App\Http\Controllers;

use App\Campana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Carbon;

use Illuminate\Support\Str;

class CampanaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




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

        if (auth()->user()->can('crear-campana'))
        {

            $validatedData = $request->validate([
                'descripción'   => 'required|max:200',
                'herramienta_id'     => 'required'

            ]);


            $empresa = DB::table('empresas')
                      ->select('id')
                      ->where('slug',session('slugEmpresa'))
                      ->get();

            $dt = Carbon::now();
            $passTmp = Str::random(10);

            $respuesta = Campana::create([
                'slug'              => $dt->timestamp,
                'empresa_id'        => $empresa[0]->id,
                'herramienta_id'    => $request->input('herramienta_id'),
                'descripcion'       => strtoupper($request->input('descripción')),
                'f_creación'        => Carbon::now(),
                'usuario_crea'      => Auth::user()->name,
                'estado'            => 'NUEVA',
                 ]);


            //$request->session()->forget('slugEmpresa');
            //notify()->success('Empresa registrada correctamente');
            Session::flash('message','Campaña registrada correctamente');
            return redirect()->action(
                [CampanaController::class, 'listarCampanas'], ['slug' => session('slugEmpresa')]
            );
        }
        return redirect('/empresa');


    }


    public function show(Campana $campana)
    {
        //
    }


    public function edit(Campana $campana)
    {
        //
    }


    public function update(Request $request, Campana $campana)
    {
        //
    }




    public function crearCampanas($slugEmpresa)
    {
        if (auth()->user()->can('crear-campana'))
        {

            $herramientas = DB::table('herramientas')
                      ->orderBy('nombre')
                      ->select('nombre','id')
                      ->get();

            $herramientas = $herramientas->pluck('nombre', 'id')->toArray();


            session(['slugEmpresa' => $slugEmpresa]);


            return view('campanas.crear',['slugEmpresa' => $slugEmpresa,
                                           'herramientas' => $herramientas]);
        }
        return redirect('/home');
    }

    public function listarCampanas($slugEmpresa)
    {
        //dd('Listar Campañas');

        if(auth()->user()->can('crear-campana'))
        {
            $empresa = DB::table('empresas')
            ->where('slug','=',$slugEmpresa)
            ->select('id','ruc','nombre','ciudad','representante','telefono','slug')
            ->get();

            $campanas = DB::table('campanas')
            ->join('herramientas', 'campanas.herramienta_id', '=', 'herramientas.id')
            ->where('campanas.empresa_id','=',$empresa[0]->id)
            ->select('campanas.*','herramientas.nombre as herramienta')
            ->paginate(10);

            //dd($campanas);

            return view('campanas.listar',['empresa' => $empresa[0],
                                            'campanas' => $campanas]);
        }
        //abort(403);
        return redirect('/home');

    }
}
