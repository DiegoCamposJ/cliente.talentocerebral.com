<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



trait B4LPreguntasTrait
{
    public function minutosTranscurridosCargo($fecha_i)
    {

        $minutos = (strtotime($fecha_i)-strtotime(Carbon::now()))/60;
        $minutos = abs($minutos); $minutos = floor($minutos);
        return $minutos;
    }

    public function ActividadesLaboralesB4L($evaluacion_id,$trasncurrido)
    {
        $preguntas = DB::table('preguntas_b4l')
            ->where('evaluacionB4L_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'LABORAL')
            ->select('preguntas_b4l.*')
            ->get();


        return view('clienteB4L.form1_actividades_laborales',
                 ['preguntas' => $preguntas,
                  'trasncurrido' => $trasncurrido,
                  'evaluacion_id' => $evaluacion_id
                 ]);

    }

    public function DescriptoresImportatesB4L($evaluacion_id,$trasncurrido)
    {
        $preguntas = DB::table('preguntas_b4l')
            ->where('evaluacionB4L_id', $evaluacion_id)
            ->where('estado', 'ACTIVO')
            ->where('tipo', 'DESCRIPTOR')
            ->select('preguntas_b4l.*')
            ->get();

        $selecionados = DB::table('preguntas_b4l')
            ->where('evaluacionB4L_id', $evaluacion_id)
            ->where('estado', 'INACTIVO')
            ->where('tipo', 'DESCRIPTOR')
            ->count();


        return view('clienteB4L.form2_descriptores_importantes',
                 ['preguntas'       => $preguntas,
                  'trasncurrido'    => $trasncurrido,
                  'evaluacion_id'   => $evaluacion_id,
                  'selecionados'    => $selecionados
                 ]);

    }


}
