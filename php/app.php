<?php

  // Archivo de Conexión a la Base de Datos 
  include('conexion.php');

  // Listamos las direcciones con todos sus datos (lat, lng, dirección, etc.)
  $result = mysqli_query($con, "SELECT * FROM google_maps_php_mysql");

  // Creamos una tabla para listar los datos 
 

 

  mysqli_close($con);

?> 