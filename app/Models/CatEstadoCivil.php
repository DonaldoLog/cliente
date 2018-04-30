<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatEstadoCivil extends Model
{
	protected $table = 'cat_estado_civil';

	protected $fillable = ['nombre'];

	public function desaparecidos()
	{
		return $this->hasMany('App\Models\Desaparecido', 'idDesaparecido', 'id');
	}

}
