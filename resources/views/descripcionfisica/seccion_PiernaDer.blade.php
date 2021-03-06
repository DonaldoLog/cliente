<div class="piernaDer" id="formPiernaDer" style="display:none;">
	<div class="card border-success" >
		<div class="card-header">
			<h5 class="card-title">Pierna derecha
				<i class="fa fa-pencil pull-right" id="btnEditarC"></i>
				<i class="fa fa-times-circle" style="float: right; margin-left: 10px;" id="cerrar"></i>
				<i class="fa fa-minus-square" style="float: right;" id="minCara"></i>
			</h5>
		</div>

		<div class="card-body">
			<!-- Sección rodilla  -->
			<div class="form-group row">
				<div class="col-4">
					{!! Form::label ('infoPiernaDer','Información de rodilla') !!}
					{!! Form::select('infoPiernaDer', array('SIN INFORMACIÓN' => 'SIN INFORMACIÓN', 'SÍ' => 'SÍ', 'NO' => 'NO'), '', ['class' => 'form-control', 'id' => 'infoPiernaDer'] ) !!}
				</div>
				<div class="col">
					{!! Form::label ('partRodillaDer','Particularidades') !!}
					{!! Form::select('partRodillaDer', $tipoCeja, '', ['class' => 'form-control', 'id' => 'partRodillaDer'] ) !!}
				</div>
				<div class="col">
					{!! Form::label ('modRodillaDer','Modificaciones') !!}
					{!! Form::select('modRodillaDer', array('SIN INFORMACIÓN' => 'SIN INFORMACIÓN', 'SÍ' => 'SÍ', 'NO' => 'NO'), '', ['class' => 'form-control', 'id' => 'modRodillaDer'] ) !!}
				</div>
			</div>

			<div class="form-group row">
				<div class="col">
					{!! Form::text('otroTipoCeja', '', ['class' => 'form-control', 'id' => 'otroTipoCeja', 'placeholder' => 'Especifique otra particularidad'] ) !!}
				</div>
				<div class="col">
					{!! Form::text('otroTipoCeja', '', ['class' => 'form-control', 'id' => 'otroTipoCeja', 'placeholder' => 'Especifique otra modificación'] ) !!}
				</div>
			</div>

			<div class="form-group row">
				<div class="col">
					{!! Form::textarea('observacionesCabello', '', ['class' => 'form-control', 'id' => 'observacionesCabello', 'rows' => '1', 'placeholder' => 'Observaciones'] ) !!}
				</div>
			</div>

			<!-- Sección espinilla  -->
			<div class="form-group row">
				<div class="col-4">
					{!! Form::label ('infoEspinillaDer','Información de espinilla') !!}
					{!! Form::select('infoEspinillaDer', array('SIN INFORMACIÓN' => 'SIN INFORMACIÓN', 'SÍ' => 'SÍ', 'NO' => 'NO'), '', ['class' => 'form-control', 'id' => 'infoEspinillaDer'] ) !!}
				</div>
				<div class="col">
					{!! Form::label ('partEspinillaDer','Particularidades') !!}
					{!! Form::select('partEspinillaDer', $tipoCeja, '', ['class' => 'form-control', 'id' => 'partEspinillaDer'] ) !!}
				</div>
				<div class="col">
					{!! Form::label ('modEspinillaDer','Modificaciones') !!}
					{!! Form::select('modEspinillaDer', array('SIN INFORMACIÓN' => 'SIN INFORMACIÓN', 'SÍ' => 'SÍ', 'NO' => 'NO'), '', ['class' => 'form-control', 'id' => 'modEspinillaDer'] ) !!}
				</div>
			</div>

			<div class="form-group row">
				<div class="col">
					{!! Form::text('otroTipoCeja', '', ['class' => 'form-control', 'id' => 'otroTipoCeja', 'placeholder' => 'Especifique otra particularidad'] ) !!}
				</div>
				<div class="col">
					{!! Form::text('otroTipoCeja', '', ['class' => 'form-control', 'id' => 'otroTipoCeja', 'placeholder' => 'Especifique otra modificación'] ) !!}
				</div>
			</div>

			<div class="form-group row">
				<div class="col">
					{!! Form::textarea('observacionesCabello', '', ['class' => 'form-control', 'id' => 'observacionesCabello', 'rows' => '1', 'placeholder' => 'Observaciones'] ) !!}
				</div>
			</div>
			<button type="button" class="btn btn-primary" style="float: right;" id="guardarPiernaDer">GUARDAR</button>
		</div> 
	</div>
</div>