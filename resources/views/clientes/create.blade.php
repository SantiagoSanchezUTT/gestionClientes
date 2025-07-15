
@extends('adminlte::page')

@section('title', 'Registro de Cliente')

@section('content_header')
<h1>Registro del Cliente</h1>
@stop

@section('content')
<form action="{{ route('clientes.store') }}" method="POST">
    @csrf

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Datos del Cliente</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="nombre_cliente">Nombre:</label>
                <input type="text" class="form-control" name="nombre_cliente" required>
            </div>

            <div class="form-group">
                <label for="ap_paterno_cliente">Apellido paterno:</label>
                <input type="text" class="form-control" name="ap_paterno_cliente" required>
            </div>

            <div class="form-group">
                <label for="ap_materno_cliente">Apellido materno:</label>
                <input type="text" class="form-control" name="ap_materno_cliente">
            </div>
            <!-- 
            <div class="form-group">
                <label for="ultimo_movimiento">Último movimiento:</label>
                <input type="date" class="form-control" name="ultimo_movimiento"> -->
        </div>
    </div>
    </div>

    <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Contacto</h3>
    </div>
    <div class="card-body">

        {{-- Select para tipo de contacto --}}
        <div class="form-group">
            <label for="tipo_contacto">Tipo de contacto:</label>
            <select name="tipo_contacto" id="tipo_contacto" class="form-control" required>
                <option value="">-- Selecciona un tipo de contacto --</option>
                <option value="telefono">Teléfono</option>
                <option value="correo">Correo electrónico</option>
                <option value="red_social">Red social</option>
            </select>
        </div>

        {{-- Input para teléfono --}}
        <div class="form-group" id="telefono_input" style="display: none;">
            <label for="telefono">Teléfono:</label>
            <input type="tel" class="form-control" maxlength="10" name="telefono" placeholder="Ej: 5512345678">
        </div>

        {{-- Input para correo --}}
        <div class="form-group" id="correo_input" style="display: none;">
            <label for="correo">Correo electrónico:</label>
            <input type="email" class="form-control" name="correo" placeholder="Ej: ejemplo@correo.com">
        </div>

        {{-- Input para red social --}}
        <div class="form-group" id="red_social_input" style="display: none;">
            <label for="red_social">Red social:</label>
            <input type="text" class="form-control" name="red_social" placeholder="Ej: @usuario">
        </div>

    </div>
</div>


    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Dirección</h3>
        </div>
        <div class="card-body row">
            <div class="form-group col-md-6">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" name="calle">
            </div>

            <div class="form-group col-md-6">
                <label for="colonia">Colonia:</label>
                <input type="text" class="form-control" name="colonia">
            </div>

            <div class="form-group col-md-6">
                <label for="numero">Número Interior:</label>
                <input type="number" class="form-control" name="num_int">
            </div>

            <div class="form-group col-md-6">
                <label for="numero">Número Exterior:</label>
                <input type="number" class="form-control" name="num_ext">
            </div>

            <div class="form-group col-md-6">
                <label for="cp">Código Postal:</label>
                <input type="number" class="form-control" name="cp">
            </div>

            <div class="form-group col-md-6">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado">
            </div>
        </div>
    </div>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Categoría del cliente</h3>
        </div>
        <div class="card-body">

            <div class="form-group">
                <label for="nombre_categoria">Tipo de Cliente:</label>
                <select name="id_cat_cliente" id="">
                    <option value="">-- Selecciona una categoría --</option>
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_cat_cliente }}">
                        {{ $categoria->descripcion }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="text-center mt-3 mb-4">
        <button type="submit" class="btn btn-primary btn-lg">Guardar cliente</button>
    </div>
</form>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipoContacto = document.getElementById('tipo_contacto');

        const telefonoInput = document.getElementById('telefono_input');
        const correoInput = document.getElementById('correo_input');
        const redSocialInput = document.getElementById('red_social_input');

        tipoContacto.addEventListener('change', function () {
            // Oculta todos
            telefonoInput.style.display = 'none';
            correoInput.style.display = 'none';
            redSocialInput.style.display = 'none';

            // Muestra el correspondiente
            switch (this.value) {
                case 'telefono':
                    telefonoInput.style.display = 'block';
                    break;
                case 'correo':
                    correoInput.style.display = 'block';
                    break;
                case 'red_social':
                    redSocialInput.style.display = 'block';
                    break;
            }
        });
    });
</script>
@stop
