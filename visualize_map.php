<html>

<head>

<link rel="stylesheet" href="mystyle.css">

<link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
<script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script type="text/javascript">


$(document).ready(function(){
	
	
	        var mapOptions = {
            center: [38.246242, 21.735085],
            zoom: 10
         }
		 
		  
         // Creating a map object
         var map = new L.map('map', mapOptions);
         
         // Creating a Layer object
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
         map.addLayer(layer);
		 
		  
	//ean einai energopoihmeni i evresi topothesias ston browser	 
    if (navigator.geolocation) {
	
	//tote kaleitai i sinartisis getCurrentPosition etsi wste na vrethoun oi sintetagmenes tis trexousas topothesias 
    navigator.geolocation.getCurrentPosition(showPosition);
  } 
  //diaforetika grafetai diagnostiko minima stin consola oti den ypostirizetai i i evresi topothesias 
  else { 
    console.log("Not supported");
  }
  
  //sinartisi i opoia pairnei san orisma tin topothesia kai vriskei to lat kai to lng
  function showPosition(position) {
	  
  var lat = document.getElementById("lat");
  
  var lng = document.getElementById("lng");
	  
  //dino sto antistoixo div tin timi tou latitude  
  lat.innerHTML = position.coords.latitude;
  
  //dino sto antistoixo div tin timi tou longitude
  lng.innerHTML = position.coords.longitude;
  
 
   //dimiourgia marker kai topothetisi tou panw ston xarti
   
   var x = parseFloat(position.coords.latitude);
   
   var y = parseFloat(position.coords.longitude);
   
   
 var marker = L.marker([x, y]).addTo(map);
   
   
 var popup = marker.bindPopup('Your current location');

 
 
}


//edo fortonontai ta markers me ta simeeia endiaferontos 

});



</script>


</head>

<?php

session_start();

///ean den exei arxikopoihthei i session metavliti email
if (!isset($_SESSION["email"]))
	
	{
	  header("Location: index.php");	
		
	}
	


include 'nav_user.php';

?>


 <div id = "map" style = "width: 100%; height: 75%"></div>
 
 <br>
 
 You current Location is:
 
 <br>
 Latitude:
 <div id = "lat"> </div>
 
 <br>
 
 Longitude:
 <div id = "lng"> </div>


</html>