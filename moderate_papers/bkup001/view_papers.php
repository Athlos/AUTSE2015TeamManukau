<?php
	$servername = "localhost";
	$username = "root";
	$password = "black";
	$dbname = "test";
	$share = '';
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT Submission_Date FROM approved_papers";
	$result = mysqli_query($conn, $sql);
	// Echo
	echo "<form name='form' method='get' action='moderate_paper.php'>";
		echo "<SELECT name='selectmenu' size='20' id='select'>";		
		// Loop to get and echo the results as options
		while ($row = mysqli_fetch_assoc($result)) {

			echo 
			'<option value="'.$row["Submission_Date"].'">'
				.$row["Submission_Date"].
			'</option>';

		}
	echo "</SELECT>";
	echo "<input type='submit' value='Submit'>";
	echo "</form>";

	$conn->close();			
?> 
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#select {
			font-weight: bold;
			width: 300px;
			color: red;
			background: black;
		}
	</style>
	<title></title>
</head>
<body>


<!-- Debug -->
<pre>
	<?php
		if ($_GET) {
			echo 'Contents of the $_GET array: <br>';
			print_r($_GET);
		}
	?>
</pre>
</body>
</html>