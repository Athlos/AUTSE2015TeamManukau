<html>
	<head>
	</head>
	<body>
		<h1>Creating Account</h1>
		<php?
		
			//this will create an account based on the username, password and email entered into the form
			//will later add checks to see if the password matches by adding another table to fill out
			//and matching them together will try comparing strings for now
			$maxLengthUserName = 12;
			$minLengthUserName = 6;
			$maxLengthPassword = 12;
			$minLengthPassword = 6;
			
			$temp_user_name;
			$temp_email;
			$temp_password;
			$temp_password2;
			$user_name;
			$email;
			$password;
			$temp_password2;
			
			//user name check, a check is made sure that the user name is of sufficient length otherwise
			//it is not submitted
			if(isset ($_GET["user_name"]))
			{
				$temp_user_name = $_GET["user_name"];
				if(strlen($temp_user_name) >= $minLengthUserName && strlen($temp_user_name) <= $maxLengthUserName)
				{
					if($)
					$user_name = $temp_user_name;
				}
			}
			else
			{
				echo "username is either too short or long";
			}
			
			//email is check to make sure it includes the @ symbol more checks will be done in the future to
			//verify that it is sufficient/valid
			
			if(isset ($_GET["email"]))
			{
				$temp_email = $_GET["email"];
				if(strpos($temp_email) !== false)
				{
					$email == $temp_email
				}
			}
			else
			{
				echo "this email does not contain the @, so it may not be a valid email";
			}
			
			//password check, a check is made sure that the password is of sufficient length otherwise
			//it is not submitted, it also checks to make sure the passwords entered are both exactly the same
			if(isset ($_GET["password"]))
			{
				$temp_password = $_GET["password"];
				$temp_password2 = $_GET["passwordcheck"];
				if(strlen($temp_password) >= $minLengthPassword  && strlen($temp_password) <= $maxLengthPassword 
					&& $temp_password === $temp_password2)
				{
					$password = $temp_password;
				}
			}
			else
			{
				echo "password is either too short or long or the re-entered password is not the same";
			}
			//connect to the database
			$conn = @mysqli_connect('127.0.0.1','root','', 'test')
			or die('Failed to connect to server');
			
			//insert data into the database
			$query = "INSERT INTO users_awaiting_confirmation(Submission_Date, Submitted_By, Paper_URL)
			VALUES ('user_name','email', 'password')"
		?>
	</body>
</html>