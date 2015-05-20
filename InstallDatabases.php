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
		
		$query = "CREATE TABLE IF NOT EXISTS `approved_papers` (
				  `paper_name` varchar(255) NOT NULL,
				  `Submission_Date` datetime NOT NULL,
				  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
				  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
				  PRIMARY KEY (`paper_name`),
				  UNIQUE KEY `paper_name` (`paper_name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "Approved Papers List failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `user_accounts` (
				  `user_name` varchar(12) NOT NULL,
				  `user_email` varchar(50) NOT NULL,
				  `user_password` varchar(12) NOT NULL,
				  `user_approved` tinyint(1) NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "Users to moderate List failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `paper_credibility_and_confidence_rating` (
				  `paper_name` varchar(255) NOT NULL,
				  `paper_credibility_level` int(5) NOT NULL,
				  `paper_credibility_reason` varchar(255) NOT NULL,
				  `paper_credibility_rater` varchar(12) NOT NULL,
				  `paper_confidence_level` int(5) NOT NULL,
				  `paper_confidence_reason` varchar(12) NOT NULL,
				  `paper_confidence_rater` varchar(255) NOT NULL,
				  UNIQUE KEY `paper_name` (`paper_name`),
				  CONSTRAINT `paper_credibility_and_confidence_rating_ibfk_1` FOREIGN KEY (`paper_name`) REFERENCES `approved_papers` (`paper_name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "paper credibility and confidence rating List failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `paper_evidence_source_and_item` (
				  `paper_name` varchar(255) NOT NULL,
				  `paper_evidence_source_bibliography_references` varchar(255) NOT NULL,
				  `paper_evidence_source_research_level` varchar(255) NOT NULL,
				  `paper_evidence_context` varchar(255) NOT NULL,
				  `paper_evidence_benefit_outcomes` varchar(255) NOT NULL,
				  `paper_evidence_result` varchar(255) NOT NULL,
				  `paper_evidence_method_implemention_integrity` varchar(255) NOT NULL,
				  UNIQUE KEY `paper_name` (`paper_name`),
				  CONSTRAINT `paper_evidence_source_and_item_ibfk_1` FOREIGN KEY (`paper_name`) REFERENCES `approved_papers` (`paper_name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "paper evidence source and item List failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `paper_methodology_and_method` (
				  `paper_name` varchar(255) NOT NULL,
				  `paper_methodology_name` varchar(255) NOT NULL,
				  `paper_methodology_description` varchar(255) NOT NULL,
				  `paper_method_name` varchar(255) NOT NULL,
				  `paper_method_description` varchar(255) NOT NULL,
				  UNIQUE KEY `paper_name` (`paper_name`),
				  CONSTRAINT `paper_methodology_and_method_ibfk_1` FOREIGN KEY (`paper_name`) REFERENCES `approved_papers` (`paper_name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "paper methodology and method List failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `paper_research` (
				  `paper_name` varchar(255) NOT NULL,
				  `paper_research_question` varchar(255) NOT NULL,
				  `paper_research_method` varchar(255) NOT NULL,
				  `paper_research_metrics` varchar(255) NOT NULL,
				  `paper_research_participants` varchar(255) NOT NULL,
				  UNIQUE KEY `paper_name` (`paper_name`),
				  CONSTRAINT `paper_name` FOREIGN KEY (`paper_name`) REFERENCES `approved_papers` (`paper_name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "paper research List failed to create";
	
		//now we close the database
		mysqli_close($conn);
		
		
	?>
</body>
</html>