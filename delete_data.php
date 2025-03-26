<html>


<head>

<link rel="stylesheet" href="mystyle.css">


<title> Ask Foe Delete  </title>

</head>

<?php

session_start();


if(!isset($_SESSION["adm_username"]))
	
	{
		header("Location: index.php");
		
	}


include 'nav_admin.php';



?>

<br>

<br>

<form action = "final_delete.php" method = "post">

Are you sure you want to delete pois' data?

<br><br>

<input type = "checkbox" name = "ask" value = "yes"> Yes

<input type = "checkbox" name = "ask" value = "no"> No

<br> <br>

<input type = "submit" value = "Select"> 



</form>




</html>