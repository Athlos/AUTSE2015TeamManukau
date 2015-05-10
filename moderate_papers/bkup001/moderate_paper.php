<?php
	$servername = "localhost";
	$username = "root";
	$password = "black";
	$dbname = "test";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$post_search = $_GET['selectmenu'];
	$sql = "SELECT * FROM approved_papers WHERE Submission_Date LIKE '$post_search%'";
	$result = $conn->query($sql);

	$conn->close();
?> 

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#table {
			background: black;
			color: red;
			/*text-align: center;*/
		}
		a {
			color: red;
		}
	</style>
	<title></title>
</head>
<body>
<form name="status_form" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<?php		
		if($result->num_rows > 0 && $post_search != null) {
			// Create table rows and headers
			echo "
				<table id='table' border='2px'>				
					<tr>
						<th>Date:</th>
						<th>Submitted By:</th>
						<th>Paper Name:</th>
					</tr>";
			// Output data of each row
			while ($row = $result->fetch_assoc()) {
				// Populate created table table
				echo "
					<tr>
						<td>".$row["Submission_Date"]."</td>
						<td>".$row["Submitted_By"]."</td>
						<td><a target='_blank' href=".$row["Paper_URL"].">".$row["Comment"]."</a></td>
					</tr>";			
			}
			// Comment
			echo "
				</table>";
		} else {
			// Return 0 results if query does not match
			echo "0 results";
		}
	?>


	 	<table id="table">
		    <tr>
		        <td width="20%">Name:</td>
		        <td>Jubilee Euta</td>
		    </tr>
		    <tr>
		        <td width="20%">Student ID:</td>
		        <td>1261339</td>
		    </tr>
		    <tr>
		        <td width="20%">Email:</td>
		        <td>jubilee@example.com</td>
		    </tr>
		</table>
</form>
</body>
</html>