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
-- Database: `task_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `offer_price` int(11) NOT NULL,
  `offer_stock` int(11) NOT NULL,
  `offer_starting_date` varchar(255) DEFAULT NULL,
  `offer_ending_date` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `offer_price`, `offer_stock`, `offer_starting_date`, `offer_ending_date`, `image`, `created_at`) VALUES
(12, 'mishan', 123, 123, 123213, 13, '05 September 1979 - ', '29 August 1979 - 05:', '', '2019-01-10 13:06:43'),
(13, 'mishan', 123, 123, 123213, 13, '05 September 1979 - 08:25 am', '29 August 1979 - 05:25 am', '', '2019-01-10 13:08:02'),
(14, 'mishan', 123, 123, 123213, 13, '05 September 1979 - 08:25 am', '29 August 1979 - 05:25 am', '', '2019-01-10 13:11:02'),
(15, 'mishan', 123, 123, 123, 123, '20 September 1979 - 05:30 am', '30 August 1979 - 03:10 am', '', '2019-01-10 13:11:20'),
(16, 'mishan', 123, 123, 123, 123, '13 September 1979 - 08:25 am', '29 August 1979 - 02:05 am', '', '2019-01-10 13:12:33'),
(17, 'sd', 158, 45564, 415, 54, '28 September 1979 - 05:30 am', '11 September 1979 - 08:30 am', '', '2019-01-10 13:15:49'),
(18, 'xdcs', 151, 652, 1465, 1561, '13 September 1979 - 09:30 am', '05 September 1979 - 03:25 am', '', '2019-01-10 13:17:52'),
(19, '', 0, 0, 0, 0, NULL, NULL, 'images/15471270361.jpeg', '2019-01-10 13:30:36'),
(20, '', 0, 0, 0, 0, NULL, NULL, 'images/1547195952bootstrap.min.js', '2019-01-11 08:39:12'),
(21, 'mishan', 123123, 1231, 132, 1231, '04 September 1979 - 07:25 am', '06 September 1979 - 05:30 am', '', '2019-01-12 04:26:12'),
(22, 'sagar', 12, 12, 12, 21, '20 September 1979 - 09:30 am', '30 August 1979 - 03:10 am', '', '2019-01-12 04:26:38'),
(23, '', 0, 0, 0, 0, NULL, NULL, 'images/1547269665download.jpeg', '2019-01-12 05:07:45'),
(24, '', 0, 0, 0, 0, NULL, NULL, 'images/1547269667download.jpeg', '2019-01-12 05:07:47'),
(25, '', 0, 0, 0, 0, NULL, NULL, 'images/1547269669download.jpeg', '2019-01-12 05:07:49'),
(26, '', 0, 0, 0, 0, NULL, NULL, 'images/1547269671download.jpeg', '2019-01-12 05:07:51'),
(27, '', 0, 0, 0, 0, NULL, NULL, 'images/1547269673download.jpeg', '2019-01-12 05:07:53'),
(28, '', 0, 0, 0, 0, NULL, NULL, 'images/1547269675download.jpeg', '2019-01-12 05:07:55'),
(29, '', 0, 0, 0, 0, NULL, NULL, 'images/1547269682download.jpeg', '2019-01-12 05:08:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
