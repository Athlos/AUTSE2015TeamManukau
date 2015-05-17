<html>
<style type="text/css">
		#select {
			font-size: 16px;
			font-weight: bold;
			width: 300px;
			color: red;
			background: black;
		}
/*		body {
			background-color: black;
		}*/
	</style>
<body>
<div align="center" class = "center" >
	<h1>Paper was Rejected</h1>
	<p> Paper was placed into removal table </p>
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

	
	
	$sql = "INSERT INTO papers_awaiting_removal(Submission_Date, Submitted_By, Paper_URL, Comment)
	VALUES ('$SubDate','$SubBy','$URL','Comment')";

	
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully<br>";
	} else {
		echo "This entry already exists. Please choose another Status Code";
	}
	
	
	//delete the information from the SQL tables

	$sql = "DELETE from papers_awaiting_moderation where PAPER_URL = '$URL';";

	//test database record. This works. If you mess up syntax check against this
	//$sql = "INSERT INTO status(Share)
	//VALUES ('$shareSettings')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Entry successfully deleted from moderation table";
	} else {
		echo "";
	}
	
	$conn->close();
	
?>

<!-- This returns to the home page-->
	<form action="SEStatus.php" >
		<input type="submit" value="Go Back" >
	</form>
	</div>

</div>
</body>
</html>