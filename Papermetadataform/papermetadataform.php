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
			<td>Paper name:</td>
			<td><input type="text" name="paper_name"></td>
		</tr>
		<!--methodology and method-->
		<tr>
			<td>Methodology Name:</td>
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
			<td>Method Description:</td>
			<td><input type="text" name="method_description"></td>
		</tr>
		<!--Evidence source and context-->
		<tr>
			<td>Evidence Source Bibliography References:</td>
			<td><input type="text" name="evidence_source_bibliography_references"></td>
		</tr>
		<tr>
			<td>Evidence Source Research Level:</td>
			<td><input type="text" name="evidence_source_research_level"></td>
		</tr>
		<tr>
			<td>Evidence Context (what, why, when, where, who, how):</td>
			<td><input type="text" name="evidence_context"></td>
		</tr>
		<tr>
			<td>Evidence context benefit/outcome under test:</td>
			<td><input type="text" name="evidence_context_benefit_outcomes"></td>
		</tr>
		<tr>
			<td>Evidence context Result:</td>
			<td><input type="text" name="evidence_context_result"></td>
		</tr>
		<tr>
			<td>Evidence context method implementation integrity:</td>
			<td><input type="text" name="evidence_context_method_implemention_integrity"></td>
		</tr>
		<!--Research-->
		<tr>
			<td>Research Question:</td>
			<td><input type="text" name=""></td>
		</tr>
		<tr>
			<td>Research Method:</td>
			<td><input type="text" name=""></td>
		</tr>
		<tr>
			<td>Research Metrics:</td>
			<td><input type="text" name=""></td>
		</tr>
		<tr>
			<td>Research Participants:</td>
			<td><input type="text" name=""></td>
		</tr>
		</table>
		<input type="submit" value="Submit">
	</form>
</body>
</html>