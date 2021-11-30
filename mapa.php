<?
var $latitud;
var $longitud;
include("conexionBD/conexion.php");
if(isset($_POST['Generar_Reporte'])) {
if(!isset($error)) {
      // Preparamos la consulta para guardar el registro en la BD
      $queryInsertUser = sprintf("INSERT INTO marcadores (latitud,longitud) VALUES ('%s', '%s')",
          mysqli_real_escape_string($connLocalhost, trim($_POST['latitud'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['longitud']))

      );

        // Ejecutamos el query en la BD
        mysqli_query($connLocalhost, $queryInsertUser) or trigger_error("El query de inserción de usuarios falló");

    
   
      }
?>
<!doctype html>
<html lang="es">


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Acceder a la ubicación del dispositivo con JavaScript">
	<meta name="author" content="Parzibyte">
	<title>Acceder a la ubicación del dispositivo con JavaScript</title>
  <link rel="stylesheet" href="css/mapa.css">
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
		
      <form  action="mapa.php" method="post">

			 <p class="ocultar" id="latitud"></p>
	
	      <p class="ocultar" id="longitud"></p>
		

			
        <div class="button">
        <div class="button">
          <input type="submit" name="registrar_reporte" id="registrar_reporte" value="Registrar"/>
        </div>
        
        </div>
        </form>
			</div>
		</div>
	</main>
  <?
var $latitud;
var $longitud;



?>


	<script>
  
const funcionInit = () => {
	if (!"geolocation" in navigator) {
		return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
	}

	const $latitud = document.querySelector("#latitud"),
		$longitud = document.querySelector("#longitud"),
		$enlace = document.querySelector("#enlace");


	const onUbicacionConcedida = ubicacion => {
		console.log("Tengo la ubicación: ", ubicacion);
		const coordenadas = ubicacion.coords;
		$latitud.innerText = coordenadas.latitude;
		$longitud.innerText = coordenadas.longitude;
	
	}
	const onErrorDeUbicacion = err => {

		$latitud.innerText = "Error obteniendo ubicación: " + err.message;
		$longitud.innerText = "Error obteniendo ubicación: " + err.message;
		console.log("Error obteniendo ubicación: ", err);
	}

	const opcionesDeSolicitud = {
		enableHighAccuracy: true, // Alta precisión
		maximumAge: 0, // No queremos caché
		timeout: 5000 // Esperar solo 5 segundos
	};

	$latitud.innerText = "Cargando...";
	$longitud.innerText = "Cargando...";
	navigator.geolocation.getCurrentPosition(onUbicacionConcedida, onErrorDeUbicacion, opcionesDeSolicitud);

};

document.addEventListener("DOMContentLoaded", funcionInit);
</script>

</body>

</html>