<?php
  
  include("conexionBD/conexion.php");
  $reportes="SELECT * FROM reportes";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/mapa.css" rel="stylesheet"/>
    <title>Visualizar reportes</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="css/reportes.css">
</head>
<body>
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

                        </div>
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
    <div class="movimiento">
    <table class="table">
  <thead class="columna">
    <tr>
      <th scope="col"></th>
      <th scope="col">Concepto</th>
      <th scope="col">Descripcion</th>
      <th scope="col">fecha</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Categoria</th>
    </tr>
  </thead>

  <?php $resultado = mysqli_query($connLocalhost, $reportes);
  while($row=mysqli_fetch_assoc($resultado)){?>

  <tbody>
    <tr>
      <th></th>
      <td><?php echo $row['concepto'];?></td>
      <td><?php echo $row['descripcion'];?></td>
      <td><?php echo $row['fecha'];?></td>
      <td></td>
      <td></td>
      <td><?php echo $row['Categoria'];?></td>
     </tr>
  </tbody>
  <?php }?>
</table>

    
</body>
</html>