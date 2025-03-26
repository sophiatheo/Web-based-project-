<html>

<head>

<title>

Login Result of Administrator

</title>

</head>

<body>

<?php

session_start();

include 'con_db.php';

$admin_usrnm = $_POST["admin_usrnm"];

$admin_passwd = $_POST["admin_passwd"];


$select = "SELECT username FROM administrator WHERE username = '$admin_usrnm' and password = '$admin_passwd'";


$result = $conn->query($select);


if ($result->num_rows > 0 )


{
	$row = $result->fetch_assoc();
	
	$_SESSION["adm_username"] = $row['username'];
   
   
   header("Location: home_admin.php");

	
	
}


else
	

	{
		
	   
	   header("Location: index.php");

		
	}



?>


</body>

</html>