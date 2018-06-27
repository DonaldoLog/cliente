<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Route::middleware(['jwt.auth'])->group(function(){


Route::get('/', 'InicioController@index');
// Route::get('cedula/{idCedula}', 'CedulaController@show');
	Route::resource('cedula','CedulaController');

	//Route::resource('oficioCedula','OficioCedulaController');
	Route::resource('informante','InformanteController');

	Route::get('extraviado/create/{idCedula}', 'ExtraviadoController@create')
		->name('extraviado.create_desaparecido');
	Route::post('extraviado/cargarfoto', 'ExtraviadoController@cargarFoto')->name('extraviado.cargar_foto');
	Route::resource('extraviado','ExtraviadoController');

	Route::resource('familiar','FamiliarController');

	Route::resource('domicilios','DomicilioController');

	Route::resource('antecedentes','AntecedenteController');

	Route::resource('contactos','ContactoController');

	Route::resource('vestimentas','VestimentaController');

	Route::resource('senas_particulares','SenasParticularesController');

	Route::resource('datos_dentales','DatosDentalesController');

	Route::resource('oficio','oficioController');

	Route::resource('oficiosDependencias','OficioDependencia');

	//Ruta para la vista de relacionar oficios con dependencias AlfredoR
	Route::resource('configuraciones','ConfigDocumentosController');
	Route::resource('dependencia','DependenciaController');
	Route::resource('encargado','EncargadoController');
	Route::resource('GeneraOficio','GeneraOficioController');

    //comento tacho, si truena algo,descomentar xD
    //Route::resource('dependencia_destinatario','AgregarDependenciaController');

	Route::resource('datos_dentales_dientes_perdidos','DatosDentalesDientesPerdidosController');
	// inician rutas descripción física
	Route::post('/descripcionfisica/store', 'DescripcionFisicaController@store')->name('descripcionfisica.store');

	Route::get('/descripcionfisica/descripcionf/{idPersonaDesaparecida}', 'DescripcionFisicaController@show')->name('descripcionfisica.show');

	Route::get('/descripcionfisica/get_datosfisicos/{idExtraviado}', 'DescripcionFisicaController@getdatosfisicos')->name('descripcionfisica.get_datosfisicos');

	Route::resource('/descripcionfisica','DescripcionFisicaController');

	//finalizan rutas descripción física
	Route::get('consultas/get_cedulas', 'ConsultasController@jsonCedulas');


	Route::resource('reporteador', 'ReporteadorController');
	Route::post('consultas/get_desaparecidos_personas_todos', 'ConsultasController@jsonDesaparecidosPersonaTodos')->name('consultas.get_desaparecidos_personas_todos');
	Route::post('consultas/get_desaparecidos_personas', 'ConsultasController@jsonDesaparecidosPersona')->name('consultas.get_desaparecidos_personas');
	Route::get('consultas/get_cat_partes_cuerpo/{idDesaparecido}/{idParteCuerpo}', 'ConsultasController@json_cat_partes_cuerpo');
	//Route::post('remover-permiso/{idCarpeta}/{idTipo}/{id}', 'CarpetaController@removerPermiso')->name('remover.permiso');



Route::get('consultas/get_informantes/{idCedula}', 'ConsultasController@jsonInformantes')
	->name('consultas.get_informantes');
Route::get('consultas/get_familiares/{idDesaparecido}', 'ConsultasController@jsonFamiliares')
	->name('consultas.get_familiares');
Route::get('consultas/get_domicilios/{idDesaparecido}', 'ConsultasController@jsonDomicilios')
	->name('consultas.get_domicilios');
Route::get('consultas/get_contactos/{idDesaparecido}', 'ConsultasController@jsonContactosPersona')
	->name('consultas.get_contactos');
Route::get('consultas/get_antecedentes/{idDesaparecido}', 'ConsultasController@jsonAntecedentes')
	->name('consultas.get_antecedentes');

Route::get('consultas/get_parentescos', 'ConsultasController@jsonParentescos')
	->name('consultas.get_parentescos');
Route::get('consultas/get_nacionalidades', 'ConsultasController@jsonNacionalidades')
	->name('consultas.get_nacionalidades');
Route::get('consultas/get_documentos_identidad', 'ConsultasController@jsonDocumentosIdentidad')
	->name('consultas.get_documentos_identidad');
Route::get('consultas/get_tipos_domicilios', 'ConsultasController@jsonTiposDomicilios')
	->name('consultas.get_tipos_domicilios');
Route::get('consultas/get_estados', 'ConsultasController@jsonEstados')
	->name('consultas.get_estados');
Route::get('consultas/get_municipios/{idEstado}', 'ConsultasController@jsonMunicipios')
	->name('consultas.get_municipios');
Route::get('consultas/get_localidades/{idMunicipio}', 'ConsultasController@jsonLocalidades')
	->name('consultas.get_localidades');
Route::get('consultas/get_colonias/{idMunicipio}', 'ConsultasController@jsonColonias')
	->name('consultas.get_colonias');
Route::get('consultas/get_tipos_telefonos', 'ConsultasController@jsonTiposTelefonos')
	->name('consultas.get_tipos_telefonos');
Route::get('consultas/get_ladas', 'ConsultasController@jsonLadas')
	->name('consultas.get_ladas');

Route::get('consultas/get_dependencias', 'ConsultasController@jsonDependecias')
	->name('consultas.get_dependencias');
Route::get('consultas/get_destinatarios', 'ConsultasController@jsonDestinatarios')
	->name('consultas.get_destinatarios');
Route::get('consultas/get_catprendas/{idVestimenta}', 'ConsultasController@jsonCatPrendas')->name('consultas.get_catprendas');
Route::get('consultas/get_colores', 'ConsultasController@jsonCatColores')->name('consultas.get_colores');
Route::get('consultas/get_vestimentas/{idDesaparecido}', 'ConsultasController@jsonVestimentas')->name('consultas.get_vestimentas');
// Mostrando codigos postales que pertenecen a un municipio.
Route::get('consultas/codigos/{idMunicipio}', 'ConsultasController@jsonCodigos');
// Mostrando codigos postales que pertenecen a un municipio cuando hay un cambio en colonias.
Route::get('consultas/codigos2/{idColonia}', 'ConsultasController@jsonCodigos2');
// Calcula la edad años meses dias al día actual.
Route::get('consultas/edad/{fecha_nacimiento}', 'ConsultasController@getEdad');

/************************* RUTAS DE VESTIMENTA **********************************/
Route::get('consultas/json_partes_cuerpo/{idParteCuerpo}', 'ConsultasController@json_partes_cuerpo')->name('consultas.jsonPartes');
Route::get('consultas/json_subparte_cuerpo/{idParteCuerpo}', 'ConsultasController@json_subparte_cuerpo')->name('consultas.jsonSubpartes');

Route::get('consultas/get_diente/{id}', 'ConsultasController@json_diente')
	->name('consultas.get_diente');
Route::get('consultas/json_cabecera_partes/{idParteCuerpo}', 'ConsultasController@json_cabecera_partes')->name('consultas.jsonCabecerasPartes');

//Se consulta la tabla de la relación de oficios con dependencias AlfredoR
Route::get('consultas/get_oficios', 'ConsultasController@jsonOficioDependencia');

Route::resource('consultas','ConsultasController');

// Consultar todas la cedulas de investigación.

//Rutas alejandro
Route::get('/desaparecido/generarboletin/{idCedula}', 'ConsultasController@jsonBoletin')
	->name('consultas.get_boletin');

Route::get('/desaparecido/generarboletinPDF', 'MailController@generar_boletin');

Route::post('/desaparecido/generarboletinPDF/{idCedula}/{idPersona}', 'MailController@generar_boletin');
//Route::get('/desaparecido/generarboletinPDF/', 'MailController@generar_boletin');
//boletin controller
Route::resource('boletin','BoletinController');
//MailController
Route::resource ('mail','MailController');
Route::get ('enviar','MailController@store');
//Cargar las imagenes
Route::resource('image-view','CargarDocumentosController');
Route::post('image-view','CargarDocumentosController@store');
//ruta a controlador MailController para envio de correo
Route::post('/enviar_correo','MailController@store');
Route::get('imagenAntecedentesM','AntecedentesMedicosController@show');
Route::post('anexosC/imagenAntecedentesM','AnexosController@store');
/*Route::post('/imagenAntecedentesM/store_path','AntecedentesMedicosController@store_path')
 ->name('/imagenAntecedentesM.store_path');*/
Route::delete('imagenAntecedentesM/{id}','AntecedentesMedicosController@destroy');



//ladas
Route::get('lada/{id}', 'LadaController@getLadas');
Route::resource('/lada','LadaController');


//Rutas Ruben
	//mis rutas
Route::get('/desaparecido/vestimenta/{idCedula}', 'DesaparecidoController@show_vestimenta')
	->name('desaparecido.show_vestimenta');

/*Route::get('consultas/get_prendas/{idCedula}', 'ConsultasController@jsonPrendas')
	->name('consultas.get_prendas');*/
Route::get('consultas/get_accesorios/{idCedula}', 'ConsultasController@jsonAccesorios')
	->name('consultas.get_accesorios');
Route::get('consultas/get_calzado/{idCedula}', 'ConsultasController@jsonCalzado')
	->name('consultas.get_calzado');

Route::post('/desaparecido/store_vestimenta', 'DesaparecidoController@store_vestimenta')
	->name('desaparecido.store_vestimenta');

Route::post('/desaparecido/update_calzado', 'DesaparecidoController@update_calzado')
	->name('desaparecido.update_calzado');

Route::post('/domicilio/update', 'DomicilioController@update')
	->name('domicilio.update');

Route::post('/desaparecido/store_accesorios', 'DesaparecidoController@store_accesorios')
	->name('desaparecido.store_accesorios');

Route::post('/desaparecido/update_accesorios', 'DesaparecidoController@update_accesorios')
	->name('desaparecido.update_accesorios');

Route::post('/desaparecido/update_vestimenta', 'DesaparecidoController@update_vestimenta')
	->name('desaparecido.update_vestimenta');

//Rutas para descripcion fisica


//Route::get('descripcionfisica/json_subparte_cuerpo/{idParteCuerpo}', 'DescripcionFisicaController@json_subparte_cuerpo')->name('descripcionfisica.jsonSubpartes');

//fin de mis rutas
//Rutas para antedecedentes medicos
Route::get('/antecedentesmedicos/antecedentesm/{idPersonaDesaparecida}', 'AntecedentesMedicosController@show')
	->name('antecedentesmedicos.show');
Route::post('/antecedentesmedicos/store', 'AntecedentesMedicosController@store');
Route::resource('/antecedentesmedicos','AntecedentesMedicosController');

//mostrar vista de señas particulares

Route::get('consultas/get_senas/{idCedula}', 'ConsultasController@jsonSenas')
	->name('consultas.get_senas');

//mostrar la vista de datos dentales
Route::get('/datos_dentales/{idDesaparecido}','DatosDentalesController@show_datos_dentales')
	->name('datos_dentales.show');
Route::post('/datos_dentales/store_datos_dentales', 'DatosDentalesController@store_datos_dentales')
	->name('datos_dentales.store_datos_dentales');
Route::post('anexosC/imagenAntecedentesD', 'AnexosController@store');
Route::delete('datosDentales/{id}','datosDEntalesController@destroy');

//la siguiente es una ruta para crear el pdf


Route::post('/mail/pdf', 'MailController@pdf')
	->name('mail.pdf');

//Rutas para antedecedentes medicos
/*Route::get('/antecedentesmedicos/antecedentesm/{idPersonaDesaparecida}', 'AntecedentesMedicosController@show')
	->name('antecedentesmedicos.show');
Route::post('/antecedentesmedicos/store', 'AntecedentesMedicosController@store');
Route::resource('/antecedentesmedicos','AntecedentesMedicosController');*/

Route::get('/email/{idCedula}', 'MailController@show')->name('mail.show');
// Rutas de la dependencias

Route::resource('/dependencias','MailController');
Route::get('/get_dependencias', 'MailController@getDependencias')
	->name('dependencias.get_dependencias');

Route::get('/envio_documentos', 'MailController@show');

Route::get('/generarDocs', 'CargarDocumentosController@crearDocumento')
	->name('generarDocs.crearDocumentos');

	//esta es la ruta .

Route::get('/index_reporteador', 'ReporteadorController@show')->name('reporteador');

Route::get('/index_agregar_dependencias', 'AgregarDependenciaController@show')->name('dependencias.destinatarios');
Route::post('/index_agregar_dependencias/store_destinatario', 'AgregarDependenciaController@store_destinatario')
	->name('index_agregar_dependencias.store_destinatario');
Route::post('/index_agregar_dependencias/store_dependencia', 'AgregarDependenciaController@store_dependencia')
	->name('index_agregar_dependencias.store_dependencia');
Route::post('/index_agregar_dependencias/update_dependencia', 'AgregarDependenciaController@update_dependencia')
	->name('index_agregar_dependencias.update_dependencia');
Route::post('/index_agregar_dependencias/update_destinatario', 'AgregarDependenciaController@update_destinatario')
	->name('index_agregar_dependencias.update_destinatario');



/*
// Consultar todas la cedulas de investigación.
Route::get('/desaparecido/edad/{fecha_nacimiento}', 'DesaparecidoController@getEdad');
//la siguiente ruta es la ruta de la vista correo
Route::get('/desaparecido/correo/{idCedula}/{idPersona}', 'DesaparecidoController@show_correo');
Route::get('/desaparecido/boletin', 'MailController@show_boletin');

Route::get('/desaparecido/desaparecido_domicilio/{idCedula}', 'DesaparecidoController@show_desaparecido_domicilio');


Route::get('/desaparecido/desaparecido_contacto/{idCedula}', 'DesaparecidoController@show_desaparecido_contacto');



Route::post('/desaparecido/getpersona', 'DesaparecidoController@getPersona')
	->name('desaparecido.getpersona');

Route::post('/desaparecido/store_cedula', 'DesaparecidoController@store_cedula')
	->name('desaparecido.store_cedula');

Route::post('/desaparecido/store_desaparecido_domicilio', 'DesaparecidoController@store_desaparecido_domicilio')
	->name('desaparecido.store_desaparecido_domicilio');

Route::post('/desaparecido/store_desaparecido_contacto', 'DesaparecidoController@store_desaparecido_contacto')
	->name('desaparecido.store_desaparecido_contacto');

Route::post('/desaparecido/store_desaparecido_familiar', 'DesaparecidoController@store_desaparecido_familiar')
	->name('desaparecido.store_desaparecido_familiar');

// Mostrar formulario de la persona desaparecida domicilio.
Route::get('/desaparecido/persona_desaparecida_domicilio/{idCedula}/{idPersona}', 'DesaparecidoController@show_desaparecido_domicilio');

// Guardando los datos de la persona desaparecida.
Route::post('/desaparecido/store_desaparecido', 'DesaparecidoController@store_desaparecido')
	->name('desaparecido.store_desaparecido');

// Mostrar formulario de la persona desaparecida.
Route::get('/desaparecido/persona_desaparecida/{idCedula}', 'DesaparecidoController@show_desaparecido');

// Guardar informante
Route::post('/desaparecido/store_informante', 'DesaparecidoController@store_informante')
	->name('desaparecido.store_informante');
// Mostrar formulario del informante
Route::get('/desaparecido/informante/{idCedula}', 'DesaparecidoController@show_informante');
//mostrar vista de señas particulares
Route::get('/desaparecido/senas_particulares/{idCedula}','DesaparecidoController@show_senas_particulares');
Route::post('/desaparecido/store_senas', 'DesaparecidoController@store_senas')
	->name('desaparecido.store_senas');
Route::get('consultas/get_senas/{idCedula}', 'ConsultasController@jsonSenas')
	->name('consultas.get_senas');

//mostrar la vista de datos dentales
Route::get('/desaparecido/datos_dentales','DesaparecidoController@show_datos_dentales');
Route::post('/desaparecido/store_datos_dentales', 'DesaparecidoController@store_sdatos_dentales')
	->name('desaparecido.store_datos_dentales');

Route::resource('/desaparecido','DesaparecidoController');


/*Route::resource('domicilio','DomiciliosController');
Route::get('codigos/{id}', 'DomiciliosController@getCodigos');
Route::get('municipio/{id}', 'DomiciliosController@getMunicipios');
Route::get('localidades/{id}', 'DomiciliosController@getLocalidades');
Route::get('colonias2/{id}', 'DomiciliosController@getColonias2');
Route::get('colonias/{id}', 'DomiciliosController@getColonias');
Route::get('codigos2/{id}', 'DomiciliosController@getCodigos2');*/

//Route::resource('boletin', 'BoletinController@show');


Route::get('/guardarDocumento','CargarDocumentosController@create')
	->name('guardarDocumento.create');
//Obtiene el nombre del documento
Route::get('/get_dep','ConsultasController@jsonDep')
	->name('get_DepDes.jsonDep');
//Obtiene los destinatarios de la dependencia elegida
Route::get('/get_des','ConsultasController@jsonDes')
	->name('get_DepDes.jsonDes');
//envio el nombre de los documentos al controlador para que este se encargue de enviar  los correos correspondientess
Route::get('/envioDocumentos','MailController@envioDocumentos');

//Anexos
Route::get('anexos','AnexosController@show');
//Route::post('/desaparicion','DesaparicionController@store');
//Route::get('desaparicion/create/{$id}', 'DesaparicionController@create')
	//->name ('desaparicion.create_desaparicion');
Route::resource('/desaparicion','DesaparicionController');

//Route::resource('desaparicion' , 'DesaparicionController@store');
Route::post('desaparicion', 'DesaparicionController@store');
Route::put('desaparicion/{id}', 'DesaparicionController@update');

Route::get('anexosC','AnexosController@index')
->name ('anexoscontroller.index');

Route::post('anexosC/imagenDesaparecido','AnexosController@store');



// Route::POST('conexion/uipj', 'ConexionUipjController@resolviendo_peticion');

/*OFICIOS*/
Route::post('oficios', 'OficioController@oficios')->name('oficios');
Route::post('getToken', 'OficioController@getToken')->name('getToken');
Route::post('saveOficio', 'OficioController@saveOficio')->name('saveOficio');
Route::post('intentos', 'OficioController@intentos')->name('intentos');
Route::get('getOficios', 'OficioController@getOficios')->name('getOficios');
Route::post('getOficio', 'OficioController@getOficio')->name('getOficio');
Route::post('addOficio', 'OficioController@addOficio')->name('addOficio');
Route::post('updateOficio', 'OficioController@updateOficio')->name('updateOficio');

Route::get('oficioprueba/{id}', 'OficioController@oficioprueba')->name('oficioprueba');
Route::get('/pruebasformatos', function(){
    return view('oficios.prueba');
    });

//oficios
Route::get('jsonOficio1/{id}', 'OficioCedulaController@json_oficio1')->name('jsonOficio1');
Route::get('json_oficio2/{id}', 'OficioCedulaController@json_oficio2')->name('json_oficio2');
Route::resource('oficioCedula','OficioCedulaController');
});
