<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Traits\QUADPreguntasTrait;
use App\Traits\EvaluacionTrait;
// use PhpParser\Node\Stmt\Else_;


class EvaluacionController extends Controller
{

    use QUADPreguntasTrait;
    use EvaluacionTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
            $evaluacion = DB::table('evaluaciones')
            ->join('herramientas', 'evaluaciones.herramienta_id', '=', 'herramientas.id')
            ->join('campanas', 'evaluaciones.campana_id', '=', 'campanas.id')
            ->select('herramientas.nombre','evaluaciones.estado','evaluaciones.slug',
                     'evaluaciones.cliente','evaluaciones.f_inicio','evaluaciones.f_fin',
                     'campanas.descripcion as campana', 'campanas.resultado_visible as visible')
            ->where('evaluaciones.persona_id', Auth::user()->id)
            ->orderBy('evaluaciones.id', 'desc')
            ->first();

            $evaluacionesB4L = DB::table('evaluaciones_b4l')
            ->join('cargos', 'evaluaciones_b4l.cargo_id', 'cargos.id')
            ->select('evaluaciones_b4l.estado','evaluaciones_b4l.id','evaluaciones_b4l.slug','evaluaciones_b4l.cliente', 'cargos.nombre_cargo')
            ->where('evaluaciones_b4l.persona_id', Auth::user()->id)
            ->where('evaluaciones_b4l.estado','!=', 'FINALIZADA')
            ->orderBy('evaluaciones_b4l.id', 'desc')
            ->paginate(10);

            return view('cliente.listar_evaluaciones',['evaluacion' => $evaluacion, 'evaluacionesB4L' => $evaluacionesB4L]);

    }

    public function show($id)
    {
        $evaluacion = DB::table('evaluaciones')
            ->where('slug', $id)
            ->select('estado','persona_id','f_inicio','cliente')
            ->first();

        //SI LA EVALUACION ESTA EN PROCESO SE VERIFICA TIEMPO TRASCURRIDO
        if($evaluacion->estado == "PROCESO" && $evaluacion->cliente == "WEB")
        {
            $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
            if($trasncurrido > 45)
            {
                DB::table('evaluaciones')->where('slug', $id)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
                return view('cliente.evaluacion_2mensaje');
            }
            else
                return view('cliente.evaluacion_1mensaje',['slug' => $id]);
        }

        //ACTUALIZO INFORMACIÓN DE LA EVALUACION CUANDO ES EL PRIMER INGRESO
        if($evaluacion->estado == "PENDIENTE")
        {
            return view('cliente.evaluacion_1mensaje',['slug' => $id]);
        }
        return redirect('evaluacion');
    }

    public function showTest($id)
    {
        $evaluacion = DB::table('evaluaciones')
            ->join('campanas', 'campanas.id', '=', 'evaluaciones.campana_id')
            ->where('evaluaciones.slug','=',$id)
            ->select('evaluaciones.id','campanas.carreras')
            ->first();

            if($evaluacion->carreras == 0)
                $vista = $this->reporteQUAD($evaluacion->id);
            else
                $vista = $this->reporteQUADCITO($evaluacion->id);

        return $vista;


    }

    public function edit($slug)
    {
        $evaluacion = DB::table('evaluaciones')
            ->join('campanas', 'campanas.id', '=', 'evaluaciones.campana_id')
            ->where('evaluaciones.slug', $slug)
            ->select('evaluaciones.slug','evaluaciones.estado','evaluaciones.ruta','evaluaciones.id',
                     'evaluaciones.cliente','campanas.carreras','campanas.herramienta_id')
            ->first();

        if($evaluacion->estado == "PENDIENTE")
        {
            DB::table('evaluaciones')
            ->where('slug', $slug)
            ->update([  'estado' => 'PROCESO',
                        'ruta' => 'quadIntro',
                        'cliente' => 'WEB',
                        'f_inicio' => Carbon::now()]);
        }

        $cntpreguntas = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->count();

        $variables = [];

        //-------Crear las preguntas del test-------------------
        if($cntpreguntas == 0)
        {
            $cnt = DB::table('preguntas')->count();

            $variables = DB::table('variables')
                ->where('herramienta_id', $evaluacion->herramienta_id)
                ->select('variables.*')
                ->get();

            foreach($variables as $variable)
            {
                $cnt++;

                DB::table('preguntas')->insert([
                    'slug'              => 'pr'.Str::random(6).strval($cnt),
                    'evaluacion_id'     => $evaluacion->id,
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
        //-------FIN crear las preguntas del test---------------

        //----- Se visualiza preguntas en base a la ruta y estado del test  -------------------

        $evaluacion = DB::table('evaluaciones')
            ->join('campanas', 'campanas.id', '=', 'evaluaciones.campana_id')
            ->where('evaluaciones.slug', $slug)
            ->select('evaluaciones.slug','evaluaciones.estado','evaluaciones.ruta','evaluaciones.id','evaluaciones.cliente','campanas.carreras')
            ->first();



        //if($evaluacion->estado == "PROCESO" && $evaluacion->cliente == "WEB"  && $evaluacion->carreras == 0)
        if($evaluacion->estado == "PROCESO" && $evaluacion->cliente == "WEB")
        {
            $codigoSituacion="";
            switch ($evaluacion->ruta)
            {
                case "quadIntro":
                    return view('cliente.1mensaje_laboral',['slugEvaluacion' => $slug]);
                    break;

                case "quadIntroFrase":
                    return view('cliente.12mensaje_frases',['slugEvaluacion' => $slug]);
                    break;

                case "quadFrasesFavoritas":
                    return view('cliente.13mensaje_fraseFavorita',['slugEvaluacion' => $slug]);
                    break;

                case "quadIntroDescriptor":
                     return view('cliente.2mensaje_descriptor',['slugEvaluacion' => $slug]);
                     break;
                case "quadDescriptorFavorito":
                    return view('cliente.3mensaje_descriptorFavorito',['slugEvaluacion' => $slug]);
                    break;
                case "quadIntroAficion":
                    return view('cliente.4mensaje_aficiones',['slugEvaluacion' => $slug]);
                    break;
                case "quadAficionFavorita":
                    return view('cliente.5mensaje_aficionFavorita',['slugEvaluacion' => $slug]);
                    break;
                case "quadAficionRegular":
                    return view('cliente.6mensaje_aficionRegular',['slugEvaluacion' => $slug]);
                    break;
                case "quadIntroAtributo":
                    return view('cliente.7mensaje_atributos',['slugEvaluacion' => $slug]);
                    break;
                case "quadIntroPregunta":
                    return view('cliente.8mensaje_preguntas',['slugEvaluacion' => $slug]);
                    break;
                case "quadIntroForma":
                    return view('cliente.9mensaje_formas',['slugEvaluacion' => $slug]);
                    break;
                case "quadIntroForma2":
                    return view('cliente.9mensaje_formas',['slugEvaluacion' => $slug]);
                    break;
                case "carrera":
                     return view('cliente.10mensaje_carreras',['slugEvaluacion' => $slug]);
                     break;
                case "IntroProfesion":
                     return view('cliente.11mensaje_profesiones',['slugEvaluacion' => $slug]);
                     break;
                case "profesion":
                        return view('cliente.11mensaje_profesiones',['slugEvaluacion' => $slug]);
                        break;
                case "quadIntroFrase":
                    return view('cliente.12mensaje_frases',['slugEvaluacion' => $slug]);
                    break;

                case "/":
                    return redirect('evaluacion');
                    //Session::flash('message','Evaluación finalizada correctamente');
            }
        }

        return redirect('evaluacion');
    }


    public function preguntasEvaluacion($slugEvaluacion)
    {
        $evaluacion = DB::table('evaluaciones')
        ->where('slug', $slugEvaluacion)
        ->select('slug','estado','ruta','id','f_inicio')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 55)
        {
            DB::table('evaluaciones')->where('slug', $slugEvaluacion)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }

        //Se despliegan preguntas en base a la ruta y estado del test
        if($evaluacion->estado == "PROCESO")
        {
            $codigoSituacion="";
            switch ($evaluacion->ruta)
            {
                case "quadIntro":
                    $vista = $this->ActividadesLaborales($evaluacion->id,$trasncurrido,$evaluacion->slug);
                    return $vista;
                    break;


                // case "quadIntroFrase":
                //         $vista = $this->FrasesImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
                //         return $vista;
                //         break;

                // case "quadFrasesFavoritas":
                //     $vista = $this->FrasesFavoritas($evaluacion->id,$trasncurrido,$evaluacion->slug);
                //     return $vista;
                //     break;

                case "quadIntroDescriptor":
                    $vista = $this->DescriptoresImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
                    return $vista;
                    break;

                case "quadDescriptorFavorito":
                    $vista = $this->DescriptorFavorito($evaluacion->id,$trasncurrido,$evaluacion->slug);
                    return $vista;
                    break;

                case "quadIntroAficion":
                    $vista = $this->Aficiones($evaluacion->id, $trasncurrido, $evaluacion->slug);
                    return $vista;
                    break;

                case "quadAficionFavorita":
                    $vista = $this->AficionFavorita($evaluacion->id, $trasncurrido, $evaluacion->slug);
                    return $vista;
                    break;

                case "quadAficionRegular":
                    $vista = $this->AficionesRegulares($evaluacion->id, $trasncurrido, $evaluacion->slug);
                    return $vista;
                    break;

                case "quadIntroAtributo":
                    $cntPreguntas = DB::table('preguntas')
                    ->where('evaluacion_id', $evaluacion->id)
                    ->where('tipo', 'ATRIBUTO')
                    ->where('estado', 'ACTIVO')
                    ->where('valor', 0)
                    ->count();

                    $vista = $this->Atributos($evaluacion->id, $trasncurrido, ($cntPreguntas/2),$evaluacion->slug);
                    return $vista;
                    break;

                case "quadIntroPregunta":
                    $vista = $this->Preguntas($evaluacion->id,$trasncurrido, $evaluacion->slug);
                    return $vista;
                    break;

                case "quadIntroForma":
                    $vista = $this->Formas($evaluacion->id,$trasncurrido,1);
                    return $vista;
                    break;
                case "quadIntroForma2":
                    $vista = $this->Formas($evaluacion->id,$trasncurrido,2);
                    return $vista;
                    break;

                case "carrera":
                    $vista = $this->Carreras($slugEvaluacion,$trasncurrido);
                    return $vista;
                    break;

                case "IntroProfesion":
                    $vista = $this->Profesiones($slugEvaluacion,$trasncurrido);
                    return $vista;
                    break;

                case "profesion":
                    $vista = $this->Profesiones($slugEvaluacion,$trasncurrido);
                    return $vista;
                    break;


            }
        }

        return redirect('evaluacion');
    }



    public function guardarPreguntaLaboral($respuesta, $slugPregunta)
    {
        Session::forget('message-error');

        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }

        $cntPreguntas = DB::table('preguntas')
        ->where('evaluacion_id', $evaluacion->id)
        ->where('tipo', 'LABORAL')
        ->where('valor', $respuesta)
        ->count();

        if($cntPreguntas < 4)
        {
            DB::table('preguntas')
            ->where('slug', $slugPregunta)
            ->update(['valor'  => $respuesta,
                      'estado' => 'INACTIVO',
                      'usuario_actualiza' => Auth::user()->nombre,
                      'f_respuesta' => Carbon::now()]);

            $cntPreguntas2 = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion->id)
            ->where('tipo', 'LABORAL')
            ->where('estado', 'ACTIVO')
            ->count();

            if($cntPreguntas2 >0)
            {
                $vista = $this->ActividadesLaborales($evaluacion->id,$trasncurrido,$evaluacion->slug);
                return $vista;
            }
            else
            {
                DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => 'quadIntroDescriptor']);

                return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
            }

        }
        else{

            Session::flash('message-error','Ese valor fue asigando cuatro veces, selecione otra opción para continuar');
            $vista = $this->ActividadesLaborales($evaluacion->id,$trasncurrido,$evaluacion->slug);
            return $vista;
        }
    }

    public function guardarFrases($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            $cntPreguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion->id)
            ->where('tipo', 'VAL')
            ->where('estado', 'INACTIVO')
            ->count();

            if($cntPreguntas <= 8)
            {
                $cntPreguntas2 = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'VAL')
                ->where('estado', 'INACTIVO')
                ->count();

                $valorRespuesta = (8 - $cntPreguntas2);

                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $valorRespuesta,'estado' => 'INACTIVO','usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);



                $vista = $this->FrasesImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
                return $vista;

                // if($cntPreguntas2 == 8)
                // {
                //     DB::table('evaluaciones')
                //     ->where('slug', $evaluacion->slug)
                //     ->update(['ruta' => 'quadFrasesFavoritas']);
                //     return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                // }
                // else
                // {
                //     $vista = $this->FrasesImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
                //     return $vista;
                // }
            }
            else
            {
                $vista = $this->FrasesImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
                return $vista;
            }
        }
    }

    public function aceptarFrases($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            $vista = $this->FrasesImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
            return $vista;
        }
    }

    public function retornarFrase($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        //dd($evaluacion);

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            $est = DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,'estado' => 'ACTIVO','usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);

            //dd($est,'est');

            $vista = $this->FrasesImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
            return $vista;

        }
    }

    public function guardarFrasesFavoritas($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            $cntPreguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion->id)
            ->where('tipo', 'VAL')
            ->where('estado', 'INACTIVO')
            ->where('valor', 4)
            ->count();

            if($cntPreguntas < 4)
            {
                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'               => $respuesta,
                          'estado'              => 'INACTIVO',
                          'usuario_actualiza'   => Auth::user()->nombre,
                          'f_respuesta'         => Carbon::now()]);

                $cntPreguntas2 = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'VAL')
                ->where('estado', 'INACTIVO')
                ->where('valor', 4)
                ->count();



                if($cntPreguntas2 == 4)
                {
                    DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => 'quadIntroDescriptor']);

                    return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                }
                else
                {
                    $vista = $this->FrasesFavoritas($evaluacion->id,$trasncurrido,$evaluacion->slug);
                    return $vista;
                }
            }
        }
    }

    public function guardarDescriptores($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();


        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            $cntPreguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion->id)
            ->where('tipo', 'DESCRIPTOR')
            ->where('estado', 'INACTIVO')
            ->count();

            if($cntPreguntas < 8)
            {
                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,'estado' => 'INACTIVO','usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);

                $cntPreguntas2 = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'DESCRIPTOR')
                ->where('estado', 'INACTIVO')
                ->count();

                if($cntPreguntas2 == 8)
                {
                    DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => 'quadDescriptorFavorito']);

                    return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                }
                else
                {
                    $vista = $this->DescriptoresImportates($evaluacion->id,$trasncurrido,$evaluacion->slug);
                    return $vista;
                }
            }
        }
    }

    public function guardarDescriptorFavorito($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')
            ->where('slug', $evaluacion->slug)
            ->update(['estado' => 'ABANDONADA']);

            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,'estado' => 'INACTIVO','usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);

            DB::table('evaluaciones')
                ->where('slug', $evaluacion->slug)
                ->update(['ruta' => 'quadIntroAficion']);

            return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
        }
    }

    public function guardarAficiones($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);

            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            $cntPreguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion->id)
            ->where('tipo', 'AFICION')
            ->where('estado', 'INACTIVO')
            ->count();

            if($cntPreguntas < 6)
            {
                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,
                          'estado' => 'INACTIVO',
                          'usuario_actualiza' => Auth::user()->nombre,
                          'f_respuesta' => Carbon::now()]);

                $cntPreguntas2 = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'AFICION')
                ->where('estado', 'INACTIVO')
                ->count();

                if($cntPreguntas2 == 6)
                {
                    DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => 'quadAficionFavorita']);

                    return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                }
                else
                {
                    $vista = $this->Aficiones($evaluacion->id, $trasncurrido, $evaluacion->slug);
                    return $vista;
                }
            }



        }
    }

    public function guardarAficionFavorita($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);

            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
            DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,'estado' => 'INACTIVO','usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);

            DB::table('evaluaciones')
                ->where('slug', $evaluacion->slug)
                ->update(['ruta' => 'quadAficionRegular']);

            return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
        }
    }

    public function guardarAficionRegular($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
            ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
            ->join('campanas', 'campanas.id', '=', 'evaluaciones.campana_id')
            ->where('preguntas.slug', $slugPregunta)
            ->select('evaluaciones.*','campanas.carreras')
            ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);

            return view('cliente.evaluacion_2mensaje');
        }
        else
        {

                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,'estado' => 'INACTIVO','usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);

                $cntPreguntas = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'AFICION')
                ->where('estado', 'INACTIVO')
                ->where('valor', 5)
                ->count();

                if($cntPreguntas == 0)
                {
                    //Caso Test QUADCITO V1
                    if($evaluacion->herramienta_id == 4 and $evaluacion->carreras == 1)
                    {
                        DB::table('evaluaciones')
                        ->where('slug', $evaluacion->slug)
                        ->update(['ruta' => 'quadIntroForma']);
                    }
                    else{
                        DB::table('evaluaciones')
                        ->where('slug', $evaluacion->slug)
                        ->update(['ruta' => 'quadIntroAtributo']);
                    }
                    return redirect()->route('evaluacion.edit', [$evaluacion->slug]);

                    //cambio al 2 de enero 2024, profesiones, borrar cuando este estable
                    // if($evaluacion->carreras == 0)
                    // {
                    //     DB::table('evaluaciones')
                    //     ->where('slug', $evaluacion->slug)
                    //     ->update(['ruta' => 'quadIntroAtributo']);
                    // }
                    // else{
                    //     DB::table('evaluaciones')
                    //     ->where('slug', $evaluacion->slug)
                    //     ->update(['ruta' => 'quadIntroForma']);
                    // }
                    // return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                }
                else
                {
                    $vista = $this->AficionesRegulares($evaluacion->id, $trasncurrido, $evaluacion->slug);
                    return $vista;
                }



        }
    }


    public function guardarAtributo($respuesta, $slugPregunta, $pareja)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);

            return view('cliente.evaluacion_2mensaje');
        }
        else
        {

                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => $respuesta,'usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);

                DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'ATRIBUTO')
                ->where('pareja', $pareja)
                ->update(['estado'  => 'INACTIVO']);

                $cntPreguntas = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'ATRIBUTO')
                ->where('estado', 'ACTIVO')
                ->where('valor', 0)
                ->count();

                if($cntPreguntas == 0)
                {
                    DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => 'quadIntroPregunta']);

                    return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                }
                else
                {
                    $vista = $this->Atributos($evaluacion->id, $trasncurrido, ($cntPreguntas/2), $evaluacion->slug);
                    return $vista;
                }
        }
    }

    public function guardarPregunta($respuesta, $slugPregunta)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);

            return view('cliente.evaluacion_2mensaje');
        }
        else
        {

                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => 1,
                          'pareja'  => $respuesta,
                          'estado' => 'INACTIVO','usuario_actualiza' => Auth::user()->nombre,'f_respuesta' => Carbon::now()]);


                $cntPreguntas = DB::table('preguntas')
                ->where('evaluacion_id', $evaluacion->id)
                ->where('tipo', 'PREGUNTA')
                ->where('estado', 'ACTIVO')
                ->count();


                if($cntPreguntas == 0)
                {
                    DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => 'quadIntroForma']);

                    return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                }
                else
                {
                    $vista = $this->Preguntas($evaluacion->id, $trasncurrido, $evaluacion->slug);
                    return $vista;
                }



        }
    }

    public function guardarForma($respuesta, $slugPregunta,$pareja)
    {
        $evaluacion = DB::table('evaluaciones')
        ->join('preguntas', 'evaluaciones.id', '=', 'preguntas.evaluacion_id')
        ->where('preguntas.slug', $slugPregunta)
        ->select('evaluaciones.*')
        ->first();

        $campana = DB::table('campanas')
        ->where('id',$evaluacion->campana_id)
        ->select('campanas.*')
        ->first();

        //dd($campana);

        $empresa = DB::table('empresas')
        ->where('empresas.id', Auth::user()->id_empresa)
        ->select('empresas.*')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $evaluacion->slug)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }
        else
        {
                DB::table('preguntas')
                ->where('slug', $slugPregunta)
                ->update(['valor'  => 1,
                          'estado' => 'INACTIVO',
                          'usuario_actualiza' => Auth::user()->nombre,
                          'f_respuesta' => Carbon::now()]);

                if ($campana->carreras == 0)
                {
                    DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta'    => '/',
                          'estado'  => 'FINALIZADA',
                          'f_fin'   => Carbon::now()]);

                    //----ENVIO NOTIFICACION
                    if ($empresa->recibir_notificaciones == 'SI' || $campana->notificar_resultados == 'SI')
                    {
                        $details = ['nombre'    => Auth::user()->nombre . ' ' . Auth::user()->apellido];

                        $emailsAdministradores = DB::table('users')
                        ->select('email')
                        ->where('estado', 'ACTIVO')
                        ->where('empresa_id', Auth::user()->id_empresa)
                        ->get();

                        \Mail::to(Auth::user()->email)
                        ->bcc($emailsAdministradores)
                        ->send(new \App\Mail\TestFinalizado($details));
                    }
                    else
                    {
                        $details = ['nombre'    => Auth::user()->nombre];
                        \Mail::to(Auth::user()->email)
                        ->send(new \App\Mail\TestFinalizado($details));
                    }
                }
                else
                {
                    $tipoQuadcito = "";
                    switch ($evaluacion->herramienta_id)
                    {
                        case 4:
                            $tipoQuadcito = "carrera";
                            break;
                        case 2:
                            $tipoQuadcito = "IntroProfesion";
                            break;
                    }

                    DB::table('evaluaciones')
                    ->where('slug', $evaluacion->slug)
                    ->update(['ruta' => $tipoQuadcito]);

                    return redirect()->route('evaluacion.edit', [$evaluacion->slug]);
                }

                Session::flash('message','El test finalizo correctamente, gracias por su participación');
                return redirect()->route('evaluacion.edit', [$evaluacion->slug]);

        }
    }

    public function guardarCarrera($slugEvaluacion, $idCarrera)
    {
        DB::table('evaluaciones')
        ->where('slug', $slugEvaluacion)
        ->update([  'ruta'              => '/',
                    'estado'            => 'FINALIZADA',
                    'carrera_preferida' => $idCarrera,
                    'f_fin'             => Carbon::now()]
                );

        Session::flash('message','El test finalizo correctamente, gracias por su participación');
        return redirect()->route('evaluacion.edit', [$slugEvaluacion]);
    }


    public function guardarProfesion($slugEvaluacion, $idProfesion)
    {
        $cntProfesiones = 0;
        $evaluacion = DB::table('evaluaciones')
        ->where('slug', $slugEvaluacion)
        ->select('evaluaciones.*')
        ->first();


        if ($evaluacion->carrera_preferida == 0 && $cntProfesiones == 0)
        {
            $cntProfesiones = 1;
            DB::table('evaluaciones')->where('slug', $slugEvaluacion)->update(['carrera_preferida' => $idProfesion, 'ruta' => 'profesion']);
        }
        if ($evaluacion->carrera_preferida2 == 0 && $cntProfesiones == 0)
        {
            $cntProfesiones = 2;
            DB::table('evaluaciones')->where('slug', $slugEvaluacion)->update(['carrera_preferida2' => $idProfesion]);
        }
        if ($evaluacion->carrera_preferida3 == 0 && $cntProfesiones == 0)
        {
            $cntProfesiones = 3;
            DB::table('evaluaciones')->where('slug', $slugEvaluacion)->update(['carrera_preferida3' => $idProfesion]);
        }
        if ($evaluacion->carrera_preferida4 == 0 && $cntProfesiones == 0)
        {
            $cntProfesiones = 4;
            DB::table('evaluaciones')->where('slug', $slugEvaluacion)->update(['carrera_preferida4' => $idProfesion]);
        }


        if ($cntProfesiones == 4)
        {
            DB::table('evaluaciones')
            ->where('slug', $slugEvaluacion)
            ->update([  'ruta'              => '/',
                        'estado'            => 'FINALIZADA',
                        'f_fin'             => Carbon::now()]
                    );

            Session::flash('message','El test finalizo correctamente, gracias por su participación');
            return redirect()->route('evaluacion.edit', [$slugEvaluacion]);
        }
        else
            return redirect()->route('preguntasevaluacion', [$evaluacion->slug]);





    }


    public function preguntaZurdo($slugEvaluacion)
    {
        $evaluacion = DB::table('evaluaciones')
        ->where('slug', $slugEvaluacion)
        ->select('slug','estado','ruta','id','f_inicio')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $slugEvaluacion)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }

        //Se despliegan preguntas en base a la ruta y estado del test
        if($evaluacion->estado == "PROCESO")
        {
            $codigoSituacion="";
            $vista = $this->Formas($evaluacion->id,$trasncurrido,1);
            return $vista;

        }
        return redirect('evaluacion');
    }

    public function preguntaDiestro($slugEvaluacion)
    {
        $evaluacion = DB::table('evaluaciones')
        ->where('slug', $slugEvaluacion)
        ->select('slug','estado','ruta','id','f_inicio')
        ->first();

        $trasncurrido = $this->minutosTranscurridos($evaluacion->f_inicio);
        if($trasncurrido > 45)
        {
            DB::table('evaluaciones')->where('slug', $slugEvaluacion)->update(['estado' => 'ABANDONADA','f_fin' => Carbon::now()]);
            return view('cliente.evaluacion_2mensaje');
        }

        //Se despliegan preguntas en base a la ruta y estado del test
        if($evaluacion->estado == "PROCESO")
        {
            $codigoSituacion="";
            $vista = $this->Formas($evaluacion->id,$trasncurrido,2);
            return $vista;

        }
        return redirect('evaluacion');
    }

}
