@extends('layouts.app')
@section('content')
@include('alerts.danger')
@include('alerts.errors')


{!!Form::open(['class'=>'form-horizontal', 'route' => 'empresa.store', 'method' => 'POST','files' => false])!!}

     @csrf
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Registrar Empresa
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">RUC</label>
                                <input type="text" name="ruc" id="ruc" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Razon Social</label>
                                <input type="text" name="nombre" id="nombre" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Ciudad</label>
                                <input type="text" name="ciudad" id="ciudad" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Representante</label>
                                <input type="text" name="representante" id="representante" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0">
                            </div>
                            <div class="form-group text-center">

                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Registrar') }}
                                </button>
                                {{ link_to_route('empresa.index', $title = 'Cancelar', $parameters = [], $attributes = ['class' => 'btn btn-light waves-effect waves-themed']) }}
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
