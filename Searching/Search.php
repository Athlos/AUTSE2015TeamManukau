<html>
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
	
	
	//approved papers 0-3
	//paper_evidence_source_and_item 4-9
	//paper_methodology_and_method 10-14
	//paper_rating 15-23
	//paper_research 24-28
	
	
	
	
	
	
	
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
		$order = "";
		if($AdvancedSearch && $sort != "") {
			//echo "|".$sort."|";
			if($sort == "Name")
				$methodologyQuery = $methodologyQuery . " ORDER BY  approved_papers.paper_name";
			if($sort == "Confidence")
				$methodologyQuery = $methodologyQuery . " ORDER BY paper_rating.paper_average_confidence";
			if($sort == "Credibility") {
				$methodologyQuery = $methodologyQuery . " ORDER BY approved_papers.paper_name";
				echo "|".$sort."|";
				}
		} 
		//else echo "stuff";
		

		$select = "SELECT * 
		FROM approved_papers";
		$join = " INNER JOIN paper_evidence_source_and_item 
		ON approved_papers.paper_name=paper_evidence_source_and_item.paper_name_evidence
		INNER JOIN paper_methodology_and_method 
		ON approved_papers.paper_name=paper_methodology_and_method.paper_name_method
		LEFT JOIN paper_rating
		ON approved_papers.paper_name=paper_rating.paper_name 
		INNER JOIN paper_research
		ON approved_papers.paper_name=paper_research.paper_name_research
		INNER JOIN paper_bibliography_info
		ON approved_papers.paper_name=paper_bibliography_info.paper_name_bibliography";
		
		
		$query = $select . $join . $methodologyQuery . ";";
		$savedQuery = $query;
		//echo $query;
		//echo $methodologyQuery;
		//echo $savedQuery;
		$res = $conn->query($query);
	//show results 
	$array = array();
	
if($res != false) {
	$row = mysqli_fetch_row($res)
	or die("No Results Found");

	echo "<table width='100%' border='1'>";
	echo "<tr><th>Paper Name</th><th>Paper Information</th><th>Bibliography Info</th><th>Ratings</th><th>Research Information</th></tr>";

	//<th>Bibliography References</th>
	//<th>Research Level</th><th>Evidence Context</th><th>Benefits</th>
	//<th>Result</th><th>Implementation Integrity</th>
	
	
	
	
	while ($row) {
	
	//GET CREDIBILITY AND QUALITY RATINGS
	$avgQuery = "SELECT AVG(paper_credibility_level) 
	FROM paper_rating
	WHERE paper_name='$row[0]'";
	
	$result = $conn->query($avgQuery);
	
	
	if($result != false) {
		$avgRow = mysqli_fetch_row($result)
		or die("");
		while ($avgRow) {
			$averageCred = $avgRow[0];
			$avgRow = mysqli_fetch_row($result);
		}
	} 
	if(!isset($averageCred)) {
		$averageCred = "No ratings Yet";
	}
	
	$avgQuery = "SELECT AVG(paper_confidence_level) 
			FROM paper_rating
			WHERE paper_name='$row[0]'";
	
	$result = $conn->query($avgQuery);
	
	
	if($result != false) {
		$avgRow = mysqli_fetch_row($result)
		or die("");
		while ($avgRow) {
			$averageQual = $avgRow[0];
			$avgRow = mysqli_fetch_row($result);
		}
	} 
	
	if(!isset($averageQual)) {
		$averageQual = "No ratings Yet";
	}
	
	if(!in_array($row[0], $array)) {
	
	array_push($array, $row[0]);
	
	echo "<tr><td align='center'>";
		?>

		<!--This form goes to the rate the paper (confidence/quality process) -->
		<form action = "paperDisplay.php" method = "GET" >
		
		<!--hidden input field attached to every entry that contains the name of the paper so that the next form knows which button was clicked. -->
		<input type="hidden" name="nameOfPaper" value=<?php echo $row[0]?>> 
		
		
		<label align="center"><?php echo $row[0]?><name = "display"> </label><br>
		<?php
			echo "</td><td>";
		?>
		<label>Click <name = "display"> </label>
		<a href="<?php echo $row[3]?>">Here</a><br>
		<label>Methodology : <?php echo $row[11]?><name = "display"> </label><br>
		<label>Method : <?php echo $row[13]?><name = "display"> </label><br>
		
		
		
		
		
		
		<?php echo "</td><td>"; ?>
		
		<label>Author : <?php echo $row[30]?><name = "display"> </label><br>
		<label>Date Of Publication : <?php echo $row[31]?><name = "display"> </label><br>
		<label>Published In : <?php echo $row[32]?><name = "display"> </label><br>
		
		<?php echo "</td><td>"; ?>
		
		<label>Credibility Rating : <?php echo $averageCred?><name = "display"> </label><br>
		<label>Quality Rating: <?php echo $averageQual?><name = "display"> </label><br>
		<input type = "submit" name = "goButton" value = "Rate Paper">
		<!-- http://stackoverflow.com/questions/2680160/how-can-i-tell-which-button-was-clicked-in-a-php-form-submit SEND THIS TO A FORM THAT REDIRECTS TO EITHER FAVOURITE OR CONFIDENCE/QUALITY DEPENDING ON WHICH BUTTON WAS
		CLICKED-->
		</form>
		<?php echo "</td><td>"; ?>
		
		<label>Research Question : <?php echo $row[25]?><name = "display"> </label><br>
		<label>Research Method : <?php echo $row[26]?><name = "display"> </label><br>
		<label>Research Metrics : <?php echo $row[27]?><name = "display"> </label><br>
		
		<?php
		echo "</td></tr>";
		}
	$row = mysqli_fetch_row($res);

	} echo "</table>";
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
		
		
		
		if($AdvancedSearch) {
	?> <br><a href="AdvancedSearchForm.php">Go Back</a><br> <?php
		} else {  
	?> <br><a href="SearchForm.php">Go Back</a><br> <?php } ?>
	
	<form action="saveSearch.php" method = "GET">
			<!--<input type="submit" value="Save Search">-->
			<input type="hidden" name="query" value="<?php echo $savedQuery?>"> 
		</form>
</body>
</html>