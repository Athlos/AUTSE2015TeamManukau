<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Results</title>
</head>
<body>
	<?php
	$AdvancedSearch = false;
	if ($_GET["searchType"] == "Advanced"){
		$AdvancedSearch = true;
		echo $_GET["search"];
			if (isset ($_GET["methodology"])){
			$methodology =  $_GET["methodology"];
		} else echo "methodology Is Incorrect Data Type"."<br>";
		
		if (isset ($_GET["method"])){
			$method = $_GET["method"];
		} else echo "method Is Incorrect Data Type"."<br>";
		
		if (isset ($_GET["group"])){
			$group = $_GET["group"];
		} else $group = "";
		
		if (isset ($_GET["sort"])){
			$sort = $_GET["sort"];
		} else echo "sort Is Incorrect Data Type"."<br>";
	} 
	
	
	//First, we get the values out of AddPaperForm.php, which are the URL and Submitter
		if (isset ($_GET["search"])){
			$search = $_GET["search"];
			//echo "|".$search."|";
		} else echo "link Is Incorrect Data Type"."<br />";
	
	
		//Here we will add a paper to a submitted database, awaiting moderation
		
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
	
		if($AdvancedSearch && $methodology != "") {
			$methodologyQuery = " WHERE paper_methodology_and_method.paper_methodology_name='$methodology'";
		} else $methodologyQuery = "";
		
		if($AdvancedSearch && $method != "") {
			if($methodology = "")
				$methodologyQuery = $methodologyQuery . " WHERE paper_methodology_and_method.paper_method_name='$method'";
			else
				$methodologyQuery = $methodologyQuery . " AND paper_methodology_and_method.paper_method_name='$method'";
		} 
		
			if($methodology = "")
				$methodologyQuery = $methodologyQuery . " WHERE approved_papers.paper_name LIKE '%$search%'";
			else
				$methodologyQuery = $methodologyQuery . " AND approved_papers.paper_name LIKE '%$search%'";
		
		if($AdvancedSearch && $group != "") {
			$methodologyQuery = $methodologyQuery . " GROUP BY '$group'";
		} 
		
		if($AdvancedSearch && $sort != "") {
			$methodologyQuery = $methodologyQuery . " ORDER BY '$sort'";
		} 
		

		$select = "SELECT * 
		FROM approved_papers ";
		$join = " INNER JOIN paper_evidence_source_and_item 
		ON approved_papers.paper_name=paper_evidence_source_and_item.paper_name_evidence
		INNER JOIN paper_methodology_and_method 
		ON approved_papers.paper_name=paper_methodology_and_method.paper_name_method";
		
		
		$query = $select . $join . $methodologyQuery;
		
		//echo $methodologyQuery;
		
		$res = $conn->query($query);
		
	//show results 
	
	
if($res != false) {
	$row = mysqli_fetch_row($res)
	or die("No Results Found");

	echo "<table width='100%' border='1'>";
	echo "<tr><th>Paper Name</th></tr>";

	//<th>Bibliography References</th>
	//<th>Research Level</th><th>Evidence Context</th><th>Benefits</th>
	//<th>Result</th><th>Implementation Integrity</th>
	
	while ($row) {
	
	echo "<tr><td>";
		?>

		<!--This form goes to the rate the paper (confidence/quality process) -->
		<form action = "paperDisplay.php" method = "GET" >
		
		<!--hidden input field attached to every entry that contains the name of the paper so that the next form knows which button was clicked. -->
		<input type="hidden" name="nameOfPaper" value=<?php echo $row[0]?>> 
		
		
		<label><?php echo $row[0]?><name = "display"> </label><br>
		<label>Click <name = "display"> </label>
		<a href="<?php echo $row[3]?>">Here</a><br>
		<label>Methodology : <name = "display"> </label><br>
		<label>Bibliography : <name = "display"> </label><br>
		<label>Research Question : <name = "display"> </label><br>
		<label>Credibility Rating : <name = "display"> </label><br>
		<label>Quality Rating: <name = "display"> </label><br>
		
		<input type = "submit" name = "goButton" value = "Go to">
		
		<!-- http://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit SEND THIS TO A FORM THAT REDIRECTS TO EITHER FAVOURITE OR CONFIDENCE/QUALITY DEPENDING ON WHICH BUTTON WAS
		CLICKED-->
		</form>
		
		<?php
		echo "</td></tr>";
	$row = mysqli_fetch_row($res);
	
	
/* 		echo "<tr><td>{$rows[0]}</td>";
		echo "<td>{$rows[1]}</td>";
		echo "<td>{$rows[2]}</td>";
		echo "<td>{$rows[3]}</td>";
		echo "<td>{$rows[4]}</td>";
		
		echo "<td>{$rows[5]}</td>";
		echo "<td>{$rows[6]}</td>";
		echo "<td>{$rows[7]}</td>";
		echo "<td>{$rows[8]}</td>";
		echo "<td>{$rows[9]}</td>";
		echo "<td>{$rows[10]}</td>";
		echo "<td>{$rows[11]}</td>";
		
		echo "<td>{$rows[12]}</td>";
		echo "<td>{$rows[13]}</td>";
		echo "<td>{$rows[14]}</td>";
		echo "<td>{$rows[15]}</td>";
		echo "<td>{$rows[16]}</td></tr>"; */
	
		
		
	}
	echo "</table>";
} else echo "No Results Found";
/* 			
		//This is the query string, holding the SQL command to use
		//now() inputs the current date and time into the table
		
		$query = "SELECT * FROM approved_papers WHERE paper_name LIKE '%$search%'";
		
		$result = $conn->query($query);
		
	//show results 
	
	$row = mysqli_fetch_row($result);
	
	$intNumButton = 0;
    // output data of each row
	
	echo "<table width='100%' border='1'>";
	echo "<tr><th>Entries</th></tr>";
	
    while($row) {
        echo $row[0];
		echo "<tr><td>";
		?>

		<!--This form goes to the rate the paper (confidence/quality process) -->
		<form action = "paperDisplay.php" method = "GET" >
		
		<!--hidden input field attached to every entry that contains the name of the paper so that the next form knows which button was clicked. -->
		<input type="hidden" name="nameOfPaper" value=<?php echo $row[0]?>> 
		
		
		<label><?php echo $row[0]?><name = "display"> </label><br>
		<label>Click <name = "display"> </label>
		<a href="<?php echo $row[3]?>">Here</a><br>
		<label>Methodology : <name = "display"> </label><br>
		<label>Bibliography : <name = "display"> </label><br>
		<label>Research Question : <name = "display"> </label><br>
		<label>Credibility Rating : <name = "display"> </label><br>
		<label>Quality Rating: <name = "display"> </label><br>
		
		<input type = "submit" name = "goButton" value = "Go to">
		
		<!-- http://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit SEND THIS TO A FORM THAT REDIRECTS TO EITHER FAVOURITE OR CONFIDENCE/QUALITY DEPENDING ON WHICH BUTTON WAS
		CLICKED-->
		</form>
		
		<?php
		echo "</td></tr>";
		$row = mysqli_fetch_row($result);
    } echo "</table>"; */
		//now we close the database
		mysqli_close($conn);
		
		
	?>
	
	<br><a href="SearchForm.php">Go Back</a><br>
</body>
</html>