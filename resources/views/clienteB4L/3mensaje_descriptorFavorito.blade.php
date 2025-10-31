@extends('layouts.app')

@section('title', 'Evaluación')

@section('content')

<div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    CEREBRO 360
                </h2>
            </div>

            <div class="panel-container show">
                <div class="panel-content">

                 <span>
                     <strong>
                        Entre la siguiente lista de adjetivos, seleccione el que mejor describa su personalidad.  <br><br>
                     </strong>
                 </span>
                 <br><br>
                 <div class="text-center">
                    {{-- {{ link_to_route('evaluacion', $title = 'Aceptar', $parameters = [], $attributes = ['class' => 'btn btn-secondary waves-effect waves-themed']) }} --}}
                    {{ link_to_action('EvaluacionController@preguntasEvaluacion', $title = 'Aceptar', $parameters = [$slugEvaluacion], $attributes = ['class' => 'btn btn-secondary waves-effect waves-themed']) }}
                </div>


                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
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



