<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscosDurosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('discos_duros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_disco',20);
            $table->string('marca_disco',50);
            $table->string('modelo_disco',50)->nullable();
            $table->string('capacidad_disco',20);
            $table->string('interface',20);
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

        Schema::drop('discos_duros');
    }
}
