<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha');
            $table->enum('tipo',['bonificacion','punto']);
            $table->enum('estado',['aprobada','radicada','no_aprobada','pendiente']);
            $table->integer('puntos')->unsigned();
            $table->string('resolucion');
            $table->integer('cantidad_autores')->unsigned();
            $table->integer('ciudad_id')->unsigned();
            $table->timestamps();
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
