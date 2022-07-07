-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2019 at 09:04 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abppreve_proli`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifyfa`
--

CREATE TABLE `notifyfa` (
  `id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL,
  `sto` varchar(30) NOT NULL,
  `sfrom` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `rp` int(11) NOT NULL,
  `delf` int(11) NOT NULL,
  `delt` int(11) NOT NULL,
  `nt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifyfa`
--

INSERT INTO `notifyfa` (`id`, `time`, `sto`, `sfrom`, `content`, `date`, `rp`, `delf`, `delt`, `nt`) VALUES
(1, '2019-01-08 17:48:20', '5', 'admin', 'This is to notify you that an order has been forwarded to you at Tue 08 Jan 2019 17:45:05 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-08', 1, 0, 0, 0),
(2, '2019-01-08 17:51:23', '5', 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-01-08', 1, 0, 0, 0),
(3, '2019-01-09 01:47:06', '5', 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-01-09', 0, 0, 0, 0),
(4, '2019-01-09 02:16:06', '32', 'admin', 'This is to notify you that an order has been forwarded to you at Wed 09 Jan 2019 02:12:45 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-09', 1, 0, 0, 0),
(5, '2019-01-09 02:18:24', '32', 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(6, '2019-01-09 14:26:15', '0', 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(8, '2019-01-09 14:49:51', '32', 'admin', 'This is to notify you that an order has been forwarded to you at Wed 09 Jan 2019 14:45:48 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-09', 1, 0, 0, 0),
(9, '2019-01-09 14:58:18', '32', 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(10, '2019-01-09 14:58:18', '0', 'admin', 'logistics wit id 32 has to acknowledge an order ', '2019-01-09', 1, 0, 1, 0),
(11, '2019-01-09 15:21:41', '32', 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 0, 0, 0, 0),
(12, '2019-01-09 15:21:41', '0', 'admin', 'logistics with id 32 has  fail to acknowledge an order ', '2019-01-09', 0, 0, 0, 0),
(13, '2019-01-11 06:54:53', 'a5632471890', 'admin', 'Congrat, One of your Product has been confirmed', '2019-01-11', 0, 0, 0, 0),
(14, '2019-01-11 23:01:27', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-01-11', 1, 0, 0, 0),
(21, '2019-01-18 04:34:08', 'f3058714269', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-18', 0, 0, 0, 0),
(23, '2019-01-19 00:53:06', 'a8729514063', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-19', 0, 0, 0, 0),
(30, '2019-02-15 07:55:30', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(31, '2019-02-15 08:47:48', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(32, '2019-02-15 08:47:51', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(33, '2019-02-15 08:48:46', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(34, '2019-02-15 08:49:06', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(35, '2019-02-15 08:51:53', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(36, '2019-02-15 09:07:17', '9', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(37, '2019-02-15 09:10:51', '3', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(38, '2019-02-15 09:12:30', '2', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(39, '2019-02-15 09:17:53', '6', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(40, '2019-02-15 09:25:15', '2', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(41, '2019-02-15 09:27:41', '6', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(42, '2019-02-15 10:07:07', '6', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(43, '2019-02-15 10:12:54', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(44, '2019-02-15 10:22:00', '2', 'admin', 'Sorry, One of your Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(45, '2019-02-15 12:11:37', '', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(46, '2019-02-15 12:12:56', '', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(47, '2019-02-15 12:13:48', 'banana@gmail.com', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(48, '2019-02-15 12:13:50', 'banana@gmail.com', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(49, '2019-02-15 12:13:50', 'banana@gmail.com', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(50, '2019-02-15 12:14:07', 'banana@gmail.com', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(51, '2019-02-15 12:15:22', 'banana@gmail.com', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(52, '2019-02-15 12:16:34', 'banana@gmail.com', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(53, '2019-02-15 12:53:09', 'adioadeyoriazeez@gmail.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(56, '2019-02-17 20:18:31', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-17', 1, 0, 1, 0),
(58, '2019-02-18 15:14:18', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-02-18', 0, 0, 0, 0),
(59, '2019-01-11 23:01:27', 'f3058714269', 'admin', 'Congrat, One of your Product has been confirmed', '2019-01-11', 1, 0, 0, 0),
(60, '2019-01-18 04:14:54', 'a5326790814', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-18', 1, 0, 0, 0),
(61, '2019-01-18 04:14:54', 'a5326790814', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-18', 0, 0, 0, 0),
(62, '2019-01-18 04:14:54', 'a5326790814', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-18', 1, 0, 0, 0),
(63, '2019-01-18 04:34:07', 'a5326790814', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-18', 1, 0, 0, 0),
(64, '2019-04-13 13:28:32', 'jobsiteonlyforadeyori@gmail.co', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-13', 0, 0, 0, 0),
(65, '2019-04-13 13:46:39', 'jobsiteonlyforadeyori@gmail.co', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-13', 0, 0, 0, 0),
(66, '2019-04-14 16:38:54', 'adioadeyoriazeez@yahoo.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(67, '2019-04-14 16:46:25', 'adioadeyoriazeez@yahoo.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(68, '2019-04-14 16:51:55', 'adioadeyoriazeez@yahoo.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(69, '2019-04-14 16:52:43', 'adioadeyoriazeez@yahoo.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(70, '2019-04-14 17:00:18', 'adioadeyoriazeez3@yahoo.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(71, '2019-04-14 17:08:40', 'adioadeyoriazeez@gmail3.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(72, '2019-04-15 17:05:23', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-04-15', 0, 0, 0, 0),
(73, '2019-04-15 17:11:30', '1', 'admin', 'Sorry, One of your Product has been rejected', '2019-04-15', 0, 0, 0, 0),
(74, '2019-04-17 00:45:17', 'jobsiteonlyforadeyori@gmail.co', 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-17', 0, 0, 0, 0),
(75, '2019-04-17 01:04:31', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-04-17', 0, 0, 0, 0),
(76, '2019-04-17 01:04:38', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-04-17', 0, 0, 0, 0),
(77, '2019-05-13 19:37:25', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-13', 0, 0, 0, 0),
(78, '2019-05-13 19:37:33', 'a5326790814', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-13', 0, 0, 0, 0),
(79, '2019-05-13 19:44:31', 'adioadeyoriazeez@gmail.com', 'admin', 'Congrat, your document and your data has been screen and you have been confirmed', '2019-05-13', 0, 0, 0, 0),
(80, '2019-05-13 23:58:23', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-13', 0, 0, 0, 0),
(81, '2019-05-14 04:12:52', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(82, '2019-05-14 05:15:30', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(83, '2019-05-14 05:15:33', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(84, '2019-05-14 05:15:37', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(85, '2019-05-14 06:31:45', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(86, '2019-05-14 20:44:03', 'a5326790814', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(87, '2019-05-14 20:44:11', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(88, '2019-05-14 20:44:18', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(89, '2019-05-14 20:44:29', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(90, '2019-05-14 20:44:32', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(91, '2019-05-14 20:44:36', 'a5326790814', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(92, '2019-05-14 23:46:25', 'a8729514063', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(93, '2019-05-14 23:46:28', 'f4752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(94, '2019-05-15 06:42:41', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(95, '2019-05-15 06:42:44', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(96, '2019-05-15 06:42:47', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(97, '2019-05-15 06:42:50', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(98, '2019-05-15 06:42:53', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(99, '2019-05-15 06:42:56', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(100, '2019-05-15 06:42:59', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(101, '2019-05-15 06:43:02', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(102, '2019-05-15 06:43:04', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(103, '2019-05-15 06:43:07', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(104, '2019-05-15 06:43:10', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(105, '2019-05-15 06:43:12', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(106, '2019-05-15 06:43:15', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(107, '2019-05-15 06:43:17', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(108, '2019-05-15 06:43:21', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(109, '2019-05-15 06:43:24', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(110, '2019-05-15 06:43:27', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(111, '2019-05-15 06:43:30', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(112, '2019-05-15 06:43:32', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(113, '2019-05-15 06:43:34', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(114, '2019-05-15 07:15:03', 'f6870915469', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(115, '2019-05-15 07:27:20', 'f7752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(116, '2019-05-15 07:27:23', 'f7752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(117, '2019-05-15 07:27:26', 'f7752319608', 'admin', 'Congrat, One of your Product has been confirmed', '2019-05-15', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifyfa`
--
ALTER TABLE `notifyfa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifyfa`
--
ALTER TABLE `notifyfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
