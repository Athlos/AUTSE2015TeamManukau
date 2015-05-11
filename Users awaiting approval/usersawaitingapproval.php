<html>
<head>
	<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
</head>
<body>
<h1>Show User accounts awaiting approval</h1>
<?php
	echo"<table style='border: solid 1px black;'>";
		echo"<tr><th>Username</th>
		<th>Approved?</th></tr>";
	
	//connect to database
	$conn = @mysqli_connect('127.0.0.1','root','','test')
			or die('Failed to connect to server');
	$sql = "SELECT user_name FROM users_awaiting_moderation";
	$result = $conn->query($sql);
	if($result->num_rows > 0)
	{
		//output names from each row
		while($row = $result->fetch_assoc())
		{
			echo"<tr></tr><>";
		}
	}
	else
	{
		echo "There are no new Users awaiting approval.";
	}
?>
</body>
</html>