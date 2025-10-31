@extends('layouts.app')
@section('title', 'Evaluación')
@section('content')


<div class="row">
    <div class="col-lg-12">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    TUS EVALUACIONES
                </h2>
            </div>

            <div class="panel-container show">
                <div class="panel-content">
                    <table class="table m-0 table-striped table-sm">
                        <thead class="bg-info-900">
                        <th class="text-center">Evaluacion</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Dispositivo</th>
                        <th class="text-center"></th>
                        </thead>
                        <tbody>
                        @foreach($evaluaciones as $evaluacion)
                        <tr>
                            <td class="text-center">{{$evaluacion->nombre}}</td>
                            <td class="text-center">{{$evaluacion->estado}}</td>
                            <td class="text-center">{{$evaluacion->cliente}}</td>

                            @if(($evaluacion->estado == 'PENDIENTE' || $evaluacion->estado == 'PROCESO') && $evaluacion->cliente != 'APP')
                            <td class="text-center">
                                {{ link_to_route('evaluacion.show', $title = 'Continuar', $parameters = [$evaluacion->slug], $attributes = ['class' => 'btn btn-xs btn-secondary  waves-effect waves-themed']) }}
                            </td>
                            @endif
                            @if($evaluacion->estado == 'FINALIZADA' && $evaluacion->cliente != 'APP')
                            <td class="text-center">                                
                                {{ link_to_action('EvaluacionController@showTest', $title = 'Reporte', $parameters = [$evaluacion->slug], $attributes = ['class' => 'btn btn-xs btn-primary waves-effect waves-themed']) }}
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    <br />
                    <div class="pagination justify-content-end">
                        {{ $evaluaciones->appends(Request::only(['id']))->setPath('')->render() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
