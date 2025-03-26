<?php

include 'con_db.php';

//pairnoume to periexomeno tou arxiou
$file  = file_get_contents($file_name);

//anagnorizei tin json domi tou arxeiou
$pois = json_decode($file, true);


for($i=0;$i<count($pois);$i++)
	

	{
		
	$poi_code = $pois[$i]['id'];

	$poi_name = $pois[$i]['name'];

	$poi_type = $pois[$i]['types'][0];
	
	$poi_lat = $pois[$i]['coordinates']['lat'];
	
	$poi_lng = $pois[$i]['coordinates']['lng'];
	
	
	$ask_for_point = "SELECT COUNT(*) as total FROM poi WHERE id = '$poi_code'";
	
	$result_ask_for_point = $conn->query($ask_for_point);
	
	$row_ask_for_point = $result_ask_for_point->fetch_assoc();
	
	$num_points= $row_ask_for_point['total'];
	
	if($num_points !=1)
		
		{
	
	$insert_poi = "INSERT INTO poi VALUES ('$poi_code', '$poi_name', '$poi_type','$poi_lat','$poi_lng')";
	
	$apotelesma = $conn->query($insert_poi);
	
	if ($apotelesma ===FALSE)
		
		{
			echo "Error in inserting poi";
			
		}
		
	}
	
	}


?>