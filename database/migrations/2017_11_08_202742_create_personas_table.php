<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('correo',100)->unique();
            $table->string('telefono');
            $table->string('dni');
            $table->string('contrasena');
            $table->enum('tipo_dni',['cc','de','ce','ti','ps','ca']);
            $table->enum('rol',['profesor','admin','par','secretaria']);
            $table->enum('estado',['activo','inactivo']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
