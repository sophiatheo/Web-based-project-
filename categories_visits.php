<?php

include 'con_db.php';


$sql = "SELECT  poi.type as mytype, COUNT(checkin.checkin_time) as plithos  FROM poi inner join checkin ON poi.id = checkin.poi_id group by poi.type ORDER BY COUNT(checkin.checkin_time) DESC";


$result = $conn->query($sql);

echo "<table border ='2'>";

echo "<tr>";

echo "<th>";

echo "Type";

echo "</th>";

echo "<th>";

echo "Number Of Visits";

echo "</th>";

echo "</tr>";

while ($row = $result->fetch_assoc())
	
	{
		
		echo "<tr>";
		
		echo "<td>";
		
		echo $row['mytype'];
		
		echo "</td>";
		
		echo "<td>";
		
		echo $row['plithos'];
		
		echo "</td>";
		
		echo "</tr>";
		
		
		
	}

echo "</table>";
















?>