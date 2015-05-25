<html>
	<head>
		<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
	</head>
	<body>
		<h1>Adding Metadata</h1>
		<?php
			session_start();
			//this php script will try to add meta data to the respective tables
			//checking the values from papermetadataform.php if the values entered are not
			//usable or left blank the value in the table will be "empty now will edit later"
			if(isset ($_GET["paper_name"]))
			{
				$paper_name = $_GET["paper_name"];
			}
			if(isset ($_GET["methodology_name"]) && $_GET["methodology_name"] != "")
			{
				$methodology_name = $_GET["methodology_name"];
			} 
			else{
				$methodology_name = "empty now will edit later";
			}
			if(isset ($_GET["methodology_description"]) && $_GET["methodology_description"] != "")
			{
				$methodology_description = $_GET["methodology_description"];
			}
			else {
				$methodology_description = "empty now will edit later";
			}
			if(isset ($_GET["method_name"]) && $_GET["method_name"] != "")
			{
				$method_name = $_GET["method_name"];
			}
			else {
				$method_name = "empty now will edit later";
			}
			if(isset ($_GET["method_description"]) && $_GET["method_description"] != "")
			{
				$method_description = $_GET["method_description"];
			}
			else {
				$method_description = "empty now will edit later";
			}
			if(isset ($_GET["evidence_source_bibliography_references"]) && $_GET["evidence_source_bibliography_references"] != "")
			{
				$evidence_source_bibliography_references = $_GET["evidence_source_bibliography_references"];
			}
			else {
				$evidence_source_bibliography_references = "empty now will edit later";
			}
			if(isset ($_GET["evidence_source_research_level"]) && $_GET["evidence_source_research_level"] != "")
			{
				$evidence_source_research_level = $_GET["evidence_source_research_level"];
			}
			else {
				$evidence_source_research_level = "empty now will edit later";
			}
			if(isset ($_GET["evidence_context"]) && $_GET["evidence_context"] != "")
			{
				$evidence_context = $_GET["evidence_context"];
			}
			else {
				$evidence_context = "empty now will edit later";
			}
			if(isset ($_GET["evidence_benefit_outcomes"]) && $_GET["evidence_benefit_outcomes"] != "")
			{
				$evidence_benefit_outcomes = $_GET["evidence_benefit_outcomes"];
			}
			else {
				$evidence_benefit_outcomes = "empty now will edit later";
			}
			if(isset ($_GET["evidence_result"]) && $_GET["evidence_result"] != "")
			{
				$evidence_result = $_GET["evidence_result"];
			}
			else {
				$evidence_result = "empty now will edit later";
			}
			if(isset ($_GET["evidence_method_implemention_integrity"]) && $_GET["evidence_method_implemention_integrity"] != "")
			{
				$evidence_method_implemention_integrity = $_GET["evidence_method_implemention_integrity"];
			}
			else {
				$evidence_method_implemention_integrity = "empty now will edit later";
			}
			if(isset ($_GET["research_question"]) && $_GET["research_question"] != "")
			{
				$research_question = $_GET["research_question"];
			}
			else {
				$research_question = "empty now will edit later";
			}
			if(isset ($_GET["research_method"]) && $_GET["research_method"] != "")
			{
				$research_method = $_GET["research_method"];
			}
			else {
				$research_method = "empty now will edit later";
			}
			if(isset ($_GET["research_metrics"]) && $_GET["research_metrics"] != "")
			{
				$research_metrics = $_GET["research_metrics"];
			}
			else {
				$research_metrics = "empty now will edit later";
			}
			if(isset ($_GET["research_participants"]) && $_GET["research_participants"] != "")
			{
				$research_participants = $_GET["research_participants"];
			}
			else
			{
				$research_participants = "empty now will edit later";
			}
			if(isset($_GET["paper_authors"]) && $_GET["paper_authors"] != "")
			{
				$paper_authors = $_GET["paper_authors"];
			}
			else
			{
				$paper_authors = "empty now will edit later";
			}
			if(isset($_GET["paper_year"]) && $_GET["paper_year"] != "")
			{
				$paper_year = $_GET["paper_year"];
			}
			else
			{
				$paper_year = "empty now will edit later";
			}
			if(isset($_GET["paper_journal_name"]) && $_GET["paper_journal_name"] != "")
			{
				$paper_journal_name = $_GET["paper_journal_name"];
			}
			else
			{
				$paper_journal_name = "empty now will edit later";
			}
			//connect to the database to submit data
			include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
			
			
			//creates a query that submits the data into the table names in the table are subject to change
			//methodology table query
			$methodologyQuery = "INSERT INTO paper_methodology_and_method(paper_name_method,paper_methodology_name,paper_methodology_description,
			paper_method_name,paper_method_description)
			VALUES ('$paper_name','$methodology_name','$methodology_description','$method_name','$method_description')";
			//evidence table query
			$evidenceQuery = "INSERT INTO paper_evidence_source_and_item(paper_name_evidence,paper_evidence_source_bibliography_references,
			paper_evidence_source_research_level,paper_evidence_context,paper_evidence_benefit_outcomes,paper_evidence_result,
			paper_evidence_method_implemention_integrity)
			VALUES ('$paper_name','$evidence_source_bibliography_references','$evidence_source_research_level','$evidence_context',
			'$evidence_benefit_outcomes','$evidence_result','$evidence_method_implemention_integrity')";
			//research table query
			$reserachQuery = "INSERT INTO paper_research(paper_name_research,paper_research_question,paper_research_method,
			paper_research_metrics,	paper_research_participants)
			VALUES ('$paper_name','$research_question','$research_method','$research_metrics','$research_participants')";
			//bibliography table query
			$bibliographyQuery = "INSERT INTO paper_bibliography = (paper_name_bibliography, paper_author, paper_year, paper_journal_name) 
			VALUES('$paper_name','$paper_authors','$paper_year','$paper_journal_name')";
			//selects the paper from the unapproved paper list
			$selectUnapprovedPaperQuery = "SELECT * FROM unapproved_papers WHERE paper_name = '$paper_name'";
			//executes the query
			$result = mysqli_query($conn, $selectUnapprovedPaperQuery)
			or die("cannot select info from unapproved papers table");
			//saves the results to a row array
			$row = mysqli_fetch_row($result);
			//enters the info into the add to approve papers query
			while($row) 
			{
				$addToApproved = "INSERT INTO approved_papers (paper_name,Submission_Date,Submitted_By,Paper_URL, paper_has_metadata)
				VALUES
				('$paper_name','$row[1]','$row[2]','$row[3]', '1')";
				$row = mysqli_fetch_row($result);
			}			
			echo $addToApproved;
			if($conn->query($addToApproved) === TRUE)
			{
				echo "<br> successfully added the paper to the approved papers list";
				if (($conn->query($methodologyQuery) === TRUE)&&($conn->query($evidenceQuery) === TRUE)&&
				($conn->query($reserachQuery) === TRUE) && $conn->query($bibliographyQuery))
				{
					echo "<br> successfully added the meta data for the paper";
				}
				else
				{
					echo "<br> Could not add meta-data for the paper";
				}
			}
			else
			{
				echo "<br> Could not add paper to approved papers list";
			}
			//destroy session
			// session_destroy();
			//close connection
			mysqli_close($conn);
		?>
	</body>
</html>