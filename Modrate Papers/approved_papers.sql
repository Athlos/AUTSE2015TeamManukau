-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2015 at 03:39 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_papers`
--

CREATE TABLE IF NOT EXISTS `approved_papers` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  `Comment` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `approved_papers`
--

INSERT INTO `approved_papers` (`Submission_Date`, `Submitted_By`, `Paper_URL`, `Comment`) VALUES
('2015-05-04 02:08:14', 'Lolo', 'http://amd.aom.org/content/1/1/56.full', 'Organizational Identity and Culture in the Context of Managed Change: Transformation in the Carlsberg Group, 2009–2013'),
('2015-05-09 01:08:16', 'Jerry', 'http://amd.aom.org/content/1/1/1.full', 'Welcome to the Academy of Management Discoveries (AMD)'),
('2015-05-26 06:12:18', 'Tony', 'http://amd.aom.org/content/1/1/35.full', 'How “Organization” Can Weaken the Norm of Reciprocity: The Effects of Attributions for Favors and a Calculative Mindset'),
('2015-05-27 05:10:19', 'John', 'http://abbs.oxfordjournals.org/content/47/5/315.full', 'Emerging roles for PIWI proteins in cancer'),
('2015-05-27 10:03:19', 'Julie', 'http://amd.aom.org/content/1/1/88.full', '\r\n\r\nThe Team Descriptive Index (TDI): A Multidimensional Scaling Approach for Team Description');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_papers`
--
ALTER TABLE `approved_papers`
  ADD PRIMARY KEY (`Submission_Date`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
