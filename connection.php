<?php
$host="localhost";
$user="root";
$password="";
$db="phpmailer";
$conn = mysqli_connect($host, $user,$password, $db);
if(!$conn){
	die('Connectoin failed'. mysqli_error($conn));
}

?>