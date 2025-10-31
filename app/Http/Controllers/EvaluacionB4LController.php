<?php

namespace App\Http\Controllers;

use App\EvaluacionB4L;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Traits\B4LPreguntasTrait;
use App\Traits\EvaluacionTrait;
use PhpParser\Node\Stmt\Else_;

class EvaluacionB4LController extends Controller
{

    use B4LPreguntasTrait;
    use EvaluacionTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return redirect('evaluacion');
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
        $evaluacion = DB::table('evaluaciones_b4l')
        ->where('slug', $id)
        ->select('estado','persona_id','fecha_inicio','cliente')
        ->first();



        //SI LA EVALUACION ESTA EN PROCESO SE VERIFICA TIEMPO TRASCURRIDO
        if($evaluacion->estado == "PROCESO" && $evaluacion->cliente == "WEB")
        {
            $trasncurrido = $this->minutosTranscurridosCargo($evaluacion->fecha_inicio);

            if($trasncurrido > 45)
            {
                DB::table('evaluaciones_b4l')->where('slug', $id)->update(['estado' => 'ABANDONADA','fecha_fin' => Carbon::now()]);
                return view('clienteB4L.evaluacion_2mensaje');
            }
            else
                return view('clienteB4L.evaluacion_1mensaje',['slug' => $id]);
        }

        //ACTUALIZO INFORMACIÓN DE LA EVALUACION CUANDO ES EL PRIMER INGRESO
        if($evaluacion->estado == "PENDIENTE")
        {
            return view('clienteB4L.evaluacion_1mensaje',['slug' => $id]);
        }

     return redirect('evaluacion');
    }


    public function edit($slug)
    {

        $evaluacion = DB::table('evaluaciones_b4l')
            ->where('evaluaciones_b4l.slug', $slug)
            ->select('evaluaciones_b4l.slug','evaluaciones_b4l.estado','evaluaciones_b4l.ruta','evaluaciones_b4l.id','evaluaciones_b4l.cliente','evaluaciones_b4l.cargo_id')
            ->first();

        $cargos = DB::table('cargos')
        ->where('cargos.id',  $evaluacion->cargo_id)
        ->select('cargos.*')
        ->first();



        if($evaluacion->estado == "PENDIENTE")
        {

            DB::table('evaluaciones_b4l')
            ->where('slug', $slug)
            ->update([  'estado' => 'PROCESO',
                        'ruta' => 'b4lIntro',
                        'cliente' => 'WEB',
                        'fecha_inicio' => Carbon::now()]);


        }

        $cntpreguntas = DB::table('preguntas_b4l')
                ->where('evaluacionB4L_id', $evaluacion->id)
                ->count();



        //-------Crear las preguntas del test-------------------
        if($cntpreguntas == 0)
        {
            $cnt = DB::table('preguntas_b4l')->count();

            //QUAD NORMAL
            $variables = DB::table('variables')
            ->where('herramienta_id', 5)
            ->select('variables.*')
            ->get();

            //-------------OPERATIVO-----------
            if ($cargos->nivel_cargo == 'OPER')
            {
                foreach($variables as $variable)
                {
                    $cnt++;

                    DB::table('preguntas_b4l')->insert([
                    'slug'              => 'prb4l'.Str::random(6).strval($cnt),
                    'evaluacionB4L_id'     => $evaluacion->id,
                    'variable_id'       => $variable->id,
                    'descripcion'       => $variable->descripcion,
                    'valor'             => 0,
                    'estado'            => 'ACTIVO',
                    'color'             => $variable->color,
                    'tipo'              => $variable->tipo,
                    'pareja'            => $variable->pareja,
                    ]);
                }
            }
            //-------------RESPONSABILIDAD MEDIA-----------
            if ($cargos->nivel_cargo == 'RESP-MEDIA')
            {
                foreach($variables as $variable)
                {
                    $cnt++;

                    DB::table('preguntas_b4l')->insert([
                    'slug'              => 'prb4l'.Str::random(6).strval($cnt),
                    'evaluacionB4L_id'     => $evaluacion->id,
                    'variable_id'       => $variable->id,
                    'descripcion'       => $variable->descripcion2,
                    'valor'             => 0,
                    'estado'            => 'ACTIVO',
                    'color'             => $variable->color,
                    'tipo'              => $variable->tipo,
                    'pareja'            => $variable->pareja,
                    ]);
                }
            }

            //-------------RESPONSABILIDAD ALTA-----------
            if ($cargos->nivel_cargo == 'RESP-ALTA')
            {
                foreach($variables as $variable)
                {
                    $cnt++;

                    DB::table('preguntas_b4l')->insert([
                    'slug'              => 'prb4l'.Str::random(6).strval($cnt),
                    'evaluacionB4L_id'     => $evaluacion->id,
                    'variable_id'       => $variable->id,
                    'descripcion'       => $variable->descripcion3,
                    'valor'             => 0,
                    'estado'            => 'ACTIVO',
                    'color'             => $variable->color,
                    'tipo'              => $variable->tipo,
                    'pareja'            => $variable->pareja,
                    ]);
                }
            }


        }
        //-------FIN crear las preguntas del test---------------

        //----- Se visualiza preguntas en base a la ruta y estado del test  -------------------

        $evaluacion = DB::table('evaluaciones_b4l')
            ->where('evaluaciones_b4l.slug', $slug)
            ->select('slug','estado','ruta','id','cliente')
            ->first();

            $codigoSituacion="";
            switch ($evaluacion->ruta)
            {
                case "b4lIntro":
                    return view('clienteB4L.1mensaje_laboral',['slugEvaluacion' => $slug]);
                    break;
                case "B4LIntroDescriptor":
                    return view('clienteB4L.2mensaje_descriptor',['slugEvaluacion' => $slug]);
                    break;
                case "/":
                    return redirect('evaluacion');
                    break;

            }


        return redirect('evaluacion');
    }

    public function preguntasEvaluacionB4L($slugEvaluacion)
    {
        $evaluacion = DB::table('evaluaciones_b4l')
        ->where('slug', $slugEvaluacion)
        ->select('slug','estado','ruta','id','fecha_inicio')
        ->first();

        $trasncurrido = $this->minutosTranscurridosCargo($evaluacion->fecha_inicio);
        if($trasncurrido > 55)
        {
            DB::table('evaluaciones_b4l')->where('slug', $slugEvaluacion)->update(['estado' => 'ABANDONADA','fecha_fin' => Carbon::now()]);
            return view('clienteB4L.evaluacion_2mensaje');
        }

        //Se despliegan preguntas en base a la ruta y estado del test
        if($evaluacion->estado == "PROCESO")
        {
            $codigoSituacion="";
            switch ($evaluacion->ruta) {
                case "b4lIntro":

                    $vista = $this->ActividadesLaboralesB4L($evaluacion->id,$trasncurrido);
                    return $vista;
                    break;

                case "B4LIntroDescriptor":
                    $vista = $this->DescriptoresImportatesB4L($evaluacion->id,$trasncurrido);
                    return $vista;
                    break;


                }
        }

        return redirect('evaluacion');
    }

    public function guardarPreguntaLaboralB4L($respuesta, $slugPregunta)
    {

        Session::forget('message-error');


        $evaluacion = DB::table('evaluaciones_b4l')
        ->join('preguntas_b4l', 'evaluaciones_b4l.id', '=', 'preguntas_b4l.evaluacionB4L_id')
        ->where('preguntas_b4l.slug', $slugPregunta)
        ->select('evaluaciones_b4l.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridosCargo($evaluacion->fecha_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones_b4l')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','fecha_fin' => Carbon::now()]);
            return view('clienteB4L.evaluacion_2mensaje');
        }

        $cntPreguntas = DB::table('preguntas_b4l')
        ->where('evaluacionB4L_id', $evaluacion->id)
        ->where('tipo', 'LABORAL')
        ->where('valor', $respuesta)
        ->count();


        if($cntPreguntas < 4)
        {
            DB::table('preguntas_b4l')
            ->where('slug', $slugPregunta)
            ->update(['valor'  => $respuesta,'estado' => 'INACTIVO', 'usuario_actualiza' => Auth::user()->email,'f_respuesta' => Carbon::now()]);

            $cntPreguntas2 = DB::table('preguntas_b4l')
            ->where('evaluacionB4L_id', $evaluacion->id)
            ->where('tipo', 'LABORAL')
            ->where('estado', 'ACTIVO')
            ->count();

            if($cntPreguntas2 >0)
            {
                $vista = $this->ActividadesLaboralesB4L($evaluacion->id,$trasncurrido);
                return $vista;
            }
            else
            {
                DB::table('evaluaciones_b4l')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => 'B4LIntroDescriptor']);

                return redirect()->route('evaluacionB4L.edit', [$evaluacion->slug]);
            }

        }
        else{

            Session::flash('message-error','Ese valor fue asigando cuatro veces, selecione otra opción para continuar');
            $vista = $this->ActividadesLaboralesB4L($evaluacion->id,$trasncurrido);
            return $vista;
        }
    }

    public function guardarDescriptoresB4L($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones_b4l')
        ->join('preguntas_b4l', 'evaluaciones_b4l.id', 'preguntas_b4l.evaluacionB4L_id')
        ->where('preguntas_b4l.slug', $slugPregunta)
        ->select('evaluaciones_b4l.*')
        ->first();


        $trasncurrido = $this->minutosTranscurridosCargo($evaluacion->fecha_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones_b4l')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','fecha_fin' => Carbon::now()]);
            return view('clienteB4L.evaluacion_2mensaje');
        }
        else
        {
            $cntPreguntas = DB::table('preguntas_b4l')
            ->where('evaluacionB4L_id', $evaluacion->id)
            ->where('tipo', 'DESCRIPTOR')
            ->where('estado', 'INACTIVO')
            ->count();

            if($cntPreguntas < 8)
            {
                $respuesta = ($cntPreguntas == 1) ? 3 : 2;

                DB::table('preguntas_b4l')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,'estado' => 'INACTIVO','usuario_actualiza' => Auth::user()->email,'f_respuesta' => Carbon::now()]);

                $cntPreguntas2 = DB::table('preguntas_b4l')
                ->where('evaluacionB4L_id', $evaluacion->id)
                ->where('tipo', 'DESCRIPTOR')
                ->where('estado', 'INACTIVO')
                ->count();

                if($cntPreguntas2 == 8)
                {
                    DB::table('evaluaciones_b4l')
                    ->where('slug', $evaluacion->slug)
                    ->update([
                        'ruta'              => '/',
                        'estado'            => 'FINALIZADA',
                        'fecha_fin'             => Carbon::now()]);


                    $cntEvaluacionesCargo = DB::table('evaluaciones_b4l')
                    ->where('cargo_id', $evaluacion->cargo_id)
                    ->where('estado', 'FINALIZADA')
                    ->count();

                    if($cntEvaluacionesCargo < 2)
                    {
                        DB::table('cargos')
                        ->where('id', $evaluacion->cargo_id)
                        ->update([
                        'estado'            => 'EVALUACION',
                        'usuario_actualiza' => Auth::user()->id,
                        'f_actualizacion'   => Carbon::now()]);
                    }
                    return redirect()->route('evaluacionB4L.edit', [$evaluacion->slug]);
                }
                else
                {
                    $vista = $this->DescriptoresImportatesB4L($evaluacion->id,$trasncurrido);
                    return $vista;
                }
            }
        }
    }

    public function update(Request $request, EvaluacionB4L $evaluacionB4L)
    {
        //
    }


    public function destroy(EvaluacionB4L $evaluacionB4L)
    {
        //
    }
}
