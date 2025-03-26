<html>

<head>

<link rel="stylesheet" href="mystyle.css">


<title>

Registration Progress

</title>

</head>

<body>

<?php


include 'con_db.php';

$reg_usrnm = $_POST["reg_usrnm"];

$reg_passwd = $_POST["reg_passwd"];

$reg_passwd2 = $_POST["reg_passwd_again"];

$reg_email = $_POST["reg_email"];





if ($reg_passwd !=$reg_passwd2)
	
	{
		echo "Passwords do not match";
		
		echo "<br><br>";
		
		echo "<a href = 'create_account.php'> Go back to registration page  </a>";
		
	}
	
	
	else
		
	
	{
		//string tou erotimatos
		
		$insert = "INSERT INTO user VALUES ('$reg_usrnm','$reg_passwd','$reg_email')";
		
		
		//ektelesi tou erotimatos
		
		$result = $conn->query($insert);
		
		
		if($result ==TRUE)
			
			{
				
				echo "Registration with success";
				
				echo "<br><br><br>";
				
				
				echo "<a href = 'index.php'> Go to Login Page </a>";
 
				
			}
			
		else
        

			{
				echo "Error in Registration";
				
				
				echo "<br><br><br>";

				
				echo "<a href = 'create_account.php'> Go to Back to Registration Page </a>";


			}			
		
		
	}






?>

</body>




</html>