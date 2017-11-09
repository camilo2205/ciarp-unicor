<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObrasArtisticasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obras_artisticas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tecnica_o_formato');
            $table->string('ISMN');
            $table->enum('tipo',['Original','Apoyo','Interpretacion','Otro']);
            $table->enum('area_conocimiento',['Ciencias_naturales','Ingenieria_tecnologia','Ciencias_medicas','Ciencias_agricolas','Ciencias_sociales','Humanidades','otra']);
            $table->enum('ambito',['Internacional','Nacional']);
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('obras_artisticas');
    }
}
