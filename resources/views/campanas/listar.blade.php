@extends('layouts.app')

@section('title', 'Empresas')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    CAMPAÑAS REGISTRADAS
                </h2>
                <div class="panel-toolbar">
                    @can('crear-campana')
                    {{ link_to_action('CampanaController@crearCampanas', $title = 'Nueva Campaña', $parameters = [$empresa->slug], $attributes = ['class' => 'btn btn-sm btn-info waves-effect waves-themed']) }}
                    @endcan
                </div>
            </div>
        <div class="panel-container show">
            <div class="panel-content">
                <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                    {{ $empresa->nombre }}
                </div>
                <br>
                <table class="table m-0 table-striped table-sm">
                    <thead class="bg-info-900">

                      <th class="text-center">Campaña</th>
                      <th class="text-center">Herramienta</th>
                      <th class="text-center">No. Participantes</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center"></th>
                    </thead>
                    <tbody>
                        @foreach($campanas as $campana)
                        <tr>
                            <td class="text-center">{{$campana->descripcion}}</td>
                            <td class="text-center">{{$campana->herramienta}}</td>
                            <td class="text-center">{{$campana->participantes}}</td>
                            <td class="text-center">{{$campana->estado}}</td>
                            @if($campana->estado == 'NUEVA')
                                <td class="text-center">
                                    {{ link_to_action('EvaluacionController@crearEvaluaciones', $title = 'Notificar', $parameters = [$campana->slug], $attributes = ['class' => 'btn btn-xs btn-warning waves-effect waves-themed']) }}
                                </td>
                            @else
                                <td class="text-center">
                                    {{ link_to_action('EvaluacionController@listarEvaluaciones', $title = 'Evaluaciones', $parameters = [$campana->slug], $attributes = ['class' => 'btn btn-xs btn-secondary waves-effect waves-themed']) }}
                                </td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br/>
                <div class="pagination justify-content-end">
                    {{ $campanas->appends(Request::only(['id']))->setPath('')->render() }}
                </div>

            </div>
        </div>
    </div>

    </div>
</div>

@endsection
