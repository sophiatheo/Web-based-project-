<html>

<head>

<link rel="stylesheet" href="mystyle.css">


</head>


<?php



session_start();

include 'con_db.php';


$email = $_SESSION['email'];

$id = $_GET['id'];


$current_time = date('Y-m-d h:i:s', time());


$insert = "INSERT INTO checkin VALUES ('$email', '$id','$current_time')";


if($conn->query($insert)===TRUE)
	
	{
		echo "Check in was successful";
		
	}

?>

<br><br>

<form action  = "change_pop.php" method = "post">

Estimation of Current Popularity:


<input type = "number" name ="pop" min = "0" max = "100">



<br><br>

Point ID:
<input type = "text" name = "poi_id" value = <?php echo $id ?> hidden >

<input type = "submit" value = "Change Current Estimation">


</form>



</html>