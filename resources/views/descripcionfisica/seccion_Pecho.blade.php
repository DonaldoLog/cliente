<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="pecho" id="formPecho" style="display:none;">
	<div class="card border-success" >
		<div class="card-header">
			<h5 class="card-title">Pecho
				<i class="fa fa-pencil pull-right" id="btnEditarC"></i>
				<i class="fa fa-times-circle" style="float: right; margin-left: 10px;" id="cerrar"></i>
				<i class="fa fa-minus-square" style="float: right;" id="minCara"></i>
			</h5>
		</div>

		<div class="card-body">
			<div class="form-group row">
				<div class="col-6">
					{!! Form::label ('posPecho','Ubicación') !!}
					{!! Form::select('posPecho',  $pechosParte, '', ['class' => 'form-control', 'id' => 'posPecho'] ) !!}
				</div>
			</div>
			<div class="form-group row">
				<div class="col">
					{!! Form::label ('idPartiPecho','Particularidades') !!}
					{!! Form::select('idPartiPecho', $tipoCeja, '', ['class' => 'form-control', 'id' => 'idPartiPecho'] ) !!}
				</div>
				<div class="col">
					{!! Form::label ('idModiPecho','Modificaciones') !!}
					{!! Form::select('idModiPecho', array('SIN INFORMACIÓN' => 'SIN INFORMACIÓN', 'SÍ' => 'SÍ', 'NO' => 'NO'), '', ['class' => 'form-control', 'id' => 'idModiPecho'] ) !!}
				</div>
			</div>

			<div class="form-group row">
				<div class="col">
					{!! Form::text('otraPartiPecho', '', ['class' => 'form-control', 'id' => 'otraPartiPecho', 'placeholder' => 'Especifique otra particularidad'] ) !!}
				</div>
				<div class="col">
					{!! Form::text('otroModiPecho', '', ['class' => 'form-control', 'id' => 'otroModiPecho', 'placeholder' => 'Especifique otra modificación'] ) !!}
				</div>
			</div>

			<div class="form-group row">
				<div class="col">
					{!! Form::textarea('observacionesCabello', '', ['class' => 'form-control', 'id' => 'observacionesCabello', 'rows' => '1', 'placeholder' => 'Observaciones'] ) !!}
				</div>
			</div>
			<button type="button" class="btn btn-primary" style="float: right;" id="guardarHombroDer">GUARDAR</button>
		</div> 
	</div>
</div>