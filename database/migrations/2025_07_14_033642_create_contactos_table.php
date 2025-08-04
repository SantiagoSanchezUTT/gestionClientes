<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id('id_contacto');
            $table->integer('consecutivo')->default(1); // Evita errores de valor faltante
            $table->string('tipo_contacto');
            $table->string('info_contacto');
        });
    }

    public function down()
    {
        Schema::dropIfExists('contactos');
    }
}
