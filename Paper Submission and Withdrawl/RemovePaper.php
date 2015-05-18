<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Remove Paper</title>
</head>
<body>
	<h1> Attempting to Remove</h1>
	<?php
		//Here we will remove a paper, or put it into awaiting removal table, this was a lot trickier than adding papers
		
		//First, we get the values out of RemovePaperForm.php, which are the URL, Withdrawer and comments
		
		if (isset ($_GET["link"])){
			$link = $_GET["link"];
		} else echo "link Is Incorrect Data Type"."<br />";
		
		if (isset ($_GET["withdrawer"])){
			$withdrawer = $_GET["withdrawer"];
		} else echo "withdrawer Is Incorrect Data Type"."<br />";
		
		if (isset ($_GET["comment"])){
			$comment = $_GET["comment"];
		} else echo "comment Is Incorrect Data Type"."<br />";
		
		//Now we connect to the database, using the default login of 127.0.0.1 (which is localhost), root (default user), '' (default password is blank), 'test' (directory with out databases)
		//this will throw an exception if the connection fails, if that is the case, please check you have your database in the right folder
		
		$conn = @mysqli_connect('127.0.0.1','root','', 'test')
		or die('Failed to connect to server');
		
		//This is the query string, holding the SQL command to use
		//We are selecting a paper with the matching URL in the awaiting moderation table, meaning its not yet in the main database
		
		$query = "SELECT Paper_URL FROM papers_awaiting_moderation
		WHERE Paper_URL = '$link';";
		
		$result = mysqli_query($conn, $query)
		or die("<p>Unable to execute the query.</p>");
		
		//Once we have executed, we retrieve how many items have output from the table (how many rows)
		
		$num_rows = $result->num_rows;
		
		//If there are 0 rows, then it it not being moderated
		if($num_rows === 0) {
			// row not found,	check main database
			
			$query1 = "SELECT Paper_URL FROM approved_papers
			WHERE Paper_URL = '$link';";
			
			$result = mysqli_query($conn, $query)
			or die("<p>Unable to execute the query.</p>");
			$num_rows = $result->num_rows;
			
			//if there is an output, then the paper is in the main database, otherwise it does not exist
			if($num_rows > 0) {
				$query2 = "INSERT INTO papers_awaiting_removal(Submission_Date, Submitted_By, Paper_URL)
				VALUES (now(), '$withdrawer', '$link', '$comment')";
			
				//We have not applied to remove the paper, and transferred a removal request to the right database for the admin to see
				if ($conn->query($query2) === TRUE)
					echo "Applied to remove paper";
				else echo "Failed to apply properly";
			} else echo "Paper does not exist";
		} else {
			// papers has not be moderated, delete automatically based on URL
			$query3 = "DELETE FROM papers_awaiting_moderation
			WHERE Paper_URL = '$link'";
			
			//This executes the string we have made, and returns if it was able to be executed
			if ($conn->query($query3) === TRUE)
				echo "Paper was not yet moderated and has been deleted";
			else echo "Failed to delete properly";
		}
		
		
		//now we close the database
		mysqli_close($conn);
		
		
	?>
	
	<br><a href="Temp.php">Go Back</a>
	
</body>
</html>