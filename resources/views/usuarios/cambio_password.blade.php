@extends('layouts.app')
@section('content')

<form action="{{ route('usuario.clave') }}" method="POST" enctype="multipart/form-data">

     @csrf
    <div class="row">
        <div class="col-sm-5">
        </div>
        <div class="col-sm-2">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">                 
                    <h2>
                        <b>Actualizar Contraseña</b> 
                    </h2>                                                  
                </div>
                <div class="panel-container show">                    
                    <div class="panel-content">
                        <p class="text-justify">
                        La contraseña debe tener una extensión mínima de 10 caracteres, letras mayúsculas, minúsculas, un número y un carácter especial ( @ # $ ) <br>
                        ejm. TEj@301826
                        </p> 
                        <br>
                        <div class="form-group">
                            <label class="form-label" for="simpleinput">Contraseña</label>
                            <input type="text" name="password" id="password" value="{{ $passTemp }}" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="simpleinput">Confirmar Contraseña</label>
                            <input type="text" id="password-confirm"  class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-secondary">{{ __('Actualizar') }}</button>
                            {{ link_to_action('EvaluacionController@index', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-light waves-effect waves-themed']) }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-5">
        </div>
    </div>
</form>
@endsection
