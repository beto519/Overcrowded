<?php
  // Inicializamos la sesion o la retomamos


if(!isset($_SESSION)) {
  session_start();
  // Protegemos el documento para que solamente sea visible cuando NO HAS INICIADO sesión
  if(isset($_SESSION['id'])) header('Location: index.php');

}

// Incluimos la conexión a la base de datos
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
    <link href="css/style_registrar.css" rel="stylesheet" type="text/css" />
    <title>Registrar</title>
</head>
<body>
<form class="container_1" action="Registrar.php" method="post">
    <div class="title">Registrar</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Usuario</span>
            <input type="text" name="username" placeholder="Ingresa tu usuario" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"/>
          </div>
          <div class="input-box">
            <span class="details">Nombre</span>
            <input type="text" name="name" placeholder="Ingresa tu nombre" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>"/>
          </div>
          <div class="input-box">
            <span class="details">Apellidos</span>
            <input type="text" name="last_name" placeholder="Ingresa tus apellidos"  value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>"/>
          </div>
          <div class="input-box">
            <span class="details">Correo Electronico</span>
            <input type="text" name="email" placeholder="Ingresa tu Correo electronico" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
          </div>
          <div class="input-box">
            <span class="details">Telefono</span>
            <input type="text" name="phone" placeholder="Ingrese su telefono"  value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"/>
          </div>
          <div class="input-box">
            <span class="details">Contraseña</span>
            <input type="password" name="password" placeholder="Ingrese su contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>"/>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="registrar_send" value="Registrar"/>
        </div>
        <div class="text-info">
        <a href="login.php" class="h5">¿Ya tienes una cuenta?</a>
        </div>
  </div>
  </form>
</body>
</html>

