<?php
namespace App\Traits;

use App\Pregunta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


trait CarreraEvaluacionTrait
{

    //Empate Nucleo QUAD
    public function BuscarCarrera($IdEvaluacion,$CarreraPreferida, $AZ, $VE, $RO, $AM)
    {
        $constante=295;

        $cntCarreras = DB::table('carreras_analisis')
        ->where('evaluacion_id', $IdEvaluacion)
        ->count();
        
        if ($cntCarreras == 0)
        {
            $carreras = DB::table('carreras')
            ->where('estado','ACTIVO')        
            ->get();

            
            foreach($carreras as $carrera)
            {
                $tmpEvaluacion = 100 - ( ( ( abs($AZ - $carrera->azul) +  abs($VE - $carrera->verde) + abs($RO - $carrera->rojo) + abs($AM - $carrera->amarillo)) / $constante) * 100);
                
                DB::table('carreras_analisis')->insert([
                    'evaluacion_id' =>$IdEvaluacion,
                    'carrera_id'    =>$carrera->id,
                    'carrera'       =>$carrera->carrera,
                    'azul'          =>$carrera->azul,
                    'verde'         =>$carrera->verde,
                    'rojo'          =>$carrera->rojo,
                    'amarillo'      =>$carrera->amarillo,
                    'evaluacion'    => $tmpEvaluacion
                ]);

            }


            for ($i = 1; $i <= 5; $i++)
            {
                $maxEvaluacion = DB::table('carreras_analisis')
                 ->where('evaluacion_id',$IdEvaluacion)        
                 ->where('tipo', 'PROCESO')
                 ->max('evaluacion');
            
                $carreraMax = DB::table('carreras_analisis')
                ->where('evaluacion_id',$IdEvaluacion)        
                ->where('evaluacion',$maxEvaluacion)
                ->where('tipo', 'PROCESO')        
                ->first();

                DB::table('carreras_analisis')
                    ->where('id', $carreraMax->id)
                    ->update(['tipo' => 'RECOMENDADA', 'orden'=>$i]);


            }
            
            DB::table('carreras_analisis')
            ->where('tipo','PROCESO')
            ->where('evaluacion_id',$IdEvaluacion)        
            ->where('carrera_id','!=',$CarreraPreferida)        
            ->delete();
            

        }
        
        

        
    }
    
}
