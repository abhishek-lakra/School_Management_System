-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2022 at 07:01 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Amount` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`ID`, `Name`, `Mobile`, `Class`, `Email`, `Gender`, `Amount`) VALUES
(1, 'Abhishek Lakra', '8827416631', '12th', 'abhisheklakra56@gmail.com', 'Male', 'â‚¹ 8000'),
(3, 'ABC', '9876543210', '12th', '123@gmail.com', 'Male', 'â‚¹ 8000');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `chapter` varchar(50) NOT NULL,
  `file` varchar(10000) NOT NULL,
  `class` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`ID`, `subject`, `chapter`, `file`, `class`) VALUES
(21, 'English', '7', 'sample.pdf', '10th');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SoT` char(1) NOT NULL,
  `Full_Name` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Mobile` bigint(11) NOT NULL,
  `Add1` varchar(50) NOT NULL,
  `Add2` varchar(50) NOT NULL,
  `City` varchar(40) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Zipcode` int(6) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `SoT`, `Full_Name`, `Password`, `Gender`, `Class`, `Email`, `Mobile`, `Add1`, `Add2`, `City`, `State`, `Zipcode`) VALUES
(4, 'S', 'Abhishek Lakra', '123', 'Male', '12th', 'abhisheklakra56@gmail.com', 8827416631, 'Flat No. 13', '12', 'Bangalore', 'Karnataka', 560090),
(5, 'S', 'Seema BN', '123', 'Female', '12th', 'seemabn1@gmail.com', 1234567890, 'Flat No. 13', '12', 'Bangalore', 'Karnataka', 560090),
(6, 'S', 'ABC', '123', 'Male', '12th', '123@gmail.com', 9876543210, 'Flat No. 13', '12', 'Bangalore', 'Karnataka', 560090),
(7, 'T', 'Rakha M', '321', 'Female', '12th', 'rekha@gmail.com', 1478523690, 'Flat No. 13', '12', 'Bangalore', 'Karnataka', 560090);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Full_Name` varchar(50) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Mobile` bigint(20) NOT NULL,
  `Sub_Code` varchar(10) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Marks` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`ID`, `Full_Name`, `Class`, `Mobile`, `Sub_Code`, `Subject`, `Marks`) VALUES
(1, 'Seema BN', '12th', 1234567890, '111', 'Chemistry', 88),
(2, 'Seema BN', '12th', 1234567890, '112', 'Mathematics', 79);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Class` varchar(10) NOT NULL,
  `Sub_Code` varchar(10) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `Class`, `Sub_Code`, `Subject`) VALUES
(1, '12th', '111', 'Chemistry'),
(2, '12th', '112', 'Mathematics');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
