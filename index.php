<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css\style.css">
	<link rel="stylesheet" href="css">
	<title>Document</title>
</head>
<body class="body">
		<div class="container">
			<img src="https://img.icons8.com/bubbles/50/000000/cloud-account-login-male.png">
				<form action="index.php" method="post">
					<input type="text" name="username" placeholder="enter the username" />
					<input type="password" name="password" placeholder="password">
					<input type="submit" value="LOGIN" name="login" class="myButton"/>

				</form>
			

		</div>

<?php

session_start();
include('connection.php');
//echo "reads before click";
if(isset($_POST['login']))
{ 

	$password=$_POST['password'];
	$dec_password=$password;
	$username=$_POST['username'];

	$link=$conn;
$ret= mysqli_query($link,"SELECT * FROM register WHERE username='$username' and password='$dec_password'");

if (mysqli_fetch_row($ret) != 0)
{
 echo "<script language='javascript' type='text/javascript'> location.href='php_mailer.php' </script>";	
  }
  else
  {
echo "<script type='text/javascript'>alert('User Name Or Password Invalid!')</script>";
}
}


		?>
	
</body>
</html>