<html>


<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<link rel="stylesheet" href="mystyle.css">

<script>

$(document).ready(function(){
	
	
	 $.ajax({
                url:'user_checkins.php',
							
               type:'post',

                
                success:function(response){
					
					document.getElementById('div1').innerHTML = response;
					
					

                }
            });
	
	
	$.ajax({
                url:'user_cases.php',
							
               type:'post',

                
                success:function(response){
					
					document.getElementById('div2').innerHTML = response;
					
					

                }
            });
			


});	




</script>


<title>

Edit Info
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

<div id = "div1"> </div>


<br>

<br>

<div id = "div2"> </div>

<br><br>

<form action = "change_info.php" method ="post">
Edit Username :

<input type = "text" name = "edit_username">
<br><br>

Edit Password:
<input type = "password" name = "edit_password">

<br><br>

<input type = "submit" value = "Edit Info">


</form>

</body>




</html>