-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 12:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teaminte_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `attendance_Id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `attendance_year` year(4) NOT NULL,
  `attendance_month` int(11) NOT NULL,
  `a1` varchar(5) NOT NULL DEFAULT '0',
  `a2` varchar(5) NOT NULL DEFAULT '0',
  `a3` varchar(5) NOT NULL DEFAULT '0',
  `a4` varchar(5) NOT NULL DEFAULT '0',
  `a5` varchar(5) NOT NULL DEFAULT '0',
  `a6` varchar(5) NOT NULL DEFAULT '0',
  `a7` varchar(5) NOT NULL DEFAULT '0',
  `a8` varchar(5) NOT NULL DEFAULT '0',
  `a9` varchar(5) NOT NULL DEFAULT '0',
  `a10` varchar(5) NOT NULL DEFAULT '0',
  `a11` varchar(5) NOT NULL DEFAULT '0',
  `a12` varchar(5) NOT NULL DEFAULT '0',
  `a13` varchar(5) NOT NULL DEFAULT '0',
  `a14` varchar(5) NOT NULL DEFAULT '0',
  `a15` varchar(5) NOT NULL DEFAULT '0',
  `a16` varchar(5) NOT NULL DEFAULT '0',
  `a17` varchar(5) NOT NULL DEFAULT '0',
  `a18` varchar(5) NOT NULL DEFAULT '0',
  `a19` varchar(5) NOT NULL DEFAULT '0',
  `a20` varchar(5) NOT NULL DEFAULT '0',
  `a21` varchar(5) NOT NULL DEFAULT '0',
  `a22` varchar(5) NOT NULL DEFAULT '0',
  `a23` varchar(5) NOT NULL DEFAULT '0',
  `a24` varchar(5) NOT NULL DEFAULT '0',
  `a25` varchar(5) NOT NULL DEFAULT '0',
  `a26` varchar(5) NOT NULL DEFAULT '0',
  `a27` varchar(5) NOT NULL DEFAULT '0',
  `a28` varchar(5) NOT NULL DEFAULT '0',
  `a29` varchar(5) NOT NULL DEFAULT '0',
  `a30` varchar(5) NOT NULL DEFAULT '0',
  `a31` varchar(5) NOT NULL DEFAULT '0',
  `remarks` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `edit_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`attendance_Id`, `emp_id`, `attendance_year`, `attendance_month`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`, `remarks`, `edit_timestamp`) VALUES
(1, 252, 2022, 2, '0', '0', '1', '6', '9', '7', '10', '0', '0', '0', '0', '0', '0', '1', '0', '9', '9', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'hhhhhhh', '2022-02-08 23:07:34'),
(3, 334, 2022, 3, '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '9', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '', '2022-02-16 22:11:59'),
(4, 334, 2022, 2, '1', '4', '8', '3', '3', '3', '3', '3', '5', '1', '3', '3', '2', '1', '4', '11', '12', '9', '1', '9', '9', '9', '9', '9', '9', '9', '9', '9', '0', '0', '0', '', '2022-02-19 16:33:45'),
(5, 334, 2022, 4, '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '0', NULL, NULL),
(6, 334, 2022, 5, '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', '12', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`attendance_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `attendance_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
