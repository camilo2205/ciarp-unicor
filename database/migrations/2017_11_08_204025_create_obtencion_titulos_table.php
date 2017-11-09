<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObtencionTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obtencion_titulos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('validado',['si','no']);
            $table->enum('metodologia',['virtual','distancia','presencial']);
            $table->enum('tipo',['Especialización','Maestría','Doctorado','Post-doctorado']);
            $table->string('nombre_acta');
            $table->integer('producto_id')->unsigned();
            $table->integer('universidad_id')->unsigned();
            $table->timestamps();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('universidad_id')->references('id')->on('universidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obtencion_titulos');
    }
}
