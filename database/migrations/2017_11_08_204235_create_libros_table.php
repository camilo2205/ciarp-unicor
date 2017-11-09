<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ISBN');
            $table->integer('pagina_inicial')->unsigned();
            $table->integer('pagina_final')->unsigned();
            $table->enum('medio_divulgacion',['papel','electronico']);
            $table->enum('ambito_divulgacion',['Internacional','Nacional','Regional']);
            $table->enum('clasificacion',['Libro','Capitulo','Traduccion']);
            $table->enum('tipo',['Texto','Ensayo','Investigacion','Otros']);
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
        Schema::dropIfExists('libros');
    }
}
