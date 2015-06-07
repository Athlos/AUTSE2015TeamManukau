<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/AUTSE2015TeamManukau/mystyles.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<script>
		$(document).ready(function () {
		    /*Getting the value of the checked radio buttons*/
		    $("input.modeClass").on( 'click', function () {
		        var value = $(this).val();
		        if (value == "Show/Hide Paper Details") {
		            $("#text_form1").toggle(500);
		        }
		        if (value == "Show/Hide Evidence Context") {
		            $("#text_form2").toggle(500);
		        }
		        if (value == "Show/Hide Research") {
		        	$("#text_form3").toggle(500);
		        };
		        if (value == "Show/Hide Bibliographic References") {
		        	$("#text_form4").toggle(500);
		        };
		        if (value == "Show/Hide Paper Ratings") {
		        	$("#text_form5").toggle(500);
		        };		        
		    });
		});
	   	function getval(sel) {
	       if (sel.value == 'scrum') {
	       		document.getElementById('methodology_description').value = "This is a short description for Scrum.";
	       };		
		       if (sel.value == 'xp') {
	       		document.getElementById('methodology_description').value = "This is a short description for xp.";
	       };	
	       if (sel.value == 'kanban') {
	       		document.getElementById('methodology_description').value = "This is a short description for kanban.";
	       };	
	       // Practice descriptions
  	       if (sel.value == 'method_a') {
	       		document.getElementById('practice_description').value = "This is a short description for practice a.";
	       };		
		       if (sel.value == 'method_b') {
	       		document.getElementById('practice_description').value = "This is a short description for practice b.";
	       };	
	       if (sel.value == 'method_c') {
	       		document.getElementById('practice_description').value = "This is a short description for practice c.";
	       };	
	    }

	    function clearRefAuthorText() {
	    	document.getElementById("ref_author").value = "";
	    }

	    function clearRefYearText() {
	    	document.getElementById("ref_year").value = "";
	    }

	    function clearJournalNameText() {
	    	document.getElementById("ref_journal_name").value = "";
	    }		    		    

	</script>	
	<style type="text/css"> 
			<style type="text/css">
			#table-meta-data-form {
 
			}
			#td-1 {

			} 
			textarea {
   				resize: none;
   				height: 100px;
			}
			fieldset {
				width: 450px;
			}
			#toggle-button {
				width: 480px;
				text-align: left;
			}
	</style> 

</head> 
<body>
	<h1 id="titles">Paper Meta-data Form </h1>
	<form id="main-index" action = "addpapermetadata.php" method = "GET">
			<input id="toggle-button" type="button" class="modeClass" name="change_mode" value="Show/Hide Paper Details"/>
			<fieldset id="text_form1">				
				<table>
				<!-- id="table-meta-data-form" -->
					<tr>
						<td id="form-text">Paper Name:</td>
						<!--<td><select name ="paper_name" size= "1px"><?php echo $options; ?></select></td>-->						
					</tr>					
					<tr>
						<td><input type="text" name="paper_name"></td>
					</tr>
					<!--methodology and method-->
					<tr>
						<td id="form-text">Methodology Name:</td> 
					</tr>
					<tr>
						<td>
							<select id="methodology_name" name="methodology_name" onchange="getval(this)"> 
								<option></option>
								<option value="scrum">Scrum</option>
								<option value="xp">XP</option>
								<option value="kanban">Kanban</option>
							</select>
						</td>
					</tr>
					<tr>
						<td id="form-text">Methodology Description:</td>
					</tr>
					<tr>
						<td>
							<textarea id="methodology_description" name="methodology_description" rows="4" cols="50" readonly></textarea>
						</td>
					</tr>					
					<tr>
						<td id="form-text">Practice Name:</td>						
					</tr>
					<tr>
						<td>
							<select id="practice_name" name="practice_name" onchange="getval(this)">
								<option></option>
								<option value="method_a">Method A</option>
								<option value="method_b">Method B</option>
								<option value="method_c">Method C</option>
							</select>
						</td>
					</tr>
					<tr>
						<td id="form-text">Practice Description:</td>					
					</tr>
					<tr>
						<td>
							<textarea id="practice_description" name="practice_description" rows="4" cols="50" readonly></textarea>
						</td>	
					</tr>
					<!--Evidence source and context-->
					<tr>
						<td id="form-text">Evidence Source Research Level:</td>
					</tr>			
					<tr>
						<td><select name="evidence_source_research_level">
						<option></option>
						<option>Research Level 1</option>
						<option>Research Level 2</option>
						<option>Research Level 3</option>
						<option>Research Level 4</option>
						<option>Research Level 5</option>
						</select></td>
					</tr>
				</table>
			</fieldset>
			<br>
			<br>
			<input id="toggle-button" type="button" class="modeClass" name="change_mode" value="Show/Hide Evidence Context"/>
			<fieldset id="text_form2">	
				<table id="table-meta-data-form">
					<tr>
					<td id="form-text"><h3>Evidence Context</h3></td>
					</tr>
					<tr>
						<td id="form-text">Who:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_who"></td>
					</tr>
					<tr>
						<td id="form-text">What:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_what"></td>
					</tr>
					<tr>
						<td id="form-text">When:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_when"></td>
					</tr>
					<tr>
						<td id="form-text">Where:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_where"></td>
					</tr>
					<tr>
						<td id="form-text">Why:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_why"></td>
					</tr>
					<tr>
						<td id="form-text">How:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_how"></td>
					</tr>
					<tr>
						<td id="form-text">Evidence context benefit/outcome under test:</td>						
					</tr>
					<tr>
						<td><input type="text" name="evidence_benefit_outcomes"></td>
					</tr>
					<tr>
						<td id="form-text">Evidence context Result:</td>						
					</tr>
					<tr>
						<td><input type="text" name="evidence_result"></td>
					</tr>
					<tr>
						<td id="form-text">Evidence context method implementation integrity:</td>						
					</tr>
					<tr>
						<td><input type="text" name="evidence_method_implemention_integrity"></td>
					</tr>
				</table>
			</fieldset>
			<br>
			<br>

			<input id="toggle-button" type="button" class="modeClass" name="change_mode" value="Show/Hide Paper Ratings"/>
			<fieldset id="text_form5">	
				<!-- Research table -->
				<table id="table-meta-data-form">
					<!-- Credibility Level -->
					<tr>
						<td id="form-text">Credibility Level:</td> 
					</tr>					
					<tr>
						<td>
							<select id="credibility_level" name="credibility_level" onchange="getval(this)"> 
								<option value="0">please select a rating</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>							
							</select>
						</td>
					</tr>
					<!-- Credibility Reason -->
					<tr>					
						<td id="form-text">
							Credibility Reason:<br>
							<input type="text" name="credibility_reason">
						</td>
					</tr>
					<!-- Confidence Level -->
					<tr>
						<td id="form-text">Confidence Level:</td> 
					</tr>	
					<tr>
						<td>
							<select id="confidence_level" name="confidence_level" onchange="getval(this)"> 
								<option value="0">please select a rating</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>							
							</select>
						</td>
					</tr>	

					<!-- Confidence Reason -->
					<tr>					
						<td id="form-text">
							Confidence Reason:<br>
							<input type="text" name="confidence_reason">
						</td>
					</tr>
													

									
				</table>
			</fieldset>
			<br>
			<br>
			<input id="toggle-button" type="button" class="modeClass" name="change_mode" value="Show/Hide Research"/>
			<fieldset id="text_form3">	
				<!-- Research table -->
				<table id="table-meta-data-form">
				<tr>
					<td id="form-text"><h3>Research</h3></td>
				</tr>
				<tr>					
					<td id="form-text">Research Question:</td>
					<td><input type="text" name="research_question"></td>
				</tr>
				<tr>
					<td id="form-text">Research Method:</td>
					<td><input type="text" name="research_method"></td>
				</tr>
				<tr>
					<td id="form-text">Research Metrics:</td>
					<td><input type="text" name="research_metrics"></td>
				</tr>
				<tr>
					<td id="form-text">Research Participants:</td>
					<td><input type="text" name="research_participants"></td>
				</tr>
					
				</table>
			</fieldset>
			<br>
			<br>
			<input id="toggle-button" type="button" class="modeClass" name="change_mode" value="Show/Hide Bibliographic References"/>
			<fieldset id="text_form4">	
				<table id="table-meta-data-form">
				<!-- id="" name="" -->
					<tr>
						<td id="form-text"><h3>Bibliographic references</h3><td>
					</tr>

					<tr>
						<td id="form-text">Paper Author(s):</td>
						<td>
							<input id="ref_author" name="ref_author" type="text" value="Enter paper author(s) - Separate by comma" onfocus="clearRefAuthorText();">
						</td>
					</tr>

					<tr>
						<td id="form-text">Paper Year:</td>
						<td>
							<input id="ref_year" name="ref_year" type="text" value="Enter year of publication" onfocus="clearRefYearText();">
						</td>
					</tr>

					<tr>
						<td id="form-text">Journal Name:</td>
						<td>
							<input id="ref_journal_name" name="ref_journal_name" type="text" value="Enter journal name" onfocus="clearJournalNameText();">
						</td>
					</tr>									

				</table>
			</fieldset>
		<br>
		<br>
		<input type="submit" value="Submit">
		<input id="center-elements" type=button onClick="location.href='/AUTSE2015TeamManukau/'" value='Go Back'>
		<!-- <br><a href="/AUTSE2015TeamManukau/">Go Back</a><br>  -->
	</form>
</body>
</html>