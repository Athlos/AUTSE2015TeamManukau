<html>
<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Results</title>
</head>
<body>
	<?php
	$AdvancedSearch = false;

	$count = "";
	$andors = array();
	while (isset ($_GET["andor".$count])){
		array_push($andors, $_GET["andor".$count]);
		
		if($count == ""){
			$count = 1;
		} else {
			$count++;
		}
	}
	echo "<br>"."And/Or ";
	print_r($andors);
	
	
	$count = "";
	$fields = array();
	while (isset ($_GET["field".$count])){
		array_push($fields, $_GET["field".$count]);
		
		if($count == ""){
			$count = 1;
		} else {
			$count++;
		}
	}
	echo "<br>"."Fields ";
	print_r($fields);
	
	$count = "";
	$operators = array();
	while (isset ($_GET["operator".$count])){
		array_push($operators, $_GET["operator".$count]);
		
		if($count == ""){
			$count = 1;
		} else {
			$count++;
		}
	}
	echo "<br>"."Operators ";
	print_r($operators);
	
	$count = "";
	$values = array();
	while (isset ($_GET["value".$count])){
		array_push($values, $_GET["value".$count]);
		if($count == ""){
			$count = 1;
		} else {
			$count++;
		}
	}
	echo "<br>"."Values ";
	print_r($values);
	
	
	
 	
	//First, we get the values out of AddPaperForm.php, which are the URL and Submitter
		if (isset ($_GET["search"])){
			$search = $_GET["search"];
		} else echo "link Is Incorrect Data Type"."<br />";
	
	
		//Here we will add a paper to a submitted database, awaiting moderation
		
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
	
	
	//approved papers 0-3
	//paper_evidence_source_and_item 4-9
	//paper_methodology_and_method 10-14
	//paper_rating 15-23
	//paper_research 24-28
	
	$parameters = "";
	
	while($count > 0) {
		$count--;
		//$parameters = $parameters . "";
		if($andors[$count] == "And") {
			$parameters = $parameters . " AND WHERE '$fields[$count]' = '$values[$count]'";
		} else {
			$parameters = $parameters . " OR WHERE '$fields[$count]' = '$values[$count]'";
		}
		
	} 

		$select = "SELECT * 
		FROM approved_papers ";
		$join = " INNER JOIN paper_evidence_source_and_item 
		ON approved_papers.paper_name=paper_evidence_source_and_item.paper_name_evidence
		INNER JOIN paper_methodology_and_method 
		ON approved_papers.paper_name=paper_methodology_and_method.paper_name_method
		LEFT JOIN paper_rating
		ON approved_papers.paper_name=paper_rating.paper_name 
		INNER JOIN paper_research
		ON approved_papers.paper_name=paper_research.paper_name_research
		INNER JOIN paper_bibliography_info
		ON approved_papers.paper_name=paper_bibliography_info.paper_name_bibliography
		WHERE approved_papers.paper_name LIKE '%$search%'";
		
		
		$query = $select . $join . $parameters . ";";
		echo "<br>"."<br>"."EXECUTING QUERY : ".$query;
		$savedQuery = $query;
		$res = $conn->query($query);
	//show results 
	$array = array();
	
if($res != false) {
	$row = mysqli_fetch_row($res)
	or die("No Results Found");

	echo "<table width='100%' border='1'>";
	echo "<tr><th>Paper Name</th><th>Paper Information</th><th>Bibliography Info</th><th>Ratings</th><th>Research Information</th></tr>";	
	
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
} else echo "<br>"."No Results Found";

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