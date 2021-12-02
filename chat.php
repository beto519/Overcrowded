
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>

 <?php
 
 include("conexionBD/conexion.php");



 
    $consulta = "SELECT * FROM mensajes";
    
    $resQueryMessage = mysqli_query($connLocalhost, $consulta) or trigger_error("El query falló");
        while ($fila = $resQueryMessage->fetch_array()): 
?>
    <div id="data-chat">
            <span style="color:#1c62c4;"><?php echo $fila['usuario'] ?>: </span>
             <span style="color:#848484;"><?php echo $fila['texto'] ?></span>
            
    </div>
<?php endwhile;?>
</body>
</html>
