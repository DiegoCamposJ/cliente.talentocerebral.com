<?php
namespace App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Str;




trait PersonaTrait
{


    public function nuevaClave($email)
    {    

        $control =  rand(1, 2);
        $caracteres1 = 'ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $caracteres2 = 'abcdefghijmnopqrstuvwxyz';
        $caracteres3 = '@#$';    
        
        if ($control == 1)
        {
            $pw1 = substr(str_shuffle($caracteres1), 0, 1);            
            $pw2 = substr(str_shuffle($caracteres2), 0, 2);            
        }
        else
        {
            $pw1 = substr(str_shuffle($caracteres1), 0, 2);            
            $pw2 = substr(str_shuffle($caracteres2), 0, 1);            
        }
        
        
        $pw3 = substr(str_shuffle($caracteres3), 0, 1);
        $pw4 = rand(100000, 999999);
        
        $passTmp = $pw1 . $pw2 . $pw3 . $pw4;
        
        $actualizacion = DB::table('personas')
                        ->where('email', $email)
                        ->where('estado','ACTIVO')
                        ->update(['password' => Hash::make($passTmp),
                                   'pass' => $passTmp,
                                   'f_cambio_password' => Carbon::now()
                                ]); 


        $respuesta = "";
        if ($actualizacion == 1)
        {
            DB::table('users')
            ->where('email', $email)
            ->where('estado','ACTIVO')
            ->update(['password' => Hash::make($passTmp), 
                    'f_cambio_password' => Carbon::now()
                    ]);
            
            
            $persona = DB::table('personas')
            ->select('personas.*')
            ->where('email', $email)
            ->where('estado','ACTIVO')
            ->first();

            $details = [
                'nombre'    => $persona->nombre,
                'password'  =>  $passTmp,
                'email'     => trim($persona->email)
             ];


               \Mail::to($persona->email)               
               ->cc('marjorie.flores@cerebro360.com')
               ->bcc('diegocamposec@gmail.com')
               ->send(new \App\Mail\PersonaCreada($details));

            $respuesta = "La información de acceso fue enviada a su email";

        }else
            $respuesta = "No se pudo generar una nueva contraseña";

    
        return $respuesta;     
    }

       
    public function validarClave( $pw)
    {

        $valMay = '';        
        $valMin = '';        
        $valNum = '';        
        $valEsp = '';        
        
        if (strlen(trim($pw)) < 10 )
            return  'La contraseña debe tener al menos 10 caracteres';
        
        
        
        $len = mb_strlen($pw);
        $caracteres1 = "ABCDEFGHJKLMNOPQRSTUVWXYZ";
        $caracteres2 = 'abcdefghijmnopqrstuvwxyz';
        $caracteres3 = '@#$';
        $caracteres4 = '0123456789';

        
        for ($i=0; $i<$len; $i++)
        {   
            $posicion_coincidencia = strpos($caracteres1, mb_substr($pw, $i, 1, "UTF-8"));
            if ($posicion_coincidencia !== false)                            
                {$valMay='ok';}
        }

        for ($i=0; $i<$len; $i++)
        {   
            $posicion_coincidencia = strpos($caracteres2, mb_substr($pw, $i, 1, "UTF-8"));
            if ($posicion_coincidencia !== false)                            
                {$valMin='ok';}
        }

        for ($i=0; $i<$len; $i++)
        {   
            $posicion_coincidencia = strpos($caracteres4, mb_substr($pw, $i, 1, "UTF-8"));
            if ($posicion_coincidencia !== false)                            
                {$valNum='ok';}
        }

        for ($i=0; $i<$len; $i++)
        {   
            $posicion_coincidencia = strpos($caracteres3, mb_substr($pw, $i, 1, "UTF-8"));
            if ($posicion_coincidencia !== false)                            
                {$valEsp='ok';}
        }


        if ($valMay !='ok')
            return  'La contraseña debe contener al menos una letra mayúscula';
        if ($valMin !='ok')
            return  'La contraseña debe contener al menos una letra minúscula';
        if ($valNum !='ok')
            return  'La contraseña debe contener al menos un número';
        if ($valEsp !='ok')
            return  'La contraseña debe contener al menos un carácter especial';
        
       

        $actualizacion = DB::table('personas')
        ->where('email', Auth::user()->email)
        ->where('estado','ACTIVO')
        ->update(['password' => Hash::make($pw),
                   'pass' => $pw,
                   'f_cambio_password' => Carbon::now()
                ]); 


        if ($actualizacion == 1)
        {
            DB::table('users')
            ->where('email', Auth::user()->email)
            ->where('estado','ACTIVO')
            ->update(['password' => Hash::make($pw),                                   
                    'f_cambio_password' => Carbon::now()
                    ]);
        
            return 'OK';
        
        }
                                      
        
            
        return 'Problemas al actualizar la contraseña';
    }
    
}
