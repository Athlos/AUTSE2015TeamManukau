<html>
	<head>
		<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="/AUTSE2015TeamManukau/mystyles.css">
	</head>
	<body>
		<h1>Adding Metadata</h1>
		<?php

			// Paper ratings get variables			
			$credibility_level = $_GET['credibility_level'];
			$credibility_reason = $_GET['credibility_reason'];
			$confidence_level = $_GET['confidence_level'];
			$confidence_reason = $_GET['confidence_reason'];
			// Bibliography get variables
			$paper_authors = $_GET['ref_author'];
			$paper_year = $_GET['ref_year'];
			$paper_journal_name = $_GET['ref_journal_name'];





			session_start();
			//this php script will try to add meta data to the respective tables
			//checking the values from papermetadataform.php if the values entered are not
			//usable or left blank the value in the table will be "empty now will edit later"
			if(isset ($_GET["paper_name"]) && $_GET["paper_name"] != "")
			{
				$paper_name = $_GET["paper_name"];
			}
			else
			{
				$paper_name = "default_name";
			}
			if(isset ($_GET["methodology_name"]) && $_GET["methodology_name"] != "")
			{
				$methodology_name = $_GET["methodology_name"];
			} 
			else{
				$methodology_name = "no data available";
			}
			if(isset ($_GET["methodology_description"]) && $_GET["methodology_description"] != "")
			{
				$methodology_description = $_GET["methodology_description"];
			}
			else 
			{
				$methodology_description = "no data available";
			}
			if(isset ($_GET["practice_name"]) && $_GET["practice_name"] != "")
			{
				$practice_name = $_GET["practice_name"];
			}
			else 
			{
				$practice_name = "no data available";
			}
			if(isset ($_GET["practice_description"]) && $_GET["practice_description"] != "")
			{
				$practice_description = $_GET["practice_description"];
			}
			else 
			{
				$practice_description = "no data available";
			}
			if(isset ($_GET["evidence_source_research_level"]) && $_GET["evidence_source_research_level"] != "")
			{
				$evidence_source_research_level = $_GET["evidence_source_research_level"];
			}
			else 
			{
				$evidence_source_research_level = "no data available";
			}
			if(isset ($_GET["evidence_benefit_outcomes"]) && $_GET["evidence_benefit_outcomes"] != "")
			{
				$evidence_benefit_outcomes = $_GET["evidence_benefit_outcomes"];
			}
			else 
			{
				$evidence_benefit_outcomes = "no data available";
			}
			if(isset ($_GET["evidence_result"]) && $_GET["evidence_result"] != "")
			{
				$evidence_result = $_GET["evidence_result"];
			}
			else 
			{
				$evidence_result = "no data available";
			}
			if(isset ($_GET["evidence_method_implemention_integrity"]) && $_GET["evidence_method_implemention_integrity"] != "")
			{
				$evidence_method_implemention_integrity = $_GET["evidence_method_implemention_integrity"];
			}
			else 
			{
				$evidence_method_implemention_integrity = "no data available";
			}
			if(isset ($_GET["research_question"]) && $_GET["research_question"] != "")
			{
				$research_question = $_GET["research_question"];
			}
			else 
			{
				$research_question = "no data available";
			}
			if(isset ($_GET["research_method"]) && $_GET["research_method"] != "")
			{
				$research_method = $_GET["research_method"];
			}
			else 
			{
				$research_method = "no data available";
			}
			if(isset ($_GET["research_metrics"]) && $_GET["research_metrics"] != "")
			{
				$research_metrics = $_GET["research_metrics"];
			}
			else 
			{
				$research_metrics = "no data available";
			}
			if(isset ($_GET["research_participants"]) && $_GET["research_participants"] != "")
			{
				$research_participants = $_GET["research_participants"];
			}
			else
			{
				$research_participants = "no data available";
			}
			if(isset($_GET['context_who']) && $_GET['context_who'] != "")
			{
				$context_who = $_GET['context_who'];
			}
			else
			{
				$context_who = "no data available";
			}
			if(isset($_GET['context_what']) && $_GET['context_what'] != "")
			{
				$context_what = $_GET['context_what'];
			}
			else
			{
				$context_what = "no data available";
			}
			if(isset($_GET['context_when']) && $_GET['context_when'] != "")
			{
				$context_when = $_GET['context_when'];
			}
			else
			{
				$context_when ="no data available";
			}
			if(isset($_GET['context_where']) && $_GET['context_where'] != "")
			{
				$context_where = $_GET['context_where'];
			}
			else
			{
				$context_where ="no data available";
			}
			if(isset($_GET['context_why']) && $_GET['context_why'] != "")
			{
				$context_why = $_GET['context_why'];
			}
			else
			{
				$context_why ="no data available";
			}
			if(isset($_GET['context_how']) && $_GET['context_how'] != "")
			{
				$context_how = $_GET['context_how'];
			}
			else
			{
				$context_how = "no data available";
			}
			//connect to the database to submit data
			include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
			
			
			//creates a query that submits the data into the table names in the table are subject to change
			//methodology table query
			$methodologyQuery = "INSERT INTO paper_methodology_and_method(paper_name_method,paper_methodology_name,paper_methodology_description,
			paper_practice_name,paper_practice_description)
			VALUES ('$paper_name','$methodology_name','$methodology_description','$practice_name','$practice_description')";
			//evidence table query
			$evidenceQuery = "INSERT INTO paper_evidence_source_and_item(paper_name_evidence,
			paper_evidence_source_research_level,paper_evidence_benefit_outcomes,paper_evidence_result,	paper_evidence_method_implemention_integrity)
			VALUES ('$paper_name','$evidence_source_research_level','$evidence_benefit_outcomes','$evidence_result','$evidence_method_implemention_integrity')";
			//research table query
			$reserachQuery = "INSERT INTO paper_research(paper_name_research,paper_research_question,paper_research_method,
			paper_research_metrics,	paper_research_participants)
			VALUES ('$paper_name','$research_question','$research_method','$research_metrics','$research_participants')";
			//bibliography table query
			$bibliographyQuery = "INSERT INTO paper_bibliography_info  (paper_name_bibliography, paper_author, paper_year, paper_journal_name) 
			VALUES('$paper_name','$paper_authors','$paper_year','$paper_journal_name')";



			//ratings table query
			$ratingQuery = "INSERT INTO paper_rating (paper_rating_date, paper_name,  paper_credibility_level, 
			paper_credibility_reason, paper_confidence_level, paper_confidence_reason) 
			VALUES ('now()', '$paper_name', '$credibility_level', '$credibility_reason', '$confidence_level', '$confidence_reason')";
			//$ratingQuery = "INSERT INTO paper_rating (paper_rating_date, paper_name,  paper_credibility_level, 
			//paper_credibility_reason, paper_confidence_level, paper_confidence_reason) 
			//VALUES ('0000-00-00 00:00:00', '1', '1', '1', '1', '1')";

			$contextQuery = "INSERT INTO paper_context(paper_name_context, paper_context_who, paper_context_what, paper_context_when, paper_context_where, paper_context_why, paper_context_how) 
			VALUES ('$paper_name','$context_who','$context_what','$context_when','$context_where','$context_why','$context_how')";
	
			$addToApproved = "INSERT INTO approved_papers (paper_name,Submission_Date)
							VALUES
							('$paper_name','0000-00-00 00:00:00')";//submission date was the original primary key
			if($conn->query($addToApproved) === TRUE)
			{
				echo "<br> successfully added the paper to the approved papers list";
				if (($conn->query($methodologyQuery) === TRUE))
				{
					echo "<br>method meta data insertion successful";
				}
				else
				{
					echo "<br>method meta data insertion failed";
				}
				if($conn->query($evidenceQuery) === TRUE)
				{
					echo "<br> evidence meta data insertion successful";			
				}
				else
				{
					echo "<br> evidence meta data insertion failed";
				}
				if($conn->query($reserachQuery) === TRUE)
				{
					echo "<br> research meta data insertion successful";
				}
				else
				{
					echo "<br> research meta data insertion failed";
				}
				if($conn->query($bibliographyQuery) === TRUE)
				{
					echo "<br> bibliography meta data insertion successful";
				}
				else
				{
					echo "<br> bibliography meta data insertion failed";
				}
				if($conn->query($contextQuery) === TRUE)
				{
					echo "<br> context meta data insertion successful";
				}
				else
				{
					echo "<br> context meta data insertion failed";
				}
				if($conn->query($ratingQuery))
				{
					echo "<br> rating meta data insertion successful";
				}
				else
				{
					echo "<br> rating meta data insertion failed";
				}
			}
			else
			{
				echo "<br> Could not add paper to approved papers list";
			}
			mysqli_close($conn);
		?>
		<br><a href="/AUTSE2015TeamManukau/">Go Back</a><br>
	</body>
</html>