<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Results</title>
</head>
<body>
	<?php
	//PHP code to get the URL
	$redirect = $_GET['nameOfPaper'];
	
	$url = "http://yogeshchaugule.com/blog/2013/how-display-pdf-browser-php";

	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
	
	//for now paper url is doubling as paper name
	$sql = "select * from approved_papers where paper_name = '$redirect';";

	
	$result = $conn->query($sql);
	//show results 
    // output data of each row
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//grab the information for the paper
		$url = $row["Paper_URL"];
    }
	} else {	
		//if theres no results theres no point continuing simply redirect back
			echo "No record";

	}
	$conn->close();
?>
	<a href="<?php echo $url?>"><?php echo $redirect?></a><br>

	
	
	
	<form action = "saveRatings.php" method = "POST">
	 <p>
	<input type="hidden" name="nameOfPaper" value=<?php echo $redirect?>> 
	 Confidence Rating : 
		<select id = "confidence" name = "confidence">
		<option value = "1">One Star!</option>
		<option value = "2">Two Stars!</option>
		<option value = "3">Three Stars!</option>
		<option value = "4" >Four Stars!</option>
		<option value = "5">Five Stars!</option>
		</select>
		<br>
		<br>
		 <textarea rows="4" cols="50" maxlength="255" name = "commentC">Write your comment here. It is capped at 255 characters. </textarea>

	 </p>
	 <hr>
	<p>
	 Quality Rating : 
	 <select id = "quality" name = "quality">
		<option value = "1">One Star!</option>
		<option value = "2">Two Stars!</option>
		<option value = "3">Three Stars!</option>
		<option value = "4" >Four Stars!</option>
		<option value = "5">Five Stars!</option>
		</select>
		<br>
		<br>
		<textarea rows="4" cols="50" maxlength="255" name = "commentQ">Write your comment here. It is capped at 255 characters. </textarea>
	 </p>
	 
		<input type="submit" value="Submit">

	</form>
	
	<form action = "favouritePaper.php" method = "GET">
		<label>Until User accounts are created: <input type = "text" name = "user"> </label><br>
		<input type="hidden" name="nameOfPaper" value=<?php echo $redirect?>> 
		<input type = "submit" name = "favButton" value = "Favourite">
	</form>
	<br><a href="SearchForm.php">Go Back</a><br>
</body>
</html>