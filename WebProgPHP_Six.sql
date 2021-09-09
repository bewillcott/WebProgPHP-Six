-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2021 at 10:38 AM
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
CREATE DATABASE IF NOT EXISTS `WebProgPHP_Six` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `WebProgPHP_Six`;

-- --------------------------------------------------------

--
-- Table structure for table `Test`
--
-- Creation: Sep 09, 2021 at 01:29 AM
-- Last update: Sep 09, 2021 at 01:29 AM
--

CREATE TABLE `Test` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `Test`:
--

--
-- Truncate table before insert `Test`
--

TRUNCATE TABLE `Test`;
--
-- Dumping data for table `Test`
--

INSERT INTO `Test` (`ID`, `Name`) VALUES
(1, 'Me'),
(2, 'You');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--
-- Creation: Sep 07, 2021 at 10:16 AM
-- Last update: Sep 09, 2021 at 01:31 AM
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `Users`:
--

--
-- Truncate table before insert `Users`
--

TRUNCATE TABLE `Users`;
--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `LastName`, `FirstName`, `Email`) VALUES
(5, 'Willcott', 'Brad', 'bw@fred.com'),
(6, 'Adams', 'Peter', 'pa@netti.com'),
(8, 'Lamb', 'Mary', 'mlamb@girl.us'),
(9, 'Lamb', 'Sally', 'slamb@girl.us'),
(10, 'Smith', 'Larry', 'larry.smith@gmail.com'),
(14, 'Wells', 'Brian', 'bw@wells.com'),
(16, 'Sanders', 'Andrew', 'asanders@msmail.as'),
(17, 'Mills', 'John', 'jmills@gmail.com'),
(19, 'Troy-Hardings', 'Fred', 'Fred.Troy-Hardings@gmail.com'),
(20, 'Anders', 'Anne', 'a.anders@gmail.com'),
(21, 'ewrwer', 'DROP TABLE Test', 'werr@dffrtr.dfdf'),
(22, 'DROP TABLE Test', 'fgdfgdfg', 'dfdf@fgdfg.ghg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Test`
--
ALTER TABLE `Test`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Name` (`LastName`,`FirstName`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Test`
--
ALTER TABLE `Test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
