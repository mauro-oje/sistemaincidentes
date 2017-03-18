<?php


// primer tabla "AREAS"

public function up(){
        Schema::create('areas', function (Blueprint $table){
            $table->increments('id');
            $table->string('nombre',100)->unique();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('areas');
    }

//Segunda tabla "OFICINAS"

    public function up(){
        Schema::create('oficinas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero_oficina',60);
            $table->integer('id_area')->unsigned();
            $table->timestamps();

            $table->foreign('id_area')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('oficinas');
    }


//Tercera tabla "TIPOS_USUARIOS"

    public function up(){
        Schema::create('tipos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tipos_usuarios');
    }


// Cuarta tabla "USUARIOS"

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
            $table->string('cuenta')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('id_tipo_usuario')->unsigned();
            $table->integer('id_oficina')->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_tipo_usuario')
                ->references('id')
                ->on('tipo_usuarios')
                ->onDelete('cascade');

            $table->foreign('id_oficina')
                ->references('id')
                ->on('oficinas')
                ->onDelete('cascade');
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


public function up(){
        Schema::create('usuarios', function (Blueprint $table){
            $table->increments('id');
            $table->string('cuenta')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->integer('id_tipo_usuario');
            $table->integer('id_oficina');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_tipo_usuario')
                ->references('id')
                ->on('tipos_usuarios')
                ->onDelete('cascade');
                
            $table->foreign('id_oficina')
                ->references('id')
                ->on('oficinas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('usuarios');
    }

//Quinda tabla EQUIPOS

public function up(){
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo_equipo');
            $table->string('nombre');
            $table->string('so');
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();

            $table->foreign('id_usuario')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipos');
    }

    //Sexta tabla IP

    public function up(){
        Schema::create('ip', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('id_equipo')->unsigned();
            $table->timestamps();

            $table->foreign('id_equipo')
                ->references('id')
                ->on('equipos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ip');
    }

    //Septima tabla SISTEMAS_OPERATIVOS

    public function up()
    {
        Schema::create('sistemas_operativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_so',180);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sistemas_operativos');
    }


//8° tabla PLACAS MADRES.

class CrearTablaPlacasMadres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placas_madres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca');
            $table->string('modelo');
            $table->string('version')->nullable();
            $table->boolean('disponible');
            $table->integer('id_equipo')->unsigned();
            $table->timestamps();

            $table->foreign('id_equipo')
                ->references('id')
                ->on('equipos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('placas_madres');
    }
}

//9° tabla PLACAS_MADRES_MARCAS

class CrearTablaPlacasMadresMarcas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placas_madres_marcas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_marca',150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('placas_madres_marcas');
    }
}

//10° tabla MEMORIAS_RAM

class CrearTablaMemoriasRam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('memorias_ram', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',80);
            $table->string('marca',100);
            $table->integer('capacidad');
            $table->string('unidad_medida',60);
            $table->integer('frecuencia');
            $table->boolean('disponible');
            $table->integer('id_equipo')->unsigned();
            $table->timestamps();

            $table->foreign('id_equipo')
                ->references('id')
                ->on('equipos')
                ->onDelete('cascade');
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

// 11° TABLA TIPO DE MEMORIAS CAPACIDAD

class CrearTablaTipoMemoriasCapacidades extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_memorias_capacidades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero_capacidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('tipo_memorias_capacidades');
    }
}


// 12° TABLA NOMBRES UNIDADES MEMORIAS DISCOS

class CrearTablaNombresUnidadesMemoriasDiscos extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('nombres_unidades_memorias_discos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_capacidad',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('nombres_unidades_memorias_discos');
    }
}


// 13° TABLA TIPO DE INTERFACES DISCOS

class CrearTablaTiposInterfacesDiscos extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tipos_interfaces_discos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_interfaz',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('tipos_interfaces_discos');
    }
}

// 14° TABLA TIPOS DISCOS

class CrearTablaTiposDiscos extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tipos_discos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_disco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('tipos_discos');
    }
}


// 15° TABLA TIPOS DISCOS CAPACIDADES

class CraetTablaTiposDiscosCapacidades extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tipos_discos_capacidades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero_capacidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('tipos_discos_capacidades');
    }
}

//16° TABLA FUENTE

class CrearTablaFuentes extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('fuentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('marca',50);
            $table->string('capacidad');
            $table->integer('equipo_id')->unsigned();

            $table->foreign('equipo_id')
                ->references('id')
                ->on('equipos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('fuentes');
    }
}

// 17° TABLA FUENTE MARCA

class CrearTablaFuentesMarcas extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('fuentes_marcas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_marca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('fuentes_marcas');
    }
}


// 18° TABLA DE IMPRESORAS MARCAS

class CrearTablaImpresorasMarcas extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('impresoras_marcas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_marca');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('impresoras_marcas');
    }
}


//19° TABLA DE TIPOS DE IMPRESORAS.

class CrearTablaTiposImpresoras extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tipos_impresoras', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_impresora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('tipos_impresoras');
    }
}

// 20° TABLA DE IMPRESORAS.

class CrearTablaImpresoras extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('impresoras', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $tabla->string('marca');
            $table->string('modelo');
            $table->string('tipo_impresora');
            $table->integer('equipo_id')->unsigned();

            $table->foreign('equipo_id')
                ->references('id')
                ->on('equipos')
                ->onDelete('cascade');
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


// 21° TABLA TIPO DE INCIDENTES

class CrearTablaTiposIncidentes extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tipos_incidentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_incidente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('tipos_incidentes');
    }
}


// 22° TABLA DE INCIDENTES

class CrearTablaIncidentes extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('incidentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_incidente');
            $table->date('fecha');
            $table->longText('descripcion');
            $table->integer('usuario_id')->unsigned();

            $table->foreign('usuario_id')
                ->references('id')
                ->on('usuarios')
                ->onDelete('cascade');

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



// 23° TABLA DE COMENTARIOS DE INCIDENTES.

class CrearTablaComentariosIncidentes extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('comentarios_incidentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('comentario');
            $table->integer('incidente_id')->unsigned();

            $table->foreign('incidente_id')
                ->references('id')
                ->on('incidentes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('comentarios_incidentes');
    }
}



// 24° TABLA DE IMAGENES

class CrearTablaImagenes extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('imagenes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->integer('incidente_id')->unsigned();

            $table->foreign('incidente_id')
                ->references('id')
                ->on('incidentes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop('imagenes');
    }
}



     ?>