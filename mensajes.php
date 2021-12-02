<?php
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mssgstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="css/mensajes.css">
<link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">
<script type="text/javascript">
    function ajax() {
    var req = new XMLHttpRequest();
    req.onreadystatechange =  function () {
        if (req.readyState == 4 && req.status == 200) {
            document.getElementById('chat').innerHTML = req.responseText;
        }
        
    }
    req.open('GET','chat.php');
    req.send();    
}
//refrescar la pagina cada segundo
setInterval(function(){ajax();},1000);
</script>


</head>

<body onLoad= "ajax();">

<div>
        <div class="header-blue">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.php"><img class= "img_tamaño" src="img/logo_prueba.png" alt=""></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Menu</a></li>
                           
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="mapa.php">Mapa</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="mensajes.php">Mensajes</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self">
                        <?php

               


?>
                        </form><span class="navbar-text"> <a class="btn btn-#890a3d action-button" role="button" href="includes/cerrarSesion.php">Cerrar sesión</a></div>
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

      
<div id= "container">
    <div id="box-chat">
        <div id="chat"> </div>
    </div>

    <form action="mensajes.php" method="post">
    

    <input type="text" name = "nombre" placeholder =<?php echo $userData['nombre'] ?> disabled>
    <textarea name="mensaje"placeholder = "Ingresa tu mensaje"></textarea>
    <input class = 'pulse' type="submit" name ="send" value = "Enviar">
    </form>
  
    <?php
  
     $mensaje ="";
    
    
    if (isset($_POST['send'])) {
    
        $nombre = $userData['nombre'];
        $mensaje = $_POST['mensaje'];
if (!empty($mensaje)) {
    $consulta = sprintf("INSERT INTO mensajes (usuario, texto) VALUES ('%s','%s')",
    mysqli_real_escape_string($connLocalhost, trim($nombre)),
    mysqli_real_escape_string($connLocalhost, trim($_POST['mensaje']))

   
);
$resQueryMessage = mysqli_query($connLocalhost, $consulta) or trigger_error("El query falló");

    
}
    
     }
    ?>
</div>


</body>
</html>