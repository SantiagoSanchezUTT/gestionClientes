<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('id_cliente'); // Usa el mismo nombre que el modelo espera

            $table->string('nombre_cliente');
            $table->string('ap_paterno_cliente');
            $table->string('ap_materno_cliente')->nullable();
            $table->date('ultimo_movimiento')->nullable();

            $table->unsignedBigInteger('id_contacto')->nullable();
            $table->unsignedBigInteger('id_direccion')->nullable();
            $table->unsignedBigInteger('id_cat_cliente')->nullable();

            // Elimina timestamps si no los usas
            // $table->timestamps();

            // Llaves foráneas si ya existen las tablas relacionadas
            $table->foreign('id_contacto')
                ->references('id_contacto')
                ->on('contactos')
                ->onDelete('cascade');

            $table->foreign('id_direccion')
                ->references('id_direccion')
                ->on('direcciones')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
