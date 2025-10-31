@extends('layouts.app')

@section('title', 'Personal')
@include('alerts.danger')
@include('alerts.errors')


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                        ADMINISTRACIÓN DEL PERSONAL
                </h2>
                <div class="panel-toolbar">
                    {{ link_to_action('PersonaController@crearPersona', $title = 'Nueva Persona', $parameters = [$empresa_slug], $attributes = ['class' => 'btn btn-sm btn-info waves-effect waves-themed']) }}
                            &nbsp;
                   {{ link_to_action('PersonaController@batchPersonas', $title = 'Carga Batch', $parameters = [$empresa_slug], $attributes = ['class' => 'btn btn-sm btn-secondary waves-effect waves-themed']) }}
                </div>
            </div>

        <div class="panel-container show">
            <div class="panel-content">
                <div class="text-center fs-xl fw-900 color-primary-600 keep-print-font pt-1 l-h-n m-0">
                    {{ $empresaNombre }}
                </div>
                <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                    <thead class="bg-info-900">

                      <th class="text-center">ID</th>
                      <th class="text-center">Nombres</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center"></th>
                    </thead>
                    <tbody>
                        @foreach($personas as $persona)
                        <tr>
                            <td class="text-center">{{$persona->identificacion}}</td>
                            <td class="text-left">{{$persona->nombre}}</td>
                            <td class="text-left">{{$persona->email}}</td>
                            <td class="text-center">{{$persona->estado}}</td>
                            <td class="text-center">
                                {{-- @can('crear-empresa')
                                {{ link_to_route('empresa.edit', $title = 'Editar', $parameters = [$empresa->slug], $attributes = ['class' => 'btn btn-xs btn-secondary waves-effect waves-themed']) }}
                                @endcan

                                {{ link_to_action('CampanaController@listarCampanas', $title = 'Personal', $parameters = [$empresa->slug], $attributes = ['class' => 'btn btn-xs btn-secondary waves-effect waves-themed']) }}
                                {{ link_to_action('CampanaController@listarCampanas', $title = 'Campañas', $parameters = [$empresa->slug], $attributes = ['class' => 'btn btn-xs btn-secondary waves-effect waves-themed']) }} --}}

                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
                <br/>
                {{-- <div class="pagination justify-content-end">
                    {{ $personas->appends(Request::only(['identificacion']))->setPath('')->render() }}
                </div> --}}

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
