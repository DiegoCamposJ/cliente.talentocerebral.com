<?php

namespace App\Http\Controllers;

use App\EvaluacionEx;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Requests\GuardarRespuestaSituacion;
use Illuminate\Support\Str;
use App\Traits\EvaluacionExTrait;
use App\Traits\BGRTrait;


class EvaluacionExController extends Controller
{

    use EvaluacionExTrait;
    use BGRTrait;


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {


        $evaluaciones = DB::table('evaluaciones_ex')
            ->join('herramientas', 'evaluaciones_ex.herramienta_id', '=', 'herramientas.id')
            ->select('herramientas.nombre','evaluaciones_ex.estado','evaluaciones_ex.id','evaluaciones_ex.slug')
            ->where('evaluaciones_ex.usuario_id', Auth::user()->id)
            ->orderBy('evaluaciones_ex.id', 'desc')
            ->paginate(5);


            return view('BGR.h1.evaluacion.listar_evaluaciones',['evaluaciones' => $evaluaciones]);



    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $evaluacion = DB::table('evaluaciones_ex')
            ->where('slug', $id)
            ->select('estado','usuario_id','f_inicio')
            ->first();

        //SI LA EVALUACION ESTA EN PROCESO SE VERIFICA TIEMPO TRASCURRIDO
        if($evaluacion->estado == "PROCESO")
        {
            $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
            //dd($trasncurrido);
            if($trasncurrido > 45)
            {
                DB::table('evaluaciones_ex')
                ->where('slug', $id)
                ->update(['estado' => 'ABANDONADA']);

                return view('BGR.h1.evaluacion.evaluacion_2mensaje');
            }
            else
                return view('BGR.h1.evaluacion.evaluacion_1mensaje',['slug' => $id]);
        }

        //ACTUALIZO INFORMACIÓN DE LA EVALUACION CUANDO ES EL PRIMER INGRESO
        if($evaluacion->estado == "PENDIENTE")
        {
            //SE CREA SLUG Y ACTUALIZA ESTADO DEL USUARIO
            DB::table('users')
            ->where('id', $evaluacion->usuario_id)
            ->where('estado', 'CARGADO')
            ->update([ 'slug'   => 'us'.Str::random(3).strval($evaluacion->usuario_id).Str::random(3),
                    'estado' => 'ACTIVO']);


            DB::table('evaluaciones_ex')
            ->where('slug', $id)
            ->update(['estado' => 'PROCESO','ruta' => 'SITUACION1', 'f_inicio' => Carbon::now()]);
            return view('BGR.h1.evaluacion.evaluacion_1mensaje',['slug' => $id]);
        }
        return redirect('evaluacionex');
    }


    public function edit($id)
    {

        $evaluacion = DB::table('evaluaciones_ex')
            ->where('slug', $id)
            ->select('slug','estado','ruta','id')
            ->get();

        $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->count();

        if($cntpreguntas == 0)
        {

            $cnt = DB::table('preguntas_ex')->count();

            $variables = DB::table('variables')
            ->where('herramienta_id', 3)
            ->select('variables.*')
            ->get();

            $eva = $evaluacion[0]->id;

            foreach($variables as $variable)
            {
                $cnt++;

                DB::table('preguntas_ex')->insert([
                    'evaluacionesEx_id' => $eva,
                    'slug'              => 'pr'.Str::random(6).strval($cnt),
                    'descripcion'       => $variable->descripcion,
                    'valor'             => 0,
                    'estado'            => 'ACTIVO',
                    'color'             => $variable->color,
                    'tipo'              => $variable->tipo,
                    'situacion_id'      => $variable->situacion_id,
                    'pareja'            => $variable->pareja,
                ]);
            }

        }



        if($evaluacion[0]->estado == "PROCESO")
        {
            $codigoSituacion=0;
            switch ($evaluacion[0]->ruta) {
                case "SITUACION1":
                    $codigoSituacion=1;
                    break;
                case "SITUACION2":
                    $codigoSituacion=2;
                    break;
                case "SITUACION3":
                    $codigoSituacion=3;
                    break;
                case "SITUACION4":
                    $codigoSituacion=4;
                    break;
                case "SITUACION5":
                    $codigoSituacion=5;
                    break;
                case "SITUACION6":
                    $codigoSituacion=6;
                    break;
                case "SITUACION7":
                    $codigoSituacion=7;
                    break;

                case "SITUACION8":
                    $codigoSituacion=8;
                    break;

                case "SITUACION9":
                    $codigoSituacion=9;
                    break;

            }

            $s_descripcion = DB::table('situaciones')
            ->where('codigo', $codigoSituacion)
            ->select('situaciones.*')
            ->get();





            if(count($s_descripcion) > 0)
            {

                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $s_descripcion[0]->codigo)
                ->count();



                $continua = true;
                if($codigoSituacion == 7 && $cntpreguntas <= 5)
                    {
                        $codigoSituacion++;
                    }

                if($codigoSituacion == 8 && $cntpreguntas > 0)
                {
                    $pareja = DB::table('preguntas_ex')
                        ->select('preguntas_ex.*')
                        ->where('situacion_id', $codigoSituacion)
                        ->where('estado', 'ACTIVO')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->inRandomOrder()
                        ->first();


                        $preguntas = DB::table('preguntas_ex')
                        ->select('preguntas_ex.*')
                        ->where('situacion_id', $codigoSituacion)
                        ->where('estado', 'ACTIVO')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->where('pareja', $pareja->pareja)
                        ->inRandomOrder()
                        ->get();

                        return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                    'evaluacion' => $evaluacion[0],
                                                                    'situacion'  => $s_descripcion[0]]);

                }



                if($continua == true)
                {

                    $preguntas = DB::table('preguntas_ex')
                    ->select('preguntas_ex.*')
                    ->where('situacion_id', $codigoSituacion)
                    ->where('estado', 'ACTIVO')
                    ->where('evaluacionesEx_id', $evaluacion[0]->id)
                    ->inRandomOrder()
                    ->get();




                    return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                    'evaluacion' => $evaluacion[0],
                                                                    'situacion'  => $s_descripcion[0]]);
                }
                else{
                    $affected = DB::table('evaluaciones_ex')
                    ->where('slug', $id)
                    ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

                    return redirect('evaluacionex');
                }
            }
            else{

                $affected = DB::table('evaluaciones_ex')
                ->where('slug', $id)
                ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

                return redirect('evaluacionex');
            }

        }




        return redirect('evaluacionex');
    }


    public function update(Request $request, $id)
    {

        // dd($request->input('respuesta'));

        // // $this->validate($request, [
        // //     'respuesta' => 'required|max:30'
        // // ]);

        // $evaluacion = DB::table('evaluaciones_ex')
        //     ->where('slug', $id)
        //     ->select('slug','estado','ruta')
        //     ->get();

        // if ( $evaluacion[0]->estado == "PENDIENTE" )
        // {
        //     $preguntas = DB::table('preguntas_ex')
        //         ->join('evaluaciones_ex', 'preguntas_ex.evaluacionesEx_id', '=', 'evaluaciones_ex.id')
        //         ->select('preguntas_ex.*')
        //         ->where('evaluaciones_ex.usuario_id', Auth::user()->id)
        //         ->where('preguntas_ex.codigoSituacion_id', 1)
        //         ->where('evaluaciones_ex.estado', 'PROCESO')
        //         ->inRandomOrder()
        //         ->get();

        //         return view('BGR.h1.evaluacion.evaluacion_codigoSituacion1',['preguntas'  => $preguntas,'evaluacion' => $evaluacion[0]]);
        // }


        // $affected = DB::table('preguntas_ex')
        // ->where('slug', $request->input('respuesta'))
        // ->update([  'fecha_respuesta' => Carbon::now(),
        //             'usuario_actualiza' => Auth::user()->name,
        //             'estado'   => 'SELECCIONADA',
        //             'valor'     => 10
        // ]);



        // //dd($evaluacion);
        //     if ($evaluacion[0]->estado == "PENDIENTE")
        //     {


        //         $preguntas = DB::table('preguntas_ex')
        //         ->join('evaluaciones_ex', 'preguntas_ex.evaluacionesEx_id', '=', 'evaluaciones_ex.id')
        //         ->select('preguntas_ex.*')
        //         ->where('evaluaciones_ex.usuario_id', Auth::user()->id)
        //         ->where('preguntas_ex.codigoSituacion_id', 2)
        //         ->where('evaluaciones_ex.estado', 'PROCESO')
        //         ->inRandomOrder()
        //         ->get();

        //         return view('BGR.h1.evaluacion.evaluacion_ssorpresiva',['preguntas'  => $preguntas,'evaluacion' => $evaluacion[0]]);

        //     }
        //     if ( $evaluacion[0]->estado == "PROCESO" && $evaluacion[0]->ruta == "S_CAOTICA" )
        //     {
        //         $affected = DB::table('evaluaciones_ex')
        //         ->where('slug', $id)
        //         ->update(['ruta' => 'S_SORPRESA']);

        //         $preguntas = DB::table('preguntas_ex')
        //         ->join('evaluaciones_ex', 'preguntas_ex.evaluacionesEx_id', '=', 'evaluaciones_ex.id')
        //         ->select('preguntas_ex.*')
        //         ->where('evaluaciones_ex.usuario_id', Auth::user()->id)
        //         ->where('preguntas_ex.codigoSituacion_id', 3)
        //         ->where('evaluaciones_ex.estado', 'PROCESO')
        //         ->inRandomOrder()
        //         ->get();

        //         return view('BGR.h1.evaluacion.evaluacion_codigoSituacion3',['preguntas'  => $preguntas,'evaluacion' => $evaluacion[0]]);



        //     }

        //     if ( $evaluacion[0]->estado == "PROCESO" && $evaluacion[0]->ruta == "S_SORPRESA" )
        //     {

        //         $preguntas = DB::table('preguntas_ex')
        //         ->join('evaluaciones_ex', 'preguntas_ex.evaluacionesEx_id', '=', 'evaluaciones_ex.id')
        //         ->select('preguntas_ex.*')
        //         ->where('evaluaciones_ex.usuario_id', Auth::user()->id)
        //         ->where('preguntas_ex.codigoSituacion_id', 3)
        //         ->where('evaluaciones_ex.estado', 'PROCESO')
        //         ->inRandomOrder()
        //         ->get();

        //         return view('BGR.h1.evaluacion.evaluacion_codigoSituacion3',['preguntas'  => $preguntas,'evaluacion' => $evaluacion[0]]);



        //     }

        //     $affected = DB::table('evaluaciones_ex')
        //         ->where('slug', $id)
        //         ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

        //     return redirect('evaluacionex');
    }


    public function evaluacionJefe()
    {
        $evaluaciones = DB::table('evaluaciones_ex')
            ->join('herramientas', 'evaluaciones_ex.herramienta_id', '=', 'herramientas.id')
            ->join('users', 'evaluaciones_ex.usuario_id', '=', 'users.id')
            ->select('herramientas.nombre','evaluaciones_ex.estado','evaluaciones_ex.id','evaluaciones_ex.slug', 'users.name as evaluado')
            ->where('users.departamento', Auth::user()->departamento)
            ->where('users.jefe', 0)
            ->where('evaluaciones_ex.eva360', 'NO')
            ->orderBy('evaluaciones_ex.id', 'desc')
            ->paginate(5);


            return view('BGR.h1.evaluacion.listar_evaluaciones_jefe',['evaluaciones' => $evaluaciones]);

    }



    public function resultadoEva($id)
    {
        $evaluacion = DB::table('evaluaciones_ex')
        ->join('users', 'evaluaciones_ex.usuario_id', '=', 'users.id')
        ->where('evaluaciones_ex.slug', $id)
            ->select('evaluaciones_ex.id','users.name as usuario' )
            ->first();

            $this->evaluarNucleo($evaluacion->id,'PIONERO','v1');
            $this->evaluarNucleo($evaluacion->id,'ADAPTADOR TEMPRANO','v2');
            $this->evaluarNucleo($evaluacion->id,'MAYORIA TEMPRANA','v3');
            $this->evaluarNucleo($evaluacion->id,'PRAGMATICO','v4');
            $this->evaluarNucleo($evaluacion->id,'CONSERVADOR','v5');
            $this->evaluarNucleo($evaluacion->id,'ESCEPTICO','v6');

            $this->nucleoFinal($evaluacion->id);
            $this->caosFinal($evaluacion->id);

            $evaluacion = DB::table('evaluaciones_ex')
            ->join('users', 'evaluaciones_ex.usuario_id', '=', 'users.id')
            ->where('evaluaciones_ex.slug', $id)
            ->select('evaluaciones_ex.*','users.name as usuario' )
            ->first();



        return view('BGR.h1.usuarios.resultado_usuario',['evaluacion' => $evaluacion,
                                                        'usuario' => $evaluacion->usuario]);

    }


    public function preguntasEvaluado($id)
    {

        $evaluacion = DB::table('evaluaciones_ex')
            ->where('evaluaciones_ex.slug', $id)
            ->join('users', 'evaluaciones_ex.usuario_id', '=', 'users.id')
            ->select('evaluaciones_ex.id','evaluaciones_ex.slug','evaluaciones_ex.estado','evaluaciones_ex.ruta', 'users.name as evaluado' )
            ->first();

        //dd($evaluacion);

        $preguntas = DB::table('preguntas_ex')
                ->select('preguntas_ex.*')
                ->where('situacion_id', 10)
                ->where('estado', 'ACTIVO')
                ->where('evaluacionesEx_id', $evaluacion->id)
                ->inRandomOrder()
                ->get();

        //dd($preguntas);

        $situacion = DB::table('situaciones')
                ->where('codigo', 10)
                ->select('situaciones.*')
                ->first();


        return view('BGR.h1.evaluacion.evaluacion_situacion10',
                ['preguntas'  => $preguntas,
                 'situacion'  => $situacion,
                 'evaluado' => $evaluacion->evaluado]);

    }

    // public function evaluacionArea()
    // {


    //     $evaluacion = DB::table('evaluaciones_ex')
    //     ->where('estado', 'FINALIZADA')
    //     ->select('v1')
    //         ->groupBy('v1')
    //         ->orderByRaw('count(v1) DESC')
    //         ->first();

    //     dd($evaluacion->v1);

    // }

    public function evaluacionArea($id)
    {

        $cntEvaluaciones=0;
        $v1=0;$v2=0;$v3=0;$v4=0;$v5=0;$v6=0;
        $cnt1=0;$cnt2=0;$cnt3=0;$cnt4=0;$cnt5=0;$cnt6=0;


        $departamentoN ='BGR';

        //NOMBRE DEL DEPARTAMENTO
        if($id>0){

            $departamento = DB::table('departamentos')
            ->where('id','=',$id)
            ->get();

            $departamentoN = $departamento[0]->nombre;

        }

        if($id == 0)
        {

            // $cntEvaluaciones = DB::table('evaluaciones_ex')
            //     ->where('estado', 'FINALIZADA')
            //     ->count();

            $vn1 = DB::select("SELECT v1,count(v1) as cnt FROM braindb.evaluaciones_ex where estado='FINALIZADA' group by v1 order by count(v1) desc limit 1");
            $vn2 = DB::select("SELECT v2,count(v2) as cnt FROM braindb.evaluaciones_ex where estado='FINALIZADA' group by v2 order by count(v2) desc limit 1");
            $vn3 = DB::select("SELECT v3,count(v3) as cnt FROM braindb.evaluaciones_ex where estado='FINALIZADA' group by v3 order by count(v3) desc limit 1");
            $vn4 = DB::select("SELECT v4,count(v4) as cnt FROM braindb.evaluaciones_ex where estado='FINALIZADA' group by v4 order by count(v4) desc limit 1");
            $vn5 = DB::select("SELECT v5,count(v5) as cnt FROM braindb.evaluaciones_ex where estado='FINALIZADA' group by v5 order by count(v5) desc limit 1");
            $vn6 = DB::select("SELECT v6,count(v6) as cnt FROM braindb.evaluaciones_ex where estado='FINALIZADA' group by v6 order by count(v6) desc limit 1");
            //dd($evaluaciones);



        }
        else{

            //SELECT v6,count(v6) as cnt FROM braindb.evaluaciones_ex E JOIN braindb.users U ON U.id = E.usuario_id where E.estado='FINALIZADA' and U.departamento=17 group by v6 order by count(v6) desc limit 1;
            $vn1 = DB::select("SELECT v1,count(v1) as cnt FROM braindb.evaluaciones_ex E JOIN braindb.users U ON U.id = E.usuario_id where E.estado='FINALIZADA' and U.departamento=$id group by v1 order by count(v1) desc limit 1");
            $vn2 = DB::select("SELECT v2,count(v2) as cnt FROM braindb.evaluaciones_ex E JOIN braindb.users U ON U.id = E.usuario_id where E.estado='FINALIZADA' and U.departamento=$id group by v2 order by count(v2) desc limit 1");
            $vn3 = DB::select("SELECT v3,count(v3) as cnt FROM braindb.evaluaciones_ex E JOIN braindb.users U ON U.id = E.usuario_id where E.estado='FINALIZADA' and U.departamento=$id group by v3 order by count(v3) desc limit 1");
            $vn4 = DB::select("SELECT v4,count(v4) as cnt FROM braindb.evaluaciones_ex E JOIN braindb.users U ON U.id = E.usuario_id where E.estado='FINALIZADA' and U.departamento=$id group by v4 order by count(v4) desc limit 1");
            $vn5 = DB::select("SELECT v5,count(v5) as cnt FROM braindb.evaluaciones_ex E JOIN braindb.users U ON U.id = E.usuario_id where E.estado='FINALIZADA' and U.departamento=$id group by v5 order by count(v5) desc limit 1");
            $vn6 = DB::select("SELECT v6,count(v6) as cnt FROM braindb.evaluaciones_ex E JOIN braindb.users U ON U.id = E.usuario_id where E.estado='FINALIZADA' and U.departamento=$id group by v6 order by count(v6) desc limit 1");

        }


        // $v1=($vn1[0]->v1*100)/157;
        // $v2=($vn2[0]->v2*100)/157;
        // $v3=($vn3[0]->v3*100)/157;
        // $v4=($vn4[0]->v4*100)/157;
        // $v5=($vn5[0]->v5*100)/157;
        // $v6=($vn6[0]->v6*100)/157;

        // $cntEvaluaciones = $vn1[0]->cnt + $vn2[0]->cnt + $vn3[0]->cnt + $vn4[0]->cnt + $vn5[0]->cnt + $vn6[0]->cnt;

        // $cnt1 = ($vn1[0]->cnt * 100)/$cntEvaluaciones;
        // $cnt2 = ($vn2[0]->cnt * 100)/$cntEvaluaciones;
        // $cnt3 = ($vn3[0]->cnt * 100)/$cntEvaluaciones;
        // $cnt4 = ($vn4[0]->cnt * 100)/$cntEvaluaciones;
        // $cnt5 = ($vn5[0]->cnt * 100)/$cntEvaluaciones;
        // $cnt6 = ($vn6[0]->cnt * 100)/$cntEvaluaciones;


        $v1=($vn1[0]->v1);
        $v2=($vn2[0]->v2);
        $v3=($vn3[0]->v3);
        $v4=($vn4[0]->v4);
        $v5=($vn5[0]->v5);
        $v6=($vn6[0]->v6);

        $cntEvaluaciones = $v1 + $v2 + $v3 + $v4 + $v5 + $v6;

        $cnt1 = ($v1 * 100)/$cntEvaluaciones;
        $cnt2 = ($v2 * 100)/$cntEvaluaciones;
        $cnt3 = ($v3 * 100)/$cntEvaluaciones;
        $cnt4 = ($v4 * 100)/$cntEvaluaciones;
        $cnt5 = ($v5 * 100)/$cntEvaluaciones;
        $cnt6 = ($v6 * 100)/$cntEvaluaciones;




        $departamentos = DB::table('departamentos')
        ->where('estado','ACTIVO')
        ->where('empresa_id','=',Auth::user()->empresa_id)
        ->orderBy('nombre')
        ->paginate(10);

        return view('BGR.h1.departamentos.resultados_departamentos',
        [   'departamentos'     => $departamentos,
            'departamentoN'     => $departamentoN,
            'cntEvaluaciones'   => $cntEvaluaciones,
            'pionero'           =>  $v1,
            'early'             =>  $v2,
            'mayoria'           =>  $v3,
            'pragmatico'        =>  $v4,
            'conservador'       =>  $v5,
            'esceptico'         =>  $v6,
            'pioneroCnt'        =>  $cnt1,
            'earlyCnt'          =>  $cnt2,
            'mayoriaCnt'        =>  $cnt3,
            'pragmaticoCnt'     =>  $cnt4,
            'conservadorCnt'    =>  $cnt5,
            'escepticoCnt'      =>  $cnt6
        ]);


    }


}
