<html>


<head>

<link rel="stylesheet" href="mystyle.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$( document ).ready(function() {
	
	
		$.ajax({
                url:'find_contacts.php',

                type:'post',
                
                success:function(response){
					
					console.log(response);
                   

                    $("#contacts").html(response);
				   

                }
            });
	


});


</script>



</head>



<?php


	


include 'nav_user.php';

?>

<div id  = "contacts" </div>



</html>