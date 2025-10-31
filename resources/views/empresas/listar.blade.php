@extends('layouts.app')
@section('title', 'Empresas')
@section('content')
<div class="row">
    <div class="col-lg-12">
        @section('breadcrumbs')
    {{ Breadcrumbs::render('empresas') }}
@endsection
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                ADMINISTRACIÓN DE LA EMPRESA
                </h2>
                <div class="panel-toolbar">
                    @can('crear-empresa')
                    <a href="{{route('empresa.create')}}" class="btn btn-sm btn-info waves-effect waves-themed">
                        <span> Nueva Empresa</span>
                    </a>
                    @endcan
                </div>
            </div>

        <div class="panel-container show">
            <div class="panel-content">
                <table class="table m-0 table-striped table-sm">
                    <thead class="bg-info-900">

                      <th class="text-center">RUC</th>
                      <th class="text-center">Razón Social</th>
                      <th class="text-center">Ciudad</th>
                      <th class="text-center"></th>
                    </thead>
                    <tbody>
                        @foreach($empresas as $empresa)
                        <tr>
                            <td class="text-center">{{$empresa->ruc}}</td>
                            <td class="text-center">{{$empresa->nombre}}</td>
                            <td class="text-center">{{$empresa->ciudad}}</td>
                            <td class="text-center">
                                {{ link_to_route('persona.show', $title = 'Personal', $parameters = [$empresa->slug], $attributes = ['class' => 'btn btn-xs btn-secondary waves-effect waves-themed']) }}
                                {{ link_to_action('CampanaController@listarCampanas', $title = 'Campañas', $parameters = [$empresa->slug], $attributes = ['class' => 'btn btn-xs btn-primary waves-effect waves-themed']) }}
                                @can('crear-empresa')
                                {{ link_to_route('empresa.edit', $title = 'Editar', $parameters = [$empresa->slug], $attributes = ['class' => 'btn btn-xs btn-outline-secondary waves-effect waves-themed']) }}
                                @endcan

                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
                <br/>
                <div class="pagination justify-content-end">
                    {{ $empresas->appends(Request::only(['ruc']))->setPath('')->render() }}
                </div>

            </div>
        </div>
    </div>

    </div>
</div>

@endsection
