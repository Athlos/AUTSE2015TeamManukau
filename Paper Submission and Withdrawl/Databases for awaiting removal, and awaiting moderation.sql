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

-- Dumping structure for table test.papers_awaiting_moderation
CREATE TABLE IF NOT EXISTS `papers_awaiting_moderation` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Submission_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table test.papers_awaiting_moderation: ~0 rows (approximately)
/*!40000 ALTER TABLE `papers_awaiting_moderation` DISABLE KEYS */;
/*!40000 ALTER TABLE `papers_awaiting_moderation` ENABLE KEYS */;


-- Dumping structure for table test.papers_awaiting_removal
CREATE TABLE IF NOT EXISTS `papers_awaiting_removal` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  `Comment` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Submission_Date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table test.papers_awaiting_removal: ~0 rows (approximately)
/*!40000 ALTER TABLE `papers_awaiting_removal` DISABLE KEYS */;
/*!40000 ALTER TABLE `papers_awaiting_removal` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
