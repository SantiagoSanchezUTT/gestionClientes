@extends('layouts.app')

@section('title', 'Registrar Cliente')

@section('content')
<style>
    body {
        background-color: #1cff4d;
        padding: 40px;
    }
    .form-container {
        max-width: 800px;
        margin: auto;
    }
    .form-group {
        margin-bottom: 20px;
    }
    h2, h3 {
        color: #000000;
        margin-bottom: 20px;
    }
    h1{
        color:white;
        margin:30px;
    }
    .card {
        padding: 30px;
        border: 2px solid black;
        border-radius: 15px;
        background-color: #f9f9f9;
    }
    label {
        font-weight: bold;
        color: #198754;
    }
</style>

<div class="form-container">
    <h1 class="text-center">REGISTRO DE CLIENTES</h1>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="card">

            <!-- Datos del cliente -->
            <h3>DATOS PERSONALES</h3>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre_cliente" id="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ap_paterno_cliente">Apellido Paterno:</label>
                <input type="text" name="ap_paterno_cliente" id="ap_paterno_cliente" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="ap_materno_cliente">Apellido Materno:</label>
                <input type="text" name="ap_materno_cliente" id="ap_materno_cliente" class="form-control">
            </div>

            <!-- Dirección -->
            <h3>DIRECCIÓN</h3>
            <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" name="calle" id="calle" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="colonia">Colonia:</label>
                <input type="text" name="colonia" id="colonia" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="num_ext">Número Exterior:</label>
                <input type="text" name="num_ext" id="num_ext" class="form-control">
            </div>

            <div class="form-group">
                <label for="num_int">Número Interior:</label>
                <input type="text" name="num_int" id="num_int" class="form-control">
            </div>

            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" class="form-control">
            </div>

            <div class="form-group">
                <label for="cp">Código Postal:</label>
                <input type="text" name="cp" id="cp" class="form-control">
            </div>

            <!-- Contacto -->
            <h3>CONTACTO</h3>
            <div class="form-group">
                <label for="tipo_contacto">Tipo de Contacto:</label>
                <select name="tipo_contacto" id="tipo_contacto" class="form-select" required>
                    <option value="Email">Email</option>
                    <option value="Teléfono">Teléfono</option>
                    <option value="WhatsApp">WhatsApp</option>
                </select>
            </div>

            <div class="form-group">
                <label for="info_contacto">Información de Contacto:</label>
                <input type="text" name="info_contacto" id="info_contacto" class="form-control" required>
            </div>

            <!-- Categoría -->
            <div class="form-group">
                <label for="id_cat_cliente">Categoría del Cliente:</label>
                <select name="id_cat_cliente" id="id_cat_cliente" class="form-select" required>
                    <option value="">-- Selecciona --</option>
                    <option value="1">Frecuente</option>
                    <option value="2">Nuevo</option>
                    <option value="3">Mayorista</option>
                </select>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-success btn-lg">REGISTRAR CLIENTE</button>
            </div>
        </div>
    </form>
</div>
@endsection
