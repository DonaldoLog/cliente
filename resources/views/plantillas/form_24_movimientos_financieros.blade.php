<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Documento</title>
<style type="text/css">


@page { margin: 1px; }

		body{
		background-image: url(./images/fondo-plantillas2.png);
		background-size: 30%;
		font-family: Arial;
		
		}

		div#encabezado{
			
			
			height:120px;
			
			
		}
		div#firma{
			margin:auto;
			margin-left: 200px;
			margin-right: 100px;
		
			
		}
		#firma p {font-size: 5x;}
	
		
		div#atentamente{
			margin:auto;
			margin-left: 250px;
			margin-right: 100px;
			width: 850px;
			height:200px;
			
			
		}

		div#cuerpo{
			margin:auto;
			margin-left: 250px;
			margin-right: 100px;
			width: 800px;
			height:1400px;
			
			
		}

		

		
		
		
		p.fuente { font-size:18px;
				font-family: Arial, Helvetica, sans-serif; 
		}

		#sangria p {text-indent:50px ; margin:0px ; padding:0px ; border:0px}
	
			
</style>

</head>


<body>



<div id="encabezado"></div>
		
<div id="cuerpo">
	
	<p class="fuente"><strong> LIC. </strong>	<strong>  {!! $datos->destinatarioNombre[0][0] !!}</strong>
	</p>
	<p class="fuente"><strong> {!! $datos->destinatarioCargo[0][0]->cargo !!}</strong>
	</p>
	
	
	
	 <p class="fuente"><strong> Xalapa, Ver. </strong>	<strong>  {!! $datos->fechaActual !!}  </strong></p>
	
	
	
	<p class="fuente"> <strong> No. de Inv. </strong><strong> {!! $datos->numCarpeta !!}  </strong></p>
	
	
	
	<p class="fuente"><strong> OFICIO NO. FGE/FIM/FEADPD/</strong>	<strong> {!! $datos->numOficio !!}/{!! $datos->anio !!}  </strong></p>
	
	<br>
	<p class="fuente" align="left"><strong> PRESENTE</strong></p>	
	
	<div id="sangria">

		<p align="justify"  class="fuente">
			Con fundamento en lo que disponen el artículo 19, 20 y 21 de la Constitución General de la República; 67 Fracción I apartado A de la Constitución Política Local; <strong>{{--{!! $datos->articulos !!} --}} </strong></p>
		<br>	
		<p align="justify" class="fuente">
			El Protocolo Homologado para la Búsqueda de Personas Desaparecidas y la Investigación del Delito de Desaparición Forzada; los acuerdos 025/2011, 01/2013, 023/2013, emitidos por el Procurador General de Justicia del Estado; acuerdo General número 07/2017 signado por el Fiscal General del Estado de Veracruz; I, II, V, VI y XVII, de la Declaración Americana de los Derechos y Deberes del Hombre; 1, 2, 3, 7 y 8 de la Declaración Universal de Derechos Humanos; 1, 3, 6 numero 1; 9 numero 1; 27 y 26 del Pacto Internacional de Derechos Civiles y Políticos; 3 y 5 del Pacto Internacional de Derechos Económicos, Sociales y Culturales; 8, 27 núm. 1, 9, 24 y 25 de la Convención Americana sobre Derechos Humanos, “Pacto San José”; 1, 8, 12 incisos a) y b) y 27) de los Principios y directrices básicas sobre el derecho de las víctimas de violaciones manifiestas de las normas Internacionales de Derechos Humanos y de violaciones graves del derecho internacional humanitario a interponer recursos y obtener reparaciones; 1, 2 y 3 de la Declaración Sobre los Principios Fundamentales  de justicia para las víctimas del delito y del abuso de poder; así como el artículo 7 Fracción X, de la Ley General de Victimas, le solicito su colaboración para con esta Representación Social, en la búsqueda y localización y presentación del ciudadano(a) <strong>{!! $datos->desaparecidoNombre !!}</strong>, quien se encuentra desaparecido, siendo visto por última vez en <strong>{!! $datos->desaparecidoLugar !!}</strong>, el día <strong>{!! $datos->desaparecidoFecha !!}</strong>, a las <strong>{!! $datos->desaparecidoHora !!}</strong>  horas, para lo cual anexo al presente:
		
		</p>
	</div>
	<div>
		<p class="fuente"> Cedula de Boletín de Persona Extraviada;</p>		
	</div>

	<div id="sangria">

		<p align="justify" class="fuente">
			Lo anterior para que las documentales antes descritas sean distribuidas en cada una de las Sucursales del banco al su digno cargo, y su vez le solicito lo siguiente:
		</p>
		<br>
		<br>
		<p align="justify" class="fuente">
			1.- Resguarde de manera inmediata las imágenes o videos de las sucursales y/o cajeros en donde se realicen movimientos bancarios relacionados con las cuentas <strong>{{--{!! $datos->desaparecidoCuenta !!} --}}</strong> (o en su defecto el número de tarjeta), a nombre de la persona desaparecida C.  <strong>{{--{!! $datos->desaparecidoNombre !!} --}}</strong>, a partir del día <strong>{{--{!! $datos->desaparecidoFecha !!} --}}</strong>. 
		</p>
		<br>
		<p align="justify" class="fuente">
			Lo anterior, como medida precautoria, en tanto esta Representación Social formaliza la solicitud a través de la Comisión Nacional Bancaria y de Valores.  
		</p>
		<br>
		<p align="justify" class="fuente">
			Sin más por el momento, aprovecho la ocasión para enviarle un cordial saludo.
		</p>
	</div>
</div>
	<br>

<div id="atentamente">
	
	<p align="center" class="fuente"><strong> ATENTAMENTE</strong></p>
	
	<p align="center" class="fuente"><strong> LIC. </strong>	<strong> {{--{!! $datos->fiscalNombre !!}--}} </strong>
	</p>
	<p align="center" class="fuente"><strong> FISCAL {{--{!! $datos->fiscalNumero !!}--}} DE LA UNIDAD INTEGRAL DE PROCURACIÓN</strong></p>
	<p align="center" class="fuente"><strong> DE JUSTICIA DEL {{--{!! $datos->numDistrito !!}--}}  DISTRITO JUDICIAL DE {{--{!! $datos->fiscalLugar !!}--}}, VERACRUZ</strong></p>



</div>

<div id="firma">
	
	
	<p align="right" ><strong> FD :</strong>	<strong> ASDFAS651FG5135df351g3d135df1g13f51gd1hjt35896{{--{!! $datos->firma !!}--}} </strong>
	</p>

</div>








		
</body>

</html>

div#general{

			margin:auto;
			margin-top: 2px;
			width: 790px;
			height: 555px;
			background-color: red;

		}
<img src="/personal/img/avatar.png" width="1148" height="1894" />
body{
		background-image: url(./images/boletin555x790.png);
		background-size: 30%;
		font-family: Arial;
		
		}




		div#fondo{
			margin:auto;
			margin-left: 1px;
			margin-top: 1px;
			width: 1148px;
			height:1894px;
			background-color: green;
			
		}