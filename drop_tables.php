<html>
	<head>
		<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	</head>
	<body>
		<?php
		//needed to connect to the database
		include("DatabaseLogin.php");
		//drops all the tables makes sure to drop all meta data tables first before the approved papers table...
		$query ="DROP TABLE IF EXISTS `approved_user_accounts`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop approved_user_accounts table";
		$query ="DROP TABLE IF EXISTS `papers_awaiting_removal`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop paper_awaiting_removal table";
		$query ="DROP TABLE IF EXISTS `paper_bibliography_info`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop paper_bibliography_info table";
		$query ="DROP TABLE IF EXISTS `paper_context`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop paper_context table";
		$query ="DROP TABLE IF EXISTS `paper_evidence_source_and_item`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop paper_evidence_source_and_item table";
		$query ="DROP TABLE IF EXISTS `paper_methodology_and_method`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop paper_methodology_and_method table";
		$query ="DROP TABLE IF EXISTS `paper_rating`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop paper_rating table";
		$query ="DROP TABLE IF EXISTS `paper_research`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop paper_research table";
		$query ="DROP TABLE IF EXISTS `submitted_papers`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop submitted papers table";
		$query ="DROP TABLE IF EXISTS `unapproved_papers`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop unapproved_papers table";
		$query ="DROP TABLE IF EXISTS `approved_papers`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop approved_papers table";
		$query = "DROP TABLE IF EXISTS `unapproved_user_accounts`;";
		if ($conn->query($query) === FALSE)
		echo "failed to drop unapproved_user_accounts table";
		//now we close the database
		mysqli_close($conn);
		?>
		<br><a href="http://localhost/AUTSE2015TeamManukau/">Go Back</a><br>
	</body>
</html>