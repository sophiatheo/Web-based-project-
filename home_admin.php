<html>

<head>

<link rel="stylesheet" href="mystyle.css">


<title>

HomePage of Admin

</title>


</head>

<body>


<?php

session_start();


if(!isset($_SESSION["adm_username"]))
	
	{
		header("Location: index.php");
		
	}


include 'nav_admin.php';

?>

</body>



</html>