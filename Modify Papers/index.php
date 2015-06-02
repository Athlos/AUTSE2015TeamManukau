<?php


	if (!isset($_GET['selectmenu'])) {
		$_GET['selectmenu'] = '';	
	} 
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
	
 	session_start(); // start the session 

 	if (!isset ($_SESSION["number"])) { // check if session variable exists
 		$_SESSION["number"] = ''; // create the session variable
 	} else {
 		$num = $_SESSION["number"]; // copy the value to a variable
 	}
 	// Set submit_btn an empty string value if undefined
 	if (!isset($_GET['submit_btn'])) {
 		$_GET['submit_btn'] = '';
 	}
 	// When submitted store selected paper in the $_SESSION variable and activate next page
 	if ($_GET['submit_btn']) {
		// $num = $_GET['selectmenu']; // increment the value
		$_SESSION["number"] = $_GET['selectmenu']; // update the session variable
		$_SESSION["submit_btn"];
		header("location:modify_form.php"); // redirect to number.php
		echo $num;
 	}
?> 
<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			#select {
				font-size: 16px;
				font-weight: bold;
				width: 300px;
				color: red;
				background: black;
				border: 10px;
			}
			#select_papers_title {
				color: green;
			}
			#approved_papers_title {
				/*Remove bottom margin*/
				margin-bottom: 0;
				text-align: center;
			}
			td {
			}
			body {
				/*background-color: black;*/
				/*color: red;*/
			}
			#btns {
				margin-top: 20px;
				width: 10%;
				height: 100px;
			}		
		</style>
		<title></title>
	</head>
	<body>
		<?php
			// Query to display papers from 'approved_papers' table
			$approved_papers = "SELECT * FROM approved_papers";
		?>
		<h3 id="select_papers_title">Select a paper to modify</h3>
		<form name='form-awaiting-papers' method='get' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
		<!-- <?php echo $_SERVER['PHP_SELF']; ?> -->
		<h3 id="approved_papers_title">Approved Papers:</h3>
		<?php

				$result = mysqli_query($conn, $approved_papers);
				echo "<SELECT name='selectmenu' size='20' id='select' style='width: 100%'>";		
				// Loop to get and echo the results as options
				while ($row = $result->fetch_assoc()) {

					echo 
					'<option value="'.$row["paper_name"].'">
						<table>						
							<tr>
								<th>Paper Name:</th>
								<td>'.$row["paper_name"].'</td>
							</tr>
							<tr>
								<td>Submitted By:</td>					
								<td>'.$row["Submitted_By"].'</td>
							</tr>
						</table>
					</option>';
				}
			echo "</SELECT>";
			echo "<input name='submit_btn' type='submit' id='btns'>";

		?>
		</form>
		<?php
			// Close db connection
			mysqli_close($conn);	
		?>
	<a href="/AUTSE2015TeamManukau/">Go Back</a><br>
	</body>
</html>