<html>

<head>

<link rel="stylesheet" href="mystyle.css">


</head>

<?php 

session_start();

include 'con_db.php';

$poi_id = $_POST["poi_id"];

$pop = $_POST["pop"];

$day = date("l");

$hour = date("H");


$insert ="INSERT INTO estimate VALUES ('$poi_id', '$day', '$hour', '$pop')";


if($conn->query($insert)===TRUE)
	

	{
		echo "<br>Insert was done successfully!!!";
		
	}
	
	else
		
	
	{
		echo "Error in update!";
		
	}




?>


</html>