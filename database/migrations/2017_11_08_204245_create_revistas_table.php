<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('fasciculo');
            $table->string('serie');
            $table->enum('ambito',['nacional','internacional']);
            $table->enum('clasificacion',['A1','A2','B','C','No_indexada']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revistas');
    }
}
