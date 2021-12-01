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

	//remove the comaa ',' from last coordinate
	$lastcount = count($coordinates)-1;
	$coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	
?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
	<link rel="stylesheet" href="css/mapa.css">
    <title>Maps JavaScript API</title> 
	<head>

		<div id="map" ></div>

		<script>
			function initMap() {
			  var mapOptions = {
			    zoom: 18,
			    center: {<?php echo'lat:'. $latitudes[0] .', lng:'. $longitudes[0] ;?>}, //{lat: --- , lng: ....}
			    mapTypeId: google.maps.MapTypeId.SATELITE
			  };

			  var map = new google.maps.Map(document.getElementById('map'),mapOptions);

			 
			  var marker = new google.maps.Marker({
			  	position: {<?php echo'latitud:'. $latitudes[0] .', longitud:'. $longitudes[0] ;?>},
			  	map: map,
			  	title:"mi ubicacion",
			  });

			
		
			}

			google.maps.event.addDomListener(window, 'load', initialize);
    	</script>

    	<!--remenber to put your google map key-->
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-dFHYjTqEVLndbN2gdvXsx09jfJHmNc8&callback=initMap"></script>

	</body>
</html>