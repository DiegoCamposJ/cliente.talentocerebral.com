@extends('layouts.app')
@section('content')
@include('alerts.danger')
@include('alerts.errors')


{{Form::model($empresa,['class'=>'form-horizontal', 'route' => ['empresa.update',$empresa->slug], 'method' => 'PUT'])}}

     @csrf
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Lista de Campañas
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">RUC {{$empresa->ruc}}</label>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Razon Social</label>
                                <label class="form-label" for="simpleinput">{{$empresa->nombre}}</label>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Ciudad</label>
                                <label class="form-label" for="simpleinput">{{$empresa->nombre}}</label>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Representante</label>
                                <input type="text" name="representante" id="representante" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0" value="{{$empresa->representante}}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="simpleinput">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control form-control-lg rounded-0 border-top-0 border-left-0 border-right-0 px-0" value="{{$empresa->telefono}}">
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Actualizar') }}
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
