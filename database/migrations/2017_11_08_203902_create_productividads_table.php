<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductividadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productividads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->date('fecha');
            $table->string('radicado');
            $table->integer('docente_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
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
        Schema::dropIfExists('productividads');
    }
}
