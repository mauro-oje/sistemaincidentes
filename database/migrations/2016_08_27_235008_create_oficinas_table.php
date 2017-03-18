<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('oficina',60)->unique();
            $table->integer('area_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('area_id')
                ->references('id')
                ->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        
        Schema::drop('oficinas');
    }
}
