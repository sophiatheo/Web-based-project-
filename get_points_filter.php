<?php


function distance($lat1, $lon1, $lat2, $lon2) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;

  
      return ($miles * 1609.344);
  
}

session_start();

if (!isset($_SESSION["email"]))
	
	{
	  header("Location: index.php");	
		
	}

$mylat = $_POST['mylat'];

$mylng = $_POST['mylng'];



include 'con_db.php';

$day = date("l");

$hour = date("H");

///ean den exei arxikopoihthei i session metavliti email
if (!isset($_SESSION["email"]))
	
	{
	  header("Location: index.php");	
		
	}
	
$poi_type = $_POST['poi_type'];
	
	
$select = "SELECT id, lat,lng FROM poi WHERE type = '$poi_type'";

//dimiourgoume ena array me tis plirofories twn pois pou tha epitrafoun
$pois = array();

$day = date("l");

$hour = date("H");


$result = $conn->query($select);



while ($row = $result->fetch_assoc())
	
	{
		$id = $row['id'];
		
		//ftiaxnw ena pinakaki sto opoio tha mpainei to lat kai to lng tou simeiou
		$latlng = array();
		
		$sql = "SELECT value FROM pop WHERE id = '$id' and hour = '$hour'";
		
		$result_value = $conn->query($sql);
		
		$row_value = $result_value->fetch_assoc();
		
		$value = $row_value['value'];
		
		array_push($latlng,floatval($row['lat']));
		
		array_push($latlng,floatval($row['lng']));
		
		array_push($latlng,intval($value));
		
		//ektimisi episkepsimotitas gia tin epomeni ora 
		$sql = "SELECT value FROM pop WHERE id = '$id' and hour = '$hour'+1";
		
		$result_value = $conn->query($sql);
		
		$row_value = $result_value->fetch_assoc();
		
		$value = $row_value['value'];
		
		array_push($latlng,intval($value));
		
		//ektimisi episkepsimotitas gia +2 ores apo tora
		
		$sql = "SELECT value FROM pop WHERE id = '$id' and hour = '$hour'+2";
		
		$result_value = $conn->query($sql);
		
		$row_value = $result_value->fetch_assoc();
		
		$value = $row_value['value'];
		
		array_push($latlng,intval($value));
		
		$mydist  = distance(floatval($row['lat']), floatval($row['lng']), $mylat,$mylng);
		
		array_push($latlng, $mydist);
		
		array_push($latlng, $id);

		$est = "SELECT AVG(value) as mesos FROM estimate WHERE id = '$id' AND day = '$day' AND hour = '$hour'";

	   $res_est = $conn->query($est);

       $row_est = $res_est->fetch_assoc();
	   
	   $mesos =$row_est['mesos'];

       array_push($latlng, $mesos);
	
		//to pinakaki ayto tha mpainei sto megalo array
		
		array_push($pois,$latlng);
		
	}


echo json_encode($pois);

?>