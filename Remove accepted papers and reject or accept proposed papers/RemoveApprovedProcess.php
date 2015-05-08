<html>
<style>
body {
    background-image: url("wood.jpg");
    background-color: #cccccc;
}
h1   {color:blue}
p    {color:black}
</style>
<body>
<div align="center" class = "center" >
	<h1>Paper was Removed</h1>
	<p> Paper was removed from accepted table </p>
<?php



	//grab hidden fields
	$URL = $_POST['url'];
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

	
	
	$sql = "DELETE from approved_papers where PAPER_URL = '$URL';";

	//test database record. This works. If you mess up syntax check against this
	//$sql = "INSERT INTO status(Share)
	//VALUES ('$shareSettings')";
	
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted";
	} else {
		echo "";
	}

	$conn->close();
	
?>

<!-- This returns to the home page-->
	<form action="SEStatus.php" >
		<input type="submit" value="Home Page" >
	</form>
	</div>

</div>
</body>
</html>