<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Index </title>
</head>
<body>
	<h1>Favourites</h1>
	<?php 
		include ("DatabaseLogin.php");
		
		$query = "SELECT * 
FROM  `test` 
WHERE 1 
LIMIT 0 , 30";
		//$result = mysqli_query($conn, $query)
		//or die("Table does not exist user does not have favourited papers");
		$result = $conn->query($query);
		//saves the results to a row array
		$row = mysqli_fetch_row($result);
		//enters the info into the add to approve papers query
		while($row) 
		{
			echo $row[0] . "<br>";
			$row = mysqli_fetch_row($result);
		}
		mysqli_close($conn);
	?>
</body>
</html> 