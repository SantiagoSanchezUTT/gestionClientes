@extends('adminlte::page')

@section('title', 'Listado de Clientes')

@section('content_header')
    <h1>Clientes registrados</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body table-responsive p-0">
        @if($clientes->count() > 0)
        <table class="table table-hover table-bordered text-nowrap">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre completo</th>
                    <th>Dirección</th>
                    <th>Tipo de Cliente</th>
                    <th>Contacto</th>
                    <th>Último movimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre_cliente }} {{ $cliente->ap_paterno_cliente }} {{ $cliente->ap_materno_cliente }}</td>
                    <td>
                        {{ $cliente->direccion->calle ?? '' }},
                        {{ $cliente->direccion->colonia ?? '' }},
                        {{ $cliente->direccion->cp ?? '' }},
                        {{ $cliente->direccion->estado ?? '' }}
                    </td>
                    <td>{{ $cliente->categoria->descripcion ?? 'N/A' }}</td>
                    <td>{{ $cliente->contacto->info_contacto ?? 'N/A' }}</td>
                    <td>{{ $cliente->ultimo_movimiento ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id_cliente) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-center m-3">No hay clientes registrados.</p>
        @endif
    </div>
</div>
@stop

@section('css')
{{-- No necesitas CSS extra aquí, AdminLTE ya incluye los estilos --}}
@stop

@section('js')
<script>
    console.log("Listado de clientes cargado correctamente.");
</script>
@stop
