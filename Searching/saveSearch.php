<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title></title>
</head>
<body>
	<?php
	//assuming someone will enter this with the name of the user(somehow pass it to this )
	$savedQuery = $_GET['query'];
	echo $savedQuery;
	$user = 'defaultUser';
	$user = $user."_searches";
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
	
		//create moderation list 
		$query = "CREATE TABLE IF NOT EXISTS `$user` (
				  `Search` MEDIUMTEXT NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";


		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		{
			echo "Table failed to print";
		}
		
		
		//$query = "INSERT INTO $user(Search,Methodology,Methods,Sorted_By)
		//VALUES ('$search','$methodology','$methods','$sortedBy')";
		$query = "Insert into $user(Search)
		VALUES CAST('$savedQuery' AS MEDIUMTEXT);";
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === TRUE)
			echo "New record created successfully";
		else echo "New record failed to create";
		
		//now we close the database
		mysqli_close($conn);
			
		
		
		
		?>
				<br><a href="SearchForm.php">Go Back</a><br>
	</body>
	</html>