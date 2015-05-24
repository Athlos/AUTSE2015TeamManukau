<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Search Paper</title>
</head>
<body>
	<h1>AdvancedSearch</h1>
	<script type="text/javascript">
	function toggle() {
    var element = document.getElementById('myHeader');

    if (element) {
        var display = element.style.display;

        if (display == "none") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }
}
	</script>
	
	<input type="button" onClick="toggle()" value="Show/Hide Advanced Options">
	<div id="themes" style="display:block">
	</div>
	<p>
	<form action = "Search.php" method = "GET" id="myHeader">
	
	
	
	
	<label>Methodology :   </label>
	<select>
	<!--This is hardcoded for now, should make it pull methodologies from the tables to select -->
	<option value="methodology">Scrum</option>
	<option value="methodology">XP</option>
	<option value="methodology">Kanban</option>
	</select><p>
	
	
	
	
	<label>Methods Used :   </label>
	<select>
	<!--This is hardcoded for now, should make it pull methods from the tables to select -->
	<option value="method">Small Group Testing</option>
	<option value="method">Large Group Testing</option>
	<option value="method">Focus Groups</option>
	</select><p>
	
	<label>Group By :   </label>
	<select>
	<option value="group">Methodology</option>
	<option value="group">Methods</option>
	</select><p>
	
	<label>Sort By :   </label>
	<select>
	<option value="sort">Name</option>
	<option value="sort">Credibility</option>
	<option value="sort">Quality</option>
	</select><p>
	
	</form>

	
	
</script>
</body>
</html> 