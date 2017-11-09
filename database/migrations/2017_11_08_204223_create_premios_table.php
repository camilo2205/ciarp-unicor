<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premios', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('ambito',['Internaional','Nacional']);
            $table->enum('tipo',['Condecoracion','otros']);
            $table->enum('reconocimiento_int',['si','no']);
            $table->enum('puesto',['primero','segundo','tercero']);
            $table->integer('institucion_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
            $table->foreign('institucion_id')->references('id')->on('instituciones')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premios');
    }
}
