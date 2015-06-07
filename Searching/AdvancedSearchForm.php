<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/AUTSE2015TeamManukau/mystyles.css">
<title>Search Paper</title>

<style>
table, th, td {

    border-width:5px;	
    border-style:groove;
	text-align:center;
}
</style>

<script type="text/javascript">

	var counter = 0;
		
		function cloneRow() {
			counter++;
			
			var andor = document.getElementById("andor");
			var cloneandor = andor.cloneNode(true);
			cloneandor.name = "andor"+counter;
			
			var field = document.getElementById("searchField");
			var clonefield = field.cloneNode(true);
			clonefield.name = "field"+counter;
			
			var operator = document.getElementById("operator");
			var cloneoperator = operator.cloneNode(true);
			cloneoperator.name = "operator"+counter;
			
			var value = document.getElementById("value");
			var clonevalue = value.cloneNode(true);
			clonevalue.name = "value"+counter;
			
			// Find a <table> element with id="myTable":
			var table = document.getElementById("searchTable");

			// Create an empty <tr> element and add it to the 1st position of the table:
			var row = table.insertRow(counter);
			
			// Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			
			cell1.appendChild(cloneandor);
			cell2.appendChild(clonefield);
			cell3.appendChild(cloneoperator);
			cell4.appendChild(clonevalue);

		}
	</script>

</head>
<body>
<label value="field" id="test">  </label>

<form action="SearchForm.php">
    <input type="submit" value="<- Back">
	</form>
	
	<form action = "Search.php" method = "GET" id="searchForm" >
	<br><label>Search : <input type = "text" name = "search"> </label><br>
	<br><br>
	<h1>AdvancedSearch</h1>
	<input type="hidden" name="searchType" value="Advanced">

	
	<table id="searchTable">
	<tr>
		<td>Combination</td>
		<td><label>Field   </label></td>
		<td><label>Operator   </label></td>
		<td><label>Value </label></td>
	</tr>
	
	
  <tr id ="searchRow">
    <td>
		<select name = "andor" id="andor">
			<option> And </option>
			<option> Or </option>
		</select>
	</td>
  
    <td>
		<select name="field" id="searchField">
			<option value="paper_bibliography_info.paper_year">Year of Publication</option>
			<option value="paper_bibliography_info.paper_author">Author</option>
			<option value="paper_bibliography_info.paper_journal_name">Journal of Publication</option>
			<option value="paper_methodology_and_method.paper_methodology_name">Methodology</option>
			<option value="paper_methodology_and_method.paper_practice_name">Practice</option>
			<option value="paper_evidence_source_and_item.paper_evidence_source_research_level">Research Level</option>
			<option value="paper_context.paper_name_context">Evidence Context</option>
			<option value="paper_research.paper_research_question">Research Question</option>
			<option value="paper_research.paper_research_method">Research Method</option>
			<option value="paper_research.paper_research_metrics">Research Metrics</option>
			<option value="paper_research.paper_research_participants">Research participants</option>
			<option value="paper_rating.paper_credibility_level">Credibility Rating</option>
			<option value="paper_rating.paper_confidence_level">Confidence Rating</option>
		</select>
	</td>
	
    <td>
		
		<select name = "operator" id="operator">
			<option> = </option>
			<option> > </option>
			<option> < </option>
		</select>
	</td> 
	
    <td>
		<label><input type = "text" name = "value" id="value"> </label>
	</td>
	
  </tr>
</table>

<br><input type="button" onclick="cloneRow()" value="Add Search parameter" /><br>

	<br><input type = "submit" value = "Search">
	</form>


</body>
</html> 