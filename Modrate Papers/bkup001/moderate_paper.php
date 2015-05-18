<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	$tmp_comment = "This is a tmp comment";
	

	if (isset($_GET['getbtn'])) {
		if (!isset($_GET['moderate'])) {
		}			
	}

 	session_start(); // start the session
	$get_date = $_SESSION["date"]; // copy the value to a variable
	// $get_date++; // increment the value
	// $_SESSION["date"] = $get_date; // update the session variable
	// echo $get_date;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}	
	$sql = "SELECT * FROM papers_awaiting_moderation WHERE Submission_Date LIKE '$get_date%'";
	$result = $conn->query($sql);


?> 

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#table {
			/*background: black;*/
			color: red;
			text-align: left;
		}
		a {
			color: red;
		}
/*		#radio_buttons {
			color: red;
		}
		body {
			color: red;
			background-color: black;
		}*/
	</style>
	<title></title>
</head>
<body>
<form name="status_form" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
	<?php		
		if($result->num_rows > 0 && $get_date != null) {
			// Create table rows and headers
			echo "
				<table id='table' border='2px'>				";
			// Output data of each row
			while ($row = $result->fetch_assoc()) {
				// Populate created table table
				echo "
		    <tr>
		        <th>Name:</th>
		        <td>".$row["Submitted_By"]."</td>
		    </tr>
		    <tr>
		        <th>Date Submitted:</th>
		        <td>".$row["Submission_Date"]."</td>
		    </tr>
		    <tr>
		        <th>Paper Name:</th>
		        <td><a target='_blank' href=".$row["Paper_URL"].">".$row["Paper_URL"]."</a></td>
		    </tr>
			";			
			}
			// Comment
			echo "
				</table>";				
		} else {
			// Return 0 results if query does not match
			echo "0 results";
		}		
		if (isset($_GET['moderate'])) {
			// Move paper to 'approved_papers' table
			if ($_GET['moderate'] == 'a') {

				$sql_add_to_approved_papers = "INSERT INTO approved_papers (Submission_Date, Submitted_By, Paper_URL, Comment) 
				SELECT Submission_Date, Submitted_By, Paper_URL, '$tmp_comment' 
				FROM papers_awaiting_moderation
				WHERE Submission_Date='$get_date';";		
				// $sql_add_to_approved_papers = "INSERT INTO approved_papers (Submission_Date, Submitted_By, Paper_URL, Comment)
				// VALUES ('$get_date','Tom B. Erichsen','www.articlebytom.com', '');";
				if ($conn->query($sql_add_to_approved_papers) === TRUE) {
					// Unset current session
					session_unset();
					// Destory all data in current session
					session_destroy();
					// Redirect to Select Papers page
					header("location:view_papers.php");
				} else {
					// Unset current session
					session_unset();
					// Destory all data in current session
					session_destroy();
					// Redirect to Select Papers page
					// header("location:view_papers.php");
					echo "Record not added";
				}		

			// Delete the selected paper from the 'papers_awaiting_moderation' table
			} elseif ($_GET['moderate'] == 'r') {
				// Delete query
				$sql_delete_row = "DELETE FROM papers_awaiting_moderation WHERE Submission_Date ='$get_date';";
				// Delete selected row
				if ($conn->query($sql_delete_row) === TRUE) {
					// Unset current session
					session_unset();
					// Destory all data in current session
					session_destroy();
					// Redirect to Select Papers page
					header("location:view_papers.php");
				} else {
					echo "Record not deleted";
				}							
			}
		}
	?>
		<p id="radio_buttons">
			<!-- Accept function -->
 			<input type="radio" name="moderate" value='a' id="accept">
	        <label for="public">Accept</label>

	     	<!-- Reject function -->
 			<input type="radio" name="moderate" value="r" id="reject" >
	        <label for="public">Reject</label>
		</p>
		<p>
			 <input type="submit" name="getbtn" id="getbtn" value="Post">
		</p>
</form>

<?php
	mysqli_close($conn);
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