<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Add Paper</title>
</head>
<body>
	<?php
		
		//Now we connect to the database, using the default login of 127.0.0.1 (which is localhost), root (default user), '' (default password is blank), 'test' (directory with out databases)
		//this will throw an exception if the connection fails, if that is the case, please check you have your database in the right folder
		
		$conn = @mysqli_connect('127.0.0.1','root','', 'test')
		or die('Failed to connect to server');
	
		//create moderation list 
		$query = "CREATE TABLE IF NOT EXISTS `papers_awaiting_moderation` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Submission_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "Moderation List failed to create";
		
				$query = "CREATE TABLE IF NOT EXISTS `papers_awaiting_removal` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  `Comment` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Submission_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "Removal List failed to create";

		$query = "CREATE TABLE IF NOT EXISTS `paper_metadata` (
  `Submission_Date` datetime(6) NOT NULL,
  `methodology_name` varchar(50) NOT NULL,
  `methodology_description` varchar(100) NOT NULL,
  `method_name` varchar(50) NOT NULL,
  `method_description` varchar(100) NOT NULL,
  `biblography_ref` varchar(100) NOT NULL,
  `research_level` varchar(100) NOT NULL,
  `research_question` varchar(100) NOT NULL,
  `research_method` varchar(100) NOT NULL,
  `research_metrics` varchar(100) NOT NULL,
  `research_participants` varchar(100) NOT NULL,
  `evidence_context` varchar(100) NOT NULL,
  `benefit_outcome` varchar(100) NOT NULL,
  `result` varchar(100) NOT NULL,
  `method_implementation_integrity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "Metadata table failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `approved_papers` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  `Comment` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Submission_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "Approved Papers List failed to create";
		
		
		$query = "CREATE TABLE IF NOT EXISTS `users_awaiting_moderation` (
  `user_name` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "Users to moderate List failed to create";
		
		
		//now we close the database
		mysqli_close($conn);
		
		
	?>
</body>
</html>