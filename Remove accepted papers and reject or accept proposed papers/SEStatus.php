<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title></title>
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
</head>
<body>
<div align="center" class = "center" >
	<h1>Choose Paper</h1>
	<form action = "SEStatusProcess.php" method = "POST" >
	<label>Enter Paper URL: <input type = "text" name = "url" > </label>
	<input type = "submit" value = "View Paper">
	</form>
	<br>

	
	<?php
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
	
	$sql = "SELECT * from papers_awaiting_moderation";
	$result = $conn->query($sql);
	//show results 
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "URL: " . $row["Paper_URL"];
		echo "<br>";
    }
	} else {
		echo "0 results";
	}
	$conn->close();
?>
<form action = "SERemoveApprovedPaper.php" method = "POST" >
	<input type = "submit" value = "remove Approved Papers TEMP LINK">
	</form>
</body>
</div>
</html> 