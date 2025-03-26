<?php

include 'con_db.php';

session_start();

$email = $_SESSION["email"];

$sql = "SELECT diagnosis_date FROM covid_case WHERE email = '$email'";


$result = $conn->query($sql);

echo "<br>List of Dates for Covid Case:<br>";

echo "<table border = '2'>";

echo "<tr>";


echo "<th>";
echo "Diagnosis Date";

echo "</th>";

echo "</tr>";




while($row =$result->fetch_assoc())
	

	{
		
		echo "<tr>";
		
		
		echo "<td>";
		
		echo $row["diagnosis_date"];
		
		echo "</td>";
		
		echo "</tr>";
		
		
		
		
	}


echo "</table>";

?>