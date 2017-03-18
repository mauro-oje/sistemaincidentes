<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comentario')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            //$table->integer('incidente_usuario_id')->unsigned();
            $table->integer('incidente_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('incidente_id')
                ->references('id')
                ->on('incidentes');

            /*
            $table->foreign('incidente_usuario_id')
                ->references('id')
                ->on('incidentes_usuarios');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('comentarios');
    }
}
