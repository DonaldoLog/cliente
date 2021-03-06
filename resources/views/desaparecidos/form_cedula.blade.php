@extends('layouts.app_uipj')

@section('content')

{!! Form::model($cedula, ['action' => 'DesaparecidoController@store_cedula']) !!}
	<div class="card-body">
  		<div class="row">
  			<div class="col-lg-4" id="otro_dialec2">
				{!! Form::label ('entrevistadorNombre','Nombre del entrevistador:') !!}
				{!! Form::text ('entrevistadorNombres',
								old('entrevistadorNombres'),
								['class' => 'form-control mayuscula sinEnter soloLetras',
										'placeholder' => 'Ingrese el nombre',
										'id' => 'entrevistadorNombres',
										'data-validation' => 'required',
										'data-validation-error-msg-required' => 'El campo es requerido'
								] )!!}
		  	</div>
			<div class="col-lg-4" id="otro_dialec4">
				{!! Form::label ('entrevistadorPrimerAp','Primer Apellido:') !!}
				{!! Form::text ('entrevistadorPrimerAp',
									old('entrevistadorPrimerAp'),
									['class' => 'form-control mayuscula sinEnter soloLetras',
										'placeholder' => 'Ingrese el primer apellido',
										'id' => 'entrevistadorPrimerAp',
										'data-validation' => 'required',
										'data-validation-error-msg-required' => 'El campo es requerido'
									] )!!}
		  	</div>
			<div class="col-lg-4" id="otro_dialec5">
				{!! Form::label ('entrevistadorSegundoAp','Segundo Apellido:') !!}
				{!! Form::text ('entrevistadorSegundoAp',
								old('entrevistadorSegundoAp'),
								['class' => 'form-control mayuscula sinEnter soloLetras',
										'placeholder' => 'Ingrese el segundo apellido',
										'id' => 'entrevistadorSegundoAp',
										'data-validation' => 'required',
										'data-validation-error-msg-required' => 'El campo es requerido'
								])!!}
		  	</div>
		</div>

		<div class="row">
				<div class="col">
					{!! Form::label ('entrevistadorCargo','Cargo:') !!}
					{!! Form::text ('entrevistadorCargo',
									Session::get('cargo'),
									['class' => 'form-control mayuscula sinEnter',
										'id' => 'entrevistadorCargo',
										'data-validation' => 'required',
										'data-validation-error-msg-required' => 'El campo es requerido'										
									] )!!}
			  	</div>
		</div>

	  	<div class="row">
			  	<div class="col-lg-4">
					{!! Form::label ('entrevistadorDialecto','Idioma o dialecto durante la entrevista:') !!}
					{!! Form::select ('entrevistadorDialecto',
										$dialectos,
										'',
										['class' => 'form-control',
											'id' => 'entrevistadorIdioma'
										] )!!}	
					
				</div>
				<div class="col" id="otro_dialec" style="display:none">
					{!! Form::label ('otroDialecto','Especifique:') !!}
					{!! Form::text ('otroDialecto',
									old('Nombre del intérprete'),
									['class' => 'form-control mayuscula sinEnter soloLetras',
										'placeholder' => 'Ingrese el nombre del idioma o dialecto',
										'id' => 'otroDialecto',
										'data-validation' => 'required',
										'data-validation-error-msg-required' => 'El campo es requerido',
										'data-validation-depends-on' => 'entrevistadorIdioma',
										'data-validation-depends-on-value' =>'OTRO'
									] )!!}
			  	</div>
				
		</div>

  		<div class="row" id="divInterpreteNombre" style="display:none">
  			<div class="col-lg-4" >
				{!! Form::label ('interpreteNombres','Nombre del intérprete:') !!}
				{!! Form::text ('interpreteNombres',old('interpreteNombres'), ['class' => 'form-control mayuscula sinEnter soloLetras', 'placeholder' => 'Ingrese el nombre', 'id' => 'interpreteNombres', 'data-validation' => 'required','data-validation-depends-on' => 'entrevistadorIdioma','data-validation-depends-on-value' =>'OTRO','data-validation-error-msg-required' => 'El campo es requerido'] )!!}
		  	</div>
			<div class="col-lg-4" >
				{!! Form::label ('interpretePrimerAp','Primer Apellido:') !!}
				{!! Form::text ('interpretePrimerAp',old('Nombre del intérprete'), ['class' => 'form-control mayuscula sinEnter soloLetras', 'placeholder' => 'Ingrese el primer apellido', 'id' => 'interpretePrimerAp', 'data-validation' => 'required','data-validation-depends-on' => 'entrevistadorIdioma','data-validation-depends-on-value' =>'OTRO','data-validation-error-msg-required' => 'El campo es requerido'] )!!}
		  	</div>
			<div class="col-lg-4" >
				{!! Form::label ('interpreteSegundoAp','Segundo Apellido:') !!}
				{!! Form::text ('interpreteSegundoAp',
								old('interpreteSegundoAp'),
								['class' => 'form-control mayuscula sinEnter soloLetras',
									'placeholder' => 'Ingrese el segundo apellido',
									'id' => 'interpreteSegundoAp',
									'data-validation' => 'required',
									'data-validation-depends-on' => 'entrevistadorIdioma',
									'data-validation-depends-on-value' =>'OTRO'
								] )!!}
		  	</div>
		</div>
		<div class="row"  id="divInterpreteOrganizacion" style="display:none">
			<div class="col" >
					{!! Form::label ('interpreteOrganizacion','Organización o institución:') !!}
					{!! Form::text ('interpreteOrganizacion',
									old('interpreteOrganizacion'),
									['class' => 'form-control mayuscula sinEnter soloLetras',
										'placeholder' => 'Ingrese el nombre de la organización o institución',
										'id' => 'interpreteOrganizacion',
										'data-validation' => 'required',
										'data-validation-depends-on' => 'entrevistadorIdioma',
										'data-validation-depends-on-value' =>'OTRO',
										'data-validation-error-msg-required' => 'El campo es requerido'
									] )!!}
			  	</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-4">
				{!! Form::label ('','Primera vez que visita el servicio:') !!}
				{!! Form::select ('entrevistadorPrimeraVez',
									['SI'=>'SI','NO'=>'NO'],
									'',
									['class' => 'form-control',
										'id' => 'entrevistadorPrimeraVez'
									] )!!}	
				
			</div>
			<div class="col-lg-4" id="cuando" style="display:none">
				{!! Form::label ('','¿Cuándo?') !!}
				{!! Form::text ('fechaVisita',
								old('fechaVisita'),
								['class' => 'form-control mayuscula',
									'id' => 'fecha_visita',
									'placeholder' => 'dd/mm/aaaa',
									'data-validation-depends-on' => 'entrevistadorPrimeraVez',
									'data-validation-depends-on-value' =>'NO',
									'data-validation' =>'date',
									'data-validation-format'=>"dd/mm/yyyy",
									'data-validation-error-msg-date' => 'Ingrese fecha correcta'] )!!}
			</div>
		</div>
	</div>
	{!! Form::submit('Nueva cédula de investigación', ['class' => 'btn btn-large btn-primary openbutton']); !!}
{!! Form::close() !!}  
@endsection