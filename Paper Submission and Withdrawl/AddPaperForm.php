<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Paper Add</title>
</head>
<body>
	<h1>Paper Add Form</h1>
	
	<!--This is a basic form to apply to add your paper to the database, requires 2 fields, URL and name of submitter-->
	<form action = "AddPaper.php" method = "GET" >
	<label>Link: <input type = "text" name = "link"> </label>
	<br/>
	<label>Person Submitting: <input type = "text" name = "submitter"> </label>
	<br/>
	<br/>
	<!--This will submit to the AddPaper.php file, which will then add to a database -->
	<input type = "submit" value = "Submit">
	</form>
	
	<a href="Temp.php">Go Back</a><br>
	
</body>
</html> 