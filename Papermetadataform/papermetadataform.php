<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<style type="text/css">
			<style type="text/css">
			#table-meta-data-form {
			}
			#td-1 {
			}
	</style>
</head>
<body>
	<h1>Paper Meta-data Form </h1>
	<form action = "addpapermetadata.php" method = "GET">
		<table id="table-meta-data-form" border="1px">
		<tr>
			<td>Paper Name:</td>
			<!--<td><select name ="paper_name" size= "1px"><?php echo $options; ?></select></td>-->
			<td><input type="text" name="paper_name"></td>
		</tr>
		
		<!--methodology and method-->
		<tr>
			<td>Methodology Name:</td>
			<td><select name="methodology_name">
			<option></option>
			<option>Scrum</option>
			<option>XP</option>
			<option>Kanban</option>
			</select></td>
		</tr>
		<tr>
			<td>Methodology Description:</td>
			<td><input type="text" name="methodology_description"></td>
		</tr>
		<tr>
			<td>Practice Name:</td>
			<td><select name="practice_name">
			<option></option>
			<option>Method A</option>
			<option>Method B</option>
			<option>Method C</option>
			</select></td>
		</tr>
		<tr>
			<td>Practice Description:</td>
			<td><input type="text" name="practice_description"></td>
		</tr>
		<!--Evidence source and context-->
		<tr>
			<td>Evidence Source Research Level:</td>
			<td><select name="evidence_source_research_level">
			<option></option>
			<option>Research Level 1</option>
			<option>Research Level 2</option>
			<option>Research Level 3</option>
			<option>Research Level 4</option>
			<option>Research Level 5</option>
			</select></td>
		</tr>
		<tr>
			<td><h3>Evidence Context</h3></td>
		</tr>
		<tr>
			<td>Who:</td>
			<td><input type="text" name="context_who"></td>
		</tr>
		<tr>
			<td>What:</td>
			<td><input type="text" name="context_what"></td>
		</tr>
		<tr>
			<td>When:</td>
			<td><input type="text" name="context_when"></td>
		</tr>
		<tr>
			<td>Where:</td>
			<td><input type="text" name="context_where"></td>
		</tr>
		<tr>
			<td>Why:</td>
			<td><input type="text" name="context_why"></td>
		</tr>
		<tr>
			<td>How:</td>
			<td><input type="text" name="context_how"></td>
		</tr>
		<tr>
			<td>Evidence context benefit/outcome under test:</td>
			<td><input type="text" name="evidence_benefit_outcomes"></td>
		</tr>
		<tr>
			<td>Evidence context Result:</td>
			<td><input type="text" name="evidence_result"></td>
		</tr>
		<tr>
			<td>Evidence context method implementation integrity:</td>
			<td><input type="text" name="evidence_method_implemention_integrity"></td>
		</tr>
		<!--Research-->
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
		
		<tr>
			<td><h3>Bibliographic references</h3><td>
		</tr>
			<td>Paper Author</td><td>Paper Year</td><td>Paper Journal Name</td>
		</table>
		<input type="submit" value="Submit">
	</form>
</body>
</html>