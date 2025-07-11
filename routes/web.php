<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('dashboard'); // ← ahora carga la vista con AdminLTE
});

Route::resource('clientes', ClienteController::class);