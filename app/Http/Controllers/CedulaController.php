<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cedula;
use Session;

class CedulaController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//$familiares = \App\Models\Familiar::where('idDesaparecido', $idDesaparecido)->with('parentesco')->get();
		//$cedulas = \App\Models\Cedula::with('desaparecidos')->get();
		$cedulas = \DB::table('desaparecidos_personas as d')
							->join('desaparecidos_cedula_investigacion as c', 'c.id', '=', 'd.idCedula')
							->join('persona as p', 'd.idPersona', '=', 'p.id')
							->join('cat_nacionalidad as n', 'p.idNacionalidad', '=', 'n.id')
							->where('d.tipoPersona','DESAPARECIDA')
							->select('c.id','c.idDialecto', 'c.created_at', 'p.nombres', 'p.primerAp', 'p.segundoAp', 'p.sexo','n.nombre as nacionalidad', 'd.apodo', 'd.edadExtravio')
							->get();



		return view('cedula.index',compact('cedulas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$cedula = new Cedula;

		$cedula->entrevistadorNombres 		= Session::get('fiscalNombres');
		$cedula->entrevistadorPrimerAp	 	= Session::get('fiscalPrimerAp');
		$cedula->entrevistadorSegundoAp 	= Session::get('fiscalSegundoAp');
		$cedula->entrevistadorCargo 		= Session::get('fiscalCargo');
		/*$cedula = (object) array('idFiscal' 		=> Session::get('idFiscal'),
						'entrevistadorNombres' 		=> Session::get('fiscalNombres'),
						'entrevistadorPrimerAp' 	=> Session::get('fiscalPrimerAp'),
						'entrevistadorSegundoAp' 	=> Session::get('fiscalSegundoAp'),
						'entrevistadorCargo' 		=> Session::get('fiscalCargo'),
						 );*/

		$dialectos = \App\Models\CatDialecto::all()->pluck('nombre','id');

		return view('cedula.create',compact('cedula',
											'dialectos'
									));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//dd($request->toArray());
		$cedula = Cedula::create([
			'entrevistadorNombres' 			=> Session::get('fiscalNombres'),
			'entrevistadorPrimerAp' 		=> Session::get('fiscalPrimerAp'),
			'entrevistadorSegundoAp'		=> Session::get('fiscalSegundoAp'),
			'entrevistadorCargo'			=> Session::get('fiscalCargo'),
			'interpreteNombres' 			=> $request->input('interpreteNombres'),
			'interpretePrimerAp' 			=> $request->input('interpretePrimerAp'),
			'interpreteSegundoAp'			=> $request->input('interpreteSegundoAp'),
			'interpreteOrganizacion'		=> $request->input('interpreteOrganizacion'),
			'otroDialecto'					=> $request->input('otroDialecto'),
			'entrevistadorPrimeraVez'		=> $request->input('entrevistadorPrimeraVez'),
			'fechaVisita'					=> $request->input('fechaVisita'),
			'idDialecto' 					=> $request->input('entrevistadorDialecto')
		]);

		return redirect()->action(
			'CedulaController@show', ['id' => $cedula->id]
		);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request,$id)
	{
		// dd($request->token);
		$cedula = Cedula::find($id);
		$dialectos = \App\Models\CatDialecto::all()->pluck('nombre','id');
		$token=$request->token;
		//dd($cedula->toArray());

		return view('cedula.show',compact('cedula',
											'dialectos',
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
		$cedula = Cedula::find($id);

		$dialectos = \App\Models\CatDialecto::all()->pluck('nombre','id');

		return view('cedula.edit',compact('cedula',
										'dialectos'
									));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//dd($request);
		$cedula = Cedula::find($id)->update([
			'entrevistadorNombres' 			=> Session::get('fiscalNombres'),
			'entrevistadorPrimerAp' 		=> Session::get('fiscalPrimerAp'),
			'entrevistadorSegundoAp'		=> Session::get('fiscalSegundoAp'),
			'entrevistadorCargo'			=> Session::get('fiscalCargo'),
			'interpreteNombres' 			=> $request->input('interpreteNombres'),
			'interpretePrimerAp' 			=> $request->input('interpretePrimerAp'),
			'interpreteSegundoAp'			=> $request->input('interpreteSegundoAp'),
			'interpreteOrganizacion'		=> $request->input('interpreteOrganizacion'),
			'otroDialecto'					=> $request->input('otroDialecto'),
			'entrevistadorPrimeraVez'		=> $request->input('entrevistadorPrimeraVez'),
			'fechaVisita'					=> $request->input('fechaVisita'),
			'idDialecto' 					=> $request->input('entrevistadorDialecto')
            ]);

		return redirect()
				->route('cedula.show', ['cedula' => $id]);

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
