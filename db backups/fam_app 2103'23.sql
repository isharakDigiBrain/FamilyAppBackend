-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2023 at 02:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fam_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bi_issuedlog`
--

CREATE TABLE `bi_issuedlog` (
  `id` int(11) NOT NULL,
  `loanId` int(11) NOT NULL,
  `issuedById` int(11) NOT NULL,
  `issuedRemarks` text NOT NULL,
  `requester_id` int(11) NOT NULL COMMENT 'ishara added',
  `amount` decimal(10,2) NOT NULL,
  `attachment` text NOT NULL,
  `createdDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bi_loansapplication`
--

CREATE TABLE `bi_loansapplication` (
  `id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `tenureMonths` int(11) NOT NULL,
  `tenureExp` date NOT NULL,
  `requesterId` int(11) NOT NULL,
  `requesterComment` varchar(300) NOT NULL,
  `financeId` int(11) DEFAULT NULL,
  `financeComment` varchar(300) DEFAULT NULL,
  `approverId` int(11) DEFAULT NULL,
  `approverComment` varchar(300) DEFAULT NULL,
  `createdOn` datetime DEFAULT current_timestamp(),
  `modifiedOn` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bi_loansapplication`
--

INSERT INTO `bi_loansapplication` (`id`, `amount`, `status`, `tenureMonths`, `tenureExp`, `requesterId`, `requesterComment`, `financeId`, `financeComment`, `approverId`, `approverComment`, `createdOn`, `modifiedOn`) VALUES
(24, '1200.00', 2, 60, '0000-00-00', 4, 'test 1', NULL, NULL, NULL, NULL, '2023-03-14 15:51:15', NULL),
(25, '5000.00', 2, 120, '0000-00-00', 4, 'TEST 2', NULL, NULL, NULL, NULL, '2023-03-14 17:58:52', NULL),
(26, '6000.00', 2, 180, '0000-00-00', 4, 'TEST 3', NULL, NULL, NULL, NULL, '2023-03-14 17:59:44', NULL),
(27, '6500.00', 2, 36, '0000-00-00', 4, 'test 4', NULL, NULL, NULL, NULL, '2023-03-15 08:27:56', NULL),
(28, '100.00', 2, 144, '0000-00-00', 4, 'test 5', NULL, NULL, NULL, NULL, '2023-03-15 08:58:08', NULL),
(29, '70000.00', 2, 60, '0000-00-00', 4, 'test 6', NULL, NULL, NULL, NULL, '2023-03-15 09:15:21', NULL),
(30, '2000.00', 2, 24, '0000-00-00', 4, 'ishara', NULL, NULL, NULL, NULL, '2023-03-15 09:26:17', NULL),
(31, '3000.00', 2, 12, '0000-00-00', 4, 'ishara test', NULL, NULL, NULL, NULL, '2023-03-15 09:26:54', NULL),
(32, '2500.00', 2, 36, '0000-00-00', 4, 'test 3', NULL, NULL, NULL, NULL, '2023-03-15 09:37:12', NULL),
(33, '3500.00', 2, 48, '0000-00-00', 4, 'test 5', NULL, NULL, NULL, NULL, '2023-03-15 09:37:59', NULL),
(34, '5200.00', 2, 120, '0000-00-00', 4, 'test 5', NULL, NULL, NULL, NULL, '2023-03-15 09:56:53', NULL),
(35, '5000.00', 2, 60, '0000-00-00', 4, 'test', NULL, NULL, NULL, NULL, '2023-03-15 10:02:02', NULL),
(36, '1500.00', 2, 12, '0000-00-00', 4, 'test ', NULL, NULL, NULL, NULL, '2023-03-15 10:27:31', NULL),
(37, '1500.00', 2, 24, '0000-00-00', 4, 'test v', NULL, NULL, NULL, NULL, '2023-03-15 10:28:36', NULL),
(38, '2500.00', 2, 48, '0000-00-00', 4, 'test 2', NULL, NULL, NULL, NULL, '2023-03-15 10:31:43', NULL),
(39, '2500.00', 2, 48, '0000-00-00', 4, 'test 1', NULL, NULL, NULL, NULL, '2023-03-15 13:06:25', NULL),
(40, '14000.00', 2, 120, '0000-00-00', 4, 'test', NULL, NULL, NULL, NULL, '2023-03-15 13:11:31', NULL),
(41, '2500.00', 2, 120, '0000-00-00', 4, 'test', NULL, NULL, NULL, NULL, '2023-03-15 13:16:14', NULL),
(42, '1500.00', 2, 24, '0000-00-00', 5, 'test', NULL, NULL, NULL, NULL, '2023-03-15 14:40:56', NULL),
(43, '5200.00', 2, 120, '0000-00-00', 5, 'test 1', NULL, NULL, NULL, NULL, '2023-03-15 17:17:20', NULL),
(44, '5.00', 2, 60, '0000-00-00', 4, '15', NULL, NULL, NULL, NULL, '2023-03-20 14:10:48', NULL),
(45, '5.00', 2, 2400, '0000-00-00', 4, 'test', NULL, NULL, NULL, NULL, '2023-03-20 14:12:32', NULL),
(46, '5.00', 2, 6000, '0000-00-00', 4, '10', NULL, NULL, NULL, NULL, '2023-03-20 14:17:27', NULL),
(47, '5.00', 2, 1200, '0000-00-00', 4, 'test', NULL, NULL, NULL, NULL, '2023-03-20 14:18:40', NULL),
(48, '5.00', 2, 60, '0000-00-00', 4, '5', NULL, NULL, NULL, NULL, '2023-03-20 14:19:28', NULL),
(49, '4.00', 2, 48, '0000-00-00', 4, '5', NULL, NULL, NULL, NULL, '2023-03-20 14:21:49', NULL),
(50, '5.00', 2, 60, '0000-00-00', 4, '6', NULL, NULL, NULL, NULL, '2023-03-20 14:38:18', NULL),
(51, '10.00', 2, 240, '0000-00-00', 4, 'test', NULL, NULL, NULL, NULL, '2023-03-20 15:44:14', NULL),
(52, '500.00', 2, 120, '0000-00-00', 4, 'test 1', NULL, NULL, NULL, NULL, '2023-03-20 16:03:34', NULL),
(53, '111.00', 2, 60, '0000-00-00', 4, 'dfsdf', NULL, NULL, NULL, NULL, '2023-03-20 16:04:50', NULL),
(54, '100.00', 2, 12, '0000-00-00', 4, 'test', NULL, NULL, NULL, NULL, '2023-03-20 16:08:01', NULL),
(55, '5000.00', 2, 24, '0000-00-00', 6, 'test huz', NULL, NULL, NULL, NULL, '2023-03-20 16:22:50', NULL),
(56, '3000.00', 2, 12, '0000-00-00', 6, 'test huz', NULL, NULL, NULL, NULL, '2023-03-20 16:25:18', NULL),
(57, '4500.00', 2, 36, '0000-00-00', 6, 'test 3', NULL, NULL, NULL, NULL, '2023-03-20 16:27:22', NULL),
(58, '500.00', 2, 12, '0000-00-00', 6, 'test', NULL, NULL, NULL, NULL, '2023-03-20 16:28:40', NULL),
(59, '4500.00', 2, 12, '0000-00-00', 9, 'adeel request ', NULL, NULL, NULL, NULL, '2023-03-20 16:34:14', NULL),
(60, '2000.00', 2, 24, '0000-00-00', 9, 'test', NULL, NULL, NULL, NULL, '2023-03-20 17:16:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bi_recievedlog`
--

CREATE TABLE `bi_recievedlog` (
  `id` int(11) NOT NULL,
  `loanId` int(11) NOT NULL,
  `recievedById` int(11) NOT NULL,
  `recievedRemark` text NOT NULL,
  `requester_id` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `createdDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bi_users`
--

CREATE TABLE `bi_users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bi_users`
--

INSERT INTO `bi_users` (`id`, `username`, `name`, `password`, `email`) VALUES
(4, 'user', 'ishara krishan', '123', 'ishara@huz.com'),
(5, 'vivan', 'Vivan Test ', '123', 'vivan@gmail.com'),
(6, 'huz', 'huzefa mohommed', '123', 'huzz@gmail.com'),
(9, 'adeel', 'adeel mohommed', '145', 'adeel.m@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bi_user_role`
--

CREATE TABLE `bi_user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bi_user_role`
--

INSERT INTO `bi_user_role` (`id`, `name`, `description`, `priority`, `created_on`, `created_by`) VALUES
(1, 'ITAdmin', 'IT Admin', 1, '2023-03-15 14:20:24', 1),
(2, 'Family', 'Family', 2, '2023-03-15 14:24:07', 5),
(3, 'Finance', 'Finance', 3, '2023-03-15 14:26:58', 5),
(4, 'ParentFamily', 'Parent Family', 5, '2023-03-15 14:27:36', 5),
(5, 'FinalApprover', 'Final Approver', 4, '2023-03-15 15:04:18', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bi_user_role_access`
--

CREATE TABLE `bi_user_role_access` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bi_user_role_access`
--

INSERT INTO `bi_user_role_access` (`id`, `user_id`, `role_id`, `created_by`, `created_on`) VALUES
(1, 4, 2, 1, '2023-03-15 14:19:00'),
(2, 5, 4, 5, '2023-03-15 14:24:55'),
(3, 5, 5, 5, '2023-03-15 14:24:55'),
(5, 5, 3, 5, '2023-03-18 14:15:58'),
(6, 6, 2, 5, '2023-03-20 16:17:57'),
(7, 9, 2, 5, '2023-03-20 16:33:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bi_issuedlog`
--
ALTER TABLE `bi_issuedlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requester_id` (`requester_id`);

--
-- Indexes for table `bi_loansapplication`
--
ALTER TABLE `bi_loansapplication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_recievedlog`
--
ALTER TABLE `bi_recievedlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requester_id` (`requester_id`);

--
-- Indexes for table `bi_users`
--
ALTER TABLE `bi_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bi_user_role`
--
ALTER TABLE `bi_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bi_user_role_access`
--
ALTER TABLE `bi_user_role_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bi_issuedlog`
--
ALTER TABLE `bi_issuedlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bi_loansapplication`
--
ALTER TABLE `bi_loansapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `bi_recievedlog`
--
ALTER TABLE `bi_recievedlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bi_users`
--
ALTER TABLE `bi_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bi_user_role`
--
ALTER TABLE `bi_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bi_user_role_access`
--
ALTER TABLE `bi_user_role_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
