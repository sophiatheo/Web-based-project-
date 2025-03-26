<html>

<head>

<link rel="stylesheet" href="mystyle.css">


<title>

HomePage Of User

</title>

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

<br>

<br>

<form action = "insert_covid_case.php" method = "post">

<input type = "date" name = "diagnosis_date" required>


<input type = "submit" value ="New Covid Case">

</form>


</body>







</html>