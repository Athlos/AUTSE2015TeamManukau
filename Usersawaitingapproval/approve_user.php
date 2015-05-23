<html>
	<head>
	</head>
	<body>
		<?php
			$user_email = "";
			$user_password = "";
			if($_GET["approve_user"])
			{
				$user_name = $_GET["approve_user"];
			}
			else
			{
				echo "something went wrong here...";
			}
			//connect to database
			include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
			$gatherUserInfo = "SELECT * FROM unapproved_user_accounts WHERE user_name = '$user_name'";
			$result = mysqli_query($conn, $gatherUserInfo)
			or die("cannot gather info of the user....");
			$row = mysqli_fetch_row($result);
			while($row)
			{
				$addToApproveUser = "INSERT INTO approved_user_accounts (user_name, user_email, user_password) VALUES('$user_name', '$row[1]', '$row[2]')";
				$row = mysqli_fetch_row($result);
			}
			$result = mysqli_query($conn, $addToApproveUser)
			or die("Could not add user into the approved users table");
			
			$removeApprovedUser = "DELETE FROM unapproved_user_accounts WHERE user_name = '$user_name'";
			
			
			$result = mysqli_query($conn, $removeApprovedUser)
			or die("Could not remove user info from unapproved_user_accounts");
			echo "if nothing printed before this then user account was accepted and was moved to approved users and deleted from unapproved_user_accounts<br>";
		?>
		<a href="http://localhost/AUTSE2015TeamManukau/">Go Back</a><br>
	</body>
</html>