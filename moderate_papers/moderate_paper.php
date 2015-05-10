<?php
	$servername = "localhost";
	$username = "root";
	$password = "black";
	$dbname = "test";

		if (isset($_GET['getbtn'])) {
			if (!isset($_GET['moderate'])) {
				echo "Paper Accepted!";
				$moderate = '';
			}			
		}
	

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$post_search = $_GET['selectmenu'];
	$sql = "SELECT * FROM approved_papers WHERE Submission_Date LIKE '$post_search%'";
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
		#radio_buttons {
			color: red;
		}
		body {
			/*background-color: black;*/
		}
	</style>
	<title></title>
</head>
<body>
<form name="status_form" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
	<?php		
		if($result->num_rows > 0 && $post_search != null) {
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
		        <td><a target='_blank' href=".$row["Paper_URL"].">".$row["Comment"]."</a></td>
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
		// Warning!  Delete query
		// $sql_delete_row = "DELETE FROM MyGuests WHERE id=3";
		if (isset($_GET['moderate'])) {
			if ($_GET['moderate'] == 'a') {
				echo "Accept paper";
			} elseif ($_GET['moderate'] == 'r') {
				echo $post_search;
				$sql_delete_row = "DELETE FROM approved_papers WHERE Paper_URL LIKE '$post_search%'";
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