<html>
	<head>
		<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
	</head>
	<body>
		<h1>Adding Metadata</h1>
		<?php
			//this php script will try to add meta data to the respective tables
			
			//checking the values from papermetadataform.php if the values entered are not
			//usable or left blank the value in the table will be null
			if(isset ($_GET["methodology_name"]))
			{
				$methodology_name = $_GET["methodology_name"];
			} 
			else $methodology_name = "empty now will code later";
			if(isset ($_GET["methodology_description"]))
			{
				$methodology_description = $_GET["methodology_description"];
			}
			else $methodology_description = "empty now will code later";
			if(isset ($_GET["method_name"]))
			{
				$method_name = $_GET["method_name"];
			}
			else $method_name = "empty now will code later";
			if(isset ($_GET["method_description"]))
			{
				$method_description = $_GET["method_description"];
			}
			else $method_description = "empty now will code later";
			if(isset ($_GET["bibliography_ref"]))
			{
				$biblography_ref = $_GET["bibliography_ref"];
			}
			else $biblography_ref = "empty now will code later";
			if(isset ($_GET["research_level"]))
			{
				$research_level = $_GET["research_level"];
			}
			else $research_level = "empty now will code later";
			if(isset ($_GET["research_question"]))
			{
				$research_question = $_GET["research_question"];
			}
			else $research_question = "empty now will code later";
			if(isset ($_GET["research_method"]))
			{
				$research_method = $_GET["research_method"];
			}
			else $research_method = "empty now will code later";
			if(isset ($_GET["research_metrics"]))
			{
				$research_metrics = $_GET["research_metrics"];
			}
			else $research_metrics = "empty now will code later";
			if(isset ($_GET["research_participants"]))
			{
				$research_participants = $_GET["research_participants"];
			}
			else $research_participants = "empty now will code later";
			if(isset ($_GET["evidence_context"]))
			{
				$evidence_context = $_GET["evidence_context"];
			}
			else $evidence_context = "empty now will code later";
			if(isset ($_GET["benefit_outcome"]))
			{
				$benefit_outcome = $_GET["benefit_outcome"];
			}
			else $benefit_outcome = "empty now will code later";
			if(isset ($_GET["result"]))
			{
				$result = $_GET["result"];
			}
			else $result = "empty now will code later";
			if(isset ($_GET["method_implementation_integrity"]))
			{
				$method_implementation_integrity = $_GET["method_implementation_integrity"];
			}
			else $method_implementation_integrity = "empty now will code later";
			
			//connect to the database to submit data
			$conn = @mysqli_connect('127.0.0.1','root','','test')
			or die('Failed to connect to server');
			
			//creates a query that submits the data into the table names in the table are subject to change
			$query = "INSERT INTO paper_metadata(
			Submission_Date,
			methodology_name,
			methodology_description,
			method_name,
			method_description,
			bibliography_ref,
			research_level,
			research_question,
			research_method,
			research_metrics,
			research_participants,
			evidence_context,
			benefit_outcome,
			result,
			method_implementation_integrity)
			VALUES (
			now(),
			'$methodology_name',
			'$methodology_description',
			'$method_name',
			'$method_description',
			'$biblography_ref',
			'$research_level',
			'$research_question',
			'$research_method',
			'$research_metrics',
			'$research_participants',
			'$evidence_context',
			'$benefit_outcome',
			'$result',
			'$method_implementation_integrity'
			)";
			
			//creates a string that displays if SQL query is successful or not
			if ($conn->query($query) === TRUE)
			{
				echo "Paper meta-data successfully added to the database";
			}
			else 
			{
				echo "Paper meta-data failed to add to the database";
			}
			//close connection
			mysqli_close($conn);
		?>
	</body>
</html>