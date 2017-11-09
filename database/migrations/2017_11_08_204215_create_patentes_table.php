<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_patente');
            $table->enum('via_solicitud',['tradicional','PCT']);
            $table->string('gaceta');
            $table->enum('tipo',['Invencion','Utilidad','Otra']);
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
        Schema::dropIfExists('patentes');
    }
}
