<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <style>
        /* Puedes usar los mismos estilos que en create */
    </style>
</head>
<body>

    <h1>Editar cliente</h1>

    <form method="POST" action="{{ route('clientes.update', $cliente->id_cliente) }}">
        @csrf
        @method('PUT')

        <label>Nombre:</label><br>
        <input type="text" name="nombre_cliente" value="{{ old('nombre_cliente', $cliente->nombre_cliente) }}" required><br><br>

        <label>Apellido paterno:</label><br>
        <input type="text" name="ap_paterno_cliente" value="{{ old('ap_paterno_cliente', $cliente->ap_paterno_cliente) }}" required><br><br>

        <label>Apellido materno:</label><br>
        <input type="text" name="ap_materno_cliente" value="{{ old('ap_materno_cliente', $cliente->ap_materno_cliente) }}"><br><br>

        <label>Último movimiento:</label><br>
        <input type="date" name="ultimo_movimiento" value="{{ old('ultimo_movimiento', $cliente->ultimo_movimiento ? $cliente->ultimo_movimiento->format('Y-m-d') : '') }}"><br><br>

        <button type="submit">Actualizar cliente</button>
    </form>

    <p><a href="{{ route('clientes.index') }}">Volver al listado</a></p>

</body>
</html>
