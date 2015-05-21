<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Results</title>
</head>
<body>
	<?php
		//Here we will add a paper to a submitted database, awaiting moderation
		
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");

		
		
		//First, we get the values out of AddPaperForm.php, which are the URL and Submitter
		if (isset ($_GET["search"])){
			$search = $_GET["search"];
		} else echo "link Is Incorrect Data Type"."<br />";
		
		//This is the query string, holding the SQL command to use
		//now() inputs the current date and time into the table
		
		$query = "SELECT * FROM approved_papers WHERE paper_name LIKE '%$search%'";
		
		$result = $conn->query($query);
	//show results 
	
	$row = mysqli_fetch_row($result);
	
	$intNumButton = 0;
    // output data of each row
	
	echo "<table width='100%' border='1'>";
	echo "<tr><th>Entries</th></tr>";
	
    while($row) {
        //echo $row[0]."<br>";
		echo "<tr><td>";
		?>

		<!--This form goes to the rate the paper (confidence/quality process) -->
		<form action = "paperDisplay.php" method = "GET" >
		
		<!--hidden input field attached to every entry that contains the name of the paper so that the next form knows which button was clicked. -->
		<input type="hidden" name="nameOfPaper" value=<?php echo $row[0]?>> 
		
		
		<label><?php echo $row[0]?><name = "display"> </label><br>
		<label>Click <name = "display"> </label>
		<a href="<?php echo $row[0]?>">Here</a><br>
		<label>Methodology : <name = "display"> </label><br>
		<label>Bibliography : <name = "display"> </label><br>
		<label>Research Question : <name = "display"> </label><br>
		<label>Credibility Rating : <name = "display"> </label><br>
		<label>Quality Rating: <name = "display"> </label><br>
		
		<input type = "submit" name = "goButton" value = "Go to">
		
		<!-- http://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit SEND THIS TO A FORM THAT REDIRECTS TO EITHER FAVOURITE OR CONFIDENCE/QUALITY DEPENDING ON WHICH BUTTON WAS
		CLICKED-->
		</form>
		
		<?php
		echo "</td></tr>";
		$row = mysqli_fetch_row($result);
    } echo "</table>";
		//now we close the database
		mysqli_close($conn);
		
		
	?>
	
	<br><a href="SearchForm.php">Go Back</a><br>
</body>
</html>