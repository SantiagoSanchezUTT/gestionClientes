@extends('layouts.app')

@section('title', 'Registrar Cliente')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #f5eee6, #fffdf9);
        min-height: 100vh;
        padding: 40px 20px;
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container {
        max-width: 900px;
        margin: auto;
    }

    .form-card {
        background: #fff9f0;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(80, 50, 20, 0.15);
        border: 1px solid #e3cbb2;
    }

    .form-title {
        font-weight: 700;
        color: #5d3a00;
        text-align: center;
        margin-bottom: 30px;
        font-size: 2.2rem;
    }

    .section-title {
        border-left: 5px solid #a0522d;
        padding-left: 10px;
        margin: 30px 0 15px;
        font-size: 1.25rem;
        color: #7b3f00;
        font-weight: 600;
    }

    label {
        font-weight: 600;
        color: #3e2c1c;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #c7b299;
        padding: 10px;
        font-size: 14px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #a0522d;
        box-shadow: 0 0 5px rgba(160, 82, 45, 0.3);
    }

    .btn-success {
        background-color: #a0522d;
        border: none;
        font-size: 1.1rem;
        padding: 12px;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #86411b;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="form-container">
    <div class="form-card">
        <h1 class="form-title">Registro de Clientes</h1>

        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf

            <!-- Datos del cliente -->
            <div class="section-title">Datos Personales</div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre_cliente" id="nombre" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="ap_paterno_cliente">Apellido Paterno:</label>
                    <input type="text" name="ap_paterno_cliente" id="ap_paterno_cliente" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="ap_materno_cliente">Apellido Materno:</label>
                    <input type="text" name="ap_materno_cliente" id="ap_materno_cliente" class="form-control">
                </div>
            </div>

            <!-- Dirección -->
            <div class="section-title">Dirección</div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="calle">Calle:</label>
                    <input type="text" name="calle" id="calle" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="colonia">Colonia:</label>
                    <input type="text" name="colonia" id="colonia" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="num_ext">Número Exterior:</label>
                    <input type="text" name="num_ext" id="num_ext" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="num_int">Número Interior:</label>
                    <input type="text" name="num_int" id="num_int" class="form-control">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="cp">C.P.:</label>
                    <input type="text" name="cp" id="cp" class="form-control">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="estado">Estado:</label>
                    <input type="text" name="estado" id="estado" class="form-control">
                </div>
            </div>

            <!-- Contacto -->
            <div class="section-title">Contacto</div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tipo_contacto">Tipo de Contacto:</label>
                    <select name="tipo_contacto" id="tipo_contacto" class="form-select" required>
                        <option value="">-- Selecciona --</option>
                        <option value="Email">Email</option>
                        <option value="Teléfono">Teléfono</option>
                        <option value="WhatsApp">WhatsApp</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="info_contacto">Información de Contacto:</label>
                    <input type="text" name="info_contacto" id="info_contacto" class="form-control" required>
                </div>
            </div>

            <!-- Categoría -->
            <div class="section-title">Categoría del Cliente</div>
            <div class="mb-4">
                <select name="id_cat_cliente" id="id_cat_cliente" class="form-select" required>
                    <option value="">-- Selecciona --</option>
                    <option value="1">Frecuente</option>
                    <option value="2">Nuevo</option>
                    <option value="3">Mayorista</option>
                </select>
            </div>

            <!-- Botón -->
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg">Registrar Cliente</button>
            </div>
        </form>
    </div>
</div>
@endsection

