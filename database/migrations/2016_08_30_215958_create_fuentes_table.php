<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuentesTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('fuentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca_fuente',50);
            $table->string('modelo_fuente',50)->nullable();
            $table->string('capacidad_fuente',10);
            $table->enum('disponible',['si','no'])->default('si');
            $table->integer('equipo_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('equipo_id')
                ->references('id')
                ->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('fuentes');
    }
}
