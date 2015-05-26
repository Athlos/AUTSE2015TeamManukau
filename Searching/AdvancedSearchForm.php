<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Search Paper</title>
</head>
<body>
<form action="SearchForm.php">
    <input type="submit" value="<- Back">
	</form>
	<h1>AdvancedSearch</h1>
	<form action = "Search.php" method = "GET" >
	<label>Search : <input type = "text" name = "search"> </label><br>
	<br><br>
	
	<input type="hidden" name="searchType" value="Advanced">
	
	<label>Methodology :   </label>
	<select name="methodology">
	<!--This is hardcoded for now, should make it pull methodologies from the tables to select -->
	<option></option>
	<option>Scrum</option>
	<option>XP</option>
	<option>Kanban</option>
	</select><p>
	
	<label>Methods Used :   </label>
	<select name = "method">
	<!--This is hardcoded for now, should make it pull methods from the tables to select -->
	<option></option>
	<option>Small Group Testing</option>
	<option>Large Group Testing</option>
	<option>Focus Groups</option>
	</select><p>
	
	<!-- does not work, removed for now
	<label>Group By :   </label>
	<select name="group">
	<option></option>
	<option value="paper_methodology_and_method.paper_methodology_name">Methodology</option>
	<option value="paper_methodology_and_method.paper_method_name">Methods</option>
	</select><p>
	-->
	<label>Sort By :   </label>
	<select name="sort">
	<option></option>
	<option>Name</option>
	</select><p>

	<br><input type = "submit" value = "Search">
	</form>

</body>
</html> 