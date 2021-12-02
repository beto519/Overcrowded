<?php
  include("conexionBD/conexion.php");


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


      $queryInsertUser = sprintf("INSERT INTO marcadores (latitud,longitud) VALUES ('%s', '%s')",

      mysqli_real_escape_string($connLocalhost, trim($_POST['latitud'])),
      mysqli_real_escape_string($connLocalhost, trim($_POST['longitud']))

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

  <title>Document</title>
</head>
<body>
  

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