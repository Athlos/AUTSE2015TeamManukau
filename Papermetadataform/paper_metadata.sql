-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2015 at 10:11 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
-- Table structure for table `paper_metadata`
--

CREATE TABLE IF NOT EXISTS `paper_metadata` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper_metadata`
--

INSERT INTO `paper_metadata` (`Submission_Date`, `methodology_name`, `methodology_description`, `method_name`, `method_description`, `biblography_ref`, `research_level`, `research_question`, `research_method`, `research_metrics`, `research_participants`, `evidence_context`, `benefit_outcome`, `result`, `method_implementation_integrity`) VALUES
('0000-00-00 00:00:00.000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paper_metadata`
--
ALTER TABLE `paper_metadata`
  ADD PRIMARY KEY (`Submission_Date`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
