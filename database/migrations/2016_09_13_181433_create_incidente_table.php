<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncidenteTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('incidentes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo_incidente',['tecnicoHS','tecnicoRI','admin'])->default('admin');
            $table->text('descripcion_incidente');
            $table->enum('prioridad',['Alta','Media','Baja'])->default('Media');
            $table->enum('estado',['abierto','cerrado'])->default('abierto');
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('incidentes');
    }
}
