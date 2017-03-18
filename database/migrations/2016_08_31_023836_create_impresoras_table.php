<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpresorasTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('impresoras', function (Blueprint $table){
            $table->increments('id');
            $table->string('marca_impresora',20);
            $table->string('modelo_impresora',20)->nullable();
            $table->string('tipo_impresora',30)->nullable();
            $table->string('direccion_ip',20)->nullable();
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

        Schema::drop('impresoras');
    }
}
