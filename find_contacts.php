<?php

session_start();

include 'con_db.php';

$email = $_SESSION['email'];

///ean den exei arxikopoihthei i session metavliti email
if (!isset($_SESSION["email"]))
	
	{
	  header("Location: index.php");	
		
	}
	
	echo "<br><br>List of Check IN POINTS with covid cases!!!<br><br>";
	
	echo "<table border = '1'>";
	
	echo "<tr>";
	
	echo "<th>";
	
	echo "Point ID";
	
	echo "</th>";
	
	echo "<th>";
	
	echo "DateTime";
	
	echo "</th>";
	
	echo "</tr>";
	
	
	$sql = "SELECT poi_id, checkin_time FROM checkin WHERE checkin_time <=NOW() and checkin_time >= NOW()- interval 10 day AND email = '$email'";
	
	$result = $conn->query($sql);
	
	//gia kathe ena apo ta simeia sta opoia exei kanei checkin o user 
	while($row = $result->fetch_assoc())
		
		{
			
			$poi_id = $row['poi_id'];
			
			$chtime = $row['checkin_time'];
			
			//vrikoume pooioi exoun kanei checkin sto idio simeio 
			$sql2 = "SELECT email, checkin_time FROM checkin WHERE poi_id = '$poi_id' AND email <> '$email'";
		
		    $result2 = $conn->query($sql2);
			
			//gia kathe enan apo aytous pou exoun kanei checkin sto idio simeio 
			while ($row2 = $result2->fetch_assoc())
				
			
			{
				$user_email = $row2['email'];
				
				$chtime2 = $row2['checkin_time'];
				
				$hourdiff = abs(round((strtotime($chtime) - strtotime($chtime2))/3600, 1));

               //an i diafora tis oras vrisketai se 2 diastima 2 orwn 
                if($hourdiff<=2)
					
					{
				
				//elegxo ean einai krousma 
				$sql3 = "SELECT COUNT(*) as plithos FROM covid_case WHERE email = '$user_email' and diagnosis_date >= NOW()- interval 10 day ";
				
				$result3 = $conn->query($sql3);
				
				$row3 =$result3->fetch_assoc();
				
				$plithos = $row3['plithos'];
				
				
				if($plithos > 0) 
					
					{
						
						echo "<tr>";
						
						echo "<td>";
						
						echo $poi_id;
						
						echo "</td>";
						
						echo "<td>";
						
						echo $chtime;
						
						echo "</td>";
						
						echo "</tr>";
						
						
					}
				
					}
				
				
				
			}
		   
		
			
		}
	
	echo "</table>";
	
	
?>