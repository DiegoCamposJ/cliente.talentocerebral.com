@extends('layouts.app')
@section('title', ' Evaluaciones QUAD')
@section('content')

<div class="row">
    <div class="col-lg-12">

        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    EVALUACIONES
                </h2>
                <div class="panel-toolbar">
                    @if($campana->estado == 'PROCESO' && $empresa->estado == 'ACTIVO')                        
                        {{ link_to_action('PersonaController@crearPersona', $title = 'Nuevo Participante', $parameters = [$campana->slug], $attributes = ['class' => 'btn btn-sm btn-info waves-effect waves-themed']) }}
                        &nbsp;
                        {{ link_to_action('PersonaController@asignarPersona', $title = 'Seleccionar Participante', $parameters = [$campana->slug], $attributes = ['class' => 'btn btn-sm btn-secondary waves-effect waves-themed']) }}
                    @endif
                </div>
            </div>
        <div class="panel-container show">
            <div class="panel-content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                            {{ $empresa->nombre }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                            {{ $campana->descripcion }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                            {{ $campana->herramienta }}
                        </div>
                    </div>
                </div>
                <br><br>


                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                    <thead class="bg-info-900">
                      <th class="text-center">Identificacion</th>
                      <th class="text-center">Persona</th>
                      <th class="text-center">Email</th>                      
                      <th class="text-center">F.Inicio</th>
                      <th class="text-center">F.Fin</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Notificaciones</th>
                      <th class="text-center"></th>
                    </thead>
                    <tbody>
                        @foreach($evaluaciones as $evaluacion)
                        <tr>
                            <td class="text-center">{{$evaluacion->identificacion}}</td>
                            <td class="text-left">{{$evaluacion->apellido . ' ' . $evaluacion->nombre }}</td>
                            <td class="text-center">{{$evaluacion->email}}</td>                            
                            <td class="text-center">{{$evaluacion->f_inicio}}</td>
                            <td class="text-center">{{$evaluacion->f_fin}}</td>
                            <td class="text-center">{{$evaluacion->estado}}</td>
                            <td class="text-center">{{$evaluacion->cnt_email}}</td>

                            @if($evaluacion->estado == 'FINALIZADA')
                                <td class="text-center">{{ link_to_route('evaluacion.show', $title = 'Reporte', $parameters = [$evaluacion->slug], $attributes = ['class' => 'btn btn-xs btn-secondary  waves-effect waves-themed']) }}</td>
                            @else
                                @if($evaluacion->estado == 'ABANDONADA' || $evaluacion->estado == 'PROCESO')
                                    <td class="text-center">{{ link_to_route('evaluacion.edit', $title = 'Reiniciar', $parameters = [$evaluacion->slug], $attributes = ['class' => 'btn btn-xs btn-warning  waves-effect waves-themed']) }}</td>
                                @else                                    
                                    <td class="text-center">
                                        
                                            <!-- {{ link_to_action('PersonaController@enviarPassword', $title = 'Nueva Contraseña', $parameters = [$evaluacion->slug], $attributes = ['class' => 'btn btn-xs btn-warning waves-effect waves-themed']) }} -->
                                        
                                    </td>
                                    
                                    
                                @endif
                            @endif

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
<script src="{{ asset('js/datagrid/datatables/datatables.bundle.js')}}"></script>
<script>
    /* demo scripts for change table color */
    /* change background */


    $(document).ready(function()
    {
        $('#dt-basic-example').dataTable(
        {
            responsive: true
        });

        $('.js-thead-colors a').on('click', function()
        {
            var theadColor = $(this).attr("data-bg");
            console.log(theadColor);
            $('#dt-basic-example thead').removeClassPrefix('bg-').addClass(theadColor);
        });

        $('.js-tbody-colors a').on('click', function()
        {
            var theadColor = $(this).attr("data-bg");
            console.log(theadColor);
            $('#dt-basic-example').removeClassPrefix('bg-').addClass(theadColor);
        });

    });

</script>

@stop

