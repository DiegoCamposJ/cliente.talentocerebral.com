@extends('layouts.app')
@section('content')


{!!Form::open(['class'=>'form-horizontal', 'route' => 'usuario.store', 'method' => 'POST','files' => false])!!}

     @csrf
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Nuevo Usuario
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Identificación</label>
                                <input type="text" name="identificacion" id="identificacion" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Correo electrónico</label>
                                <input type="text" name="email" id="email" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label" for="simpleinput">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Confirmar Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0" name="password_confirmation" required autocomplete="new-password">
                            </div> --}}
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Empresa</label>
                                {!!Form::select('empresa_id', $empresas, null, ['class' => 'form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0']) !!}
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Rol</label>
                                {!!Form::select('rol', $roles, null, ['class' => 'form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0']) !!}
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Registrar') }}
                                </button>

                                {{ link_to_action('UsuarioController@index', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-light waves-effect waves-themed']) }}
                            </div>



                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
        </div>
    </div>
{!!Form::close()!!}
@endsection
