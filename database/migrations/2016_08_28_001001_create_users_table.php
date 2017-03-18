<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',30)->unique();
            $table->enum('tipo',['admin','miembro','tecnicoHS','tecnicoRI'])->default('miembro');
            $table->string('name',30);
            $table->string('apellido',30);
            $table->string('email')->unique();
            $table->string('password',60);
            $table->rememberToken();
            $table->integer('oficina_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('oficina_id')
                ->references('id')
                ->on('oficinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){

        Schema::drop('users');
    }
}
