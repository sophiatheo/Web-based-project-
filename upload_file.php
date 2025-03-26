<html>

<head>

<title> Result of Upload </title>

</head>


<body>
<?php

session_start();


if(!isset($_SESSION["adm_username"]))
	
	{
		header("Location: index.php");
		
	}


include 'nav_admin.php';


$file_name =$_FILES['fileToUpload']['name'];

include 'insert_pois.php';

include 'insert_popularities.php';


echo "Upload was completed";

?>



</body>



</html>