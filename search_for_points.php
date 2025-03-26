<html>

<head>

<link rel="stylesheet" href="mystyle.css">


<link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
<script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



<script type="text/javascript">


$(document).ready(function(){
	
	
	     var markers = new Array();
	
	        var mapOptions = {
            center: [38.246242, 21.735085],
            zoom: 15
         }
		 
		  
         // Creating a map object
         var map = new L.map('map', mapOptions);
         
         // Creating a Layer object
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
         map.addLayer(layer);
		 
		 
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
	  
  var lat = document.getElementById("mylat");
  
  var lng = document.getElementById("mylng");
	  
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
		 
		 
		 
		 var greenIcon = new L.Icon({
				iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
				shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
						});
						
						
				var orangeIcon = new L.Icon({
				iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
				shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
						});	
					
				var redIcon = new L.Icon({
				iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
				shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
						});
		 
		 
		 $( document ).ready(function() {
    
	  $.ajax({
                url:'get_points.php',
				
			   data: {mylat: document.getElementById('mylat').innerHTML, mylng: document.getElementById('mylng').innerHTML},
			
               type:'post',

                
                success:function(response){
					
					
					console.log(response);
					
					
					
					
					
					//epistrefontai ta apotelesmata me ta simeia endiaferontos 
					
					//i plirofia metatrepetai se morfi javascript
					
					 var data_array = JSON.parse(response);
					 
					 
					 //diatrexoume ton pinaka twn simewn 
					 
					 //kai gia kathe simeio ftiaxnoume enan marker me tis plirofories pou apaitountai
					 for (var i =0; i< data_array.length;i++)
						 
						 {
							 
							 //analoga me to epipedo tis episkepsimotitas tha prepei na dimiourgisoume ton antistoixo
							 
							 
							 //marker me to katallilo xroma 
							 
							 
							 
							 if ( data_array[i][2] <=32)
							 
							 
							 {
								 
								 
							var marker = L.marker([data_array[i][0], data_array[i][1]], {icon: greenIcon}).addTo(map);
							  
							  //dimiourgoume tis plirofories pou tha mpoun panw sto pop up window
							  
							  var info = "Current Estimation:"+ "<b>"+data_array[i][2] + "</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "1 hour later:"+ "<b>"+data_array[i][3]+"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "2 hours later:"+ "<b>"+data_array[i][4] +"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "Avg Users Estimation:"+ "<b>"+ data_array[i][7] +"</b>";
							  
							  if ( data_array[i][5] <1100)
								  
							  
							  {
								  info = info  + "<br>";
								  
								  var point_id = data_array[i][6];
								  
								  
								  var str = "<a href ='checkin.php?id=" + point_id +  "'>Check In NOW</a>";
								  
								  info = info + "<br>" + str;
								  
								  
								  
							  }
							  
							  
							  
							  markers.push(marker);

                              map.addLayer(marker);
							  
							  marker.bindPopup(info);
								 
								 
								 
								 
							 }
							 
							 else if(data_array[i][2] > 32 && data_array[i][2]<=65)
								 
							 
							 {
								  var marker = L.marker([data_array[i][0], data_array[i][1]], {icon: orangeIcon}).addTo(map);
							  
							  //dimiourgoume tis plirofories pou tha mpoun panw sto pop up window
							  
							  var info = "Current Estimation:"+ "<b>"+data_array[i][2] + "</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "1 hour later:"+ "<b>"+data_array[i][3]+"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "2 hours later:"+ "<b>"+data_array[i][4] +"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "Avg Users Estimation:"+ "<b>"+ data_array[i][7] +"</b>";
							  
							   if ( data_array[i][5] <1100)
								  
							  
							  {
								  info = info  + "<br>";
								  
								  var point_id = data_array[i][6];
								  
								  
								  var str = "<a href ='checkin.php?id=" + point_id +  "'>Check In NOW</a>";
								  
								  info = info + "<br>" + str;
								  
								  
								  
							  }
							  
							  
							  markers.push(marker);

                              map.addLayer(marker);
							  
							  marker.bindPopup(info);
								 
							 }
							 
							 
							 else
								 
							 
							 {
								 var marker = L.marker([data_array[i][0], data_array[i][1]], {icon: redIcon}).addTo(map);
							  
							  //dimiourgoume tis plirofories pou tha mpoun panw sto pop up window
							  
							  var info = "Current Estimation:"+ "<b>"+data_array[i][2] + "</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "1 hour later:"+ "<b>"+data_array[i][3]+"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "2 hours later:"+ "<b>"+data_array[i][4] +"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "Avg Users Estimation:"+ "<b>"+ data_array[i][7] +"</b>";
							  
							    if ( data_array[i][5] <1100)
								  
							  
							  {
								  info = info  + "<br>";
								  
								  var point_id = data_array[i][6];
								  
								  //dimiourgoume ena dynamiko url, sto opoio pername san parametro to id tou point
								  
								  var str = "<a href ='checkin.php?id=" + point_id +  "'>Check In NOW</a>";
								  
								  info = info + "<br>" + str;
								  
								  
								  
							  }
							  
							  markers.push(marker);

                              map.addLayer(marker);
							  
							  marker.bindPopup(info); 
								 
								 
							 }
							 
							 
						
							 
							 
						 }
					

                }
            });
	
	
//otan patithei to koumpi gia tin anazitisi tha kalestei ajax kwdikas, 

//opou tha kaleita to antistoixo arxeio kai tha epistrefei ta simeia

//endiaferontos ta opoia antapokrinontai stis apaitiseis tou xristi 


$("#search_btn").click(function(){
	
	//tha kalesw to get_points_filter.php  sto opoio tha peraso san dedomena to keimeno pou pliktrologise o xristis
        
            $.ajax({
                url:'get_points_filter.php',
				data: {mylat: document.getElementById('mylat').innerHTML, mylng: document.getElementById('mylng').innerHTML, poi_type: $( "#poi_type" ).val() },

                type:'post',
                
                success:function(response){
					
					console.log(response);

                  //diagrafoume tous palious markers 
				  for(i=0;i<markers.length;i++) {
				map.removeLayer(markers[i]);
						}  
				  
				//tha mpoun oi neoi panw ston xarti
				
				
				
				 var data_array = JSON.parse(response);
					 
					 
					 console.log(data_array);
					 
					 //diatrexoume ton pinaka twn simewn 
					 
					 //kai gia kathe simeio ftiaxnoume enan marker me tis plirofories pou apaitountai
					 for (var i =0; i< data_array.length;i++)
						 
						 {
							 
							 //analoga me to epipedo tis episkepsimotitas tha prepei na dimiourgisoume ton antistoixo
							 
							 
							 //marker me to katallilo xroma 
							 
							 
							 
							 if ( data_array[i][2] <=32)
							 
							 
							 {
								 
								 
							var marker = L.marker([data_array[i][0], data_array[i][1]], {icon: greenIcon}).addTo(map);
							  
							  //dimiourgoume tis plirofories pou tha mpoun panw sto pop up window
							  
							  var info = "Current Estimation:"+ "<b>"+data_array[i][2] + "</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "1 hour later:"+ "<b>"+data_array[i][3]+"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "2 hours later:"+ "<b>"+data_array[i][4] +"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "Avg Users Estimation:"+ "<b>"+ data_array[i][7] +"</b>";
							  
							   if ( data_array[i][5] <1100)
								  
							  
							  {
								  info = info  + "<br>";
								  
								  var point_id = data_array[i][6];
								  
								  //dimiourgoume ena dynamiko url, sto opoio pername san parametro to id tou point
								  
								  var str = "<a href ='checkin.php?id=" + point_id +  "'>Check In NOW</a>";
								  
								  info = info + "<br>" + str;
								  
								  
								  
							  }
							  
							  
							  
							  markers.push(marker);

                              map.addLayer(marker);
							  
							  marker.bindPopup(info);
								 
								 
								 
								 
							 }
							 
							 else if(data_array[i][2] > 32 && data_array[i][2]<=65)
								 
							 
							 {
								  var marker = L.marker([data_array[i][0], data_array[i][1]], {icon: orangeIcon}).addTo(map);
							  
							  //dimiourgoume tis plirofories pou tha mpoun panw sto pop up window
							  
							  var info = "Current Estimation:"+ "<b>"+data_array[i][2] + "</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "1 hour later:"+ "<b>"+data_array[i][3]+"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "2 hours later:"+ "<b>"+data_array[i][4] +"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "Avg Users Estimation:"+ "<b>"+ data_array[i][7] +"</b>";
							  
							   if ( data_array[i][5] <1100)
								  
							  
							  {
								  info = info  + "<br>";
								  
								  var point_id = data_array[i][6];
								  
								  //dimiourgoume ena dynamiko url, sto opoio pername san parametro to id tou point
								  
								  var str = "<a href ='checkin.php?id=" + point_id +  "'>Check In NOW</a>";
								  
								  info = info + "<br>" + str;
								  
								  
								  
							  }
							  
							  
							  markers.push(marker);

                              map.addLayer(marker);
							  
							  marker.bindPopup(info);
								 
							 }
							 
							 
							 else
								 
							 
							 {
								 var marker = L.marker([data_array[i][0], data_array[i][1]], {icon: redIcon}).addTo(map);
							  
							  //dimiourgoume tis plirofories pou tha mpoun panw sto pop up window
							  
							  var info = "Current Estimation:"+ "<b>"+data_array[i][2] + "</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "1 hour later:"+ "<b>"+data_array[i][3]+"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "2 hours later:"+ "<b>"+data_array[i][4] +"</b>";
							  
							  info = info + "<br>";
							  
							  info = info + "Avg Users Estimation:"+ "<b>"+ data_array[i][7] +"</b>";
							  
							  
							   if ( data_array[i][5] <1100)
								  
							  
							  {
								  info = info  + "<br>";
								  
								  var point_id = data_array[i][6];
								  
								  //dimiourgoume ena dynamiko url, sto opoio pername san parametro to id tou point
								  
								  var str = "<a href ='checkin.php?id=" + point_id +  "'>Check In NOW</a>";
								  
								  info = info + "<br>" + str;
								  
								  
								  
							  }
							  
							  
							  
							  markers.push(marker);

                              map.addLayer(marker);
							  
							  marker.bindPopup(info); 
								 
								 
							 }
							 
							 
						
							 
							 
						 }
				
				
				  

					
                }
            });
        
    });	







	
	
});	
	

});



</script>


</head>

<?php

//session_start();

///ean den exei arxikopoihthei i session metavliti email

	


include 'nav_user.php';

?>


Current Latitude:
<div id = "mylat"> </div>
 
 <br>
 
 Current Longitude:
 <div id = "mylng"> </div>


 <div id = "map" style = "width: 100%; height: 75%"></div>
 
 
 
 <br>
 <br>
 
 Please Insert Type of Poi:
 
 <input type = "text" id ="poi_type" >
 
 <br>
 
 <br>
 
 <input type = "submit" id = "search_btn" value ="Search">


</html>