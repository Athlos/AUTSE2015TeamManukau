<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Add Paper</title>
</head>
<body>
	<h1> Attempting to Add</h1>
	<?php
		//Here we will add a paper to a submitted database, awaiting moderation
		
		//First, we get the values out of AddPaperForm.php, which are the URL and Submitter
		if (isset ($_GET["link"])){
			$link = $_GET["link"];
		} else echo "link Is Incorrect Data Type"."<br />";
		
		if (isset ($_GET["submitter"])){
			$submitter = $_GET["submitter"];
		} else echo "submitter Is Incorrect Data Type"."<br />";
		
		echo $link;
		echo $submitter;
		
		//Now we connect to the database, using the default login of 127.0.0.1 (which is localhost), root (default user), '' (default password is blank), 'test' (directory with out databases)
		//this will throw an exception if the connection fails, if that is the case, please check you have your database in the right folder
		
		$conn = @mysqli_connect('127.0.0.1','root','', 'test')
		or die('Failed to connect to server');
		
		//This is the query string, holding the SQL command to use
		//now() inputs the current date and time into the table
		
		$query = "INSERT INTO papers_awaiting_moderation(Submission_Date, Submitted_By, Paper_URL)
		VALUES (now(), '$submitter', '$link')";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === TRUE)
			echo "New record created successfully";
		else echo "New record failed to create";
		
		//now we close the database
		mysqli_close($conn);
		
		
	?>
</body>
</html>