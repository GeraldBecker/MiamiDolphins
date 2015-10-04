-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 06:01 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dolphins`
--
CREATE DATABASE IF NOT EXISTS `dolphins` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dolphins`;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TEAMCODE` varchar(3) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `CONFERENCE` varchar(50) NOT NULL,
  `DIVISION` varchar(50) NOT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`ID`, `TEAMCODE`, `NAME`, `CONFERENCE`, `DIVISION`, `IMAGE`) VALUES
(1, 'MIA', 'Miami Dolphins', 'American Football Conference', 'AFC East', NULL),
(2, 'NE', 'New England Patriots', 'American Football Conference', 'AFC East', NULL),
(3, 'NYJ', 'New York Jets', 'American Football Conference', 'AFC East', NULL),
(4, 'BUF', 'Buffalo Bills', 'American Football Conference', 'AFC East', NULL),
(5, 'CIN', 'Cincinnati Bengals', 'American Football Conference', 'AFC North', NULL),
(6, 'PIT', 'Pittsburgh Steelers', 'American Football Conference', 'AFC North', NULL),
(7, 'CLE', 'Cleveland Browns', 'American Football Conference', 'AFC North', NULL),
(8, 'BAL', 'Baltimore Ravens', 'American Football Conference', 'AFC North', NULL),
(9, 'IND', 'Indianapolis Colts', 'American Football Conference', 'AFC South Team', NULL),
(10, 'JAC', 'Jacksonville Jaguars', 'American Football Conference', 'AFC South Team', NULL),
(11, 'HOU', 'Houston Texans', 'American Football Conference', 'AFC South Team', NULL),
(12, 'TEN', 'Tennessee Titans', 'American Football Conference', 'AFC South Team', NULL),
(13, 'DEN', 'Denver Broncos', 'American Football Conference', 'AFC West Team', NULL),
(14, 'OAK', 'Oakland Raiders', 'American Football Conference', 'AFC West Team', NULL),
(15, 'SD', 'San Diego Chargers', 'American Football Conference', 'AFC West Team', NULL),
(16, 'KC', 'Kansas City Chiefs', 'American Football Conference', 'AFC West Team', NULL),
(17, 'DAL', 'Dallas Cowboys', 'National Football Conference', 'NFC East Team', NULL),
(18, 'NYG', 'New York Giants', 'National Football Conference', 'NFC East Team', NULL),
(19, 'WAS', 'Washington Redskins', 'National Football Conference', 'NFC East Team', NULL),
(20, 'PHI', 'Philadelphia Eagles', 'National Football Conference', 'NFC East Team', NULL),
(21, 'GB', 'Green Bay Packers', 'National Football Conference', 'NFC North Team', NULL),
(22, 'MIN', 'Minnesota Vikings', 'National Football Conference', 'NFC North Team', NULL),
(23, 'DET', 'Detroit Lions', 'National Football Conference', 'NFC North Team', NULL),
(24, 'CHI', 'Chicago Bears', 'National Football Conference', 'NFC North Team', NULL),
(25, 'CAR', 'Carolina Panthers', 'National Football Conference', 'NFC South Team', NULL),
(26, 'ATL', 'Atlanta Falcons', 'National Football Conference', 'NFC South Team', NULL),
(27, 'TB', 'Tampa Bay Buccaneers', 'National Football Conference', 'NFC South Team', NULL),
(28, 'NO', 'New Orleans Saints', 'National Football Conference', 'NFC South Team', NULL),
(29, 'ARI', 'Arizona Cardinals', 'National Football Conference', 'NFC West Team', NULL),
(30, 'STL', 'St. Louis Rams', 'National Football Conference', 'NFC West Team', NULL),
(31, 'SF', 'San Francisco 49ers', 'National Football Conference', 'NFC West Team', NULL),
(32, 'SEA', 'Seattle Seahawks', 'National Football Conference', 'NFC West Team', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
