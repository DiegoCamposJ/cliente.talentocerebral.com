@extends('layouts.app')
@section('content')
@include('alerts.danger')
@include('alerts.errors')


{{Form::model($usuario,['class'=>'form-horizontal', 'route' => ['usuario.update',$id], 'method' => 'PUT'])}}

     @csrf
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Actualizar Contraseña
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Usuario: {{$usuario->name}}</label>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nombre: {{$usuario->email}}</label>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Confirmar Contraseña</label>
                                <!--<input type="password" name="cpassword" id="cpassword" class="form-control">-->
                                <input id="password-confirm" type="password" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0" name="password_confirmation" required autocomplete="new-password">
                            </div>



                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-secondary">{{ __('Actualizar') }}</button>

                                {{ link_to_route('usuario.index', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-light waves-effect waves-themed']) }}
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
