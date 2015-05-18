<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";	
	// Create connection

	if (!isset($_GET['selectmenu'])) {
		$_GET['selectmenu'] = '';	
	}
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}	
 	session_start(); // start the session

 	if (!isset ($_SESSION["number"])) { // check if session variable exists
 		$_SESSION["number"] = ''; // create the session variable
 	} else {
 		$num = $_SESSION["number"]; // copy the value to a variable
 	}
 	// Set submit_btn an empty string value if undefined
 	if (!isset($_GET['submit_btn'])) {
 		$_GET['submit_btn'] = '';
 	}
 	// When submitted store selected paper in the $_SESSION variable and activate next page
 	if ($_GET['submit_btn']) {
		// $num = $_GET['selectmenu']; // increment the value
		$_SESSION["number"] = $_GET['selectmenu']; // update the session variable
		header("location:moderate_paper.php"); // redirect to number.php
		echo $num;
 	}

?> 
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#select {
			font-size: 16px;
			font-weight: bold;
			width: 300px;
			color: red;
			background: black;
			border: 10px;
		}
		td {
		}
		body {
			/*background-color: black;*/
			color: red;
		}
	</style>
	<title></title>
</head>
<body>
	<?php
		// Query to display papers from the 'papers_awaiting_moderation' table
		$sql_papers_awaiting_moderation = "SELECT * FROM papers_awaiting_moderation";
		// Query to display papers from 'approved_papers' table
		$approved_papers = "SELECT * FROM approved_papers";
	?>
	<h3>Papers Awaiting Moderation:</h3>
	<form name='form-awaiting-papers' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
	<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
	<h5>Select a paper to moderate</h5>
	<?php

			$result = mysqli_query($conn, $sql_papers_awaiting_moderation);
			echo "<SELECT name='selectmenu' size='20' id='select' style='width: 100%'>";		
			// Loop to get and echo the results as options
			while ($row = $result->fetch_assoc()) {

				echo 
				'<option value="'.$row["Submission_Date"].'">
					<table>						
						<tr>
							<th>Date Submitted:</th>
							<td>'.$row["Submission_Date"].'</td>
						</tr>
						<tr>
							<td>Submitted By:</td>					
							<td>'.$row["Submitted_By"].'</td>
						</tr>
					</table>
				</option>';
			}
		echo "</SELECT>";
		echo "<input name='submit_btn' type='submit' value='Submit'>";

	?>




	</form>

	<h3>Approved Papers</h3>
	<form name='form-approved-papers' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
		<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
		<?php
				$result = mysqli_query($conn, $approved_papers);
				echo "<SELECT name='selectmenu' size='20' id='select' style='width: 100%'>";		
				// Loop to get and echo the results as options
				while ($row = mysqli_fetch_assoc($result)) {
				echo 
				'<option value="'.$row["Submission_Date"].'">
					<table>
						<tr>
							<th>Date Submitted:</th>
							<td>'.$row["Submission_Date"].'</td>
						</tr>
						<tr>
							<td>Submitted By:</td>					
							<td>'.$row["Submitted_By"].'</td>
						</tr>
					</table>
				</option>';
			}
		echo "</SELECT>";			
		?>
	</form>

	<?php
		// Close db connection
		mysqli_close($conn);	
	?>

<!-- Debug -->
<pre>
	<?php
		//if ($_GET) {
			//echo 'Contents of the $_GET array: <br>';
			//print_r($_GET);
		//}
	?>
</pre>
<a href="http://localhost/AUTSE2015TeamManukau/">Go Back</a><br>
</body>
</html>