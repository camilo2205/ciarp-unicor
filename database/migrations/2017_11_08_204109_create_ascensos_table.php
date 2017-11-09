<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAscensosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ascensos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('ascenso',['auxiliar','asistente','asociado','titular']);
            $table->enum('area_conocimiento',['Ciencias_naturales','Ingenieria_tecnologia','Ciencias_medicas','Ciencias_agricolas','Ciencias_sociales','Humanidades','otra']);
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
        Schema::dropIfExists('ascensos');
    }
}
