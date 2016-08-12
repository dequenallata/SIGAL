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


// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth' ], function(){

	//Inicio del panel de administracion
	Route::get('inicio', function(){
		return view('inicio');
	});

	/*** Modulo Provedores ***/

	Route::group(['middleware' => 'permission:providers_consult'], function(){

		//Muesta el panel de provedores
		Route::get('proveedores','provedoresController@index');

		Route::group(['middleware' => 'permission:providers_register'], function(){
			//Muestra la vista de registro de provedor
			Route::get('registraProvedor','provedoresController@viewRegistro');
			//Registra un provedor
			Route::post('registraProvedor' ,'provedoresController@registrar');
		});

		Route::group(['middleware' => 'permission:providers_edit'], function(){
			//Muesta la vista de edicion de provedores
			Route::get('editarProvedor', 'provedoresController@viewEditar');
			//Edita un provedor cuyo id se pase
			Route::post('editProvedor/{id}', 'provedoresController@editProvedor');
		});

		Route::group(['middleware' => 'permission:providers_delete'], function(){
			//Muestra la vista de eliminacion de provedores
			Route::get('elimProvedor','provedoresController@viewEliminar');
			//Elimina un provedor cuyo id se pase
			Route::post('elimProvedor/{id}','provedoresController@elimProvedor');
		});

		//Obtiene un provedor por su id
		Route::get('getProvedor/{id}', 'provedoresController@getProvedor');

	});

	//Regresa todos los provedores que existan
	Route::get('getProvedores','provedoresController@allProvedores');

	/*** fin de modulo provedores ***/


	/*** Modulo de usuarios ***/

	Route::group(['middleware' => 'permission:users_consult'], function(){

		//Muestra el panel de usuarios
		Route::get('usuarios' , 'usersController@index');

		Route::group(['middleware' => 'permission:users_register'], function(){
			//Muestra vista de registro de usuarios
			Route::get('registrarUser','usersController@viewRegistrar');
			//Registra un usuario
			Route::post('registrarUsuario' ,'usersController@registrar');
		});

		Route::group(['middleware' => 'permission:users_edit'], function(){
			//Muesta la vista de edicion de Usuarios
			Route::get('editarUsuario', 'usersController@viewEditar');
			//Edita un usuario cuyo id se pase
			Route::post('editarUsuario/{id}', 'usersController@editUsuario');
		});

		Route::group(['middleware' => 'permission:users_delete'], function(){
			//Muestra la vista de eliminacion de usuarios
			Route::get('eliminarUsuario','usersController@viewEliminar');
			//Elimina un usuario cuyo id se pase
			Route::post('eliminarUsuario/{id}','usersController@elimUsuario');
		});

		//Regresa todas los usuarios que existan
		Route::get('getUsuarios','usersController@allUsuarios');
		//Obtiene un usuario por su id
		Route::get('getUsuario/{id}', 'usersController@getUsuario');
	});

	Route::group(['middleware' => 'permission:stores_multiple'], function(){
		//Regresa la vista de cambio de deposito
		Route::get('cambiarDeposito','usersController@viewDeposito');
		//Regresa deposito del usuario logueado
		Route::get('getDeposito','usersController@getDeposito');
		//Edita el deposito del usuario logueado
		Route::post('editarDeposito','usersController@editDeposito');
	});


	//Regresa la vista de cambio de contraseña
	Route::get('cambiarPassword', 'usersController@viewPassword');
	//Modifica el password del usuario logueado
	Route::post('cambiarPassword', 'usersController@editPassword');

	//Regresa todos los usuarios del deposito del usuario logueado
	Route::get('getUsuariosDeposito', 'usersController@getUsuariosDeposito');

	/*** fin de modulo usuario ***/


	/*** Modulo de departamentos ***/

	Route::group(['middleware' => 'permission:departs_consult'], function(){

		//Muestra el panel de departamentos
		Route::get('departamentos','departamentosController@index');

		Route::group(['middleware' => 'permission:departs_register'], function(){
			//Muestra vista de registro de departamento
			Route::get('registrarDepartamento','departamentosController@viewRegistrar');
			//Registra un Departamento
			Route::post('registrarDepartamento' ,'departamentosController@registrar');
		});

		Route::group(['middleware' => 'permission:departs_edit'], function(){
			//Muesta la vista de edicion de departamento
			Route::get('editarDepartamento', 'departamentosController@viewEditar');
			//Edita un departamento cuyo id se pase
			Route::post('editarDepartamento/{id}', 'departamentosController@editDepartamento');
		});

		Route::group(['middleware' => 'permission:departs_delete'], function(){
			//Muestra la vista de eliminacion de departamentos
			Route::get('eliminarDepartamento','departamentosController@viewEliminar');
			//Elimina un departamento cuyo id se pase
			Route::post('eliminarDepartamento/{id}','departamentosController@elimDepartamento');
		});

		//Obtiene un departamento por su id
		Route::get('getDepartamento/{id}', 'departamentosController@getDepartamento');

	});

	//Regresa todas los departamentos que existan
	Route::get('getDepartamentos','departamentosController@allDepartamentos');

	/*** fin de modulo departamentos ***/


	/*** Modulo de Insumos ***/

	Route::group(['middleware' => 'permission:items_consult'], function(){

		//Muestra el panel de insumos
		Route::get('insumos','insumosController@index');

		Route::group(['middleware' => 'permission:items_register'], function(){
			//Muestra vista de registro de insumo
			Route::get('registrarInsumo','insumosController@viewRegistrar');
			//Registra un insumo
			Route::post('registrarInsumo' ,'insumosController@registrar');
		});

		Route::group(['middleware' => 'permission:items_edit'], function(){
			//Muesta la vista de edicion de insumo
			Route::get('editarInsumo', 'insumosController@viewEditar');
			//Edita un insumo cuyo id se pase
			Route::post('editarInsumo/{id}', 'insumosController@editInsumo');
		});

		Route::group(['middleware' => 'permission:items_delete'], function(){
			//Muestra la vista de eliminacion de insumo
			Route::get('eliminarInsumo','insumosController@viewEliminar');
			//Elimina un insumo cuyo id se pase
			Route::post('eliminarInsumo/{id}','insumosController@elimInsumo');
		});

		//Regresa todas los insumos que existan
		Route::get('getInsumos','insumosController@allInsumos');
		//Obtiene un insumo por su id
		Route::get('getInsumo/{id}', 'insumosController@getInsumo');
	});

	//Regresa una lista de insumos que coincidan con la descripcion o codigo que se pase
	Route::get('getInsumosConsulta', 'insumosController@getInsumosConsulta');

	/*** fin de modulo Insumos ***/


	/*** Modulo de inventario ***/

	Route::group(['prefix' => 'inventario', 'as' => 'inven'],
		function(){

			Route::group(['middleware' => 'permission:inventory_stock'], function(){
				//Muestra el panel de inventario
				Route::get('/',['as' => 'Inicio', 'uses' => 'inventarioController@index']);
				//Regresa todos las insumos en el inventario
				Route::post('getInventario','inventarioController@allInsumos');
		  });

			Route::group(['prefix' => 'kardex', 'as' => 'kardex', 'middleware' => 'permission:inventory_kardex'], function(){
				//Muestra la vista de kardek
				Route::get('/',['as' => 'index', 'uses' => 'inventarioController@viewKardex']);
				//Muestra la vista de avanzada de busqueda
				Route::get('search',['as' => 'search', 'uses' => 'inventarioController@searchKardex']);
				//Regresa el kardek de un insumo cuyo id y rango de fecha de pase
				Route::post('getKardex', 'inventarioController@kardex');
			});

			Route::group(['prefix' => 'alertas',  'as' => 'Alerts', 'middleware' => 'permission:inventory_alerts'], function(){
				//Muestra la vista de	alertas
				Route::get('/',['as' => 'Inicio', 'uses' => 'inventarioController@viewAlerts']);
				//configura el valor min y med de los insumos que se especifiquen
				Route::post('estableceAlarmas','inventarioController@configuraAlarmas');
				//Regresa una lista de insumos que coincidan con la descripcion o codigo que se pase
				Route::get('getInventarioAlert', 'inventarioController@getInsumosAlert');
			});

			Route::group(['prefix' => 'herramientas', 'as' => 'Herra','middleware' => 'permission:inventory_notification_alert'], function(){
				//Muestra la  vista de insumos en niveles bajos y criticos
				Route::get('alertasInsumos',['middleware' => 'alert', 'as' => 'Niveles', 'uses' => 'inventarioController@viewInsumosAlertas']);
				//Regresa todos los insumos en alerta del inventario
				Route::get('getAlertInsumos','inventarioController@insumosAlert');
			});

		/**
		 *Regresa una lista de insumos que existen en el inventario que
		 *coincidan con la descripcion o codigo que se pase
		 */
		Route::get('getInsumosInventario', 'inventarioController@getInsumosInventario');

	});

	/*** Fin de modulo de inventario ***/


	/*** Modulo de entradas ***/

	Route::group(['prefix' => 'entradas', 'as' => 'entr'],
		function(){

		Route::group(['middleware' => 'permission:inventory_movements'], function(){

			//Muestra el panel de entradas
			Route::get('/',['as' => 'Panel', 'uses' => 'entradasController@index']);

			//Muestra la vista detallada de una entrada
			Route::get('detalles', 'entradasController@detalles');

			//Regresa todas las entradas segun el tipo que se espesifique, si no se espesifica un
			//tipo se regresan todas las entradas
			Route::get('getEntradas/{type?}', 'entradasController@allEntradas');

			//Regresa todos los insumos que han entrado segun el tipo que se espesifique, si no se espesifica
			//tipo se regresan todos los insumos
			Route::get('getInsumos/{type?}', 'entradasController@allInsumos');

			//Regresa todos los datos de una entrada cuyo id se pase
			Route::get('getEntrada/{id}', 'entradasController@getEntrada');

			//Regresa todas las entradas de el numero de orden que se expecifique
			Route::get('getOrden/{number}', 'entradasController@getOrden');

		});

		Route::group(['middleware' => 'permission:movements_register_entry'], function(){
			//Muestra la vista de registro de entrada
			Route::get('registrar',['as' => 'Registrar', 'uses' => 'entradasController@viewRegistrar']);

			//Registra una entrada
			Route::post('registrar' ,'entradasController@registrar');
		});

		//Regresa los todos los datos de una entrada cuyo codigo se especifique
		Route::get('getCodigo/{code}', 'entradasController@getEntradaCodigo');
	});

	/*** Fin de modulo de entradas ***/


	/*** Modulo de salidas ***/

	Route::group(['middleware' => 'permission:inventory_movements'], function(){

		//Muestra el panel de salidas
		Route::get('salidas','salidasController@index');
		//Muestra la vista detallada de una salida
		Route::get('detallesSalida','salidasController@detalles');
		//Regresa todos los insumos que han salido
		Route::get('getInsumosSalidas','salidasController@allInsumos');
		//Regresa todas las salidas
		Route::get('getSalidas','salidasController@allSalidas');
		//Regresa los todos los datos de una salida cuyo id se pase
		Route::get('getSalida/{id}', 'salidasController@getSalida');
	});

	Route::group(['middleware' => 'permission:movements_register_egress'], function(){
		//Muestra la vista de registro de salida
		Route::get('registrarSalida', 'salidasController@viewRegistrar');
		//Registra una salida
		Route::post('registrarSalida' ,'salidasController@registrar');
	});

	//Regresa los todos los datos de una salida cuyo codigo se especifique
	Route::get('getSalidaCodigo/{code}', 'salidasController@getSalidaCodigo');

	/*** Fin de modulo de salidas ***/


	/*** Modulo de Modificaciones

	Route::group(['prefix' => 'modificaciones', 'as' => 'modifi', 'middleware' => 'permission:modificaciones'],
		function(){

		//Modificaciones entradas

			//Muestra el panel de modificacione de entradas
			Route::get('entradas',['as' => 'Entrada', 'uses' => 'modificacionesController@indexEntradas']);
			//Muestra la vista detallada de una entrada modificada
			Route::get('detallesEntrada', ['as' => 'DelleEntra', 'uses' => 'modificacionesController@detallesEntrada']);
			//Muestra la vista de registro de modificacion de entrada
			Route::get('registrarEntrada',['as' => 'RvEntra', 'uses' => 'modificacionesController@viewRegEntrada']);
			//Registra una modificacion de entrada
			Route::post('registrarEntrada', ['as' => 'RcEntra', 'uses' => 'modificacionesController@registrarEntrada']);
			//Regresa todas las entradas modificadas
			Route::get('getEntradas',[ 'as' => 'AllEntra', 'uses' => 'modificacionesController@allEntradas']);
			//Regresa todos los datos de una entrada modificada cuyo id se pase
			Route::get('getEntradas/{id}',['as' => 'GetEntra', 'uses' => 'modificacionesController@getEntrada']);

		//Modificaciones salidas

			//Muestra el panel de modificacione de salidas
			Route::get('salidas',['as' => 'Salida', 'uses' => 'modificacionesController@indexSalidas']);
			//Muestra la vista detallada de una salida modificada
			Route::get('detallesSalida', ['as' => 'DelleSalid', 'uses' => 'modificacionesController@detallesSalida']);
			//Muestra la vista de registro de modificacion de salida
			Route::get('registrarSalida',['as' => 'RvSalid', 'uses' => 'modificacionesController@viewRegSalida']);
			//Registra una modificacion de salida
			Route::post('registrarSalida', ['as' => 'RcSalid', 'uses' => 'modificacionesController@registrarSalida']);
			//Regresa todas las salidas modificadas
			Route::get('getSalidas',[ 'as' => 'AllSalid', 'uses' => 'modificacionesController@allSalidas']);
			//Regresa todos los datos de una salida modificada cuyo id se pase
			Route::get('getSalida/{id}',['as' => 'GetSalid', 'uses' => 'modificacionesController@getSalida']);
	});

	 Fin de modulo de modificaciones ***/


	/*** Modulo de Estadisticas

	Route::group(['middleware' => 'permission:estadisticas'], function(){
		//Muesta el panel de estadisticas
		Route::get('estadisticas', 'estadisticasController@index');

		//Regresa las salidas de todo los servicios del mes actual
		Route::get('getEstadisticas', 'estadisticasController@getServicios');

		//Regresa todas las salidad de un insumo por sevicio en un rango de fecha
		Route::post('estadisticasInsumo', 'estadisticasController@getInsumo');

		//Regresa todas los insumos que han salido de un servicio en un ranfo de fecha
		Route::post('estadisticasServicio', 'estadisticasController@getServicio');
	});

	 Fin de modulo de Estadisticas ***/


	/*** Modulo de Depositos ***/

	Route::group(['prefix' => 'depositos', 'as' => 'depo'], function(){

		Route::group(['middleware' => 'permission:stores_consult'], function(){

			//Muesta el panel de depositos
			Route::get('/',['as' => 'Inicio', 'uses' => 'depositosController@index']);

			Route::group(['middleware' => 'permission:stores_register'], function(){
				//Muestra vista de registro de deposito
				Route::get('registrarDeposito','depositosController@viewRegistrar');
				//Registra un Deposito
				Route::post('registrarDeposito' ,'depositosController@registrar');
			});

			Route::group(['middleware' => 'permission:stores_edit'], function(){
				//Muesta la vista de edicion de deposito
				Route::get('editarDeposito', 'depositosController@viewEditar');
				//Edita un departamento cuyo id se pase
				Route::post('editarDeposito/{id}', 'depositosController@editarDeposito');
			});

			Route::group(['middleware' => 'permission:stores_delete'], function(){
				//Muestra la vista de eliminacion de deposito
				Route::get('eliminarDeposito','depositosController@viewEliminar');
				//Elimina un deposito cuyo id se pase
				Route::post('eliminarDeposito/{id}','depositosController@elimDeposito');
			});

			//Obtiene un deposito por su id
			Route::get('getDeposito/{id}', 'depositosController@getDeposito');
		});

		//Regresa todas los depositos que existan
		Route::get('getDepositos','depositosController@allDepositos');
		Route::get('terceros/{tipo?}', 'depositosController@allTerceros');
	});


	/*** Fin de modulo de Depositos ***/


	/*** Modulo de Reportes ***/

	Route::group(['prefix' => 'reportes', 'middleware' => 'permission:inventory_report', 'as' => 'repor'], function(){
		Route::get('inventarioCarga/{id}', ['as' => 'CargaInv', 'uses' => 'reportesController@cargaInventario']);
		Route::match(['post', 'get'],'inventario/{report}',    ['as' => 'Inv', 'uses' => 'reportesController@allInventario']);
		Route::get('entrada/{id}',    ['as' => 'Ent', 'uses' => 'reportesController@getEntrada']);
		Route::get('salida/{id}',  ['as' => 'Sal', 'uses' => 'reportesController@getSalida']);
		Route::get('kardex',  ['as' => 'kardex', 'uses' => 'reportesController@getKardex']);
	});

	/*** Fin de modulo de Reportes ***/

});

/*** Modulo de documentos ***/

Route::group(['prefix' => 'documentos', 'as' => 'docum'], function(){

	Route::group(['middleware' => 'permission:documents_consult'], function(){

		Route::get('/', ['as' => 'Index','uses' => 'documentosController@index']);

		Route::group(['middleware' => 'permission:documents_register'], function(){
			Route::get('registrar',['uses' => 'documentosController@viewRegistrar']);
			Route::post('registrar', ['uses' => 'documentosController@registrar']);
		});

		Route::group(['middleware' => 'permission:documents_edit'], function(){
			Route::get('editar',['uses' => 'documentosController@viewEditar']);
			Route::post('editar/{id}', ['uses' => 'documentosController@editar']);
		});

		Route::group(['middleware' => 'permission:documents_delete'], function(){
			Route::get('eliminar', ['uses' => 'documentosController@viewEliminar']);
			Route::post('eliminar/{id}', ['uses' => 'documentosController@eliminar']);
		});

		Route::get('get/{id}', ['uses' => 'documentosController@getDocumento']);
	});

	Route::get('all', ['uses' => 'documentosController@allDocumentos']);
	Route::get('all/{naturaleza}', ['uses' => 'documentosController@allFilter']);
});

/*** Fin de modulo de documentos ***/


/*** Modulo de roles ***/

Route::group(['prefix' => 'roles', 'as' => 'roles'], function(){

	Route::group(['middleware' => 'permission:roles_consult'], function(){

		Route::get('/', ['as' => 'Index','uses' => 'rolesController@index']);

		Route::group(['middleware' => 'permission:roles_register'], function(){
			Route::get('registrar',['uses' => 'rolesController@viewRegistrar']);
			Route::post('registrar',['uses' => 'rolesController@registrar']);
		});

		Route::group(['middleware' => 'permission:roles_edit'], function(){
			Route::get('editar', ['uses' => 'rolesController@viewEditar']);
			Route::post('editar/{id}', ['uses' => 'rolesController@editar']);
		});

		Route::group(['middleware' => 'permission:roles_delete'], function(){
			Route::get('eliminar', ['uses' => 'rolesController@viewEliminar']);
			Route::post('eliminar/{id}', ['uses' => 'rolesController@eliminar']);
		});

		Route::get('permisos', ['uses' => 'rolesController@allPermissions']);
		Route::get('getRol/{id}', ['uses' => 'rolesController@getRol']);

	});

	Route::get('all', ['uses' => 'rolesController@allRoles']);

});

/*** Fin de modulo de roles ***/
