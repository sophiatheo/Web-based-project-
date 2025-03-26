<?php 

include 'con_db.php';


$sql  = "SELECT COUNT(*) as total FROM checkin";


$result = $conn->query($sql);

$row = $result->fetch_assoc();

$plithos = $row['total'];

echo "<table border ='2'>";

echo "<tr>";

echo "<th>";

echo "Number Of Check - INS";

echo "</th>";


echo "</tr>";


echo "<tr>";
echo "<td>";

echo $plithos;

echo "</td>";

echo "</tr>";




echo "</table>";


?>