<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";	
	session_start();
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}	
	// Sessions
 	session_start(); // start the session
 	
?> 
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#select {
			font-size: 16px;
			font-weight: bold;
			width: 500px;
			color: red;
			background: black;
		}
		body {
			background-color: black;
		}
	</style>
	<title></title>
</head>
<body>

	<?php
		$sql = "SELECT Submission_Date FROM papers_awaiting_moderation";
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


				// if (!isset ($_SESSION["date"])) { // check if session variable exists
 					$_SESSION["date"] = $row["Submission_Date"]; // create the session variable
 				// }
 					$get_date = $_SESSION["date"]; // copy the value to a variable

			}
		echo "</SELECT>";
		echo "<input type='submit' value='Submit'>";
		echo "</form>";

		$conn->close();			
	?>
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