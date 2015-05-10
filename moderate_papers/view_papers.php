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
 	}
 	$num = $_SESSION["number"]; // copy the value to a variable
 
 	if (!isset($_GET['submit_btn'])) {
 		$_GET['submit_btn'] = '';
 	}


 	if ($_GET['submit_btn']) {
		$num = $_GET['selectmenu']; // increment the value
		$_SESSION["number"] = $num; // update the session variable
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
		}
/*		body {
			background-color: black;
		}*/
	</style>
	<title></title>
</head>
<body>
	<?php
		$sql_papers_awaiting_moderation = "SELECT Submission_Date FROM papers_awaiting_moderation";
		$result_papers_awaiting_moderation = mysqli_query($conn, $sql_papers_awaiting_moderation);

		$approved_papers = "SELECT * FROM approved_papers";
		$result_approved_papers = mysqli_query($conn, $approved_papers);
	?>
	<h3>Papers Awaiting Moderation: Select one to moderate</h3>
	<form name='form' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
	<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
	<?php
			echo "<SELECT name='selectmenu' size='20' id='select'>";		
			// Loop to get and echo the results as options
			while ($row = mysqli_fetch_assoc($result_papers_awaiting_moderation)) {
				echo 
				'<option value="'.$row["Submission_Date"].'">'
					.$row["Submission_Date"].
				'</option>';
			}
		echo "</SELECT>";



		echo "<input name='submit_btn' type='submit' value='Submit'>";
	?>
	</form>

	<h3>Approved Papers</h3>
	<form name='form' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
	<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
	<?php
			echo "<SELECT name='selectmenu' size='20' id='select'>";		
			// Loop to get and echo the results as options
			while ($row = mysqli_fetch_assoc($result_approved_papers)) {
			echo 
				'<option value="'.$row["Submission_Date"].'">'
					.$row["Submission_Date"].
				'</option>';
			}
		echo "</SELECT>";
		mysqli_close($conn);	
	?>
	</form>





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