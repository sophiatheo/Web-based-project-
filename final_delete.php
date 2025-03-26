<html>

<head>

<link rel="stylesheet" href="mystyle.css">


<title> Result Of Deletion  </title>

</head>


<body>

<?php

session_start();

include 'con_db.php';


if(!isset($_SESSION["adm_username"]))
	
	{
		header("Location: index.php");
		
	}


include 'nav_admin.php';

$ans = $_POST["ask"];


if($ans=="yes")
	
	{
		$delete1 = "DELETE from poi";
		
		$delete2 = "DELETE from pop";
		
		$conn->query($delete1);
		
		$conn->query($delete2);
		
		
		echo "All records were deleted!!!!";
		
		
		
		
		
	}



?>

</body>


</html>