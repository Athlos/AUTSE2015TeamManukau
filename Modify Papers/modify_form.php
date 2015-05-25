<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";	

	if (!isset($_GET['modify_paper_name'])) {
		$_GET['modify_paper_name'] = '';
	}
	if (isset($_GET['modify_paper_name'])) {
		$modified_paper_name = $_GET['modify_paper_name'];
	}

	if (!isset($_GET['modify_paper_url'])) {
		$_GET['modify_paper_url'] = '';
	}
	if (isset($_GET['modify_paper_url'])) {
		$modified_paper_url = $_GET['modify_paper_url'];
	}

	// Start session to store the data from the get method of the previous page
 	session_start(); // start the session
	$num = $_SESSION["number"]; // copy the value to a variable
	// Debug: display date of the selected paper
	// echo $num;

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}	
	if (isset($_GET['backbtn'])) {
		header("location:select_paper.php");
	}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
	<body>
		<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<h3>Selected Paper:</h3>
		<?php
			$sql = "SELECT * FROM approved_papers WHERE Submission_Date LIKE '$num%'";
			$result = $conn->query($sql);

		// Display data from the 'papers_awaiting_moderation' table
		if($result->num_rows > 0 && $num != null) {
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
		        <td>".$row["Paper_URL"]."</td>
		    </tr>
		    <tr>
		        <th>Paper URL:</th>
		        <td><a target='_blank' href=".$row["Paper_URL"].">".$row["Paper_URL"]."</a></td>
		    </tr>		    

			";			
			}
			echo "
				</table>";	
			} else {
				// Return 0 results if query does not match
				echo "0 results";
			}			
		?>
		<br>
		<h3>Modify Paper:</h3>
		<table border="2px">
			<tr>
				<td>Modify Paper Name:</td>
				<td><input type="text" name="modify_paper_name"></td>
			</tr>
			<tr>
				<td>Modify Paper URL:</td>
				<td><input type="text" name="modify_paper_url"></td>
			</tr>					
		</table>
		 	<input type="submit" name="backbtn" id="backbtn" value="Back">
			<input type="submit" name="submitmodifybtn">		 	
		</form>

		<?php
			echo "Paper name: ", $modified_paper_name;
			$sql_update = "UPDATE approved_papers SET paper_name='$modified_paper_name', Paper_URL='$modified_paper_url'  WHERE Submission_Date='$num'";
			// Activate sql update query if submit button is activated
			if (isset($_GET['submitmodifybtn'])) {
				// echo "Submit Form";
				if (mysqli_query($conn, $sql_update)) {
				    echo "Record updated successfully";
				} else {
				    echo "Error updating record: " . mysqli_error($conn);
				}				
			}	
					
		?>
		<pre>
			<?php
				print_r($_GET);
			?>
		</pre>
	</body>
</html>