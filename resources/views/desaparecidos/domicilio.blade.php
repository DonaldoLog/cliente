<div class="card border-success">
	<div class="card-header">
		<h5 class="card-title">Domicilio actual o último del extraviado
		<button type="button" id="btnAddDomicilio" class="btn btn-primary float-right">Agregar otro domicilio</button>
		</h5>
		
	</div>
	<div class="card-body">		
		<div class="row">
			<div class="form-group col-2">
				{!! Form::label ('tipoDireccion','Tipo de domicilio:') !!}
				{!! Form::select ('tipoDireccion',$tiposDireccion,'', ['class' => 'form-control', 'id' => 'tipoDireccion'] )!!}
			</div>
			<div class="form-group col">
				{!! Form::label ('calle','Calle:') !!}
				{!! Form::text ('calle',old('Calle'), ['class' => 'form-control', 'placeholder' => 'Calle'] )!!}
			</div>
			<div class="form-group col-2">
				{!! Form::label ('numExterno','Número exterior:') !!}
				{!! Form::text ('numExterno',old('numExterno'), ['class' => 'form-control', 'placeholder' => 'Num. Ext.'] )!!}
			</div>
			<div class="form-group col-2">
				{!! Form::label ('numInterno','Número Interior:') !!}
				{!! Form::text ('numInterno',old('numInterno'), ['class' => 'form-control', 'placeholder' => 'Num. Int.'] )!!}
			</div>
		</div>
		<div class="row">
			<div class="form-group col">
					{!! Form::label ('idMunicipio','Municipio:') !!}
					{!! Form::select ('idMunicipio',$municipios,'', ['class' => 'form-control', 'id' => 'idMunicipio'] )!!}
			</div>
			<div class="form-group col">
					{!! Form::label ('idLocalidad','Localidad:') !!}
					{!! Form::select ('idLocalidad',$localidades,'', ['class' => 'form-control', 'id' => 'idLocalidad'] )!!}
			</div>
			<div class="form-group col">
				{!! Form::label ('idColonia','Colonia:') !!}
				{!! Form::select ('idColonia',$colonias,'', ['class' => 'form-control', 'id' => 'idColonia'] )!!}
			</div>
			<div class="form-group col">
				{!! Form::label ('idCodigoPostal','Código postal:') !!}
				{!! Form::select ('idCodigoPostal',$codigos,'', ['class' => 'form-control', 'id' => 'idCodigoPostal'] )!!}
			</div>			
		</div>
		<div class="row">
			<div class="form-group col">
					{!! Form::label ('telefono','Teléfono:') !!}
					{!! Form::text ('telefono',old('telefono'), ['class' => 'form-control'] ) !!}
			</div>			
		</div>
		<hr class="my-4">		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#tipo').select2({
			width : "100%",
		});

		$('#codigo').select2({
			width : "100%",
		});

		$('#municipio').select2({
			width : "100%",
		});

		$('#localidad').select2({
			width : "100%",
		});

		$('#colonia').select2({
			width : "100%",
		});
	});
</script>