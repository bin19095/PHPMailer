
<?php
include_once 'connection.php';

$output='';
$result = mysqli_query($conn, "SELECT * FROM message");
while($res = mysqli_fetch_array($result)){
	$output .='
	<tr>
	<td>' . $res['id'] . '</td>
	<td>' . $res['sent_subject'] . '</td>
	<td>' . $res['sent_message'] . '</td>
	<td><a href="delete.php?id='.$res['id'] . '">Delete</a>
	<td>
	</tr>
	';
}
if($output !=''){
	$output ='
	<table>
	<tr>
		<th>ID</th>
		<th>Subject</th>
		<th>Message</th>
		'. $output.'
		</table>';
		}else{
			$output ='<p>No Message to display</p>';
		}
		echo $output;

/*
		"<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"*/
	?>
