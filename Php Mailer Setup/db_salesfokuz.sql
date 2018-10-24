-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2018 at 10:48 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_salesfokuz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

DROP TABLE IF EXISTS `tbl_contacts`;
CREATE TABLE IF NOT EXISTS `tbl_contacts` (
  `Id` int(200) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) NOT NULL,
  `Last_name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Description` varchar(2000) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`Id`, `Name`, `Last_name`, `Email`, `Phone`, `Description`) VALUES
(1, 'Ayush', 'srihari', 'srihari.ayush@gmail.com', '9633100673', 'hey');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
