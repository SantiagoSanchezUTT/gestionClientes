<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id('id_direccion');
            $table->string('calle');
            $table->string('colonia');
            $table->string('num_ext')->nullable();
            $table->string('num_int')->nullable();
            $table->string('estado')->nullable();
            $table->string('cp')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
