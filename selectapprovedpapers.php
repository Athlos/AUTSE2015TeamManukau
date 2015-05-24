<!DOCTYPE html>

<html>

<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Select unapproved papers</title>
<h1>Select unapproved papers</h1>
</head>

<body>
	<?php
		include("DatabaseLogin.php");
		$query = "Select * from unapproved_papers";
		$results = mysqli_query($conn,$query);

		echo "<table wdith ='100%' border = '1'>";
		echo "<tr>
		<th>Paper Name</th>
		<th>Submission Date</th>
		<th>Submitted by</th>
		<th>Paper URL</th>
		<th>Select for meta data</th></tr>";
		$row = mysqli_fetch_assoc($results);
		while($row)
		{
			$name = $row['paper_name'];
			echo "<tr><td>{$row['paper_name']}</td>";
			echo "<td>{$row['Submission_Date']}</td>";
			echo "<td>{$row['Submitted_By']}</td>";
			echo "<td>{$row['Paper_URL']}</td>";
	?>
			<td>
			<form action="Papermetadataform/papermetadataform.php" method = "GET">
			<input type="hidden" name="selected_paper_name" value="<?php echo $name ?>">
			<input type="submit" value="Add Meta-data">
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
</body>

</html> 