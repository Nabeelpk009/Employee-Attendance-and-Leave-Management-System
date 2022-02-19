-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 12:33 PM
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
-- Table structure for table `leaveapp`
--

CREATE TABLE `leaveapp` (
  `leave_id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `leave_type_id` varchar(30) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `reason` varchar(300) NOT NULL,
  `app_timestamp` datetime NOT NULL,
  `hr_status` int(11) NOT NULL DEFAULT 0,
  `hod_status` int(11) NOT NULL DEFAULT 0,
  `hod_name` varchar(20) NOT NULL,
  `hod_remarks` varchar(300) DEFAULT NULL,
  `hr_remarks` varchar(300) DEFAULT NULL,
  `last_update_by_hod` datetime DEFAULT NULL,
  `last_update_by_hr` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaveapp`
--

INSERT INTO `leaveapp` (`leave_id`, `userID`, `leave_type_id`, `from_date`, `to_date`, `no_of_days`, `reason`, `app_timestamp`, `hr_status`, `hod_status`, `hod_name`, `hod_remarks`, `hr_remarks`, `last_update_by_hod`, `last_update_by_hr`) VALUES
(3, 252, '10', '2022-02-07', '2022-02-07', 1, 'rd', '2022-02-05 11:18:39', 1, 1, '91', 'fg', NULL, '2022-02-05 11:24:09', NULL),
(4, 252, '12', '2022-02-08', '2022-02-09', 2, 'sts', '2022-02-05 11:21:00', 0, -1, '91', 'hch', NULL, '2022-02-05 11:25:10', NULL),
(5, 334, '9', '2022-02-06', '2022-02-06', 1, 'uitr', '2022-02-05 12:52:58', 1, 1, '1', 'hdhc', NULL, '2022-02-05 12:55:33', NULL),
(6, 334, '10', '2022-02-10', '2022-02-11', 2, 'dryd', '2022-02-05 12:58:04', 0, -1, '1', 'rsgtr', NULL, '2022-02-05 13:01:21', NULL),
(7, 334, '12', '2022-02-18', '2022-02-18', 1, 'aefg', '2022-02-05 13:01:50', 2, 1, '1', 'drd', NULL, '2022-02-05 13:04:37', NULL),
(8, 1, '9', '2022-02-06', '2022-02-07', 2, 'r6ur', '2022-02-05 13:08:23', 0, 0, '', NULL, NULL, NULL, NULL),
(9, 334, '9', '2022-02-06', '2022-02-15', 10, 'fghf', '2022-02-05 13:15:37', 1, 1, '1', 'dczd', NULL, '2022-02-05 13:16:50', NULL),
(10, 334, '11', '2022-02-25', '2022-03-10', 5, 'dryery', '2022-02-05 13:24:30', 1, 1, '1', 'aefe', NULL, '2022-02-05 13:25:14', NULL),
(11, 334, '12', '2022-02-01', '2022-04-10', 3, 'stsr', '2022-02-05 13:28:17', 1, 1, '1', 'wrw', NULL, '2022-02-05 13:29:41', NULL),
(13, 334, '9', '2022-02-08', '2022-02-08', 2, 'svsfv', '2022-02-07 22:49:24', 1, 1, '1', 'zdzd', NULL, '2022-02-07 23:32:30', NULL),
(14, 334, '10', '2022-02-09', '2022-02-10', 2, 'hj', '2022-02-07 23:34:45', 1, 1, '1', 'yes leave', NULL, '2022-02-07 23:40:41', NULL),
(15, 334, '11', '2022-02-11', '2022-02-12', 2, 'lllllll', '2022-02-07 23:53:39', 2, 1, '1', 'no no', NULL, '2022-02-08 00:09:13', NULL),
(16, 334, '3', '2022-02-11', '2022-02-12', 2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa dhxt hftuxtf tuyutirur6u5d hdydyrxurfy nfthxrturfutgutgurcf dhxdttfu', '2022-02-08 00:19:12', 0, -1, '1', 'no leave ', NULL, '2022-02-08 00:30:24', NULL),
(17, 334, '9', '2022-02-11', '2022-02-13', 3, 'nnnnnnnnnnnnnnnnnnn', '2022-02-08 00:43:06', 0, 1, '1', 'vvvvvvvvvvv', NULL, '2022-02-08 00:50:13', NULL),
(21, 334, '12', '2022-02-15', '2022-04-09', 21, 'sefs', '2022-02-09 13:23:38', 1, 1, '1', 'jhvb', NULL, '2022-02-09 13:26:07', NULL),
(22, 334, '3', '2022-02-15', '2022-04-15', 45, 'fgtx', '2022-02-09 13:27:58', 1, 1, '1', 'xfgx', NULL, '2022-02-09 13:28:58', NULL),
(23, 334, '3', '2022-02-26', '2022-03-05', 10, 'wafra', '2022-02-09 21:24:04', 1, 1, '1', 'vjfh', NULL, '2022-02-09 21:26:40', NULL),
(24, 334, '12', '2022-02-25', '2022-03-10', 19, 'vgjf', '2022-02-09 21:29:40', 0, -1, '1', 'h', NULL, '2022-02-09 21:30:05', NULL),
(25, 334, '10', '2022-02-25', '2022-02-06', 11, 'cgjhfg', '2022-02-09 21:31:46', 2, 1, '1', 'fudrud', NULL, '2022-02-09 21:33:04', NULL),
(26, 334, '12', '2022-02-15', '2022-04-14', 89, 'tysrr', '2022-02-09 22:58:48', 1, 1, '1', 'drd', NULL, '2022-02-10 00:08:56', NULL),
(27, 334, '9', '2022-02-28', '2022-03-01', 2, 'sdgs', '2022-02-10 00:11:31', 1, 1, '1', 'cygjgf', NULL, '2022-02-10 00:15:01', NULL),
(28, 334, '3', '2022-02-01', '2022-04-30', 90, 'rzde', '2022-02-10 00:19:41', 1, 1, '1', 'sdfs', NULL, '2022-02-10 00:32:44', NULL),
(30, 334, '11', '2022-02-15', '2022-02-16', 2, 'yyyyyyy', '2022-02-10 23:35:11', 1, 1, '1', 'hffjx', NULL, '2022-02-10 23:37:16', NULL),
(31, 252, '9', '2022-02-16', '2022-02-17', 2, 'Sick', '2022-02-15 18:42:47', 1, 1, '91', 'Get well soon', NULL, '2022-02-15 18:45:39', NULL),
(32, 334, '8', '2022-02-20', '2022-02-28', 9, '  fhg   v', '2022-02-17 19:50:11', 0, -1, '1', '', NULL, '2022-02-17 19:56:42', NULL),
(33, 334, '11', '2022-03-16', '2022-03-17', 2, 'se', '2022-02-16 21:34:08', 1, 1, '1', 'afa', NULL, '2022-02-16 21:35:45', NULL),
(35, 334, '9', '2022-02-18', '2022-02-26', 9, ' vxdg ', '2022-02-17 19:54:59', 0, 1, '1', 'fgdc', NULL, '2022-02-17 19:55:26', NULL),
(36, 334, '10', '2022-02-20', '2022-02-26', 7, 'aaaaaaaaaaaaaa', '2022-02-17 19:58:53', 1, 1, '1', 'vjvjv', NULL, '2022-02-17 20:06:44', NULL),
(37, 334, '12', '2022-02-27', '2022-03-22', 24, 'hfcth', '2022-02-17 20:17:43', 1, 1, '1', 'xfg', NULL, '2022-02-17 20:19:33', NULL),
(38, 334, '12', '2022-02-17', '2022-04-21', 64, 'drgsrg', '2022-02-17 20:46:47', 1, 1, '1', 'zdvfzd', NULL, '2022-02-17 20:47:16', NULL),
(39, 334, '8', '2022-02-18', '2022-02-19', 2, 'bcgb', '2022-02-17 23:30:18', 1, 1, '1', 'yr', NULL, '2022-02-17 23:31:15', NULL),
(40, 334, '9', '2022-02-20', '2022-02-22', 3, ' acac ', '2022-02-18 11:05:06', 1, 1, '1', '', NULL, '2022-02-18 14:05:23', NULL),
(41, 334, '9', '2022-02-20', '2022-02-28', 9, 'ewfwefwerfewwwwwwww', '2022-02-18 14:09:36', 1, 1, '1', 'rgs', 'new', '2022-02-18 14:09:57', '2022-02-18 22:51:25'),
(42, 334, '8', '2022-02-19', '2022-02-21', 3, 'ts', '2022-02-18 22:54:28', 0, 0, '', NULL, NULL, NULL, NULL),
(43, 334, '12', '2022-03-01', '2022-05-31', 92, 'wwwwwwwqwqqqqqqqq', '2022-02-19 11:50:09', 1, 1, '1', 'scz', 'tyr', '2022-02-19 12:29:44', '2022-02-19 12:41:40'),
(44, 334, '3', '2022-02-19', '2022-04-30', 71, 'ste', '2022-02-19 12:13:56', 0, 0, '', NULL, NULL, NULL, NULL),
(45, 1, '8', '2022-02-20', '2022-02-22', 3, 'fasfa', '2022-02-19 14:59:55', 0, 0, '', NULL, NULL, NULL, NULL),
(46, 252, '9', '2022-02-22', '2022-02-28', 7, 'saef', '2022-02-19 15:01:16', 0, 0, '', NULL, NULL, NULL, NULL),
(47, 252, '8', '2022-02-20', '2022-02-21', 2, 'afe', '2022-02-19 16:02:14', 0, 0, '', NULL, NULL, NULL, NULL),
(48, 334, '9', '2022-02-20', '2022-03-17', 26, 'hsths', '2022-02-19 16:38:59', 1, 1, '1', 'wrgw', 'rsg', '2022-02-19 16:39:39', '2022-02-19 16:40:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaveapp`
--
ALTER TABLE `leaveapp`
  ADD PRIMARY KEY (`leave_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaveapp`
--
ALTER TABLE `leaveapp`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
