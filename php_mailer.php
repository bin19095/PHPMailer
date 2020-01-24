
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>
		Send email via Gmail SMTP server in PHP 		
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="robots" content="noindex, nofollow">
	<script type="text/javascript">
	
	</script>
</head>
<body>
	<div id="main">
		<h1>
			Sending email Using Gmail SMTP server in PHP
		</h1>
		<div id="login">
			<h2>
				Gmail SMTP
			</h2>
			<hr/>
			<form action="php_mailer.php" method="post">
				<input type="text" placeholder="Enter your email ID" name="email"/>
				<input type="password" placeholder="Password" name="password"/>
				<input type="text"  placeholder="To : Email Id " name="toid" />
				<input type="text" placeholder="Subject :" name="subject" />
				<textarea row="4" cols="50" placeholder="Enter Your Message..." name="message">
				</textarea>
				<input type="submit" value="Send" name="send" class="myButton" />
			</form>
			<button id="srch_btns" class="myButton"> Search Message</button>
			<script type="text/javascript">
				var btn = document.getElementById('srch_btns');
				btn.addEventListener('click', function(){
					document.location.href="search.php";

				});
			</script>
		</div>
		<div>
			

	
	<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'vendor/autoload.php';
	include 'connection.php';

	if(isset($_POST['send']))
	{
		//Fetching the data here through user
		

		$email = $_POST['email'];
		$password = $_POST['password'];
		$to_id = $_POST['toid'];
		$message = $_POST['message'];
		$subject =$_POST['subject'];

		$mail = new PHPMailer;
		$mail->isSMTP();
		//$mail->SMTPDebug = 2;
		$mail->Host = 'smtp.gmail.com'; //specifying main and backup SMTP
		$mail->Port = 587; //TCP port
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = $email;
		$mail->Password =$password;
		//Email Sending Details
		$mail->setFrom($email,$subject);
		$mail->addAddress($to_id);
		$mail->Subject = $subject;
		$mail->msgHTML($message);

		if (!$mail->send()) {
			$error = "Mailer Error:" . $mail->ErrorInfo;
			//echo "<script language='javascript' type='text/javascript'> location.href='php_mailer.php' </script>";	
		}
		else {
			echo '<p id="para"> Message Sent Successfully! </p>';
			$store_message=$_POST['message'];
			$store_subject=$_POST['subject'];
			$result = mysqli_query($conn, "INSERT INTO message(sent_subject,sent_message) VALUES('$store_subject','$store_message')");
			echo '<p id= "para">Mssage Stored:'. $store_message.' Subject Stored : '.$store_subject.'</p>';
		}
	}
	else{
		echo '<p id ="para"> Please enter valid data</p>';
	}

include 'listed.php';
?>


	</div>

	</div>
</body>
</html>