<html>
	<head>
		<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
	</head>
	<body>
		<h1>Creating Account</h1>
		<?php
		
			//this will create an account based on the username, password and email entered into the form
			//will later add checks to see if the password matches by adding another table to fill out
			//and matching them together will try comparing strings for now
			$maxLengthUserName = 12;
			$minLengthUserName = 6;
			$maxLengthPassword = 12;
			$minLengthPassword = 6;
			
			$test_user_name = "";
			$test_email = "";
			$test_password = "";
			$test_passwordcheck = "";
			
			
			//user name check, a check is made sure that the user name is of sufficient length otherwise
			//it is not submitted
			if(isset ($_GET["test_user_name"]))
			{
				$test_user_name = $_GET["test_user_name"];
				if(strlen($test_user_name) >= $minLengthUserName && strlen($test_user_name) <= $maxLengthUserName)
				{
					$user_name = $test_user_name;
				}
				else
				{
					echo "Username is either too short or long.\r\n";
				}
			}
			else
			{
				echo "Username cannot be blank.\r\n";
			}
			
			//email is check to make sure it includes the @ symbol more checks will be done in the future to
			//verify that it is sufficient/valid
			
			if(isset ($_GET["test_email"]))
			{
				$test_email = $_GET["test_email"];
				if(strpos($test_email, '@') !== false)
				{
					$email = $test_email;
				}
				else
				{
					echo "Email is not valid without the @ symbol.\r\n";
				}
			}
			else
			{
				echo "Email cannot be empty.\r\n";
			}
			
			//password check, a check is made sure that the password is of sufficient length otherwise
			//it is not submitted, it also checks to make sure the passwords entered are both exactly the same
			if(isset ($_GET["test_password"]))
			{
				$test_password = $_GET["test_password"];
				$test_passwordcheck = $_GET["test_passwordcheck"];
				if(strlen($test_password) >= $minLengthPassword  && strlen($test_password) <= $maxLengthPassword 
					&& $test_password === $test_passwordcheck)
				{
					$password = $test_password;
				}
				else
				{
					echo "Password: $test_password is either too short or long or the re-entered password is not the same.\r\n";
				}
			}
			else
			{
				echo "Password cannot be blank.\r\n";
			}
			//connect to the database
			$conn = @mysqli_connect('127.0.0.1','root','','test')
			or die('Failed to connect to server');
			
			//insert data into the database
			if(isset($user_name) && isset($email) && isset($password)) {
			$query = "INSERT INTO users_awaiting_moderation
					(user_name, 
					email, 
					password)
			VALUES ('$user_name',
					'$email', 
					'$password')";
			//creates a string that displays if SQL query is successful or not
			if($conn->query($query) === TRUE)
			{
				echo "User Account successfully added to the database";
			}
			else 
			{
				echo "User Account failed to add to the database";
			}
			}
			//close connection
			mysqli_close($conn);
		?>
		<br>
		<a href="http://localhost/AUTSE2015TeamManukau/">Go Back</a><br>
	</body>
</html>