<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('inicio');
});

//Route::get('mail'); ,'middleware' => 'role:admin'

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function(){

    // Esta será nuestra ruta de bienvenida.
    Route::get('admin/usuario/todos-los-usuarios', function(){

        return View::make('admin/usuarios/index_usuarios');

    });

    // Esta ruta nos servirá para cerrar sesión.
    Route::get('logout', 'AuthController@logOut');

});

//    :: RUTAS PARA EL LOGEO AL SISTEMA ::

Route::get('inicio-de-sesion',[
	'uses'	=>	'AuthController@getLogin',
	'as'	=>	'admin.autenticacion.login'
]);

Route::post('inicio-de-sesion',[
	'uses'	=>	'AuthController@postLogin',
	'as'	=>	'admin.autenticacion.loginPost'
]);

Route::get('admin/autenticacion/logout',[
	'uses'	=>	'AuthController@logOut',
	'as'	=>	'admin.autenticacion.logout'
]);

Route::group(['prefix' => 'admin','middleware'=>'auth','middleware' => 'role:admin'],function(){

	//  :: RUTAS PARA LOS USUARIOS ::

	Route::get('usuario/listado-de-usuarios',[
		'uses'	=>	'UserController@listar_usuarios',
		'as'	 =>	'usuario.listar'
	]);

	/*
	Route::get('usuario/listado-usuarios-ajax',[
		'uses'	=>	'UserController@listadoUsuariosAjax',
		'as'	 =>	'usuario.listado.ajax'
	]);
	*/

	Route::get('usuario/registrar-usuario',[
		'uses'	=>	'UserController@create',
		'as'	=>	'user.crear'
	]);

	Route::get('usuario/{id}',[
		'uses'	=>	'UserController@show',
		'as'	=>	'user.show'
	]);

	/*
	Route::get('crear-usuario',[
		'uses'	=>	'UserController@create',
		'as'	=>	'usuario.crear'
	]);
	*/

	Route::get('{id}/borrar-usuario',[
		'uses'	=>	'UserController@destroy',
		'as'	=>	'usuario.borrar'
	]);

	Route::resource('usuarios_crud','UserController');


	//  :: RUTAS PARA LAS OFICINAS ::

	Route::get('oficina/todas-las-oficinas',[
		'uses'	=>	'OficinaController@index',
		'as'	=>	'oficina.index'
	]);

	Route::get('oficina/crear-oficina',[
		'uses'	=>	'OficinaController@create',
		'as'	=>	'oficina.crear'
	]);

	Route::get('{id}/borrar-oficina',[
		'uses'	=>	'OficinaController@destroy',
		'as'	=>	'oficina.borrar'
	]);

	Route::resource('oficina_crud','OficinaController');


	//  :: RUTAS PARA LAS ÁREAS ::

	Route::get('area/todas-las-areas',[
		'uses'	=>	'AreaController@index',
		'as'	=>	'area.index'
	]);

	Route::get('area/crear-area',[
		'uses'	=>	'AreaController@create',
		'as'	=>	'area.crear'
	]);

	Route::get('area/{id}/borrar-area',[
		'uses'	=>	'AreaController@destroy',
		'as'	=>	'area.borrar'
	]);

	Route::resource('area_crud','AreaController');


	//  :: RUTAS PARA LOS PROCESADORES ::

	Route::get('procesador/listado-de-procesadores',[
		'uses'	=>	'ProcesadorController@index',
		'as'	=>	'procesador.index'
	]);

	Route::get('procesador/registrar-procesador',[
		'uses'	=>	'ProcesadorController@create',
		'as'	=>	'procesador.crear'
	]);

	Route::get('procesador/{id}/editar-procesador',[
		'uses'	=>	'ProcesadorController@editar',
		'as'	=>	'procesador.editar'
	]);

	Route::get('procesador/{id}/borrar-procesador',[
		'uses'	=>	'ProcesadorController@destroy',
		'as'	=>	'procesador.borrar'
	]);

	Route::resource('procesador_crud','ProcesadorController');

	Route::get('procesador/ajax/procesador/{id}',[
		'uses'	=>	'ProcesadorController@procElegir',
		'as'	=>	'elejir.procesador'
	]);

		//  :: RUTAS PARA LAS PLACAS MADRES ::

	Route::get('placa-madre/listado-de-placas-madres',[
		'uses'	=>	'PlacaMadreController@index',
		'as'	=>	'placa.madre.index'
	]);

	Route::get('placa-madre/registrar-placa-madre',[
		'uses'	=>	'PlacaMadreController@create',
		'as'	=>	'placa.madre.crear'
	]);

	Route::get('placa-madre/{id}/editar-placa-madre',[
		'uses'	=>	'PlacaMadreController@editar',
		'as'	=>	'placa.madre.editar'
	]);

	Route::get('placa-madre/{id}/borrar-memoria-ram',[
		'uses'	=>	'PlacaMadreController@destroy',
		'as'	=>	'placa.madre.borrar'
	]);

	/* MODALES
	Route::get('placa-madre/{id}/editar_modal',[
		'uses'	=>	'PlacaMadreController@editarModal',
		'as'	=>	'placa.madre.editarModal'
	]);
	Route::get('placa-madre/{id}/borrar_modal',[
		'uses'	=>	'PlacaMadreController@borrarModal',
		'as'	=>	'placa.madre.borrarModal'
	]);
	Route::get('placa-madre/registrar_modal',[
		'uses'	=>	'PlacaMadreController@crearModal',
		'as'	=>	'placa.madre.crearModal'
	]);
	*/

	Route::resource('placa_madre_crud','PlacaMadreController');


	//  :: RUTAS PARA LAS MEMORIAS RAM ::

	Route::get('memoria-ram/listado-de-memorias-ram',[
		'uses'	=>	'MemoriaRamController@index',
		'as'	=>	'memoria.ram.index'
	]);
	Route::get('memoria-ram/registrar-memoria-ram',[
		'uses'	=>	'MemoriaRamController@create',
		'as'	=>	'memoria.ram.crear'
	]);
	Route::get('memoria-ram/{id}/editar-memoria-ram',[
		'uses'	=>	'MemoriaRamController@editar',
		'as'	=>	'memoria.ram.editar'
	]);
	Route::get('memoria-ram/{id}/borrar-memoria-ram',[
		'uses'	=>	'MemoriaRamController@destroy',
		'as'	=>	'memoria.ram.borrar'
	]);
	Route::resource('memoria_ram_crud','MemoriaRamController');


	//  :: RUTAS PARA LOS DISCOS DUROS ::

	Route::get('disco-duro/listado-de-discos-duros',[
		'uses'	=>	'DiscoDuroController@index',
		'as'	=>	'disco.duro.index'
	]);
	Route::get('disco-duro/registrar-disco-duro',[
		'uses'	=>	'DiscoDuroController@create',
		'as'	=>	'disco.duro.crear'
	]);
	Route::get('disco-duro/{id}/borrar-disco-duro',[
		'uses'	=>	'DiscoDuroController@destroy',
		'as'	=>	'disco.duro.borrar'
	]);
	Route::resource('disco-duro_crud','DiscoDuroController');


	//  :: RUTAS PARA FUENTES ::

	Route::get('fuente/listado-de-fuentes',[
		'uses'	=>	'FuenteController@index',
		'as'	=>	'fuente.index'
	]);
	Route::get('fuente/registrar-fuente',[
		'uses'	=>	'FuenteController@create',
		'as'	=>	'fuente.crear'
	]);
	Route::get('fuente/{id}/borrar-fuente',[
		'uses'	=>	'FuenteController@destroy',
		'as'	=>	'fuente.borrar'
	]);
	Route::resource('fuente_crud','FuenteController');


	//  :: RUTAS PARA IMPRESORAS ::

	Route::get('impresora/listado-de-impresoras',[
		'uses'	=>	'ImpresoraController@index',
		'as'	=>	'impresora.index'
	]);
	Route::get('impresora/registrar-impresora',[
		'uses'	=>	'ImpresoraController@create',
		'as'	=>	'impresora.crear'
	]);
	Route::get('impresora/{id}/borrar-impresora',[
		'uses'	=>	'ImpresoraController@destroy',
		'as'	=>	'impresora.borrar'
	]);
	Route::resource('impresora_crud','ImpresoraController');


	//  :: RUTAS PARA EQUIPOS ::

	Route::get('equipo/listado-de-equipos',[
		'uses'	=>	'EquipoController@index',
		'as'	=>	'equipo.index'
	]);
	Route::get('equipo/registrar-equipo',[
		'uses'	=>	'EquipoController@create',
		'as'	=>	'equipo.crear'
	]);
	Route::get('equipo/cargar_memoria',[
		'uses'	=>	'EquipoController@cargarMemoria',
		'as'	=>	'equipo.cargarMemoria'		
	]);
	Route::get('equipo/{id}/borrar-equipo',[
		'uses'	=>	'EquipoController@destroy',
		'as'	=>	'equipo.borrar'
	]);
	Route::post('equipo/registrar-equipo',[
		'uses'	=>	'EquipoController@store',
		'as'	=>	'equipo.crearPost'
	]);
	Route::resource('equipo_crud','EquipoController');

});

//					::RUTAS PARA TECNICO-HS::
Route::group(['prefix'=>'tecnico-HS','middleware'=>'auth','middleware'=>'level:2'],function(){

	//  :: RUTAS PARA LOS USUARIOS ::
	Route::get('usuario/listado-de-usuarios',[
		'uses'	=>	'UserController@listarUsuariosHS',
		'as'	 =>	'usuario.listar.tecnicohs'
	]);
	Route::get('usuario/{id}',[
		'uses'	=>	'UserController@show',
		'as'	=>	'user.show'
	]);
	Route::get('usuario/buscar-usuario',[
		'uses'	=>	'UserController@listar_usuarios',
		'as'	 =>	'usuario.listar.buscar.tecnicohs'
	]);
	Route::get('usuario/{id}',[
		'uses'	=>	'UserController@listarUsuariosHS',
		'as'	=>	'user.listar.hs'
	]);
	//  :: RUTAS PARA LOS EQUIPOS ::
	Route::get('equipo/listado-de-equipos',[
		'uses'	=>	'EquipoController@indexHS',
		'as'	=>	'equipo.index.hs'
	]);
	Route::get('procesador/listado-de-procesadores',[
		'uses'	=>	'ProcesadorController@indexHS',
		'as'	=>	'procesador.index.tecnicohs'
	]);
	Route::get('placa-madre/listado-de-placas-madres',[
		'uses'	=>	'PlacaMadreController@indexHS',
		'as'	=>	'placa.madre.index.hs'
	]);
	Route::get('memoria-ram/listado-de-memorias-ram',[
		'uses'	=>	'MemoriaRamController@indexHS',
		'as'	=>	'memoria.ram.index.hs'
	]);
	Route::get('disco-duro/listado-de-discos-duros',[
		'uses'	=>	'DiscoDuroController@indexHS',
		'as'	=>	'disco.duro.index.hs'
	]);
	Route::get('fuente/listado-de-fuentes',[
		'uses'	=>	'FuenteController@indexHS',
		'as'	=>	'fuente.index.hs'
	]);
	Route::get('impresora/listado-de-impresoras',[
		'uses'	=>	'ImpresoraController@indexHS',
		'as'	=>	'impresora.index.hs'
	]);

});

//							::RUTAS PARA TECNICO-RI::
Route::group(['prefix'=>'tecnico-RI','middleware'=>'auth','middleware'=>'level:3'],function(){

	//  :: RUTAS PARA LOS USUARIOS ::
	Route::get('usuario/listado-de-usuarios',[
		'uses'	=>	'UserController@listarUsuariosRI',
		'as'	 =>	'usuario.listar.tecnicori'
	]);
	Route::get('usuario/{id}',[
		'uses'	=>	'UserController@show',
		'as'	=>	'user.show'
	]);
	Route::get('usuario/{id}',[
		'uses'	=>	'UserController@listarUsuariosRI',
		'as'	=>	'usuario.listar.tecnicori'
	]);
	Route::get('equipo/listado-de-equipos',[
		'uses'	=>	'EquipoController@indexRI',
		'as'	=>	'equipo.index.ri'
	]);
	Route::get('procesador/listado-de-procesadores',[
		'uses'	=>	'ProcesadorController@indexRI',
		'as'	=>	'procesador.index.tecnicori'
	]);
	Route::get('procesador/listado-de-procesadores',[
		'uses'	=>	'ProcesadorController@indexRI',
		'as'	=>	'procesador.index.tecnicori'
	]);
	Route::get('placa-madre/listado-de-placas-madres',[
		'uses'	=>	'PlacaMadreController@indexRI',
		'as'	=>	'placa.madre.index.ri'
	]);
	Route::get('memoria-ram/listado-de-memorias-ram',[
		'uses'	=>	'MemoriaRamController@indexRI',
		'as'	=>	'memoria.ram.index.ri'
	]);
	Route::get('disco-duro/listado-de-discos-duros',[
		'uses'	=>	'DiscoDuroController@indexRI',
		'as'	=>	'disco.duro.index.ri'
	]);
	Route::get('fuente/listado-de-fuentes',[
		'uses'	=>	'FuenteController@indexRI',
		'as'	=>	'fuente.index.ri'
	]);
	Route::get('impresora/listado-de-impresoras',[
		'uses'	=>	'ImpresoraController@indexRI',
		'as'	=>	'impresora.index.ri'
	]);
});


Route::group(['prefix' => 'usuario','middleware'=>'auth'],function(){

	Route::get('mis-datos/{id}',[
			'uses'	=>	'UserController@show',
			'as'	=>	'usuario.mis.datos'
	]);
	Route::get('mi-equipo/{id}',[
			'uses'	=>	'UserController@miEquipo',
			'as'	=>	'usuario.mi.equipo'
	]);
	Route::get('equipo-asignado/{id}',[
		'uses'	=>	'UserController@getEquipo',
		'as'	=>	'user.getEequipo'
	]);
});

// :: RUTAS PARA INCIDENTES ::

//Route::get('tabla_tecnico_ajax','IncidenteController@listadoTecnicoAjax');
//Route::get('tabla_miembro_ajax','IncidenteController@listadoMiembroAjax');

Route::group(['prefix' => 'incidente','middleware'=>'auth'],function(){

	Route::get('tabla-tecnico-ajax',[
		'uses'	=>	'IncidenteController@listadoTecnicoAjax',
		'as'	=>	'incidente.listadoTecnico.ajax'
	]);
	Route::get('tabla-tecnico-propio-ajax',[
		'uses'	=>	'IncidenteController@listadoTecnicoPropioAjax',
		'as'	=>	'incidente.listadoTecnico.propio.ajax'
	]);
	Route::get('listado-de-incidentes',[
		'uses'	=>	'IncidenteController@listadoIncidentesTecnicos',
		'as'	=>	'incidente.listado.tecnico'
	]);
	Route::get('listado-de-incidentes-registrados',[
		'uses'	=>	'IncidenteController@listadoIncidentesTecnicosPropio',
		'as'	=>	'incidente.listado.tecnico.propio'
	]);
	Route::get('lista-de-incidentes',[
		'uses'	=>	'IncidenteController@listadoIncidensteMiembros',
		'as'	=>	'incidente.listado.miembros'
	]);
	Route::get('tabla-miembro-ajax',[
		'uses'	=>	'IncidenteController@listadoMiembroAjax',
		'as'	=>	'incidente.listadoMiembros.ajax'
	]);

	Route::post('lista-de-incidentes',[
		'uses'	=>	'IncidenteController@listadoMiembroAjax',
		'as'	=>	'incidente.listado.miembros.post'
	]);
	Route::get('registrar-incidente',[
		'uses'	=>	'IncidenteController@create',
		'as'	=>	'incidente.crear'
	]);
	Route::get('borrar-incidente',[
		'uses'	=>	'IncidenteController@destroy',
		'as'	=>	'incidente.borrar'
	]);
	Route::get('lista-incidentes',[
		'uses'	=>	'IncidenteController@lista_incidentes',
		'as'	=>	'lista.incidentes'
	]);
	Route::get('generar-pdf',[
		'uses'	=>	'IncidenteController@pdfIncidentes',
		'as'	=>	'incidente.generar.pdp'
	]);
	Route::get('generar-pdf-usuarios',[
		'uses'	=>	'IncidenteController@pdfUsuario',
		'as'	=>	'incidente.generar.pdp.usuarios'
	]);
	Route::get('{id}/generar-pdf-detalle',[
		'uses'	=>	'IncidenteController@pdfIncidentesDetalle',
		'as'	=>	'incidente.generar.pdp.detalle'
	]);
	Route::get('estadisticas','IncidenteController@estadisticasVista');

	Route::get('estadisticas-por-tipo-incidente',[
		'uses'	=>	'IncidenteController@estadisticas',
		'as'	=>	'incidente.estadisticas'
	]);
	Route::get('estadisticas-por-estado',[
		'uses'	=>	'IncidenteController@estadisticaPorEstado',
		'as'	=>	'incidente.estadisticas.estado'
	]);
	Route::get('estadisticas-por-area',[
		'uses'	=>	'IncidenteController@estadisticaPorArea',
		'as'	=>	'incidente.estadisticas.area'
	]);
	Route::resource('incidente_crud','IncidenteController');

});

// :: RUTAS COMENTARIOS ::

Route::group(['prefix' => 'incidente','middleware'=>'auth'],function(){

	Route::get('{id}/cometarios',[
		'uses'	=>	'ComentarioController@create',
		'as'	=>	'comentario.crear'
	]);
	Route::post('{id}/cometarios',[
		'uses'	=>	'ComentarioController@store',
		'as'	=>	'comentario.crear.post'
	]);
	Route::get('{id}/comentario-cerrar',[
		'uses'	=>	'ComentarioController@cerrarIncidente',
		'as'	=>	'comentario.cerrar'
	]);
	Route::resource('comentario_crud','ComentarioController');
});

// RESETEO DE PASSWORD

Route::group(['prefix' => 'password'],function(){

	Route::get('email',[
		'uses'	=>	'Auth\PasswordController@getEmail',
		'as'	=>	'password.getEmail'
	]);
	Route::post('email',[
		'uses'	=>	'Auth\PasswordController@postEmail',
		'as'	=>	'password.postEmail'
	]);
	Route::get('reset/{token}',[
		'uses'	=>	'Auth\PasswordController@getReset',
		'as'	=>	'password.getReset'
	]);
	Route::post('reset',[
		'uses'	=>	'Auth\PasswordController@postReset',
		'as'	=>	'password.postReset'
	]);
	//Route::resource('comentario_crud','ComentarioController');
});

Route::group(['prefix'=>'usuario','middleware'=>'auth'],function(){

	Route::get('cambiar-contraseña',[
		'uses'	=>	'CambiarPasswordController@create',
		'as'	=>	'create.cambiarPassword'
	]);
	Route::post('cambiar-password',[
		'uses'	=>	'CambiarPasswordController@cambiarPassword',
		'as'	=>	'cambiarPassword'
	]);
	Route::get('cambiar-password',[
		'uses'	=>	'CambiarPasswordController@show',
		'as'	=>	'showPassword'
	]);
	Route::get('cambiar-contraseña-error',[
		'uses'	=>	'CambiarPasswordController@errorPassword',
		'as'	=>	'errorPassword'
	]);

});

Route::get('contacto',[
	'uses'	=>	'MailController@getMail',
	'as'	=>	'mails.getEmail'
]);

Route::resource('mail','MailController');

//Route::post('admin/autenticacion/logeo', 'Auth\AuthController@postLogin');
//Route::get('admin/autenticacion/logout', 'Auth\AuthController@getLogout');


