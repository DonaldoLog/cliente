<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desaparecido extends Model
{
	protected $table = 'desaparecidos_personas';
	protected $fillable = [		
		'apodo',
		'edadAparente',
		'edadExtravio',
		'embarazo',
		'tipoGestacion',
		'numGestacion',
		'rumoresBebe',
		'pormenores',
		'antecedentesJudiciales',
		'organizacion',
		'tipoPersona',
		'otroDocIdentidad',
		'numDocIdentidad',
		'correoElectronico',
		'telefonos',
		'notificaciones',
		'tieneHijos',
		'notificaciones',
		'informante',
		'idPersona',
		'idEdocivil',
		'idOcupacion',
		'idEscolaridad',
		'idDialecto',
		'idCargo',
		'idParentesco',
		'idDocumentoIdentidad',
		'idCedula',
	];

	public function familiares()
	{
		return $this->hasMany('App\Models\Familiar', 'idDesaparecido', 'id');
	}

	public function domicilios()
	{
		return $this->hasMany('App\Models\Domicilio', 'idDesaparecido', 'id');
	}

	public function antecedentes()
	{
		return $this->hasMany('App\Models\Antecedente', 'idAntecedente', 'id');
	}

	public function edocivil()
	{
		return $this->belongsTo('App\Models\CatEstadoCivil','idEdocivil');
	}

	/*public function nacionalidad()
	{
		return $this->belongsTo('App\Models\CatNacionalidad','id');
	}*/

	public function ocupacion()
	{
		return $this->belongsTo('App\Models\CatOcupacion','idOcupacion');
	}

	public function escolaridad()
	{
		return $this->belongsTo('App\Models\CatEscolaridad','idEscolaridad');
	}

	public function persona()
	{
		return $this->belongsTo('App\Models\Persona','id');
	}

	public function cedula()
	{
		return $this->belongsTo('App\Models\Cedula', 'id');
	}	

}
