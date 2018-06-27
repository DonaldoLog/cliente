<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Cedula;
use App\Models\Persona;
use App\Models\Desaparecido;
use App\Models\Domicilio;
use App\Http\Requests\InformanteRequest;

class InformanteController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(InformanteRequest $request)
	{
		$informante = (is_null($request->input('informante'))) ? 0 : 1 ;
		$autorizado = (is_null($request->input('notificaciones'))) ? 0 : 1 ;

		$tipo_telefono = $request->input('tipoTelefono');
		$lada = $request->input('lada');
		$ext = $request->input('ext');
		foreach ($request->input('telefono') as $index => $value) {
			$telefonos[] = array('tipoTelefono' => $tipo_telefono[$index],
								'lada' => $lada[$index],
								'telefono' => $value,
								'ext' => $ext[$index]
						);
		}

		$persona = Persona::create([
			'nombres'           => $request->input('nombres'),
			'primerAp'          => $request->input('primerAp'),
			'segundoAp'         => $request->input('segundoAp'),
			'idNacionalidad'    => $request->input('idNacionalidad'),
		]);

		$desaparecido = Desaparecido::create([
			'idPersona'             => $persona->id,
			'idCedula'              => $request->input('idCedula'),
			'idParentesco'          => $request->input('idParentesco'),
			'idDocumentoIdentidad'  => $request->input('idDocumentoIdentidad'),
			'otroDocIdentidad'      => $request->input('otroDocIdentidad'),
			'numDocIdentidad'       => $request->input('numDocIdentidad'),
			'correoElectronico'     => $request->input('correoElectronico'),
			'telefonos'          	=> json_encode($telefonos),
			'informante'            => $informante,
			'notificaciones'        => $autorizado,
			'tipoPersona'           => 'INFORMANTE',
		]);

		$domicilio = Domicilio::create([
			'idDesaparecido'    => $desaparecido->id,
			'tipoDireccion'     => $request->input('tipoDireccion'),
			'calle'             => $request->input('calle'),
			'numExterno'        => $request->input('numExterno'),
			'numInterno'        => $request->input('numInterno'),
			'idestado'          => $request->input('idEstado'),
			'idMunicipio'       => $request->input('idMunicipio'),
			'idLocalidad'       => $request->input('idLocalidad'),
			'idColonia'         => $request->input('idColonia'),
			'idCodigoPostal'    => $request->input('idCodigoPostal'),
		]);


		$data = array('nombres' => $desaparecido->persona->nombres,
						'primerAp' => $desaparecido->persona->primerAp,
						'segundoAp' => $desaparecido->persona->segundoAp,
						'informante' => $desaparecido->informante,
						'notificaciones' => $desaparecido->notificaciones, );

		return response()->json($data);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request,$id)
	{
		$cedula = \App\Models\Cedula::find($id);

		$sexos = array('H' => 'MASCULINO', 'M' => 'FEMENINO');
		$escolaridades      = \App\Models\CatEscolaridad::all()->pluck('nombre','id');
		$ocupaciones        = \App\Models\CatOcupacion::all()->pluck('nombre','id');
		$identificaciones   = \App\Models\CatDocumento::all()->pluck('nombre','id');
		$edoscivil          = \App\Models\CatEstadoCivil::all()->pluck('nombre','id');

		$parentescos = \App\Models\CatParentesco::all()->pluck('nombre','id');
		$nacionalidades     = \App\Models\CatNacionalidad::all()->pluck('nombre', 'id');
		$ladas = \App\Models\CatNacionalidad::all()->pluck('lada','id');
		$documentos     = \App\Models\CatDocumento::all()->pluck('nombre', 'id');
		$estados            = \App\Models\CatEstado::all()->pluck('nombre','id');

		$municipios = array();
		$localidades = array();
		$colonias = array();
		$codigos = array();
		$tiposDireccion = array('PERSONAL' => 'PERSONAL',
								'TRABAJO' => 'TRABAJO',
								'FAMILIAR' => 'FAMILIAR');

		$tiposTelefonos = array('CASA' => 'CASA',
								'TRABAJO' => 'TRABAJO',
								'CELULAR' => 'CELULAR');

		$informantes = \DB::table('desaparecidos_personas AS dp')
            ->where('dp.tipoPersona', 'INFORMANTE')
            ->where('dp.informante','1')
            ->where('dp.idCedula', $cedula->id)
            ->get();
         //dd($informantes);
		 $token=$request->token;

		return view('informante.index',compact(
											'cedula',
											'sexos',
											'escolaridades',
											'ocupaciones',
											'identificaciones',
											'edoscivil',
											'dialectos',
											'parentescos',
											'nacionalidades',
											'ladas',
											'documentos',
											'estados',
											'municipios',
											'localidades',
											'colonias',
											'informantes',
											'codigos',
											'tiposDireccion',
											'tiposTelefonos',
											'token'
										));


	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(InformanteRequest $request, $id)
	{

	   $desaparecido = Desaparecido::find($id);
	   $domicilios = Domicilio::find($desaparecido->domicilios[0]['id']);

	   $noDomicilio = $desaparecido->domicilios[0]['id'];


		$informante = (is_null($request->input('informante'))) ? 0 : 1 ;
		$autorizado = (is_null($request->input('notificaciones'))) ? 0 : 1 ;

        $tipo_telefono = $request->input('tipoTelefono');
		$lada = $request->input('lada');
		$ext = $request->input('ext');
		foreach ($request->input('telefono') as $index => $value) {
			$telefonos[] = array('tipoTelefono' => $tipo_telefono[$index],
								'lada' => $lada[$index],
								'telefono' => $value,
								'ext' => $ext[$index]
						);
		}

		$persona = Persona::find($desaparecido->persona->id)->update([
			'nombres'           => $request->input('nombres'),
			'primerAp'          => $request->input('primerAp'),
			'segundoAp'         => $request->input('segundoAp'),
			'idNacionalidad'    => $request->input('idNacionalidad'),
		]);


		$desaparecido = Desaparecido::find($desaparecido->id)->update([
			'idParentesco'          => $request->input('idParentesco'),
			'idDocumentoIdentidad'  => $request->input('idDocumentoIdentidad'),
			'otroDocIdentidad'      => $request->input('otroDocIdentidad'),
			'numDocIdentidad'       => $request->input('numDocIdentidad'),
			'correoElectronico'     => $request->input('correoElectronico'),
            'telefonos'          	=> json_encode($telefonos),
			'informante'            => $informante,
			'notificaciones'        => $autorizado,
			'tipoPersona'           => 'INFORMANTE',
		]);

		$domicilio = \App\Models\Domicilio::find($noDomicilio)->update([
			'tipoDireccion'     => $request->input('tipoDireccion'),
			'calle'             => $request->input('calle'),
			'numExterno'        => $request->input('numExterno'),
			'numInterno'        => $request->input('numInt'),
			'idestado'          => $request->input('idEstado'),
			'idMunicipio'       => $request->input('idMunicipio'),
			'idLocalidad'       => $request->input('idLocalidad'),
			'idColonia'         => $request->input('idColonia'),
			'idCodigoPostal'    => $request->input('idCodigoPostal'),
			'telefono'          => json_encode(array('tipoTelefono' => 'PERSONAL',
									 'lada' => $request->input('lada'),
									 'telefono' => $request->input('telefono'),
									 'ext' => $request->input('ext'))),
		]);

		if ($desaparecido) {
					$desaparecido = Desaparecido::find($id);
					$data = array('nombres' => $desaparecido->persona->nombres,
						'primerAp' => $desaparecido->persona->primerAp,
						'segundoAp' => $desaparecido->persona->segundoAp,
						'informante' => $desaparecido->informante,
						'notificaciones' => $desaparecido->notificaciones );

		}

		return response()->json($data);


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
