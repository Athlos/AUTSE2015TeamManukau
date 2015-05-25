<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Add Paper</title>
</head>
<body>
	<h1> Attempting to Add</h1>
	<?php
		//Here we will add a paper to a submitted database, awaiting moderation
		
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");

		
		
		//First, we get the values out of AddPaperForm.php, which are the URL and Submitter
		if (isset ($_GET["name"])){
			if(strlen($_GET["name"]) < 1) {
				echo "Please type in a paper name";
			} else $paper = $_GET["name"];
		} else echo "paper name Is Incorrect Data Type"."<br />";

		if (isset ($_GET["link"])){
			if(strlen($_GET["link"]) < 1) {
				echo "Please type in a paper name";
			} else $link = $_GET["link"];
		} else echo "link Is Incorrect Data Type"."<br />";
		
		if (isset ($_GET["submitter"])){
		
			if(strlen($_GET["submitter"]) < 1) {
				echo "Please type in a Submitter";
			} else $submitter = $_GET["submitter"];
		
		} else echo "submitter Is Incorrect Data Type"."<br />";
		
		
		
		//This is the query string, holding the SQL command to use
		//now() inputs the current date and time into the table
		// Changed table name from papers_awaiting_moderation to submitted_papers
		$query = "INSERT INTO submitted_papers (paper_name, Submission_Date, Submitted_By, Paper_URL)
		VALUES ('$paper', now(), '$submitter', '$link')";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === TRUE)
			echo "New record created successfully";
		// Add mysqli error catch funciton
		else echo "New record failed to create" .mysqli_error($conn);
		
		//now we close the database
		mysqli_close($conn);
		
		
	?>
	
	<br><a href="Temp.php">Go Back</a><br>
	<pre>
		<?php
			print_r($_GET);			
		?>
	</pre>
</body>
</html>