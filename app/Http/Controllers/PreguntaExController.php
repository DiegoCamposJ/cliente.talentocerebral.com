<?php

namespace App\Http\Controllers;

use App\PreguntaEx;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Traits\BGRTrait;


class PreguntaExController extends Controller
{
    use BGRTrait;



    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(PreguntaEx $preguntaEx)
    {
        //
    }


    public function edit($id)
    {

        //dd('Edit Pregunta ' . $id);

        $evaluacion = DB::table('evaluaciones_ex')
        ->join('preguntas_ex', 'evaluaciones_ex.id', '=', 'preguntas_ex.evaluacionesEx_id')
            ->where('preguntas_ex.slug', $id)
            ->select('evaluaciones_ex.id','evaluaciones_ex.slug','evaluaciones_ex.estado','evaluaciones_ex.ruta')
            ->get();



        if ( $evaluacion[0]->estado == "PROCESO" )
        {
            if ( $evaluacion[0]->ruta == "SITUACION1" || $evaluacion[0]->ruta == "SITUACION2" ||
                 $evaluacion[0]->ruta == "SITUACION3" || $evaluacion[0]->ruta == "SITUACION4")
            {

                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $s_descripcion[0]->codigo)
                ->count();

                $codigoSituacion = $s_descripcion[0]->codigo;

                //dd('situacion '.$codigoSituacion);

                //dd($cntpreguntas);

                if ($cntpreguntas > 1)
                {

                    $orden = (6 - $cntpreguntas) +1;

                    $affected = DB::table('preguntas_ex')
                    ->where('slug', $id)
                    ->where('estado', 'ACTIVO')
                    ->update([
                            'fecha_respuesta' => Carbon::now(),
                            'usuario_actualiza' => Auth::user()->name,
                            'estado'   => 'SELECCIONADA',
                            'valor'     => 10,
                            'orden'     => $orden
                            ]);
                }
                else
                {

                    $pregunta = DB::table('preguntas_ex')
                    ->where('slug', $id)
                    ->select('estado')
                    ->get();

                    //dd($pregunta[0]->estado);

                    if($pregunta[0]->estado == 'ACTIVO')
                    {

                        $affected = DB::table('preguntas_ex')
                        ->where('slug', $id)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => 10,
                                'orden'     => 6
                                ]);

                        $codigoSituacion = ($s_descripcion[0]->codigo + 1) ;


                        $s_descripcion = DB::table('situaciones')
                        ->where('codigo', $codigoSituacion)
                        ->select('situaciones.*')
                        ->get();

                        $affected = DB::table('evaluaciones_ex')
                        ->where('slug', $evaluacion[0]->slug)
                        ->update(['ruta' => $s_descripcion[0]->nombre]);
                    }
                }

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
            if ( $evaluacion[0]->ruta == "SITUACION5" || $evaluacion[0]->ruta == "SITUACION6")
            {
                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $affected = DB::table('preguntas_ex')
                ->where('slug', $id)
                ->where('situacion_id',$s_descripcion[0]->id)
                ->update([
                        'fecha_respuesta' => Carbon::now(),
                        'usuario_actualiza' => Auth::user()->name,
                        'estado'   => 'SELECCIONADA',
                        'valor'     => 10,
                        'orden'     => 1
                        ]);



                $pregunta = DB::table('preguntas_ex')
                ->where('slug', $id)
                ->where('situacion_id',$s_descripcion[0]->id)
                ->select('estado')
                ->get();



                $codigoSituacion = $s_descripcion[0]->codigo;



                if(isset($pregunta[0]))
                {
                    $codigoSituacion = ($s_descripcion[0]->codigo + 1);

                    $s_descripcion = DB::table('situaciones')
                    ->where('codigo', $codigoSituacion)
                    ->select('situaciones.*')
                    ->get();

                    $affected = DB::table('evaluaciones_ex')
                    ->where('slug', $evaluacion[0]->slug)
                    ->update(['ruta' => $s_descripcion[0]->nombre]);


                }

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

            if ( $evaluacion[0]->ruta == "SITUACION7")
            {

                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $s_descripcion[0]->codigo)
                ->count();


                $codigoSituacion = $s_descripcion[0]->codigo;
                $valorRespuesta=0;

                if($cntpreguntas > 25 && $cntpreguntas <=30)
                    $valorRespuesta=6;
                if($cntpreguntas > 20 && $cntpreguntas <=25)
                    $valorRespuesta=5;
                if($cntpreguntas > 15 && $cntpreguntas <=20)
                    $valorRespuesta=4;
                if($cntpreguntas > 10 && $cntpreguntas <=15)
                    $valorRespuesta=3;
                if($cntpreguntas > 5 && $cntpreguntas <=10)
                    $valorRespuesta=2;

                //ACTUALIZO LA PREGUNTA VIGENTE
                $affected = DB::table('preguntas_ex')
                        ->where('slug', $id)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => $valorRespuesta,
                                'orden'     => 1
                                ]);

                if($cntpreguntas == 6)
                {

                    //ACTUALIZO LAS PREGUNTAS QUE SOBRAN
                    $affected = DB::table('preguntas_ex')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->where('estado', 'ACTIVO')
                        ->where('situacion_id', $codigoSituacion)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => 1,
                                'orden'     => 1
                                ]);

                    $codigoSituacion = ($s_descripcion[0]->codigo + 1) ;

                    $s_descripcion = DB::table('situaciones')
                    ->where('codigo', $codigoSituacion)
                    ->select('situaciones.*')
                    ->get();

                    if(count($s_descripcion) > 0)
                    {
                        $affected = DB::table('evaluaciones_ex')
                        ->where('slug', $evaluacion[0]->slug)
                        ->update(['ruta' => $s_descripcion[0]->nombre]);

                        $pareja = DB::table('preguntas_ex')
                        ->select('preguntas_ex.*')
                        ->where('situacion_id', $codigoSituacion)
                        ->where('estado', 'ACTIVO')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->inRandomOrder()
                        ->first();

                        //dd($pareja);

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


                }


                $preguntas = DB::table('preguntas_ex')
                ->select('preguntas_ex.*')
                ->where('situacion_id', $codigoSituacion)
                ->where('estado', 'ACTIVO')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->inRandomOrder()
                ->get();

                if(count($preguntas))
                {
                    return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                      'evaluacion' => $evaluacion[0],
                                                                      'situacion'  => $s_descripcion[0]]);
                }
                else
                {
                    $affected = DB::table('evaluaciones_ex')
                        ->where('slug',$evaluacion[0]->slug)
                        ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

                        return redirect('evaluacionex');
                }


            }

            if ( $evaluacion[0]->ruta == "SITUACION8")
            {
                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $codigoSituacion = $s_descripcion[0]->codigo;

                $pregunta = DB::table('preguntas_ex')
                    ->select('pareja')
                    ->where('slug', $id)
                    ->first();

                $preguntasPareja = DB::table('preguntas_ex')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->where('estado', 'ACTIVO')
                        ->where('situacion_id', $codigoSituacion)
                        ->where('pareja', $pregunta->pareja)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => -2,
                                'orden'     => 2
                                ]);

                $preguntaSeleccionada = DB::table('preguntas_ex')
                ->where('slug', $id)
                        ->update([
                                'valor'     => 2,'orden'     => 1
                                ]);


                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $codigoSituacion)
                ->count();

                if($cntpreguntas > 0)
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






            }

        }

        $affected = DB::table('evaluaciones_ex')
                ->where('slug',  $evaluacion[0]->slug)
                ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

            return redirect('evaluacionex');


    }


    public function respuestaPregunta($id, $par2)
    {

        $evaluacion = DB::table('evaluaciones_ex')
        ->join('preguntas_ex', 'evaluaciones_ex.id', '=', 'preguntas_ex.evaluacionesEx_id')
        ->join('herramientas', 'evaluaciones_ex.herramienta_id', '=', 'herramientas.id')
            ->where('preguntas_ex.slug', $id)
            ->select('evaluaciones_ex.id','evaluaciones_ex.slug','evaluaciones_ex.estado','evaluaciones_ex.ruta','evaluaciones_ex.f_inicio','herramientas.duracion')
            ->first();


            // $tiempo = ($evaluacion->duracion - $this->minutosTranscurridos($evaluacion->f_inicio));

            // $labelTiempo = 'Restan '.strval($tiempo).' minutos ';

            // dd($labelTiempo);


        if ( $evaluacion->estado == "PROCESO" )
        {
            if ( $evaluacion->ruta == "SITUACION1" )
                $vista = $this->situacion($evaluacion->id , 1, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION2" )
                $vista = $this->situacion($evaluacion->id , 2, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION3" )
                $vista = $this->situacion($evaluacion->id , 3, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION4" )
                $vista = $this->situacion($evaluacion->id , 4, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION5" )
                $vista = $this->situacion56($evaluacion->id , 5, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION6" )
                $vista = $this->situacion56($evaluacion->id , 6, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION7" )
                $vista = $this->situacion7($evaluacion->id , 7, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION8" )
                $vista = $this->situacion8($evaluacion->id , 8, $id, $evaluacion->f_inicio, $evaluacion->duracion);

            if ( $evaluacion->ruta == "SITUACION9" )
                $vista = $this->situacion9($evaluacion->id , 9, $id, $par2, $evaluacion->f_inicio, $evaluacion->duracion);


                return $vista;
        }


        return redirect('evaluacionex');

    }

    public function respuestaPregunta2($id, $par2)
    {


        $evaluacion = DB::table('evaluaciones_ex')
        ->join('preguntas_ex', 'evaluaciones_ex.id', '=', 'preguntas_ex.evaluacionesEx_id')
            ->where('preguntas_ex.slug', $id)
            ->select('evaluaciones_ex.id','evaluaciones_ex.slug','evaluaciones_ex.estado','evaluaciones_ex.ruta')
            ->get();



        if ( $evaluacion[0]->estado == "PROCESO" )
        {
            if ( $evaluacion[0]->ruta == "SITUACION1" || $evaluacion[0]->ruta == "SITUACION2" ||
                 $evaluacion[0]->ruta == "SITUACION3" || $evaluacion[0]->ruta == "SITUACION4")
            {

                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $s_descripcion[0]->codigo)
                ->count();

                $codigoSituacion = $s_descripcion[0]->codigo;

                //dd('situacion '.$codigoSituacion);

                //dd($cntpreguntas);

                if ($cntpreguntas > 1)
                {
                    $valTemp=0;
                    $orden = (6 - $cntpreguntas) +1;

                    if($orden <= 2 )
                        $valTemp=6;

                    if($orden>2 && $orden <= 4)
                        $valTemp=4;

                    if($orden == 5)
                        $valTemp=2;

                    $affected = DB::table('preguntas_ex')
                    ->where('slug', $id)
                    ->where('estado', 'ACTIVO')
                    ->update([
                            'fecha_respuesta' => Carbon::now(),
                            'usuario_actualiza' => Auth::user()->name,
                            'estado'   => 'SELECCIONADA',
                            'valor'     => $valTemp,
                            'orden'     => $orden
                            ]);
                }
                else
                {

                    $pregunta = DB::table('preguntas_ex')
                    ->where('slug', $id)
                    ->select('estado')
                    ->get();

                    //dd($pregunta[0]->estado);

                    if($pregunta[0]->estado == 'ACTIVO')
                    {

                        $affected = DB::table('preguntas_ex')
                        ->where('slug', $id)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => 2,
                                'orden'     => 6
                                ]);

                        $codigoSituacion = ($s_descripcion[0]->codigo + 1) ;


                        $s_descripcion = DB::table('situaciones')
                        ->where('codigo', $codigoSituacion)
                        ->select('situaciones.*')
                        ->get();

                        $affected = DB::table('evaluaciones_ex')
                        ->where('slug', $evaluacion[0]->slug)
                        ->update(['ruta' => $s_descripcion[0]->nombre]);
                    }
                }

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
            if ( $evaluacion[0]->ruta == "SITUACION5" || $evaluacion[0]->ruta == "SITUACION6")
            {
                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $affected = DB::table('preguntas_ex')
                ->where('slug', $id)
                ->where('situacion_id',$s_descripcion[0]->id)
                ->update([
                        'fecha_respuesta' => Carbon::now(),
                        'usuario_actualiza' => Auth::user()->name,
                        'estado'   => 'SELECCIONADA',
                        'valor'     => 10,
                        'orden'     => 1
                        ]);



                $pregunta = DB::table('preguntas_ex')
                ->where('slug', $id)
                ->where('situacion_id',$s_descripcion[0]->id)
                ->select('estado')
                ->get();



                $codigoSituacion = $s_descripcion[0]->codigo;



                if(isset($pregunta[0]))
                {
                    $codigoSituacion = ($s_descripcion[0]->codigo + 1);

                    $s_descripcion = DB::table('situaciones')
                    ->where('codigo', $codigoSituacion)
                    ->select('situaciones.*')
                    ->get();

                    $affected = DB::table('evaluaciones_ex')
                    ->where('slug', $evaluacion[0]->slug)
                    ->update(['ruta' => $s_descripcion[0]->nombre]);


                }

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

            if ( $evaluacion[0]->ruta == "SITUACION7")
            {

                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $s_descripcion[0]->codigo)
                ->count();


                $codigoSituacion = $s_descripcion[0]->codigo;
                $valorRespuesta=0;

                if($cntpreguntas > 25 && $cntpreguntas <=30)
                    $valorRespuesta=6;
                if($cntpreguntas > 20 && $cntpreguntas <=25)
                    $valorRespuesta=5;
                if($cntpreguntas > 15 && $cntpreguntas <=20)
                    $valorRespuesta=4;
                if($cntpreguntas > 10 && $cntpreguntas <=15)
                    $valorRespuesta=3;
                if($cntpreguntas > 5 && $cntpreguntas <=10)
                    $valorRespuesta=2;

                //ACTUALIZO LA PREGUNTA VIGENTE
                $affected = DB::table('preguntas_ex')
                        ->where('slug', $id)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => $valorRespuesta,
                                'orden'     => 1
                                ]);

                if($cntpreguntas == 6)
                {

                    //ACTUALIZO LAS PREGUNTAS QUE SOBRAN
                    $affected = DB::table('preguntas_ex')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->where('estado', 'ACTIVO')
                        ->where('situacion_id', $codigoSituacion)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => 1,
                                'orden'     => 1
                                ]);

                    $codigoSituacion = ($s_descripcion[0]->codigo + 1) ;

                    $s_descripcion = DB::table('situaciones')
                    ->where('codigo', $codigoSituacion)
                    ->select('situaciones.*')
                    ->get();

                    if(count($s_descripcion) > 0)
                    {
                        $affected = DB::table('evaluaciones_ex')
                        ->where('slug', $evaluacion[0]->slug)
                        ->update(['ruta' => $s_descripcion[0]->nombre]);

                        $pareja = DB::table('preguntas_ex')
                        ->select('preguntas_ex.*')
                        ->where('situacion_id', $codigoSituacion)
                        ->where('estado', 'ACTIVO')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->inRandomOrder()
                        ->first();

                        //dd($pareja);

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


                }


                $preguntas = DB::table('preguntas_ex')
                ->select('preguntas_ex.*')
                ->where('situacion_id', $codigoSituacion)
                ->where('estado', 'ACTIVO')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->inRandomOrder()
                ->get();

                if(count($preguntas))
                {
                    return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                      'evaluacion' => $evaluacion[0],
                                                                      'situacion'  => $s_descripcion[0]]);
                }
                else
                {
                    $affected = DB::table('evaluaciones_ex')
                        ->where('slug',$evaluacion[0]->slug)
                        ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

                        return redirect('evaluacionEx');
                }


            }

            if ( $evaluacion[0]->ruta == "SITUACION8")
            {
                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $codigoSituacion = $s_descripcion[0]->codigo;


                $pregunta = DB::table('preguntas_ex')
                    ->select('pareja')
                    ->where('slug', $id)
                    ->first();

                $preguntasPareja = DB::table('preguntas_ex')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->where('estado', 'ACTIVO')
                        ->where('situacion_id', $codigoSituacion)
                        ->where('pareja', $pregunta->pareja)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => -2,
                                'orden'     => 2
                                ]);


                $preguntaSeleccionada = DB::table('preguntas_ex')
                ->where('slug', $id)
                        ->update([
                                'valor'     => 2,'orden'     => 1
                                ]);


                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $codigoSituacion)
                ->count();



                if($cntpreguntas > 0)
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
                else{

                    $codigoSituacion = ($s_descripcion[0]->codigo + 1) ;


                    $s_descripcion = DB::table('situaciones')
                    ->where('codigo', $codigoSituacion)
                    ->select('situaciones.*')
                    ->get();




                    if(count($s_descripcion) > 0)
                    {


                        $affected = DB::table('evaluaciones_ex')
                        ->where('slug', $evaluacion[0]->slug)
                        ->update(['ruta' => $s_descripcion[0]->nombre]);



                        $preguntas = DB::table('preguntas_ex')
                        ->select('preguntas_ex.*')
                        ->where('situacion_id', $codigoSituacion)
                        ->where('estado', 'ACTIVO')
                        ->where('evaluacionesEx_id', $evaluacion[0]->id)
                        ->inRandomOrder()
                        ->get();



                        return view('BGR.h1.evaluacion.evaluacion_situacion9',['preguntas'  => $preguntas,
                                                                    'evaluacion' => $evaluacion[0],
                                                                    'situacion'  => $s_descripcion[0]]);

                    }



                }






            }
            if ( $evaluacion[0]->ruta == "SITUACION9")
            {


                $valContradiccion = 0;

                switch ($par2) {
                    case "TDC":
                        $valContradiccion = 6;
                        break;
                    case "DC":
                        $valContradiccion = 3;
                        break;
                    case "NE":
                        $valContradiccion = 0;
                        break;
                    case "DE":
                        $valContradiccion = 3;
                        break;
                    case "TDE":
                        $valContradiccion = 6;
                        break;

                }



                $s_descripcion = DB::table('situaciones')
                ->where('nombre', $evaluacion[0]->ruta)
                ->select('situaciones.*')
                ->get();

                $codigoSituacion = $s_descripcion[0]->codigo;



                //ACTUALIZO LA PREGUNTA VIGENTE
                $affected = DB::table('preguntas_ex')
                        ->where('slug', $id)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => $valContradiccion,
                                'orden'     => 1
                                ]);


                $preguntas = DB::table('preguntas_ex')
                ->select('preguntas_ex.*')
                ->where('situacion_id', $codigoSituacion)
                ->where('estado', 'ACTIVO')
                ->where('evaluacionesEx_id', $evaluacion[0]->id)
                ->inRandomOrder()
                ->get();



                if(isset($preguntas[0]))
                {
                    return view('BGR.h1.evaluacion.evaluacion_situacion9',['preguntas'  => $preguntas,
                                                                      'evaluacion' => $evaluacion[0],
                                                                      'situacion'  => $s_descripcion[0]]);
                }else{



                    $affected = DB::table('evaluaciones_ex')
                    ->where('slug',  $evaluacion[0]->slug)
                    ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

            return redirect('evaluacionex');

                }






            }

        }

        $affected = DB::table('evaluaciones_ex')
                ->where('slug',  $evaluacion[0]->slug)
                ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);

            return redirect('evaluacionex');
    }

    public function update(Request $request, PreguntaEx $preguntaEx)
    {
        //
    }


    public function respuestasEvaluado($id,$part2)
    {
        $evaluacion = DB::table('evaluaciones_ex')
        ->join('preguntas_ex', 'evaluaciones_ex.id', '=', 'preguntas_ex.evaluacionesEx_id')
        ->join('users', 'evaluaciones_ex.usuario_id', '=', 'users.id')
        ->where('preguntas_ex.slug', $id)
        ->select('evaluaciones_ex.id','evaluaciones_ex.slug','evaluaciones_ex.estado','evaluaciones_ex.ruta','preguntas_ex.situacion_id','users.name as evaluado' )
        ->first();

        $valContradiccion = 0;

            switch ($part2) {
                case "TDC":
                    $valContradiccion = 6;
                    break;
                case "DC":
                    $valContradiccion = 3;
                    break;
                case "NE":
                    $valContradiccion = 0;
                    break;
                case "DE":
                    $valContradiccion = 3;
                    break;
                case "TDE":
                    $valContradiccion = 6;
                    break;
            }

            $situacion = DB::table('situaciones')
                ->where('codigo', $evaluacion->situacion_id)
                ->select('situaciones.*')
                ->first();

                //ACTUALIZO LA PREGUNTA VIGENTE
                DB::table('preguntas_ex')
                        ->where('slug', $id)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => $valContradiccion,
                                'orden'     => 1
                                ]);


                $preguntas = DB::table('preguntas_ex')
                ->select('preguntas_ex.*')
                ->where('situacion_id', $evaluacion->situacion_id)
                ->where('estado', 'ACTIVO')
                ->where('evaluacionesEx_id', $evaluacion->id)
                ->inRandomOrder()
                ->get();



                if(isset($preguntas[0]))
                {

                    return view('BGR.h1.evaluacion.evaluacion_situacion10',
                                                                        ['preguntas' => $preguntas,
                                                                         'situacion' => $situacion,
                                                                         'evaluado'  => $evaluacion->evaluado]);
                }
                else
                {
                    DB::table('evaluaciones_ex')
                    ->where('id',  $evaluacion->id)
                    ->update(['eva360' => 'SI']);

                    return redirect('evaluacionJefe');
                }

    }
}
