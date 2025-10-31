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
                        <th class="text-center">Campaña</th>
                        <th class="text-center">Evaluacion</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">F.Inicio</th>
                        <th class="text-center">F.Fin</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
                        </thead>
                        <tbody>                        
                        <tr>
                            <td class="text-center">{{$evaluacion->campana}}</td>
                            <td class="text-center">{{$evaluacion->nombre}}</td>
                            <td class="text-center">{{$evaluacion->estado}}</td>
                            <td class="text-center">{{$evaluacion->f_inicio}}</td>
                            <td class="text-center">{{$evaluacion->f_fin}}</td>
                            <td class="text-center">
                                @if(($evaluacion->estado == 'PENDIENTE' || $evaluacion->estado == 'PROCESO') && $evaluacion->cliente != 'APP')                            
                                    {{ link_to_route('evaluacion.show', $title = 'Continuar', $parameters = [$evaluacion->slug], $attributes = ['class' => 'btn btn-xs btn-secondary  waves-effect waves-themed']) }} 
                                @endif
                            </td>
                            <td class="text-center">
                                @if($evaluacion->estado == 'FINALIZADA' && $evaluacion->visible == 'SI') 
                                    {{ link_to_action('EvaluacionController@showTest', $title = 'Resultados', $parameters = [$evaluacion->slug], $attributes = ['class' => 'btn btn-xs btn-primary waves-effect waves-themed']) }}
                                @endif                                
                            </td>                            
                        </tr>
                        
                        @foreach($evaluacionesB4L as $evaluacionB4L)
                        <tr>
                            <td class="text-center">Levantamiento de Cargo</td>                            
                            <td class="text-center">{{ $evaluacionB4L->nombre_cargo}}</td>
                            <td class="text-center">{{$evaluacionB4L->estado}}</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                @if(($evaluacionB4L->estado == 'PENDIENTE' || $evaluacionB4L->estado == 'PROCESO') && $evaluacionB4L->cliente != 'APP')                            
                                    {{ link_to_route('evaluacionB4L.show', $title = 'Continuar', $parameters = [$evaluacionB4L->slug], $attributes = ['class' => 'btn btn-xs btn-secondary  waves-effect waves-themed']) }}                            
                                @endif
                            </td>
                            <td class="text-center">
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    
                    

                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')

<script>
    $(window).on('beforeunload', function(){
        
        $('#pageLoader').show();

    });

    $(function () {

        $('#pageLoader').hide();
    })
</script>

@stop



