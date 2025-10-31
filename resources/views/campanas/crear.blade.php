@extends('layouts.app')
@section('content')
@include('alerts.danger')
@include('alerts.errors')

@section('title', 'Registrar Campaña')


 {!!Form::open(['class'=>'form-horizontal', 'route' => 'campana.store', 'method' => 'POST','files' => false])!!}
     @csrf
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Registrar Campaña
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Descripción</label>
                                <input type="text" name="descripción" id="descripción" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Herramienta</label>
                                {!!Form::select('herramienta_id', $herramientas, null, ['class' => 'form-control rounded-0 border-top-0 border-left-0 border-right-0 px-0']) !!}
                            </div>
                            <div class="form-group text-center">

                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Registrar') }}
                                </button>

                                {{ link_to_action('CampanaController@listarCampanas', $title = 'Cancelar', $parameters = [$slugEmpresa], $attributes = ['class' => 'btn btn-light waves-effect waves-themed']) }}
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
