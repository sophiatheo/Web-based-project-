<html>

<head>

<link rel="stylesheet" href="mystyle.css">


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

<form action="upload_file.php" method="post" enctype="multipart/form-data">

       <input type="file" name="fileToUpload" id="fileToUpload">
	   
       <input type="submit" value="Upload" name="submit">
</form>

</html>