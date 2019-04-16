-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2019 at 12:24 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realtimechat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`id`, `to_user_id`, `from_user_id`, `chat_message`, `status`, `timestamp`) VALUES
(34, 1, 3, 'hi', 0, '2019-02-19 10:26:52'),
(35, 3, 1, 'i am mishan', 0, '2019-02-19 10:27:02'),
(36, 1, 3, 'sadasdasd', 0, '2019-02-19 10:27:26'),
(37, 1, 3, 'asd', 0, '2019-02-19 10:27:26'),
(38, 1, 3, 'adadwdaw', 0, '2019-02-19 10:27:26'),
(39, 1, 3, 'wdawdsad', 0, '2019-02-19 10:27:26'),
(40, 4, 3, 'hi', 0, '2019-02-19 10:33:45'),
(41, 3, 4, 'hi\n', 0, '2019-02-19 10:34:13'),
(42, 4, 3, 'hi prashant', 0, '2019-02-19 10:34:18'),
(43, 4, 3, 'kem che apadi application', 0, '2019-02-19 10:34:33'),
(44, 3, 4, 'jor', 0, '2019-02-19 10:34:43'),
(45, 4, 3, 'to marabar', 0, '2019-02-19 10:35:03'),
(46, 3, 4, 'complete thai gai\n', 0, '2019-02-19 10:35:23'),
(47, 4, 3, 'haju ama \nREGISTRATION,\nMEDIA SENDING,\nbaki che\n', 0, '2019-02-19 10:35:38'),
(48, 3, 4, 'ok', 0, '2019-02-19 10:35:53'),
(49, 4, 3, 'media send kem karaveu aa jovu padashe\n', 0, '2019-02-19 10:36:00'),
(50, 3, 4, 'to kari de baki complete se', 0, '2019-02-19 10:36:23'),
(51, 4, 3, 'notification barabar kam kare che k nai', 0, '2019-02-19 10:36:23'),
(52, 3, 4, 'ha', 0, '2019-02-19 10:36:38'),
(53, 5, 1, 'hi', 0, '2019-02-19 10:43:48'),
(54, 1, 5, 'halyu halyu\n', 0, '2019-02-19 10:43:59'),
(55, 5, 1, 'yo bro', 0, '2019-02-19 10:44:11'),
(56, 1, 5, 'message bdha database ma store thay ch ??', 0, '2019-02-19 10:44:22'),
(57, 5, 1, 'ha', 0, '2019-02-19 10:44:31'),
(58, 1, 5, 'jbru', 0, '2019-02-19 10:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `last_activity`, `status`) VALUES
(1, 'mishan2512@gmail.com', '123123123', '2019-02-19 13:31:55', 1),
(2, 'mishan@gmail.com', '123123123', '2019-02-19 04:59:11', 0),
(3, 'hv@gmail.com', '123123123', '2019-02-19 10:43:28', 1),
(4, 'prashant@gmail.com', '123123123', '2019-02-19 10:46:24', 0),
(5, 'sagar@gmail.com', '123123123', '2019-02-19 10:56:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `status`, `last_activity`) VALUES
(1, 1, 0, '2019-02-19 04:16:41'),
(2, 2, 0, '2019-02-18 13:28:32'),
(3, 3, 0, '2019-02-18 13:12:04'),
(4, 0, NULL, '2019-02-19 10:33:16'),
(5, 0, NULL, '2019-02-19 10:43:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
