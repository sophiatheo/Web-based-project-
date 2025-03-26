<html>

<head>

<title>

Login Result of User

</title>


</head>

<body>

 <?php
 
 session_start();
 
 include 'con_db.php';
 
 $user_usrnm = $_POST["user_usrnm"];
 
 $user_passwd = $_POST["user_passwd"];
 
 
 $select = "SELECT username, email FROM user WHERE username = '$user_usrnm' AND password = '$user_passwd'";
 
 
 $result = $conn->query($select);
 
 //an exoyn epistrafei apotelesmata (diladi an exei dosei username kai password pou einai yparkta
 if ($result->num_rows > 0)
	 
 
 {
	 //edo fernoume tin eggrafi tou apotelesmatos 
	 $row = $result->fetch_assoc();
	 
	 
	 //arxikopoioume mia session metavliti me to onoma email pou tha exei san timi to email tou user
	 $_SESSION["email"] = $row['email'];
	 
	 header("Location: home_user.php");

	 
	 
	 
 }
 
 else
	 
 
 {
		 header("Location: index.php");

	 
 }
 
 
 
 ?>


</body>




</html>
