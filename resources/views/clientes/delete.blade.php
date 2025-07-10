<form method="POST" action="{{ route('clientes.destroy', $cliente->id_cliente) }}" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('¿Seguro que deseas eliminar este cliente?')">Eliminar</button>
</form>
