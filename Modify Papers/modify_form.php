<?php
	$servername = "mysql.1freehosting.com";
	$username = "u317137895_root";
	$password = "aut123";
	$dbname = "u317137895_test";	

	include 'modifyprocess.php';
	
	// Start session to store the data from the get method of the previous page
 	session_start(); // start the session
	$session_paper_name = $_SESSION["number"]; // copy the value to a variable

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}	
	// Activated when back button is clicked
	if (isset($_GET['backbtn'])) {
		session_destroy();
		session_unset();
		header("location:index.php");
	}
?> 

<!DOCTYPE html>
<html>
<head>
	<title>

	</title>
		<style type="text/css">
			th {
				width: 30%;
				text-align: left;
			}
			table {
				width: 80%;
			}
			input {
				width: 99%;
			}
			#btns {
				margin-top: 20px;
				width: 10%;
				height: 100px;
			}
			#refresh-update {
				color: green;
			}
			#selected-paper-title {
				color: red;
			}
			#submitmodifybtn {
				margin-top: 20px;
				width: 10%;
				height: 100px;
			}
		</style>
</head>
	<body>
		<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		
		<?php

			$sql = "SELECT * FROM approved_papers WHERE paper_name LIKE '$session_paper_name%'";
			// $sql_paper_bibliography_info = "SELECT * FROM paper_bibliography_info WHERE paper_name_bibliography='$session_paper_name'";
			// $sql_paper_evidence_source_and_item = "SELECT * FROM paper_evidence_source_and_item WHERE paper_name_evidence='$session_paper_name'";
			// $sql_paper_methodology_and_method = "SELECT * FROM paper_methodology_and_method WHERE paper_name_method='$session_paper_name'";
			// $sql_paper_rating = "SELECT * FROM paper_rating WHERE paper_name='$session_paper_name'";
			// $sql_paper_research = "SELECT * FROM paper_research WHERE paper_name_research='$session_paper_name'";

			// :::::::::::::::::::::::::::
			// ::Paper Bibliography Info::
			// :::::::::::::::::::::::::::
			$sql_update_paper_bibliography_info = "UPDATE paper_bibliography_info 
			SET 
			-- paper_author='$modified_paper_author',
			-- paper_journal_name='$modified_paper_journal_name'
			paper_author='$modified_paper_author',
			paper_journal_name='$modified_paper_journal_name'			
			WHERE paper_name_bibliography='$session_paper_name'";

			// ::::::::::::::::::::::::::::::::::::::::::::::::
			// ::Modify Paper Evidence Source and Item Handle::
			// ::::::::::::::::::::::::::::::::::::::::::::::::
			$sql_update_paper_evidence_source_and_item = "UPDATE paper_evidence_source_and_item 
			SET 
			paper_evidence_source_research_level='$modified_paper_evidence_source_research_level',
			paper_evidence_context='$modified_paper_evidence_context',
			paper_evidence_benefit_outcomes='$modified_paper_evidence_benefit_outcomes',
			paper_evidence_result='$modified_paper_evidence_result',
			paper_evidence_method_implemention_integrity='$modified_paper_evidence_method_implemention_integrity'
			WHERE paper_name_evidence='$session_paper_name'";

			// ::::::::::::::::::::::::::::::::::::::::
			// ::Modify Paper Methodology Name Handle::
			// ::::::::::::::::::::::::::::::::::::::::
			$sql_update_paper_methodology_and_method = "UPDATE paper_methodology_and_method 
			SET 
			paper_methodology_name='$modified_paper_methodology_name',
			paper_methodology_description='$modified_paper_methodology_description',
			paper_method_name='$modified_paper_method_name',
			paper_method_description='$modified_paper_method_description'

			WHERE paper_name_method='$session_paper_name'";

			// ::::::::::::::::::::::::::::::
			// ::Modify Paper Rating Handle::
			// ::::::::::::::::::::::::::::::
			$sql_update_paper_rating = "UPDATE paper_rating 
			SET 
			paper_credibility_level='$modified_paper_credibility_level', 
			paper_credibility_reason='$modified_paper_credibility_reason',
			paper_confidence_level='$modified_paper_confidence_level',
			paper_confidence_reason='$modified_paper_confidence_reason', 
			rater='$modified_rater',
			paper_average_credibility='$modified_paper_average_credibility',
			paper_average_confidence='$modified_paper_average_confidence'

			WHERE paper_name='$session_paper_name'";

			// ::::::::::::::::::::::::::::::::
			// ::Modify Paper Research Handle::
			// ::::::::::::::::::::::::::::::::
			$sql_update_paper_research = "UPDATE paper_research 
			SET 
			paper_research_question='$modified_paper_research_question', 
			paper_research_method='$modified_paper_credibility_reason',
			paper_research_metrics='$modified_paper_confidence_level',
			paper_research_participants='$modified_paper_confidence_reason'

			WHERE paper_name_research='$session_paper_name'";		

			// Result variable
			// Takes sql query statements 
			$result = $conn->query($sql);
			// $result_paper_bibliography_info = $conn->query($sql_paper_bibliography_info);
			// $result_paper_evidence_source_and_item = $conn->query($sql_paper_evidence_source_and_item);
			// $result_paper_methodology_and_method = $conn->query($sql_paper_methodology_and_method);
			// $result_paper_rating = $conn->query($sql_paper_rating);
			// $result_paper_research  = $conn->query($sql_paper_research);				


			// Activate sql update query if submit button is activated
			if (isset($_GET['submitmodifybtn'])) {
				echo "
					<h2 id='refresh-update'>Refresh page to view changes</h2>
				";
				// echo "Submit Form";
				if (mysqli_query($conn, $sql_update_paper_bibliography_info)) {
				    echo "Updated Bibliography records successfully <br>";
				} else {
				    echo "Error updating Bibliography records: " . mysqli_error($conn);
				}
				if (mysqli_query($conn, $sql_update_paper_evidence_source_and_item)) {
				    echo "Updated Evidence and Source Item records successfully <br>";
				} else {
				    echo "Error Evidence and Source Item records: " . mysqli_error($conn);
				}
				if (mysqli_query($conn, $sql_update_paper_methodology_and_method)) {
				    echo "Updated Methodology and Method records successfully <br>";
				} else {
				    echo "Error updating Methodology and Method records: " . mysqli_error($conn);
				}	
				if (mysqli_query($conn, $sql_update_paper_rating)) {
				    echo "Updated Paper Rating records successfully <br>";
				} else {
				    echo "Error Updating Paper Rating records: " . mysqli_error($conn);
				}
				if (mysqli_query($conn, $sql_update_paper_research)) {
				    echo "Updated Paper Research records successfully <br>";
				} else {
				    echo "Error Updating Paper Research records: " . mysqli_error($conn);
				}				
				// Close db connection
				mysqli_close($conn);	
			} 
			if ($_SESSION['number'] == "") { 
				// Hide submit button
				echo "
					<style type='text/css'>
						#submitmodifybtn {
							display: none;
						}
					</style>
				";
				echo "<h3 id='selected-paper-title'>Please select a paper to modify</h3>";
			}	

			if($result->num_rows > 0 && $session_paper_name != null) {
				echo "
					<table id='table' border='2px' width='50%'>";
				// Output data of each row
				while ($row = $result->fetch_assoc()) {
					// Created table and populate table
					echo "
			    <tr>
			        <th>Submitted By:</th>
			        <td>".$row["Submitted_By"]."</td>
			    </tr>
			    <tr>
			        <th>Date Submitted:</th>
			        <td>".$row["Submission_Date"]."</td>
			    </tr>
			    <tr>
			        <th>Paper Name:</th>
			        <td>".$row["paper_name"]."</td>
			    </tr>
			    <tr>
			        <th>Paper URL:</th>
			        <td><a target='_blank' href=".$row["Paper_URL"].">".$row["Paper_URL"]."</a></td>
			    </tr>		    
				";			
				}
				echo "
					</table>";	
			}
		?>																								

		<?php
			if (!$_SESSION['number'] == "") { ?>
				<br>		
				<!-- Bibliography -->
				<h3>Bibliography Info:</h3>
				<table border="2px">
					<tr>
						<th>Paper Author:</td>
						<td><input type="text" name="modify_paper_author"></td>
					</tr>
					<tr>
						<th>Paper Year:</td>
						<td><input type="text" name="modify_paper_year"></td>
					</tr>	
					<tr>
						<th>Paper Journal Name:</td>
						<td><input type="text" name="modify_paper_journal_name"></td>
					</tr>												
				</table>

				<br>		

				<!-- Evidence Source and Item-->
				<h3>Evidence Source and Item:</h3>
				<table border="2px">
					<tr>
						<th>Paper Evidence Source Research Level:</td>
						<td><input type="text" name="modify_paper_evidence_source_research_level"></td>
					</tr>
					<tr>
						<th>Paper Evidence Context:</td>
						<td><input type="text" name="modify_paper_evidence_context"></td>
					</tr>	
					<tr>
						<th>Paper Evidence Benefit Outcomes:</td>
						<td><input type="text" name="modify_paper_evidence_benefit_outcomes"></td>
					</tr>	
					<tr>
						<th>Paper Evidence Result:</td>
						<td><input type="text" name="modify_paper_evidence_result"></td>
					</tr>
					<tr>
						<th>Paper Evidence Method Implementation Integrity:</td>
						<td><input type="text" name="modify_paper_evidence_method_implemention_integrity"></td>
					</tr>																
				</table>	

				<!-- Methodology and Method-->
				<h3>Methodology and Method:</h3>
				<table border="2px">
					<tr>
						<th>Paper Methodology Name:</td>
						<td><input type="text" name="modify_paper_methodology_name"></td>
					</tr>
					<tr>
						<th>Paper Methodology Description:</td>
						<td><input type="text" name="modify_paper_methodology_description"></td>
					</tr>	
					<tr>
						<th>Paper Method Name:</td>
						<td><input type="text" name="modify_paper_method_name"></td>
					</tr>	
					<tr>
						<th>Paper Method Description:</td>
						<td><input type="text" name="modify_paper_method_description"></td>
					</tr>															
				</table>		

				<!-- Paper Rating-->
				<h3>Paper Rating:</h3>
				<table border="2px">
					<tr>
						<th>Paper Rating Date:</td>
						<td><input type="text" name="modify_paper_rating_date"></td>
					</tr>		
					<tr>
						<th>Paper Credibility Level:</td>
						<td><input type="text" name="modify_paper_credibility_level"></td>
					</tr>
					<tr>
						<th>Paper Credibility Reason:</td>
						<td><input type="text" name="modify_paper_credibility_reason"></td>
					</tr>	
					<tr>
						<th>Paper Confidence Level:</td>
						<td><input type="text" name="modify_paper_confidence_level"></td>
					</tr>	
					<tr>
						<th>Paper Confidence Reason:</td>
						<td><input type="text" name="modify_paper_confidence_reason"></td>
					</tr>	
					<tr>
						<th>Paper Rater:</td>
						<td><input type="text" name="modify_rater"></td>
					</tr>	
					<tr>
						<th>Paper Average Credibility:</td>
						<td><input type="text" name="modify_paper_average_credibility"></td>
					</tr>	
					<tr>
						<th>Paper Average Confidence:</td>
						<td><input type="text" name="modify_paper_average_confidence"></td>
					</tr>																		
				</table>	

				<!-- Methodology and Method-->
				<h3>Methodology and Method:</h3>
				<table border="2px">		
					<tr>
						<th>Paper Credibility Level:</td>
						<td><input type="text" name="modify_paper_research_question"></td>
					</tr>
					<tr>
						<th>Paper Credibility Reason:</td>
						<td><input type="text" name="modify_paper_research_method"></td>
					</tr>	
					<tr>
						<th>Paper Confidence Level:</td>
						<td><input type="text" name="modify_paper_research_metrics"></td>
					</tr>	
					<tr>
						<th>Paper Confidence Reason:</td>
						<td><input type="text" name="modify_paper_research_participants"></td>
					</tr>																					
				</table>					
			<?php
			}

		?>			
		 	<input type="submit" name="backbtn" id="btns" value="Back">
			<input type="submit" name="submitmodifybtn" id="submitmodifybtn">						 	
		</form>
<!-- 		<pre>
			<?php
				print_r($_GET);
				print_r($_SESSION);
			?>
		</pre> -->
	</body>
</html>