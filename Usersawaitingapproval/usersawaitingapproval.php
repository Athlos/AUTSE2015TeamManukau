<html>
<head>
	<meta http-equiv="content-type" context = "text/html; charset=utf-8"/>
</head>
<body>
<h1>Show User accounts awaiting approval</h1>
<?php
	
	//This file will log you into the database automatically
	include(dirname(__DIR__)."/../AUTSE2015TeamManukau/DatabaseLogin.php");
		
		$query = "SELECT * FROM unapproved_user_accounts";
		$results = mysqli_query($conn, $query);
		echo "<table width ='100%' border = '1'>
		<tr>
			<th>User Name</th>
			<th>Email</th>
			<th>Approve User</th>
		</tr>";
		$row = mysqli_fetch_assoc($results);
		while($row)
		{
			$user_name = $row['user_name'];
			echo "<tr><td>{$row['user_name']}</td>";
			echo "<td>{$row['user_email']}</td>"
		
?>
	<td>
		<form action="approve_user.php" method = "GET">
		<input type = "hidden" name="approve_user" value ="<?php echo $user_name?>">
		<input type="submit" value="Approve User">
		</form>
	</td>
<?php
			$row = mysqli_fetch_assoc($results);
		}
	echo "</tr>";
	mysqli_free_result($results);
	mysqli_close($conn);
	
?>
	</table>
<!-- not sure if i should delete this<input type="checkbox" name="permlike" value="like">Approve<br>-->

<a href="http://localhost/AUTSE2015TeamManukau/">Go Back</a><br>

</body>
</html>