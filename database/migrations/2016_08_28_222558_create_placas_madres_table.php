<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacasMadresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('placas_madres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca_placa',50);
            $table->string('modelo_placa',50)->nullable();
            $table->string('version',20)->nullable();
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
        
        Schema::drop('placas_madres');
    }
}
