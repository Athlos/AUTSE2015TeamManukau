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
  `Comment` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paper_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.


-- Dumping structure for table test.papers_awaiting_moderation
CREATE TABLE IF NOT EXISTS `papers_awaiting_moderation` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Submission_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.papers_awaiting_removal
CREATE TABLE IF NOT EXISTS `papers_awaiting_removal` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  `Comment` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Submission_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_credibility_and_confidence_rating
CREATE TABLE IF NOT EXISTS `paper_credibility_and_confidence_rating` (
  `paper_name` varchar(255) NOT NULL,
  `paper_credibility_level` int(5) NOT NULL,
  `paper_credibility_reason` varchar(255) NOT NULL,
  `paper_credibility_rater` varchar(12) NOT NULL,
  `paper_confidence_level` int(5) NOT NULL,
  `paper_confidence_reason` varchar(12) NOT NULL,
  `paper_confidence_rater` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_evidence_source_and_item
CREATE TABLE IF NOT EXISTS `paper_evidence_source_and_item` (
  `paper_name` varchar(255) NOT NULL,
  `paper_evidence_source_bibliography_references` varchar(255) NOT NULL,
  `paper_evidence_source_research_level` varchar(255) NOT NULL,
  `paper_evidence_context` varchar(255) NOT NULL,
  `paper_evidence_context_benefit_outcomes` varchar(255) NOT NULL,
  `paper_evidence_context_result` varchar(255) NOT NULL,
  `paper_evidence_context_method_implemention_integrity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_methodology_and_method
CREATE TABLE IF NOT EXISTS `paper_methodology_and_method` (
  `paper_name` varchar(255) NOT NULL,
  `paper_methodology_name` int(11) NOT NULL,
  `paper_methodology_description` int(11) NOT NULL,
  `paper_method_name` int(11) NOT NULL,
  `paper_method_description` int(11) NOT NULL,
  PRIMARY KEY (`paper_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table test.users_awaiting_moderation
CREATE TABLE IF NOT EXISTS `users_awaiting_moderation` (
  `user_name` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
