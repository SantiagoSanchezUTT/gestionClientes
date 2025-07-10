<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Cliente</title>
    <style>
        /* Igual estilo que quieras */
    </style>
</head>
<body>

    <h1>Agregar nuevo cliente</h1>

    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf
        <label>Nombre:</label><br>
        <input type="text" name="nombre_cliente" required><br><br>

        <label>Apellido paterno:</label><br>
        <input type="text" name="ap_paterno_cliente" required><br><br>

        <label>Apellido materno:</label><br>
        <input type="text" name="ap_materno_cliente"><br><br>

        <label>Último movimiento:</label><br>
        <input type="date" name="ultimo_movimiento"><br><br>

        <button type="submit">Guardar cliente</button>
    </form>

    <p><a href="{{ route('clientes.index') }}">Volver al listado</a></p>

</body>
</html>
