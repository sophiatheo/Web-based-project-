<html>

<head>

<link rel="stylesheet" href="mystyle.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<title>

Stats of Admin

</title>


<script>

$(document).ready(function(){
	
	
	 $.ajax({
                url:'total_checkins.php',
							
               type:'post',

                
                success:function(response){
					
					document.getElementById('div1').innerHTML = response;
					
					

                }
            });
	
	
	$.ajax({
                url:'total_cases.php',
							
               type:'post',

                
                success:function(response){
					
					document.getElementById('div2').innerHTML = response;
					
					

                }
            });
			
	$.ajax({
                url:'cases_visits.php',
							
               type:'post',

                
                success:function(response){
					
					document.getElementById('div3').innerHTML = response;
					
					

                }
            });
			
	$.ajax({
                url:'categories_visits.php',
							
               type:'post',

                
                success:function(response){
					
					document.getElementById('div4').innerHTML = response;
					
					

                }
            });
	


});	




</script>

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

<br>

<br>

<div id = "div1"> </div>

<br>
<br>

<div id = "div2"> </div>

<br>
<br>


<div id = "div3"> </div>

<br>
<br>

<div id = "div4"> </div>


</body>



</html>