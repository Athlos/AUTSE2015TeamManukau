<html>
	<head>
		<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
		<style type="text/css">
			#table-meta-data-form {
			}
			#td-1 {
			}

		</style>
	</head>
	<body>
		<h1>Paper Meta-data Form</h1>
		<!--This is a form that multiple areas to fill out for paper meta data-->
		<form action = "addpapermetadata.php" method = "GET">		
			<table id="table-meta-data-form" border="1px">
				<tr>
					<td id="td-1">Methodology Name:</td>
					<td><input type="text" name="methodology_name"></td>
				</tr>
				<tr>
					<td>Methodology Description:</td>
					<td><input type="text" name="methodology_description"></td>
				</tr>
				<tr>
					<td>Method Name:</td>
					<td><input type="text" name="method_name"></td>
				</tr>
				<tr>
					<td>Method description:</td>
					<td><input type="text" name="method_description"></td>
				</tr>
				<tr>
					<td>Evidence Source Bibliography References:</td>
					<td><input type="text" name="bibliography_ref"></td>
				</tr>
				<tr>
					<td>Evidence Source Research Level:</td>
					<td><input type="text" name="research_level"></td>
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
				<tr>
					<td>Evidence context (what, why, when, where, who, how):</td>
					<td><input type="text" name="evidence_context"></td>
				</tr>
				<tr>
					<td>Evidence context benefit/outcome under test:</td>
					<td><input type="text" name="benefit_outcome"></td>
				</tr>
				<tr>
					<td>Evidence context Result:</td>
					<td><input type="text" name="result"></td>
				</tr>
				<tr>
					<td>Evidence context method implementation integrity:</td>
					<td><input type="text" name="method_implementation_integrity"></td>
				</tr>
			</table>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>