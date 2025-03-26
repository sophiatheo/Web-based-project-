<html>

<head>

<title>

HomePage Of User

</title>

<link rel="stylesheet" href="mystyle.css">


</head>

<body>


<?php

session_start();

///ean den exei arxikopoihthei i session metavliti email
if (!isset($_SESSION["email"]))
	
	{
	  header("Location: index.php");	
		
	}
	


include 'nav_user.php';

?>


</body>







</html>