<header>
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
		<a class="navbar-brand" href="#"><img src="{{ asset('img/logofge2.png') }}" alt="" class="logofge"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav mr-auto">
				@auth
					<li class="nav-item active">
						<a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Libro de gobierno</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Bitácora</a>
					</li>
					{{--<li class="nav-item">
						<a class="nav-link" href="#">Registrar nueva Carpeta</a>
					</li>--}}
					@if(!isset($carpetas))
						@if(isset($carpetaNueva))
							<li class="nav-item">
							    <a class="nav-link" href="#">Iniciando carpeta: X</a>
							</li>
						@endif
					@else
						<li class="nav-item">
							<a class="nav-link" href="#">Registrar nueva Carpeta</a>
						</li>
					@endif
				@endauth
			</ul>

			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
					<li class="nav-item"><a class="nav-link" href="#">Ingresar</a></li>
					<li class="nav-item"><a class="nav-link" href="#">Registrarse</a></li>
				@else
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
							Carlos Avila Aguila <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
							<li>
								<a class="dropdown-item" href="#"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								Cerrar sesión
								</a>
								<form id="logout-form" action="#" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endguest
			</ul>
		</div>
	</nav>
</header>