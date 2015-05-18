<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Remove Paper</title>
</head>
<body>
	<h1>Submit Removal Form</h1>
	<!--This is a basic form to apply to remove your paper from the database, requires 2 fields, URL and name of submitter,
	and can include a comment from the user as to why-->
	<form action = "RemovePaper.php" method = "GET" >
	<label>Paper URL <input type = "text" name = "link"> </label><br>
	<br>
	<label>Person Withdrawing: <input type = "text" name = "withdrawer"> </label><br>
	<br>
	<label for="reason">Reason for Withdrawing</label><br>
	<br>
	<textarea name="comment" ></textarea><br>
	<!--This will submit to the RemovePaper.php file, which will then add to a database -->
	<input type = "submit" value = "Submit">
	</form>
	
	<a href="Temp.php">Go Back</a><br>
	
</body>
</html> 