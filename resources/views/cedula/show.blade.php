@extends('layouts.app_uipj')

@section('css')
	{!! Html::style('') !!}
	<style type="text/css">
	.right {
  float: right;
}
</style>
@endsection

@section('titulo', '')

@section('content')
{{ Form::model($cedula, ['action' => 'CedulaController@store']) }}

@include('navs.navs_datos',array('activar' => 'entrevista'))

<a href="{{route('cedula.edit', ['id' => $cedula->id])}}" class="btn btn-dark pull-right">
	EDITAR
</a>
<div class="card-body bg-white">
	<div>
	<div class="col-lg-2 right">
			{{ HTML::image('images/perfil3.png', 'Fiscal', array('class' => 'rounded w-100 p-3 float-right')) }}
		</div>
		<div class="col-lg-10">
			<h5><a href="http://127.0.0.1/uipj/public/carpeta/{!! $cedula->idCarpeta !!}">{!! $cedula->carpeta !!} </a></h5>
			<h5>Datos del fiscal</h5>
			<dl class="row">
				<dt class="col-sm-4">Nombre:</dt>
				<dd class="col-sm-8">
					{!! $cedula->entrevistadorNombres !!}
					{!! $cedula->entrevistadorPrimerAp !!}
					{!! $cedula->entrevistadorSegundoAp !!}
				</dd>
				<dt class="col-sm-4">Cargo:</dt>
				<dd class="col-sm-8">
					{!! $cedula->entrevistadorCargo !!}
				</dd>
				@isset($cedula->id)
					<dt class="col-sm-4">Dialecto:</dt>
					<dd class="col-sm-8">
						{!! $cedula->dialecto->nombre !!}
					</dd>
					@if ($cedula->idDialecto == 2)
						<dt class="col-sm-4">Nombre de su dialecto:</dt>
						<dd class="col-sm-8">
							{!! $cedula->otroDialecto !!}
						</dd>
					@endif
					@if ($cedula->idDialecto >= 2)
						<dt class="col-sm-4">Interprete:</dt>
						<dd class="col-sm-8">
							{!! $cedula->interpreteNombres !!}
							{!! $cedula->interpretePrimerAp !!}
							{!! $cedula->interpreteSegundoAp !!}
						</dd>
						<dt class="col-sm-4">Organización o institución:</dt>
						<dd class="col-sm-8">
							{!! $cedula->interpreteOrganizacion !!}
						</dd>
					@endif
					<dt class="col-sm-4">Primera vez que visita el servicio:</dt>
					<dd class="col-sm-8">
						{!! $cedula->entrevistadorPrimeraVez !!}
							@if ($cedula->entrevistadorPrimeraVez == 'NO')
								<strong>(</strong>{!! \Carbon\Carbon::parse($cedula->fechaVisita)->format('d/m/Y') !!}<strong>)</strong>
							@endif
					</dd>
				@endisset
			</dl>
		</div>

	</div>
</div>

{!! Form::close() !!}
@endsection

@section('scripts')

@endsection
