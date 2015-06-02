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
DROP DATABASE IF EXISTS `test`;
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;




-- Data exporting was unselected.


-- Dumping structure for table test.approved_user_accounts
DROP TABLE IF EXISTS `approved_user_accounts`;

-- Data exporting was unselected.


-- Dumping structure for table test.papers_awaiting_removal
DROP TABLE IF EXISTS `papers_awaiting_removal`;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_bibliography_info
DROP TABLE IF EXISTS `paper_bibliography_info`;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_context
DROP TABLE IF EXISTS `paper_context`;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_evidence_source_and_item
DROP TABLE IF EXISTS `paper_evidence_source_and_item`;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_methodology_and_method
DROP TABLE IF EXISTS `paper_methodology_and_method`;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_rating
DROP TABLE IF EXISTS `paper_rating`;

-- Data exporting was unselected.


-- Dumping structure for table test.paper_research
DROP TABLE IF EXISTS `paper_research`;

-- Data exporting was unselected.


-- Dumping structure for table test.submitted_papers
DROP TABLE IF EXISTS `submitted_papers`;

-- Data exporting was unselected.


-- Dumping structure for table test.unapproved_papers
DROP TABLE IF EXISTS `unapproved_papers`;

-- Data exporting was unselected.


-- Dumping structure for table test.unapproved_user_accounts
DROP TABLE IF EXISTS `unapproved_user_accounts`;

-- Dumping structure for table test.approved_papers
DROP TABLE IF EXISTS `approved_papers`;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
