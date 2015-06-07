<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/AUTSE2015TeamManukau/mystyles.css">
<title>Search Paper</title>
</head>
<body>
	<h1 id="titles">Search A Paper</h1>
	<div id="search-index">
		<form action = "Search.php" method = "GET" >
			<label>Search : <input type = "text" name = "search"> </label>
			
			<input type="hidden" name="searchType" value="Simple">
			
			<input type = "submit" value = "Search">
		</form>
		
		<form action="AdvancedSearchForm.php">
	    	<input type="submit" value="Advanced Search">
		</form>
		<input id="center-elements" type=button onClick="location.href='/AUTSE2015TeamManukau/'" value='Go Back'>
	</div>
	
	<!-- <a href="http://autse2015.allalla.com/AUTSE2015TeamManukau/">Go Back</a><br> -->

</body>
</html> 