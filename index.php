<html>

<head>

<title>HomePage</title>

<link rel="stylesheet" href="mystyle.css">


</head>

<body>

<table border ='1'>

<tr>

	<td>
	
	Login As User:
	<br><br>
	<form action = "test_login_user.php" method = "post">
	
	User Username:
	
	<input type = "text" name = "user_usrnm" required>
	
	<br><br><br>
	
	User Password:
	
	<input type = "password" name ="user_passwd" required>
	
	<br><br><br>
	
	<input type = "submit" value = "Login As User">
	
	</form>

	</td>


	<td>
	
	Login As Administrator:
	<br><br>
	<form action = "test_login_admin.php" method = "post">
	
	Admin Username:
	
	<input type = "text" name = "admin_usrnm" required>
	
	<br><br><br>
	
	Admin Password:
	
	<input type = "password" name ="admin_passwd" required>
	
	<br><br><br>
	
	<input type = "submit" value = "Login As Administrator">
	
	</form>

	</td>

</tr>

</table>

<br>
<br>

<a href = "create_account.php">Create new Account!</a>


</body>


</html>