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
          mysqli_real_escape_string($connLocalhost, trim($_POST['choice']))

      );

      // Ejecutamos el query en la BD
      mysqli_query($connLocalhost, $queryInsertUser) or trigger_error("El query de inserción de usuarios falló");

   
     
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
  

<form action='' class='form'>
  <p class='field required'>
    <label class='label required' for='name'>Concepto</label>
    <input class='text-input' id='concept' name='concept' required type='text' value="<?php if(isset($_POST['concept'])) echo $_POST['concept']; ?>">
  </p>




  <div class='field'>
    <label class='label'>Problema?</label>
    <ul class='checkboxes'>
      <li class='checkbox'>
        <input class='checkbox-input' id='choice-0' name='choice' type='checkbox' value='<?php if(isset($_POST['choice'])) echo $_POST['choice']; ?>'>
        <label class='checkbox-label' for='choice-0'>Drenaje</label>
      </li>
      <li class='checkbox'>
        <input class='checkbox-input' id='choice-1' name='choice' type='checkbox' value='<?php if(isset($_POST['choice'])) echo $_POST['choice']; ?>'>
        <label class='checkbox-label' for='choice-1'>Maltrato</label>
      </li>
      <li class='checkbox'>
        <input class='checkbox-input' id='choice-2' name='choice' type='checkbox' value='<?php if(isset($_POST['choice'])) echo $_POST['choice']; ?>'>
        <label class='checkbox-label' for='choice-2'>Agua derramada</label>
      </li>
      <li class='checkbox'>
        <input class='checkbox-input' id='choice-3' name='choice' type='checkbox' value='<?php if(isset($_POST['choice'])) echo $_POST['choice']; ?>'>
        <label class='checkbox-label' for='choice-3'>Violencia</label>
      </li>
   
    </ul>
  </div>

  <p class='field'>
    <label class='label' for='about'>Descripcion</label>
    <textarea class='textarea' cols='50' id='descripcion' name='descripcion' rows='4' value ="<?php if(isset($_POST['descripcion'])) echo $_POST['descripcion']; ?>"></textarea>
  </p>
  <p class='field half'>
    <label class='label' for='select'>Posicion</label>
    <input class='text-input' id='latitud' name='latitud' required type='text' value='latitud'>
    <input class='text-input' id='longitud' name='longitud' required type='text' value='longitud'>
  </p>
  <p class='field half'>
    <input class='button' id="send"  name="send" type='submit' value='Enviar'>
  </p>
</form>

</body>
</html>