@extends('layouts.app')
@section('content')
@include('alerts.success')
@include('alerts.danger')
@include('alerts.errors')

@section('title', 'Cargar  Batch Personal')

{{-- <form action="{{ ('procesarBatch/'.$empresa_slug) }}" method="POST" enctype="multipart/form-data"> --}}
    {{-- {!!Form::open(['class'=>'form-horizontal', 'route' => 'usuario.store', 'method' => 'POST','files' => false])!!} --}}
    {!! Form::open(array('action' => array('PersonaController@procesarBatch', $empresa_slug), 'method' => 'POST', 'files' => true))  !!}

    @csrf
    <div class="row">

        <div class="col-lg-4">
        </div>
        <div class="col-lg-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Carga Batch Personal
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="form-group">
                            <input type="file" name="archivo">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Cargar') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
        </div>
    </div>
</form>




@endsection
