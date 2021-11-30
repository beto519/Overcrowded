<!doctype html>
<html lang="es">
<!--
  Plantilla inicial de Bootstrap 4
  @author parzibyte
  Visita: parzibyte.me/blog
-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Acceder a la ubicación del dispositivo con JavaScript">
	<meta name="author" content="Parzibyte">
	<title>Acceder a la ubicación del dispositivo con JavaScript</title>
	<!-- Cargar el CSS de Boostrap-->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	 crossorigin="anonymous">
</head>

<body>
	<!-- Termina la definición del menú -->
	<main role="main" class="container">
		<div class="row">
			<!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
			<div class="col-12">
		
		
				<br>
				<strong>Latitud: </strong> <p id="latitud"></p>
				<br>
				<strong>Longitud: </strong> <p id="longitud"></p>
				<br>
				<a target="_blank" id="enlace" href="#">Abrir en Google Maps</a>
			</div>
		</div>
	</main>
	<script src="script.js">
	</script>
</body>

</html>