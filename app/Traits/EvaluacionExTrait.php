<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;



trait EvaluacionExTrait
{


    public function evaluarNucleo($idEvaluacion,$tipo,$variable)
    {

        $situacion5 = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 5)
                ->where('tipo', $tipo)
                ->select('valor')
                ->first();


        $situacion2 = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 2)
                ->where('tipo', $tipo)
                ->select('valor')
                ->first();

        $situacion3 = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 3)
                ->where('tipo', $tipo)
                ->select('valor')
                ->first();

        $situacion7 = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 7)
                ->where('tipo', $tipo)
                ->get()
                ->sum('valor');


        $total = ( $situacion5->valor + $situacion2->valor + $situacion3->valor + $situacion7);

        // if($tipo == "ESCEPTICO")
        // {   dd($situacion7);
        //     dd($total);
        // }




        DB::table('evaluaciones_ex')
                ->where('id', $idEvaluacion)
                ->update([$variable => $total]);

        //return ( $situacion5->valor + $situacion2->valor + $situacion3->valor + $situacion7);

    }

    public function nucleoFinal($idEvaluacion)
    {

        $evaluacion = DB::table('evaluaciones_ex')
            ->where('id', $idEvaluacion)
            ->select('evaluaciones_ex.*' )
            ->first();

        $parcialNucleo = ($evaluacion->v1 + $evaluacion->v2 + $evaluacion->v3  + $evaluacion->v4 + $evaluacion->v5 + $evaluacion->v6);



        $v1 = (($evaluacion->v1 * 570)/ $parcialNucleo);
        $v2 = (($evaluacion->v2 * 570)/ $parcialNucleo);
        $v3 = (($evaluacion->v3 * 570)/ $parcialNucleo);
        $v4 = (($evaluacion->v4 * 570)/ $parcialNucleo);
        $v5 = (($evaluacion->v5 * 570)/ $parcialNucleo);
        $v6 = (($evaluacion->v6 * 570)/ $parcialNucleo);


        DB::table('evaluaciones_ex')
                ->where('id', $idEvaluacion)
                ->update([
                'v1' => $v1,
                'v2' => $v2,
                'v3' => $v3,
                'v4' => $v4,
                'v5' => $v5,
                'v6' => $v6]);
    }

    public function caosFinal($idEvaluacion)
    {

        //PARTE 1
        $pioneroTmp1        = $this->sumaSituaciones($idEvaluacion,'PIONERO');             //k15
        $adaptadorTmp1      = $this->sumaSituaciones($idEvaluacion,'ADAPTADOR TEMPRANO');  //k16
        $mayoriaTmp1        = $this->sumaSituaciones($idEvaluacion,'MAYORIA TEMPRANA');     //k17
        $pragmaticoTmp1     = $this->sumaSituaciones($idEvaluacion,'PRAGMATICO');           //K18
        $conservadorTmp1    = $this->sumaSituaciones($idEvaluacion,'CONSERVADOR');          //k19
        $escepticoTmp1      = $this->sumaSituaciones($idEvaluacion,'ESCEPTICO');           //k20


        // if($tipo == "PIONERO")
        // {   dd($situacion7);
        //     dd($total);
        // }




        //PARTE 2
        $pioneroTmp2        = $this->evaluacionComparativa($idEvaluacion,'PIONERO',1);
        $adaptadorTmp2      = $this->evaluacionComparativa($idEvaluacion,'ADAPTADOR TEMPRANO',1);
        $mayoriaTmp2        = $this->evaluacionComparativa($idEvaluacion,'MAYORIA TEMPRANA',1);
        $pragmaticoTmp2     = $this->evaluacionComparativa($idEvaluacion,'PRAGMATICO',-1);
        $conservadorTmp2    = $this->evaluacionComparativa($idEvaluacion,'CONSERVADOR',-1);
        $escepticoTmp2      = $this->evaluacionComparativa($idEvaluacion,'ESCEPTICO',-1);



        //PARTE 3

        // $pioneroTmp3        = $this->evaluacionReflexion($idEvaluacion,'PIONERO',1);            //J56
        // $adaptadorTmp3      = $this->evaluacionReflexion($idEvaluacion,'ADAPTADOR TEMPRANO',1);
        // $mayoriaTmp3        = $this->evaluacionReflexion($idEvaluacion,'MAYORIA TEMPRANA',1);
        // $pragmaticoTmp3     = $this->evaluacionReflexion($idEvaluacion,'PRAGMATICO',-1);
        // $conservadorTmp3    = $this->evaluacionReflexion($idEvaluacion,'CONSERVADOR',-1);
        // $escepticoTmp3      = $this->evaluacionReflexion($idEvaluacion,'ESCEPTICO',-1);


        $pioneroTmp3        = 0;            //J56
        $adaptadorTmp3      = 0;
        $mayoriaTmp3        = 0;
        $pragmaticoTmp3     = 0;
        $conservadorTmp3    = 0;
        $escepticoTmp3      = 0;


        //dd( $pragmaticoTmp3);

        $nucleo = DB::table('evaluaciones_ex')->where('id', $idEvaluacion)->first();

        $pionero        = ($pioneroTmp1     + $pioneroTmp2      + $pioneroTmp3      + $nucleo->v1);
        $adaptador      = ($adaptadorTmp1   + $adaptadorTmp2    + $adaptadorTmp3    + $nucleo->v2);
        $mayoria        = ($mayoriaTmp1     + $mayoriaTmp2      + $mayoriaTmp3      + $nucleo->v3);
        $pragmatico     = ($pragmaticoTmp1  + $pragmaticoTmp2   + $pragmaticoTmp3   + $nucleo->v4);
        $conservador    = ($conservadorTmp1 + $conservadorTmp2  + $conservadorTmp3  + $nucleo->v5);
        $esceptico      = ($escepticoTmp1   + $escepticoTmp2    + $escepticoTmp3    + $nucleo->v6);

        DB::table('evaluaciones_ex')
                ->where('id', $idEvaluacion)
                ->update([  'v7'  => $pionero,
                            'v8'  => $adaptador,
                            'v9'  => $mayoria,
                            'v10' => $pragmatico,
                            'v11' => $conservador,
                            'v12' => $esceptico
                            ]);



    }

    //EVALUACION CAOS PARTE 1
    public function sumaSituaciones($idEvaluacion,$arquetipo)
    {

        $arquetipoOpuesto = '';
        $factor=1;



        switch ($arquetipo) {
            case 'PIONERO':
                $arquetipoOpuesto = 'PIONERO';
                break;
            case 'ADAPTADOR TEMPRANO':
                $arquetipoOpuesto = 'ADAPTADOR TEMPRANO';
                break;
            case 'MAYORIA TEMPRANA':
                $arquetipoOpuesto = 'MAYORIA TEMPRANA';
                break;

            //------------------------------------

            case 'ESCEPTICO':
                $arquetipoOpuesto = 'PIONERO';
                global $factor;
                $factor = -1;
                break;
            case 'CONSERVADOR':
                $arquetipoOpuesto = 'ADAPTADOR TEMPRANO';
                global $factor;
                $factor = -1;
                break;
            case 'PRAGMATICO':
                $arquetipoOpuesto = 'MAYORIA TEMPRANA';
                global $factor;
                $factor = -1;
                break;

        }


        $resultado1 = $this->evaluarSituacion($idEvaluacion,6, $arquetipoOpuesto,$factor);
        //dd($resultado1);
        $resultado2 = $this->evaluarSituacion($idEvaluacion,1, $arquetipoOpuesto,$factor);
        //dd($resultado2);
        $resultado3 = $this->evaluarSituacion($idEvaluacion,4, $arquetipoOpuesto,$factor);
        //dd($resultado3);


        return ($resultado1 + $resultado2 + $resultado3);

    }

    //public function evaluarSituacion($idEvaluacion,$situacion,$arquetipo,$arquetipoOpuesto,$factor)
    public function evaluarSituacion($idEvaluacion,$situacion,$arquetipoOpuesto,$factor)
    {
        $resul =0;


        //dd($arquetipoOpuesto);//,$situacion,$arquetipoOpuesto,$factor

            $val1 = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', $situacion)
                ->where('tipo', $arquetipoOpuesto)
                ->select('valor')
                ->first();

            // $val2 = DB::table('preguntas_ex')
            //     ->where('evaluacionesEx_id', $idEvaluacion)
            //     ->where('situacion_id', $situacion)
            //     ->where('tipo', $arquetipoOpuesto)
            //     ->select('valor')
            //     ->first();

            // $resul = $val1->valor + ( $val2->valor * -1);

            $resul=($val1->valor)* $factor;

        return $resul;

    }

    //EVALUACION CAOS PARTE 2
    public function evaluacionComparativa($idEvaluacion,$arquetipo,$factor)
    {

        //SELECT * FROM braindb.preguntas_ex  where evaluacionesEx_id=48 and situacion_id=8 and tipo='PIONERO';
        $preguntas = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 8)
                ->where('tipo', $arquetipo)
                ->select('valor','pareja')
                ->get();

        $valorArquetipo=0;

        foreach ($preguntas as $pregunta)
        {
            $arquetipoPareja = DB::table('preguntas_ex')
                            ->where('evaluacionesEx_id', $idEvaluacion)
                            ->where('situacion_id', 8)
                            ->where('tipo','!=', $arquetipo)
                            ->where('pareja', $pregunta->pareja)
                            ->select('valor')
                            ->first();


            $val1=0;
            if($pregunta->valor > 0)
                $val1 = $pregunta->valor;

            $val2=0;
            if($arquetipoPareja->valor > 0)
                $val2 = $arquetipoPareja->valor;


             $valorArquetipo = $valorArquetipo + ($val1 + $val2);


        //$valorArquetipo = $valorArquetipo + ($pregunta->valor + ($arquetipoPareja->valor * -1));

        }
        return ($valorArquetipo * $factor);
    }

    //EVALUACION CAOS PARTE 3
    public function evaluacionReflexion($idEvaluacion,$arquetipo,$factor)
    {
        $respuesta = -100;

        if ($factor == 1)
        {
            $normal = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 9)
                ->where('tipo', $arquetipo)
                ->get()
                ->sum('valor');

            $var2=0;

                $opuestos = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 9)
                ->where('color', $arquetipo)
                ->select('valor')
                ->get();


                foreach($opuestos as $opuesto)
                {
                    if($opuesto->valor > 0)
                        $var2= $var2 + ($opuesto->valor * -1);
                    else
                        $var2= $var2 + $opuesto->valor;

                }

                $respuesta = $normal + $var2;
        }
        else
        {
            $normal = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 9)
                ->where('color', $arquetipo)
                ->get()
                ->sum('valor');


                $var2=0;

                $opuestos = DB::table('preguntas_ex')
                ->where('evaluacionesEx_id', $idEvaluacion)
                ->where('situacion_id', 9)
                ->where('tipo', $arquetipo)
                ->select('valor')
                ->get();


                foreach($opuestos as $opuesto)
                {
                    if($opuesto->valor > 0)
                        $var2= $var2 + ($opuesto->valor * -1);
                    else
                        $var2= $var2 + $opuesto->valor;

                }

                $respuesta = $normal + $var2;
        }

        //return ($normal - ($opuesto * $factor ) );

        return $respuesta;


    }

}
