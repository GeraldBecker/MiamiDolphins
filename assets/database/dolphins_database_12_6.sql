-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 11:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dolphins`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_history`
--

DROP TABLE IF EXISTS `game_history`;
CREATE TABLE IF NOT EXISTS `game_history` (
  `HISTORYID` int(11) NOT NULL AUTO_INCREMENT,
  `HOMETEAMCODE` varchar(3) NOT NULL,
  `AWAYTEAMCODE` varchar(3) NOT NULL,
  `HOMESCORE` int(11) NOT NULL,
  `AWAYSCORE` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `SCOREENTRY` int(11) DEFAULT NULL,
  PRIMARY KEY (`HISTORYID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1164 ;

--
-- Dumping data for table `game_history`
--

INSERT INTO `game_history` (`HISTORYID`, `HOMETEAMCODE`, `AWAYTEAMCODE`, `HOMESCORE`, `AWAYSCORE`, `DATE`, `SCOREENTRY`) VALUES
(1019, 'NE', 'PIT', 28, 21, '2015-09-10', 1),
(1020, 'JAC', 'CAR', 9, 20, '2015-09-13', 2),
(1021, 'NYJ', 'CLE', 31, 10, '2015-09-13', 3),
(1022, 'CHI', 'GB', 23, 31, '2015-09-13', 4),
(1023, 'BUF', 'IND', 27, 14, '2015-09-13', 5),
(1024, 'HOU', 'KC', 20, 27, '2015-09-13', 6),
(1025, 'WAS', 'MIA', 10, 17, '2015-09-13', 7),
(1026, 'STL', 'SEA', 34, 31, '2015-09-13', 8),
(1027, 'SD', 'DET', 33, 28, '2015-09-13', 9),
(1028, 'ARI', 'NO', 31, 19, '2015-09-13', 10),
(1029, 'DEN', 'BAL', 19, 13, '2015-09-13', 11),
(1030, 'OAK', 'CIN', 13, 33, '2015-09-13', 12),
(1031, 'TB', 'TEN', 14, 42, '2015-09-13', 13),
(1032, 'DAL', 'NYG', 27, 26, '2015-09-13', 14),
(1033, 'ATL', 'PHI', 26, 24, '2015-09-14', 15),
(1034, 'SF', 'MIN', 20, 3, '2015-09-14', 16),
(1035, 'KC', 'DEN', 24, 31, '2015-09-17', 17),
(1036, 'CHI', 'ARI', 23, 48, '2015-09-20', 18),
(1037, 'NYG', 'ATL', 20, 24, '2015-09-20', 19),
(1038, 'MIN', 'DET', 26, 16, '2015-09-20', 20),
(1039, 'CAR', 'HOU', 24, 17, '2015-09-20', 21),
(1040, 'BUF', 'NE', 32, 40, '2015-09-20', 22),
(1041, 'CIN', 'SD', 24, 19, '2015-09-20', 23),
(1042, 'PIT', 'SF', 43, 18, '2015-09-20', 24),
(1043, 'WAS', 'STL', 24, 10, '2015-09-20', 25),
(1044, 'NO', 'TB', 19, 26, '2015-09-20', 26),
(1045, 'CLE', 'TEN', 28, 14, '2015-09-20', 27),
(1046, 'OAK', 'BAL', 37, 33, '2015-09-20', 28),
(1047, 'JAC', 'MIA', 23, 20, '2015-09-20', 29),
(1048, 'PHI', 'DAL', 10, 20, '2015-09-20', 30),
(1049, 'GB', 'SEA', 27, 17, '2015-09-20', 31),
(1050, 'IND', 'NYJ', 7, 20, '2015-09-21', 32),
(1051, 'NYG', 'WAS', 32, 21, '2015-09-24', 33),
(1052, 'DAL', 'ATL', 28, 39, '2015-09-27', 34),
(1053, 'BAL', 'CIN', 24, 28, '2015-09-27', 35),
(1054, 'TEN', 'IND', 33, 35, '2015-09-27', 36),
(1055, 'NE', 'JAC', 51, 17, '2015-09-27', 37),
(1056, 'CAR', 'NO', 27, 22, '2015-09-27', 38),
(1057, 'CLE', 'OAK', 20, 27, '2015-09-27', 39),
(1058, 'NYJ', 'PHI', 17, 24, '2015-09-27', 40),
(1059, 'STL', 'PIT', 6, 12, '2015-09-27', 41),
(1060, 'MIN', 'SD', 31, 14, '2015-09-27', 42),
(1061, 'HOU', 'TB', 19, 9, '2015-09-27', 43),
(1062, 'ARI', 'SF', 47, 7, '2015-09-27', 44),
(1063, 'MIA', 'BUF', 14, 41, '2015-09-27', 45),
(1064, 'SEA', 'CHI', 26, 0, '2015-09-27', 46),
(1065, 'DET', 'DEN', 12, 24, '2015-09-27', 47),
(1066, 'GB', 'KC', 38, 28, '2015-09-28', 48),
(1067, 'PIT', 'BAL', 20, 23, '2015-10-01', 49),
(1068, 'MIA', 'NYJ', 14, 27, '2015-10-04', 50),
(1069, 'TB', 'CAR', 23, 37, '2015-10-04', 51),
(1070, 'ATL', 'HOU', 48, 21, '2015-10-04', 52),
(1071, 'IND', 'JAC', 16, 13, '2015-10-04', 53),
(1072, 'CIN', 'KC', 36, 21, '2015-10-04', 54),
(1073, 'BUF', 'NYG', 10, 24, '2015-10-04', 55),
(1074, 'CHI', 'OAK', 22, 20, '2015-10-04', 56),
(1075, 'WAS', 'PHI', 23, 20, '2015-10-04', 57),
(1076, 'SD', 'CLE', 30, 27, '2015-10-04', 58),
(1077, 'SF', 'GB', 3, 17, '2015-10-04', 59),
(1078, 'DEN', 'MIN', 23, 20, '2015-10-04', 60),
(1079, 'ARI', 'STL', 22, 24, '2015-10-04', 61),
(1080, 'NO', 'DAL', 26, 20, '2015-10-04', 62),
(1081, 'SEA', 'DET', 13, 10, '2015-10-05', 63),
(1082, 'HOU', 'IND', 20, 27, '2015-10-08', 64),
(1083, 'TEN', 'BUF', 13, 14, '2015-10-11', 65),
(1084, 'KC', 'CHI', 17, 18, '2015-10-11', 66),
(1085, 'BAL', 'CLE', 30, 33, '2015-10-11', 67),
(1086, 'TB', 'JAC', 38, 31, '2015-10-11', 68),
(1087, 'PHI', 'NO', 39, 17, '2015-10-11', 69),
(1088, 'CIN', 'SEA', 27, 24, '2015-10-11', 70),
(1089, 'GB', 'STL', 24, 10, '2015-10-11', 71),
(1090, 'ATL', 'WAS', 25, 19, '2015-10-11', 72),
(1091, 'DET', 'ARI', 17, 42, '2015-10-11', 73),
(1092, 'OAK', 'DEN', 10, 16, '2015-10-11', 74),
(1093, 'DAL', 'NE', 6, 30, '2015-10-11', 75),
(1094, 'NYG', 'SF', 30, 27, '2015-10-11', 76),
(1095, 'SD', 'PIT', 20, 24, '2015-10-12', 77),
(1096, 'NO', 'ATL', 31, 21, '2015-10-15', 78),
(1097, 'PIT', 'ARI', 25, 13, '2015-10-18', 79),
(1098, 'DET', 'CHI', 37, 34, '2015-10-18', 80),
(1099, 'BUF', 'CIN', 21, 34, '2015-10-18', 81),
(1100, 'CLE', 'DEN', 23, 26, '2015-10-18', 82),
(1101, 'JAC', 'HOU', 20, 31, '2015-10-18', 83),
(1102, 'MIN', 'KC', 16, 10, '2015-10-18', 84),
(1103, 'TEN', 'MIA', 10, 38, '2015-10-18', 85),
(1104, 'NYJ', 'WAS', 34, 20, '2015-10-18', 86),
(1105, 'SEA', 'CAR', 23, 27, '2015-10-18', 87),
(1106, 'SF', 'BAL', 25, 20, '2015-10-18', 88),
(1107, 'GB', 'SD', 27, 20, '2015-10-18', 89),
(1108, 'IND', 'NE', 27, 34, '2015-10-18', 90),
(1109, 'PHI', 'NYG', 27, 7, '2015-10-19', 91),
(1110, 'SF', 'SEA', 3, 20, '2015-10-22', 92),
(1111, 'JAC', 'BUF', 34, 31, '2015-10-25', 93),
(1112, 'TEN', 'ATL', 7, 10, '2015-10-25', 94),
(1113, 'STL', 'CLE', 24, 6, '2015-10-25', 95),
(1114, 'MIA', 'HOU', 44, 26, '2015-10-25', 96),
(1115, 'DET', 'MIN', 19, 28, '2015-10-25', 97),
(1116, 'IND', 'NO', 21, 27, '2015-10-25', 98),
(1117, 'NE', 'NYJ', 30, 23, '2015-10-25', 99),
(1118, 'KC', 'PIT', 23, 13, '2015-10-25', 100),
(1119, 'WAS', 'TB', 31, 30, '2015-10-25', 101),
(1120, 'SD', 'OAK', 29, 37, '2015-10-25', 102),
(1121, 'NYG', 'DAL', 27, 20, '2015-10-25', 103),
(1122, 'CAR', 'PHI', 27, 16, '2015-10-25', 104),
(1123, 'ARI', 'BAL', 26, 18, '2015-10-26', 105),
(1124, 'NE', 'MIA', 36, 7, '2015-10-29', 106),
(1125, 'KC', 'DET', 45, 10, '2015-11-01', 107),
(1126, 'CLE', 'ARI', 20, 34, '2015-11-01', 108),
(1127, 'PIT', 'CIN', 10, 16, '2015-11-01', 109),
(1128, 'CHI', 'MIN', 20, 23, '2015-11-01', 110),
(1129, 'NO', 'NYG', 52, 49, '2015-11-01', 111),
(1130, 'BAL', 'SD', 29, 26, '2015-11-01', 112),
(1131, 'STL', 'SF', 27, 6, '2015-11-01', 113),
(1132, 'ATL', 'TB', 20, 23, '2015-11-01', 114),
(1133, 'HOU', 'TEN', 20, 6, '2015-11-01', 115),
(1134, 'OAK', 'NYJ', 34, 20, '2015-11-01', 116),
(1135, 'DAL', 'SEA', 12, 13, '2015-11-01', 117),
(1136, 'DEN', 'GB', 29, 10, '2015-11-01', 118),
(1137, 'CAR', 'IND', 29, 26, '2015-11-02', 119),
(1138, 'CIN', 'CLE', 31, 10, '2015-11-05', 120),
(1139, 'CAR', 'GB', 37, 29, '2015-11-08', 121),
(1140, 'NYJ', 'JAC', 28, 23, '2015-11-08', 122),
(1141, 'BUF', 'MIA', 33, 17, '2015-11-08', 123),
(1142, 'PIT', 'OAK', 38, 35, '2015-11-08', 124),
(1143, 'MIN', 'STL', 21, 18, '2015-11-08', 125),
(1144, 'NO', 'TEN', 28, 34, '2015-11-08', 126),
(1145, 'NE', 'WAS', 27, 10, '2015-11-08', 127),
(1146, 'SF', 'ATL', 17, 16, '2015-11-08', 128),
(1147, 'TB', 'NYG', 18, 32, '2015-11-08', 129),
(1148, 'IND', 'DEN', 27, 24, '2015-11-08', 130),
(1149, 'DAL', 'PHI', 27, 33, '2015-11-08', 131),
(1150, 'SD', 'CHI', 19, 22, '2015-11-09', 132),
(1151, 'NYJ', 'BUF', 17, 22, '2015-11-12', 133),
(1152, 'TEN', 'CAR', 10, 27, '2015-11-15', 134),
(1153, 'STL', 'CHI', 13, 37, '2015-11-15', 135),
(1154, 'PIT', 'CLE', 30, 9, '2015-11-15', 136),
(1155, 'TB', 'DAL', 10, 6, '2015-11-15', 137),
(1156, 'GB', 'DET', 16, 18, '2015-11-15', 138),
(1157, 'BAL', 'JAC', 20, 22, '2015-11-15', 139),
(1158, 'PHI', 'MIA', 19, 20, '2015-11-15', 140),
(1159, 'WAS', 'NO', 47, 14, '2015-11-15', 141),
(1160, 'OAK', 'MIN', 14, 30, '2015-11-15', 142),
(1161, 'DEN', 'KC', 13, 29, '2015-11-15', 143),
(1162, 'NYG', 'NE', 26, 27, '2015-11-15', 144),
(1163, 'SEA', 'ARI', 32, 39, '2015-11-15', 145);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `PLAYERID` int(11) NOT NULL AUTO_INCREMENT,
  `TEAMCODE` varchar(3) NOT NULL,
  `FIRSTNAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(50) NOT NULL,
  `PLAYERNUM` int(2) NOT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `INFO` varchar(500) NOT NULL,
  `POSITION` varchar(30) NOT NULL,
  PRIMARY KEY (`PLAYERID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`PLAYERID`, `TEAMCODE`, `FIRSTNAME`, `LASTNAME`, `PLAYERNUM`, `IMAGE`, `INFO`, `POSITION`) VALUES
(1, 'MIA', 'Ryan', 'Tannehill', 17, 'RyanTannehill.jpg', 'Ryan Timothy Tannehill III is an American football quarterback for the Miami Dolphins of the National Football League. He was drafted by the Dolphins eighth overall in the 2012 NFL Draft. He played college football at Texas A&M.', 'Quarterback'),
(2, 'MIA', 'Ndamukong', 'Suh', 93, 'NdamukongSuh.jpg', 'Ndamukong Suh is an American football defensive tackle for the Miami Dolphins of the National Football League. He was drafted by the Detroit Lions second overall in the 2010 NFL Draft.', 'Defensive tackle'),
(3, 'MIA', 'Knowshon', 'Moreno', 28, 'KnowshonMoreno.jpg', 'Knowshon Rockwell Moreno is an American football running back who is currently a free agent. He was selected 12th overall in the 2009 NFL Draft by the Denver Broncos. He played college football at the University of Georgia.', 'Running back'),
(4, 'MIA', 'DeVante', 'Parker', 11, 'DeVanteParker.jpg', 'DeVante Parker is an American football wide receiver for the Miami Dolphins of the National Football League. He played college football for the University of Louisville Cardinals.', 'Wide receiver'),
(5, 'MIA', 'Matt', 'Moore', 8, 'MattMoore.jpg', 'Matthew Erickson Moore is an American football quarterback for the Miami Dolphins of the National Football League. He played college football at UCLA and Oregon State University.', 'Quarterback'),
(6, 'MIA', 'Jarvis', 'Landry', 14, 'JarvisLandry.jpg', 'Jarvis Charles Landry is an American football wide receiver for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the second round of the 2014 NFL Draft. He played college football at LSU.', 'Wide receiver'),
(7, 'MIA', 'Cameron', 'Wake', 91, 'CameronWake.jpg', 'Derek Cameron Wake is an American football defensive end for the Miami Dolphins of the National Football League. He played college football for Penn State University, and was signed by the New York Giants as an undrafted free agent in 2005.', 'Defensive end'),
(8, 'MIA', 'Greg', 'Jennings', 85, 'GregJennings.jpg', 'Gregory Jennings, Jr. is an American football wide receiver for the Miami Dolphins of the National Football League. He was drafted by the Green Bay Packers out of Western Michigan University in the second round of the 2006 NFL Draft.', 'Wide receiver'),
(9, 'MIA', 'Brent', 'Grimes', 21, 'BrentGrimes.jpg', 'Brent Omar Grimes, is an American football cornerback for the Miami Dolphins of the National Football League. He played college football at Shippensburg University, and signed with the Atlanta Falcons as an undrafted free agent in 2006.', 'Cornerback'),
(10, 'MIA', 'Jay', 'Ajayi', 33, 'JayAjayi.jpg', 'Jay Ajayi is an English American football running back for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the fifth round of the 2015 NFL Draft. He played college football at Boise State.', 'Running back'),
(11, 'MIA', 'Lamar', 'Miller', 26, 'LamarMiller.jpg', 'Lamar Miller is an American football running back for the Miami Dolphins of the National Football League. Miller played college football at the University of Miami and was considered one of the top running backs in the 2012 NFL Draft.', 'Running back'),
(12, 'MIA', 'Kenny', 'Stills', 10, 'KennyStills.jpg', 'Kenneth Lee Stills, Jr. is an American football wide receiver for the Miami Dolphins of the National Football League.', 'Wide receiver'),
(13, 'MIA', 'Jordan', 'Cameron', 84, 'JordanCameron.jpg', 'Jordan Cravens Cameron is an American football tight end for the Miami Dolphins of the National Football League. He was drafted by the Cleveland Browns in the fourth round of the 2011 NFL Draft. He played college football at USC.', 'Tight end'),
(14, 'MIA', 'Chris', 'McCain', 47, 'ChrisMcCain.jpg', 'Christian Cornelius McCain is an American football linebacker for the Miami Dolphins of the National Football League. He played college football at California. He was signed by the Dolphins as an undrafted free agent in 2014.', 'Linebacker'),
(15, 'MIA', 'Mike', 'Pouncey', 51, 'MikePouncey.jpg', 'James Michael Pouncey is an American football center and guard for the Miami Dolphins of the National Football League.', 'Center'),
(16, 'MIA', 'Reshad', 'Jones', 20, 'ReshadJones.jpg', 'Reshad Monquez Jones is an American football safety for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the fifth round of the 2010 NFL Draft. He played college football at the University of Georgia.', 'Safety'),
(17, 'MIA', 'Branden', 'Albert', 71, 'BrandenAlbert.jpg', 'Branden Albert is an American football offensive tackle for the Miami Dolphins of the National Football League. He was drafted by the Kansas City Chiefs 15th overall in the 2008 NFL Draft. He played college football at Virginia.', 'Tackle'),
(18, 'MIA', 'Olivier', 'Vernon', 50, 'OlivierVernon.jpg', 'Olivier Alexander Vernon is an American football defensive end for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the third round of the 2012 NFL Draft. He played college football at the University of Miami', 'Defensive end'),
(19, 'MIA', 'Louis', 'Delmas', 25, 'LouisDelmas.jpg', 'Louis Delmas is an American football safety for the Miami Dolphins of the National Football League. He was drafted by the Detroit Lions in the second round of the 2009 NFL Draft. He played college football at Western Michigan.', 'Safety'),
(20, 'MIA', 'Tony', 'Lippett', 36, 'TonyLippett.jpg', 'Tony Lippett is an American football cornerback for the Miami Dolphins of the National Football League. He played college football for the Michigan State Spartans', 'Cornerback'),
(21, 'MIA', 'C.J.', 'Mosley', 94, 'CJMosley.jpg', 'Calvin Michael "C. J." Mosley, Jr. is an American football defensive tackle for the Miami Dolphins of the National Football League. He was drafted by the Minnesota Vikings in the sixth round of the 2005 NFL Draft.', 'Defensive tackle'),
(22, 'MIA', 'Jamar', 'Taylor', 22, 'JamarTaylor.jpg', 'Jamar Taylor is an American football cornerback for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the second round of the 2013 NFL Draft. He played college football at Boise State.', 'Cornerback'),
(23, 'MIA', 'Rishard', 'Matthews', 86, 'RishardMatthews.jpg', 'Rishard Andre Matthews is an American football wide receiver for the Miami Dolphins of the National Football League. He played college football at the University of Nevada. He was drafted by the Dolphins in the seventh round of the 2012 NFL Draft', 'Wide receiver'),
(24, 'MIA', 'Jelani', 'Jenkins', 43, 'JelaniJenkins.jpg', 'Jelani M. Jenkins is an American football linebacker for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the fourth round of the 2013 NFL Draft. He played college football for the University of Florida.', 'Linebacker'),
(25, 'MIA', 'Jordan', 'Phillips', 97, 'JordanPhillips.jpg', 'Jordan Phillips is an American football defensive tackle for the Miami Dolphins of the National Football League . He played college football at Oklahoma.', 'Defensive tackle'),
(26, 'MIA', 'Derrick', 'Shelby', 79, 'DerrickShelby.jpg', 'Derrick Shelby is an American football defensive end for the Miami Dolphins. He was not drafted in the 2012 NFL Draft. He played college football at Utah', 'Defensive end'),
(27, 'MIA', 'A.J.', 'Francis', 96, 'AJFrancis.jpg', 'Anthony Joseph Francis is an American football defensive tackle for the Miami Dolphins of the National Football League. He was originally signed by the Dolphins as an undrafted free agent in 2013. Francis played college football at Maryland.', 'Defensive tackle'),
(28, 'MIA', 'Koa', 'Misi', 55, 'KoaMisi.jpg', 'Nawa''akoa Lisiate Foti Analeseanoa Misi is an American football linebacker. He played college football at Utah. He was considered one of the top linebacker prospects for the 2010 NFL Draft.', 'Linebacker'),
(29, 'MIA', 'Matt', 'Hazel', 83, 'MattHazel.jpg', 'Matt Hazel is an American football wide receiver for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the sixth round of the 2014 NFL Draft. He played college football at Coastal Carolina.', 'Wide receiver'),
(30, 'MIA', 'Kelvin', 'Sheppard', 97, 'KelvinSheppard.jpg', 'Kelvin Anthony Sheppard is an American football linebacker for the Miami Dolphins of the National Football League. The Buffalo Bills drafted him with the 68th pick in the 3rd round of the 2011 NFL Draft. He played college football at LSU.', 'Linebacker'),
(31, 'MIA', 'Dion', 'Sims', 80, 'DionSims.jpg', 'Dion Sims is an American football tight end for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the fourth round of the 2013 NFL Draft. He played college football at Michigan State.', 'Tight end'),
(32, 'MIA', 'Jason', 'Fox', 74, 'JasonFox.jpg', 'Jason Fox is an American football offensive tackle for the Miami Dolphins of the National Football League. He was drafted by the Detroit Lions in the fourth round of the 2010 NFL Draft. He played college football at the University of Miami.', 'Tackle'),
(33, 'MIA', 'Earl', 'Mitchell', 90, 'EarlMitchell.jpg', 'Earl Mitchell is an American football player for the Miami Dolphins of the National Football League. Mitchell is primarily a defensive tackle but has been recently tried out as a fullback.', 'Nose tackle'),
(34, 'MIA', 'Terrence', 'Fede', 78, 'TerranceFede.jpg', 'Terrence Fede is an American football defensive end for the Miami Dolphins of the National Football League. He was drafted by the Dolphins in the seventh round of the 2014 NFL Draft. He played college football at Marist.', 'Defensive end'),
(35, 'MIA', 'Dustin', 'Keller', 81, 'DustinKeller.jpg', 'Dustin Kendall Keller is a former American football tight end. He was drafted by the New York Jets in the first round of the 2008 NFL Draft. He played college football at Purdue. Keller has also been a member of the Miami Dolphins.', 'Tight end');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TEAMCODE` varchar(3) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `CONFERENCE` varchar(50) NOT NULL,
  `DIVISION` varchar(50) NOT NULL,
  `IMAGE` varchar(100) DEFAULT NULL,
  `CITY` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`ID`, `TEAMCODE`, `NAME`, `CONFERENCE`, `DIVISION`, `IMAGE`, `CITY`) VALUES
(1, 'MIA', 'Dolphins', 'American Football Conference', 'AFC East', 'MIA_logo-80x90.gif', 'Miami'),
(2, 'NE', 'Patriots', 'American Football Conference', 'AFC East', 'NE_logo-80x90.gif', 'New England'),
(3, 'NYJ', 'Jets', 'American Football Conference', 'AFC East', 'NYJ_logo-80x90.gif', 'New York'),
(4, 'BUF', 'Bills', 'American Football Conference', 'AFC East', 'BUF_logo-80x90.gif', 'Buffalo'),
(5, 'CIN', 'Bengals', 'American Football Conference', 'AFC North', 'CIN_logo-80x90.gif', 'Cincinnati'),
(6, 'PIT', 'Steelers', 'American Football Conference', 'AFC North', 'PIT_logo-80x90.gif', 'Pittsburgh'),
(7, 'CLE', 'Browns', 'American Football Conference', 'AFC North', 'CLE_logo-80x90.gif', 'Cleveland'),
(8, 'BAL', 'Ravens', 'American Football Conference', 'AFC North', 'BAL_logo-80x90.gif', 'Baltimore'),
(9, 'IND', 'Colts', 'American Football Conference', 'AFC South', 'IND_logo-80x90.gif', 'Indianapolis'),
(10, 'JAC', 'Jaguars', 'American Football Conference', 'AFC South', 'JAC_logo-80x90.gif', 'Jacksonville'),
(11, 'HOU', 'Texans', 'American Football Conference', 'AFC South', 'HOU_logo-80x90.gif', 'Houston'),
(12, 'TEN', 'Titans', 'American Football Conference', 'AFC South', 'TEN_logo-80x90.gif', 'Tennessee'),
(13, 'DEN', 'Broncos', 'American Football Conference', 'AFC West', 'DEN_logo-80x90.gif', 'Denver'),
(14, 'OAK', 'Raiders', 'American Football Conference', 'AFC West', 'OAK_logo-80x90.gif', 'Oakland'),
(15, 'SD', 'Chargers', 'American Football Conference', 'AFC West', 'SD_logo-80x90.gif', 'San Diego'),
(16, 'KC', 'Chiefs', 'American Football Conference', 'AFC West', 'KC_logo-80x90.gif', 'Kansas City'),
(17, 'DAL', 'Cowboys', 'National Football Conference', 'NFC East', 'DAL_logo-80x90.gif', 'Dallas'),
(18, 'NYG', 'Giants', 'National Football Conference', 'NFC East', 'NYG_logo-80x90.gif', 'New York'),
(19, 'WAS', 'Redskins', 'National Football Conference', 'NFC East', 'WAS_logo-80x90.gif', 'Washington'),
(20, 'PHI', 'Eagles', 'National Football Conference', 'NFC East', 'PHI_logo-80x90.gif', 'Philadelphia'),
(21, 'GB', 'Packers', 'National Football Conference', 'NFC North', 'GB_logo-80x90.gif', 'Green Bay'),
(22, 'MIN', 'Vikings', 'National Football Conference', 'NFC North', 'MIN_logo-80x90.gif', 'Minnesota'),
(23, 'DET', 'Lions', 'National Football Conference', 'NFC North', 'DET_logo-80x90.gif', 'Detroit'),
(24, 'CHI', 'Bears', 'National Football Conference', 'NFC North', 'CHI_logo-80x90.gif', 'Chicago'),
(25, 'CAR', 'Panthers', 'National Football Conference', 'NFC South', 'CAR_logo-80x90.gif', 'Carolina'),
(26, 'ATL', 'Falcons', 'National Football Conference', 'NFC South', 'ATL_logo-80x90.gif', 'Atlanta'),
(27, 'TB', 'Buccaneers', 'National Football Conference', 'NFC South', 'TB_logo-80x90.gif', 'Tampa Bay'),
(28, 'NO', 'Saints', 'National Football Conference', 'NFC South', 'NO_logo-80x90.gif', 'New Orleans'),
(29, 'ARI', 'Cardinals', 'National Football Conference', 'NFC West', 'ARI_logo-80x90.gif', 'Arizona'),
(30, 'STL', 'Rams', 'National Football Conference', 'NFC West', 'STL_logo-80x90.gif', 'St. Louis'),
(31, 'SF', '49ers', 'National Football Conference', 'NFC West', 'SF_logo-80x90.gif', 'San Francisco'),
(32, 'SEA', 'Seahawks', 'National Football Conference', 'NFC West', 'SEA_logo-80x90.gif', 'Seattle');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
