<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Add Paper</title>
</head>
<body>
	<?php
	//assuming someone wil lenter this with the name of the user(somehow pass it to this )
	$paperName = $_GET['nameOfPaper'];
	$user = $_GET['user'];
	$alreadyThere = false;
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
	
		//create moderation list 
		$query = "CREATE TABLE IF NOT EXISTS `$user` (
				  `Paper_Name` varchar(255) NOT NULL,
				  PRIMARY KEY (`Paper_Name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		{
			echo "Table failed to print";
		}
		
		$checkConn = @mysqli_connect('127.0.0.1','root','', 'test')
		or die('Failed to connect to server');

		
		$query = "Select * from $user where paper_name = '$paperName'";
		
		$result = mysqli_query($conn, $query)
		or die("<p>Unable to execute the query.</p>");
		
		//Once we have executed, we retrieve how many items have output from the table (how many rows)
		
		$num_rows = $result->num_rows;
		if($num_rows == 1)
		{
			echo "You have already favourited this paper";
			$alreadyThere = true;
		}
		mysqli_close($checkConn);
		$query = "INSERT INTO $user(paper_name)
		VALUES ('$paperName')";
		if($alreadyThere == false)
		{
			//This executes the string we have made, and returns if it was able to be executed
			if ($conn->query($query) === TRUE)
				echo "New record created successfully";
			else echo "New record failed to create";
		}
		//now we close the database
		mysqli_close($conn);
		
		?>
				<br><a href="SearchForm.php">Go Back</a><br>
	</body>
	</html>