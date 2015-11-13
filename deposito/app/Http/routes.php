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

	Route::group(['middleware' => 'permission:provedores'], function(){

		//Muesta el panel de provedores
		Route::get('provedores','provedoresController@index');

		Route::group(['middleware' => 'permission:provedoreN'], function(){
			//Muestra la vista de registro de provedor
			Route::get('registraProvedor','provedoresController@viewRegistro');
			//Registra un provedor
			Route::post('registraProvedor' ,'provedoresController@registrar');
		});

		Route::group(['middleware' => 'permission:provedoreM'], function(){
			//Muesta la vista de edicion de provedores
			Route::get('editarProvedor', 'provedoresController@viewEditar');
			//Edita un provedor cuyo id se pase
			Route::post('editProvedor/{id}', 'provedoresController@editProvedor');
		});
		
		Route::group(['middleware' => 'permission:provedoreD'], function(){
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

	/*** Modulo presentaciones ***/

	//Muestra el panel de presentaciones 
	Route::get('presentaciones' , 'presentacionesController@index');

	//Muestra vista de registro de presentaciones
	Route::get('registrarPresentacion','presentacionesController@viewRegistro');
	//Registra una presentacion
	Route::post('registrarPresentacion' ,'presentacionesController@registrar');

	//Muesta la vista de edicion de Presentaciones
	Route::get('editarPresentacion', 'presentacionesController@viewEditar');
	//Edita uná presentacion cuyo id se pase
	Route::post('editarPresentacion/{id}', 'presentacionesController@editPresentacion');

	//Muestra la vista de eliminacion de provedores
	Route::get('eliminarPresentacion','presentacionesController@viewEliminar');
	//Elimina un provedor cuyo id se pase
	Route::post('eliminarPresentacion/{id}','presentacionesController@elimPresentacion');

	//Regresa todas las presentaciones que existan
	Route::get('getPresentaciones','presentacionesController@allPresentaciones');
	//Obtiene una presentacion por su id
	Route::get('getPresentacion/{id}', 'presentacionesController@getPresentacion');

	/*** fin de modulo presentaciones ***/


	/*** Modulo secciones ***/

	//Muestra el panel de secciones 
	Route::get('secciones' , 'seccionesController@index');

	//Muestra vista de registro de secciones
	Route::get('registrarSeccion','seccionesController@viewRegistro');
	//Registra una presentacion
	Route::post('registrarSeccion' ,'seccionesController@registrar');

	//Muesta la vista de edicion de Presentaciones
	Route::get('editarSeccion', 'seccionesController@viewEditar');
	//Edita uná presentacion cuyo id se pase
	Route::post('editarSeccion/{id}', 'seccionesController@editSeccion');

	//Muestra la vista de eliminacion de provedores
	Route::get('eliminarSeccion','seccionesController@viewEliminar');
	//Elimina un provedor cuyo id se pase
	Route::post('eliminarSeccion/{id}','seccionesController@elimSeccion');

	//Regresa todas las secciones que existan
	Route::get('getSecciones','seccionesController@allSecciones');
	//Obtiene una seccion por su id
	Route::get('getSeccion/{id}', 'seccionesController@getSeccion');

	/*** fin de modulo secciones ***/


	/*** Modulo de usuarios ***/

	Route::group(['middleware' => 'permission:usuarios'], function(){

		//Muestra el panel de usuarios 
		Route::get('usuarios' , 'usersController@index');

		Route::group(['middleware' => 'permission:usuarioN'], function(){
			//Muestra vista de registro de usuarios
			Route::get('registrarUser','usersController@viewRegistrar');
			//Registra un usuario
			Route::post('registrarUsuario' ,'usersController@registrar');
		});

		Route::group(['middleware' => 'permission:usuarioM'], function(){
			//Muesta la vista de edicion de Usuarios
			Route::get('editarUsuario', 'usersController@viewEditar');
			//Edita un usuario cuyo id se pase
			Route::post('editarUsuario/{id}', 'usersController@editUsuario');
		});

		Route::group(['middleware' => 'permission:usuarioD'], function(){
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
	
	/*** fin de modulo usuario ***/


	/*** Modulo de departamentos ***/

	Route::group(['middleware' => 'permission:departamentos'], function(){

		//Muestra el panel de departamentos 
		Route::get('departamentos','departamentosController@index');

		Route::group(['middleware' => 'permission:departamentoN'], function(){
			//Muestra vista de registro de departamento
			Route::get('registrarDepartamento','departamentosController@viewRegistrar');
			//Registra un Departamento
			Route::post('registrarDepartamento' ,'departamentosController@registrar');
		});
		
		Route::group(['middleware' => 'permission:departamentoD'], function(){
			//Muestra la vista de eliminacion de departamentos
			Route::get('eliminarDepartamento','departamentosController@viewEliminar');
			//Elimina un departamento cuyo id se pase
			Route::post('eliminarDepartamento/{id}','departamentosController@elimDepartamento');
		});
		
		//Obtiene un provedor por su id
		Route::get('getProvedor/{id}', 'provedoresController@getProvedor');

	});

	//Regresa todas los departamentos que existan
	Route::get('getDepartamentos','departamentosController@allDepartamentos');

	/*** fin de modulo departamentos ***/



	/*** Modulo de Insumos ***/

	Route::group(['middleware' => 'permission:insumos'], function(){

		//Muestra el panel de insumos 
		Route::get('insumos','insumosController@index');

		Route::group(['middleware' => 'permission:insumoN'], function(){
			//Muestra vista de registro de insumo
			Route::get('registrarInsumo','insumosController@viewRegistrar');
			//Registra un insumo
			Route::post('registrarInsumo' ,'insumosController@registrar');
		});

		Route::group(['middleware' => 'permission:insumoM'], function(){	
			//Muesta la vista de edicion de insumo
			Route::get('editarInsumo', 'insumosController@viewEditar');
			//Edita un insumo cuyo id se pase
			Route::post('editarInsumo/{id}', 'insumosController@editInsumo');
		});
		
		Route::group(['middleware' => 'permission:insumoD'], function(){
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


	/*** Modulo de unidad de medidas ***/

	//Muestra el panel de unidades de medidas 
	Route::get('medidas','unidadMedidasController@index');

	//Muestra vista de registro de unidad de medida
	Route::get('registrarMedida','unidadMedidasController@viewRegistrar');
	//Registra una unidad de medida
	Route::post('registrarMedida' ,'unidadMedidasController@registrar');

	//Muesta la vista de edicion de unidad de medida
	Route::get('editarMedida', 'unidadMedidasController@viewEditar');
	//Edita una unidad de medida cuyo id se pase
	Route::post('editarMedida/{id}', 'unidadMedidasController@editUnidad');

	//Muestra la vista de eliminacion de unidad de medidas
	Route::get('eliminarMedida','unidadMedidasController@viewEliminar');
	//Elimina una unidad de medida cuyo id se pase
	Route::post('eliminarMedida/{id}','unidadMedidasController@elimUnidad');

	//Regresa todas las unidades de medidas  que existan
	Route::get('getMedidas','unidadMedidasController@allUnidades');
	//Obtiene una unidad de medida por su id
	Route::get('getMedida/{id}', 'unidadMedidasController@getUnidad');

	/*** Fin de modulo unidad de medidas ***/


	/*** Modulo de inventario ***/

	Route::group(['middleware' => 'permission:inventarios'], function(){

		//Muestra el panel de inventario
		Route::get('inventario','inventarioController@index');

		Route::group(['middleware' => 'permission:inventarioH'], function(){
			//Muestra la vista de herramientas
			Route::get('inventarioHerramientas','inventarioController@viewHerramientas');
			//configura el valor min y med de los insumos que se especifiquen
			Route::post('estableceAlarmas','inventarioController@configuraAlarmas');
			//Regresa una lista de insumos que coincidan con la descripcion o codigo que se pase
			Route::get('getInventarioConsulta', 'inventarioController@getInsumosConsulta');
		});

		//Regresa todos las insumos en el inventario
		Route::get('getInventario','inventarioController@allInsumos');	
	});
	
	/*** Fin de modulo de inventario ***/


	/*** Modulo de entradas ***/

	Route::group(['middleware' => 'permission:entradas'], function(){

		//Muestra el panel de entradas
		Route::get('entradas','entradasController@index');

			//Muestra la vista detallada de una entrada
		Route::get('detallesEntrada','entradasController@detalles');

		//Regresa todas las entradas
		Route::get('getEntradas','entradasController@allEntradas');

		//Regresa todos los insumos que han entrado
		Route::get('getInsumosEntradas','entradasController@allInsumos');

		//Regresa los todos los datos de una entrada cuyo id se pase
		Route::get('getEntrada/{id}', 'entradasController@getEntrada');

		//Regresa todas las entradas de el numero de orden que se expecifique
		Route::get('getOrden/{number}', 'entradasController@getOrden');

	});

	Route::group(['middleware' => 'permission:entradaR'], function(){
		//Muestra la vista de registro de entrada
		Route::get('registrarEntrada', 'entradasController@viewRegistrar');
		//Registra una entrada
		Route::post('registrarEntrada' ,'entradasController@registrar');
	});

	//Regresa los todos los datos de una entrada cuyo codigo se especifique
	Route::get('getEntradaCodigo/{code}', 'entradasController@getEntradaCodigo');

	/*** Fin de modulo de entradas ***/


	/*** Modulo de salidas ***/

	Route::group(['middleware' => 'permission:salidas'], function(){
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

	Route::group(['middleware' => 'permission:salidaR'], function(){
		//Muestra la vista de registro de salida
		Route::get('registrarSalida', 'salidasController@viewRegistrar');
		//Registra una salida
		Route::post('registrarSalida' ,'salidasController@registrar');
	});

	/*** Fin de modulo de salidas ***/


	/*** Modulo de Modificaciones ***/

	Route::group(['middleware' => 'permission:modificaciones'], function(){
		//Muestra el panel de modificaciones
		Route::get('modificaciones','modificacionesController@index');
		//Muestra la vista detallada de una entrada modificada
		Route::get('detallesEntradaModificada','modificacionesController@detallesEntrada');
		//Muestra la vista de registro de modificacion
		Route::get('registrarModificacionEntrada', 'modificacionesController@viewRegistrar');
		//Registra una modificacion
		Route::post('registrarModificacionEntrada', 'modificacionesController@registrar');
		//Regresa todas las entradas modificadas
		Route::get('getEntradasModificadas','modificacionesController@allEntradas');
		//Regresa todos los datos de una entrada modificada cuyo id se pase
		Route::get('getEntradasModificada/{id}', 'modificacionesController@getEntrada');
	});

	/*** Fin de modulo de modificaciones ***/

	/*** Modulo de Estadisticas ***/

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

	/*** Fin de modulo de Estadisticas ***/

});