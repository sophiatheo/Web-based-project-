<html>

<head>

<link rel="stylesheet" href="mystyle.css">


<title>
Create Account
</title>

</head>

<body>

Please Give your details:

<br><br>

<form action = "ins_user.php" method  ="post">

Give Username:
<input type = "text" name = "reg_usrnm" required>

<br><br><br>

Give Password:
<input type = "password" name = "reg_passwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

<br><br><br>

Give Password Again:
<input type = "password" name = "reg_passwd_again"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

<br><br><br>

Give Email:
<input type = "email" name ="reg_email" required>

<br> <br> <br>

<input type = "submit" value = "Create Account">



</form>



</body>


</html>