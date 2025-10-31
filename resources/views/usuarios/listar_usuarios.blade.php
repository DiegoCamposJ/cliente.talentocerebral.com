@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div id="panel-2" class="panel">
            <div class="panel-hdr">
                <h2>
                    USUARIOS DEL SISTEMA
                </h2>
                <div class="panel-toolbar">
                    @can('crear-usuario')
                    <a href="{{route('usuario.create')}}" class="btn btn-sm btn-info waves-effect waves-themed">
                        <span> Nuevo Usuario</span>
                    </a>
                    @endcan
                </div>
            </div>

        <div class="panel-container show">
            <div class="panel-content">
                <table class="table m-0 table-striped table-sm">
                    <thead class="bg-info-900">
                      <th class="text-center">Nombre</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Empresa</th>
                      <th class="text-center">Estado</th>
                      <th class="text-center">Rol</th>
                      <th class="text-center"></th>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                        <tr>
                            <td class="text-center">{{$usuario->name}}</td>
                            <td class="text-center">{{$usuario->email}}</td>
                            <td class="text-center">{{$usuario->nombreEmpresa}}</td>
                            <td class="text-center">{{$usuario->estado}}</td>
                            <td class="text-center">{{ Str::upper($usuario->rol) }}</td>
                            <td class="text-center">
                                {{-- {{ link_to_route('usuario.edit', $title = 'Editar', $parameters = [$usuario->id], $attributes = ['class' => 'btn btn-xs btn-secondary  waves-effect waves-themed']) }} --}}
                                {{ link_to_route('usuario.show', $title = 'Contraseña', $parameters = [$usuario->id], $attributes = ['class' => 'btn btn-xs btn-warning  waves-effect waves-themed']) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br />
                <div class="pagination justify-content-end">
                    {{ $usuarios->appends(Request::only(['id']))->setPath('')->render() }}
                </div>

            </div>
        </div>
    </div>

    </div>
</div>

@endsection
