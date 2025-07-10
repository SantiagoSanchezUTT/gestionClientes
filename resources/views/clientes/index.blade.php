<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; color: blue; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h1>Listado de Clientes</h1>

@if($clientes->count() > 0)
<table>
    <thead>
        <tr>
            <th>Nombre completo</th>
            <th>Último movimiento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nombre_cliente }} {{ $cliente->ap_paterno_cliente }} {{ $cliente->ap_materno_cliente }}</td>
            <td>{{ $cliente->ultimo_movimiento ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('clientes.edit', $cliente->id_cliente) }}">Editar</a> |
                <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No hay clientes registrados.</p>
@endif

</body>
</html>
