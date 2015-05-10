-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2015 at 09:01 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `papers_awaiting_moderation`
--

CREATE TABLE IF NOT EXISTS `papers_awaiting_moderation` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `papers_awaiting_moderation`
--

INSERT INTO `papers_awaiting_moderation` (`Submission_Date`, `Submitted_By`, `Paper_URL`) VALUES
('2015-05-01 13:42:19', 'Nathan', 'www.articlebynathan.com'),
('2015-05-05 07:12:07', 'John', 'www.articlebyjohn.com'),
('2015-05-06 06:10:15', 'Lilly', 'www.articlebylilly.com'),
('2015-05-06 07:12:10', 'Julie', 'www.articlebyjulie.com'),
('2015-05-12 00:00:00', 'Jan', 'www.articlebyjan.com'),
('2015-05-12 07:13:09', 'Nillz', 'www.articlebynillz.com'),
('2015-05-13 04:11:45', 'Jason', 'www.articlebyjason.com'),
('2015-05-20 09:17:10', 'Lu', 'www.articlebylu.com');

-- --------------------------------------------------------

--
-- Table structure for table `papers_awaiting_removal`
--

CREATE TABLE IF NOT EXISTS `papers_awaiting_removal` (
  `Submission_Date` datetime NOT NULL,
  `Submitted_By` varchar(255) NOT NULL DEFAULT '0',
  `Paper_URL` varchar(255) NOT NULL DEFAULT '0',
  `Comment` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `papers_awaiting_moderation`
--
ALTER TABLE `papers_awaiting_moderation`
 ADD PRIMARY KEY (`Submission_Date`);

--
-- Indexes for table `papers_awaiting_removal`
--
ALTER TABLE `papers_awaiting_removal`
 ADD PRIMARY KEY (`Submission_Date`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
