<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Save Rating</title>
</head>
<body>
	<?php
		//Here we will add a paper to a submitted database, awaiting moderation
		
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");

		
		
		//First, we get the values out of AddPaperForm.php, which are the URL and Submitter
		if (isset ($_POST['confidence'])){
			$conRating = intval($_POST['confidence']);
		} else echo "confidence rating"."<br />";
		
		if (isset ($_POST['commentC'])){
			$conComment = $_POST['commentC'];
		} else echo "no commentC"."<br />";
		
		if (isset ($_POST['quality'])){
			$qalRating = intval($_POST['quality']);
		} else echo "link Is Incorrect Data Type"."<br />";
		
		if (isset ($_POST['commentQ'])){
			$qalComment = $_POST['commentQ'];
		} else echo "noQuality"."<br />";
		if (isset ($_POST['nameOfPaper'])){
			$name = $_POST['nameOfPaper'];
		} else echo "noName"."<br />";
		//if checks to convert the rating to ints


		
		if($conComment == "Write your comment here. It is capped at 255 characters.")
		{
			$conComment = "";
		}
		if($qalComment == "Write your comment here. It is capped at 255 characters.")
		{
			$qalComment = "";
		}
		
		//This is the query string, holding the SQL command to use
		//now() inputs the current date and time into the table
		
		$query = "INSERT INTO paper_credibility_and_confidence_rating(paper_name,paper_credibility_level, paper_credibility_reason,paper_confidence_level,paper_confidence_reason,rater)
		VALUES ('$name','$qalRating','$qalComment','$conRating','$conComment','user')";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === TRUE)
			echo "New record created successfully";
		else echo "New record failed to create";
		
		//now we close the database
		mysqli_close($conn);
		
		
	?>
	
	<br><a href="PaperDisplay.php">Go Back</a><br>
</body>
</html>