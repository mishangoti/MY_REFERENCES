-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 06:18 AM
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
-- Database: `task_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `auther_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `auther_name`, `title`, `description`, `created_at`) VALUES
(1, 'mishan', 'Mission Imposible', 'On movie is developed on the bases of the book', '2019-01-11 10:09:55'),
(2, 'Prof. Trushang', 'What Is Trushang?', 'This book is about trushang.', '2019-01-11 10:36:33'),
(5, 'This Is My \"World\"', 'Mishan', 'This book is about world', '2019-01-17 12:24:13'),
(6, 'This Is My \"World\"', 'Mishan', 'This book is about world', '2019-01-17 12:25:33'),
(7, 'This Is My \"World\"', 'Mishan', 'This book is about world', '2019-01-17 12:25:36'),
(8, 'This Is My \"World\"', 'Mishan', 'asdmjuagsoidhasiusadu', '2019-01-17 12:26:53'),
(9, 'This Is My \"World\"', 'Krupal', 'asdasdmiuahgwouicb\r\n', '2019-01-17 12:27:49'),
(10, 'This Is My \"World\"', 'Mishan', 'asdass', '2019-01-17 12:30:38'),
(11, 'sd', 'asdasd', 'asdasd', '2019-01-17 12:31:34'),
(12, 'This Is My \"World\"', 'asd', 'asdas', '2019-01-17 12:31:56'),
(13, 'hello', 'hi', 'tkksdcnkxnk sdnkcnkn', '2019-01-17 12:43:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auther_id` (`auther_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
