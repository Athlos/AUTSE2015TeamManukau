-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2015 at 08:01 AM
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
('2015-05-01 13:42:19', 'Nathan', 'http://www.nytimes.com/1988/08/02/science/peripherals-on-programming.html'),
('2015-05-05 07:12:07', 'John', 'http://www.nytimes.com/interactive/2015/03/08/opinion/sunday/algorithm-human-quiz.html'),
('2015-05-06 06:10:15', 'Lilly', 'http://www.nytimes.com/2015/05/10/technology/a-dashboard-management-consultant.html?ref=technology'),
('2015-05-06 07:12:10', 'Julie', 'http://bits.blogs.nytimes.com/2015/05/06/oculus-to-ship-virtual-reality-headsets-in-early-2016/?rref=technology&module=Ribbon&version=origin&region=Header&action=click&contentCollection=Technology&pgtype=article'),
('2015-05-12 07:13:09', 'Nillz', 'http://www.nytimes.com/2015/05/08/business/uber-joins-the-bidding-for-here-nokias-digital-mapping-service.html?rref=technology&module=Ribbon&version=origin&region=Header&action=click&contentCollection=Technology&pgtype=article'),
('2015-05-13 04:11:45', 'Jason', 'http://www.nytimes.com/2015/05/07/technology/personaltech/relying-on-product-reviews-knowing-how-a-company-treats-its-customers-is-just-as-valuable.html?rref=technology&module=Ribbon&version=origin&region=Header&action=click&contentCollection=Technology&p'),
('2015-05-20 09:17:10', 'Lu', 'http://www.nytimes.com/2015/05/07/technology/personaltech/snapping-the-windows-screen.html?rref=technology&module=Ribbon&version=origin&region=Header&action=click&contentCollection=Technology&pgtype=article'),
('2015-05-27 05:14:22', 'Judy', 'http://topics.nytimes.com/top/news/science/topics/science_and_technology/index.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `papers_awaiting_moderation`
--
ALTER TABLE `papers_awaiting_moderation`
 ADD PRIMARY KEY (`Submission_Date`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
