<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software', function (Blueprint $table) {
            $table->increments('id');
            $table->string('disponibilidad');
            $table->enum('restringido',['si','no']);
            $table->string('sitio_web');
            $table->string('nombre_comercial');
            $table->enum('enum',['computacional','multimedia','otro']);
            $table->string('certificado_de_registro');
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
        Schema::dropIfExists('software');
    }
}
