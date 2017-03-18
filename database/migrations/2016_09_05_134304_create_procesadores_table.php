<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcesadoresTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('procesadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca_procesador',50);
            $table->string('modelo_procesador',50)->nullable();
            $table->string('capacidad_procesador',20)->nullable();
            $table->string('core_procesador',20)->nullable();
            $table->string('socket_procesador',20)->nullable();
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

        Schema::drop('procesadores');
    }
}
