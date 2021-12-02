<?php
  include("conexionBD/conexion.php");

  include("conexionBD/conexion.php");


  // Inicializamos la sesion o la retomamos
  if(!isset($_SESSION)) {
    session_start();
  }
  if(!isset($_SESSION['id'])) header('Location: login.php');

  $query_userData = sprintf("SELECT * FROM usuarios WHERE idusuario =%d",
  mysqli_real_escape_string($connLocalhost, trim($_SESSION['id']))
  );
  
  $resQueryUserData = mysqli_query($connLocalhost, $query_userData) or trigger_error("El query para obtener los detalles del usuario loggeado falló");
  
  $userData= mysqli_fetch_assoc($resQueryUserData);

  // Lo primero que haremos será validar si el formulario ha sido enviado
  if(isset($_POST['send'])) {

    // Procedemos a añadir a la base de datos al usuario SOLO SI NO HAY ERRORES
    if(!isset($error)) {
      // Preparamos la consulta para guardar el registro en la BD
      $queryInsertUser = sprintf("INSERT INTO reportes (concepto,descripcion,Categoria) VALUES ('%s', '%s', '%s')",
          mysqli_real_escape_string($connLocalhost, trim($_POST['concept'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['descripcion'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['select']))

      );

      // Ejecutamos el query en la BD
      mysqli_query($connLocalhost, $queryInsertUser) or trigger_error("El query de inserción de usuarios falló");


      $queryInsertUser = sprintf("INSERT INTO google_maps_php_mysql (nombre,direccion,lat,lng,pais) VALUES ('%s', '%s','%s','%s','%s')",
      mysqli_real_escape_string($connLocalhost, trim("Direcci&oacute;n")),
      mysqli_real_escape_string($connLocalhost, trim("Avenida Jos\u00E9 Pardo 456, Miraflores")),
      mysqli_real_escape_string($connLocalhost, trim($_POST['latitud'])),
      mysqli_real_escape_string($connLocalhost, trim($_POST['longitud'])),
      mysqli_real_escape_string($connLocalhost, trim("Per&uacute;"))

  );

  // Ejecutamos el query en la BD
  mysqli_query($connLocalhost, $queryInsertUser) or trigger_error("El query de inserción de usuarios falló");


      header("Location:formulario.php");
     
    }

  }
  else {
    
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/formulario.css">
  <link rel="stylesheet" href="css/styleindex.css">

  <title>Generar Reporte</title>
</head>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div>
        <div class="header-blue">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php"><img class= "img_tamaño" src="img/logo_prueba.png" alt=""></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Menu</a></li>
                            <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Reportes </a>
                                <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="formulario.php">Generar reporte</a><a class="dropdown-item" role="presentation" href="visualizarReportes.php">Visualizar reportes</a></div>
                            </li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="mapa.php">Mapa</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="mensajes.php">Mensajes</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                        <?php

               


?>
                        </form><span class="navbar-text"> <a class="btn btn-light action-button" role="button" href="includes/cerrarSesion.php">Cerrar sesión</a></div>
                </div>
            </nav>
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                     
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

<form action="formulario.php" method="post"class='form'>
  <p class='field required'>
    <label class='label required' for='name'>Concepto</label>
    <input class='text-input' id='concept' name='concept' required type='text' value="<?php if(isset($_POST['concept'])) echo $_POST['concept']; ?>">
  </p>




  <div class='field'>
    
    <label class='label'>Problema</label>
  
  <select class='textarea' name="select">
  <option class='textarea' value="Violencia">Violencia</option>
  <option class='textarea' value="Maltrato" selected>Maltrato</option>
  <option class='textarea' value="Salubridad">Salubridad</option>
  <option class='textarea' value="Salubridad">Salud</option>
  <option class='textarea' value="Publicos">Publicos</option>
  <option class='textarea' value="Otros">Otros</option>
</select> 
  </div>

  <p class='field'>
    <label class='label' for='about'>Descripcion</label>
    <textarea class='textarea' cols='50' id='descripcion' name='descripcion' rows='4' value ="<?php if(isset($_POST['descripcion'])) echo $_POST['descripcion']; ?>"></textarea>
  </p>
  

  <p class='field half'>
    <label class='label' for='select'></label>
  
 


   <p  id="latitud" name="latitud"></p>
  <p  id="longitud" name="name"></p></p>
  <p class='field half'>

 <p class='field required'>
    <label class='label required' for='name'>latitud</label>
    <input class='text-input' id='latitud' name='latitud' required type='text' value="<?php if(isset($_POST['latitud'])) echo $_POST['latitud']; ?>">
  </p>
  <p class='field required'>
    <label class='label required' for='name'>longitud</label>
    <input class='text-input' id='longitud' name='longitud' required type='text' value="<?php if(isset($_POST['longitud'])) echo $_POST['longitud']; ?>">
  </p>
<input class='button' id="send"  name="send" type='submit' value='Enviar'>
  </p>

</form>

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