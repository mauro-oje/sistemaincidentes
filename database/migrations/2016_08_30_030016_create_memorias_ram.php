<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoriasRam extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('memorias_ram', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_memoria',20);
            $table->string('marca_memoria',50);
            $table->string('capacidad_memoria',20);
            $table->string('frecuencia',10)->nullable();
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
        Schema::drop('memorias_ram');
    }
}
