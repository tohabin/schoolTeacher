-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 07, 2017 at 11:38 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE IF NOT EXISTS `all_users` (
  `UserId` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `CGPA` float NOT NULL,
  `Active` int(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`UserId`, `Role`, `Name`, `CGPA`, `Active`, `Password`) VALUES
('1', 'HeadTeacher', 'Asad sir', 0, 1, 'Asad sir'),
('2', 'Teacher', 'Azad sir', 0, 1, 'Azad sir'),
('3', 'Teacher', 'Fahim sir', 0, 0, 'Fahim sir'),
('4', 'Student', 'Tanvir', 3.9, 1, 'Tanvir'),
('5 ', 'Student', 'Karim', 3, 1, 'Karim'),
('6', 'Student', 'Hasan', 3.8, 0, 'Hasan');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `instructor` varchar(20) NOT NULL,
  `credit_hr` int(5) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CID`, `Name`, `instructor`, `credit_hr`) VALUES
('c01', 'C programing', 'Md. Khalilluzamman', 3),
('c02', 'discreate math', 'Md. Faisal', 2),
('c03', 'Algorithm', 'Md. Mahiuddin', 3),
('c04', 'Uris', 'DR. Mofiz ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursereg`
--

CREATE TABLE IF NOT EXISTS `coursereg` (
  `REGID` int(20) NOT NULL AUTO_INCREMENT,
  `SID` varchar(20) NOT NULL,
  `CID` varchar(20) NOT NULL,
  PRIMARY KEY (`REGID`),
  KEY `SID` (`SID`,`CID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `coursereg`
--

INSERT INTO `coursereg` (`REGID`, `SID`, `CID`) VALUES
(1, '5 ', 'c01'),
(2, '5 ', 'c03'),
(3, '4', 'c02'),
(4, '4', 'c04'),
(5, '6', 'c01');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
