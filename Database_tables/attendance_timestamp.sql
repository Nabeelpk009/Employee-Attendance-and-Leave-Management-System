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
-- Table structure for table `attendance_timestamp`
--

CREATE TABLE `attendance_timestamp` (
  `timestamp_Id` int(20) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `attendance_year` year(4) NOT NULL,
  `attendance_month` int(11) NOT NULL,
  `a1` datetime DEFAULT NULL,
  `a2` datetime DEFAULT NULL,
  `a3` datetime DEFAULT NULL,
  `a4` datetime DEFAULT NULL,
  `a5` datetime DEFAULT NULL,
  `a6` datetime DEFAULT NULL,
  `a7` datetime DEFAULT NULL,
  `a8` datetime DEFAULT NULL,
  `a9` datetime DEFAULT NULL,
  `a10` datetime DEFAULT NULL,
  `a11` datetime DEFAULT NULL,
  `a12` datetime DEFAULT NULL,
  `a13` datetime DEFAULT NULL,
  `a14` datetime DEFAULT NULL,
  `a15` datetime DEFAULT NULL,
  `a16` datetime DEFAULT NULL,
  `a17` datetime DEFAULT NULL,
  `a18` datetime DEFAULT NULL,
  `a19` datetime DEFAULT NULL,
  `a20` datetime DEFAULT NULL,
  `a21` datetime DEFAULT NULL,
  `a22` datetime DEFAULT NULL,
  `a23` datetime DEFAULT NULL,
  `a24` datetime DEFAULT NULL,
  `a25` datetime DEFAULT NULL,
  `a26` datetime DEFAULT NULL,
  `a27` datetime DEFAULT NULL,
  `a28` datetime DEFAULT NULL,
  `a29` datetime DEFAULT NULL,
  `a30` datetime DEFAULT NULL,
  `a31` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_timestamp`
--

INSERT INTO `attendance_timestamp` (`timestamp_Id`, `emp_id`, `attendance_year`, `attendance_month`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`) VALUES
(1, 334, 2022, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-10 19:54:04', '2022-02-10 19:52:59', NULL, NULL, '2022-02-14 15:53:21', '2022-02-15 18:59:35', '2022-02-15 16:02:55', NULL, '2022-02-17 20:28:06', '2022-02-19 01:22:11', '2022-02-19 16:36:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 252, 2022, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-02-15 18:52:13', NULL, NULL, NULL, '2022-02-19 16:34:06', '2022-02-19 16:33:58', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_timestamp`
--
ALTER TABLE `attendance_timestamp`
  ADD PRIMARY KEY (`timestamp_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_timestamp`
--
ALTER TABLE `attendance_timestamp`
  MODIFY `timestamp_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
