<?php
	//assuming we ge thte information via post
	$redirect = "bob";
	
	$url = "http://yogeshchaugule.com/blog/2013/how-display-pdf-browser-php";

	//This file will log you into the database automatically
	include("DatabaseLogin.php");
	
	//for now paper url is doubling as paper name
	$sql = "select * from approved_papers where paper_name = '$redirect';";

	
	$result = $conn->query($sql);
	//show results 
    // output data of each row
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		//grab the information for the paper
		
		$url = $row["Paper_URL"];
		echo "entered";
    }
	} else {	
		//if theres no results theres no point continuing simply redirect back
			echo "No record";

	}
	
	
	
	
	
	$conn->close();
?>
<html>
<body>
<meta http-equiv="refresh" content="0; url=<?php echo $url?>" />
</body>
</html>