<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait BGRTrait
{

    public function minutosTranscurridos($fecha_i)
    {
        $minutos = (strtotime($fecha_i)-strtotime(Carbon::now()))/60;
        $minutos = abs($minutos); $minutos = floor($minutos);
        return $minutos;
    }


    //SITUACION 1 A LA 4
    public function situacion($idEvaluacion, $idSituacion, $slugPregunta,$fechaInicio,$duracion)
    {

        $tiempo = ($duracion - $this->minutosTranscurridos($fechaInicio));
        $labelTiempo = 'Restan '.strval($tiempo).' minutos ';


        $estadoPregunta = DB::table('preguntas_ex')
                    ->where('slug', $slugPregunta)
                    ->select('estado')
                    ->first();

        $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $idSituacion)
                ->count();

        if ($cntpreguntas > 0)
        {
            $valTemp=0;
            $orden = (6 - $cntpreguntas) +1;

            if($orden <= 2 )
                $valTemp=6;

            if($orden>2 && $orden <= 4)
                $valTemp=4;

            if($orden > 4)
                $valTemp=2;

            DB::table('preguntas_ex')
            ->where('slug', $slugPregunta)
            ->where('estado', 'ACTIVO')
            ->update([
                    'fecha_respuesta' => Carbon::now(),
                    'usuario_actualiza' => Auth::user()->name,
                    'estado'   => 'SELECCIONADA',
                    'valor'     => $valTemp,
                    'orden'     => $orden
                    ]);

            $situacion = DB::table('situaciones')
            ->where('codigo', $idSituacion)
            ->select('situaciones.*')
            ->first();


            if($cntpreguntas == 1 && $estadoPregunta->estado == 'ACTIVO')
            {
                $idSituacion++;

                $situacion = DB::table('situaciones')
                ->where('codigo', $idSituacion)
                ->select('situaciones.*')
                ->first();

                DB::table('evaluaciones_ex')
                ->where('id', $idEvaluacion)
                ->update(['ruta' => $situacion->nombre]);

            }




            $preguntas = DB::table('preguntas_ex')
            ->select('preguntas_ex.*')
            ->where('situacion_id', $idSituacion)
            ->where('estado', 'ACTIVO')
            ->where('evaluacionesEx_id', $idEvaluacion)
            ->inRandomOrder()
            ->get();

            return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,'situacion'  => $situacion, 'tiempo' => $labelTiempo]);

        }
    }

    //SITUACION 5 Y 6
    public function situacion56($idEvaluacion, $idSituacion, $slugPregunta,$fechaInicio,$duracion)
    {

        $tiempo = ($duracion - $this->minutosTranscurridos($fechaInicio));
        $labelTiempo = 'Restan '.strval($tiempo).' minutos ';


        $estadoPregunta = DB::table('preguntas_ex')
                    ->where('slug', $slugPregunta)
                    ->select('estado')
                    ->first();

        $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $idSituacion)
                ->count();

        if ($cntpreguntas > 3)
        {
            $valTemp=0;
            $orden = (6 - $cntpreguntas) +1;

            if( $orden == 1 )
                $valTemp=9;

            if( $orden == 2 )
                $valTemp=6;

            if( $orden == 3 )
                $valTemp=3;

            DB::table('preguntas_ex')
            ->where('slug', $slugPregunta)
            ->where('estado', 'ACTIVO')
            ->update([
                    'fecha_respuesta' => Carbon::now(),
                    'usuario_actualiza' => Auth::user()->name,
                    'estado'   => 'SELECCIONADA',
                    'valor'     => $valTemp,
                    'orden'     => $orden
                    ]);

            $situacion = DB::table('situaciones')
            ->where('codigo', $idSituacion)
            ->select('situaciones.*')
            ->first();


            if($cntpreguntas == 4 && $estadoPregunta->estado == 'ACTIVO')
            {

                DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id',$idSituacion)
                ->where('estado', 'ACTIVO')
                ->update([
                    'fecha_respuesta' => Carbon::now(),
                    'usuario_actualiza' => Auth::user()->name,
                    'estado'   => 'SELECCIONADA',
                    'valor'     => 0
                    ]);


                $idSituacion++;

                $situacion = DB::table('situaciones')
                ->where('codigo', $idSituacion)
                ->select('situaciones.*')
                ->first();

                DB::table('evaluaciones_ex')
                ->where('id', $idEvaluacion)
                ->update(['ruta' => $situacion->nombre]);

            }

            $preguntas = DB::table('preguntas_ex')
            ->select('preguntas_ex.*')
            ->where('situacion_id', $idSituacion)
            ->where('estado', 'ACTIVO')
            ->where('evaluacionesEx_id', $idEvaluacion)
            ->inRandomOrder()
            ->get();

            return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                  'situacion'  => $situacion,
                                                                  'tiempo' => $labelTiempo]);

        }
    }

     //SITUACION 7
     public function situacion7($idEvaluacion, $idSituacion, $slugPregunta,$fechaInicio,$duracion)
    {

        $tiempo = ($duracion - $this->minutosTranscurridos($fechaInicio));
        $labelTiempo = 'Restan '.strval($tiempo).' minutos ';


        $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $idSituacion)
                ->count();

        $valorRespuesta=0;

        if($cntpreguntas > 24 && $cntpreguntas <=30)
            $valorRespuesta=6;

        if($cntpreguntas > 18 && $cntpreguntas <=24)
            $valorRespuesta=5;

        if($cntpreguntas > 12 && $cntpreguntas <=18)
            $valorRespuesta=4;

        if($cntpreguntas > 6 && $cntpreguntas <=12)
            $valorRespuesta=3;




        //ACTUALIZO LA PREGUNTA VIGENTE
        $affected = DB::table('preguntas_ex')
        ->where('slug', $slugPregunta)
        ->update([
                'fecha_respuesta' => Carbon::now(),
                'usuario_actualiza' => Auth::user()->name,
                'estado'   => 'SELECCIONADA',
                'valor'     => $valorRespuesta
                ]);


        if($cntpreguntas == 7)
        {
            //ACTUALIZO LAS PREGUNTAS QUE SOBRAN
            $affected = DB::table('preguntas_ex')
            ->where('evaluacionesEx_id', $idEvaluacion)
            ->where('estado', 'ACTIVO')
            ->where('situacion_id', $idSituacion)
            ->update([
                    'fecha_respuesta' => Carbon::now(),
                    'usuario_actualiza' => Auth::user()->name,
                    'estado'   => 'SELECCIONADA',
                    'valor'     => 2
                    ]);

            $idSituacion++;

            $situacion = DB::table('situaciones')
                ->where('codigo', $idSituacion)
                ->select('situaciones.*')
                ->first();

            DB::table('evaluaciones_ex')
                ->where('id', $idEvaluacion)
                ->update(['ruta' => $situacion->nombre]);

            $pareja = DB::table('preguntas_ex')
            ->select('preguntas_ex.*')
            ->where('situacion_id', $idSituacion)
            ->where('estado', 'ACTIVO')
            ->where('evaluacionesEx_id', $idEvaluacion)
            ->inRandomOrder()
            ->first();

            $preguntas = DB::table('preguntas_ex')
                        ->select('preguntas_ex.*')
                        ->where('situacion_id', $idSituacion)
                        ->where('estado', 'ACTIVO')
                        ->where('evaluacionesEx_id', $idEvaluacion)
                        ->where('pareja', $pareja->pareja)
                        ->inRandomOrder()
                        ->get();

            return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                        'situacion'  => $situacion,
                        'tiempo' => $labelTiempo]);
        }

        $situacion = DB::table('situaciones')
                ->where('codigo', $idSituacion)
                ->select('situaciones.*')
                ->first();

        $preguntas = DB::table('preguntas_ex')
                ->select('preguntas_ex.*')
                ->where('situacion_id', $idSituacion)
                ->where('estado', 'ACTIVO')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->inRandomOrder()
                ->get();

                return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                      'situacion'  => $situacion,
                                                                      'tiempo' => $labelTiempo]);



    }

     //SITUACION 8
    public function situacion8($idEvaluacion, $idSituacion, $slugPregunta,$fechaInicio,$duracion)
    {

        $tiempo = ($duracion - $this->minutosTranscurridos($fechaInicio));
        $labelTiempo = 'Restan '.strval($tiempo).' minutos ';

        $situacion = DB::table('situaciones')
                ->where('codigo', $idSituacion)
                ->select('situaciones.*')
                ->first();

        //BUSCO EL NUMERO DE PAREJA
        $pregunta = DB::table('preguntas_ex')
        ->select('pareja')
        ->where('slug', $slugPregunta)
        ->first();

        //ACTUALIZO LOS CAMPOS DE LA PAREJA (2 registros)
        DB::table('preguntas_ex')
        ->where('evaluacionesEx_id', $idEvaluacion)
        ->where('estado', 'ACTIVO')
        ->where('situacion_id', $idSituacion)
        ->where('pareja', $pregunta->pareja)
        ->update([
                'fecha_respuesta' => Carbon::now(),
                'usuario_actualiza' => Auth::user()->name,
                'estado'   => 'SELECCIONADA',
                'valor'     => -2,
                'orden'     => 2
                ]);

        //ACTUALIZO A VALOR DE LA OPCION SELECCIONADA
        DB::table('preguntas_ex')
                ->where('slug', $slugPregunta)
                        ->update([
                            'valor'     => 2,'orden'     => 1
                            ]);

                $cntpreguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('estado', 'ACTIVO')
                ->where('situacion_id', $idSituacion)
                ->count();

                if($cntpreguntas > 0)
                {
                    $pareja = DB::table('preguntas_ex')
                    ->select('preguntas_ex.*')
                    ->where('situacion_id', $idSituacion)
                    ->where('estado', 'ACTIVO')
                    ->where('evaluacionesEx_id', $idEvaluacion)
                    ->inRandomOrder()
                    ->first();


                    $preguntas = DB::table('preguntas_ex')
                    ->select('preguntas_ex.*')
                    ->where('situacion_id', $idSituacion)
                    ->where('estado', 'ACTIVO')
                    ->where('evaluacionesEx_id', $idEvaluacion)
                    ->where('pareja', $pareja->pareja)
                    ->inRandomOrder()
                    ->get();

                    return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                          'situacion'  => $situacion,
                                                                          'tiempo' =>  $labelTiempo]);

                }
                else{

                    $idSituacion++;

                    $situacion = DB::table('situaciones')
                    ->where('codigo', $idSituacion)
                    ->select('situaciones.*')
                    ->first();

                    DB::table('evaluaciones_ex')
                        ->where('id', $idEvaluacion)
                        ->update(['ruta' => $situacion->nombre]);

                    $preguntas = DB::table('preguntas_ex')
                    ->select('preguntas_ex.*')
                    ->where('situacion_id', $idSituacion)
                    ->where('estado', 'ACTIVO')
                    ->where('evaluacionesEx_id', $idEvaluacion)
                    ->inRandomOrder()
                    ->get();

                    return view('BGR.h1.evaluacion.evaluacion_situacion',['preguntas'  => $preguntas,
                                                                          'situacion'  => $situacion,
                                                                          'tiempo' =>  $labelTiempo]);

                }




    }

     //SITUACION 9
    public function situacion9($idEvaluacion, $idSituacion, $slugPregunta, $par2,$fechaInicio,$duracion)
    {

        $tiempo = ($duracion - $this->minutosTranscurridos($fechaInicio));
        $labelTiempo = 'Restan '.strval($tiempo).' minutos ';


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

                $situacion = DB::table('situaciones')
                ->where('codigo', $idSituacion)
                ->select('situaciones.*')
                ->first();

                //ACTUALIZO LA PREGUNTA VIGENTE
                $affected = DB::table('preguntas_ex')
                        ->where('slug', $slugPregunta)
                        ->update([
                                'fecha_respuesta' => Carbon::now(),
                                'usuario_actualiza' => Auth::user()->name,
                                'estado'   => 'SELECCIONADA',
                                'valor'     => $valContradiccion,
                                'orden'     => 1
                                ]);


                $preguntas = DB::table('preguntas_ex')
                ->select('preguntas_ex.*')
                ->where('situacion_id', $idSituacion)
                ->where('estado', 'ACTIVO')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->inRandomOrder()
                ->get();



                if(isset($preguntas[0]))
                {

                    return view('BGR.h1.evaluacion.evaluacion_situacion9',['preguntas'  => $preguntas,
                                                                           'situacion'  => $situacion,
                                                                           'tiempo' => $labelTiempo]);
                }
                else{

                    DB::table('evaluaciones_ex')
                    ->where('id',  $idEvaluacion)
                    ->update(['estado' => 'FINALIZADA','ruta' => '', 'f_fin' => Carbon::now()]);


                    // $details = [
                    //     'nombre' => Auth::user()->name,

                    //  ];


                    //  \Mail::to(Auth::user()->email)
                    // ->send(new \App\Mail\EvaluacionBGRFin($details));

                    Session::flash('message','Evaluación finalizada exitosamente.');
                    return redirect('evaluacionex');

                }

    }


}
