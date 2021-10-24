<?php
  include("conexionBD/conexion.php");


  // Lo primero que haremos será validar si el formulario ha sido enviado
  if(isset($_POST['registrar_send'])) {

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
<div id="cuadro" >
</div>
  <form action="Registrar.php" method="post">
  <div class="right">
    <h1>Registrar</h1>
    <input type="text" name="username" placeholder="Usuario" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
    <input type="text" name="name" placeholder="Nombre" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"/>
    <input type="text" name="last_name" placeholder="Apellido" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>"/>  
    <input type="text" name="email" placeholder="Correo" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
    <input type="text" name="phone" placeholder="Telefono" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"/>  
    <input type="password" name="password" placeholder="Contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"/>
  
    
    <input type="submit" name="registrar_send" value="Sign me up" />
  </div>
  </form>
</div>
</html>

