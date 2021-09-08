-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2021 at 06:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WebProgPHP_Six`
--
CREATE DATABASE IF NOT EXISTS `WebProgPHP_Six`;
USE `WebProgPHP_Six`;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--
-- Creation: Sep 07, 2021 at 10:16 AM
--

CREATE TABLE IF NOT EXISTS `Users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Name` (`LastName`,`FirstName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `Users`:
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
