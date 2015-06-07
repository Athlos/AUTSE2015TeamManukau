<html>
<head>
	<meta http-equiv="content-type" content = "text/html; charset=utf-8"/>
	<title>Add Paper</title>
</head>
<body>
	<?php
		
		//Now we connect to the database, using the default login of 127.0.0.1 (which is localhost), root (default user), '' (default password is blank), 'test' (directory with out databases)
		//this will throw an exception if the connection fails, if that is the case, please check you have your database in the right folder
		
		include("DatabaseLogin.php");
	
		//create approved papers list
		$query = "CREATE TABLE IF NOT EXISTS `approved_papers` (
				  `paper_name` varchar(255) NOT NULL,
				  `Submission_Date` datetime NOT NULL,
				  PRIMARY KEY (`paper_name`),
				  UNIQUE KEY `paper_name` (`paper_name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		//will print only if the approved papers list cannot be created
		if ($conn->query($query) === FALSE)
		echo "approved papers list failed to create";
		
		$query ="CREATE TABLE IF NOT EXISTS `paper_bibliography_info` (
				  `paper_name_bibliography` varchar(255) NOT NULL,
				  `paper_author` varchar(255) NOT NULL,
				  `paper_year` year NOT NULL,
				  `paper_journal_name` varchar(255) NOT NULL,
				  PRIMARY KEY (`paper_name_bibliography`),
				  CONSTRAINT `paper_bibliography_info_approved_papers` FOREIGN KEY (`paper_name_bibliography`) REFERENCES `approved_papers` (`paper_name`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		if ($conn->query($query) === FALSE)
		echo "paper bibliography list failed to create";
		
		$query ="CREATE TABLE IF NOT EXISTS `paper_rating` (
				  `paper_rating_date` datetime NOT NULL,
				  `paper_name` varchar(255) NOT NULL,
				  `paper_credibility_level` int(1) NOT NULL,
				  `paper_credibility_reason` varchar(255) NOT NULL,
				  `paper_confidence_level` int(1) NOT NULL,
				  `paper_confidence_reason` varchar(12) NOT NULL,
				  `rater` varchar(255) NOT NULL,
				  `paper_average_credibility` float DEFAULT NULL,
				  `paper_average_confidence` float DEFAULT NULL,
				  PRIMARY KEY (`paper_rating_date`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		if ($conn->query($query) === FALSE)
		echo "paper rating list failed to create";
		
		$query ="CREATE TABLE IF NOT EXISTS `paper_evidence_source_and_item` (
				  `paper_name_evidence` varchar(255) NOT NULL,
				  `paper_evidence_source_research_level` varchar(255) NOT NULL,
				  `paper_evidence_benefit_outcomes` varchar(255) NOT NULL,
				  `paper_evidence_result` varchar(255) NOT NULL,
				  `paper_evidence_method_implemention_integrity` varchar(255) NOT NULL,
				  PRIMARY KEY (`paper_name_evidence`),
				  CONSTRAINT `approved_papers_paper_evidence_source_and_item` FOREIGN KEY (`paper_name_evidence`) REFERENCES `approved_papers` (`paper_name`) ON DELETE CASCADE ON UPDATE CASCADE
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		if ($conn->query($query) === FALSE)
		echo "paper evidence source and item list failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `paper_context` (
				  `paper_name_context` varchar(255) NOT NULL,
				  `paper_context_who` varchar(255) NOT NULL,
				  `paper_context_what` varchar(255) NOT NULL,
				  `paper_context_when` varchar(255) NOT NULL,
				  `paper_context_where` varchar(255) NOT NULL,
				  `paper_context_why` varchar(255) NOT NULL,
				  `paper_context_how` varchar(255) NOT NULL,
				  PRIMARY KEY (`paper_name_context`)
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		if ($conn->query($query) === FALSE)
		echo "paper context list failed to create";
	
		$query ="CREATE TABLE IF NOT EXISTS `paper_methodology_and_method` (
				  `paper_name_method` varchar(255) NOT NULL,
				  `paper_methodology_name` varchar(255) NOT NULL,
				  `paper_methodology_description` varchar(255) NOT NULL,
				  `paper_practice_name` varchar(255) NOT NULL,
				  `paper_practice_description` varchar(255) NOT NULL,
				  PRIMARY KEY (`paper_name_method`),
				  CONSTRAINT `approved_papers_paper_methodology_and_method` FOREIGN KEY (`paper_name_method`) REFERENCES `approved_papers` (`paper_name`) ON DELETE CASCADE ON UPDATE CASCADE
				) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		if ($conn->query($query) === FALSE)
		echo "paper methodology and method List failed to create";
		
		$query = "CREATE TABLE IF NOT EXISTS `paper_research` (
			  `paper_name_research` varchar(255) NOT NULL,
			  `paper_research_question` varchar(255) NOT NULL,
			  `paper_research_method` varchar(255) NOT NULL,
			  `paper_research_metrics` varchar(255) NOT NULL,
			  `paper_research_participants` varchar(255) NOT NULL,
			  PRIMARY KEY (`paper_name_research`),
			  CONSTRAINT `approved_papers_paper_research` FOREIGN KEY (`paper_name_research`) REFERENCES `approved_papers` (`paper_name`) ON DELETE CASCADE ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
				
		//This executes the string we have made, and returns if it was able to be executed
		if ($conn->query($query) === FALSE)
		echo "paper research list failed to create";
		
		//now we close the database
		mysqli_close($conn);
		
		
	?>
</body>
</html>