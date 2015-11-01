-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2015 at 11:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sampark`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `Event` text NOT NULL,
  `Put_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Village` text NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`No`, `Event`, `Put_in`, `Village`) VALUES
(1, 'There will be no water service in your area on 3rd of November. ', '0000-00-00 00:00:00', 'Indo'),
(2, 'Govt has sanctioned funds for all the farmers. Farmers can collect their funds from the Govt banks. Remember to take your Aadhar card with you.', '2015-11-01 00:31:23', 'Indo'),
(3, 'All fisherman near the catch-man area are advised NOT to go for fishing as their will be heavy rains and high tide in next 24hrs ', '2015-11-01 00:31:23', 'Indo'),
(4, 'There is a free vaccination campaign which will be started by 1am today. Be there ', '2015-11-01 05:25:46', 'Indo'),
(5, 'The goods on the ration card shops will be available now from morning 11 to evening 11.', '2015-11-01 05:37:20', 'Codpur');

-- --------------------------------------------------------

--
-- Table structure for table `farm_help`
--

CREATE TABLE IF NOT EXISTS `farm_help` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `Contact` text NOT NULL,
  `Problem` text NOT NULL,
  `In_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Solution` text NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `farm_help`
--

INSERT INTO `farm_help` (`No`, `Contact`, `Problem`, `In_time`, `Solution`) VALUES
(3, '123456789', 'We are facing problems due to unknown type of mites present in out feild. Can you help us with that', '2015-11-01 01:28:05', 'Seed in wheat. You will earn more'),
(4, '1516146242', 'We are facing problems due to unknown type of mites present in out feild. Can you help us with that', '2015-11-01 02:00:38', '');

-- --------------------------------------------------------

--
-- Table structure for table `medical_help`
--

CREATE TABLE IF NOT EXISTS `medical_help` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `Contact` varchar(256) NOT NULL,
  `Problem` text NOT NULL,
  `Solution` text NOT NULL,
  `Put_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `medical_help`
--

INSERT INTO `medical_help` (`No`, `Contact`, `Problem`, `Solution`, `Put_in`) VALUES
(1, '123456789', 'ed', 'You can take these medicines', '2015-11-01 01:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_details`
--

CREATE TABLE IF NOT EXISTS `ngo_details` (
  `Username` varchar(250) NOT NULL,
  `Password` text NOT NULL,
  `Sign_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Sign_up` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Logged_in` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ngo_details`
--

INSERT INTO `ngo_details` (`Username`, `Password`, `Sign_in`, `Sign_up`, `Logged_in`) VALUES
('resheil@resheil.com', '123456', '2015-10-31 05:01:50', '2015-10-31 07:25:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `polling_request`
--

CREATE TABLE IF NOT EXISTS `polling_request` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `Contact` text NOT NULL,
  `Problem` text NOT NULL,
  `In_time` timestamp NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `polling_request`
--

INSERT INTO `polling_request` (`No`, `Contact`, `Problem`, `In_time`) VALUES
(2, '123456789', 'The village is fully messed up with garbage\r\n', '2015-10-31 17:36:23'),
(4, '123456789', 'defew', '2015-10-31 17:37:04'),
(8, '123456789', 'This is my test problem', '2015-10-31 19:52:21'),
(17, '9820105763', 'Water is dirty in my area', '2015-11-01 05:20:52'),
(18, '9820105763', 'Water is dirty in my area', '2015-11-01 05:22:33'),
(19, '3525623662', 'Dirty Water', '2015-11-01 05:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE IF NOT EXISTS `polls` (
  `Number` int(11) NOT NULL AUTO_INCREMENT,
  `Question` text NOT NULL,
  `Village` text NOT NULL,
  `Yes` int(11) NOT NULL,
  `No` int(11) NOT NULL,
  `People` text NOT NULL,
  `Put_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `To_media` int(11) NOT NULL,
  `Action` text NOT NULL,
  PRIMARY KEY (`Number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`Number`, `Question`, `Village`, `Yes`, `No`, `People`, `Put_in`, `To_media`, `Action`) VALUES
(4, 'The water in your area from the last week is coming regularly?', 'Indo', 3, 2, '+123456789+34215216+342152163435+87654321+3525623662', '2015-11-01 01:35:20', 0, 'Water samples have been collected from your area and soon after we receive reports we will notify you. Stay tuned! '),
(5, 'The gutters are wide open which pose a risk for my kids going to school. Is it so with you also?', 'Indo', 1, 1, '++87654321', '2015-11-01 05:21:43', 0, 'NGO hve been given the ascess '),
(6, 'I have been facing from problems in finding medicines near by in our locality.', 'Codpur', 0, 0, '', '2015-11-01 05:40:24', 1, ''),
(7, 'Water is dirty in your area ? Is it so?', 'Indo', 1, 0, '+9820105763', '2015-11-01 09:52:14', 0, ''),
(8, 'Is there water in ur area??', 'Indo', 0, 1, '+3525623662', '2015-11-01 09:57:09', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admins`
--

CREATE TABLE IF NOT EXISTS `sub_admins` (
  `Num` int(11) NOT NULL AUTO_INCREMENT,
  `Contact` varchar(258) NOT NULL,
  `Password` text NOT NULL,
  `Area` int(11) NOT NULL,
  PRIMARY KEY (`Num`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sub_admins`
--

INSERT INTO `sub_admins` (`Num`, `Contact`, `Password`, `Area`) VALUES
(1, '87654321', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_database`
--

CREATE TABLE IF NOT EXISTS `user_database` (
  `Contact` varchar(259) NOT NULL,
  `Village` text NOT NULL,
  `In_time` timestamp NOT NULL,
  UNIQUE KEY `Contact` (`Contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_database`
--

INSERT INTO `user_database` (`Contact`, `Village`, `In_time`) VALUES
('12345678', 'Indo ', '2015-11-01 02:53:59'),
('123456789', 'Indo ', '2015-10-31 17:44:43'),
('315534', 'Rampur', '2015-11-01 01:03:22'),
('34215216', 'Indo ', '2015-10-31 21:31:56'),
('342152163435', 'Indo ', '2015-10-31 21:35:29'),
('3521526', 'Indo ', '2015-10-31 17:10:06'),
('3525623662', 'Indo ', '2015-10-31 21:04:15'),
('5279187931', 'Codpur', '2015-11-01 01:05:34'),
('67676578', 'Indo ', '2015-11-01 01:04:49'),
('87654321', 'Indo ', '2015-11-01 03:24:24'),
('9820105763', 'Indo ', '2015-11-01 05:19:05'),
('982324983215', 'Codpur', '2015-11-01 01:03:12'),
('987879', 'Indo ', '2015-11-01 01:05:07');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE IF NOT EXISTS `villages` (
  `No` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`No`, `Name`) VALUES
(1, 'Indo '),
(2, 'Rampur'),
(3, 'Codpur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
