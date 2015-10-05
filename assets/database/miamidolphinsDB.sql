-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2015 at 06:44 AM
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
(1, 'MIA', 'Miami Dolphins', 'American Football Conference', 'AFC East', 'MIA_logo-80x90.gif'),
(2, 'NE', 'New England Patriots', 'American Football Conference', 'AFC East', 'NE_logo-80x90.gif'),
(3, 'NYJ', 'New York Jets', 'American Football Conference', 'AFC East', 'NYJ_logo-80x90.gif'),
(4, 'BUF', 'Buffalo Bills', 'American Football Conference', 'AFC East', 'BUF_logo-80x90.gif'),
(5, 'CIN', 'Cincinnati Bengals', 'American Football Conference', 'AFC North', 'CIN_logo-80x90.gif'),
(6, 'PIT', 'Pittsburgh Steelers', 'American Football Conference', 'AFC North', 'PIT_logo-80x90.gif'),
(7, 'CLE', 'Cleveland Browns', 'American Football Conference', 'AFC North', 'CLE_logo-80x90.gif'),
(8, 'BAL', 'Baltimore Ravens', 'American Football Conference', 'AFC North', 'BAL_logo-80x90.gif'),
(9, 'IND', 'Indianapolis Colts', 'American Football Conference', 'AFC South Team', 'IND_logo-80x90.gif'),
(10, 'JAC', 'Jacksonville Jaguars', 'American Football Conference', 'AFC South Team', 'JAC_logo-80x90.gif'),
(11, 'HOU', 'Houston Texans', 'American Football Conference', 'AFC South Team', 'HOU_logo-80x90.gif'),
(12, 'TEN', 'Tennessee Titans', 'American Football Conference', 'AFC South Team', 'TEN_logo-80x90.gif'),
(13, 'DEN', 'Denver Broncos', 'American Football Conference', 'AFC West Team', 'DEN_logo-80x90.gif'),
(14, 'OAK', 'Oakland Raiders', 'American Football Conference', 'AFC West Team', 'OAK_logo-80x90.gif'),
(15, 'SD', 'San Diego Chargers', 'American Football Conference', 'AFC West Team', 'SD_logo-80x90.gif'),
(16, 'KC', 'Kansas City Chiefs', 'American Football Conference', 'AFC West Team', 'KC_logo-80x90.gif'),
(17, 'DAL', 'Dallas Cowboys', 'National Football Conference', 'NFC East Team', 'DAL_logo-80x90.gif'),
(18, 'NYG', 'New York Giants', 'National Football Conference', 'NFC East Team', 'NYG_logo-80x90.gif'),
(19, 'WAS', 'Washington Redskins', 'National Football Conference', 'NFC East Team', 'WAS_logo-80x90.gif'),
(20, 'PHI', 'Philadelphia Eagles', 'National Football Conference', 'NFC East Team', 'PHI_logo-80x90.gif'),
(21, 'GB', 'Green Bay Packers', 'National Football Conference', 'NFC North Team', 'GB_logo-80x90.gif'),
(22, 'MIN', 'Minnesota Vikings', 'National Football Conference', 'NFC North Team', 'MIN_logo-80x90.gif'),
(23, 'DET', 'Detroit Lions', 'National Football Conference', 'NFC North Team', 'DET_logo-80x90.gif'),
(24, 'CHI', 'Chicago Bears', 'National Football Conference', 'NFC North Team', 'CHI_logo-80x90.gif'),
(25, 'CAR', 'Carolina Panthers', 'National Football Conference', 'NFC South Team', 'CAR_logo-80x90.gif'),
(26, 'ATL', 'Atlanta Falcons', 'National Football Conference', 'NFC South Team', 'ATL_logo-80x90.gif'),
(27, 'TB', 'Tampa Bay Buccaneers', 'National Football Conference', 'NFC South Team', 'TB_logo-80x90.gif'),
(28, 'NO', 'New Orleans Saints', 'National Football Conference', 'NFC South Team', 'NO_logo-80x90.gif'),
(29, 'ARI', 'Arizona Cardinals', 'National Football Conference', 'NFC West Team', 'ARI_logo-80x90.gif'),
(30, 'STL', 'St. Louis Rams', 'National Football Conference', 'NFC West Team', 'STL_logo-80x90.gif'),
(31, 'SF', 'San Francisco 49ers', 'National Football Conference', 'NFC West Team', 'SF_logo-80x90.gif'),
(32, 'SEA', 'Seattle Seahawks', 'National Football Conference', 'NFC West Team', 'SEA_logo-80x90.gif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
