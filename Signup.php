<?php
  include("conexion.php");


  // Lo primero que haremos será validar si el formulario ha sido enviado
  if(isset($_POST['registrar_send'])) {
    $error[] = "El correo proporcionado ya está siendo utilizado";

      // Validamos si las cajas están vacias
  //
 

    // Validación de email
    // Preparamos la consulta para determinar si el email porporcionado ya existe en la BD
    $queryCheckEmail = sprintf("SELECT idusuario FROM usuarios WHERE correo = '%s'",
      mysqli_real_escape_string($connLocalhost, trim($_POST['email']))
    );

    // Ejecutamos el query 
    $resQueryCheckEmail = mysqli_query($connLocalhost, $queryCheckEmail) or trigger_error("El query de validación de email falló"); // Record set o result set siempre y cuando el query sea de tipo SELECT

    // Contar el recordset para determinar si se encontró el correo en la BD
    if(mysqli_num_rows($resQueryCheckEmail)) {
      $error[] = "El correo proporcionado ya está siendo utilizado";
      
    }

    // Procedemos a añadir a la base de datos al usuario SOLO SI NO HAY ERRORES
    if(!isset($error)) {
      // Preparamos la consulta para guardar el registro en la BD
      $queryInsertUser = sprintf("INSERT INTO usuarios (nombre,apellido,telefono,correo,contraseña,usuario) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')",
          mysqli_real_escape_string($connLocalhost, trim($_POST['name'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['last_name'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['email'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['phone'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['password'])),
          mysqli_real_escape_string($connLocalhost, trim($_POST['username']))

      );

      // Ejecutamos el query en la BD
      mysqli_query($connLocalhost, $queryInsertUser) or trigger_error("El query de inserción de usuarios falló");

      // Redireccionamos al usuario al Panel de Control
      header("Location:index.php?insertUser=true");
    }

  }
  else {
    
  }

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Style.css" rel="stylesheet" type="text/css" />
    <title>Registrar</title>
</head>
<div id="login-box">
<div id="cuadro">
</div>
  <div class="right">
    <h1>Sign up</h1>
    <input type="text" name="username" placeholder="Username" />
    <input type="text" name="name" placeholder="Name" />
    <input type="text" name="last_name" placeholder="Last name" />  
    <input type="text" name="email" placeholder="E-mail" />
    <input type="text" name="phone" placeholder="Phone" />  
    <input type="password" name="password" placeholder="Password" />
  
    
    <input type="submit" name="registrar_send" value="Sign me up" />
  </div>
 
</div>
</html>

