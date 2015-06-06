<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
		    });
		});

		// // Assign value to methodology discription
		// $('#methodology_name').on('change', function() {
  // 			alert(this.value );
		// })
		   	function getval(sel) {
		       // alert(sel.value);
		       // Methodology descriptions
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
	<script type="text/javascript">
		// $(document).ready(function(){
    		// $("#table-meta-data-form").children().css({"color": "red", "border": "2px solid red", "width" : "150px"});
		// });

	</script>
	<script src="myscripts.js"></script>
</head> 
<body>
	<h1>Paper Meta-data Form </h1>
	<form action = "addpapermetadata.php" method = "GET">
			<input id="toggle-button" type="button" class="modeClass" name="change_mode" value="Show/Hide Paper Details"/>
			<fieldset id="text_form1">				
				<table>
				<!-- id="table-meta-data-form" -->
					<tr>
						<td>Paper Name:</td>
						<!--<td><select name ="paper_name" size= "1px"><?php echo $options; ?></select></td>-->						
					</tr>					
					<tr>
						<td><input type="text" name="paper_name"></td>
					</tr>
					<!--methodology and method-->
					<tr>
						<td>Methodology Name:</td> 
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
						<td>Methodology Description:</td>
					</tr>
					<tr>
						<td>
							<textarea id="methodology_description" name="methodology_description" rows="4" cols="50" readonly></textarea>
						</td>
					</tr>					
					<tr>
						<td>Practice Name:</td>						
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
						<td>Practice Description:</td>					
					</tr>
					<tr>
						<td>
							<textarea id="practice_description" name="practice_description" rows="4" cols="50" readonly></textarea>
						</td>	
					</tr>
					<!--Evidence source and context-->
					<tr>
						<td>Evidence Source Research Level:</td>
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
					<td><h3>Evidence Context</h3></td>
					</tr>
					<tr>
						<td>Who:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_who"></td>
					</tr>
					<tr>
						<td>What:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_what"></td>
					</tr>
					<tr>
						<td>When:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_when"></td>
					</tr>
					<tr>
						<td>Where:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_where"></td>
					</tr>
					<tr>
						<td>Why:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_why"></td>
					</tr>
					<tr>
						<td>How:</td>						
					</tr>
					<tr>
						<td><input type="text" name="context_how"></td>
					</tr>
					<tr>
						<td>Evidence context benefit/outcome under test:</td>						
					</tr>
					<tr>
						<td><input type="text" name="evidence_benefit_outcomes"></td>
					</tr>
					<tr>
						<td>Evidence context Result:</td>						
					</tr>
					<tr>
						<td><input type="text" name="evidence_result"></td>
					</tr>
					<tr>
						<td>Evidence context method implementation integrity:</td>						
					</tr>
					<tr>
						<td><input type="text" name="evidence_method_implemention_integrity"></td>
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
					<td><h3>Research</h3></td>
				</tr>
				<tr>					
					<td>Research Question:</td>
					<td><input type="text" name="research_question"></td>
				</tr>
				<tr>
					<td>Research Method:</td>
					<td><input type="text" name="research_method"></td>
				</tr>
				<tr>
					<td>Research Metrics:</td>
					<td><input type="text" name="research_metrics"></td>
				</tr>
				<tr>
					<td>Research Participants:</td>
					<td><input type="text" name="research_participants"></td>
				</tr>
					
				</table>
			</fieldset>
			<br>
			<br>
			<input id="toggle-button" type="button" class="modeClass" name="change_mode" value="Show/Hide Bibliographic References"/>
			<fieldset id="text_form4">	
				<table id="table-meta-data-form">
					<tr>
						<td><h3>Bibliographic references</h3><td>
					</tr>
					<td>
						Paper Author
					</td>
					<td>
						Paper Year
					</td>
					<td>
						Paper Journal Name
					</td>
				</table>
			</fieldset>
		<br>
		<br>
		<input type="submit" value="Submit">
		<br><a href="/AUTSE2015TeamManukau/">Go Back</a><br> 
	</form>
</body>
</html>