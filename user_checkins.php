<?php

include 'con_db.php';

session_start();



$email = $_SESSION["email"];


$sql = "SELECT poi_id, checkin_time FROM checkin WHERE email = '$email'";


$result = $conn->query($sql);

echo "<br>List of Check-Ins:<br>";

echo "<table border = '2'>";

echo "<tr>";

echo "<th>";
echo "Poi ID";

echo "</th>";

echo "<th>";
echo "Check In Time";

echo "</th>";

echo "</tr>";




while($row =$result->fetch_assoc())
	

	{
		
		echo "<tr>";
		
		echo "<td>";
		
		echo $row["poi_id"];
		
		echo "</td>";
		
		echo "<td>";
		
		echo $row["checkin_time"];
		
		echo "</td>";
		
		echo "</tr>";
		
		
		
		
	}


echo "</table>";

?>