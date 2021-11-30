<?php
  include("conexionBD/conexion.php");
  $reportes="SELECT * FROM marcadores";
?>
<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
	<link rel="stylesheet" href="css/mapa.css">
    <title>Maps JavaScript API</title> 
</head>  
	<body>
  <?php 
  $resultado = mysqli_query($connLocalhost, $reportes);
  while($row=mysqli_fetch_assoc($resultado)){?>
	<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqVwIR2LNGqiYsdV-rVNB5Kh3lM0dWYAM&callback=initMap">
    </script>
		<div id ="map"> </div> 
	<script>
      var map;
      function initMap() {
		
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 28.006381, lng: -110.921847},
          zoom: 13
        });

		  var marker = new google.maps.Marker({
          position: new google.maps.LatitudLongitud(<?php echo $row['latitud']; ?>, <?php echo $row['longitud']; ?>),
          map: map,
	      title: <?php echo $row['direccion'];?>
        });
      }
	</script>
  <?php }?>
	</body> 
</html>