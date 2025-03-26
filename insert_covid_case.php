<html>

<head>

<link rel="stylesheet" href="mystyle.css">


</head>

<?php

session_start();

///ean den exei arxikopoihthei i session metavliti email
if (!isset($_SESSION["email"]))
	
	{
	  header("Location: index.php");	
		
	}
	


include 'nav_user.php';

include 'con_db.php';

$user_email = $_SESSION["email"];


$diagnosis_date = $_POST["diagnosis_date"];

$now = date("Y-m-d");


$now_secs = strtotime($now);

$diagnosis_date_secs = strtotime($diagnosis_date);

$diafora = $now_secs - $diagnosis_date_secs;

$diafora_day = $diafora/ (60*60*24);


if($diafora_day <14)


{


$sql = "SELECT COUNT(*) as total FROM covid_case WHERE email = '$user_email'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

$total = $row['total'];


if ($total ==0)
	
	{
		$insert = "INSERT INTO covid_case VALUES ('$user_email', '$diagnosis_date')";
		
		 $ans = $conn->query($insert);
		 
		 if($ans===TRUE)
			 
			 {
				 
				 echo "<br> New Covid Case was inserted!Please stay safe<br>";
				 
			 }
		
		
		
	}
	
	else
		
	
	{
		$sql_date = "SELECT diagnosis_date FROM covid_case WHERE email = '$user_email'";
		
		
		$result_date = $conn->query($sql_date);
		
		$row_date = $result_date->fetch_assoc();
		
		$previous_date = $row_date['diagnosis_date'];
		
		//metatrpoume tis imerominies se deyterolepta
		
		$previous_date_secs = strtotime($previous_date);
		
		
		
		//vriskoume tin apolyti timi tis diaforas

        $difference = abs($diagnosis_date_secs - $previous_date_secs);
		
		//ypologizoume tin diafora se imeres
		$days = $difference / (60 * 60 * 24);
		
        
        if($days >14)

        {

            $update = "UPDATE covid_case SET diagnosis_date ='$diagnosis_date' WHERE email = '$user_email'";
			
			$conn->query($update);
			
			echo "<br> Your diagnosis date was updated with success!";


        }

        else


        {
             echo "<br> You are already a covid case (14 days)!!!"; 


		}			
		
	}
}

else
	
	{
		
		echo " <br> Diagnosis date  < 14 days from now";
		
		
	}

?>


</html>