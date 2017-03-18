<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('ips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion',15)->unique();
            $table->enum('disponible',['si','no'])->default('si');
            $table->integer('equipo_id')->unsigned()->nullable();
            $table->integer('impresora_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('equipo_id')
                ->references('id')
                ->on('equipos');
            $table->foreign('impresora_id')
                ->references('id')
                ->on('impresoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('ips');
    }
}
