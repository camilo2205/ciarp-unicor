<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pagina_inicial')->unsigned();
            $table->integer('pagina_final')->unsigned();
            $table->string('volumen');
            $table->enum('medio_divulgacion',['papel','electronico']);
            $table->string('sitio_web');
            $table->string('DOI')->nullable();
            $table->enum('clasificacion',['A1','A2','B','C','No_indexada']);
            $table->enum('tipo',['completo','corto','editorial','ensayo','reporte_de_caso','revision_de_temas','trabajos', 'otros']);
            $table->integer('revista_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->timestamps();
            $table->foreign('revista_id')->references('id')->on('revistas')->onDelete('cascade');
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
        Schema::dropIfExists('articulos');
    }
}
