-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 12:52 PM
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
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `leavetype_id` int(20) NOT NULL,
  `leave_name` varchar(20) NOT NULL,
  `leave_name_full` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`leavetype_id`, `leave_name`, `leave_name_full`) VALUES
(0, 'A', 'Absent'),
(1, 'P', 'Present '),
(2, 'WO', 'Week Off'),
(3, 'CO', 'Compensatory Off'),
(4, 'OD', 'On Duty'),
(5, 'WFH', 'Work From Home'),
(6, 'HF', 'Half Day'),
(7, 'HD', 'Holiday'),
(8, 'L-CL', 'Leave-casual Leave'),
(9, 'L-SL', 'Leave-Sick Leave'),
(10, 'L-PL', 'Leave-Paid Leave'),
(11, 'L-ML', 'Leave-Maternity Leave'),
(12, 'LWP', 'Leave Without Pay');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`leavetype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `leavetype_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
