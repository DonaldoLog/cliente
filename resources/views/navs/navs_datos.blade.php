<nav>
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		@if (isset($desaparecido->id))
			<a class="nav-item nav-link @if ($activar == 'entrevista') active @endif" href="{{route('cedula.show',['id' => $desaparecido->idCedula])}}" aria-selected="true" @if ($activar != 'entrevista') data-toggle="tooltip" data-placement="right" title="Datos de la entrevista" @endif>
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				@if ($activar == 'entrevista') Datos de la entrevista @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'informante') active @endif" href="{{route('informante.show',['id' => $desaparecido->idCedula])}}" aria-selected="false" @if ($activar != 'informante') data-toggle="tooltip" data-placement="right" title="Informantessss" @endif>
				<i class="fa fa-commenting-o" aria-hidden="true"></i>
				@if ($activar == 'informante') Informantesa @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'desaparecido') active @endif" href="{{route('extraviado.show',['id' => $desaparecido->idCedula])}}" aria-selected="false" @if ($activar != 'desaparecido') data-toggle="tooltip" data-placement="right" title="Datos de la persona no localizada" @endif>
				<i class="fa fa-male" aria-hidden="true" ></i>
				@if ($activar == 'desaparecido') Persona no localizada @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'familiar') active @endif" href="{{route('familiar.show',['id' => $desaparecido->id])}}" aria-selected="false" @if ($activar != 'familiar') data-toggle="tooltip" data-placement="right" title="Datos de los familiares" @endif>
				<i class="fa fa-users" aria-hidden="true"></i>
				@if ($activar == 'familiar') Familiares @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'contacto') active @endif" href="{{route('contactos.show',['id' => $desaparecido->id])}}" aria-selected="false" @if ($activar != 'contacto') data-toggle="tooltip" data-placement="right" title="Datos de contacto" @endif>
				<i class="fa fa-phone" aria-hidden="true"></i>
				@if ($activar == 'contacto') Contacto @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'domicilio') active @endif" href="{{route('domicilios.show',['id' => $desaparecido->id])}}" aria-selected="false" @if ($activar != 'domicilio') data-toggle="tooltip" data-placement="right" title="Domicilios" @endif>
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				@if ($activar == 'domicilio') Domicilios @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'antecedente') active @endif" href="{{route('antecedentes.show',['id' => $desaparecido->id])}}" aria-selected="false" @if ($activar != 'antecedente') data-toggle="tooltip" data-placement="right" title="Antecedentes penales" @endif>
				<i class="fa fa-gavel" aria-hidden="true"></i>
				@if ($activar == 'antecedente') Antecedentes penales @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'desaparicion') active @endif" href="{{route('desaparicion.show',['id' => $desaparecido->id])}}" aria-selected="false" @if ($activar != 'desaparicion') data-toggle="tooltip" data-placement="right" title="Descripción de los hechos" @endif>
				<i class="fa fa-street-view" aria-hidden="true"></i>
				@if ($activar == 'desaparicion') Descripción de los hechos @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'vestimenta') active @endif" href="{{route('vestimentas.show',['id' => $desaparecido->id])}}" aria-selected="false">
				<i class="fa fa-user-secret" aria-hidden="true" @if ($activar != 'vestimenta') data-toggle="tooltip" data-placement="right" title="Vestimenta" @endif></i>
				@if ($activar == 'vestimenta') Vestimenta @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'desc_fisica') active @endif" href="{{route('descripcionfisica.show',['id' => $desaparecido->id])}}" aria-selected="false">
				<i class="fa fa-universal-access" aria-hidden="true"  @if ($activar != 'desc_fisica') data-toggle="tooltip" data-placement="right" title="Descripción física y señas particulares" @endif></i>
				@if ($activar == 'desc_fisica') Descripción física y señas particulares @endif
			</a>
			<a class="nav-item nav-link @if ($activar == 'ant_medicos') active @endif" href="{{route('antecedentesmedicos.show',['id' => $desaparecido->id])}}" aria-selected="false" @if ($activar != 'ant_medicos') data-toggle="tooltip" data-placement="right" title="Antecedentes médicos" @endif>
				<i class="fa fa-heartbeat" aria-hidden="true" ></i>
				@if ($activar == 'ant_medicos') Antecedentes médicos @endif

			</a>
			<a class="nav-item nav-link @if ($activar == 'dentadura') active @endif" href="{{route('datos_dentales.show',['id' => $desaparecido->id])}}" aria-selected="false" @if ($activar != 'dentadura') data-toggle="tooltip" data-placement="right" title="Datos dentales" @endif>
				<i class="fa fa-medkit" aria-hidden="true"></i>
				@if ($activar == 'dentadura') Datos dentales @endif
			</a>
		@else
			@if (isset($cedula->id))
				<a class="nav-item nav-link @if ($activar == 'entrevista') active @endif" href="{{route('cedula.show',['id' => $cedula->id])}}" aria-selected="true" @if ($activar != 'entrevista') data-toggle="tooltip" data-placement="right" title="Datos de la entrevista" @endif>
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					@if ($activar == 'entrevista') Datos de la entrevista @endif
				</a>
				<a class="nav-item nav-link @if ($activar == 'informante') active @endif" href="{{route('informante.show',['id' => $cedula->id,'token'=>$token])}}" aria-selected="false" @if ($activar != 'informante') data-toggle="tooltip" data-placement="right" title="Inforsasamantes" @endif>
					<i class="fa fa-commenting-o" aria-hidden="true"></i>
					@if ($activar == 'informante') Informwewantes @endif
				</a>
				<a class="nav-item nav-link @if ($activar == 'desaparecido') active @endif" href="{{route('extraviado.create_desaparecido',['id' => $cedula->id])}}" aria-selected="false" @if ($activar != 'desaparecido') data-toggle="tooltip" data-placement="right" title="Datos de la persona no localizada" @endif>
					<i class="fa fa-male" aria-hidden="true" ></i>
					@if ($activar == 'desaparecido') Persona no localizada @endif
				</a>
			@else
				<a class="nav-item nav-link @if ($activar == 'entrevista') active @endif" href="{{route('cedula.show',['id' => $cedula->id])}}" aria-selected="true" @if ($activar != 'entrevista') data-toggle="tooltip" data-placement="right" title="Datos de la entrevista" @endif>
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					@if ($activar == 'entrevista') Datos de la entrevista @endif
				</a>
			@endif
		@endif
	</div>
 </nav>
