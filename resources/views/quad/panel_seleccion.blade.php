@extends('layouts.app')
@section('title', ' Resultados QUAD')
@section('content')

<div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    Reportes
                </h2>                
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8">                                
                        
                            @if($evaluacion->herramienta_id == 1)                                
                                @if($evaluacion->demo == 'NO')
                                    {{ link_to_action('EvaluacionController@tipoReporteQUAD', $title = 'QUAD', $parameters = [$slugEvaluacion, 1], $attributes = [ 'class' => 'btn btn-secondary btn-pills btn-block waves-effect waves-themed']) }}
                                    <br><br>
                                    {{ link_to_action('EvaluacionController@tipoReporteQUAD', $title = 'QUAD Ejecutivo', $parameters = [$slugEvaluacion,2], $attributes = ['class' => 'btn btn-info btn-pills btn-block waves-effect waves-themed']) }}
                                    @if($evaluacion->b4l == 'SI')                                
                                        <br><br>
                                        {{ link_to_action('EvaluacionController@tipoReporteQUAD', $title = 'Comparativa Cargo ', $parameters = [$slugEvaluacion,5], $attributes = ['class' => 'btn btn-warning btn-pills btn-block waves-effect waves-themed']) }}
                                    @endif
                                @else
                                    {{ link_to_action('EvaluacionController@tipoReporteQUAD', $title = 'QUAD DEMO', $parameters = [$slugEvaluacion, 3], $attributes = [ 'class' => 'btn btn-secondary btn-pills btn-block waves-effect waves-themed']) }}
                                @endif                                    
                            @endif                           
                            
                            @if($evaluacion->herramienta_id == 4)
                                <br><br>
                                {{ link_to_action('EvaluacionController@tipoReporteQUAD', $title = 'QUADCITO ', $parameters = [$slugEvaluacion,4], $attributes = ['class' => 'btn btn-warning btn-pills btn-block waves-effect waves-themed']) }}
                            @endif
                                
                            
                        </div>
                        <div class="col-sm-2">
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
    </div>
</div>

@stop


