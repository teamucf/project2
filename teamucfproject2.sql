-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2012 at 07:19 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teamucfproject2`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `candidate_name` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `candidate_description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `total_votes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_name`, `id`, `candidate_description`, `image_url`, `total_votes`) VALUES
('Woody Woodpecker', 1, 'He''s a funny bird', 'http://3.bp.blogspot.com/-1iReHyX9MmI/TcU8y7sUWvI/AAAAAAAABWQ/FCRMs9FXEd4/s1600/how-to-draw-woody-woodpecker.jpg', 0),
('Betty Boop', 2, 'Sexy and sassy', 'http://www.bettyboopfancruise.com/graphics/betty.jpg', 0),
('Bugs Bunny', 3, 'What''s up doc?', 'http://2.bp.blogspot.com/-yg6QiyMoltQ/TeRmlbfsDnI/AAAAAAAAC2I/W47MVIBWuQk/s1600/bugs_bunny+%25284%2529.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `voter_id` int(11) NOT NULL,
  `has_voted` tinyint(1) NOT NULL,
  `voted_for` int(11) NOT NULL,
  PRIMARY KEY (`voter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voter_id`, `has_voted`, `voted_for`) VALUES
(1001, 0, 0),
(1002, 0, 0),
(1003, 0, 0),
(1004, 0, 0),
(1005, 0, 0),
(1006, 0, 0),
(1007, 0, 0),
(1008, 0, 0),
(1009, 0, 0),
(1010, 0, 0),
(1011, 0, 0),
(1012, 0, 0),
(1013, 0, 0),
(1014, 0, 0),
(1015, 0, 0),
(1016, 0, 0),
(1017, 0, 0),
(1018, 0, 0),
(1019, 0, 0),
(1020, 0, 0),
(1021, 0, 0),
(1022, 0, 0),
(1023, 0, 0),
(1024, 0, 0),
(1025, 0, 0),
(1026, 0, 0),
(1027, 0, 0),
(1028, 0, 0),
(1029, 0, 0),
(1030, 0, 0),
(1031, 0, 0),
(1032, 0, 0),
(1033, 0, 0),
(1034, 0, 0),
(1035, 0, 0),
(1036, 0, 0),
(1037, 0, 0),
(1038, 0, 0),
(1039, 0, 0),
(1040, 0, 0),
(1041, 0, 0),
(1042, 0, 0),
(1043, 0, 0),
(1044, 0, 0),
(1045, 0, 0),
(1046, 0, 0),
(1047, 0, 0),
(1048, 0, 0),
(1049, 0, 0);
