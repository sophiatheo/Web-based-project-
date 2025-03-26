<html>

<head>

<title> Result Of Editin   </title>

</head>

<?php

session_start();

include 'con_db.php';

///ean den exei arxikopoihthei i session metavliti email
if (!isset($_SESSION["email"]))
	
	{
	  header("Location: index.php");	
		
	}
	


include 'nav_user.php';



$edit_username = $_POST["edit_username"];

$edit_password = $_POST["edit_password"];

$email = $_SESSION["email"];

// edo dimiourgoume to string tou select to opoio tha ektelesoume
$select = "SELECT COUNT(*) AS total FROM user WHERE username='$edit_username'";

//ekteloume to select kai mas epistrefei to apotelesma sto result 
$result = $conn->query($select);

//fernoume tin proti eggrafi tou apotelesmatos (i opoia einai kai i monadiki)

//kai tin fernoume sysxetizomeni gia na mporesoume na anaferthoume se opoia stili tou 

//apotelesmatos theloume 
$row = $result->fetch_assoc();

//stin metavliti total kratame to plithos twn users pou exoun to idio username 
$total = $row['total'];

//an yparxei user me to idio username
if($total > 0 )
	

	{
		echo "<br>";
		
		echo "User already exits";
		
		echo "<br>";
		
		echo "<a href='edit_info.php'> Go Back... </a>";
		
		
	}

 else 
	 
 
	{
		$update = "UPDATE user SET username = '$edit_username',password='$edit_password' WHERE email = '$email'";
		
		
		$apotelesma = $conn->query($update);
		
		if($apotelesma ===TRUE)
			
			{
				echo "Update of info was completed";
				
				
			}
		
		
	}




?>


</html>