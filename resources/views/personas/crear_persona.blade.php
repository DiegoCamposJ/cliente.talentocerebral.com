@extends('layouts.app')
@section('title', 'Crear Persona')
@section('content')


{!! Form::open(array('action' => array('PersonaController@guardarPersona', $empresa_slug), 'method' => 'POST'))  !!}
     @csrf
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Crear Persona
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Identificación</label>
                                <input type="text" name="identificacion" id="identificacion" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Correo electrónico</label>
                                <input type="text" name="email" id="email" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Genero</label>
                                {!!Form::select('genero', ['M' => 'Masculino', 'F' => 'Femenino'], null,['class' => 'form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0']) !!}

                            </div>



                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Registrar') }}
                                </button>

                                {{ link_to_action('PersonaController@show', $title = 'Cancelar', $parameters = [$empresa_slug], $attributes = ['class' => 'btn btn-light waves-effect waves-themed']) }}
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
