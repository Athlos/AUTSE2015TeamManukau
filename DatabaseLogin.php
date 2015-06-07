<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Index </title>
</head>
<body>
	<?php
	
	//This file lets us change the login data from here without having to go into every file
	
	//Now we connect to the database, using the default login of 127.0.0.1 (which is localhost), root (default user), '' (default password is blank), 'test' (directory with out databases)
		//this will throw an exception if the connection fails, if that is the case, please check you have your database in the right folder
		
		
		//REMOVE THIS CODE FROM THE PHP FILE YOU ARE ADDING THIS TO
		//$conn = @mysqli_connect('mysql.1freehosting.com','u317137895_root','aut123', 'u317137895_test')
		// $conn = @mysqli_connect('127.0.0.1','root','', 'test')
		$conn = @mysqli_connect('mysql.1freehosting.com','u317137895_root','aut123', 'u317137895_test')
		or die('Failed to connect to server');
		
		
		//PASTE THIS IN TO YOUR FILES TO LOG IN AT THE BEGINNING OF YOUR PHP
		//This file will log you into the database automatically
		//include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
	
	?>
</form>
</body>
</html> 