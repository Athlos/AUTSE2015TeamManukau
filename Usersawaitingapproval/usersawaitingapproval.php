<html>
<head>
	<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
</head>
<body>
<h1>Show User accounts awaiting approval</h1>
<?php
	
	//connect to database
	$conn = @mysqli_connect('127.0.0.1','root','','test')
			or die('Failed to connect to server');
		
		$query = "SELECT user_name FROM users_awaiting_moderation";
		$results = mysqli_query($conn, $query)
		or die("<p>Unable to execute the query.</p>");
		
$row = mysqli_fetch_row($results);
while ($row) {
echo "$row[0]";
?>
<input type="checkbox" name="permlike" value="like">Approve<br>
<?php

$row = mysqli_fetch_row($results);
}
?>

<a href="http://localhost/AUTSE2015TeamManukau/">Go Back</a><br>

</body>
</html>