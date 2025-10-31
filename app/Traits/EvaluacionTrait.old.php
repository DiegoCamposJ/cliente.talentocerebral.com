<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Traits\EmpateEvaluacionTrait;
use App\Traits\CarreraEvaluacionTrait;
use Illuminate\Support\Str;


trait EvaluacionTrait
{
    use EmpateEvaluacionTrait;
    use CarreraEvaluacionTrait;

    public function validarBatch($idCampana)
    {
        $personas = DB::table('personas_cargas')
        ->where('id_campana','=',$idCampana)        
        ->get();

        foreach($personas as $persona)
            {
                
                $mensajeError = "";
                $cnt = 0;

                $cntIdentificacion = DB::table('personas')
                ->where('identificacion', $persona->identificacion)
                ->count();

                if ($cntIdentificacion > 0)
                {
                    $cnt++;
                    $mensajeError = "Identificación ya existe -";
                }

                $cntEmail = DB::table('personas')
                ->where('email', $persona->email)
                ->count();

                if ($cntEmail > 0)
                {
                    $cnt++;
                    $mensajeError = $mensajeError . "Email ya existe -";
                }

                if ($persona->sexo != 'M' && $persona->sexo != 'F')
                {
                    $cnt++;
                    $mensajeError = $mensajeError . "Genero no especificado";
                }

                //mb_strlen($persona->email )




                if ($cnt == 0)
                {
                    DB::table('personas_cargas')
                    ->where('id', $persona->id)
                    ->update([
                      'estado' => 'OK']);
                }
                else
                {
                    DB::table('personas_cargas')
                    ->where('id', $persona->id)
                    ->update(['observacion' => $mensajeError,
                      'estado' => 'ERROR']);

                }
                    


                


            }




    }


    public function preguntaC($codPregunta,$id,$evaluacion)
    {

        $pregunta = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','PREGUNTA')
        ->where('color',$codPregunta)
        ->first();

        //dd($pregunta);

        $valorPregunta=0;

        if($evaluacion == "NORMAL")
        {
            //dd($pregunta->pareja);

            switch ($pregunta->pareja) {

                case 1:
                    $valorPregunta = -3;
                    break;
                case 2:
                    $valorPregunta=-2;
                    break;
                case 3:
                    $valorPregunta=1;
                    break;
                case 4:
                    $valorPregunta=2;
                    break;
                case 5:
                    $valorPregunta=3;
                    break;
            }

        }
        else
        {

            switch ($pregunta->pareja) {
                case 1:
                    $valorPregunta=3;
                    break;
                case 2:
                    $valorPregunta=2;
                    break;
                case 3:
                    $valorPregunta=1;
                    break;
                case 4:
                    $valorPregunta=-2;
                    break;
                case 5:
                    $valorPregunta=-3;
                    break;
            }
        }

        return $valorPregunta;
    }


    public function variablesNucleoQUAD($id)
    {

        $CONS_QUAD = 295;

        //------------------NUCLEO--------------------------------------
        //AZUL
        $azN1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','LABORAL')
        ->whereIn('color',['C22','C28','G24','G29'])
        ->sum('valor');

        $azN2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','DESCRIPTOR')
        ->whereIn('color',['C41','C48','G43','G46','G48'])
        ->sum('valor');

        $azN3 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('tipo',['ESCRITURA','ESCRITURA2'])
        ->whereIn('color',['E10','I10'])
        ->sum('valor');

        $azN4 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','AFICION')
        ->whereIn('color',['C64','C69','C70','G64','G67'])
        ->sum('valor');

        $azConsolidadoNucleo = $azN1 + $azN2 + $azN3 + $azN4;

        //VERDE
        $veN1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','LABORAL')
        ->whereIn('color',['C23','C29','G22','G27'])
        ->sum('valor');

        $veN2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','DESCRIPTOR')
        ->whereIn('color',['C44','C47','C49','G47'])
        ->sum('valor');

        $veN3 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('tipo',['ESCRITURA','ESCRITURA2'])
        ->whereIn('color',['E14','I14'])
        ->sum('valor');

        $veN4 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','AFICION')
        ->whereIn('color',['C62','C65','G63','G65','G71'])
        ->sum('valor');

        $veConsolidadoNucleo = $veN1 + $veN2 + $veN3 + $veN4;


        //ROJO
        $roN1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','LABORAL')
        ->whereIn('color',['C25','C27','G23','G26'])
        ->sum('valor');

        $roN2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','DESCRIPTOR')
        ->whereIn('color',['C43','C46','G41','G45'])
        ->sum('valor');

        $roN3 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('tipo',['ESCRITURA','ESCRITURA2'])
        ->whereIn('color',['E14','I14'])
        ->sum('valor');

        $roN4 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','AFICION')
        ->whereIn('color',['C63','C66','C67','C71','G68'])
        ->sum('valor');

        $roConsolidadoNucleo = $roN1 + $roN2 + $roN3 + $roN4;



        //AMARILLO
        $amN1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','LABORAL')
        ->whereIn('color',['C24','C26','G25','G28'])
        ->sum('valor');

        $amN2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','DESCRIPTOR')
        ->whereIn('color',['C42','C45','G42','G44'])
        ->sum('valor');

        $amN3 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('tipo',['ESCRITURA','ESCRITURA2'])
        ->whereIn('color',['E10','I10'])
        ->sum('valor');

        $amN4 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','AFICION')
        ->whereIn('color',['C61','G61','G62','G66','G70'])
        ->sum('valor');

        $amConsolidadoNucleo = $amN1 + $amN2 + $amN3 + $amN4;

        $sumaConsolidadoNucleo = ($azConsolidadoNucleo + $veConsolidadoNucleo + $roConsolidadoNucleo + $amConsolidadoNucleo);

        $v1 = (($azConsolidadoNucleo * $CONS_QUAD) / $sumaConsolidadoNucleo);
        $v2 = (($veConsolidadoNucleo * $CONS_QUAD) / $sumaConsolidadoNucleo);
        $v3 = (($roConsolidadoNucleo * $CONS_QUAD) / $sumaConsolidadoNucleo);
        $v4 = (($amConsolidadoNucleo * $CONS_QUAD) / $sumaConsolidadoNucleo);


        //dd($v1, $v2,$v3,$v4);

        DB::table('evaluaciones')
            ->where('id', $id)
            ->update([  'v1' => $v1,
                        'v2' => $v2,
                        'v3' => $v3,
                        'v4' => $v4
                    ]);


    }

    public function variablesCircustancialQUAD($id)
    {

        //----------------------PARTE 1

        //AZUL
        $azCP1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['C12','C14','C16','E22','E30','E32','K14','I22','I24','K26','K30','I32'])
        ->sum('valor');

        $azCP1 = $azCP1 * 2;

        $azCP2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['E12','E14','E16','C22','C30','C32','I14','K22','K24','I26','I30','K32'])
        ->sum('valor');

        $azCP2 = $azCP2 * -2;


        $azCIRCUN1 = $azCP1 + $azCP2;


        //VERDE
        $veCP1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['C10','E16','C18','E24','C28','K10','I16','K18','I26','I28','I30','K32'])
        ->sum('valor');

        $veCP1 = $veCP1 * 2;

        $veCP2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['E10','C16','E18','C24','E28','I10','K16','I18','K26','K28','K30','I32'])
        ->sum('valor');

        $veCP2 = $veCP2 * -2;

        $veCIRCUN1 =  $veCP1 + $veCP2;



        //ROJO
        $roCP1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['E10','E14','E20','C22','C24','C26','C32','K12','K16','I18','K20','K24'])
        ->sum('valor');

        $roCP1 = $roCP1 * 2;

        $roCP2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['C10','C14','C20','E22','E24','E26','E32','I12','I16','K18','I20','I24'])
        ->sum('valor');

        $roCP2 = $roCP2 * -2;

        $roCIRCUN1 =  $roCP1 + $roCP2;


        //AMARILLO
        $amCP1 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['E12','E18','C20','E26','E28','C30','I10','I12','I14','I20','K22','K28'])
        ->sum('valor');

        $amCP1 = $amCP1 * 2;

        $amCP2 = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->where('tipo','=','ATRIBUTO')
        ->whereIn('color',['C12','C18','E20','C26','C28','E30','K10','K12','K14','K20','I22','I28'])
        ->sum('valor');

        $amCP2 = $amCP2 * -2;

        $amCIRCUN1 =  $amCP1 + $amCP2;


        //----------------------PARTE 2

        //AZUL
        $azCIRP1 = $this->preguntaC("PRE_1",$id,"NORMAL");
        $azCIRP2 = $this->preguntaC("PRE_2",$id,"NORMAL");
        $azCIRP3 = $this->preguntaC("PRE_3",$id,"INV");
        $azCIRP4 = $this->preguntaC("PRE_5",$id,"NORMAL");
        $azCIRP5 = $this->preguntaC("PRE_6",$id,"NORMAL");
        $azCIRP6 = $this->preguntaC("PRE_11",$id,"INV");
        $azCIRP7 = $this->preguntaC("PRE_16",$id,"INV");
        $azCIRP8 = $this->preguntaC("PRE_17",$id,"NORMAL");
        $azCIRP9 = $this->preguntaC("PRE_18",$id,"NORMAL");
        $azCIRP10 = $this->preguntaC("PRE_19",$id,"NORMAL");

        $azCIRPT =  ($azCIRP1+ $azCIRP2+ $azCIRP3+ $azCIRP4+ $azCIRP5+ $azCIRP6 + $azCIRP7 +$azCIRP8+ $azCIRP9 + $azCIRP10 );

        //VERDE
        $veCIRP1 = $this->preguntaC("PRE_1",$id,"INV");
        $veCIRP2 = $this->preguntaC("PRE_7",$id,"NORMAL");
        $veCIRP3 = $this->preguntaC("PRE_8",$id,"NORMAL");
        $veCIRP4 = $this->preguntaC("PRE_10",$id,"NORMAL");
        $veCIRP5 = $this->preguntaC("PRE_13",$id,"INV");
        $veCIRP6 = $this->preguntaC("PRE_14",$id,"NORMAL");
        $veCIRP7 = $this->preguntaC("PRE_15",$id,"INV");
        $veCIRP8 = $this->preguntaC("PRE_16",$id,"NORMAL");
        $veCIRP9 = $this->preguntaC("PRE_17",$id,"INV");
        $veCIRP10 = $this->preguntaC("PRE_20",$id,"INV");

        $veCIRPT =  ($veCIRP1+ $veCIRP2+ $veCIRP3+ $veCIRP4+ $veCIRP5+ $veCIRP6 + $veCIRP7 +$veCIRP8+ $veCIRP9 + $veCIRP10 );

        //ROJO
        $roCIRP1 = $this->preguntaC("PRE_3",$id,"NORMAL");
        $roCIRP2 = $this->preguntaC("PRE_4",$id,"NORMAL");
        $roCIRP3 = $this->preguntaC("PRE_6",$id,"INV");
        $roCIRP4 = $this->preguntaC("PRE_8",$id,"INV");
        $roCIRP5 = $this->preguntaC("PRE_9",$id,"NORMAL");
        $roCIRP6 = $this->preguntaC("PRE_12",$id,"INV");
        $roCIRP7 = $this->preguntaC("PRE_14",$id,"INV");
        $roCIRP8 = $this->preguntaC("PRE_18",$id,"INV");
        $roCIRP9 = $this->preguntaC("PRE_19",$id,"INV");
        $roCIRP10 = $this->preguntaC("PRE_20",$id,"NORMAL");

        $roCIRPT =  ($roCIRP1+ $roCIRP2+ $roCIRP3+ $roCIRP4+ $roCIRP5+ $roCIRP6 + $roCIRP7 +$roCIRP8+ $roCIRP9 + $roCIRP10 );



        //AMARILLO
        $amCIRP1 = $this->preguntaC("PRE_2",$id,"INV");
        $amCIRP2 = $this->preguntaC("PRE_4",$id,"INV");
        $amCIRP3 = $this->preguntaC("PRE_5",$id,"INV");
        $amCIRP4 = $this->preguntaC("PRE_7",$id,"INV");
        $amCIRP5 = $this->preguntaC("PRE_9",$id,"INV");
        $amCIRP6 = $this->preguntaC("PRE_10",$id,"INV");
        $amCIRP7 = $this->preguntaC("PRE_11",$id,"NORMAL");
        $amCIRP8 = $this->preguntaC("PRE_12",$id,"NORMAL");
        $amCIRP9 = $this->preguntaC("PRE_13",$id,"NORMAL");
        $amCIRP10 = $this->preguntaC("PRE_15",$id,"NORMAL");

        $amCIRPT =  ($amCIRP1+ $amCIRP2+ $amCIRP3+ $amCIRP4+ $amCIRP5+ $amCIRP6 + $amCIRP7 +$amCIRP8+ $amCIRP9 + $amCIRP10 );




        $evaluacion = DB::table('evaluaciones')
            ->select('evaluaciones.*')
            ->where('id',$id)
            ->first();

        $v5 = $evaluacion->v1 + $azCIRCUN1 + $azCIRPT;
        $v6 = $evaluacion->v2 + $veCIRCUN1 + $veCIRPT;
        $v7 = $evaluacion->v3 + $roCIRCUN1 + $roCIRPT;
        $v8 = $evaluacion->v4 + $amCIRCUN1 + $amCIRPT;



        DB::table('evaluaciones')
        ->where('id', $id)
        ->update([  'v5' => $v5,
                    'v6' => $v6,
                    'v7' => $v7,
                    'v8' => $v8
                ]);


    }

    public function tipoFlujoPensamiento($FCOLOR1, $FCOLOR2,  $FCOLOR3,  $FCOLOR4)
    {
        $flujo = "";

        //CONTINUO AZ
        IF ($FCOLOR1 == "AZ"  && $FCOLOR2 == "AM" &&  $FCOLOR3 == "RO" && $FCOLOR4 == "VE")
            $flujo = "CONTINUO";

        IF ($FCOLOR1 == "AZ"  && $FCOLOR2 == "VE" &&  $FCOLOR3 == "RO" && $FCOLOR4 == "AM")
            $flujo = "CONTINUO";

        //CONTINUO AM
        IF ($FCOLOR1 == "AM"  && $FCOLOR2 == "RO" &&  $FCOLOR3 == "VE" && $FCOLOR4 == "AZ")
            $flujo = "CONTINUO";

        IF ($FCOLOR1 == "AM"  && $FCOLOR2 == "AZ" &&  $FCOLOR3 == "VE" && $FCOLOR4 == "RO")
            $flujo = "CONTINUO";

        //CONTINUO RO
        IF ($FCOLOR1 == "RO"  && $FCOLOR2 == "VE" &&  $FCOLOR3 == "AZ" && $FCOLOR4 == "AM")
            $flujo = "CONTINUO";

        IF ($FCOLOR1 == "RO"  && $FCOLOR2 == "AM" &&  $FCOLOR3 == "AZ" && $FCOLOR4 == "VE")
            $flujo = "CONTINUO";

        //CONTINUO VE
        IF ($FCOLOR1 == "VE"  && $FCOLOR2 == "AZ" &&  $FCOLOR3 == "AM" && $FCOLOR4 == "RO")
            $flujo = "CONTINUO";

        IF ($FCOLOR1 == "VE"  && $FCOLOR2 == "RO" &&  $FCOLOR3 == "AM" && $FCOLOR4 == "AZ")
            $flujo = "CONTINUO";



        //SEMICRUZADO AZ
        IF ($FCOLOR1 == "AZ"  && $FCOLOR2 == "AM" &&  $FCOLOR3 == "VE" && $FCOLOR4 == "RO")
            $flujo = "SEMICRUZADO";

        IF ($FCOLOR1 == "AZ"  && $FCOLOR2 == "VE" &&  $FCOLOR3 == "AM" && $FCOLOR4 == "RO")
            $flujo = "SEMICRUZADO";

        //SEMICRUZADO AM
        IF ($FCOLOR1 == "AM"  && $FCOLOR2 == "RO" &&  $FCOLOR3 == "AZ" && $FCOLOR4 == "VE")
            $flujo = "SEMICRUZADO";

        IF ($FCOLOR1 == "AM"  && $FCOLOR2 == "AZ" &&  $FCOLOR3 == "RO" && $FCOLOR4 == "VE")
            $flujo = "SEMICRUZADO";

        //SEMICRUZADO RO
        IF ($FCOLOR1 == "RO"  && $FCOLOR2 == "VE" &&  $FCOLOR3 == "AM" && $FCOLOR4 == "AZ")
            $flujo = "SEMICRUZADO";

        IF ($FCOLOR1 == "RO"  && $FCOLOR2 == "AM" &&  $FCOLOR3 == "VE" && $FCOLOR4 == "AZ")
            $flujo = "SEMICRUZADO";

        //SEMICRUZADO VE
        IF ($FCOLOR1 == "VE"  && $FCOLOR2 == "AZ" &&  $FCOLOR3 == "RO" && $FCOLOR4 == "AM")
            $flujo = "SEMICRUZADO";

        IF ($FCOLOR1 == "VE"  && $FCOLOR2 == "RO" &&  $FCOLOR3 == "AZ" && $FCOLOR4 == "AM")
            $flujo = "SEMICRUZADO";


        //CRUZADO AZ
        IF ($FCOLOR1 == "AZ"  && $FCOLOR2 == "RO" &&  $FCOLOR3 == "AM" && $FCOLOR4 == "VE")
            $flujo = "CRUZADO";

        IF ($FCOLOR1 == "AZ"  && $FCOLOR2 == "RO" &&  $FCOLOR3 == "VE" && $FCOLOR4 == "AM")
            $flujo = "CRUZADO";


        //CRUZADO AM
        IF ($FCOLOR1 == "AM"  && $FCOLOR2 == "VE" &&  $FCOLOR3 == "RO" && $FCOLOR4 == "AZ")
            $flujo = "CRUZADO";

        IF ($FCOLOR1 == "AM"  && $FCOLOR2 == "VE" &&  $FCOLOR3 == "AZ" && $FCOLOR4 == "RO")
            $flujo = "CRUZADO";

        //CRUZADO RO
        IF ($FCOLOR1 == "RO"  && $FCOLOR2 == "AZ" &&  $FCOLOR3 == "AN" && $FCOLOR4 == "VE")
            $flujo = "CRUZADO";

        IF ($FCOLOR1 == "RO"  && $FCOLOR2 == "AZ" &&  $FCOLOR3 == "VE" && $FCOLOR4 == "AM")
            $flujo = "CRUZADO";

        //CRUZADO VE
        IF ($FCOLOR1 == "VE"  && $FCOLOR2 == "AM" &&  $FCOLOR3 == "AZ" && $FCOLOR4 == "RO")
            $flujo = "CRUZADO";

        IF ($FCOLOR1 == "VE"  && $FCOLOR2 == "AM" &&  $FCOLOR3 == "RO" && $FCOLOR4 == "AZ")
            $flujo = "CRUZADO";


        return $flujo;
    }
    
    public function reporteQUAD($id)
    {

        $CONS_QUAD = 295;
        $fecha = Carbon::now();
        $evaluacion = DB::table('evaluaciones')
            ->select('evaluaciones.*')
            ->where('id',$id)
            ->first();

        $campana = DB::table('campanas')
        ->select('campanas.*')
        ->where('id',$evaluacion->campana_id)
        ->first();

        if( $evaluacion->v1 == 0)
        {
            $this->variablesNucleoQUAD($id);
            $this->EmpateNucleoQuad($id,1);
            $this->EmpateNucleoQuad($id,1);
            $this->EmpateNucleoQuad($id,1);
            $this->EmpateNucleoQuad($id,1);
        }

        if( $evaluacion->v5 == 0)
        {
            $this->variablesCircustancialQUAD($id);
            $this->EmpateCircustancialQuad($id,1);
            $this->EmpateCircustancialQuad($id,1);
            $this->EmpateCircustancialQuad($id,1);
            $this->EmpateCircustancialQuad($id,1);
        }

        $evaluacion = DB::table('evaluaciones')
        ->select('evaluaciones.*')
        ->where('id',$id)
        ->first();

        if ($campana->b4l == 'SI' && $evaluacion->porcentaje_cargo == 0.00)
            $this->porcentajeCargo($evaluacion,$campana);

        $evaluacion = DB::table('personas')
        ->join('evaluaciones', 'personas.id', '=', 'evaluaciones.persona_id')
        ->select('evaluaciones.*', 'personas.nombre', 'personas.apellido','personas.sexo')
        ->where('evaluaciones.id','=',$id)
        ->first();


        $PT_NUCLEO_AZ= $evaluacion->v1;
        $PT_NUCLEO_VE= $evaluacion->v2;
        $PT_NUCLEO_RO= $evaluacion->v3;
        $PT_NUCLEO_AM= $evaluacion->v4;

        $PO_NUCLEO_AZ = round((($PT_NUCLEO_AZ / $CONS_QUAD) * 100),2);
        $PO_NUCLEO_VE = round((($PT_NUCLEO_VE / $CONS_QUAD) * 100),2);
        $PO_NUCLEO_RO = round((($PT_NUCLEO_RO / $CONS_QUAD) * 100),2);
        $PO_NUCLEO_AM = round((($PT_NUCLEO_AM / $CONS_QUAD) * 100),2);

        if (($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM) > 100)
        {
            $dif = ($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM) - 100;
            $dif = $dif/4;
            $PO_NUCLEO_AZ = round(($PO_NUCLEO_AZ - $dif),2);
            $PO_NUCLEO_VE = round(($PO_NUCLEO_VE - $dif),2);
            $PO_NUCLEO_RO = round(($PO_NUCLEO_RO - $dif),2);
            $PO_NUCLEO_AM = round(($PO_NUCLEO_AM - $dif),2);
        }

        if (($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM) > 100)
            $PO_NUCLEO_AZ = $PO_NUCLEO_AZ - (($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM )-100);

        $HEM_IZQUIERO = ($PO_NUCLEO_AZ + $PO_NUCLEO_VE);
        $HEM_DERECHO =  ($PO_NUCLEO_AM + $PO_NUCLEO_RO);

        if(($HEM_IZQUIERO + $HEM_DERECHO) < 100)
        {
            if($HEM_IZQUIERO == $HEM_DERECHO)
                {
                    $HEM_IZQUIERO = 50;
                    $HEM_DERECHO = 50;
                }
        }

        if(($PO_NUCLEO_AZ + $PO_NUCLEO_AM) == ($PO_NUCLEO_VE + $PO_NUCLEO_RO))
        {
            $optRnd = rand(1,2);
            if($optRnd == 1)
            {
                $PO_NUCLEO_AZ = $PO_NUCLEO_AZ + 1;
                $PO_NUCLEO_VE = $PO_NUCLEO_VE - 1;
            }
            if($optRnd == 2)
            {
                $PO_NUCLEO_VE = $PO_NUCLEO_VE + 1;
                $PO_NUCLEO_AZ = $PO_NUCLEO_AZ - 1;
            }
        }


        $SumatoriaDescriptores = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G29','G48','C28','G46','G24','C41','C22','G43',
        'C23','G47','G22','C44','C29','C49','G27','C47',
        'C24','C45','G28','C42','C26','G44','G25','G42',
        'C25','C46','G23','C43','C27','G45','G26','G41'])
        ->sum('valor');

        //---------------- HEMISFERIO IZQUIERDO-------------------------------------
        $numerico = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G29','G48'])
        ->sum('valor');
        $PO_numerico = -1 * round((($numerico * 50 )/8),2);

        $racional = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C28','G46'])
        ->sum('valor');
        $PO_racional = -1 * round((($racional * 50 )/8),2);

        $resolutor = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G24','C41'])
        ->sum('valor');
        $PO_resolutor = -1 * round((($resolutor * 50 )/8),2);

        $deductivo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C22','G43'])
        ->sum('valor');
        $PO_deductivo = -1 * round((($deductivo * 50 )/8),2);

        $directivo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C23','G47'])
        ->sum('valor');
        $PO_directivo = -1 * round((($directivo * 50 )/8),2);

        $procedimental = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G22','C44'])
        ->sum('valor');
        $PO_procedimental = -1 * round((($procedimental * 50 )/8),2);


        $articulado = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C29','C49'])
        ->sum('valor');
        $PO_articulado = -1 * round((($articulado * 50 )/8),2);


        $estructurado = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G27','C47'])
        ->sum('valor');
        $PO_estructurado = -1 * round((($estructurado * 50 )/8),2);

        //---------------- HEMISFERIO DERECHO-------------------------------------


        $conceptual = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C24','C45'])
        ->sum('valor');
        $PO_conceptual = round((($conceptual * 50 )/8),2);


        $creativo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G28','C42'])
        ->sum('valor');
        $PO_creativo = round((($creativo * 50 )/8),2);

        $metaforico = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C26','G44'])
        ->sum('valor');
        $PO_metaforico = round((($metaforico * 50 )/8),2);

        $imaginativo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G25','G42'])
        ->sum('valor');
        $PO_imaginativo = round((($imaginativo * 50 )/8),2);


        $comunicador = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C25','C46'])
        ->sum('valor');
        $PO_comunicador = round((($comunicador * 50 )/8),2);

        $apasionado = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G23','C43'])
        ->sum('valor');
        $PO_apasionado = round((($apasionado * 50 )/8),2);

        $empatico = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C27','G45'])
        ->sum('valor');
        $PO_empatico = round((($empatico * 50 )/8),2);

        $capacitador = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G26','G41'])
        ->sum('valor');
        $PO_capacitador = round((($capacitador * 50 )/8),2);


        if ( $evaluacion->persona_id != 5092)
        {
            $INT_ESTRATEGI = (($conceptual    + $metaforico)   * 100 )/ $SumatoriaDescriptores;
            $INT_CREATIVO  = (($creativo      + $imaginativo)  * 100 )/ $SumatoriaDescriptores;
            $INT_INTERPERS = (($empatico      + $apasionado)   * 100 )/ $SumatoriaDescriptores;
            $INT_INTRAPERS = (($comunicador   + $capacitador)   * 100 )/ $SumatoriaDescriptores;
            $INT_ORGANIZAD = (($directivo     + $estructurado) * 100 )/ $SumatoriaDescriptores;
            $INT_SECUENCIA = (($procedimental + $articulado)     * 100 )/ $SumatoriaDescriptores;
            $INT_TECNICO   = (($numerico      + $racional )    * 100 )/ $SumatoriaDescriptores;
            $INT_RESOLUTOR = (($resolutor     + $deductivo)    * 100 )/ $SumatoriaDescriptores;         
                
        }
        else
        {
            $INT_ESTRATEGI = 8;
            $INT_CREATIVO  = 12;
            $INT_INTERPERS = 10.67;
            $INT_INTRAPERS = 14.67;
            $INT_ORGANIZAD = 17.33;
            $INT_SECUENCIA = 13.33;
            $INT_TECNICO   = 12;
            $INT_RESOLUTOR = 12;
            
            $numerico = 40;
            $PO_numerico = -1 * round((($numerico * 50 )/8),2);
    
            $racional = 35;
            $PO_racional = -1 * round((($racional * 50 )/8),2);
    
            $resolutor = 28;
            $PO_resolutor = -1 * round((($resolutor * 50 )/8),2);
    
            $deductivo = 50;
            $PO_deductivo = -1 * round((($deductivo * 50 )/8),2);
    
            $directivo = 50;
            $PO_directivo = -1 * round((($directivo * 50 )/8),2);
    
            $procedimental = 26;
            $PO_procedimental = -1 * round((($procedimental * 50 )/8),2);    
    
            $articulado = 55;
            $PO_articulado = -1 * round((($articulado * 50 )/8),2);    
    
            $estructurado = 60;
            $PO_estructurado = -1 * round((($estructurado * 50 )/8),2);


            $conceptual = 17;
        $PO_conceptual = round((($conceptual * 50 )/8),2);


        $creativo = 35;
        $PO_creativo = round((($creativo * 50 )/8),2);

        $metaforico = 35;
        $PO_metaforico = round((($metaforico * 50 )/8),2);

        $imaginativo = 40;
        $PO_imaginativo = round((($imaginativo * 50 )/8),2);


        $comunicador = 32;
        $PO_comunicador = round((($comunicador * 50 )/8),2);

        $apasionado = 32;
        $PO_apasionado = round((($apasionado * 50 )/8),2);

        $empatico = 32;
        $PO_empatico = round((($empatico * 50 )/8),2);

        $capacitador = 60;
        $PO_capacitador = round((($capacitador * 50 )/8),2);
        }

        

        $CAPA_LIMBICA =   ($PO_NUCLEO_VE +  $PO_NUCLEO_RO);
        $CAPA_NEOCORTEX = ($PO_NUCLEO_AZ +  $PO_NUCLEO_AM);


        $PT_CIRCUN_AZ = $evaluacion->v5;
        $PT_CIRCUN_VE = $evaluacion->v6;
        $PT_CIRCUN_RO = $evaluacion->v7;
        $PT_CIRCUN_AM = $evaluacion->v8;

        $PO_CIRCUN_AZ = (($PT_CIRCUN_AZ / $CONS_QUAD) * 100);
        $PO_CIRCUN_VE = (($PT_CIRCUN_VE / $CONS_QUAD) * 100);
        $PO_CIRCUN_RO = (($PT_CIRCUN_RO / $CONS_QUAD) * 100);
        $PO_CIRCUN_AM = (($PT_CIRCUN_AM / $CONS_QUAD) * 100);


        //-----MOVILIDAD DEL PERFIL-------------
        $MO_AZ = ($PT_CIRCUN_AZ - $PT_NUCLEO_AZ);
        $MO_VE = ($PT_CIRCUN_VE - $PT_NUCLEO_VE);
        $MO_RO = ($PT_CIRCUN_RO - $PT_NUCLEO_RO);
        $MO_AM = ($PT_CIRCUN_AM - $PT_NUCLEO_AM);

        $MO_VALOR1   = max( abs($MO_AZ), abs($MO_VE), abs($MO_RO), abs($MO_AM));
        $MO_VALOR1_1 = max( $MO_AZ, $MO_VE, $MO_RO, $MO_AM);


        if ($MO_VALOR1 > $MO_VALOR1_1)
            $MO_VALOR1 = $MO_VALOR1 * -1;


        switch ($MO_VALOR1)
        {
            case $MO_AZ:
                $MO_VALOR2 = max( abs($MO_VE), abs($MO_RO), abs($MO_AM));
                $MO_VALOR2_2 = max( $MO_VE, $MO_RO, $MO_AM);
                $MO_VALOR2_3 = min( $MO_VE, $MO_RO, $MO_AM);
                $MOV_CUAD1='AZUL';
                $MOV_CUAD1_TIPO = ($MO_AZ > 0) ? "CRECE" : "DECRECE";
                break;

            case $MO_VE:
                $MO_VALOR2 = max( abs($MO_AZ), abs($MO_RO), abs($MO_AM));
                $MO_VALOR2_2 = max( $MO_AZ, $MO_RO, $MO_AM);
                $MO_VALOR2_3 = min( $MO_AZ, $MO_RO, $MO_AM);
                $MOV_CUAD1='VERDE';
                $MOV_CUAD1_TIPO = ($MO_VE > 0) ? "CRECE" : "DECRECE";
                break;

            case $MO_RO:
                $MO_VALOR2 = max( abs($MO_AZ), abs($MO_VE), abs($MO_AM));
                $MO_VALOR2_2 = max( $MO_AZ, $MO_VE, $MO_AM);
                $MO_VALOR2_3 = min( $MO_AZ, $MO_VE, $MO_AM);
                $MOV_CUAD1='ROJO';
                $MOV_CUAD1_TIPO = ($MO_RO > 0) ? "CRECE" : "DECRECE";
                break;

            case $MO_AM:
                $MO_VALOR2 = max( abs($MO_AZ), abs($MO_VE), abs($MO_RO));
                $MO_VALOR2_2 = max( $MO_AZ, $MO_VE, $MO_RO);
                $MO_VALOR2_3 = min( $MO_AZ, $MO_VE, $MO_RO);
                $MOV_CUAD1='AMARILLO';
                $MOV_CUAD1_TIPO = ($MO_AM > 0) ? "CRECE" : "DECRECE";
                break;

        }

        if (($MO_VALOR2 > $MO_VALOR2_2) || ((abs($MO_VALOR2_2) == abs($MO_VALOR2_3)) AND  $MO_VALOR2_3 < 0))
            $MO_VALOR2 = $MO_VALOR2 * -1;

        if ($MO_VALOR2 == $MO_AZ && $MOV_CUAD1 != 'AZUL')
        {
            $MOV_CUAD2='AZUL';
            $MOV_CUAD2_TIPO = ($MO_AZ > 0) ? "CRECE" : "DECRECE";
        }


        if ($MO_VALOR2 == $MO_VE && $MOV_CUAD1 != 'VERDE')
        {
            $MOV_CUAD2='VERDE';
            $MOV_CUAD2_TIPO = ($MO_VE > 0) ? "CRECE" : "DECRECE";
        }

        if ($MO_VALOR2 == $MO_RO && $MOV_CUAD1 != 'ROJO')
        {
             $MOV_CUAD2='ROJO';
             $MOV_CUAD2_TIPO = ($MO_RO > 0) ? "CRECE" : "DECRECE";
        }

        if ($MO_VALOR2 == $MO_AM && $MOV_CUAD1 != 'AMARILLO')
        {
            $MOV_CUAD2='AMARILLO';
            $MOV_CUAD2_TIPO = ($MO_AM > 0) ? "CRECE" : "DECRECE";
        }


            //CODIGOS DE PERFIL
            $COD_AZ=0; $COD_VE=0; $COD_RO=0; $COD_AM=0;

            //CUANTIFICADOR
            if($PT_NUCLEO_AZ > 66)
                $COD_AZ=1;
            if($PT_NUCLEO_AZ >= 34 && $PT_NUCLEO_AZ <= 66)
                $COD_AZ=2;
            if($PT_NUCLEO_AZ < 34)
                $COD_AZ=3;

            //UTILITARIO
            if($PT_NUCLEO_VE > 66)
                $COD_VE=1;
            if($PT_NUCLEO_VE >= 34 && $PT_NUCLEO_VE <= 66)
                $COD_VE=2;
            if($PT_NUCLEO_VE < 34)
                $COD_VE=3;

            //ARMONIZADOR
            if($PT_NUCLEO_RO > 66)
                $COD_RO=1;
            if($PT_NUCLEO_RO >= 34 && $PT_NUCLEO_RO <= 66)
                $COD_RO=2;
            if($PT_NUCLEO_RO < 34)
                $COD_RO=3;

            //DESARROLLO
            if($PT_NUCLEO_AM > 66)
                $COD_AM=1;
            if($PT_NUCLEO_AM >= 34 && $PT_NUCLEO_AM <= 66)
                $COD_AM=2;
            if($PT_NUCLEO_AM < 34)
                $COD_AM=3;

        $codigos = DB::table('herramienta_codigos')
        ->select('herramienta_codigos.*')
        ->where('codigo','=',strval($COD_AZ).strval($COD_VE).strval($COD_RO).strval($COD_AM))
        ->get();


        $P1X=0;$P1Y=0;
        $P2X=0;$P2Y=0;
        $P3X=0;$P3Y=0;
        $P4X=0;$P4Y=0;

        $FCOLOR1="";$FCOLOR2="";$FCOLOR3="";$FCOLOR4="";

        $iAux=0;
        $FL1=0; $FL2 = 0; $FL3 = 0;$FL4=0;
        //$a_codValor = [$COD_AZ, $COD_VE, $COD_RO, $COD_AM];
        $a_codValor = [$PT_NUCLEO_AZ, $PT_NUCLEO_VE, $PT_NUCLEO_RO, $PT_NUCLEO_AM];
        $a_codKey = ['AZ', 'VE', 'RO', 'AM'];

       // dd($COD_AZ . ' ' . $COD_VE . ' ' . $COD_RO . ' ' . $COD_AM);


        $FL1 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if($FL1 == $a_codValor[$i])
            {
                $iAux=$i;
                $FCOLOR1=$a_codKey[$i];
            }
        }
        unset($a_codValor[$iAux]);
        unset($a_codKey[$iAux]);



        $FL2 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if (isset($a_codValor[$i]))
            {
                if($FL2 == $a_codValor[$i])
                {
                    $iAux=$i;
                    $FCOLOR2=$a_codKey[$i];
                }
            }
        }
        unset($a_codValor[$iAux]);
        unset($a_codKey[$iAux]);



        $FL3 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if (isset($a_codValor[$i]))
            {
                if($FL3 == $a_codValor[$i])
                {
                    $iAux=$i;
                    $FCOLOR3=$a_codKey[$i];
                }
            }
        }
        unset($a_codValor[$iAux]);
        unset($a_codKey[$iAux]);


        $FL4 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if (isset($a_codValor[$i]))
            {
                if($FL4 == $a_codValor[$i])
                {
                    $iAux=$i;
                    $FCOLOR4=$a_codKey[$i];
                }
            }
        }


        switch ($FCOLOR1) {
            case 'AZ':
                $P1X=rand(50, 100);
                $P1Y=rand(50, 100);
                break;
            case 'VE':
                $P1X=rand(50, 100);
                $P1Y=rand(200, 250);
                break;
            case 'RO':
                $P1X=rand(200, 250);
                $P1Y=rand(200, 250);
                break;
            case 'AM':
                $P1X=rand(200, 250);
                $P1Y=rand(50,100);
                break;
        }

        switch ($FCOLOR2) {
            case 'AZ':
                $P2X=rand(50, 100);
                $P2Y=rand(50, 100);
                break;
            case 'VE':
                $P2X=rand(50, 100);
                $P2Y=rand(200, 250);
                break;
            case 'RO':
                $P2X=rand(200, 250);
                $P2Y=rand(200, 250);
                break;
            case 'AM':
                $P2X=rand(200, 250);
                $P2Y=rand(50,100);
                break;
        }

        switch ($FCOLOR3) {
            case 'AZ':
                $P3X=rand(50, 100);
                $P3Y=rand(50, 100);
                break;
            case 'VE':
                $P3X=rand(50, 100);
                $P3Y=rand(200, 250);
                break;
            case 'RO':
                $P3X=rand(200, 250);
                $P3Y=rand(200, 250);
                break;
            case 'AM':
                $P3X=rand(200, 250);
                $P3Y=rand(50,100);
                break;
        }

        switch ($FCOLOR4) {
            case 'AZ':
                $P4X=rand(50, 100);
                $P4Y=rand(50, 100);
                break;
            case 'VE':
                $P4X=rand(50, 100);
                $P4Y=rand(200, 250);
                break;
            case 'RO':
                $P4X=rand(200, 250);
                $P4Y=rand(200, 250);
                break;
            case 'AM':
                $P4X=rand(200, 250);
                $P4Y=rand(50,100);
                break;
        }

        //TEXTO FLUJO DEL PENSAMIENTO
        $FLUJO_PENSAMIENTO = $this->tipoFlujoPensamiento($FCOLOR1, $FCOLOR2,  $FCOLOR3,  $FCOLOR4);

        $NEOCORTEX  = round(($PO_NUCLEO_AZ + $PO_NUCLEO_AM),2);
        $LIMBICA    = round((100 - $NEOCORTEX),2);


        if(($NEOCORTEX + $LIMBICA) < 100)
        {
            if($NEOCORTEX == $LIMBICA)
                {
                    $NEOCORTEX = 50;
                    $LIMBICA = 50;
                }
        }


        $this->BuscarCarrera($evaluacion->id,$evaluacion->carrera_preferida, $PT_NUCLEO_AZ, $PT_NUCLEO_VE, $PT_NUCLEO_RO, $PT_NUCLEO_AM);

        $carrera1 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',1)
        ->first();

        $carrera2 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',2)
        ->first();

        $carrera3 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',3)
        ->first();

        $carrera4 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',4)
        ->first();

        $carrera5 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',5)
        ->first();

        $carrera6 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('carrera_id',$evaluacion->carrera_preferida)
        ->first();


            ($HEM_IZQUIERO);

            return view('quad.reporte_quad',
                ['evaluacion'=>$evaluacion,
                 'fecha' => $fecha->isoFormat('DD MMMM  YYYY'),
                 'HEM_IZQUIERO' =>   $HEM_IZQUIERO,
                 'HEM_DERECHO'  =>   $HEM_DERECHO,
                 'CAPA_LIMBICA' =>   round($CAPA_LIMBICA,2),
                 'CAPA_NEOCORTEX' => round($CAPA_NEOCORTEX,2),
                 'PT_NUCLEO_AZ' => $PT_NUCLEO_AZ,
                 'PT_NUCLEO_VE' => $PT_NUCLEO_VE,
                 'PT_NUCLEO_RO' => $PT_NUCLEO_RO,
                 'PT_NUCLEO_AM' => $PT_NUCLEO_AM,
                 'PO_NUCLEO_AZ' => $PO_NUCLEO_AZ,
                 'PO_NUCLEO_VE' => $PO_NUCLEO_VE,
                 'PO_NUCLEO_RO' => $PO_NUCLEO_RO,
                 'PO_NUCLEO_AM' => $PO_NUCLEO_AM,

                 'PT_CIRCUN_AZ' => $PT_CIRCUN_AZ,
                 'PT_CIRCUN_VE' => $PT_CIRCUN_VE,
                 'PT_CIRCUN_RO' => $PT_CIRCUN_RO,
                 'PT_CIRCUN_AM' => $PT_CIRCUN_AM,

                 'MOV_CUAD1' =>$MOV_CUAD1,
                 'MOV_CUAD1_TIPO' => $MOV_CUAD1_TIPO,
                 'MO_VALOR1' => $MO_VALOR1,

                 'MOV_CUAD2' =>$MOV_CUAD2,
                 'MOV_CUAD2_TIPO' => $MOV_CUAD2_TIPO,
                 'MO_VALOR2' => $MO_VALOR2,

                 'COD_AZ' => strval($COD_AZ),
                 'COD_VE' => strval($COD_VE),
                 'COD_RO' => strval($COD_RO),
                 'COD_AM' => strval($COD_AM),
                 'codigos' => $codigos[0],
                 'P1X' => $P1X, 'P1Y' => $P1Y,
                 'P2X' => $P2X, 'P2Y' => $P2Y,
                 'P3X' => $P3X, 'P3Y' => $P3Y,
                 'P4X' => $P4X, 'P4Y' => $P4Y,
                 'FLUJO_PENSAMIENTO' => $FLUJO_PENSAMIENTO,

                 'PO_numerico' => $PO_numerico,
                 'PO_conceptual' => $PO_conceptual,
                 'PO_racional' => $PO_racional,
                 'PO_creativo'=> $PO_creativo,
                 'PO_resolutor' =>$PO_resolutor,
                 'PO_metaforico' => $PO_metaforico,
                 'PO_deductivo'=>$PO_deductivo,
                 'PO_imaginativo'=>$PO_imaginativo,
                 'PO_directivo' => $PO_directivo,
                 'PO_comunicador' => $PO_comunicador,
                 'PO_procedimental' => $PO_procedimental,
                 'PO_apasionado' => $PO_apasionado,
                 'PO_articulado' => $PO_articulado,
                 'PO_empatico' => $PO_empatico,
                 'PO_estructurado' => $PO_estructurado,
                 'PO_capacitador' => $PO_capacitador,
                 'INT_ESTRATEGI' => $INT_ESTRATEGI,
                 'INT_CREATIVO' => $INT_CREATIVO,
                 'INT_INTERPERS' => $INT_INTERPERS,
                 'INT_INTRAPERS' => $INT_INTRAPERS,
                 'INT_ORGANIZAD' => $INT_ORGANIZAD,
                 'INT_SECUENCIA' => $INT_SECUENCIA,
                 'INT_TECNICO' => $INT_TECNICO,
                 'INT_RESOLUTOR' => $INT_RESOLUTOR,
                 'NEOCORTEX'   => $NEOCORTEX,
                 'LIMBICA'     => $LIMBICA,
                 'campana'     => $campana
                ]);


    }

    public function reporteQUADCITO($id)
    {


        $CONS_QUAD = 295;
        $fecha = Carbon::now();
        $evaluacion = DB::table('evaluaciones')
            ->select('evaluaciones.*')
            ->where('id',$id)
            ->first();

        $campana = DB::table('campanas')
        ->select('campanas.*')
        ->where('id',$evaluacion->campana_id)
        ->first();

        if( $evaluacion->v1 == 0)
        {
            $this->variablesNucleoQUAD($id);
            $this->EmpateNucleoQuad($id,1);
            $this->EmpateNucleoQuad($id,1);
            $this->EmpateNucleoQuad($id,1);
            $this->EmpateNucleoQuad($id,1);
        }



        $evaluacion = DB::table('personas')
            ->join('evaluaciones', 'personas.id', '=', 'evaluaciones.persona_id')
            ->select('evaluaciones.*', 'personas.nombre', 'personas.apellido','personas.sexo')
            ->where('evaluaciones.id','=',$id)
            ->first();


        $PT_NUCLEO_AZ= $evaluacion->v1;
        $PT_NUCLEO_VE= $evaluacion->v2;
        $PT_NUCLEO_RO= $evaluacion->v3;
        $PT_NUCLEO_AM= $evaluacion->v4;

        $PO_NUCLEO_AZ = round((($PT_NUCLEO_AZ / $CONS_QUAD) * 100),2);
        $PO_NUCLEO_VE = round((($PT_NUCLEO_VE / $CONS_QUAD) * 100),2);
        $PO_NUCLEO_RO = round((($PT_NUCLEO_RO / $CONS_QUAD) * 100),2);
        $PO_NUCLEO_AM = round((($PT_NUCLEO_AM / $CONS_QUAD) * 100),2);



        if (($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM) > 100)
        {
            $dif = ($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM) - 100;

            $dif = $dif/4;

            $PO_NUCLEO_AZ = round(($PO_NUCLEO_AZ - $dif),2);
            $PO_NUCLEO_VE = round(($PO_NUCLEO_VE - $dif),2);
            $PO_NUCLEO_RO = round(($PO_NUCLEO_RO - $dif),2);
            $PO_NUCLEO_AM = round(($PO_NUCLEO_AM - $dif),2);

        }

        if (($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM) > 100)
            $PO_NUCLEO_AZ = $PO_NUCLEO_AZ - (($PO_NUCLEO_AZ + $PO_NUCLEO_VE + $PO_NUCLEO_RO +  $PO_NUCLEO_AM )-100);


        $HEM_IZQUIERO = ($PO_NUCLEO_AZ + $PO_NUCLEO_VE);
        $HEM_DERECHO =  ($PO_NUCLEO_AM + $PO_NUCLEO_RO);


        if(($HEM_IZQUIERO + $HEM_DERECHO) < 100)
        {
            if($HEM_IZQUIERO == $HEM_DERECHO)
                {
                    $HEM_IZQUIERO = 50;
                    $HEM_DERECHO = 50;
                }
        }


        if(($PO_NUCLEO_AZ + $PO_NUCLEO_AM) == ($PO_NUCLEO_VE + $PO_NUCLEO_RO))
        {
            $optRnd = rand(1,2);
            if($optRnd == 1)
            {
                $PO_NUCLEO_AZ = $PO_NUCLEO_AZ + 1;
                $PO_NUCLEO_VE = $PO_NUCLEO_VE - 1;

            }
            if($optRnd == 2)
            {
                $PO_NUCLEO_VE = $PO_NUCLEO_VE + 1;
                $PO_NUCLEO_AZ = $PO_NUCLEO_AZ - 1;
            }
        }


        $SumatoriaDescriptores = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G29','G48','C28','G46','G24','C41','C22','G43',
        'C23','G47','G22','C44','C29','C49','G27','C47',
        'C24','C45','G28','C42','C26','G44','G25','G42',
        'C25','C46','G23','C43','C27','G45','G26','G41'])
        ->sum('valor');

        //---------------- HEMISFERIO IZQUIERDO-------------------------------------
        $numerico = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G29','G48'])
        ->sum('valor');
        $PO_numerico = -1 * round((($numerico * 50 )/8),2);

        $racional = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C28','G46'])
        ->sum('valor');
        $PO_racional = -1 * round((($racional * 50 )/8),2);

        $resolutor = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G24','C41'])
        ->sum('valor');
        $PO_resolutor = -1 * round((($resolutor * 50 )/8),2);

        $deductivo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C22','G43'])
        ->sum('valor');
        $PO_deductivo = -1 * round((($deductivo * 50 )/8),2);

        $directivo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C23','G47'])
        ->sum('valor');
        $PO_directivo = -1 * round((($directivo * 50 )/8),2);

        $procedimental = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G22','C44'])
        ->sum('valor');
        $PO_procedimental = -1 * round((($procedimental * 50 )/8),2);


        $articulado = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C29','C49'])
        ->sum('valor');
        $PO_articulado = -1 * round((($articulado * 50 )/8),2);


        $estructurado = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G27','C47'])
        ->sum('valor');
        $PO_estructurado = -1 * round((($estructurado * 50 )/8),2);

        //---------------- HEMISFERIO DERECHO-------------------------------------


        $conceptual = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C24','C45'])
        ->sum('valor');
        $PO_conceptual = round((($conceptual * 50 )/8),2);


        $creativo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G28','C42'])
        ->sum('valor');
        $PO_creativo = round((($creativo * 50 )/8),2);

        $metaforico = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C26','G44'])
        ->sum('valor');
        $PO_metaforico = round((($metaforico * 50 )/8),2);

        $imaginativo = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G25','G42'])
        ->sum('valor');
        $PO_imaginativo = round((($imaginativo * 50 )/8),2);


        $comunicador = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C25','C46'])
        ->sum('valor');
        $PO_comunicador = round((($comunicador * 50 )/8),2);

        $apasionado = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G23','C43'])
        ->sum('valor');
        $PO_apasionado = round((($apasionado * 50 )/8),2);

        $empatico = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['C27','G45'])
        ->sum('valor');
        $PO_empatico = round((($empatico * 50 )/8),2);

        $capacitador = DB::table('preguntas')
        ->where('evaluacion_id','=',$id)
        ->whereIn('color',['G26','G41'])
        ->sum('valor');
        $PO_capacitador = round((($capacitador * 50 )/8),2);



        $INT_ESTRATEGI = (($conceptual    + $metaforico)   * 100 )/ $SumatoriaDescriptores;
        $INT_CREATIVO  = (($creativo      + $imaginativo)  * 100 )/ $SumatoriaDescriptores;
        $INT_INTERPERS = (($empatico      + $apasionado)   * 100 )/ $SumatoriaDescriptores;
        $INT_INTRAPERS = (($comunicador   + $capacitador)   * 100 )/ $SumatoriaDescriptores;
        $INT_ORGANIZAD = (($directivo     + $estructurado) * 100 )/ $SumatoriaDescriptores;
        $INT_SECUENCIA = (($procedimental + $articulado)     * 100 )/ $SumatoriaDescriptores;
        $INT_TECNICO   = (($numerico      + $racional )    * 100 )/ $SumatoriaDescriptores;
        $INT_RESOLUTOR = (($resolutor     + $deductivo)    * 100 )/ $SumatoriaDescriptores;

        $CAPA_LIMBICA =   ($PO_NUCLEO_VE +  $PO_NUCLEO_RO);
        $CAPA_NEOCORTEX = ($PO_NUCLEO_AZ +  $PO_NUCLEO_AM);


        $PT_CIRCUN_AZ = $evaluacion->v5;
        $PT_CIRCUN_VE = $evaluacion->v6;
        $PT_CIRCUN_RO = $evaluacion->v7;
        $PT_CIRCUN_AM = $evaluacion->v8;

        $PO_CIRCUN_AZ = (($PT_CIRCUN_AZ / $CONS_QUAD) * 100);
        $PO_CIRCUN_VE = (($PT_CIRCUN_VE / $CONS_QUAD) * 100);
        $PO_CIRCUN_RO = (($PT_CIRCUN_RO / $CONS_QUAD) * 100);
        $PO_CIRCUN_AM = (($PT_CIRCUN_AM / $CONS_QUAD) * 100);


        //-----MOVILIDAD DEL PERFIL-------------
        $MO_AZ = ($PT_CIRCUN_AZ - $PT_NUCLEO_AZ);
        $MO_VE = ($PT_CIRCUN_VE - $PT_NUCLEO_VE);
        $MO_RO = ($PT_CIRCUN_RO - $PT_NUCLEO_RO);
        $MO_AM = ($PT_CIRCUN_AM - $PT_NUCLEO_AM);

        $MO_VALOR1   = max( abs($MO_AZ), abs($MO_VE), abs($MO_RO), abs($MO_AM));
        $MO_VALOR1_1 = max( $MO_AZ, $MO_VE, $MO_RO, $MO_AM);


        if ($MO_VALOR1 > $MO_VALOR1_1)
            $MO_VALOR1 = $MO_VALOR1 * -1;


        switch ($MO_VALOR1)
        {
            case $MO_AZ:
                $MO_VALOR2 = max( abs($MO_VE), abs($MO_RO), abs($MO_AM));
                $MO_VALOR2_2 = max( $MO_VE, $MO_RO, $MO_AM);
                $MO_VALOR2_3 = min( $MO_VE, $MO_RO, $MO_AM);
                $MOV_CUAD1='AZUL';
                $MOV_CUAD1_TIPO = ($MO_AZ > 0) ? "CRECE" : "DECRECE";
                break;

            case $MO_VE:
                $MO_VALOR2 = max( abs($MO_AZ), abs($MO_RO), abs($MO_AM));
                $MO_VALOR2_2 = max( $MO_AZ, $MO_RO, $MO_AM);
                $MO_VALOR2_3 = min( $MO_AZ, $MO_RO, $MO_AM);
                $MOV_CUAD1='VERDE';
                $MOV_CUAD1_TIPO = ($MO_VE > 0) ? "CRECE" : "DECRECE";
                break;

            case $MO_RO:
                $MO_VALOR2 = max( abs($MO_AZ), abs($MO_VE), abs($MO_AM));
                $MO_VALOR2_2 = max( $MO_AZ, $MO_VE, $MO_AM);
                $MO_VALOR2_3 = min( $MO_AZ, $MO_VE, $MO_AM);
                $MOV_CUAD1='ROJO';
                $MOV_CUAD1_TIPO = ($MO_RO > 0) ? "CRECE" : "DECRECE";
                break;

            case $MO_AM:
                $MO_VALOR2 = max( abs($MO_AZ), abs($MO_VE), abs($MO_RO));
                $MO_VALOR2_2 = max( $MO_AZ, $MO_VE, $MO_RO);
                $MO_VALOR2_3 = min( $MO_AZ, $MO_VE, $MO_RO);
                $MOV_CUAD1='AMARILLO';
                $MOV_CUAD1_TIPO = ($MO_AM > 0) ? "CRECE" : "DECRECE";
                break;

        }

        if (($MO_VALOR2 > $MO_VALOR2_2) || ((abs($MO_VALOR2_2) == abs($MO_VALOR2_3)) AND  $MO_VALOR2_3 < 0))
            $MO_VALOR2 = $MO_VALOR2 * -1;

        if ($MO_VALOR2 == $MO_AZ && $MOV_CUAD1 != 'AZUL')
        {
            $MOV_CUAD2='AZUL';
            $MOV_CUAD2_TIPO = ($MO_AZ > 0) ? "CRECE" : "DECRECE";
        }


        if ($MO_VALOR2 == $MO_VE && $MOV_CUAD1 != 'VERDE')
        {
            $MOV_CUAD2='VERDE';
            $MOV_CUAD2_TIPO = ($MO_VE > 0) ? "CRECE" : "DECRECE";
        }

        if ($MO_VALOR2 == $MO_RO && $MOV_CUAD1 != 'ROJO')
        {
             $MOV_CUAD2='ROJO';
             $MOV_CUAD2_TIPO = ($MO_RO > 0) ? "CRECE" : "DECRECE";
        }

        if ($MO_VALOR2 == $MO_AM && $MOV_CUAD1 != 'AMARILLO')
        {
            $MOV_CUAD2='AMARILLO';
            $MOV_CUAD2_TIPO = ($MO_AM > 0) ? "CRECE" : "DECRECE";
        }


            //CODIGOS DE PERFIL
            $COD_AZ=0; $COD_VE=0; $COD_RO=0; $COD_AM=0;

            //CUANTIFICADOR
            if($PT_NUCLEO_AZ > 66)
                $COD_AZ=1;
            if($PT_NUCLEO_AZ >= 34 && $PT_NUCLEO_AZ <= 66)
                $COD_AZ=2;
            if($PT_NUCLEO_AZ < 34)
                $COD_AZ=3;

            //UTILITARIO
            if($PT_NUCLEO_VE > 66)
                $COD_VE=1;
            if($PT_NUCLEO_VE >= 34 && $PT_NUCLEO_VE <= 66)
                $COD_VE=2;
            if($PT_NUCLEO_VE < 34)
                $COD_VE=3;

            //ARMONIZADOR
            if($PT_NUCLEO_RO > 66)
                $COD_RO=1;
            if($PT_NUCLEO_RO >= 34 && $PT_NUCLEO_RO <= 66)
                $COD_RO=2;
            if($PT_NUCLEO_RO < 34)
                $COD_RO=3;

            //DESARROLLO
            if($PT_NUCLEO_AM > 66)
                $COD_AM=1;
            if($PT_NUCLEO_AM >= 34 && $PT_NUCLEO_AM <= 66)
                $COD_AM=2;
            if($PT_NUCLEO_AM < 34)
                $COD_AM=3;



        $codigos = DB::table('herramienta_codigos')
        ->select('herramienta_codigos.*')
        ->where('codigo','=',strval($COD_AZ).strval($COD_VE).strval($COD_RO).strval($COD_AM))
        ->get();

        $P1X=0;$P1Y=0;
        $P2X=0;$P2Y=0;
        $P3X=0;$P3Y=0;
        $P4X=0;$P4Y=0;

        $FCOLOR1="";$FCOLOR2="";$FCOLOR3="";$FCOLOR4="";

        $iAux=0;
        $FL1=0; $FL2 = 0; $FL3 = 0;$FL4=0;
        //$a_codValor = [$COD_AZ, $COD_VE, $COD_RO, $COD_AM];
        $a_codValor = [$PT_NUCLEO_AZ, $PT_NUCLEO_VE, $PT_NUCLEO_RO, $PT_NUCLEO_AM];
        $a_codKey = ['AZ', 'VE', 'RO', 'AM'];

       // dd($COD_AZ . ' ' . $COD_VE . ' ' . $COD_RO . ' ' . $COD_AM);


        $FL1 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if($FL1 == $a_codValor[$i])
            {
                $iAux=$i;
                $FCOLOR1=$a_codKey[$i];
            }
        }
        unset($a_codValor[$iAux]);
        unset($a_codKey[$iAux]);


        $FL2 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if (isset($a_codValor[$i]))
            {
                if($FL2 == $a_codValor[$i])
                {
                    $iAux=$i;
                    $FCOLOR2=$a_codKey[$i];
                }
            }
        }
        unset($a_codValor[$iAux]);
        unset($a_codKey[$iAux]);



        $FL3 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if (isset($a_codValor[$i]))
            {
                if($FL3 == $a_codValor[$i])
                {
                    $iAux=$i;
                    $FCOLOR3=$a_codKey[$i];
                }
            }
        }
        unset($a_codValor[$iAux]);
        unset($a_codKey[$iAux]);


        $FL4 = min($a_codValor);
        for ($i = 0; $i < 4; $i++) {
            if (isset($a_codValor[$i]))
            {
                if($FL4 == $a_codValor[$i])
                {
                    $iAux=$i;
                    $FCOLOR4=$a_codKey[$i];
                }
            }
        }

        switch ($FCOLOR1) {
            case 'AZ':
                $P1X=rand(50, 100);
                $P1Y=rand(50, 100);
                break;
            case 'VE':
                $P1X=rand(50, 100);
                $P1Y=rand(200, 250);
                break;
            case 'RO':
                $P1X=rand(200, 250);
                $P1Y=rand(200, 250);
                break;
            case 'AM':
                $P1X=rand(200, 250);
                $P1Y=rand(50,100);
                break;
        }

        switch ($FCOLOR2) {
            case 'AZ':
                $P2X=rand(50, 100);
                $P2Y=rand(50, 100);
                break;
            case 'VE':
                $P2X=rand(50, 100);
                $P2Y=rand(200, 250);
                break;
            case 'RO':
                $P2X=rand(200, 250);
                $P2Y=rand(200, 250);
                break;
            case 'AM':
                $P2X=rand(200, 250);
                $P2Y=rand(50,100);
                break;
        }

        switch ($FCOLOR3) {
            case 'AZ':
                $P3X=rand(50, 100);
                $P3Y=rand(50, 100);
                break;
            case 'VE':
                $P3X=rand(50, 100);
                $P3Y=rand(200, 250);
                break;
            case 'RO':
                $P3X=rand(200, 250);
                $P3Y=rand(200, 250);
                break;
            case 'AM':
                $P3X=rand(200, 250);
                $P3Y=rand(50,100);
                break;
        }

        switch ($FCOLOR4) {
            case 'AZ':
                $P4X=rand(50, 100);
                $P4Y=rand(50, 100);
                break;
            case 'VE':
                $P4X=rand(50, 100);
                $P4Y=rand(200, 250);
                break;
            case 'RO':
                $P4X=rand(200, 250);
                $P4Y=rand(200, 250);
                break;
            case 'AM':
                $P4X=rand(200, 250);
                $P4Y=rand(50,100);
                break;
        }

        //TEXTO FLUJO DEL PENSAMIENTO
        $FLUJO_PENSAMIENTO = $this->tipoFlujoPensamiento($FCOLOR1, $FCOLOR2,  $FCOLOR3,  $FCOLOR4);

        $NEOCORTEX  = round(($PO_NUCLEO_AZ + $PO_NUCLEO_AM),2);
        $LIMBICA    = round((100 - $NEOCORTEX),2);


        if(($NEOCORTEX + $LIMBICA) < 100)
        {
            if($NEOCORTEX == $LIMBICA)
                {
                    $NEOCORTEX = 50;
                    $LIMBICA = 50;
                }
        }


        $this->BuscarCarrera($evaluacion->id,$evaluacion->carrera_preferida, $PT_NUCLEO_AZ, $PT_NUCLEO_VE, $PT_NUCLEO_RO, $PT_NUCLEO_AM);

        $carrera1 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',1)
        ->first();

        $carrera2 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',2)
        ->first();

        $carrera3 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',3)
        ->first();

        $carrera4 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',4)
        ->first();

        $carrera5 = DB::table('carreras_analisis')
        ->where('evaluacion_id',$evaluacion->id)
        ->where('tipo', 'RECOMENDADA')
        ->where('orden',5)
        ->first();

        $carrera6 = [];


        if ($evaluacion->carrera_preferida > 0)
        {
            $carrera6 = DB::table('carreras_analisis')
            ->where('evaluacion_id',$evaluacion->id)
            ->where('carrera_id',$evaluacion->carrera_preferida)
            ->first();
        }
        else
            {$carrera6  = $carrera1;}


            return view('quad.reporte_quadcito',
                ['evaluacion'=>$evaluacion,
                 'fecha' => $fecha->isoFormat('DD MMMM  YYYY'),
                 'HEM_IZQUIERO' =>   $HEM_IZQUIERO,
                 'HEM_DERECHO'  =>   $HEM_DERECHO,
                 'CAPA_LIMBICA' =>   round($CAPA_LIMBICA,2),
                 'CAPA_NEOCORTEX' => round($CAPA_NEOCORTEX,2),
                 'PT_NUCLEO_AZ' => $PT_NUCLEO_AZ,
                 'PT_NUCLEO_VE' => $PT_NUCLEO_VE,
                 'PT_NUCLEO_RO' => $PT_NUCLEO_RO,
                 'PT_NUCLEO_AM' => $PT_NUCLEO_AM,
                 'PO_NUCLEO_AZ' => $PO_NUCLEO_AZ,
                 'PO_NUCLEO_VE' => $PO_NUCLEO_VE,
                 'PO_NUCLEO_RO' => $PO_NUCLEO_RO,
                 'PO_NUCLEO_AM' => $PO_NUCLEO_AM,

                 'PT_CIRCUN_AZ' => $PT_CIRCUN_AZ,
                 'PT_CIRCUN_VE' => $PT_CIRCUN_VE,
                 'PT_CIRCUN_RO' => $PT_CIRCUN_RO,
                 'PT_CIRCUN_AM' => $PT_CIRCUN_AM,

                 'MOV_CUAD1' =>$MOV_CUAD1,
                 'MOV_CUAD1_TIPO' => $MOV_CUAD1_TIPO,
                 'MO_VALOR1' => $MO_VALOR1,

                 'MOV_CUAD2' =>$MOV_CUAD2,
                 'MOV_CUAD2_TIPO' => $MOV_CUAD2_TIPO,
                 'MO_VALOR2' => $MO_VALOR2,

                 'COD_AZ' => strval($COD_AZ),
                 'COD_VE' => strval($COD_VE),
                 'COD_RO' => strval($COD_RO),
                 'COD_AM' => strval($COD_AM),
                 //'codigos' => $codigos[0],
                 'P1X' => $P1X, 'P1Y' => $P1Y,
                 'P2X' => $P2X, 'P2Y' => $P2Y,
                 'P3X' => $P3X, 'P3Y' => $P3Y,
                 'P4X' => $P4X, 'P4Y' => $P4Y,
                 'FLUJO_PENSAMIENTO' => $FLUJO_PENSAMIENTO,

                 'PO_numerico' => $PO_numerico,
                 'PO_conceptual' => $PO_conceptual,
                 'PO_racional' => $PO_racional,
                 'PO_creativo'=> $PO_creativo,
                 'PO_resolutor' =>$PO_resolutor,
                 'PO_metaforico' => $PO_metaforico,
                 'PO_deductivo'=>$PO_deductivo,
                 'PO_imaginativo'=>$PO_imaginativo,
                 'PO_directivo' => $PO_directivo,
                 'PO_comunicador' => $PO_comunicador,
                 'PO_procedimental' => $PO_procedimental,
                 'PO_apasionado' => $PO_apasionado,
                 'PO_articulado' => $PO_articulado,
                 'PO_empatico' => $PO_empatico,
                 'PO_estructurado' => $PO_estructurado,
                 'PO_capacitador' => $PO_capacitador,
                 'INT_ESTRATEGI' => $INT_ESTRATEGI,
                 'INT_CREATIVO' => $INT_CREATIVO,
                 'INT_INTERPERS' => $INT_INTERPERS,
                 'INT_INTRAPERS' => $INT_INTRAPERS,
                 'INT_ORGANIZAD' => $INT_ORGANIZAD,
                 'INT_SECUENCIA' => $INT_SECUENCIA,
                 'INT_TECNICO' => $INT_TECNICO,
                 'INT_RESOLUTOR' => $INT_RESOLUTOR,
                 'NEOCORTEX'   => $NEOCORTEX,
                 'LIMBICA'     => $LIMBICA,
                 'carrera1'    => $carrera1,
                 'carrera2'    => $carrera2,
                 'carrera3'    => $carrera3,
                 'carrera4'    => $carrera4,
                 'carrera5'    => $carrera5,
                 'carrera6'    => $carrera6,
                 'campana'     => $campana,
                 'carrera_preferida' => $evaluacion->carrera_preferida
                ]);


    }



}
