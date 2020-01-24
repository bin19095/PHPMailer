<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div>
		<form action="" method="GET">
			<input type="text" name="search" id="srch-field" placeholder="Enter the message to be searched">
			<input type="submit" name="search_btn" id="srch-btn">
		</form>
		<button id="back_btn" class=triangle-left>back</button>
	<div>
			<script type="text/javascript">
				var btn = document.getElementById('back_btn');
				btn.addEventListener('click', function(){
					document.location.href="php_mailer.php";

				});
			</script>
<?php
include_once "connection.php";
if(isset($_GET['search_btn'])){
	$message_srch=$_GET['search'];
	if(!empty($message_srch)){
		$result=mysqli_query($conn, "SELECT * FROM message where sent_message like '%$message_srch'");
		$output1='';
		while($res = mysqli_fetch_array($result)){
	$output1 .='
	<tr>
	<td>' . $res['id'] . '</td>
	<td>' . $res['sent_subject'] . '</td>
	<td>' . $res['sent_message'] . '</td>
	<td><a href="delete.php?id='.$res['id'] . '">Delete</a>
	<td>
	</tr>
	';
}
if($output1 !=''){
	$output1 ='
	<table>
	<tr>
		<th>ID</th>
		<th>Subject</th>
		<th>Message</th>
		'. $output1.'
		</table>';
		}else{
			$output1 ='<p>No Message to display</p>';
		}
		echo $output1;

	}
}
?>

</body>
</html>