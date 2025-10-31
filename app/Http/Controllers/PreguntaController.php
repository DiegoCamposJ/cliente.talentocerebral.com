<?php

namespace App\Http\Controllers;

use App\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Tymon\JWTAuth\Facades\JWTAuth;

class PreguntaController extends Controller
{
    public function index()
    {

        $preguntas = Pregunta::select('id','descripcion','valor')
                            ->where ('estado','ACTIVO')
                            ->get();

        return response()->json($preguntas);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,[
            'descripcion' => 'required',
            'color' => 'required',
            'valor' => 'required',
            'estado' => 'required',
            'usuario_actualiza' => 'required',
        ]);


        if($validator->fails()) {

            return response()->json([
                'ok' => false,
                'error' =>'error 500 store',
                //'error' => $validator->messages(),
            ]);
        }


        try{

            Pregunta::create($input);

            return response()->json([
                'ok' => true,
                'mensaje' =>"Se registro con exito",
            ]);
        } catch(\Exception $ex){
            return response()->json([
                'ok' => false,
                'error' => $ex->getMessage(),
            ]);
        }




    }

    public function show($id)
    {
        $pregunta = Pregunta::select('preguntas.*')
        ->where('id', $id)
        ->firts();

        return response()->json([
            'ok' =>true,
            'data' => $pregunta,
        ]);



    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input,[
            'valor' => 'required',
        ]);

        if($validator->fails()) {

            return response()->json([
                'ok' => false,
                'error' =>'error 500 update',
                //'error' => $validator->messages(),
            ]);
        }


        try{

            $pregunta = Pregunta::find($id);
            if($pregunta == false){
                return response()->json([
                    'ok' => false,
                    'error' => 'error 5002 update',
                    //'error' => $validator->messages(),
                ]);
            }

            //$pregunta->update($input);

            $affected = DB::table('preguntas')
              ->where('id', $id)
              ->update(['estado' => 'INACTIVO',
                        'valor' => $request->input('valor')
              ]);

              return response()->json([
                'ok' => true,
                'mensaje' =>"Se actualizo con exito",
            ]);


        } catch(\Exception $ex){
            return response()->json([
                'ok' => false,
                'error' => $ex->getMessage(),
            ]);
        }
    }

    public function preguntas($tipo)
    {
        $user = auth()->userOrFail();

        if (isset($user))
        {

            $preguntas = DB::table('preguntas')
                        ->join ('evaluaciones','preguntas.evaluacion_id','=','evaluaciones.id')
                        ->where ('preguntas.estado','ACTIVO')
                        ->where ('preguntas.tipo',$tipo)
                        ->where ('evaluaciones.persona_id', $user->id)
                        ->where ('evaluaciones.estado','PROCESO')
                        ->select('preguntas.id','preguntas.descripcion','preguntas.valor','evaluaciones.ruta')
                        ->get();

            return response()->json($preguntas);

        }




        return response()->json('');
    }

    public function descriptores()
    {

        $preguntas = Pregunta::select('id','descripcion','valor')
                            ->where ('estado','INACTIVO')
                            ->where ('tipo','DESCRIPTOR')
                            ->where ('valor',2)
                            ->get();

        return response()->json($preguntas);
   }







}
