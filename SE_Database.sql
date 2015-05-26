-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;


-- Dumping structure for table test.approved_papers
CREATE TABLE IF NOT EXISTS `approved_papers` (
  `paper_name` varchar(255) NOT NULL,
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_name`),
  UNIQUE KEY `paper_name` (`paper_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.approved_user_accounts
CREATE TABLE IF NOT EXISTS `approved_user_accounts` (
  `user_name` varchar(12) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(12) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.papers_awaiting_removal
CREATE TABLE IF NOT EXISTS `papers_awaiting_removal` (
  `paper_name_removal` varchar(255) NOT NULL,
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  `Comment` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_name_removal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_bibliography_info
CREATE TABLE IF NOT EXISTS `paper_bibliography_info` (
  `paper_name_bibliography` varchar(255) NOT NULL,
  `paper_author` varchar(255) NOT NULL,
  `paper_year` datetime NOT NULL,
  `paper_journal_name` varchar(255) NOT NULL,
  PRIMARY KEY (`paper_name_bibliography`),
  CONSTRAINT `paper_bibliography_info_approved_papers` FOREIGN KEY (`paper_name_bibliography`) REFERENCES `approved_papers` (`paper_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_evidence_source_and_item
CREATE TABLE IF NOT EXISTS `paper_evidence_source_and_item` (
  `paper_name_evidence` varchar(255) NOT NULL,
  `paper_evidence_source_research_level` varchar(255) NOT NULL,
  `paper_evidence_context` varchar(255) NOT NULL,
  `paper_evidence_benefit_outcomes` varchar(255) NOT NULL,
  `paper_evidence_result` varchar(255) NOT NULL,
  `paper_evidence_method_implemention_integrity` varchar(255) NOT NULL,
  PRIMARY KEY (`paper_name_evidence`),
  CONSTRAINT `approved_papers_paper_evidence_source_and_item` FOREIGN KEY (`paper_name_evidence`) REFERENCES `approved_papers` (`paper_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_methodology_and_method
CREATE TABLE IF NOT EXISTS `paper_methodology_and_method` (
  `paper_name_method` varchar(255) NOT NULL,
  `paper_methodology_name` varchar(255) NOT NULL,
  `paper_methodology_description` varchar(255) NOT NULL,
  `paper_method_name` varchar(255) NOT NULL,
  `paper_method_description` varchar(255) NOT NULL,
  PRIMARY KEY (`paper_name_method`),
  CONSTRAINT `approved_papers_paper_methodology_and_method` FOREIGN KEY (`paper_name_method`) REFERENCES `approved_papers` (`paper_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_rating
CREATE TABLE IF NOT EXISTS `paper_rating` (
  `paper_rating_date` datetime NOT NULL,
  `paper_name` varchar(255) NOT NULL,
  `paper_name_rating` varchar(255) NOT NULL,
  `paper_credibility_level` int(1) NOT NULL,
  `paper_credibility_reason` varchar(255) NOT NULL,
  `paper_confidence_level` int(1) NOT NULL,
  `paper_confidence_reason` varchar(12) NOT NULL,
  `rater` varchar(255) NOT NULL,
  `paper_average_credibility` float DEFAULT NULL,
  `paper_average_confidence` float DEFAULT NULL,
  PRIMARY KEY (`paper_rating_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_research
CREATE TABLE IF NOT EXISTS `paper_research` (
  `paper_name_research` varchar(255) NOT NULL,
  `paper_research_question` varchar(255) NOT NULL,
  `paper_research_method` varchar(255) NOT NULL,
  `paper_research_metrics` varchar(255) NOT NULL,
  `paper_research_participants` varchar(255) NOT NULL,
  PRIMARY KEY (`paper_name_research`),
  CONSTRAINT `approved_papers_paper_research` FOREIGN KEY (`paper_name_research`) REFERENCES `approved_papers` (`paper_name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.submitted_papers
CREATE TABLE IF NOT EXISTS `submitted_papers` (
  `paper_name` varchar(255) NOT NULL,
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.unapproved_papers
CREATE TABLE IF NOT EXISTS `unapproved_papers` (
  `paper_name` varchar(255) NOT NULL,
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_name`),
  UNIQUE KEY `paper_name` (`paper_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.unapproved_user_accounts
CREATE TABLE IF NOT EXISTS `unapproved_user_accounts` (
  `user_name` varchar(12) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(12) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
