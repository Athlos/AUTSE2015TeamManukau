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
	<h1>Paper Removal</h1>
	<p></p>
<?php



	//grab hidden fields
	$URL = $_POST['url'];
	$delete = false;
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
	$sql = "SELECT * from approved_papers";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["Paper_URL"] == $URL)
			{
				$delete= true;
			}
		}
	} else {
		echo "Table is empty";
	}

	
	
	if($delete)
	{
		$sql = "DELETE from approved_papers where PAPER_URL = '$URL';";

		//test database record. This works. If you mess up syntax check against this
		//$sql = "INSERT INTO status(Share)
		//VALUES ('$shareSettings')";
		
		if ($conn->query($sql) === TRUE) {
			echo "Record deleted";
		} else {
			
		}

		$conn->close();
	}
	else
	{
		echo "No record of that name exists";
	}
	
?>

<!-- This returns to the home page-->
	<form action="SEStatus.php" >
		<input type="submit" value="Home Page" >
	</form>
	</div>

</div>
</body>
</html>