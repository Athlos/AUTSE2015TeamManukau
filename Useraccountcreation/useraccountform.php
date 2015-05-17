<html>
	<head>
		<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
	</head>
	<body>
		<!-- This form gets the standard information for a user, which includes username, email, and password -->
		<h1>User account creation</h1>
			<!-- changed from POST to GET method -->
			<form action = "useraccountcreation.php" method = "GET">
			User Name(between 6-12):<br>
			<input type="text" name="test_user_name" value="username">
			<br>
			E-mail(must include @):<br>
			<input type="text" name="test_email" value="test@test.com">
			<br>
			Password(between 6-12):<br>
			<!-- changed from test_password: to test_password-->
			<input type="password" name="test_password" value="password">
			<br>
			Re-enter Password:<br>
			<!-- changed from test_passwordcheck: to test_passwordcheck -->
			<input type="password" name="test_passwordcheck" value="password">
			<br>
			<input type="submit" value="Submit">
		</form>
		<a href="http://localhost/AUTSE2015TeamManukau/">Go Back</a><br>
	</body>
</html>