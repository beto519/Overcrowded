


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
          center: {lat: 28.006381, lng: -110.921847},
          zoom: 13
        });

		var marker = new google.maps.Marker({
          position:  {lat: 28.006381, lng: -110.921847},
          map: map,
	  title: 'Mi ubicacion'
        });
     
        
      
      }

	</script>
	</body> 
</html>