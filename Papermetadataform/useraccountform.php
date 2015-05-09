<html>
	<head>
		<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
	</head>
	<body>
		<h1>User account creation</h1>
		<form>
			<form action = "addpapermetadata.php" method = "GET">
			User Name:<br>
			<input type="text" name="user_name">
			<br>
			E-mail:<br>
			<input type="text" name="email">
			<br>
			Password(between 6-12)<br>
			<input type="password" name="password:">
			<br>
			Re-enter Password<br>
			<input type="password" name="passwordcheck:">
			<br>
			<input type="submit" value="submit">
		</form>
		
		<pre>
			<?php
				if($_GET)
				{
					echo 'Contents of the $_GET array: <br>';
					print_r($_GET);
				}
			?>
		</pre>
	</body>
</html>