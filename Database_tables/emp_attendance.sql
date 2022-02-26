-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 08:41 AM
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
  `approval_remarks` varchar(300) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `approval_timestamp` datetime DEFAULT NULL,
  `remarks` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `edit_timestamp` datetime DEFAULT NULL,
  `hod_approval_status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`attendance_Id`, `emp_id`, `attendance_year`, `attendance_month`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`, `approval_remarks`, `approval_timestamp`, `remarks`, `edit_timestamp`, `hod_approval_status`) VALUES
(1, 252, 2022, 2, '0', '0', '1', '6', '9', '7', '10', '0', '0', '0', '0', '0', '0', '1', '0', '9', '9', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, 'hhhhhhh', '2022-02-08 23:07:34', 0),
(3, 334, 2022, 3, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '10', '10', '10', '10', '10', '10', '3', '3', '3', '3', '3', '3', '3', '3', '3', '', '2022-02-26 10:55:30', '', '2022-02-16 22:11:59', 1),
(5, 334, 2022, 4, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '0', NULL, NULL, NULL, NULL, 0),
(6, 334, 2022, 5, '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '10', '10', '10', '10', '10', '10', '10', '10', NULL, NULL, '', '2022-02-22 22:02:42', 0),
(25, 334, 2022, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '8', '5', '0', '3', '3', '3', '3', '3', '3', '0', '0', '0', 'qqqqqqqqqqqqqqqqqq', '2022-02-26 11:11:51', NULL, NULL, 1),
(26, 334, 2022, 6, '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, 0),
(27, 334, 2022, 7, '3', '3', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, 0),
(28, 1, 2022, 2, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, 1);

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
  MODIFY `attendance_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
