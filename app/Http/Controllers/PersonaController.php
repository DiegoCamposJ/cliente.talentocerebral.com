<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Str;
use App\Traits\PersonaTrait;

class PersonaController extends Controller
{

    use PersonaTrait;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        return redirect('/');
    }


    public function create()
    {
        return redirect('/');
    }


    public function store(Request $request)
    {
        return redirect('/');
    }


    public function show($id)
    {
        return redirect('/');
    }


    public function edit($id)
    {
        if (is_null(auth()->user()))
            return view('auth.recuperar');
        else
            return redirect('home');

    }


    public function update(Request $request, $id)
    {
        //dd('ingreso update');


        $validatedData = $request->validate([
            //'email'  => 'required|email:rfc,dns',
            'email'  => 'required|email',

        ]);

        $persona = DB::table('personas')
        ->select('personas.*')
        ->where('email', $request->input('email'))
        ->where('estado','ACTIVO')
        ->first();


        if (is_null($persona))
        {
           //dd('no existe esa persona');
           Session::flash('message-error', 'La cuenta no se encuentra registrada');
           return view('auth.recuperar');
        }
       else
           {
                $clave = $this->nuevaClave($request->input('email'));
                Session::flash('message', $clave);
                return redirect('/');
           }

    }

    public function formPassword()
    {

        $passTemp = '';
        if (is_null(auth()->user()))
            return redirect('/');
        else
            return view('usuarios.cambio_password',['passTemp' => $passTemp]);
    }


    public function cambioPassword(Request $request)
    {

        if (is_null(auth()->user()))
            return redirect('/');
        else
            {
                if($request['password'] == $request['password_confirmation'])
                {
                    $validacionClave = $this->validarClave($request['password']);
                    if($validacionClave == 'OK')
                    {
                        Session::flash('message','Clave actualizada correctamente');
                        return redirect('home');
                    }
                    else
                    {
                        Session::flash('message-error',$validacionClave);

                        $passTemp = $request['password'];
                        return view('usuarios.cambio_password',['passTemp' => $passTemp]);

                    }

                }
                else
                    Session::flash('message-error','La confirmación de la contraseña no es correcta');
                    return redirect('formClaveUsuario');

            }

    }

    public function recuperaUsuario(Request $request)
    {

         $validatedData = $request->validate(['email'  => 'required|email']);

        $persona = DB::table('personas')
        ->select('personas.*')
        ->where('email', $request->input('email'))
        ->where('estado','ACTIVO')
        ->first();

        if (!is_null($persona))
        {
           $clave = $this->nuevaClave($request->input('email'));
           Session::flash('message-error', 'La cuenta no se encuentra registrada');
           
        }
        return view('auth.login');

    }





    public function crearPersona($empresa_slug)
    {
        //return view('personas.crear_persona',['empresa_slug' => $empresa_slug]);
    }

    public function guardarPersona(Request $request, $empresa_slug)
    {

    //     $validatedData = $request->validate([
    //         'nombre'            => 'required|max:50',
    //         //'identificacion'    => 'required|max:13',
    //         'email'             => 'required|email:rfc,dns',
    //         'genero'            => 'required',

    //     ]);

    //     $dt = Carbon::now();
    //     $passTmp = $dt->timestamp;


    //     $empresa = DB::table('empresas')
    //         ->select('empresas.*')
    //         ->where('slug', $empresa_slug)
    //         ->first();

    //     $Persona=Persona::create([
    //         'identificacion'    => $request->input('identificacion'),
    //         'slug'              => Str::random(5).$dt->timestamp,
    //         'id_empresa'        => $empresa->id,
    //         'nombre'            => strtoupper($request->input('nombre')),
    //         'apellido'          => '',
    //         'sexo'              => $request->input('genero'),
    //         'email'             => $request->input('email'),
    //         'password'          => '',
    //         'estado'            => 'ACTIVO',

    //     ]);

    //     $details = [
    //         'nombre' => strtoupper($request->input('nombre')),
    //         'password' =>  $passTmp,
    //         'email' => $request->input('email'),
    //      ];

    //    // \Mail::to($usuario->email)->send(new \App\Mail\UsuarioCreado($details));
    //     \Mail::to('diegocamposec@gmail.com')->send(new \App\Mail\UsuarioCreado($details));

    //     Session::flash('message','Persona registrada correctamente');
    //     // return redirect('persona.show',$empresa_slug);

    //     return redirect()->route('persona.show', [$empresa_slug]);

    }





}
