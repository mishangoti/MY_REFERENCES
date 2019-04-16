-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 06:16 AM
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
-- Database: `business`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `created_at`) VALUES
(4, 'Sergen', '2019-01-08 10:11:08'),
(5, 'designer', '2019-01-08 10:11:08'),
(6, 'marketing', '2019-01-08 10:11:08'),
(7, 'CMS Mashine Design\r\n', '2019-01-08 10:11:08'),
(8, 'CMS Mashine Research', '2019-01-08 10:11:08'),
(9, 'Dental', '2019-01-08 10:11:08'),
(10, 'Nurologist', '2019-01-08 10:11:08'),
(12, 'Minning', '2019-01-08 10:11:08'),
(16, 'M.B.B.S', '2019-01-08 10:11:08'),
(17, 'CPU', '2019-01-08 13:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `created_at`) VALUES
(1, 'Doctore', '2019-01-08 05:19:11'),
(2, 'I. T.', '2019-01-08 05:36:57'),
(3, 'Mechanical', '2019-01-08 05:36:57'),
(4, 'Computer', '2019-01-08 08:19:54'),
(5, 'Computer12', '2019-01-08 13:24:44'),
(6, 'Computer12', '2019-01-08 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `category_business`
--

CREATE TABLE `category_business` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_business`
--

INSERT INTO `category_business` (`id`, `category_id`, `business_id`, `created_at`) VALUES
(1, 1, 9, '2019-01-08 05:35:41'),
(2, 1, 10, '2019-01-08 05:36:00'),
(3, 1, 4, '2019-01-08 05:36:09'),
(5, 2, 5, '2019-01-08 05:37:24'),
(6, 2, 6, '2019-01-08 05:37:33'),
(7, 2, 12, '2019-01-08 05:37:43'),
(8, 3, 7, '2019-01-08 05:39:07'),
(9, 3, 8, '2019-01-08 05:39:07'),
(10, 1, 16, '2019-01-08 10:01:21'),
(11, 5, 17, '2019-01-08 13:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `user_id`, `business_id`, `image`, `created_at`) VALUES
(5, 42, 17, 'media/15469540212.jpeg', '2019-01-08 13:27:01'),
(6, 42, 17, 'media/15469540311.jpeg', '2019-01-08 13:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `multyple_business`
--

CREATE TABLE `multyple_business` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `business_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `multyple_business`
--

INSERT INTO `multyple_business` (`id`, `user_id`, `business_id`, `created_at`) VALUES
(40, 41, 12, '2019-01-08 10:11:34'),
(60, 42, 7, '2019-01-08 13:19:03'),
(61, 42, 8, '2019-01-08 13:19:07'),
(62, 42, 8, '2019-01-08 13:19:24'),
(63, 42, 10, '2019-01-08 13:24:37'),
(64, 42, 17, '2019-01-08 13:25:11'),
(65, 42, 9, '2019-01-08 13:34:22'),
(66, 42, 9, '2019-01-08 13:34:40'),
(67, 42, 5, '2019-01-08 13:35:31'),
(68, 42, 4, '2019-01-09 06:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adress` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `f_name`, `l_name`, `email`, `password`, `phone`, `adress`, `image`, `created_at`) VALUES
(35, 'mishan', '112312313', 'mishan2512@gmail.com', 'e569f78d8630b13ce1b46598aed0b2ae', '112312313', 'as', 'media/images.jpeg', '2019-01-07 10:49:03'),
(37, 'prashant', 'satani', 'prshant@asd.asd', '96e79218965eb72c92a549dd5a330112', '9090909090', 'miasdnasn,ads  ', NULL, '2019-01-07 08:26:22'),
(42, 'test', '', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '', 'test, test', 'media/1546953724upload.png', '2019-01-08 13:22:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_business`
--
ALTER TABLE `category_business`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `multyple_business`
--
ALTER TABLE `multyple_business`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_business`
--
ALTER TABLE `category_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `multyple_business`
--
ALTER TABLE `multyple_business`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_business`
--
ALTER TABLE `category_business`
  ADD CONSTRAINT `category_business_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_business_ibfk_2` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `images_ibfk_2` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `multyple_business`
--
ALTER TABLE `multyple_business`
  ADD CONSTRAINT `multyple_business_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
