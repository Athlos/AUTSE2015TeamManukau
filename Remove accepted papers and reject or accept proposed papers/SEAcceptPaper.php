<html>
<style>
body {
    background-image: url("wood.jpg");
    background-color: #cccccc;
}
h1   {color:blue}
p    {color:black}
</style>
<body>
<div align="center" class = "center" >
	<h1>Paper was Accepted</h1>
	<p> Paper was placed into accepted table </p>
<?php



	//grab hidden fields
	$URL = $_POST['PAPER_URL'];
	$SubDate = $_POST['Submission_Date'];
	$SubBy = $_POST['Submitted_By'];
	// Include file with sql details
	 $sql_host="localhost";
	 $sql_user="root";
	 $sql_pass="";
	 $sql_db="test";
	 $sql_tble="status"; // change to your own table name

	// Create connection
	$conn = new mysqli($sql_host, $sql_user, $sql_pass, $sql_db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
	
	$sql = "INSERT INTO approved_papers(Submission_Date, Submitted_By, Paper_URL, Comment)
	VALUES ('$SubDate','$SubBy','$URL','Comment')";

	//test database record. This works. If you mess up syntax check against this
	//$sql = "INSERT INTO status(Share)
	//VALUES ('$shareSettings')";
	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "This entry already exists. Please choose another Status Code";
	}

	
	//delete the information from the old table


	$sql = "DELETE from papers_awaiting_moderation where PAPER_URL = '$URL';";


	
	if ($conn->query($sql) === TRUE) {
		echo "Entry successfully deleted from moderation table";
	} else {
		echo "";
	}
	
	$conn->close();
	
?>

<!-- This returns to the home page-->
	<form action="SEStatus.php" >
		<input type="submit" value="Home Page" >
	</form>
	</div>

</div>
</body>
</html>