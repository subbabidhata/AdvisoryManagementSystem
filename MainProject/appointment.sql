-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2016 at 06:59 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appt`
--

CREATE TABLE `appt` (
  `ano` int(11) NOT NULL,
  `astudent` varchar(50) NOT NULL,
  `aadvisor` varchar(50) NOT NULL,
  `atime` varchar(11) NOT NULL,
  `ashow` int(1) NOT NULL DEFAULT '0',
  `adate` date NOT NULL,
  `flag` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appt`
--

INSERT INTO `appt` (`ano`, `astudent`, `aadvisor`, `atime`, `ashow`, `adate`, `flag`) VALUES
(1, 'uk4ktt', 'uu9yie', '12:12', 0, '2012-12-12', 0),
(2, 'k3dfyz', 'uu9yie', '12:40', 0, '2016-10-22', 0),
(3, 'cyftrb', 'uu9yie', '12:10', 1, '2016-12-05', 0),
(5, 'k3dfyz', 'uu9yie', '02:00', 0, '2016-12-15', 0),
(6, 'uk4ktt', 'uu9yie', '04:00', 0, '2016-12-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` int(10) NOT NULL,
  `rolename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`) VALUES
(1, 'Admin'),
(2, 'Student'),
(3, 'Advisor');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `sno` int(11) NOT NULL,
  `stime` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` varchar(120) NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `MemberSince` varchar(255) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `UserName`, `FirstName`, `LastName`, `Email`, `Password`, `MemberSince`, `Active`, `role`) VALUES
('k3dfyz', 'chuck', 'Chuck', 'Bas', 'chuck@pace.edu', 'ec04ce6b7559856a407af4e1ac77e50f6f410069046a577d3ea81839b672ae6f4', '1481178922', 1, 2),
('cyftrb', 'FrodoBaggins', 'Frodo', 'Baggins', 'frodo@localhost.com', 'ce1615712e24b7c7ebf23feab855a75b4a8a852bbcfae9a99911246256a0fe497', '1447091580', 1, 2),
('2lc65o', 'jay', 'Jay', 'Patel', 'jay@pace.edu', '62083987e70c8075c1a8f974f8521685278d0035e097e86cf8284c928401190d2', '1481331783', 1, 2),
('4frvct', 'JohnSmith', 'John', 'Smith', 'js@gmail.com', '6f4e26455b0f9c987a0009f3c5bd12786300b90fa76fb5399c82f2e63ab7121aa', '1445987595', 1, 2),
('692g6q', 'PraviinM', 'Praviin', 'Mandhare', 'pravsm@gmail.com', '1e905117d466dc32016cb71e3cb798cea73a942f2221fcbda1b5dc8104c2565ee', '1445961643', 1, 2),
('byzqw5', 'roli', 'Roli', 'Saxena', 'roli@pace.edu', '235cafb339f350ffecf614fa9e216771a3b891a659216bd5b18ea0ee125b26dfb', '1480989102', 1, 1),
('kzb3q4', 'roshan', 'Roshan', 'Hana', 'roshan@pace.edu', 'ea017f02e318e3612048b649697fe74ff3fde24d3e5560c0679cc30b966511ab0', '1481316339', 1, 3),
('94s163', 'ross', 'Ross', 'geller', 'ross@pace.edu', 'b1f1adc98390a3be9b87fef6b8b8765d0ff8517bbdc8a7d88d22f021b5167f4a1', '1481266671', 1, 1),
('uk4ktt', 'sid', 'Sid', 'Saxena', 'sid@pace.edu', 'd04bb00ec3b589d4e0ac1bca4d2794b12cabffa5b8309c287be0612aa94481a7d', '1481179048', 1, 2),
('uu9yie', 'siddhesh', 'Siddhesh', 'Lele', 'siddhesh@pace.edu', 'c3314708d0c4eccbe8d8bcff8ec58db859563229840a95b55e3c287ff01e61f1e', '1480994749', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appt`
--
ALTER TABLE `appt`
  ADD PRIMARY KEY (`ano`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserName`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appt`
--
ALTER TABLE `appt`
  MODIFY `ano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slot`
--
ALTER TABLE `slot`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
