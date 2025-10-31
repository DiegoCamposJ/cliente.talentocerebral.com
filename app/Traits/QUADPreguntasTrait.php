<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



trait QUADPreguntasTrait
{
    public function minutosTranscurridos($fecha_i)
    {
        $minutos = (strtotime($fecha_i)-strtotime(Carbon::now()))/60;
        $minutos = abs($minutos); $minutos = floor($minutos);
        return $minutos;
    }

    public function ActividadesLaborales($evaluacion_id,$trasncurrido,$evaluacion_slug)
    {

        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'LABORAL')
            ->select('preguntas.*')
            ->get();

        return view('cliente.form1_actividades_laborales',
                 ['preguntas' => $preguntas,
                  'trasncurrido' => $trasncurrido,
                  'evaluacion_id' => $evaluacion_id,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);

    }

    public function FrasesImportates($evaluacion_id,$trasncurrido,$evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'VAL')
            ->select('preguntas.*')
            ->get();

        $preguntasSeleccionadas = DB::table('preguntas')
        ->where('evaluacion_id', $evaluacion_id)
        ->where('estado', 'INACTIVO')
        ->where('tipo', 'VAL')
        ->select('preguntas.*')
        ->get();

        $selecionados = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'VAL')
            ->count();

        return view('cliente.form12_frases_importantes',
                 ['preguntas'       => $preguntas,
                  'preguntasSeleccionadas' => $preguntasSeleccionadas,
                  'trasncurrido'    => $trasncurrido,
                  'evaluacion_id'   => $evaluacion_id,
                  'selecionados'    => $selecionados,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);

    }

    public function FrasesFavoritas($evaluacion_id,$trasncurrido,$evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'VAL')
            ->where('valor', 3)
            ->select('preguntas.*')
            ->get();

        $selecionados = DB::table('preguntas')
        ->where('evaluacion_id', $evaluacion_id)
        ->where('estado', 'INACTIVO')
        ->where('tipo', 'VAL')
        ->where('valor', 4)
        ->count();

        return view('cliente.form13_frase_favorita',
                 ['preguntas' => $preguntas,
                  'trasncurrido' => $trasncurrido,
                  'evaluacion_id' => $evaluacion_id,
                  'selecionados'    => $selecionados,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);

    }


    public function DescriptoresImportates($evaluacion_id,$trasncurrido,$evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'DESCRIPTOR')
            ->select('preguntas.*')
            ->get();

        $selecionados = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'DESCRIPTOR')
            ->count();

        return view('cliente.form2_descriptores_importantes',
                 ['preguntas'       => $preguntas,
                  'trasncurrido'    => $trasncurrido,
                  'evaluacion_id'   => $evaluacion_id,
                  'selecionados'    => $selecionados,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);

    }

    public function DescriptorFavorito($evaluacion_id,$trasncurrido,$evaluacion_slug)
    {


        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'DESCRIPTOR')
            ->select('preguntas.*')
            ->get();


        return view('cliente.form3_descriptor_favorito',
                 ['preguntas' => $preguntas,
                  'trasncurrido' => $trasncurrido,
                  'evaluacion_id' => $evaluacion_id,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);

    }

    public function Aficiones($evaluacion_id, $trasncurrido ,$evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'AFICION')
            ->select('preguntas.*')
            ->get();

        $selecionados = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'AFICION')
            ->count();


        return view('cliente.form4_aficiones',
                 ['preguntas'       => $preguntas,
                  'trasncurrido'    => $trasncurrido,
                  'evaluacion_id'   => $evaluacion_id,
                  'selecionados'    => $selecionados,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);

    }

    public function AficionFavorita($evaluacion_id, $trasncurrido ,$evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'AFICION')
            ->select('preguntas.*')
            ->get();


        return view('cliente.form5_aficion_favorita',
                 ['preguntas'        => $preguntas,
                  'trasncurrido'     => $trasncurrido,
                  'evaluacion_id'    => $evaluacion_id,
                  'evaluacion_slug'  => $evaluacion_slug
                 ]);

    }

    public function AficionesRegulares($evaluacion_id, $trasncurrido, $evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'AFICION')
            ->where('valor', 5)
            ->select('preguntas.*')
            ->get();

        return view('cliente.form6_aficiones_regulares',
                 ['preguntas'       => $preguntas,
                  'trasncurrido'    => $trasncurrido,
                  'evaluacion_id'   => $evaluacion_id,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);

    }

    public function Atributos($evaluacion_id, $trasncurrido, $nPreguntas ,$evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'ATRIBUTO')
            ->select('preguntas.*')
            ->get();


        return view('cliente.form7_atributos',
                 ['preguntas'       => $preguntas,
                  'trasncurrido'    => $trasncurrido,
                  'evaluacion_id'   => $evaluacion_id,
                  'nPreguntas'      => $nPreguntas,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);
    }

    public function Preguntas($evaluacion_id, $trasncurrido, $evaluacion_slug)
    {
        $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'PREGUNTA')
            ->select('preguntas.*')
            ->get();


        return view('cliente.form8_preguntas',
                 ['preguntas' => $preguntas,
                  'trasncurrido' => $trasncurrido,
                  'evaluacion_id' => $evaluacion_id,
                  'evaluacion_slug' => $evaluacion_slug
                 ]);
    }

    public function Formas($evaluacion_id,$trasncurrido,$pareja)
    {

        if($pareja == 1)
        {
            $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'ESCRITURA')
            ->select('preguntas.*')
            ->get();
        }
        else
        {
            $preguntas = DB::table('preguntas')
            ->where('evaluacion_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'ESCRITURA2')
            ->select('preguntas.*')
            ->get();
        }


        return view('cliente.form9_formas',
                 ['preguntas' => $preguntas,
                  'trasncurrido' => $trasncurrido,
                  'evaluacion_id' => $evaluacion_id
                 ]);
    }

    public function Carreras($slugEvaluacion,$trasncurrido)
    {
        $carreras = DB::table('carreras')
            ->where('estado', 'ACTIVO')
            ->select('carreras.*')
            ->get();

        return view('cliente.form10_carreras',
                 ['carreras'       => $carreras,
                  'trasncurrido'    => $trasncurrido,
                  'slugEvaluacion'   => $slugEvaluacion,

                 ]);

    }

    public function Profesiones($slugEvaluacion,$trasncurrido)
    {
        $cntProfesiones = 0;
        $evaluacion = DB::table('evaluaciones')
        ->where('slug', $slugEvaluacion)
        ->select('evaluaciones.*')
        ->first();

        if ($evaluacion->carrera_preferida > 0)
            $cntProfesiones = 1;
        if ($evaluacion->carrera_preferida2 > 0)
            $cntProfesiones = 2;
        if ($evaluacion->carrera_preferida3 > 0)
            $cntProfesiones = 3;



        $profesiones = DB::table('profesiones')
            ->select('profesiones.*')
            ->where('estado', 'ACTIVO')
            ->where('id','!=', $evaluacion->carrera_preferida)
            ->where('id','!=', $evaluacion->carrera_preferida2)
            ->where('id','!=', $evaluacion->carrera_preferida3)
            ->get();

        return view('cliente.form11_profesiones',
                 ['profesiones'    => $profesiones,
                  'trasncurrido'   => $trasncurrido,
                  'slugEvaluacion' => $slugEvaluacion,
                  'cntProfesiones' => $cntProfesiones

                 ]);

    }


}
