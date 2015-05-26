<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";	

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

			$sql_paper_has_metadata = "SELECT paper_has_metadata FROM approved_papers WHERE paper_name='$session_paper_name'";
			$sql = "SELECT * FROM approved_papers WHERE paper_name LIKE '$session_paper_name%'";
			$sql_cred_conf_rating = "SELECT * FROM paper_credibility_and_confidence_rating WHERE paper_name_rating='$session_paper_name'";
			$sql_evidence_src_item = "SELECT * FROM paper_evidence_source_and_item WHERE paper_name_evidence='$session_paper_name'";
			$sql_methdology_method = "SELECT * FROM paper_methodology_and_method WHERE paper_name_method='$session_paper_name'";
			$sql_research = "SELECT * FROM paper_research WHERE paper_name_research='$session_paper_name'";


			// Modify Credibility and Confidence Ratings Handle
			$sql_update_cred_conf_rating = "UPDATE paper_credibility_and_confidence_rating 
			SET 
			paper_credibility_level='$modified_cred_level', 
			paper_credibility_reason='$modified_cred_reason',
			paper_credibility_rater='$modified_cred_rater',
			paper_confidence_level='$modified_conf_level',
			paper_confidence_reason='$modified_conf_reason',
			paper_confidence_rater='$modified_conf_rater'
			WHERE paper_name_rating='$session_paper_name'";
			// Modify Paper Evidence Source and Item Handle
			$sql_update_evidence_src_item = "UPDATE paper_evidence_source_and_item 
			SET 
			paper_evidence_source_bibliography_references='$modified_src_bib_ref', 
			paper_evidence_source_research_level='$modified_src_research_lvl',
			paper_evidence_context='$modified_evidence_context',
			paper_evidence_benefit_outcomes='$modified_evidence_outcomes',
			paper_evidence_result='$modified_evidence_result',
			paper_evidence_method_implemention_integrity='$modified_evidence_meth_imp_integrity'
			WHERE paper_name_evidence='$session_paper_name'";
			// Modify Paper Methodology Name Handle
			$sql_update_methodology_meth_name = "UPDATE paper_methodology_and_method 
			SET 
			paper_methodology_name='$modified_methodology_name', 
			paper_methodology_description='$modified_methodology_desc',
			paper_method_name='$modified_method_name',
			paper_method_description='$modified_method_desc'
			WHERE paper_name_method='$session_paper_name'";
			// Modify Paper Research Handle
			$sql_update_research = "UPDATE paper_research 
			SET 
			paper_research_question='$modified_research_q', 
			paper_research_method='$modified_research_meth',
			paper_research_metrics='$modified_research_metrics',
			paper_research_participants='$modified_research_participants'
			WHERE paper_name_research='$session_paper_name'";


			// 
			$result_paper_has_metadata = $conn -> query($sql_paper_has_metadata);
			// 
			$result = $conn->query($sql);
			$result_cred_conf_rating = $conn->query($sql_cred_conf_rating);
			$result_evidence_src_item = $conn->query($sql_evidence_src_item);
			$result_methdology_method = $conn->query($sql_methdology_method);
			$result_research = $conn->query($sql_research);

			// Checking method 
			$sql_paper_has_metadata_final_check = "SELECT paper_has_metadata FROM approved_papers WHERE paper_name='$session_paper_name'";
			$result_paper_has_metadata_final_check = $conn -> query($sql_paper_has_metadata_final_check);
			// Activate sql update query if submit button is activated
			if (isset($_GET['submitmodifybtn'])) {
				// Checks if the selected paper has meta-data
				if ($row = $result_paper_has_metadata_final_check -> fetch_assoc()) {
					if ($row['paper_has_metadata'] == 1) {
						echo "
							<h2 id='refresh-update'>Refresh page to view changes</h2>
						";
						// echo "Submit Form";
						if (mysqli_query($conn, $sql_update_cred_conf_rating)) {
						    echo "Updated Credibility and Confidence Rating records successfully <br>";
						} else {
						    echo "Error Credibility and Confidence Rating records: " . mysqli_error($conn);
						}
						if (mysqli_query($conn, $sql_update_evidence_src_item)) {
						    echo "Updated Evidence and Source Item records successfully <br>";
						} else {
						    echo "Error Evidence and Source Item records: " . mysqli_error($conn);
						}
						if (mysqli_query($conn, $sql_update_methodology_meth_name)) {
						    echo "Updated Evidence and Source Item records successfully <br>";
						} else {
						    echo "Error Evidence and Source Item records: " . mysqli_error($conn);
						}	
						if (mysqli_query($conn, $sql_update_research)) {
						    echo "Updated Paper Research records successfully <br>";
						} else {
						    echo "Error Updated Paper Research records: " . mysqli_error($conn);
						}
					}
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





			if ($row = $result_paper_has_metadata -> fetch_assoc()) {
				// Check if the selected paper has meta-data
				if ($row['paper_has_metadata'] == 1) {
					// Selected paper title
					echo "<h2>Selected Paper Meta-data:</h2>";
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
					// Display data from the 'paper_credibility_and_confidence_rating' table					
					if($result_cred_conf_rating->num_rows > 0 && $session_paper_name != null) {
						// Create table rows and headers
						echo "
							<table id='table_paper_credibility_and_confidence_rating' border='2px'>";
						// Output data of each row
						while ($row = $result_cred_conf_rating->fetch_assoc()) {
							// Create table and populate with 'paper_evidence_source_and_item' fields
							echo "
					    <tr>
					        <th>Paper Name:</th>
					        <td>".$row["paper_name_rating"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Credibility Level:</th>
					        <td>".$row["paper_credibility_level"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Credibility Reason:</th>
					        <td>".$row["paper_credibility_reason"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Credibility Rater:</th>
					        <td>".$row["paper_credibility_rater"]."</td>			    	
					    </tr>	
					    <tr>
					        <th>Paper Confidence Level:</th>
					        <td>".$row["paper_confidence_level"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Confidence Reason:</th>
					        <td>".$row["paper_confidence_reason"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Confidence Rater:</th>
					        <td>".$row["paper_confidence_rater"]."</td>			    	
					    </tr>				    	    

						";			
						}
						echo "
							</table>";	
					}
					// Display data from the 'paper_evidence_source_and_item' table
					if($result_cred_conf_rating->num_rows > 0 && $session_paper_name != null) {
						// Create table rows and headers
						echo "
							<table id='result_evidence_src_item' border='2px'>";
						// Output data of each row
						while ($row = $result_evidence_src_item->fetch_assoc()) {
							// Create table and populate with 'paper_evidence_source_and_item' fields
							echo "
					    <tr>
					        <th>Name:</th>
					        <td>".$row["paper_name_evidence"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Evidence Source Bibliography References:</th>
					        <td>".$row["paper_evidence_source_bibliography_references"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Evidence Source Research Level:</th>
					        <td>".$row["paper_evidence_source_research_level"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Evidence Context:</th>
					        <td>".$row["paper_evidence_context"]."</td>			    	
					    </tr>		    
					    <tr>
					        <th>Paper Evidence Benefit Outcomes:</th>
					        <td>".$row["paper_evidence_benefit_outcomes"]."</td>			    	
					    </tr>
					    <tr>
					        <th>Paper Evidence Result:</th>
					        <td>".$row["paper_evidence_result"]."</td>			    	
					    </tr>			    			    
					    <tr>
					        <th>Paper Evidence Method Implementation Integrity:</th>
					        <td>".$row["paper_evidence_method_implemention_integrity"]."</td>			    	
					    </tr>	
						";			
						}
						echo "
							</table>";	
					}
					// result_evidence_src_item table
					if($result_methdology_method->num_rows > 0 && $session_paper_name != null) {
						// Create table rows and headers
						echo "
							<table id='result_methdology_method' border='2px'>";
						// Output data of each row
						while ($row = $result_methdology_method->fetch_assoc()) {
							// Populate created table table
							echo "
					    <tr>
					        <th>Name:</th>
					        <td>".$row["paper_name_method"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Methodology Name:</th>
					        <td>".$row["paper_methodology_name"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Methodology Description:</th>
					        <td>".$row["paper_methodology_description"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Method Name:</th>
					        <td>".$row["paper_method_name"]."</td>			    	
					    </tr>		    
					    <tr>
					        <th>Paper Method Description:</th>
					        <td>".$row["paper_method_description"]."</td>			    	
					    </tr>
						";			
						}
						echo "
							</table>";	
					}
					// result_evidence_src_item table
					if($result_research->num_rows > 0 && $session_paper_name != null) {
						// Create table rows and headers
						echo "
							<table id='result_research' border='2px'>";
						// Output data of each row
						while ($row = $result_research->fetch_assoc()) {
							// Populate created table table
							echo "
					    <tr>
					        <th>Paper:</th>
					        <td>".$row["paper_name_research"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Research Question:</th>
					        <td>".$row["paper_research_question"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Research Method:</th>
					        <td>".$row["paper_research_method"]."</td>
					    </tr>
					    <tr>
					        <th>Paper Research Metrics:</th>
					        <td>".$row["paper_research_metrics"]."</td>			    	
					    </tr>		    
					    <tr>
					        <th>Paper Research Participants:</th>
					        <td>".$row["paper_research_participants"]."</td>			    	
					    </tr>
						";			
						}
						echo "
							</table>";	
					} ?>																								


		<br>
			<!-- Credibility and Confidence Rating update table -->
			<h3>Modify Credibility and Confidence Rating:</h3>
			<table border="2px">
				<tr>
					<th>Paper Credibility Level:</td>
					<td><input type="text" name="modify_cred_level"></td>
				</tr>
				<tr>
					<th>Paper Credibility Reason:</td>
					<td><input type="text" name="modify_cred_reason"></td>
				</tr>	
				<tr>
					<th>Paper Credibility Rater:</td>
					<td><input type="text" name="modify_cred_rater"></td>
				</tr>
				<tr>
					<th>Paper Confidence Level:</td>
					<td><input type="text" name="modify_conf_level"></td>
				</tr>
				<tr>
					<th>Paper Confidence Reason:</td>
					<td><input type="text" name="modify_conf_reason"></td>
				</tr>	
				<tr>
					<th>Paper Confidence Rater:</td>
					<td><input type="text" name="modify_conf_rater"></td>
				</tr>												
			</table>
			<!--  -->
			<!-- Evidence and Source Item Table -->
			<h3>Modify Evidence and Source Item:</h3>
			<table border="2px">
				<tr>
					<th>Paper Evidence Source Bibliography References:</td>
					<td><input type="text" name="modify_src_bib_ref"></td>
				</tr>
				<tr>
					<th>Paper Evidence Source Research Level:</td>
					<td><input type="text" name="modify_src_research_lvl"></td>
				</tr>	
				<tr>
					<th>Paper Evidence Context:</td>
					<td><input type="text" name="modify_evidence_context"></td>
				</tr>	
				<tr>
					<th>Paper Evidence Benefit Outcomes:</td>
					<td><input type="text" name="modify_evidence_outcomes"></td>
				</tr>
				<tr>
					<th>Paper Evidence Result:</td>
					<td><input type="text" name="modify_evidence_result"></td>
				</tr>	
				<tr>
					<th>Paper Evidence Method Implementation Integrity:</td>
					<td><input type="text" name="modify_evidence_meth_imp_integrity"></td>
				</tr>										
			</table>
			<!-- Paper Methodology and Method  Table -->
			<h3>Modify Paper Methodology and Method:</h3>
			<table border="2px">
				<tr>
					<th>Paper Methodology Name:</td>
					<td><input type="text" name="modify_methodology_name"></td>
				</tr>
				<tr>
					<th>Paper Methodology Description:</td>
					<td><input type="text" name="modify_methodology_desc"></td>
				</tr>	
				<tr>
					<th>Paper Method Name:</td>
					<td><input type="text" name="modify_method_name"></td>
				</tr>	
				<tr>
					<th>Paper Method Description:</td>
					<td><input type="text" name="modify_method_desc"></td>
				</tr>								
			</table>	
			<!-- Paper Research  Table -->
			<h3>Modify Paper Research:</h3>
			<table border="2px">
				<tr>
					<th>Paper Research Question:</td>
					<td><input type="text" name="modify_research_q"></td>
				</tr>
				<tr>
					<th>Paper Research Method:</td>
					<td><input type="text" name="modify_research_meth"></td>
				</tr>	
				<tr>
					<th>Paper Research Metrics:</td>
					<td><input type="text" name="modify_research_metrics"></td>
				</tr>	
				<tr>
					<th>Paper Research Participants:</td>
					<td><input type="text" name="modify_research_participants"></td>
				</tr>									
			</table>	

				<?php } else {
					// Hide submit button
					echo "
						<style type='text/css'>
							#submitmodifybtn {
								display: none;
							}
						</style>
					";
					echo "<h3 id='selected-paper-title'>This paper has no metadata</h3> <br>";
				}
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