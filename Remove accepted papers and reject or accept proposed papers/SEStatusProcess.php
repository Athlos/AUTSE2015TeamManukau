<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title></title>
<style>
body {background-color:lightgrey}
h1   {color:blue}
p    {color:black}

body {
    background-image: url("wood.jpg");
    background-color: #cccccc;
}
</style>
</head>
<body>
<div align="center" class = "center" >
	<h1>Accept or Reject</h1>
	<br>
	
	
	<?php
	// Include file with sql details
	 $sql_host="localhost";
	 $sql_user="root";
	 $sql_pass="";
	 $sql_db="test";
	 $sql_tble="status"; // change to your own table name
	$URL = $_POST['url'];
	// Create connection
	$conn = new mysqli($sql_host, $sql_user, $sql_pass, $sql_db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT * from papers_awaiting_moderation where Paper_URL = '$URL'";
	$result = $conn->query($sql);
	//show results 
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//grab the information for the paper
		$URL = $row["Paper_URL"];
		$DATE = $row["Submission_Date"];
		$SubBy = $row["Submitted_By"];
        echo "URL: " . $row["Paper_URL"]. "<br> Submission Date: " . $row["Submission_Date"]. "<br> Submitted by: ". $row["Submitted_By"];
    }
	} else {
		echo "0 results";
	}
	$conn->close();
?>


	<!-- Hidden fields-->

	

	<!-- Button accept/reject-->
	
	<form action="SERejectPaper.php" method = "POST">
		<input type="submit" value="Reject">
		<input type="hidden" name="PAPER_URL" value="<?php echo $URL ?>">
		<input type="hidden" name="Submission_Date" value="<?php echo $DATE; ?>">
		<input type="hidden" name="Submitted_By" value="<?php echo $SubBy; ?>">
	</form>
	
	<form action="SEAcceptPaper.php" method = "POST">
		<input type="submit" value="Accept">
		<input type="hidden" name="PAPER_URL" value="<?php echo $URL ?>">
		<input type="hidden" name="Submission_Date" value="<?php echo $DATE; ?>">
		<input type="hidden" name="Submitted_By" value="<?php echo $SubBy; ?>">
	</form>

</body>
</div>
</html> 