<?php 


include 'con_db.php';



$total = 0;


$sql = "SELECT email, diagnosis_date FROM covid_case";


$result = $conn->query($sql);

while ($row = $result->fetch_assoc())
	

	{
		$covid_email = $row['email'];
		
		$covid_date = $row['diagnosis_date'];
		
		$sql2 = "SELECT checkin_time FROM checkin WHERE email = '$covid_email'"; 
		
		$result2 = $conn->query($sql2);
		
		$covid_time  = strtotime($covid_date);

		
		while($row2 = $result2->fetch_assoc())
		
		{
			$chtime = $row2['checkin_time'];
			
			$ctime = strtotime($chtime);
			
			$datediff = $ctime - $covid_time;

           $dif = round($datediff / (60 * 60 * 24));
		   
		    if ($dif >= -7 && $dif <=0)
				
				{
					$total = $total + 1;
					
				}
				
			if ($dif >0 && $dif <=14)

			{
                $total = $total + 1;
               
			}				
			
			
		}
		
		
		
		
	}


echo "<table  border ='2'>";

echo "<tr>";

echo "<th>";

echo "Number of Visitis of Cases";
echo "</th>";

echo "</tr>";

echo "<tr>";

echo "<td>";

echo $total;

echo "</td>";

echo "</tr>";


echo "</table>";

?>