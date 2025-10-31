<?php
namespace App\Traits;

use App\Pregunta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;



trait EmpateEvaluacionTrait
{

    //Empate Nucleo QUAD
    public function EmpateNucleoQuad($id, $inc)
    {

        $evaluacion = DB::table('evaluaciones')
            ->select('evaluaciones.*')
            ->where('id',$id)
            ->first();

        
        $evaluacion = DB::select("SELECT * FROM braindb.evaluaciones where id=$id and estado='FINALIZADA'
        and (v1=v2 or v1=v3 or v1=v4 or v2=v3 or v2=v4 or v3=v4)");

        if(!empty($evaluacion))
        {
            $v1_aux = $evaluacion[0]->v1;
            $v2_aux = $evaluacion[0]->v2;
            $v3_aux = $evaluacion[0]->v3;
            $v4_aux = $evaluacion[0]->v4;

            //EMPATE 4 VARIABLES
            if (($evaluacion[0]->v1 == $evaluacion[0]->v2) && ($evaluacion[0]->v2 == $evaluacion[0]->v3) && ($evaluacion[0]->v3 == $evaluacion[0]->v4))
            {
                $optRnd = rand(1,4);
                if($optRnd == 1)
                {
                    $v1_aux = $evaluacion[0]->v1 + 3;
                    $v2_aux = $evaluacion[0]->v2;
                    $v3_aux = $evaluacion[0]->v3 - 1;
                    $v4_aux = $evaluacion[0]->v4 - 2;
                }
                if($optRnd == 2)
                {
                    $v1_aux = $evaluacion[0]->v1;
                    $v2_aux = $evaluacion[0]->v2 + 3;
                    $v3_aux = $evaluacion[0]->v3 - 1;
                    $v4_aux = $evaluacion[0]->v4 - 2;
                }
                if($optRnd == 3)
                {
                    $v1_aux = $evaluacion[0]->v1 - 2;
                    $v2_aux = $evaluacion[0]->v2 - 1;
                    $v3_aux = $evaluacion[0]->v3 + 3;
                    $v4_aux = $evaluacion[0]->v4;
                }

                if($optRnd == 4)
                {
                    $v1_aux = $evaluacion[0]->v1 - 2;
                    $v2_aux = $evaluacion[0]->v2 - 1;
                    $v3_aux = $evaluacion[0]->v3;
                    $v4_aux = $evaluacion[0]->v4 + 3;
                }
            }
            else
            {
                //EMPATE 3 VARIABLES CASO 1
                if (($evaluacion[0]->v1 == $evaluacion[0]->v2) && ($evaluacion[0]->v2 == $evaluacion[0]->v3))
                {
                    $optRnd = rand(1,3);
                    if($optRnd == 1)
                    {
                        $v1_aux = $evaluacion[0]->v1 + 3;
                        $v2_aux = $evaluacion[0]->v2 - 1;
                        $v3_aux = $evaluacion[0]->v3 - 2;
                    }

                    if($optRnd == 2)
                    {
                        $v1_aux = $evaluacion[0]->v1 - 2;
                        $v2_aux = $evaluacion[0]->v2 + 3;
                        $v3_aux = $evaluacion[0]->v3 - 1;
                    }

                    if($optRnd == 3)
                    {
                        $v1_aux = $evaluacion[0]->v1 - 1;
                        $v2_aux = $evaluacion[0]->v2 - 2;
                        $v3_aux = $evaluacion[0]->v3 + 3;
                    }


                }
                else
                {
                    //EMPATE 3 VARIABLES  CASO 2
                    if (($evaluacion[0]->v1 == $evaluacion[0]->v3) && ($evaluacion[0]->v3 == $evaluacion[0]->v4))
                    {
                        $optRnd = rand(1,3);
                        if($optRnd == 1)
                        {
                            $v1_aux = $evaluacion[0]->v1 + 3;
                            $v3_aux = $evaluacion[0]->v3 - 1;
                            $v4_aux = $evaluacion[0]->v4 - 2;
                        }

                        if($optRnd == 2)
                        {
                            $v1_aux = $evaluacion[0]->v1 - 2;
                            $v3_aux = $evaluacion[0]->v3 + 3;
                            $v4_aux = $evaluacion[0]->v4 - 1;
                        }

                        if($optRnd == 3)
                        {
                            $v1_aux = $evaluacion[0]->v1 - 1;
                            $v3_aux = $evaluacion[0]->v3 - 2;
                            $v4_aux = $evaluacion[0]->v4 + 3;
                        }
                    }
                    else
                    {
                        //EMPATE 3 VARIABLES  CASO 3
                        if (($evaluacion[0]->v2 == $evaluacion[0]->v3) && ($evaluacion[0]->v3 == $evaluacion[0]->v4))
                        {
                            $optRnd = rand(1,3);
                            if($optRnd == 1)
                            {
                                $v2_aux = $evaluacion[0]->v2 + 3;
                                $v3_aux = $evaluacion[0]->v3 - 1;
                                $v4_aux = $evaluacion[0]->v4 - 2;
                            }

                            if($optRnd == 2)
                            {
                                $v2_aux = $evaluacion[0]->v2 - 2;
                                $v3_aux = $evaluacion[0]->v3 + 3;
                                $v4_aux = $evaluacion[0]->v4 - 1;
                            }

                            if($optRnd == 3)
                            {
                                $v2_aux = $evaluacion[0]->v2 - 1;
                                $v3_aux = $evaluacion[0]->v3 - 2;
                                $v4_aux = $evaluacion[0]->v4 + 3;
                            }


                        }
                        else
                        {
                            //EMPATE 3 VARIABLES  CASO 4
                            if (($evaluacion[0]->v1 == $evaluacion[0]->v2) && ($evaluacion[0]->v2 == $evaluacion[0]->v4))
                            {
                                $optRnd = rand(1,3);
                                if($optRnd == 1)
                                {
                                    $v1_aux = $evaluacion[0]->v1 + 1;
                                    $v2_aux = $evaluacion[0]->v2;
                                    $v4_aux = $evaluacion[0]->v4 - 1;
                                }

                                if($optRnd == 2)
                                {
                                    $v1_aux = $evaluacion[0]->v1 - 1;
                                    $v2_aux = $evaluacion[0]->v2 + 1;
                                    $v4_aux = $evaluacion[0]->v4;
                                }

                                if($optRnd == 3)
                                {
                                    $v1_aux = $evaluacion[0]->v1;
                                    $v2_aux = $evaluacion[0]->v2 - 1;
                                    $v4_aux = $evaluacion[0]->v4 + 1;
                                }

                            }
                            else
                            { //EMPATE 2 VARIABLES
                                $optRnd = rand(1,2);

                                if ($evaluacion[0]->v1 == $evaluacion[0]->v2)
                                {

                                    if($optRnd == 1)
                                    {
                                        $v1_aux = $evaluacion[0]->v1 + $inc;
                                        $v2_aux = $evaluacion[0]->v2 - $inc;
                                    }
                                    else
                                    {
                                        $v1_aux = $evaluacion[0]->v1 - $inc;
                                        $v2_aux = $evaluacion[0]->v2 + $inc;
                                    }
                                }
                                else
                                {
                                    if ($evaluacion[0]->v1 == $evaluacion[0]->v3)
                                    {
                                        if($optRnd == 1)
                                        {
                                            $v1_aux = $evaluacion[0]->v1 + $inc;
                                            $v3_aux = $evaluacion[0]->v3 - $inc;
                                        }
                                        else
                                        {
                                            $v1_aux = $evaluacion[0]->v1 - $inc;
                                            $v3_aux = $evaluacion[0]->v3 + $inc;
                                        }
                                    }
                                    else
                                    {
                                        if ($evaluacion[0]->v1 == $evaluacion[0]->v4)
                                        {
                                            if($optRnd == 1)
                                            {
                                                $v1_aux = $evaluacion[0]->v1 + $inc;
                                                $v4_aux = $evaluacion[0]->v4 - $inc;
                                            }
                                            else
                                            {
                                                $v1_aux = $evaluacion[0]->v1 - $inc;
                                                $v4_aux = $evaluacion[0]->v4 + $inc;
                                            }
                                        }
                                        else
                                        {
                                            if ($evaluacion[0]->v2 == $evaluacion[0]->v3)
                                            {
                                                if($optRnd == 1)
                                                {
                                                    $v2_aux = $evaluacion[0]->v2 + $inc;
                                                    $v3_aux = $evaluacion[0]->v3 - $inc;
                                                }
                                                else
                                                {
                                                    $v2_aux = $evaluacion[0]->v2 - $inc;
                                                    $v3_aux = $evaluacion[0]->v3 + $inc;
                                                }
                                            }
                                            else
                                            {
                                                if ($evaluacion[0]->v2 == $evaluacion[0]->v4)
                                                {
                                                    if($optRnd == 1)
                                                    {
                                                        $v2_aux = $evaluacion[0]->v2 + $inc;
                                                        $v4_aux = $evaluacion[0]->v4 - $inc;
                                                    }
                                                    else
                                                    {
                                                        $v2_aux = $evaluacion[0]->v2 - $inc;
                                                        $v4_aux = $evaluacion[0]->v4 + $inc;
                                                    }
                                                }
                                                else
                                                {
                                                    if ($evaluacion[0]->v3 == $evaluacion[0]->v4)
                                                    {
                                                        if($optRnd == 1)
                                                        {
                                                            $v3_aux = $evaluacion[0]->v3 + $inc;
                                                            $v4_aux = $evaluacion[0]->v4 - $inc;
                                                        }
                                                        else
                                                        {
                                                            $v3_aux = $evaluacion[0]->v3 - $inc;
                                                            $v4_aux = $evaluacion[0]->v4 + $inc;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                }
            }

            $affected = DB::table('evaluaciones')
            ->where('id', $id)
            ->update(['v1' => $v1_aux,
                      'v2' => $v2_aux,
                      'v3' => $v3_aux,
                      'v4' => $v4_aux ]);

        }
    }

    //Empate Circustancial QUAD
    public function EmpateCircustancialQuad($id, $inc)
    {
        $evaluacion = DB::table('evaluaciones')
            ->select('evaluaciones.*')
            ->where('id',$id)
            ->first();

        
        $evaluacion = DB::select("SELECT * FROM braindb.evaluaciones where id=$id and estado='FINALIZADA'
        and (v5=v6 or v5=v7 or v5=v8 or v6=v7 or v6=v8 or v7=v8)");

        if(!empty($evaluacion))
        {
            $v5_aux = $evaluacion[0]->v5;
            $v6_aux = $evaluacion[0]->v6;
            $v7_aux = $evaluacion[0]->v7;
            $v8_aux = $evaluacion[0]->v8;

            //EMPATE 4 VARIABLES
            if (($evaluacion[0]->v5 == $evaluacion[0]->v6) && ($evaluacion[0]->v6 == $evaluacion[0]->v7) && ($evaluacion[0]->v7 == $evaluacion[0]->v8))
            {
                $optRnd = rand(1,4);
                if($optRnd == 1)
                {
                    $v5_aux = $evaluacion[0]->v5 + 3;
                    $v6_aux = $evaluacion[0]->v6;
                    $v7_aux = $evaluacion[0]->v7 - 1;
                    $v8_aux = $evaluacion[0]->v8 - 2;
                }
                if($optRnd == 2)
                {
                    $v5_aux = $evaluacion[0]->v5;
                    $v6_aux = $evaluacion[0]->v6 + 3;
                    $v7_aux = $evaluacion[0]->v7 - 1;
                    $v8_aux = $evaluacion[0]->v8 - 2;
                }
                if($optRnd == 3)
                {
                    $v5_aux = $evaluacion[0]->v5 - 2;
                    $v6_aux = $evaluacion[0]->v6 - 1;
                    $v7_aux = $evaluacion[0]->v7 + 3;
                    $v8_aux = $evaluacion[0]->v8;
                }

                if($optRnd == 4)
                {
                    $v5_aux = $evaluacion[0]->v5 - 2;
                    $v6_aux = $evaluacion[0]->v6 - 1;
                    $v7_aux = $evaluacion[0]->v7;
                    $v8_aux = $evaluacion[0]->v8 + 3;
                }
            }
            else
            {
                //EMPATE 3 VARIABLES CASO 1
                if (($evaluacion[0]->v5 == $evaluacion[0]->v6) && ($evaluacion[0]->v6 == $evaluacion[0]->v7))
                {
                    $optRnd = rand(1,3);
                    if($optRnd == 1)
                    {
                        $v5_aux = $evaluacion[0]->v5 + 3;
                        $v6_aux = $evaluacion[0]->v6 - 1;
                        $v7_aux = $evaluacion[0]->v7 - 2;
                    }

                    if($optRnd == 2)
                    {
                        $v5_aux = $evaluacion[0]->v5 - 2;
                        $v6_aux = $evaluacion[0]->v6 + 3;
                        $v7_aux = $evaluacion[0]->v7 - 1;
                    }

                    if($optRnd == 3)
                    {
                        $v5_aux = $evaluacion[0]->v5 - 1;
                        $v6_aux = $evaluacion[0]->v6 - 2;
                        $v7_aux = $evaluacion[0]->v7 + 3;
                    }


                }
                else
                {
                    //EMPATE 3 VARIABLES  CASO 2
                    if (($evaluacion[0]->v5 == $evaluacion[0]->v7) && ($evaluacion[0]->v7 == $evaluacion[0]->v8))
                    {
                        $optRnd = rand(1,3);
                        if($optRnd == 1)
                        {
                            $v5_aux = $evaluacion[0]->v5 + 3;
                            $v7_aux = $evaluacion[0]->v7 - 1;
                            $v8_aux = $evaluacion[0]->v8 - 2;
                        }

                        if($optRnd == 2)
                        {
                            $v5_aux = $evaluacion[0]->v5 - 2;
                            $v7_aux = $evaluacion[0]->v7 + 3;
                            $v8_aux = $evaluacion[0]->v8 - 1;
                        }

                        if($optRnd == 3)
                        {
                            $v5_aux = $evaluacion[0]->v5 - 1;
                            $v7_aux = $evaluacion[0]->v7 - 2;
                            $v8_aux = $evaluacion[0]->v8 + 3;
                        }
                    }
                    else
                    {
                        //EMPATE 3 VARIABLES  CASO 3
                        if (($evaluacion[0]->v6 == $evaluacion[0]->v7) && ($evaluacion[0]->v7 == $evaluacion[0]->v8))
                        {
                            $optRnd = rand(1,3);
                            if($optRnd == 1)
                            {
                                $v6_aux = $evaluacion[0]->v6 + 3;
                                $v7_aux = $evaluacion[0]->v7 - 1;
                                $v8_aux = $evaluacion[0]->v8 - 2;
                            }

                            if($optRnd == 2)
                            {
                                $v6_aux = $evaluacion[0]->v6 - 2;
                                $v7_aux = $evaluacion[0]->v7 + 3;
                                $v8_aux = $evaluacion[0]->v8 - 1;
                            }

                            if($optRnd == 3)
                            {
                                $v6_aux = $evaluacion[0]->v6 - 1;
                                $v7_aux = $evaluacion[0]->v7 - 2;
                                $v8_aux = $evaluacion[0]->v8 + 3;
                            }


                        }
                        else
                        {
                            //EMPATE 3 VARIABLES  CASO 4
                            if (($evaluacion[0]->v5 == $evaluacion[0]->v6) && ($evaluacion[0]->v6 == $evaluacion[0]->v8))
                            {
                                $optRnd = rand(1,3);
                                if($optRnd == 1)
                                {
                                    $v5_aux = $evaluacion[0]->v5 + 1;
                                    $v6_aux = $evaluacion[0]->v6;
                                    $v8_aux = $evaluacion[0]->v8 - 1;
                                }

                                if($optRnd == 2)
                                {
                                    $v5_aux = $evaluacion[0]->v5 - 1;
                                    $v6_aux = $evaluacion[0]->v6 + 1;
                                    $v8_aux = $evaluacion[0]->v8;
                                }

                                if($optRnd == 3)
                                {
                                    $v5_aux = $evaluacion[0]->v5;
                                    $v6_aux = $evaluacion[0]->v6 - 1;
                                    $v8_aux = $evaluacion[0]->v8 + 1;
                                }

                            }
                            else
                            { //EMPATE 2 VARIABLES
                                $optRnd = rand(1,2);

                                if ($evaluacion[0]->v5 == $evaluacion[0]->v6)
                                {

                                    if($optRnd == 1)
                                    {
                                        $v5_aux = $evaluacion[0]->v5 + $inc;
                                        $v6_aux = $evaluacion[0]->v6 - $inc;
                                    }
                                    else
                                    {
                                        $v5_aux = $evaluacion[0]->v5 - $inc;
                                        $v6_aux = $evaluacion[0]->v6 + $inc;
                                    }
                                }
                                else
                                {
                                    if ($evaluacion[0]->v5 == $evaluacion[0]->v7)
                                    {
                                        if($optRnd == 1)
                                        {
                                            $v5_aux = $evaluacion[0]->v5 + $inc;
                                            $v7_aux = $evaluacion[0]->v7 - $inc;
                                        }
                                        else
                                        {
                                            $v5_aux = $evaluacion[0]->v5 - $inc;
                                            $v7_aux = $evaluacion[0]->v7 + $inc;
                                        }
                                    }
                                    else
                                    {
                                        if ($evaluacion[0]->v5 == $evaluacion[0]->v8)
                                        {
                                            if($optRnd == 1)
                                            {
                                                $v5_aux = $evaluacion[0]->v5 + $inc;
                                                $v8_aux = $evaluacion[0]->v8 - $inc;
                                            }
                                            else
                                            {
                                                $v5_aux = $evaluacion[0]->v5 - $inc;
                                                $v8_aux = $evaluacion[0]->v8 + $inc;
                                            }
                                        }
                                        else
                                        {
                                            if ($evaluacion[0]->v6 == $evaluacion[0]->v7)
                                            {
                                                if($optRnd == 1)
                                                {
                                                    $v6_aux = $evaluacion[0]->v6 + $inc;
                                                    $v7_aux = $evaluacion[0]->v7 - $inc;
                                                }
                                                else
                                                {
                                                    $v6_aux = $evaluacion[0]->v6 - $inc;
                                                    $v7_aux = $evaluacion[0]->v7 + $inc;
                                                }
                                            }
                                            else
                                            {
                                                if ($evaluacion[0]->v6 == $evaluacion[0]->v8)
                                                {
                                                    if($optRnd == 1)
                                                    {
                                                        $v6_aux = $evaluacion[0]->v6 + $inc;
                                                        $v8_aux = $evaluacion[0]->v8 - $inc;
                                                    }
                                                    else
                                                    {
                                                        $v6_aux = $evaluacion[0]->v6 - $inc;
                                                        $v8_aux = $evaluacion[0]->v8 + $inc;
                                                    }
                                                }
                                                else
                                                {
                                                    if ($evaluacion[0]->v7 == $evaluacion[0]->v8)
                                                    {
                                                        if($optRnd == 1)
                                                        {
                                                            $v7_aux = $evaluacion[0]->v7 + $inc;
                                                            $v8_aux = $evaluacion[0]->v8 - $inc;
                                                        }
                                                        else
                                                        {
                                                            $v7_aux = $evaluacion[0]->v7 - $inc;
                                                            $v8_aux = $evaluacion[0]->v8 + $inc;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                }
            }

            $affected = DB::table('evaluaciones')
            ->where('id', $id)
            ->update(['v5' => $v5_aux,
                      'v6' => $v6_aux,
                      'v7' => $v7_aux,
                      'v8' => $v8_aux ]);

        }
    }




}
