<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EvaluacionEx;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\CrearUsuario;
use Illuminate\Support\Facades\Auth;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Carbon;
use App\Traits\EvaluacionExTrait;



class UsuarioController extends Controller
{
    use EvaluacionExTrait;


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {

        if (auth()->user()->can('crear-usuario'))
        {
            $usuarios = DB::table('users')
            ->join('empresas', 'users.empresa_id', '=', 'empresas.id')
            ->where('users.estado','=','ACTIVO')
            ->select('users.*','empresas.nombre as nombreEmpresa')
            ->orderBy('users.id', 'desc')
            ->paginate(10);

            return view('usuarios.listar_usuarios',['usuarios' => $usuarios]);
        }
        return view('home');

    }




    public function create()
    {

        $empresas = DB::table('empresas')
                      ->orderBy('nombre')
                      ->select('nombre','id')
                      ->get();

        $empresas = $empresas->pluck('nombre', 'id')->toArray();

        $roles = DB::table('roles')
                        ->orderBy('name')
                        ->select('name','id')
                        ->where('id','!=',3)
                        ->where('id','!=',4)
                        ->get();



        $roles = $roles->pluck('name', 'name')->toArray();



        return view('usuarios.crear_usuario',['empresas' => $empresas,'roles'=>$roles]);



    }

    public function excelDownBGR()
    {
        return Excel::download(new UsersExport, 'lista_usuarios.xlsx');


    }

    // public function cargarUsuariosExcel()
    // {
    //     return view('usuarios.cargar_usuarios');
    // }

    public function excelVista()
    {
        return view('BGR.h1.usuarios.cargar_usuarios');
    }

    //CARGA DESDE EXCEL
    public function excelUpBGR(Request $request)
    {

        $file = $request->file('file');
        Excel::import(new UsersImport, $file);

        $usuarios = DB::table('users')
                ->where('empresa_id', Auth::user()->empresa_id)
                ->where('estado', 'CARGADO')
                ->select('users.*')
                ->get();


        foreach($usuarios as $usuario)
        {
                EvaluacionEx::create([
                'usuario_id'        => $usuario->id,
                'herramienta_id'    => 3,
                'slug'              => 'ev'.Str::random(3).strval($usuario->id).Str::random(3),

                 ]);
        }



        notify()->success('Usuarios cargados correctamente');
        return redirect('usuariosBGR');
    }

    public function createBGR()
    {
        return view('BGR.h1.usuarios.crear_usuario');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'empresa_id'        => 'required',
            'name'            => 'required|max:50',
            'identificacion'            => 'required|max:13',
            'email'             => 'required|email:rfc,dns',
            'rol'            => 'required',

        ]);


        $dt = Carbon::now();
        $passTmp = Str::random(10);

        $usuario = User::create([
            'empresa_id'        => $request->input('empresa_id'),
            'slug'              => $dt->timestamp,
            'name'              => strtoupper($request->input('name')),
            'identificacion'    => $request->input('identificacion'),
            'email'             => $request->input('email'),
            'password'          => Hash::make($passTmp),
            'genero'            => '',
            'departamento'      => 0,
            'jefe'              => 0,
            'test'              => 0,
            'estado'            => 'ACTIVO',
            'rol'               => $request->input('rol')

             ]);

        $usuario->assignRole($request->input('rol'));


        $details = [
            'nombre' => $usuario->name,
            'password' =>  $passTmp,
            'email' => $usuario->email,
         ];

        \Mail::to($usuario->email)->send(new \App\Mail\UsuarioCreado($details));
        //\Mail::to('diegocamposec@gmail.com')->send(new \App\Mail\UsuarioCreado($details));

        Session::flash('message','Usuario registrado correctamente');
        //notify()->success('Usuario registrado correctamente');
        return redirect('usuario');
    }

    public function storeBGR(CrearUsuario $request)
    {
        //dd('Ingreso Store');
        //dd(session('empresa_id'));

        $usuario = User::create([

            'empresa_id'        => Auth::user()->empresa_id,
            'name'              => strtoupper($request->input('name')),
            'identificacion'    => $request->input('identificacion'),
            'email'             => $request->input('email'),
            'password'          => Hash::make($request['identificacion']),

             ]);

        $usuario->assignRole('evaluado');


        EvaluacionEx::create([
            'usuario_id'        => $usuario->id,
            'herramienta_id'    => 3,
            'slug'              => 'ev'.Str::random(3).strval($usuario->id).Str::random(3),

             ]);

        $details = [
                'nombre' => $usuario->name,
                'password' => $usuario->identificacion,
                'email' => $usuario->email,
             ];

        \Mail::to($usuario->email)->send(new \App\Mail\UsuarioCreado($details));




        Session::flash('message','Usuario registrado correctamente');

        return redirect('usuariosBGR');
    }


    public function show(Request $request, $id)
    {
        $usuario = DB::table('users')
        ->where('id','=',$id)
        ->select('name','email')
        ->get();


        $request->session()->put('tipo_edit', 'show');

        //dd($request->session()->get('id_edit') . ' dc');

        return view('usuarios.password',['usuario' => $usuario[0],'id' => $id]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {


        if ($request->session()->get('tipo_edit') == 'edit' )
        {
            DB::table('users')
            ->where('id', $id)
            ->update(['name' => strtoupper($request->input('name')),
                    'email' => $request->input('email'),
                    //'password'      => Hash::make($request['password']),
                    'estado'    => $request->input('estado')
                    ]);

            $request->session()->forget('tipo_edit');
            Session::flash('message','Usuario actualizado correctamente');
            return redirect('usuarios');
        }
        else
        {
            DB::table('users')
            ->where('id', $id)
            ->update([
                  'password'      => Hash::make($request['password'])
                  ]);

            $request->session()->forget('tipo_edit');
            Session::flash('message','Contraseña actualizado correctamente');
            return redirect('usuario');
        }
    }


    public function EmpateNucleoBGRN1()
    {
        $evaluaciones = DB::select("SELECT * FROM braindb.evaluaciones_ex where estado='FINALIZADA' and (v1=v2 or v2=v3 or v1=v3 or (v1=v2 and v2=v3))");
        //dd($evaluaciones);

        foreach($evaluaciones as $evaluacion)
        {
            $v1_aux=0;
            $v2_aux=0;
            $v3_aux=0;

            if (($evaluacion->v1 == $evaluacion->v2) && ($evaluacion->v2 == $evaluacion->v3))
            {
                if($evaluacion->v7 > $evaluacion->v8 && $evaluacion->v7 > $evaluacion->v9)
                {
                    $v1_aux = $evaluacion->v1 + 1;

                    if($evaluacion->v8 > $evaluacion->v9)
                    {
                        $v2_aux = $evaluacion->v2;
                        $v3_aux = $evaluacion->v3 - 1;
                    }
                    else
                    {
                        $v2_aux = $evaluacion->v2 - 1;
                        $v3_aux = $evaluacion->v3;
                    }
                }

                if($evaluacion->v8 > $evaluacion->v7 && $evaluacion->v8 > $evaluacion->v9)
                {
                    $v2_aux = $evaluacion->v2 + 1;

                    if($evaluacion->v7 > $evaluacion->v9)
                    {
                        $v1_aux = $evaluacion->v1;
                        $v3_aux = $evaluacion->v3 - 1;
                    }
                    else
                    {
                        $v1_aux = $evaluacion->v1 - 1;
                        $v3_aux = $evaluacion->v3;
                    }
                }

                if($evaluacion->v9 > $evaluacion->v7 && $evaluacion->v9 > $evaluacion->v8)
                {
                    $v3_aux = $evaluacion->v3 + 1;

                    if($evaluacion->v7 > $evaluacion->v8)
                    {
                        $v1_aux = $evaluacion->v1;
                        $v2_aux = $evaluacion->v2 - 1;
                    }
                    else
                    {
                        $v1_aux = $evaluacion->v1 -1;
                        $v2_aux = $evaluacion->v2;
                    }
                }

            }
            else
            {
                if ($evaluacion->v1 == $evaluacion->v2)
                {
                    $v3_aux = $evaluacion->v3;

                    if($evaluacion->v7 > $evaluacion->v8)
                    {
                        $v1_aux = $evaluacion->v1 + 1;
                        $v2_aux = $evaluacion->v2 - 1;
                    }
                    else{
                        $v1_aux = $evaluacion->v1 - 1;
                        $v2_aux = $evaluacion->v2 + 1;
                    }

                }
                if ($evaluacion->v2 == $evaluacion->v3)
                {
                    $v1_aux = $evaluacion->v1;

                    if($evaluacion->v8 > $evaluacion->v9)
                    {
                        $v2_aux = $evaluacion->v2 + 1;
                        $v3_aux = $evaluacion->v3 - 1;
                    }
                    else{
                        $v2_aux = $evaluacion->v2 - 1;
                        $v3_aux = $evaluacion->v3 + 1;
                    }
                }

                if ($evaluacion->v1 == $evaluacion->v3)
                {
                    $v2_aux = $evaluacion->v2;
                    if($evaluacion->v7 > $evaluacion->v9)
                    {
                        $v1_aux = $evaluacion->v1 + 1;
                        $v3_aux = $evaluacion->v3 - 1;
                    }
                    else{
                        $v1_aux = $evaluacion->v1 - 1;
                        $v3_aux = $evaluacion->v3 + 1;
                    }
                }
            }


            $affected = DB::table('evaluaciones_ex')
                    ->where('id', $evaluacion->id)
                    ->update(['v1' => $v1_aux,
                              'v2' => $v2_aux,
                              'v3' => $v3_aux ]);


        }

        Session::flash('message','Finalizo Análisis de Empates EmpateNucleoBGRN1');
        return redirect('home');


    }

    public function EmpateNucleoBGRN2()
    {
        $evaluaciones = DB::select("SELECT * FROM braindb.evaluaciones_ex where estado='FINALIZADA' and (v4=v5 or v5=v6 or v4=v6 or (v4=v5 and v5=v6))");
        //dd($evaluaciones);

        foreach($evaluaciones as $evaluacion)
        {
            $v4_aux=0;
            $v5_aux=0;
            $v6_aux=0;

            if (($evaluacion->v4 == $evaluacion->v5) && ($evaluacion->v5 == $evaluacion->v6))
            {
                if($evaluacion->v10 > $evaluacion->v11 && $evaluacion->v10 > $evaluacion->v12)
                {
                    $v4_aux = $evaluacion->v4 + 1;

                    if($evaluacion->v11 > $evaluacion->v12)
                    {
                        $v5_aux = $evaluacion->v5;
                        $v6_aux = $evaluacion->v6 - 1;
                    }
                    else
                    {
                        $v5_aux = $evaluacion->v5 - 1;
                        $v6_aux = $evaluacion->v6;
                    }
                }

                if($evaluacion->v11 > $evaluacion->v10 && $evaluacion->v11 > $evaluacion->v12)
                {
                    $v5_aux = $evaluacion->v5 + 1;

                    if($evaluacion->v10 > $evaluacion->v12)
                    {
                        $v4_aux = $evaluacion->v4;
                        $v6_aux = $evaluacion->v6 - 1;
                    }
                    else
                    {
                        $v4_aux = $evaluacion->v4 - 1;
                        $v6_aux = $evaluacion->v6;
                    }
                }

                if($evaluacion->v12 > $evaluacion->v10 && $evaluacion->v12 > $evaluacion->v11)
                {
                    $v6_aux = $evaluacion->v6 + 1;

                    if($evaluacion->v10 > $evaluacion->v11)
                    {
                        $v4_aux = $evaluacion->v4;
                        $v5_aux = $evaluacion->v5 - 1;
                    }
                    else
                    {
                        $v4_aux = $evaluacion->v4 - 1;
                        $v5_aux = $evaluacion->v5;
                    }
                }

            }
            else
            {
                if ($evaluacion->v4 == $evaluacion->v5)
                {
                    $v6_aux = $evaluacion->v6;

                    if($evaluacion->v10 > $evaluacion->v11)
                    {
                        $v4_aux = $evaluacion->v4 + 1;
                        $v5_aux = $evaluacion->v5 - 1;
                    }
                    else{
                        $v4_aux = $evaluacion->v4 - 1;
                        $v5_aux = $evaluacion->v5 + 1;
                    }

                }
                if ($evaluacion->v5 == $evaluacion->v6)
                {
                    $v4_aux = $evaluacion->v4;

                    if($evaluacion->v11 > $evaluacion->v12)
                    {
                        $v5_aux = $evaluacion->v5 + 1;
                        $v6_aux = $evaluacion->v6 - 1;
                    }
                    else{
                        $v5_aux = $evaluacion->v5 - 1;
                        $v6_aux = $evaluacion->v6 + 1;
                    }
                }

                if ($evaluacion->v4 == $evaluacion->v6)
                {
                    $v5_aux = $evaluacion->v5;
                    if($evaluacion->v10 > $evaluacion->v12)
                    {
                        $v4_aux = $evaluacion->v4 + 1;
                        $v6_aux = $evaluacion->v6 - 1;
                    }
                    else{
                        $v4_aux = $evaluacion->v4 - 1;
                        $v6_aux = $evaluacion->v6 + 1;
                    }
                }
            }


            $affected = DB::table('evaluaciones_ex')
                    ->where('id', $evaluacion->id)
                    ->update(['v4' => $v4_aux,
                              'v5' => $v5_aux,
                              'v6' => $v6_aux ]);


        }

        Session::flash('message','Finalizo Análisis de Empates EmpateNucleoBGRN1');
        return redirect('home');


    }


    public function EmpateCaosBGRN1()
    {
        $evaluaciones = DB::select("SELECT * FROM braindb.evaluaciones_ex where estado='FINALIZADA' and (v7=v8 or v8=v9 or v7=v9 or (v7=v8 and v8=v9))");
        //dd($evaluaciones);

        foreach($evaluaciones as $evaluacion)
        {
            $v7_aux=0;
            $v8_aux=0;
            $v9_aux=0;

            if (($evaluacion->v7 == $evaluacion->v8) && ($evaluacion->v8 == $evaluacion->v9))
            {
                $v7_aux = $evaluacion->v7 + 1;
                $v8_aux = $evaluacion->v8;
                $v9_aux = $evaluacion->v9 - 1;
            }
            else
            {
                if ($evaluacion->v7 == $evaluacion->v8)
                {
                    $v7_aux = $evaluacion->v7 + 1;
                    $v8_aux = $evaluacion->v8 - 1;

                    $v9_aux = $evaluacion->v9;
                }
                if ($evaluacion->v8 == $evaluacion->v9)
                {
                    $v7_aux = $evaluacion->v7;

                    $v8_aux = $evaluacion->v8 + 1;
                    $v9_aux = $evaluacion->v9 - 1;

                }

                if ($evaluacion->v7 == $evaluacion->v9)
                {
                    $v7_aux = $evaluacion->v7 + 1 ;
                    $v8_aux = $evaluacion->v8;
                    $v9_aux = $evaluacion->v9 - 1;

                }
            }


            $affected = DB::table('evaluaciones_ex')
                    ->where('id', $evaluacion->id)
                    ->update(['v7' => $v7_aux,
                              'v8' => $v8_aux,
                              'v9' => $v9_aux ]);


        }

        Session::flash('message','Finalizo Análisis de Empates Caos Nivel 1');
        return redirect('home');

    }

    public function EmpateCaosBGRN2()
    {
        $evaluaciones = DB::select("SELECT * FROM braindb.evaluaciones_ex where estado='FINALIZADA' and (v10=v11 or v11=v12 or v10=v12 or (v10=v11 and v11=v12))");

        foreach($evaluaciones as $evaluacion)
        {
            $v10_aux=0;
            $v11_aux=0;
            $v12_aux=0;

            if (($evaluacion->v10 == $evaluacion->v11) && ($evaluacion->v11 == $evaluacion->v12))
            {
                $v10_aux = $evaluacion->v10 - 1;
                $v11_aux = $evaluacion->v11;
                $v12_aux = $evaluacion->v12 + 1;
            }
            else
            {
                if ($evaluacion->v10 == $evaluacion->v11)
                {
                    $v10_aux = $evaluacion->v10 - 1;
                    $v11_aux = $evaluacion->v11 + 1;

                    $v12_aux = $evaluacion->v12;
                }
                if ($evaluacion->v11 == $evaluacion->v12)
                {
                    $v10_aux = $evaluacion->v10;
                    $v11_aux = $evaluacion->v11 - 1;
                    $v12_aux = $evaluacion->v12 + 1;

                }

                if ($evaluacion->v10 == $evaluacion->v12)
                {
                    $v10_aux = $evaluacion->v10 - 1 ;
                    $v11_aux = $evaluacion->v11;
                    $v12_aux = $evaluacion->v12 + 1;

                }
            }


            $affected = DB::table('evaluaciones_ex')
                    ->where('id', $evaluacion->id)
                    ->update(['v10' => $v10_aux,
                              'v11' => $v11_aux,
                              'v12' => $v12_aux ]);


        }

        Session::flash('message','Finalizo Análisis de Empates Caos Nivel 2');
        return redirect('home');

    }





    public function reprocesoBGR()
    {
        $evaluaciones = DB::table('evaluaciones_ex')
        ->where('evaluaciones_ex.v1', 0)
        ->where('evaluaciones_ex.v12', 0)
        ->where('evaluaciones_ex.estado', 'FINALIZADA')
        ->select('evaluaciones_ex.id','estado' )
        ->limit(10)
        ->get();

        //dd($evaluaciones);



        foreach($evaluaciones as $evaluacion)
            {
                $this->evaluarNucleo($evaluacion->id,'PIONERO','v1');
                $this->evaluarNucleo($evaluacion->id,'ADAPTADOR TEMPRANO','v2');
                $this->evaluarNucleo($evaluacion->id,'MAYORIA TEMPRANA','v3');
                $this->evaluarNucleo($evaluacion->id,'PRAGMATICO','v4');
                $this->evaluarNucleo($evaluacion->id,'CONSERVADOR','v5');
                $this->evaluarNucleo($evaluacion->id,'ESCEPTICO','v6');

                $this->nucleoFinal($evaluacion->id);
                $this->caosFinal($evaluacion->id);
            }

        //dd($evaluaciones);
        Session::flash('message','Finalizo tarea ...');
            return redirect('home');
    }



    public function usuariosBGR()
    {

        session(['empresa_id' => Auth::user()->empresa_id]);

        $usuarios = DB::table('users')
        ->join('evaluaciones_ex', 'users.id', '=', 'evaluaciones_ex.usuario_id')
        ->join('departamentos', 'users.departamento', '=', 'departamentos.id')
        ->where('users.empresa_id','=',Auth::user()->empresa_id)
        //->where('evaluaciones_ex.estado','FINALIZADA')
        //->where('evaluaciones_ex.v1',0)
        ->orderBy('users.name', 'asc')
        ->select('users.identificacion','users.name','users.email','evaluaciones_ex.slug as evaluacion_slug',
                'evaluaciones_ex.estado as evaluacion_estado','departamentos.nombre as departamento')
        ->get();

        return view('BGR.h1.usuarios.listar_usuarios',compact('usuarios'));

        //dd($usuarios);

        //        ->paginate(20);



        //return view('BGR.h1.usuarios.listar_usuarios',['usuarios' => $usuarios]);
    }

    


}
