<?php
	/* Database connection settings */
	$host = 'bowgqfdjymwtjrai1vil-mysql.services.clever-cloud.com';
	$user = 'uqqpgtuobtnpuiii';
	$pass = 'zqbdbi78oaeWDbHAHcHs';
	$db = 'bowgqfdjymwtjrai1vil';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

 	$coordinates = array();
 	$latitudes = array();
 	$longitudes = array();

	// Select all the rows in the markers table
	$query = "SELECT  `latitud`, `longitud` FROM `marcadores` ";
	$result = $mysqli->query($query) or die('data selection for google map failed: ' . $mysqli->error);

 	while ($row = mysqli_fetch_array($result)) {

		$latitudes[] = $row['latitud'];
		$longitudes[] = $row['longitud'];
		$coordinates[] = 'new google.maps.LatLng(' . $row['latitud'] .','. $row['longitud'] .'),';
	}

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
	<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqVwIR2LNGqiYsdV-rVNB5Kh3lM0dWYAM&callback=initMap">
    </script>

		<div id ="map"> </div> 
	<script>
      var map;
      function initMap() {
		
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
		  center: {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>}, //{lat: --- , lng: ....}
			    mapTypeId: google.maps.MapTypeId.SATELITE
        });
		
	
		var marker = new google.maps.Marker({
          position:  {<?php echo'latitud:'. $latitudes[0] .', longitud:'. $longitudes[0] ;?>},
          map: map,
	  title: 'Mi ubicacion'
        });
      }
	</script>
	</body> 
</html>