<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Prenda extends Model
{
	protected $table = 'desaparecidos_prendas';
	protected $fillable = [	
	    'tipo',
	    'material',
	    'color',
	    'otroColor',
	    'dibujoBordadoFranja',
	    'marcaOrigen',
	    'talla',
	    'idCedula',
	];
}
