-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2019 at 01:50 PM
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
-- Table structure for table `addressbook`
--

CREATE TABLE `addressbook` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `addstate` varchar(50) NOT NULL,
  `addregion` varchar(150) NOT NULL,
  `addaddress` varchar(225) NOT NULL,
  `addtelephone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addressbook`
--

INSERT INTO `addressbook` (`id`, `customer_id`, `addstate`, `addregion`, `addaddress`, `addtelephone`) VALUES
(2, 18, '30', '122', '564, calatbe abronue sgetet mete', '08064374030'),
(3, 18, '20', '332', 'onihata selectewe sotani maketete setere', '08064374034'),
(4, 18, '15', '88', '1123 bornata bronreba targataega tererte', '08064374077'),
(5, 109, '34', '1005', '114,yejide road molete ', '08064374020'),
(6, 108, '32', '668', 'road 4 plot 21, favourland estate lifecamp, 21', '09087675434'),
(7, 18, '1', '2', '7a, otunubi street off college road, haruna b/stop, ogba', '090989710194'),
(8, 18, '15', '320', 'ABAKALIK', '090989710134'),
(9, 112, '31', '948', '114, Yejide road molete', '08064374020'),
(11, 32, '12', '207', '114, Yejide road molete', '08064374020'),
(14, 112, '8', '102', '114, Yejide road molete', '08064374020'),
(21, 12, '9', '108', 'Abra aka umuta biase akwa ibom', '098158304888'),
(41, 12, '7', '95', '3232322213232wwqewew', '12132312312321323232'),
(42, 12, '4', '50', '1232323232323', '121323232323232'),
(43, 12, '2', '7', 'sadswds', '1212');

-- --------------------------------------------------------

--
-- Table structure for table `admbank`
--

CREATE TABLE `admbank` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(40) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `accounnumber` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `bkid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admbank`
--

INSERT INTO `admbank` (`id`, `fn`, `ln`, `bankname`, `accounnumber`, `email`, `bkid`) VALUES
(1, 'Adelani', 'Adeyori', 'skye', 1234567890, '', '4WdInUXn6465');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fn` varchar(20) NOT NULL,
  `mn` varchar(20) NOT NULL,
  `ln` varchar(20) NOT NULL,
  `ge` varchar(20) NOT NULL,
  `ag` varchar(20) NOT NULL,
  `ad` varchar(120) NOT NULL,
  `st` varchar(20) NOT NULL,
  `re` varchar(20) NOT NULL,
  `tk` varchar(64) NOT NULL,
  `pn` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `quali` varchar(20) NOT NULL,
  `quali2` varchar(20) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `img` varchar(225) NOT NULL,
  `de` int(11) NOT NULL,
  `log` varchar(60) NOT NULL,
  `pe1` int(11) NOT NULL,
  `pe2` int(11) NOT NULL,
  `pe3` int(11) NOT NULL,
  `pe4` int(11) NOT NULL,
  `pe5` int(11) NOT NULL,
  `pe6` int(11) NOT NULL,
  `pe7` int(11) NOT NULL,
  `pe8` int(11) NOT NULL,
  `pe9` int(11) NOT NULL,
  `pe10` int(11) NOT NULL,
  `pe11` int(11) NOT NULL,
  `pe12` int(11) NOT NULL,
  `pe13` int(11) NOT NULL,
  `pe14` int(11) NOT NULL,
  `pe15` int(11) NOT NULL,
  `pe16` int(11) NOT NULL,
  `al` int(11) NOT NULL,
  `about` text NOT NULL,
  `conf` int(11) NOT NULL,
  `confd` varchar(40) NOT NULL,
  `ap` int(11) NOT NULL,
  `pach` int(11) NOT NULL,
  `paup` int(11) NOT NULL,
  `pachdate` varchar(40) NOT NULL,
  `cvimg` varchar(225) NOT NULL,
  `certimg` varchar(225) NOT NULL,
  `ppw` varchar(200) NOT NULL,
  `rep` varchar(200) NOT NULL,
  `bkid` varchar(120) NOT NULL,
  `ye` int(11) NOT NULL,
  `pe` varchar(225) NOT NULL,
  `sec` varchar(225) NOT NULL,
  `te` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fn`, `mn`, `ln`, `ge`, `ag`, `ad`, `st`, `re`, `tk`, `pn`, `email`, `password`, `salt`, `quali`, `quali2`, `sn`, `date`, `time`, `img`, `de`, `log`, `pe1`, `pe2`, `pe3`, `pe4`, `pe5`, `pe6`, `pe7`, `pe8`, `pe9`, `pe10`, `pe11`, `pe12`, `pe13`, `pe14`, `pe15`, `pe16`, `al`, `about`, `conf`, `confd`, `ap`, `pach`, `paup`, `pachdate`, `cvimg`, `certimg`, `ppw`, `rep`, `bkid`, `ye`, `pe`, `sec`, `te`) VALUES
(13, 'Tim', 'Bulcka', 'tachjachi', 'Male', '30-12-2009', '114, yedide', 'osun', 'nigeria', 'vegs.jpg', '08064374020', 'adioadeyoriazdsee@gmail.com', '1c7009463ec2a78cc3e1495afa8747a87ed4ef748581254b7ea7f462d96a51a7', 'x&‘Ú§›×Ì‡¤RÞ@N°ßƒ=J¹Žðø§ÆŠ8', 'biochemisrt', 'computing', '3', 'Sat May 2018 ', '01:49:03', 'VdmndH9ZA2GQ.jpg', 1, '1547867631', 0, 0, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 1, 'Grandmotherprogrammer, programmed for  80 years and still a programmer at 96', 1, '1555279200', 19, 0, 0, '', 'tomato.jpeg', 'tomato.jpeg', '', '', '', 9, '', '', ''),
(19, 'Adio', 'azeez', 'Adeyori', 'Male', '49', '114 yejide', '13', '120', '', '090989710194', 'adioadeyoriazeez2@gmail.com', 'f601f92766a8d1b2c763faf7aa36da5435f6cde203122024b8318276de26d068', 'Ý^äiHwž“p\'bKDƒ¸pX­2ŸECwmIXp', 'Biochemist', '', '', '2018-12-20', '17:17:34', 'fSRjeQGD2E9d.jpg', 8, '1555445421', 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Grandfather programmer, programmed for  80 years and still a programmer at 96', 1, '1555279200', 19, 0, 0, '', 'tomato.jpeg', 'tomato.jpeg', '', '', '', 5, '', '', ''),
(20, 'Adio', 'azeez', 'adeyori', 'Male', '30', 'ABAKALIKI', '5', '30', '', '08064374020', 'jobsiteonlyforadeyor2i@gmail.com', '606a00c0ec78b4a80475b3e8a111acae9faf9bfed0184f601857ef102dee76ca', '–ÕOïWû\0ÞËÈ /LQÞh{\Z`î`n\Z#zè{g·q', 'Biochemist', '', '09087654356', '2018-12-29', '23:32:35', 'sHO0GcY6jnd3.jpg', 8, '1550525270', 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Grandfather programmer, programmed for  80 years and still a programmer at 96', 0, '1555279200', 19, 1, 19, '1555279200', 'tomato.jpeg', 'tomato.jpeg', '', '', '', 8, '', '', ''),
(22, 'Adio', 'Azeez', 'Adeyori', 'Male', '49', 'Ebonyi state abakalili', '28', '824', '', '5', 'adioadeyoriazeez@gmail.com', '7e0814922e1e51a5721e77a3416efa07b3b17f35fc93ec45a051dcfc1f9df7dd', '×ýƒ•£š`-t¨[yphf´†w’™¨ýl·Œ2¹ª´', 'biochemistry', 'Programming', '', '2019-04-16', '17:24:51', 'r9GhQ9GnjdiO.jpg', 5, '1558064469', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '', 1, '1555884000', 22, 0, 0, '', 'DGaf3dZ5hrMd.jpg', 'b12fiEe5o9YP.jpg', 'Ibadan grammer', 'Biology Teacher', '4WdInUXn6465', 8, 'Adenrele primary school ifo', 'Adenrele secondary school ifo', 'Obafemi awolowo university');

-- --------------------------------------------------------

--
-- Table structure for table `admin_session`
--

CREATE TABLE `admin_session` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `session` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `aggfarlist`
--

CREATE TABLE `aggfarlist` (
  `id` int(11) NOT NULL,
  `apid` varchar(50) NOT NULL,
  `fpid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aggfarlist`
--

INSERT INTO `aggfarlist` (`id`, `apid`, `fpid`) VALUES
(11, 'a5326790814', 'f4752319608');

-- --------------------------------------------------------

--
-- Table structure for table `aggregators`
--

CREATE TABLE `aggregators` (
  `id` int(11) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `agid` varchar(200) NOT NULL,
  `fn` varchar(150) NOT NULL,
  `mn` varchar(150) NOT NULL,
  `ln` varchar(150) NOT NULL,
  `ge` varchar(50) NOT NULL,
  `ag` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `bn` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `state` varchar(120) NOT NULL,
  `location` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `img` varchar(224) NOT NULL,
  `joined` int(200) NOT NULL,
  `regday` int(11) NOT NULL,
  `grp` int(11) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(222) NOT NULL,
  `pt` varchar(50) NOT NULL,
  `tk` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `log` int(11) NOT NULL,
  `puvc` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(40) NOT NULL,
  `conf` int(11) NOT NULL,
  `confd` varchar(40) NOT NULL,
  `ap` int(11) NOT NULL,
  `gn` varchar(200) NOT NULL,
  `gemail` varchar(220) NOT NULL,
  `gpn` varchar(30) NOT NULL,
  `gmi` varchar(64) NOT NULL,
  `fad` varchar(500) NOT NULL,
  `ft` int(40) NOT NULL,
  `pach` int(11) NOT NULL,
  `paup` int(11) NOT NULL,
  `pachdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aggregators`
--

INSERT INTO `aggregators` (`id`, `pid`, `agid`, `fn`, `mn`, `ln`, `ge`, `ag`, `email`, `bn`, `password`, `salt`, `state`, `location`, `address`, `telephone`, `img`, `joined`, `regday`, `grp`, `bk`, `bkid`, `pt`, `tk`, `time`, `log`, `puvc`, `about`, `sn`, `conf`, `confd`, `ap`, `gn`, `gemail`, `gpn`, `gmi`, `fad`, `ft`, `pach`, `paup`, `pachdate`) VALUES
(24, 'a5326790814', '', 'Adelani', 'azeez', 'Adelani', 'Male', '30', 'adioadeyoriazeez@gmail.com', 'azFarmex', '65080dad3f70b24d37b9f3428269c0df1dfa66c2e5e44c6cada871426344021e', 'Š¡uï!ñy Ö£Ð\0EÎý­\\%ó´‹|êŠ†OqxÂ', '12', '205', '7a, otunubi street off college road, haruna b/stop, ogba', '08064374020', 'd0EnAdrMAJQo.jpg', 1554821243, 1547637105, 1, 1, 'sqBpoeAmHGDFCrE', '', '', '17:47:12', 1557859867, '', '', '', 1, '1547679600', 13, '', '', '', '', '', 0, 0, 0, ''),
(26, 'a8729514063', '', 'Adelanio', 'babalola', 'Adeyori', 'Female', '49', 'jobsiteonlyforadeyori@gmail.com', 'azFarmexsdfg', '8a36865ef8bbbe1198239ca5737dd5521f1856e467bdc00c546c8789945e4ed5', 'þäX‹µr~,O1MÝ)±ºŒ[hoyœX#bYT¸', '8', '101', '7a, otunubi street off college road, haruna b/stop, ogba', '090989710178', 'Sgi5aMWtH2rV.jpg', 1547855014, 1547855014, 1, 1, 'AeroFGpmECHsBqD', '', '5e20b6d59f0c5ce72287c7069f776139', '1547909014', 1547886352, '', '', '', 1, '1555452000', 13, 'adebegbe', 'adebegbr@gmai.com', '09087345788', 'Ps0SiHU9jntu.jpg', '', 0, 0, 0, ''),
(28, 'a8729514069', '', 'Aderemi', 'Ambimbola', 'wunmi', 'Male', '59', 'adewunmi@gmail.com', 'azFarmexsdfguij', '5edf419dcbbf0ff963982adbdbace7d310fdc212e5fa8dfbc275ea0a0e8f514b', 'CvÔå´±‰/)4^vLšÐdVªT˜Ñx.$#ÌŸZŠ^i', '7', '96', '7a, otunubi street off college road, haruna b/stop, ogba', '090989710195', 'fhP2og0GKy9h.jpg', 1547855014, 1547855014, 1, 1, 'AeroFGpmECHsBqD', '', '5e20b6d59f0c5ce72287c7069f776139', '1547909014', 1547886352, '', '', '', 1, '1555452000', 13, 'adebegbe', 'adebegbr@gmai.com', '09087345788', '3nsDdorHP3bf.jpg', '', 0, 1, 19, '1555192800');

-- --------------------------------------------------------

--
-- Table structure for table `agg_session`
--

CREATE TABLE `agg_session` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agg_session`
--

INSERT INTO `agg_session` (`id`, `users_id`, `hash`) VALUES
(4, 16, '6f56f78b85049b752e7d641b11de1e61a8aaf0c120ad8695ad'),
(7, 26, '1137b7ab9a57cfa58bc97d4d3f9708c9456e3c2344c646f483');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_id`, `cate_name`) VALUES
(1, 1, 'dairies'),
(2, 2, 'fruits'),
(3, 3, 'grains'),
(4, 4, 'livestock'),
(5, 5, 'nuts'),
(6, 6, 'oil'),
(7, 7, 'poultry'),
(8, 8, 'sea_produce'),
(9, 9, 'spices'),
(10, 10, 'tubers'),
(11, 11, 'vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `codetable`
--

CREATE TABLE `codetable` (
  `id` int(11) NOT NULL,
  `war_id` int(11) NOT NULL,
  `dcode` varchar(120) NOT NULL,
  `date` varchar(20) NOT NULL,
  `prefix` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codetable`
--

INSERT INTO `codetable` (`id`, `war_id`, `dcode`, `date`, `prefix`) VALUES
(1, 14, '14wa2ElUvBhP', '1557698400', 'w'),
(2, 14, '14waRJHYMosj', '1557698400', 'w'),
(3, 14, '14waBb02uEki', '1557698400', 'w'),
(4, 14, '14wapov6TBNE', '1557698400', 'w'),
(5, 14, '14waV4iLQBhI', '1557698400', 'w'),
(6, 14, '14wa0MDktfpv', '1557698400', 'w'),
(7, 14, '14wa7tYQhknj', '1557698400', 'w'),
(8, 14, '14wau7XPN1b6', '1557698400', 'w'),
(9, 14, '14watkdoNm1K', '1557698400', 'w'),
(10, 14, '14waYUkIxqgd', '1557698400', 'w'),
(11, 14, '14wagXMvKAFe', '1557698400', 'w'),
(12, 14, '14waex4mPbAQ', '1557698400', 'w'),
(13, 14, '14waMQU5REVJ', '1557698400', 'w'),
(14, 14, '14waRojgMk1L', '1557698400', 'w'),
(15, 14, '14waX6SOrVK3', '1557698400', 'w'),
(16, 14, '14waJG8Q7lxA', '1557698400', 'w'),
(17, 14, '14wauQyVk56v', '1557698400', 'w'),
(18, 14, '14waD82J5RVM', '1557698400', 'w'),
(19, 14, '14waqo8BgHEX', '1557698400', 'w'),
(20, 14, '14waU7HkTXOj', '1557698400', 'w'),
(21, 14, '14wanxoNKXUX', '1557698400', 'w'),
(22, 14, '14wa8zEiRAhk', '1557698400', 'w'),
(23, 14, '14wayD4dlE8r', '1557698400', 'w'),
(24, 14, '14wajYXVvz8q', '1557698400', 'w'),
(25, 14, '14wa6FT0RUOr', '1557698400', 'w'),
(26, 14, '14wasEFXkLxn', '1557698400', 'w'),
(27, 14, '14waR8Ye7foF', '1557698400', 'w'),
(28, 14, '14waXINmoY0H', '1557698400', 'w'),
(29, 14, '14wayT7lS0uI', '1557698400', 'w'),
(30, 14, '14wajhYTE07B', '1557698400', 'w'),
(31, 14, '14wazXGqFmLg', '1557698400', 'w'),
(32, 14, '14walsKN6i8x', '1557698400', 'w'),
(33, 14, '14waXcY3P5Sf', '1557698400', 'w'),
(34, 14, '14wa5XxejTpS', '1557698400', 'w'),
(35, 14, '14wa1JTLXy4r', '1557698400', 'w'),
(36, 14, '14waombsf3OX', '1557698400', 'w'),
(37, 14, '14waABxSXFqY', '1557698400', 'w'),
(38, 14, '14waiUP7Db8I', '1557698400', 'w'),
(39, 14, '14wavs3qVn82', '1557698400', 'w'),
(40, 14, '14wa8Gh19zXB', '1557698400', 'w'),
(41, 14, '14waEuK2PJvo', '1557698400', 'w'),
(42, 14, '14waOgYvnq7s', '1557698400', 'w'),
(43, 14, '14wa29gHxRqU', '1557698400', 'w'),
(44, 14, '14wayceA0dJN', '1557698400', 'w'),
(45, 14, '14waYLEBV2k9', '1557698400', 'w'),
(46, 14, '14waMV3YpSXH', '1557698400', 'w'),
(47, 14, '14walmhuexdJ', '1557698400', 'w'),
(48, 14, '14wa9zEo0k5D', '1557698400', 'w'),
(49, 14, '14wa4Xvb8LiH', '1557698400', 'w'),
(50, 14, '14wavzTAu7VF', '1557698400', 'w'),
(51, 14, '14wayP5XSJK2', '1557698400', 'w'),
(52, 14, '14waTztY0MEm', '1557698400', 'w'),
(53, 14, '14wa6qIunHXG', '1557698400', 'w'),
(54, 14, '14wasqfd4p2y', '1557698400', 'w'),
(55, 14, '14waEpXuBxmM', '1557698400', 'w'),
(56, 14, '14waoLn0EtTr', '1557698400', 'w'),
(57, 14, '14wa2GSnuqge', '1557698400', 'w'),
(58, 14, '14waEsGjuKQL', '1557698400', 'w'),
(59, 14, '14waxOqXk9HA', '1557698400', 'w'),
(60, 14, '14waGAP0MTtu', '1557698400', 'w'),
(61, 14, '14waKDFHtX69', '1557698400', 'w'),
(62, 14, '14wap6LD3kQ1', '1557698400', 'w'),
(63, 14, '14waYI9PMOsS', '1557698400', 'w'),
(64, 14, '14waLlJXsSqE', '1557698400', 'w'),
(65, 14, '14wazK2SyXes', '1557698400', 'w'),
(66, 14, '14waPq6c41g9', '1557698400', 'w'),
(67, 14, '14waH41xkXNG', '1557698400', 'w'),
(68, 14, '14wa8XDFjkUe', '1557698400', 'w'),
(69, 14, '14waAuLOJKRb', '1557698400', 'w'),
(70, 14, '14wazt6hRlds', '1557698400', 'w'),
(71, 14, '14waYHivESq2', '1557698400', 'w'),
(72, 14, '14wa6U0EiAbG', '1557698400', 'w'),
(73, 14, '14wamrJdXM9x', '1557698400', 'w'),
(74, 14, '14waA1yTDtxd', '1557698400', 'w'),
(75, 14, '14waMUEJpXrn', '1557698400', 'w'),
(76, 14, '14wafsBHM209', '1557698400', 'w'),
(77, 14, '14waOL2Bc4bE', '1557698400', 'w'),
(78, 14, '14waB0b7irOt', '1557698400', 'w'),
(79, 14, '14waUtmcLuf2', '1557698400', 'w'),
(80, 14, '14waoAfDL6qi', '1557698400', 'w'),
(81, 14, '14waSiTQD3pX', '1557698400', 'w'),
(82, 14, '14waG2tIPHOd', '1557698400', 'w'),
(83, 14, '14wa2RAyFuEv', '1557698400', 'w'),
(84, 14, '14waLEIkz4ME', '1557698400', 'w'),
(85, 14, '14walm52BeYh', '1557698400', 'w'),
(86, 14, '14wa8KLIDpNY', '1557698400', 'w'),
(87, 14, '14watUHyzrIi', '1557698400', 'w'),
(88, 14, '14wavx7NhrSD', '1557698400', 'w'),
(89, 14, '14waQ8fNxI7n', '1557698400', 'w'),
(90, 14, '14wafbA3yQ8q', '1557698400', 'w'),
(91, 14, '14wak1tdX9cV', '1557698400', 'w'),
(92, 14, '14wambHiFefR', '1557698400', 'w'),
(93, 14, '14wasFB6g0r5', '1557698400', 'w'),
(94, 14, '14waG9EzdFnc', '1557698400', 'w'),
(95, 14, '14wagbi9rdK7', '1557698400', 'w'),
(96, 14, '14wauXOpN9LS', '1557698400', 'w'),
(97, 14, '14waezoIhEYG', '1557698400', 'w'),
(98, 14, '14waqx3nj8Mh', '1557698400', 'w'),
(99, 14, '14waTPHpyE7k', '1557698400', 'w'),
(100, 14, '14waKUuMQznf', '1557698400', 'w'),
(101, 14, '14wanVBiRKIk', '1557698400', 'w'),
(102, 14, '14waLiSh3X7Q', '1557698400', 'w'),
(103, 14, '14wah6kFQPx2', '1557698400', 'w'),
(104, 14, '14wa6leVYQXc', '1557698400', 'w'),
(105, 14, '14waY439ERX1', '1557698400', 'w'),
(106, 14, '14watylzPqc8', '1557698400', 'w'),
(107, 14, '14waK8d3jerl', '1557698400', 'w'),
(108, 14, '14waDLf60HxB', '1557698400', 'w'),
(109, 14, '14wa3yfodVQB', '1557698400', 'w'),
(110, 14, '14waI2EMSexY', '1557698400', 'w'),
(111, 14, '14wa40M7ncip', '1557698400', 'w'),
(112, 14, '14wahe9QdoLA', '1557698400', 'w'),
(113, 14, '14wa1SpkNi3G', '1557698400', 'w'),
(114, 14, '14wa9z1H8n47', '1557698400', 'w'),
(115, 14, '14waqVeXLokH', '1557698400', 'w'),
(116, 14, '14wa4lVMecmg', '1557698400', 'w'),
(117, 14, '14wagquDbloX', '1557698400', 'w'),
(118, 14, '14waELoPNlO4', '1557698400', 'w'),
(119, 14, '14wazdSXf5pT', '1557698400', 'w'),
(120, 14, '14waotQ7Phx5', '1557698400', 'w'),
(121, 14, '14wajOHF1oy7', '1557698400', 'w'),
(122, 14, '14waqtEgjKSb', '1557698400', 'w'),
(123, 14, '14waNuIrv4ty', '1557698400', 'w'),
(124, 14, '14waRuzGVi9d', '1557698400', 'w'),
(125, 14, '14waPqdbO3tn', '1557698400', 'w'),
(126, 14, '14waMA2En3BF', '1557698400', 'w'),
(127, 14, '14waQpEleBJd', '1557698400', 'w'),
(128, 14, '14wajKhqIEr5', '1557698400', 'w'),
(129, 14, '14walOcRr7sp', '1557698400', 'w'),
(130, 14, '14waFsAfldcu', '1557698400', 'w'),
(131, 14, '14wavRyFXspl', '1557698400', 'w'),
(132, 14, '14wa5BrkVtI2', '1557698400', 'w'),
(133, 14, '14wabo9XFO3I', '1557698400', 'w'),
(134, 14, '14waG6msEiQ1', '1557698400', 'w'),
(135, 14, '14wapU0FyAhQ', '1557698400', 'w'),
(136, 14, '14waNbEIiv4M', '1557698400', 'w'),
(137, 14, '14waNTOmVrGR', '1557698400', 'w'),
(138, 14, '14wap29FXxRq', '1557698400', 'w'),
(139, 14, '14wavcdOq1YA', '1557698400', 'w'),
(140, 14, '14waBmur4HlE', '1557698400', 'w'),
(141, 14, '14waveYcjSqb', '1557698400', 'w'),
(142, 14, '14wa05oX1XA3', '1557698400', 'w'),
(143, 14, '14wazV7HBr9v', '1557698400', 'w'),
(144, 14, '14wahcxsXiPm', '1557698400', 'w'),
(145, 14, '14wan7hpYzXo', '1557698400', 'w'),
(146, 14, '14wae0PjXUFl', '1557698400', 'w'),
(147, 14, '14wamG30y6f5', '1557698400', 'w'),
(148, 14, '14waJA70SIhb', '1557698400', 'w'),
(149, 14, '14wanUlATzm9', '1557698400', 'w'),
(150, 14, '14wa6DsEjzGJ', '1557698400', 'w'),
(151, 14, '14wayEYRJviS', '1557698400', 'w'),
(152, 14, '14waH1X25l4U', '1557698400', 'w'),
(153, 14, '14waOi9hlFB3', '1557698400', 'w'),
(154, 14, '14wasi4lpEO2', '1557698400', 'w'),
(155, 14, '14wanN8ES69J', '1557698400', 'w'),
(156, 14, '14wamer0D8Nb', '1557698400', 'w'),
(157, 14, '14watBRXm97X', '1557698400', 'w'),
(158, 14, '14waOBhcRDHm', '1557698400', 'w'),
(159, 14, '14waXYnV1gX8', '1557698400', 'w'),
(160, 14, '14waNcHI3lQu', '1557698400', 'w'),
(161, 14, '14waIekRclAJ', '1557698400', 'w'),
(162, 14, '14wafUr0gFTq', '1557698400', 'w'),
(163, 14, '14wahpHjyroS', '1557698400', 'w'),
(164, 14, '14wal2pXesXo', '1557698400', 'w'),
(165, 14, '14waobJL5mR2', '1557698400', 'w'),
(166, 14, '14watG9EbK8A', '1557698400', 'w'),
(167, 14, '14waIDXbgnsY', '1557698400', 'w'),
(168, 14, '14wasU1YIc8p', '1557698400', 'w'),
(169, 14, '14wamrPGqXlo', '1557698400', 'w'),
(170, 14, '14wauB5de27q', '1557698400', 'w'),
(171, 14, '14waJESfM9vb', '1557698400', 'w'),
(172, 14, '14waogKUkpcL', '1557698400', 'w'),
(173, 14, '14wa1xXp5QTS', '1557698400', 'w'),
(174, 14, '14wacgh14SHl', '1557698400', 'w'),
(175, 14, '14waG9pBs8kY', '1557698400', 'w'),
(176, 14, '14waPGruLbEk', '1557698400', 'w'),
(177, 14, '14wafeYk9BmX', '1557698400', 'w'),
(178, 14, '14waErfhDoOk', '1557698400', 'w'),
(179, 14, '14wamgAB9uHy', '1557698400', 'w'),
(180, 14, '14waecE3MNT5', '1557698400', 'w'),
(181, 14, '14waFvkNn2oX', '1557698400', 'w'),
(182, 14, '14wap6t1RUkE', '1557698400', 'w'),
(183, 14, '14waGfXMpO38', '1557698400', 'w'),
(184, 14, '14waMYkQPrt2', '1557698400', 'w'),
(185, 14, '14wa6LX94F2y', '1557698400', 'w'),
(186, 14, '14wacXGbeBxL', '1557698400', 'w'),
(187, 14, '14waPE1kbX8o', '1557698400', 'w'),
(188, 14, '14waPr2E5pLY', '1557698400', 'w'),
(189, 14, '14waDB4Fm5IA', '1557698400', 'w'),
(190, 14, '14waXgJb7Oit', '1557698400', 'w'),
(191, 14, '14waiXDlRGrE', '1557698400', 'w'),
(192, 14, '14waysp0IQud', '1557698400', 'w'),
(193, 14, '14wabdNvETRF', '1557698400', 'w'),
(194, 14, '14waLPl7j0ok', '1557698400', 'w'),
(195, 14, '14waETmFsiJK', '1557698400', 'w'),
(196, 14, '14wa5vRV2xgo', '1557698400', 'w'),
(197, 14, '14waFETQ7ftk', '1557698400', 'w'),
(198, 14, '14waFKi5JAzB', '1557698400', 'w'),
(199, 14, '14waDSmLA4Ec', '1557698400', 'w'),
(200, 14, '14waDxOyXfzu', '1557698400', 'w'),
(201, 15, '15waMoLlJI0g', '1557698400', 'w'),
(202, 15, '15waz84lIDYm', '1557698400', 'w'),
(203, 15, '15wam6Rx4XEN', '1557698400', 'w'),
(204, 15, '15walScqupQj', '1557698400', 'w'),
(205, 15, '15wahcMHpInl', '1557698400', 'w'),
(206, 15, '15wayhRlYvDV', '1557698400', 'w'),
(207, 15, '15wa14QKLt8N', '1557698400', 'w'),
(208, 15, '15waNX3oR6gX', '1557698400', 'w'),
(209, 15, '15waIX40bHnr', '1557698400', 'w'),
(210, 15, '15waEyM7xVuX', '1557698400', 'w'),
(211, 15, '15waleKhnIqP', '1557698400', 'w'),
(212, 15, '15waEs2v8AxI', '1557698400', 'w'),
(213, 15, '15wau7JKnf2T', '1557698400', 'w'),
(214, 15, '15wa2TF7xMBs', '1557698400', 'w'),
(215, 15, '15wa9Q2D4yVq', '1557698400', 'w'),
(216, 15, '15wa52E4npBP', '1557698400', 'w'),
(217, 15, '15wae12qBfSr', '1557698400', 'w'),
(218, 15, '15waoXIbuMUy', '1557698400', 'w'),
(219, 15, '15wasEOLy9zq', '1557698400', 'w'),
(220, 15, '15waLix7dJX2', '1557698400', 'w'),
(221, 15, '15warQLDij3e', '1557698400', 'w'),
(222, 15, '15waXG8hr95v', '1557698400', 'w'),
(223, 15, '15wa2MOpUB3j', '1557698400', 'w'),
(224, 15, '15waqN0dH2Yo', '1557698400', 'w'),
(225, 15, '15waJVgvI7X9', '1557698400', 'w'),
(226, 15, '15wavBEG2OMs', '1557698400', 'w'),
(227, 15, '15waNyzRE39A', '1557698400', 'w'),
(228, 15, '15waHYuefKmn', '1557698400', 'w'),
(229, 15, '15wa8PDlYIey', '1557698400', 'w'),
(230, 15, '15wa3mvzGYoD', '1557698400', 'w'),
(231, 15, '15waOynhUK3J', '1557698400', 'w'),
(232, 15, '15wax5UDA8HG', '1557698400', 'w'),
(233, 15, '15wak0HPELof', '1557698400', 'w'),
(234, 15, '15waQdgPEuy4', '1557698400', 'w'),
(235, 15, '15waA49vmUpt', '1557698400', 'w'),
(236, 15, '15wa4cOI9H1E', '1557698400', 'w'),
(237, 15, '15waVbAK3U2T', '1557698400', 'w'),
(238, 15, '15waiK08XTnU', '1557698400', 'w'),
(239, 15, '15waz5v29rHI', '1557698400', 'w'),
(240, 15, '15waRsdkXxXD', '1557698400', 'w'),
(241, 15, '15wae43S6ImY', '1557698400', 'w'),
(242, 15, '15waoNUEm6IB', '1557698400', 'w'),
(243, 15, '15waTLUXEmjE', '1557698400', 'w'),
(244, 15, '15waX9lRzI5g', '1557698400', 'w'),
(245, 15, '15wamThAN7u4', '1557698400', 'w'),
(246, 15, '15wavRdXEpmc', '1557698400', 'w'),
(247, 15, '15wa5EKEA6Y2', '1557698400', 'w'),
(248, 15, '15waheQGHyRM', '1557698400', 'w'),
(249, 15, '15wahzGdEt7M', '1557698400', 'w'),
(250, 15, '15waJO0by7Ez', '1557698400', 'w'),
(251, 15, '15waGm7vLYjS', '1557698400', 'w'),
(252, 15, '15wa6enygTxv', '1557698400', 'w'),
(253, 15, '15wa0Gi75Qyq', '1557698400', 'w'),
(254, 15, '15waf8E1tBFJ', '1557698400', 'w'),
(255, 15, '15waonMlPOKg', '1557698400', 'w'),
(256, 15, '15waQPElzoYx', '1557698400', 'w'),
(257, 15, '15wa0kOu8L2T', '1557698400', 'w'),
(258, 15, '15watxTc18sX', '1557698400', 'w'),
(259, 15, '15wac3JlArmt', '1557698400', 'w'),
(260, 15, '15waVpGF8K9z', '1557698400', 'w'),
(261, 15, '15waNYJMmDHr', '1557698400', 'w'),
(262, 15, '15wazUrGYSg6', '1557698400', 'w'),
(263, 15, '15waVA1BPnsh', '1557698400', 'w'),
(264, 15, '15waJE2cxXby', '1557698400', 'w'),
(265, 15, '15wa2AxE7Ejy', '1557698400', 'w'),
(266, 15, '15waYE21hbOE', '1557698400', 'w'),
(267, 15, '15waeTo9RjsO', '1557698400', 'w'),
(268, 15, '15wa28FmMYek', '1557698400', 'w'),
(269, 15, '15wa58vgHj6V', '1557698400', 'w'),
(270, 15, '15waktGvcSYu', '1557698400', 'w'),
(271, 15, '15wa2fp4IByl', '1557698400', 'w'),
(272, 15, '15wahItXNQFS', '1557698400', 'w'),
(273, 15, '15waDE1EBndo', '1557698400', 'w'),
(274, 15, '15waR48lDiJ1', '1557698400', 'w'),
(275, 15, '15wabglQizuh', '1557698400', 'w'),
(276, 15, '15waXF2KYs51', '1557698400', 'w'),
(277, 15, '15wafIHkE4PX', '1557698400', 'w'),
(278, 15, '15waynjYsuEO', '1557698400', 'w'),
(279, 15, '15watd9F1LXx', '1557698400', 'w'),
(280, 15, '15wahuMP1YL9', '1557698400', 'w'),
(281, 15, '15waVRkA2o7j', '1557698400', 'w'),
(282, 15, '15walRP2J9Yo', '1557698400', 'w'),
(283, 15, '15wa4sKmXp5I', '1557698400', 'w'),
(284, 15, '15waGXiMVfxN', '1557698400', 'w'),
(285, 15, '15waiJLAvFEU', '1557698400', 'w'),
(286, 15, '15waR7rTxnOI', '1557698400', 'w'),
(287, 15, '15waRvHKG9kg', '1557698400', 'w'),
(288, 15, '15waQ1NPcEzK', '1557698400', 'w'),
(289, 15, '15waQfnpAgkM', '1557698400', 'w'),
(290, 15, '15wakeDHKBV8', '1557698400', 'w'),
(291, 15, '15waH2U1EQPy', '1557698400', 'w'),
(292, 15, '15wa3I48FemD', '1557698400', 'w'),
(293, 15, '15waspQN6jKi', '1557698400', 'w'),
(294, 15, '15wap58EHsM0', '1557698400', 'w'),
(295, 15, '15waEJnOgsX7', '1557698400', 'w'),
(296, 15, '15wa9IqEmENG', '1557698400', 'w'),
(297, 15, '15waQt9kyJdf', '1557698400', 'w'),
(298, 15, '15waEX6bdg2L', '1557698400', 'w'),
(299, 15, '15wabygsncu5', '1557698400', 'w'),
(300, 15, '15wauVyS6JE1', '1557698400', 'w'),
(301, 15, '15wa6UmNb4Qi', '1557698400', 'w'),
(302, 15, '15wadKrofs12', '1557698400', 'w'),
(303, 15, '15wayIPM3LUO', '1557698400', 'w'),
(304, 15, '15waGHtUMS0e', '1557698400', 'w'),
(305, 15, '15waQvJjy71b', '1557698400', 'w'),
(306, 15, '15waMqtNAVPU', '1557698400', 'w'),
(307, 15, '15wa2oj3MJlh', '1557698400', 'w'),
(308, 15, '15wamuE5U7sY', '1557698400', 'w'),
(309, 15, '15waLpkgXrHJ', '1557698400', 'w'),
(310, 15, '15waEoTQiIOn', '1557698400', 'w'),
(311, 15, '15wac5Mqfg4O', '1557698400', 'w'),
(312, 15, '15waGBPpOUJ9', '1557698400', 'w'),
(313, 15, '15waqbFIy5xi', '1557698400', 'w'),
(314, 15, '15waMA2ToSzB', '1557698400', 'w'),
(315, 15, '15wa8K1ed0cU', '1557698400', 'w'),
(316, 15, '15waXr85DsQn', '1557698400', 'w'),
(317, 15, '15waO9AqF275', '1557698400', 'w'),
(318, 15, '15war4XpshBI', '1557698400', 'w'),
(319, 15, '15waJPEmofhk', '1557698400', 'w'),
(320, 15, '15wag1RnhLky', '1557698400', 'w'),
(321, 15, '15waihrFYQ7k', '1557698400', 'w'),
(322, 15, '15waPfe2gETN', '1557698400', 'w'),
(323, 15, '15waEvjIzmek', '1557698400', 'w'),
(324, 15, '15waAhlQ0YU1', '1557698400', 'w'),
(325, 15, '15waSNbcB7vm', '1557698400', 'w'),
(326, 15, '15waprPbKom8', '1557698400', 'w'),
(327, 15, '15wahLBEzFYJ', '1557698400', 'w'),
(328, 15, '15waEtnbNEJh', '1557698400', 'w'),
(329, 15, '15waML50Rzy4', '1557698400', 'w'),
(330, 15, '15waMq6jKrAH', '1557698400', 'w'),
(331, 15, '15waMftP2mFl', '1557698400', 'w'),
(332, 15, '15waxHk0DhAv', '1557698400', 'w'),
(333, 15, '15waAYXip4G9', '1557698400', 'w'),
(334, 15, '15wa9NjUSmEe', '1557698400', 'w'),
(335, 15, '15waNKkpc2sn', '1557698400', 'w'),
(336, 15, '15wapPf94MRi', '1557698400', 'w'),
(337, 15, '15wahUgduSEJ', '1557698400', 'w'),
(338, 15, '15waBbzVEk6c', '1557698400', 'w'),
(339, 15, '15wa4vExjIoU', '1557698400', 'w'),
(340, 15, '15wamktpDhRq', '1557698400', 'w'),
(341, 15, '15waTflK40js', '1557698400', 'w'),
(342, 15, '15wagRKELf7F', '1557698400', 'w'),
(343, 15, '15wa4SgkKiLp', '1557698400', 'w'),
(344, 15, '15waHeBfGM1c', '1557698400', 'w'),
(345, 15, '15waSgMU2JIG', '1557698400', 'w'),
(346, 15, '15walJdV2Fs8', '1557698400', 'w'),
(347, 15, '15wa6jbSEtx9', '1557698400', 'w'),
(348, 15, '15waXPj5bixe', '1557698400', 'w'),
(349, 15, '15waRx1P0p7Y', '1557698400', 'w'),
(350, 15, '15waEY6G9dX4', '1557698400', 'w'),
(351, 15, '15waKyTPDXh2', '1557698400', 'w'),
(352, 15, '15waBhF9brXx', '1557698400', 'w'),
(353, 15, '15wal1TEh6bX', '1557698400', 'w'),
(354, 15, '15waXKAS0Mtp', '1557698400', 'w'),
(355, 15, '15warmBgX3Dj', '1557698400', 'w'),
(356, 15, '15waqd9KcFeh', '1557698400', 'w'),
(357, 15, '15wa703limzL', '1557698400', 'w'),
(358, 15, '15waXF04sx2z', '1557698400', 'w'),
(359, 15, '15waM3EgSmR1', '1557698400', 'w'),
(360, 15, '15wap5PBtrXI', '1557698400', 'w'),
(361, 15, '15wan8qJdSIt', '1557698400', 'w'),
(362, 15, '15wavUAoIFdp', '1557698400', 'w'),
(363, 15, '15waApzMunLo', '1557698400', 'w'),
(364, 15, '15wa47Ey5cJR', '1557698400', 'w'),
(365, 15, '15wayNFXIb4R', '1557698400', 'w'),
(366, 15, '15waNcfuQ5is', '1557698400', 'w'),
(367, 15, '15wa0fvRQGPy', '1557698400', 'w'),
(368, 15, '15waplQG8YJh', '1557698400', 'w'),
(369, 15, '15waBtX34kEi', '1557698400', 'w'),
(370, 15, '15waeiMjIf2y', '1557698400', 'w'),
(371, 15, '15wa4PQ0dYJ2', '1557698400', 'w'),
(372, 15, '15waXqQfmBrJ', '1557698400', 'w'),
(373, 15, '15waU3cf6mxN', '1557698400', 'w'),
(374, 15, '15waXNeGFXoB', '1557698400', 'w'),
(375, 15, '15wa3BlUoOj9', '1557698400', 'w'),
(376, 15, '15waYv3PmVrE', '1557698400', 'w'),
(377, 15, '15waUQvsDES0', '1557698400', 'w'),
(378, 15, '15waVuU2Ql1k', '1557698400', 'w'),
(379, 15, '15wa5ikyu6sl', '1557698400', 'w'),
(380, 15, '15waiNFoEEOb', '1557698400', 'w'),
(381, 15, '15waMPb1JhDL', '1557698400', 'w'),
(382, 15, '15waPfOpbU0Q', '1557698400', 'w'),
(383, 15, '15waE9juVHGK', '1557698400', 'w'),
(384, 15, '15waXBjq4fp1', '1557698400', 'w'),
(385, 15, '15waLpANQ7JB', '1557698400', 'w'),
(386, 15, '15wa7fHGjx2y', '1557698400', 'w'),
(387, 15, '15warOefMV5X', '1557698400', 'w'),
(388, 15, '15wasJn3pEG4', '1557698400', 'w'),
(389, 15, '15wabEcf7XdU', '1557698400', 'w'),
(390, 15, '15waxeAM9Qj4', '1557698400', 'w'),
(391, 15, '15warJDnSXmc', '1557698400', 'w'),
(392, 15, '15wamIcBJsxl', '1557698400', 'w'),
(393, 15, '15wan3OSUcxM', '1557698400', 'w'),
(394, 15, '15waG6uh07SE', '1557698400', 'w'),
(395, 15, '15wasIrXqvzk', '1557698400', 'w'),
(396, 15, '15wahMBI3zgo', '1557698400', 'w'),
(397, 15, '15wavFMNmTRj', '1557698400', 'w'),
(398, 15, '15wacMogVJYL', '1557698400', 'w'),
(399, 15, '15wakfNRtqU8', '1557698400', 'w'),
(400, 15, '15wa3m86LUSn', '1557698400', 'w'),
(401, 20, '20waekdV0v1A', '1557698400', 'w'),
(402, 20, '20waHgBpqQUb', '1557698400', 'w'),
(403, 20, '20wak2i8cInu', '1557698400', 'w'),
(404, 20, '20waPQ5rcIhX', '1557698400', 'w'),
(405, 20, '20wapj2l3gr1', '1557698400', 'w'),
(406, 20, '20waiGArlEVN', '1557698400', 'w'),
(407, 20, '20waySkB2zcj', '1557698400', 'w'),
(408, 20, '20waAce9LQjf', '1557698400', 'w'),
(409, 20, '20wa0PSHkYNJ', '1557698400', 'w'),
(410, 20, '20wainHRk85U', '1557698400', 'w'),
(411, 20, '20waysBoF4qL', '1557698400', 'w'),
(412, 20, '20wapzAYDG5k', '1557698400', 'w'),
(413, 20, '20waHsOtgKGv', '1557698400', 'w'),
(414, 20, '20waJF3XhKqM', '1557698400', 'w'),
(415, 20, '20wahx9IHsBP', '1557698400', 'w'),
(416, 20, '20wamIUxiOGN', '1557698400', 'w'),
(417, 20, '20waOjonq5U6', '1557698400', 'w'),
(418, 20, '20waNMqY7vIe', '1557698400', 'w'),
(419, 20, '20waBf73jmeV', '1557698400', 'w'),
(420, 20, '20waLzjR07dE', '1557698400', 'w'),
(421, 20, '20wa6hDLqI9N', '1557698400', 'w'),
(422, 20, '20waGTnXMrOu', '1557698400', 'w'),
(423, 20, '20wazY23bcJ9', '1557698400', 'w'),
(424, 20, '20waQ9EYeInd', '1557698400', 'w'),
(425, 20, '20wa869ABTnE', '1557698400', 'w'),
(426, 20, '20wa6PxnN7dJ', '1557698400', 'w'),
(427, 20, '20waxyczD7vE', '1557698400', 'w'),
(428, 20, '20wakfy20LE7', '1557698400', 'w'),
(429, 20, '20wauXk97pDL', '1557698400', 'w'),
(430, 20, '20waeuRDUr0d', '1557698400', 'w'),
(431, 20, '20wamqfn6oxJ', '1557698400', 'w'),
(432, 20, '20waPx7b20AJ', '1557698400', 'w'),
(433, 20, '20waeTI7XFtr', '1557698400', 'w'),
(434, 20, '20waEKszX8S3', '1557698400', 'w'),
(435, 20, '20wapgr4bAv7', '1557698400', 'w'),
(436, 20, '20waucBOnIQr', '1557698400', 'w'),
(437, 20, '20wa5J2dIDiS', '1557698400', 'w'),
(438, 20, '20waGoM6D071', '1557698400', 'w'),
(439, 20, '20waD2HrPRio', '1557698400', 'w'),
(440, 20, '20waBgJ86cNE', '1557698400', 'w'),
(441, 20, '20waxKiu7ME8', '1557698400', 'w'),
(442, 20, '20waS4iPNXEc', '1557698400', 'w'),
(443, 20, '20waAPNgfRy8', '1557698400', 'w'),
(444, 20, '20wasTLpE8JQ', '1557698400', 'w'),
(445, 20, '20walmETgXFE', '1557698400', 'w'),
(446, 20, '20waElkcGXji', '1557698400', 'w'),
(447, 20, '20wadembNr2V', '1557698400', 'w'),
(448, 20, '20waJQ2XNEby', '1557698400', 'w'),
(449, 20, '20wamMVsX9JX', '1557698400', 'w'),
(450, 20, '20waiKLdU257', '1557698400', 'w'),
(451, 20, '20wauSMYFA20', '1557698400', 'w'),
(452, 20, '20wablr5h8Ic', '1557698400', 'w'),
(453, 20, '20waRg3YmDLc', '1557698400', 'w'),
(454, 20, '20way5XPudzV', '1557698400', 'w'),
(455, 20, '20waqF5I0SoJ', '1557698400', 'w'),
(456, 20, '20waxJXj64Se', '1557698400', 'w'),
(457, 20, '20waKn65hdRJ', '1557698400', 'w'),
(458, 20, '20wa7VpXgIH6', '1557698400', 'w'),
(459, 20, '20waXSlyuVcf', '1557698400', 'w'),
(460, 20, '20wajGgOQJEF', '1557698400', 'w'),
(461, 20, '20wamxENnrD8', '1557698400', 'w'),
(462, 20, '20wa8uHfJMmc', '1557698400', 'w'),
(463, 20, '20wa8XlMrBtT', '1557698400', 'w'),
(464, 20, '20wamI9NqQHX', '1557698400', 'w'),
(465, 20, '20warviEGANb', '1557698400', 'w'),
(466, 20, '20waov5V62kb', '1557698400', 'w'),
(467, 20, '20wajX7AsdEn', '1557698400', 'w'),
(468, 20, '20waOGcqb75Y', '1557698400', 'w'),
(469, 20, '20waxGQvzJr1', '1557698400', 'w'),
(470, 20, '20waHx7cG159', '1557698400', 'w'),
(471, 20, '20wafk5NqEBi', '1557698400', 'w'),
(472, 20, '20waYnvde7Qz', '1557698400', 'w'),
(473, 20, '20wasOnNQ8Xz', '1557698400', 'w'),
(474, 20, '20waRkSfhpYq', '1557698400', 'w'),
(475, 20, '20wa0lVf16br', '1557698400', 'w'),
(476, 20, '20waYxlLN5EE', '1557698400', 'w'),
(477, 20, '20waABFzosDX', '1557698400', 'w'),
(478, 20, '20waQryVHNFI', '1557698400', 'w'),
(479, 20, '20wakODu9GHI', '1557698400', 'w'),
(480, 20, '20wa7kBqyJLG', '1557698400', 'w'),
(481, 20, '20wa4MpF8tzK', '1557698400', 'w'),
(482, 20, '20wa4NYi32Kn', '1557698400', 'w'),
(483, 20, '20wa4tjcsxgq', '1557698400', 'w'),
(484, 20, '20waYJpe4xBj', '1557698400', 'w'),
(485, 20, '20waNEnB25iQ', '1557698400', 'w'),
(486, 20, '20waKGgk2mMb', '1557698400', 'w'),
(487, 20, '20wa1rKltyBE', '1557698400', 'w'),
(488, 20, '20waSLdm148o', '1557698400', 'w'),
(489, 20, '20waX3rsy5oJ', '1557698400', 'w'),
(490, 20, '20waxKVhAb9s', '1557698400', 'w'),
(491, 20, '20waV17FAMyl', '1557698400', 'w'),
(492, 20, '20wa54HNfnkV', '1557698400', 'w'),
(493, 20, '20wapmMyUc4o', '1557698400', 'w'),
(494, 20, '20wamyP25bHK', '1557698400', 'w'),
(495, 20, '20waNL7KXM46', '1557698400', 'w'),
(496, 20, '20wamMJifq4s', '1557698400', 'w'),
(497, 20, '20waehVE0QHz', '1557698400', 'w'),
(498, 20, '20wac1n4VyOE', '1557698400', 'w'),
(499, 20, '20wab4Rd8Nkz', '1557698400', 'w'),
(500, 20, '20wa7E03u2Mq', '1557698400', 'w'),
(501, 20, '20wapeJ19Kh8', '1557698400', 'w'),
(502, 20, '20wadVIq8PEH', '1557698400', 'w'),
(503, 20, '20waz8jOpFYP', '1557698400', 'w'),
(504, 20, '20wayD1Is9ve', '1557698400', 'w'),
(505, 20, '20waX58AOpmI', '1557698400', 'w'),
(506, 20, '20wasS3uDF0n', '1557698400', 'w'),
(507, 20, '20wa2V9xiLm3', '1557698400', 'w'),
(508, 20, '20wafd4ik3I8', '1557698400', 'w'),
(509, 20, '20waOcxJ9mDi', '1557698400', 'w'),
(510, 20, '20waASxiTENv', '1557698400', 'w'),
(511, 20, '20waMKXFAti6', '1557698400', 'w'),
(512, 20, '20walTRKphv8', '1557698400', 'w'),
(513, 20, '20waTgVPX2zQ', '1557698400', 'w'),
(514, 20, '20waz42g7YlQ', '1557698400', 'w'),
(515, 20, '20waVFv56k8j', '1557698400', 'w'),
(516, 20, '20waQThY49NB', '1557698400', 'w'),
(517, 20, '20waM9enKrp7', '1557698400', 'w'),
(518, 20, '20wa6TbOI9qR', '1557698400', 'w'),
(519, 20, '20waEE9GXQHJ', '1557698400', 'w'),
(520, 20, '20waxcVhDtQp', '1557698400', 'w'),
(521, 20, '20waNIuShp5z', '1557698400', 'w'),
(522, 20, '20waHs8emGxX', '1557698400', 'w'),
(523, 20, '20wa8J59Kl47', '1557698400', 'w'),
(524, 20, '20waXqfjErXm', '1557698400', 'w'),
(525, 20, '20waj8UVkKIP', '1557698400', 'w'),
(526, 20, '20wazQVjMKch', '1557698400', 'w'),
(527, 20, '20wa3XRtPzcE', '1557698400', 'w'),
(528, 20, '20waE8jM60VT', '1557698400', 'w'),
(529, 20, '20waJtc4gBy0', '1557698400', 'w'),
(530, 20, '20waldFiqxoL', '1557698400', 'w'),
(531, 20, '20waYQubnUeD', '1557698400', 'w'),
(532, 20, '20waX8LRIJPD', '1557698400', 'w'),
(533, 20, '20waS2hDun6Y', '1557698400', 'w'),
(534, 20, '20wavg8S5dP9', '1557698400', 'w'),
(535, 20, '20wax8OESi1g', '1557698400', 'w'),
(536, 20, '20wasGoQhc5D', '1557698400', 'w'),
(537, 20, '20watdyJx2PO', '1557698400', 'w'),
(538, 20, '20wa0n9pfjXB', '1557698400', 'w'),
(539, 20, '20waL8F5nhke', '1557698400', 'w'),
(540, 20, '20waPQyHK6ko', '1557698400', 'w'),
(541, 20, '20waH2srgQjB', '1557698400', 'w'),
(542, 20, '20waDLJO0sQE', '1557698400', 'w'),
(543, 20, '20waydxAKhPH', '1557698400', 'w'),
(544, 20, '20wasA0oJnuh', '1557698400', 'w'),
(545, 20, '20waQr2vdJUM', '1557698400', 'w'),
(546, 20, '20wa92ESKOsX', '1557698400', 'w'),
(547, 20, '20wav3Sjhdzp', '1557698400', 'w'),
(548, 20, '20waXERfI6e4', '1557698400', 'w'),
(549, 20, '20waBnfHIXJK', '1557698400', 'w'),
(550, 20, '20waqzdMQ0kP', '1557698400', 'w'),
(551, 20, '20wajgNB4c8D', '1557698400', 'w'),
(552, 20, '20waudOBjlyn', '1557698400', 'w'),
(553, 20, '20walhuXtGNQ', '1557698400', 'w'),
(554, 20, '20waYP6eVtsn', '1557698400', 'w'),
(555, 20, '20waFAhq6PoQ', '1557698400', 'w'),
(556, 20, '20wafnAmPk7j', '1557698400', 'w'),
(557, 20, '20waH8leB3o0', '1557698400', 'w'),
(558, 20, '20waQLys7gk4', '1557698400', 'w'),
(559, 20, '20waHDKdnVJ7', '1557698400', 'w'),
(560, 20, '20wacAGIrohu', '1557698400', 'w'),
(561, 20, '20watO8Gl3Rq', '1557698400', 'w'),
(562, 20, '20wasXPO0ltL', '1557698400', 'w'),
(563, 20, '20wa2ALyQdJ3', '1557698400', 'w'),
(564, 20, '20wadlUtr6oj', '1557698400', 'w'),
(565, 20, '20waFkthqXlJ', '1557698400', 'w'),
(566, 20, '20waEXsVX4v7', '1557698400', 'w'),
(567, 20, '20wa350mXzxY', '1557698400', 'w'),
(568, 20, '20waEFzir9vl', '1557698400', 'w'),
(569, 20, '20waGk20sMAQ', '1557698400', 'w'),
(570, 20, '20wa1BEvx3RL', '1557698400', 'w'),
(571, 20, '20wayElGL259', '1557698400', 'w'),
(572, 20, '20waElVs1QX9', '1557698400', 'w'),
(573, 20, '20wa2LoQymEU', '1557698400', 'w'),
(574, 20, '20wapzOyIA8h', '1557698400', 'w'),
(575, 20, '20waY4xBeIsA', '1557698400', 'w'),
(576, 20, '20waKAXsrFum', '1557698400', 'w'),
(577, 20, '20waX0IxlXzJ', '1557698400', 'w'),
(578, 20, '20waVBOpF7Em', '1557698400', 'w'),
(579, 20, '20wa1Tqy623H', '1557698400', 'w'),
(580, 20, '20waTRQE2NX9', '1557698400', 'w'),
(581, 20, '20wasQt4p5Jl', '1557698400', 'w'),
(582, 20, '20wavXjRyncX', '1557698400', 'w'),
(583, 20, '20waMX3gltVO', '1557698400', 'w'),
(584, 20, '20waq0ufQ6cM', '1557698400', 'w'),
(585, 20, '20waur4L5zU7', '1557698400', 'w'),
(586, 20, '20waTF4leypg', '1557698400', 'w'),
(587, 20, '20waJ5xdts81', '1557698400', 'w'),
(588, 20, '20waR2oFxdb5', '1557698400', 'w'),
(589, 20, '20waTHBlKbcV', '1557698400', 'w'),
(590, 20, '20waqYrK541d', '1557698400', 'w'),
(591, 20, '20waltPMdT9q', '1557698400', 'w'),
(592, 20, '20wafXMykXIP', '1557698400', 'w'),
(593, 20, '20waFR7OuncE', '1557698400', 'w'),
(594, 20, '20wan6lvdHuQ', '1557698400', 'w'),
(595, 20, '20walzdHDjsq', '1557698400', 'w'),
(596, 20, '20wa5JvmsKD1', '1557698400', 'w'),
(597, 20, '20wa0xoJhqnl', '1557698400', 'w'),
(598, 20, '20wak2MsAJX4', '1557698400', 'w'),
(599, 20, '20waNt08x4c5', '1557698400', 'w'),
(603, 24, '24gaTBzIOFWq', '1557698400', 'g'),
(604, 24, '24gaAQwsqeuR', '1557698400', 'g'),
(605, 24, '24gaD6AR7Vmp', '1557698400', 'g'),
(606, 24, '24gai4Vhjnkp', '1557698400', 'g'),
(607, 24, '24gaHFBe1vQV', '1557698400', 'g'),
(608, 24, '24gaRsUSIkJ8', '1557698400', 'g'),
(609, 24, '24gapxPH3Aeq', '1557698400', 'g'),
(610, 24, '24gaLiQ7yo20', '1557698400', 'g'),
(611, 24, '24gaHcovKzwl', '1557698400', 'g'),
(612, 24, '24gadMALXTRr', '1557698400', 'g'),
(613, 24, '24ga4dTWS5Ii', '1557698400', 'g'),
(614, 24, '24gaEDJ6QctX', '1557698400', 'g'),
(615, 24, '24gaQ3VinEcU', '1557698400', 'g'),
(616, 24, '24gaNHfleEAb', '1557698400', 'g'),
(617, 24, '24gaBFwo9Mj3', '1557698400', 'g'),
(618, 24, '24gahOIS0Aeq', '1557698400', 'g'),
(619, 24, '24gaEFxJBiTl', '1557698400', 'g'),
(620, 24, '24gaoql7sdT1', '1557698400', 'g'),
(621, 24, '24gaIwHpQO3X', '1557698400', 'g'),
(622, 24, '24gaSbIX8B5E', '1557698400', 'g'),
(623, 24, '24gayfMKctu3', '1557698400', 'g'),
(624, 24, '24ga2qnS87oB', '1557698400', 'g'),
(625, 24, '24gaOEcjvLxd', '1557698400', 'g'),
(626, 24, '24gaPzWmhyI9', '1557698400', 'g'),
(627, 24, '24ga70IvTwDL', '1557698400', 'g'),
(628, 24, '24garIAh5nD6', '1557698400', 'g'),
(629, 24, '24gaXQYLyupt', '1557698400', 'g'),
(630, 24, '24ga59VEy0Mw', '1557698400', 'g'),
(631, 24, '24gaEUyTLxPv', '1557698400', 'g'),
(632, 24, '24gaSVIXEHwz', '1557698400', 'g'),
(633, 24, '24ga3QEbdwlT', '1557698400', 'g'),
(634, 24, '24gaxJd4KzM1', '1557698400', 'g'),
(635, 24, '24gaUp3nWiEl', '1557698400', 'g'),
(636, 24, '24gaoQYfELOU', '1557698400', 'g'),
(637, 24, '24gaKe3mvL2T', '1557698400', 'g'),
(638, 24, '24gaBtYz6vJn', '1557698400', 'g'),
(639, 24, '24ga7IHndbLW', '1557698400', 'g'),
(640, 24, '24gakbtLyeQx', '1557698400', 'g'),
(641, 24, '24gaFJjA72Yr', '1557698400', 'g'),
(642, 24, '24gaTbHMtzPk', '1557698400', 'g'),
(643, 24, '24gan6AhbySo', '1557698400', 'g'),
(644, 24, '24gaI4WmSkT9', '1557698400', 'g'),
(645, 24, '24ganTyK0HNR', '1557698400', 'g'),
(646, 24, '24gakMFrpEov', '1557698400', 'g'),
(647, 24, '24gaOJVbi0ew', '1557698400', 'g'),
(648, 24, '24gaH7ud93vS', '1557698400', 'g'),
(649, 24, '24gadz4IcnwX', '1557698400', 'g'),
(650, 24, '24gaEyu7On9i', '1557698400', 'g'),
(651, 24, '24gaX6OUJR4Y', '1557698400', 'g'),
(652, 24, '24gaVIXhEO9X', '1557698400', 'g'),
(653, 24, '24ga3hIEJpL9', '1557698400', 'g'),
(654, 24, '24garB9uw85P', '1557698400', 'g'),
(655, 24, '24garVE0TELA', '1557698400', 'g'),
(656, 24, '24gaWc6SuhBw', '1557698400', 'g'),
(657, 24, '24gaIqKT6E0V', '1557698400', 'g'),
(658, 24, '24gam43QWeU9', '1557698400', 'g'),
(659, 24, '24ga01FjYPUQ', '1557698400', 'g'),
(660, 24, '24gauo7k6RNL', '1557698400', 'g'),
(661, 24, '24gaDbn0Q2yE', '1557698400', 'g'),
(662, 24, '24ga540iOoN6', '1557698400', 'g'),
(663, 24, '24gaiYMqRHLd', '1557698400', 'g'),
(664, 24, '24gazI27i46u', '1557698400', 'g'),
(665, 24, '24gaWkJpM9S6', '1557698400', 'g'),
(666, 24, '24gaRbwNemEs', '1557698400', 'g'),
(667, 24, '24gaQ1hiPTWJ', '1557698400', 'g'),
(668, 24, '24ga4FVHO27h', '1557698400', 'g'),
(669, 24, '24ga6KQwXJO1', '1557698400', 'g'),
(670, 24, '24ga1t3ukVYv', '1557698400', 'g'),
(671, 24, '24gaxuks1tPW', '1557698400', 'g'),
(672, 24, '24gaRNbczFXk', '1557698400', 'g'),
(673, 24, '24gaDiMs7Tr2', '1557698400', 'g'),
(674, 24, '24gayJ1SYRmz', '1557698400', 'g'),
(675, 24, '24gaMKRlFkzX', '1557698400', 'g'),
(676, 24, '24gaToqkElU0', '1557698400', 'g'),
(677, 24, '24gaR0EOv1Fc', '1557698400', 'g'),
(678, 24, '24gaMEwDLlq1', '1557698400', 'g'),
(679, 24, '24ga7PhAXNpc', '1557698400', 'g'),
(680, 24, '24gaW20butkO', '1557698400', 'g'),
(681, 24, '24gaek10OlP2', '1557698400', 'g'),
(682, 24, '24gadxELDKBA', '1557698400', 'g'),
(683, 24, '24ga9IRXuvc3', '1557698400', 'g'),
(684, 24, '24ga2lt5E3Td', '1557698400', 'g'),
(685, 24, '24gaJ8QR4jyY', '1557698400', 'g'),
(686, 24, '24gaJeHSjhM3', '1557698400', 'g'),
(687, 24, '24gaFwzKMYE3', '1557698400', 'g'),
(688, 24, '24gaBbekr2EM', '1557698400', 'g'),
(689, 24, '24gad8kwfKFp', '1557698400', 'g'),
(690, 24, '24gaeFXH63EK', '1557698400', 'g'),
(691, 24, '24ga7jo8nBuJ', '1557698400', 'g'),
(692, 24, '24gaFx9bqo5B', '1557698400', 'g'),
(693, 24, '24garfKyTEwJ', '1557698400', 'g'),
(694, 24, '24gaQlYB1FtX', '1557698400', 'g'),
(695, 24, '24gaVrRXnTvI', '1557698400', 'g'),
(696, 24, '24gasNRyEeXU', '1557698400', 'g'),
(697, 24, '24ga9iuXFOBD', '1557698400', 'g'),
(698, 24, '24gaJf91MKvU', '1557698400', 'g'),
(699, 24, '24ganJlR04cM', '1557698400', 'g'),
(700, 24, '24gaoymi6XKM', '1557698400', 'g'),
(701, 24, '24ga18kv7hj3', '1557698400', 'g'),
(702, 24, '24gakNEiUTtQ', '1557698400', 'g'),
(703, 24, '24gaxrTHzF5E', '1557698400', 'g'),
(704, 24, '24gamYEBXNRw', '1557698400', 'g'),
(705, 24, '24gaephUDijE', '1557698400', 'g'),
(706, 24, '24ga1eElS4yP', '1557698400', 'g'),
(707, 24, '24gaPqTtWD5f', '1557698400', 'g'),
(708, 24, '24gajlXIixYM', '1557698400', 'g'),
(709, 24, '24gaYAS2brjI', '1557698400', 'g'),
(710, 24, '24gaE2XyTYFO', '1557698400', 'g'),
(711, 24, '24gamX2f7K9W', '1557698400', 'g'),
(712, 24, '24gaeqY4fOSN', '1557698400', 'g'),
(713, 24, '24gasFrQA1Rd', '1557698400', 'g'),
(714, 24, '24gaLhRMzeTX', '1557698400', 'g'),
(715, 24, '24gaE5qYrRJX', '1557698400', 'g'),
(716, 24, '24gaXHfzSlxN', '1557698400', 'g'),
(717, 24, '24gaVYwnE0Tp', '1557698400', 'g'),
(718, 24, '24gaRjchbN4E', '1557698400', 'g'),
(719, 24, '24gahTOnjED1', '1557698400', 'g'),
(720, 24, '24gapfThtLy9', '1557698400', 'g'),
(721, 24, '24gaskSzKoe4', '1557698400', 'g'),
(722, 24, '24ga49Alsi0y', '1557698400', 'g'),
(723, 24, '24ganEWoM9Sl', '1557698400', 'g'),
(724, 24, '24gaJnB3LTH0', '1557698400', 'g'),
(725, 24, '24gaEibOmHy9', '1557698400', 'g'),
(726, 24, '24gaeqi4Pxbc', '1557698400', 'g'),
(727, 24, '24gajbMTNtO9', '1557698400', 'g'),
(728, 24, '24gaYHEj7ru6', '1557698400', 'g'),
(729, 24, '24ga4HEfnWdR', '1557698400', 'g'),
(730, 24, '24ga2ISvV3jX', '1557698400', 'g'),
(731, 24, '24gaBpmSFQ5E', '1557698400', 'g'),
(732, 24, '24gathjRbS56', '1557698400', 'g'),
(733, 24, '24ganNRuqd0y', '1557698400', 'g'),
(734, 24, '24ga29NRhiYs', '1557698400', 'g'),
(735, 24, '24gaMES9epWK', '1557698400', 'g'),
(736, 24, '24gapqQzcsEl', '1557698400', 'g'),
(737, 24, '24gaX6q4nFzk', '1557698400', 'g'),
(738, 24, '24gaQytbMwTS', '1557698400', 'g'),
(739, 24, '24gatEAnrPYX', '1557698400', 'g'),
(740, 24, '24gaSlzsi8eH', '1557698400', 'g'),
(741, 24, '24gayw8f0kWb', '1557698400', 'g'),
(742, 24, '24gaEP58DFhO', '1557698400', 'g'),
(743, 24, '24ga3PIXFpb2', '1557698400', 'g'),
(744, 24, '24ga1K6lfVd7', '1557698400', 'g'),
(745, 24, '24galtSHYXF8', '1557698400', 'g'),
(746, 24, '24ga5qdlxMXP', '1557698400', 'g'),
(747, 24, '24gaTL6PwA1j', '1557698400', 'g'),
(748, 24, '24gavRo719mi', '1557698400', 'g'),
(749, 24, '24gaEezJXEk5', '1557698400', 'g'),
(750, 24, '24gaXicPx1qV', '1557698400', 'g'),
(751, 24, '24gaHmKevOUb', '1557698400', 'g'),
(752, 24, '24gaHAvz7BY3', '1557698400', 'g'),
(753, 24, '24gaU0RJ7bcm', '1557698400', 'g'),
(754, 24, '24gatybikrnp', '1557698400', 'g'),
(755, 24, '24gape6jIA0Q', '1557698400', 'g'),
(756, 24, '24gavKl2HbBT', '1557698400', 'g'),
(757, 24, '24gab0Jw45jI', '1557698400', 'g'),
(758, 24, '24gaSnQMUbER', '1557698400', 'g'),
(759, 24, '24gaY6zXEfer', '1557698400', 'g'),
(760, 24, '24ga5cFNEXxp', '1557698400', 'g'),
(761, 24, '24gaicRjA2lN', '1557698400', 'g'),
(762, 24, '24galbu6xtzU', '1557698400', 'g'),
(763, 24, '24galLsUD8S6', '1557698400', 'g'),
(764, 24, '24gabAU6vezS', '1557698400', 'g'),
(765, 24, '24gabLeK1AES', '1557698400', 'g'),
(766, 24, '24gabXh64oFV', '1557698400', 'g'),
(767, 24, '24ga5kzxcAho', '1557698400', 'g'),
(768, 24, '24ga8nd20pw3', '1557698400', 'g'),
(769, 24, '24gaBKY8JW1f', '1557698400', 'g'),
(770, 24, '24gauPT9Emxn', '1557698400', 'g'),
(771, 24, '24gaceoPD4rY', '1557698400', 'g'),
(772, 24, '24gaT692vEbw', '1557698400', 'g'),
(773, 24, '24gaAqo08NJL', '1557698400', 'g'),
(774, 24, '24gatc6W30Dm', '1557698400', 'g'),
(775, 24, '24gapJiUbOjM', '1557698400', 'g'),
(776, 24, '24gaElxEUX3z', '1557698400', 'g'),
(777, 24, '24gadNr35JTR', '1557698400', 'g'),
(778, 24, '24gaMFVroNEU', '1557698400', 'g'),
(779, 24, '24gaEPYi4FS7', '1557698400', 'g'),
(780, 24, '24gai3MIn021', '1557698400', 'g'),
(781, 24, '24ga1IXEdF7H', '1557698400', 'g'),
(782, 24, '24gariyYH75R', '1557698400', 'g'),
(783, 24, '24galI8TzeQH', '1557698400', 'g'),
(784, 24, '24gacX1UKOz8', '1557698400', 'g'),
(785, 24, '24gaz10u8tdp', '1557698400', 'g'),
(786, 24, '24gaSlXPkpIW', '1557698400', 'g'),
(787, 24, '24galW0MNTvk', '1557698400', 'g'),
(788, 24, '24gaHNYEfPIh', '1557698400', 'g'),
(789, 24, '24gafTpDHsEw', '1557698400', 'g'),
(790, 24, '24gaNUrTqcX6', '1557698400', 'g'),
(791, 24, '24gaKixPs97k', '1557698400', 'g'),
(792, 24, '24gav6jWyeY5', '1557698400', 'g'),
(793, 24, '24gaoWEPkO2x', '1557698400', 'g'),
(794, 24, '24gaOEwIJDWR', '1557698400', 'g'),
(795, 24, '24garfK2wEJM', '1557698400', 'g'),
(796, 24, '24gandu98Pms', '1557698400', 'g'),
(797, 24, '24ga1QyRVPK4', '1557698400', 'g'),
(798, 24, '24gak9nYJwfE', '1557698400', 'g'),
(799, 24, '24gaE7KkUX0p', '1557698400', 'g'),
(800, 24, '24ga1y6uN0tA', '1557698400', 'g'),
(802, 26, '26gaWMcBXEXe', '1557698400', 'g'),
(803, 26, '26gaONLh6vJ0', '1557698400', 'g'),
(804, 26, '26gaF2kvEWsS', '1557698400', 'g'),
(805, 26, '26gaSEAlEfLu', '1557698400', 'g'),
(806, 26, '26gaeiBb4oOP', '1557698400', 'g'),
(807, 26, '26gaEWkYbmiA', '1557698400', 'g'),
(808, 26, '26gamEh1bon5', '1557698400', 'g'),
(809, 26, '26gaxE1yYANl', '1557698400', 'g'),
(810, 26, '26gaqDnOmh6b', '1557698400', 'g'),
(811, 26, '26gadtAXvOYV', '1557698400', 'g'),
(812, 26, '26gaNEFBkjwl', '1557698400', 'g'),
(813, 26, '26gab5S8H61T', '1557698400', 'g'),
(814, 26, '26gaodHesUvj', '1557698400', 'g'),
(815, 26, '26ga5OSWkyPn', '1557698400', 'g'),
(816, 26, '26gamo9IrYUl', '1557698400', 'g'),
(817, 26, '26gaMXoYdlfv', '1557698400', 'g'),
(818, 26, '26gayomJB31w', '1557698400', 'g'),
(819, 26, '26gaAjxFB4WY', '1557698400', 'g'),
(820, 26, '26gaYiEe9SEb', '1557698400', 'g'),
(821, 26, '26gaiX7xRlEE', '1557698400', 'g'),
(822, 26, '26gaO6MxYcEz', '1557698400', 'g'),
(823, 26, '26gaIUrEuAsq', '1557698400', 'g'),
(824, 26, '26gax8fHheBA', '1557698400', 'g'),
(825, 26, '26gaLQY2cXUh', '1557698400', 'g'),
(826, 26, '26ga5y4jbSEf', '1557698400', 'g'),
(827, 26, '26gamPEhIeDu', '1557698400', 'g'),
(828, 26, '26gayRvjdQNW', '1557698400', 'g'),
(829, 26, '26gaPzvKBhMf', '1557698400', 'g'),
(830, 26, '26gaP1mvENy4', '1557698400', 'g'),
(831, 26, '26gaNVc1W9fo', '1557698400', 'g'),
(832, 26, '26ga4zfpTnoJ', '1557698400', 'g'),
(833, 26, '26gasEovXNHd', '1557698400', 'g'),
(834, 26, '26ga4InY9oH1', '1557698400', 'g'),
(835, 26, '26ga4ImdoPLN', '1557698400', 'g'),
(836, 26, '26gaEHwMINum', '1557698400', 'g'),
(837, 26, '26gaIl7YVkcm', '1557698400', 'g'),
(838, 26, '26gaqPlBdTK7', '1557698400', 'g'),
(839, 26, '26gaK2AEfB7j', '1557698400', 'g'),
(840, 26, '26gaT2dLvulE', '1557698400', 'g'),
(841, 26, '26gazO63Mb5B', '1557698400', 'g'),
(842, 26, '26ga84SBYKu2', '1557698400', 'g'),
(843, 26, '26gaEbI45p3X', '1557698400', 'g'),
(844, 26, '26ganIRVxB1o', '1557698400', 'g'),
(845, 26, '26gaAK3u7Xwx', '1557698400', 'g'),
(846, 26, '26gajfNqwH52', '1557698400', 'g'),
(847, 26, '26gafES1zDve', '1557698400', 'g'),
(848, 26, '26gaYqSIzEj1', '1557698400', 'g'),
(849, 26, '26gadf7KyYoz', '1557698400', 'g'),
(850, 26, '26gaSUplIVA2', '1557698400', 'g'),
(851, 26, '26gaep2zH7Qv', '1557698400', 'g'),
(852, 26, '26gaXsO7Uw8v', '1557698400', 'g'),
(853, 26, '26gaWyJlQ6Dp', '1557698400', 'g'),
(854, 26, '26gavEcH8Xxz', '1557698400', 'g'),
(855, 26, '26gah8duYxAS', '1557698400', 'g'),
(856, 26, '26gawJkxKl6A', '1557698400', 'g'),
(857, 26, '26gatiXBuYAL', '1557698400', 'g'),
(858, 26, '26ganks3XwUq', '1557698400', 'g'),
(859, 26, '26gaXU97JtqV', '1557698400', 'g'),
(860, 26, '26ga4EWuPUxw', '1557698400', 'g'),
(861, 26, '26gaOVeuP9pn', '1557698400', 'g'),
(862, 26, '26gaYBOhxvHU', '1557698400', 'g'),
(863, 26, '26gaNj2Bozuw', '1557698400', 'g'),
(864, 26, '26gaM6EIUFi2', '1557698400', 'g'),
(865, 26, '26ga5jI1mAOU', '1557698400', 'g'),
(866, 26, '26gaALMdmJTR', '1557698400', 'g'),
(867, 26, '26ga7JXmshyU', '1557698400', 'g'),
(868, 26, '26gaY26S9N5K', '1557698400', 'g'),
(869, 26, '26gahomIKR52', '1557698400', 'g'),
(870, 26, '26ga3wXET6bv', '1557698400', 'g'),
(871, 26, '26ganbxSvX09', '1557698400', 'g'),
(872, 26, '26gaTBumHiqb', '1557698400', 'g'),
(873, 26, '26gacDrI1U2F', '1557698400', 'g'),
(874, 26, '26gaEPU3pejE', '1557698400', 'g'),
(875, 26, '26ga2RsoDFli', '1557698400', 'g'),
(876, 26, '26gaNXOSu8FE', '1557698400', 'g'),
(877, 26, '26gaci4NHPdK', '1557698400', 'g'),
(878, 26, '26ga5b1p9AEf', '1557698400', 'g'),
(879, 26, '26ga2Q65ALvj', '1557698400', 'g'),
(880, 26, '26gaMH0OqK59', '1557698400', 'g'),
(881, 26, '26ga1wNpyE5O', '1557698400', 'g'),
(882, 26, '26gaOloQH3Wc', '1557698400', 'g'),
(883, 26, '26gaXS8ENPx1', '1557698400', 'g'),
(884, 26, '26gaYWL0TtVK', '1557698400', 'g'),
(885, 26, '26gaxDfBLS1y', '1557698400', 'g'),
(886, 26, '26gafAyNpw8I', '1557698400', 'g'),
(887, 26, '26gaBzu9PwMy', '1557698400', 'g'),
(888, 26, '26gaI7JfjYXe', '1557698400', 'g'),
(889, 26, '26gaqNQJt7LX', '1557698400', 'g'),
(890, 26, '26ganXMkLHl2', '1557698400', 'g'),
(891, 26, '26gaIUY5z46r', '1557698400', 'g'),
(892, 26, '26gaD8TUE3Mm', '1557698400', 'g'),
(893, 26, '26ganHfcREy2', '1557698400', 'g'),
(894, 26, '26garL0kfte2', '1557698400', 'g'),
(895, 26, '26gaKzYfRsrQ', '1557698400', 'g'),
(896, 26, '26gaVirbwmkO', '1557698400', 'g'),
(897, 26, '26galM9iJc5V', '1557698400', 'g'),
(898, 26, '26gazvqYrl1A', '1557698400', 'g'),
(899, 26, '26gaSvfQPLku', '1557698400', 'g'),
(900, 26, '26gafnjA0Dzb', '1557698400', 'g'),
(901, 26, '26gapzO0VNT3', '1557698400', 'g'),
(902, 26, '26garE9yS8Te', '1557698400', 'g'),
(903, 26, '26gajx0h4Bpz', '1557698400', 'g'),
(904, 26, '26gaw6trLxPI', '1557698400', 'g'),
(905, 26, '26ga0PAEpy3c', '1557698400', 'g'),
(906, 26, '26gaSIEDAjHm', '1557698400', 'g'),
(907, 26, '26gaSzMEDxAL', '1557698400', 'g'),
(908, 26, '26gaifN4HWqX', '1557698400', 'g'),
(909, 26, '26gacqNWX6EP', '1557698400', 'g'),
(910, 26, '26gaEf3YS0Lt', '1557698400', 'g'),
(911, 26, '26gahTpUxKV3', '1557698400', 'g'),
(912, 26, '26gaVXlUkpcv', '1557698400', 'g'),
(913, 26, '26gaexPcYKdE', '1557698400', 'g'),
(914, 26, '26gaNvh8tom2', '1557698400', 'g'),
(915, 26, '26gamQ5HbPKw', '1557698400', 'g'),
(916, 26, '26gaK2yujwQS', '1557698400', 'g'),
(917, 26, '26gazndv4hFi', '1557698400', 'g'),
(918, 26, '26ga2RMlVp50', '1557698400', 'g'),
(919, 26, '26gaFpNHjXJI', '1557698400', 'g'),
(920, 26, '26ga9JEXVxzi', '1557698400', 'g'),
(921, 26, '26gaY9fWDB5n', '1557698400', 'g'),
(922, 26, '26ga5jRbSUPk', '1557698400', 'g'),
(923, 26, '26gaRBKocL93', '1557698400', 'g'),
(924, 26, '26ga3cNnqAjM', '1557698400', 'g'),
(925, 26, '26gaKzRqVerd', '1557698400', 'g'),
(926, 26, '26gaYvfQdM4H', '1557698400', 'g'),
(927, 26, '26ga8Ihbqr0x', '1557698400', 'g'),
(928, 26, '26ga8kNjQ13V', '1557698400', 'g'),
(929, 26, '26gaypufz0BH', '1557698400', 'g'),
(930, 26, '26gaB7MzIDPc', '1557698400', 'g'),
(931, 26, '26gaFifB5KSx', '1557698400', 'g'),
(932, 26, '26gapN7v2KoA', '1557698400', 'g'),
(933, 26, '26garb1WKLBY', '1557698400', 'g'),
(934, 26, '26gap6nbR5tK', '1557698400', 'g'),
(935, 26, '26gaOsXqoh9E', '1557698400', 'g'),
(936, 26, '26gaEWL0sA7J', '1557698400', 'g'),
(937, 26, '26ga7Ru4k3fN', '1557698400', 'g'),
(938, 26, '26gacjW8tPVN', '1557698400', 'g'),
(939, 26, '26gaEI1mEiVt', '1557698400', 'g'),
(940, 26, '26gaSTPc4Wo9', '1557698400', 'g'),
(941, 26, '26ga7tEkyDhI', '1557698400', 'g'),
(942, 26, '26gazmScr8v5', '1557698400', 'g'),
(943, 26, '26gaeYJSEzBw', '1557698400', 'g'),
(944, 26, '26gaJ652O93X', '1557698400', 'g'),
(945, 26, '26gaR8X9AdsX', '1557698400', 'g'),
(946, 26, '26gaSFQWX3vp', '1557698400', 'g'),
(947, 26, '26gaLR0P47wQ', '1557698400', 'g'),
(948, 26, '26garILklESb', '1557698400', 'g'),
(949, 26, '26ga8YKTrV4A', '1557698400', 'g'),
(950, 26, '26ga4rLb2IzJ', '1557698400', 'g'),
(951, 26, '26gaJQlD3rcK', '1557698400', 'g'),
(952, 26, '26gajn0ph9qD', '1557698400', 'g'),
(953, 26, '26gaeMzNIpSn', '1557698400', 'g'),
(954, 26, '26gaEQsWHmM5', '1557698400', 'g'),
(955, 26, '26ga4UsdoqB6', '1557698400', 'g'),
(956, 26, '26gaOtAPkl2d', '1557698400', 'g'),
(957, 26, '26gaEwXSh8EN', '1557698400', 'g'),
(958, 26, '26gaHOQUYkpv', '1557698400', 'g'),
(959, 26, '26gaAupEeQ09', '1557698400', 'g'),
(960, 26, '26gaVA2fTOwN', '1557698400', 'g'),
(961, 26, '26gaE7bcIN4n', '1557698400', 'g'),
(962, 26, '26gaSJR5svK9', '1557698400', 'g'),
(963, 26, '26gam7146Eqd', '1557698400', 'g'),
(964, 26, '26ga7Lt5NjQV', '1557698400', 'g'),
(965, 26, '26gaPFfoHdTw', '1557698400', 'g'),
(966, 26, '26gaLwf1l3yN', '1557698400', 'g'),
(967, 26, '26gaBnj5DhpO', '1557698400', 'g'),
(968, 26, '26gautzB2HVJ', '1557698400', 'g'),
(969, 26, '26gaMAknPqXX', '1557698400', 'g'),
(970, 26, '26gajcdin4fN', '1557698400', 'g'),
(971, 26, '26gaXmretXDH', '1557698400', 'g'),
(972, 26, '26gaBFv0tplD', '1557698400', 'g'),
(973, 26, '26gakp25DB7K', '1557698400', 'g'),
(974, 26, '26ga7RxJBr4s', '1557698400', 'g'),
(975, 26, '26gao4SF9sDl', '1557698400', 'g'),
(976, 26, '26gaTyPXpR36', '1557698400', 'g'),
(977, 26, '26gazIQxVe3K', '1557698400', 'g'),
(978, 26, '26gay4XeLvW2', '1557698400', 'g'),
(979, 26, '26gaQoSkyutE', '1557698400', 'g'),
(980, 26, '26gaN8XfkuDq', '1557698400', 'g'),
(981, 26, '26gairzjYTAN', '1557698400', 'g'),
(982, 26, '26gaHESbBy5E', '1557698400', 'g'),
(983, 26, '26gaboiN2yF5', '1557698400', 'g'),
(984, 26, '26gane7mqv5P', '1557698400', 'g'),
(985, 26, '26gaRObnFp8q', '1557698400', 'g'),
(986, 26, '26ga1EJNlWk4', '1557698400', 'g'),
(987, 26, '26gaJpeAKcSV', '1557698400', 'g'),
(988, 26, '26ga70nPsXJR', '1557698400', 'g'),
(989, 26, '26gaRYctiHO5', '1557698400', 'g'),
(990, 26, '26gafDlhVIR1', '1557698400', 'g'),
(991, 26, '26gaBfxIlX5M', '1557698400', 'g'),
(992, 26, '26gazld0iUyD', '1557698400', 'g'),
(993, 26, '26gaYEtwuVjp', '1557698400', 'g'),
(994, 26, '26gaqnK0DB1R', '1557698400', 'g'),
(995, 26, '26gaKd1iHcMV', '1557698400', 'g'),
(996, 26, '26gailz8q9bK', '1557698400', 'g'),
(997, 26, '26ga6TKjy5Qi', '1557698400', 'g'),
(998, 26, '26gaKHQziXNw', '1557698400', 'g'),
(999, 26, '26gaS97YQoDT', '1557698400', 'g'),
(1000, 26, '26ga6bpI3jOJ', '1557698400', 'g'),
(1001, 28, '28ga2w5Jq70k', '1557698400', 'g'),
(1002, 28, '28ga6IH2K4j1', '1557698400', 'g'),
(1003, 28, '28gaxlmkYF1p', '1557698400', 'g'),
(1004, 28, '28gaK7u8oV6X', '1557698400', 'g'),
(1005, 28, '28gauq43fYJD', '1557698400', 'g'),
(1006, 28, '28ga5jEI6xLO', '1557698400', 'g'),
(1007, 28, '28gariETANPI', '1557698400', 'g'),
(1008, 28, '28gaJpDRtS4y', '1557698400', 'g'),
(1009, 28, '28ganu3fes6R', '1557698400', 'g'),
(1010, 28, '28gasuhicp8k', '1557698400', 'g'),
(1011, 28, '28gaQISxDYvX', '1557698400', 'g'),
(1012, 28, '28gaywYqf7R3', '1557698400', 'g'),
(1013, 28, '28gaydcED6oH', '1557698400', 'g'),
(1014, 28, '28gauXFpYP70', '1557698400', 'g'),
(1015, 28, '28gaUyzqYhk0', '1557698400', 'g'),
(1016, 28, '28gafpJl16z7', '1557698400', 'g'),
(1017, 28, '28gavre91w6i', '1557698400', 'g'),
(1018, 28, '28gadwtQMHB7', '1557698400', 'g'),
(1019, 28, '28gaOpUqjXvI', '1557698400', 'g'),
(1020, 28, '28gadUQyLERO', '1557698400', 'g'),
(1021, 28, '28gaySYw3smI', '1557698400', 'g'),
(1022, 28, '28gaVkAQWjy7', '1557698400', 'g'),
(1023, 28, '28ga2DpiEdTc', '1557698400', 'g'),
(1024, 28, '28ga3UXvKurT', '1557698400', 'g'),
(1025, 28, '28gakzAVRlHB', '1557698400', 'g'),
(1026, 28, '28gas0Mjwmth', '1557698400', 'g'),
(1027, 28, '28ganKqONEpf', '1557698400', 'g'),
(1028, 28, '28gaWEO5pHNQ', '1557698400', 'g'),
(1029, 28, '28gahLPj2Y3v', '1557698400', 'g'),
(1030, 28, '28gaXfEMLrH1', '1557698400', 'g'),
(1031, 28, '28gawoMWNhPu', '1557698400', 'g'),
(1032, 28, '28gak85ryvnc', '1557698400', 'g'),
(1033, 28, '28ga8HA7XQtr', '1557698400', 'g'),
(1034, 28, '28ga8Ycr0iXT', '1557698400', 'g'),
(1035, 28, '28gaSbmViMf3', '1557698400', 'g'),
(1036, 28, '28gaHkhYjd58', '1557698400', 'g'),
(1037, 28, '28gaXs6brwPH', '1557698400', 'g'),
(1038, 28, '28gaeVdnL6fb', '1557698400', 'g'),
(1039, 28, '28gazAUpq5DV', '1557698400', 'g'),
(1040, 28, '28ga7NbqHB1P', '1557698400', 'g'),
(1041, 28, '28gaNusjqH6e', '1557698400', 'g'),
(1042, 28, '28ga7ze5vAX0', '1557698400', 'g'),
(1043, 28, '28gaDsXTujKt', '1557698400', 'g'),
(1044, 28, '28gaPteuIS1N', '1557698400', 'g'),
(1045, 28, '28gaRjOpEz6e', '1557698400', 'g'),
(1046, 28, '28gahix1tH5s', '1557698400', 'g'),
(1047, 28, '28gaUsyjm03l', '1557698400', 'g'),
(1048, 28, '28gaUKTfWiEN', '1557698400', 'g'),
(1049, 28, '28gazfPt8Ans', '1557698400', 'g'),
(1050, 28, '28gadIyx13u2', '1557698400', 'g'),
(1051, 28, '28gahOMzd59K', '1557698400', 'g'),
(1052, 28, '28ga385FJHYX', '1557698400', 'g'),
(1053, 28, '28gaYBxI0vlO', '1557698400', 'g'),
(1054, 28, '28gaRIBqUsQv', '1557698400', 'g'),
(1055, 28, '28gavuhR5fAr', '1557698400', 'g'),
(1056, 28, '28gan6L2P7KU', '1557698400', 'g'),
(1057, 28, '28gaoqLAveEH', '1557698400', 'g'),
(1058, 28, '28gamRhL7Nwt', '1557698400', 'g'),
(1059, 28, '28gaJL5jn1vV', '1557698400', 'g'),
(1060, 28, '28ga1QDfcSPk', '1557698400', 'g'),
(1061, 28, '28gacYQUAOkz', '1557698400', 'g'),
(1062, 28, '28gav9pB0IPe', '1557698400', 'g'),
(1063, 28, '28gaHkzTx7pA', '1557698400', 'g'),
(1064, 28, '28gaW0rXi9QB', '1557698400', 'g'),
(1065, 28, '28gazkwXRsdc', '1557698400', 'g'),
(1066, 28, '28gaET3bFXN5', '1557698400', 'g'),
(1067, 28, '28gaXSEuKEsh', '1557698400', 'g'),
(1068, 28, '28gaJPHqNQip', '1557698400', 'g'),
(1069, 28, '28gaFxHV9lDt', '1557698400', 'g'),
(1070, 28, '28ga87Lz3QUA', '1557698400', 'g'),
(1071, 28, '28gaKXYrSWHf', '1557698400', 'g'),
(1072, 28, '28garQBdMTcE', '1557698400', 'g'),
(1073, 28, '28gaw6vX7uLl', '1557698400', 'g'),
(1074, 28, '28gaPjxRTymH', '1557698400', 'g'),
(1075, 28, '28gab3Al1zfH', '1557698400', 'g'),
(1076, 28, '28gaBs9htVY6', '1557698400', 'g'),
(1077, 28, '28gaEvFSik1M', '1557698400', 'g'),
(1078, 28, '28gaOiHmLhIW', '1557698400', 'g'),
(1079, 28, '28ga4fb63wQL', '1557698400', 'g'),
(1080, 28, '28gaNO1rQXnm', '1557698400', 'g'),
(1081, 28, '28gaD3ENTwX8', '1557698400', 'g'),
(1082, 28, '28gaWLJAQikK', '1557698400', 'g'),
(1083, 28, '28gayc3bPiHX', '1557698400', 'g'),
(1084, 28, '28gauw8AJxSL', '1557698400', 'g'),
(1085, 28, '28ga9VU1qSIv', '1557698400', 'g'),
(1086, 28, '28gal6P0pueJ', '1557698400', 'g'),
(1087, 28, '28gaxeS3VoKz', '1557698400', 'g'),
(1088, 28, '28gaHI8lRfzk', '1557698400', 'g'),
(1089, 28, '28gaQxS8oILV', '1557698400', 'g'),
(1090, 28, '28gaB9sASTkv', '1557698400', 'g'),
(1091, 28, '28ga7Dso5LSX', '1557698400', 'g'),
(1092, 28, '28gasqOAl2BN', '1557698400', 'g'),
(1093, 28, '28gaR3HYh41V', '1557698400', 'g'),
(1094, 28, '28gavyRsi9XJ', '1557698400', 'g'),
(1095, 28, '28ga0LYAvD6S', '1557698400', 'g'),
(1096, 28, '28gaOXRdyrxu', '1557698400', 'g'),
(1097, 28, '28gakzwN0ncF', '1557698400', 'g'),
(1098, 28, '28gayXchuYpO', '1557698400', 'g'),
(1099, 28, '28gaDeVz95dK', '1557698400', 'g'),
(1100, 28, '28gakpKSAXTj', '1557698400', 'g'),
(1101, 28, '28gahesnAtd6', '1557698400', 'g'),
(1102, 28, '28ga0nhOKiXp', '1557698400', 'g'),
(1103, 28, '28gauXrPDxTR', '1557698400', 'g'),
(1104, 28, '28gaoeFXEOTi', '1557698400', 'g'),
(1105, 28, '28garQ7qHRo9', '1557698400', 'g'),
(1106, 28, '28gat4y0iHPR', '1557698400', 'g'),
(1107, 28, '28gaWTPtX3dv', '1557698400', 'g'),
(1108, 28, '28ga7BHVJ3Uh', '1557698400', 'g'),
(1109, 28, '28gaUVh1ubj8', '1557698400', 'g'),
(1110, 28, '28gaDybF2Kzp', '1557698400', 'g'),
(1111, 28, '28gaz9MOHwLq', '1557698400', 'g'),
(1112, 28, '28ga9YPkh4Sq', '1557698400', 'g'),
(1113, 28, '28gaxKBNLUnc', '1557698400', 'g'),
(1114, 28, '28gaDUMfk7Xr', '1557698400', 'g'),
(1115, 28, '28gapXShwcBQ', '1557698400', 'g'),
(1116, 28, '28gaoW1fHqck', '1557698400', 'g'),
(1117, 28, '28gavdYekWjA', '1557698400', 'g'),
(1118, 28, '28gansFI40xT', '1557698400', 'g'),
(1119, 28, '28ga2PS1mo9c', '1557698400', 'g'),
(1120, 28, '28gamd0YRWjy', '1557698400', 'g'),
(1121, 28, '28gaHVMJtD16', '1557698400', 'g'),
(1122, 28, '28gacbtnrOQ4', '1557698400', 'g'),
(1123, 28, '28gaX3pfO85q', '1557698400', 'g'),
(1124, 28, '28gaUpB4YhXT', '1557698400', 'g'),
(1125, 28, '28gabdQs1ESj', '1557698400', 'g'),
(1126, 28, '28ga1nRKh0Ul', '1557698400', 'g'),
(1127, 28, '28gajl153M6m', '1557698400', 'g'),
(1128, 28, '28gaWR7EE1Fl', '1557698400', 'g'),
(1129, 28, '28gaNt1kfYui', '1557698400', 'g'),
(1130, 28, '28gaBevzJOtR', '1557698400', 'g'),
(1131, 28, '28gaYzj2AR5F', '1557698400', 'g'),
(1132, 28, '28gaPxQybfHn', '1557698400', 'g'),
(1133, 28, '28gaP46jVJNs', '1557698400', 'g'),
(1134, 28, '28ga4Xniz3PK', '1557698400', 'g'),
(1135, 28, '28gaSE5nvYPy', '1557698400', 'g'),
(1136, 28, '28ga4u3qEHXI', '1557698400', 'g'),
(1137, 28, '28gavljEBQ9h', '1557698400', 'g');
INSERT INTO `codetable` (`id`, `war_id`, `dcode`, `date`, `prefix`) VALUES
(1138, 28, '28gaTOyKiHUM', '1557698400', 'g'),
(1139, 28, '28gam3cDLX1o', '1557698400', 'g'),
(1140, 28, '28gabtJPXQH9', '1557698400', 'g'),
(1141, 28, '28gatbkJAdf8', '1557698400', 'g'),
(1142, 28, '28gaStP8QhJc', '1557698400', 'g'),
(1143, 28, '28gaBd2UtNl8', '1557698400', 'g'),
(1144, 28, '28gaJrt6E0cB', '1557698400', 'g'),
(1145, 28, '28gaMN6lQ8u1', '1557698400', 'g'),
(1146, 28, '28gaQi8sE5o9', '1557698400', 'g'),
(1147, 28, '28gaXluiPsRo', '1557698400', 'g'),
(1148, 28, '28ga0B2wjutA', '1557698400', 'g'),
(1149, 28, '28gafFEOWMn6', '1557698400', 'g'),
(1150, 28, '28gauAbndV5L', '1557698400', 'g'),
(1151, 28, '28gaFhnXHiOx', '1557698400', 'g'),
(1152, 28, '28ga4XqlWKIO', '1557698400', 'g'),
(1153, 28, '28gaSyLrYW6j', '1557698400', 'g'),
(1154, 28, '28gab97MH2BR', '1557698400', 'g'),
(1155, 28, '28gaeH9VntdE', '1557698400', 'g'),
(1156, 28, '28gawNzAWun0', '1557698400', 'g'),
(1157, 28, '28gakcL4qAlw', '1557698400', 'g'),
(1158, 28, '28gaAjNVXO8P', '1557698400', 'g'),
(1159, 28, '28gad64vIjqS', '1557698400', 'g'),
(1160, 28, '28gabTEFQ9ke', '1557698400', 'g'),
(1161, 28, '28gaBN4TWlxs', '1557698400', 'g'),
(1162, 28, '28ga9PMtUiW1', '1557698400', 'g'),
(1163, 28, '28gacfTAxHDt', '1557698400', 'g'),
(1164, 28, '28gaE9c6iDXt', '1557698400', 'g'),
(1165, 28, '28gaEOwVl29P', '1557698400', 'g'),
(1166, 28, '28gaDtAbVjoJ', '1557698400', 'g'),
(1167, 28, '28gah8tFAzj1', '1557698400', 'g'),
(1168, 28, '28gazKMerY2H', '1557698400', 'g'),
(1169, 28, '28gapU4WV2xE', '1557698400', 'g'),
(1170, 28, '28ga5KHS2ex9', '1557698400', 'g'),
(1171, 28, '28gaPBlkfpAX', '1557698400', 'g'),
(1172, 28, '28gaPjmYobvI', '1557698400', 'g'),
(1173, 28, '28gayrEsIxe0', '1557698400', 'g'),
(1174, 28, '28gaTp6xI3Qv', '1557698400', 'g'),
(1175, 28, '28gaJdYicOmq', '1557698400', 'g'),
(1176, 28, '28gasDytbrjh', '1557698400', 'g'),
(1177, 28, '28gaJ8FmyjoE', '1557698400', 'g'),
(1178, 28, '28gaYlLdHmik', '1557698400', 'g'),
(1179, 28, '28gaMdL1wBso', '1557698400', 'g'),
(1180, 28, '28gaPutyVIlE', '1557698400', 'g'),
(1181, 28, '28gaEljstr54', '1557698400', 'g'),
(1182, 28, '28ga57ISENLJ', '1557698400', 'g'),
(1183, 28, '28gaPKimQS2c', '1557698400', 'g'),
(1184, 28, '28gafrEFbNID', '1557698400', 'g'),
(1185, 28, '28gaMEAYU4RF', '1557698400', 'g'),
(1186, 28, '28gayoksqzD2', '1557698400', 'g'),
(1187, 28, '28ga0y9J36B7', '1557698400', 'g'),
(1188, 28, '28gaTB1nuoSQ', '1557698400', 'g'),
(1189, 28, '28gahdc0onAY', '1557698400', 'g'),
(1190, 28, '28ga8Xckb5Ro', '1557698400', 'g'),
(1191, 28, '28gaPlYSdqTB', '1557698400', 'g'),
(1192, 28, '28gayViYHU53', '1557698400', 'g'),
(1193, 28, '28gaH8v5Mw47', '1557698400', 'g'),
(1194, 28, '28ga9EBoWKRn', '1557698400', 'g'),
(1195, 28, '28gaTEFPYtqu', '1557698400', 'g'),
(1196, 28, '28gaVUzEHTeS', '1557698400', 'g'),
(1197, 28, '28garfjINnpm', '1557698400', 'g'),
(1198, 28, '28gaKlBde5ut', '1557698400', 'g'),
(1199, 28, '28gaY7SJtTMH', '1557698400', 'g'),
(1200, 28, '28ga4WleHpLx', '1557698400', 'g'),
(1204, 1, '1faEJs3A86V', '1557698400', 'f'),
(1205, 1, '1fapcS8Joz3', '1557698400', 'f'),
(1206, 1, '1faH6XVqNvi', '1557698400', 'f'),
(1207, 1, '1fa3kvLMPAr', '1557698400', 'f'),
(1208, 1, '1favxm4l56W', '1557698400', 'f'),
(1209, 1, '1fat0WeNdps', '1557698400', 'f'),
(1210, 1, '1fadB2SqcRL', '1557698400', 'f'),
(1211, 1, '1fasu2KUEt8', '1557698400', 'f'),
(1212, 1, '1falxWqhV4k', '1557698400', 'f'),
(1213, 1, '1faV8qv5IGN', '1557698400', 'f'),
(1214, 1, '1faDysuzHNY', '1557698400', 'f'),
(1215, 1, '1faTL2Qu3Eg', '1557698400', 'f'),
(1216, 1, '1faWXKl9Rck', '1557698400', 'f'),
(1217, 1, '1fadhiz7lMq', '1557698400', 'f'),
(1218, 1, '1faWy0qHjtg', '1557698400', 'f'),
(1219, 1, '1faRHNGXy4t', '1557698400', 'f'),
(1220, 1, '1faiRGSUEjx', '1557698400', 'f'),
(1221, 1, '1faS8i0R3Dy', '1557698400', 'f'),
(1222, 1, '1fa9DsxbUu8', '1557698400', 'f'),
(1223, 1, '1farEG4nt3j', '1557698400', 'f'),
(1224, 1, '1fay2piLvoV', '1557698400', 'f'),
(1225, 1, '1faXdlVRhPL', '1557698400', 'f'),
(1226, 1, '1fajlnYiEGb', '1557698400', 'f'),
(1227, 1, '1fahKJgktbV', '1557698400', 'f'),
(1228, 1, '1fa1H4AvXBO', '1557698400', 'f'),
(1229, 1, '1faR5yYqeHh', '1557698400', 'f'),
(1230, 1, '1fa3iLzIJwU', '1557698400', 'f'),
(1231, 1, '1fao0wrLG5J', '1557698400', 'f'),
(1232, 1, '1faK04TnbBG', '1557698400', 'f'),
(1233, 1, '1fah9bt7EKv', '1557698400', 'f'),
(1234, 1, '1fa1VO95Ion', '1557698400', 'f'),
(1235, 1, '1favNtLTWql', '1557698400', 'f'),
(1236, 1, '1faYUEExL0Q', '1557698400', 'f'),
(1237, 1, '1fa2HdcYuEN', '1557698400', 'f'),
(1238, 1, '1fa62cxROEG', '1557698400', 'f'),
(1239, 1, '1faxzi7ANUo', '1557698400', 'f'),
(1240, 1, '1faxdG6BJoc', '1557698400', 'f'),
(1241, 1, '1fa1YULM4e6', '1557698400', 'f'),
(1242, 1, '1faSmE2D58d', '1557698400', 'f'),
(1243, 1, '1fabiRcQxe6', '1557698400', 'f'),
(1244, 1, '1faEyDnL6qT', '1557698400', 'f'),
(1245, 1, '1faesTlEAg3', '1557698400', 'f'),
(1246, 1, '1faBq98EdGP', '1557698400', 'f'),
(1247, 1, '1faJVMHkBgE', '1557698400', 'f'),
(1248, 1, '1fal2u1xkbY', '1557698400', 'f'),
(1249, 1, '1faKEyeztqE', '1557698400', 'f'),
(1250, 1, '1faP7Mk5iJ8', '1557698400', 'f'),
(1251, 1, '1fadTSE6sei', '1557698400', 'f'),
(1252, 1, '1fa5xXOiQDj', '1557698400', 'f'),
(1253, 1, '1fam3e7GhXy', '1557698400', 'f'),
(1254, 1, '1fauwqERpHX', '1557698400', 'f'),
(1255, 1, '1faqy0hg2r6', '1557698400', 'f'),
(1256, 1, '1fagOUQPSrX', '1557698400', 'f'),
(1257, 1, '1faknH23M7E', '1557698400', 'f'),
(1258, 1, '1faP6gK0czd', '1557698400', 'f'),
(1259, 1, '1fa6lJcM8W9', '1557698400', 'f'),
(1260, 1, '1faI4jbT8PN', '1557698400', 'f'),
(1261, 1, '1faM0AXnLE4', '1557698400', 'f'),
(1262, 1, '1faopnLcQuj', '1557698400', 'f'),
(1263, 1, '1favp8lGEHg', '1557698400', 'f'),
(1264, 1, '1faz7W59Guo', '1557698400', 'f'),
(1265, 1, '1faLr1kGlTH', '1557698400', 'f'),
(1266, 1, '1faKnEepqVT', '1557698400', 'f'),
(1267, 1, '1fa18EcrKpu', '1557698400', 'f'),
(1268, 1, '1fahcsLdYmB', '1557698400', 'f'),
(1269, 1, '1fa0ojqnNJB', '1557698400', 'f'),
(1270, 1, '1faVdS18Qs9', '1557698400', 'f'),
(1271, 1, '1fa3ELYwgb5', '1557698400', 'f'),
(1272, 1, '1fa97OzBxho', '1557698400', 'f'),
(1273, 1, '1famYvx62r5', '1557698400', 'f'),
(1274, 1, '1faSWPJTBjV', '1557698400', 'f'),
(1275, 1, '1faXmsGe6zY', '1557698400', 'f'),
(1276, 1, '1faRucqASmE', '1557698400', 'f'),
(1277, 1, '1faEnsRxQlo', '1557698400', 'f'),
(1278, 1, '1faTYGyR865', '1557698400', 'f'),
(1279, 1, '1faj78clIMo', '1557698400', 'f'),
(1280, 1, '1faWUQNhsvq', '1557698400', 'f'),
(1281, 1, '1faH3EOUy1M', '1557698400', 'f'),
(1282, 1, '1fagxGEzUKh', '1557698400', 'f'),
(1283, 1, '1faApREuetk', '1557698400', 'f'),
(1284, 1, '1faWyXlLkzU', '1557698400', 'f'),
(1285, 1, '1fayBoP2t0z', '1557698400', 'f'),
(1286, 1, '1fa6zrqROTd', '1557698400', 'f'),
(1287, 1, '1fayxrObdmM', '1557698400', 'f'),
(1288, 1, '1faXsn1vkl9', '1557698400', 'f'),
(1289, 1, '1fapNJnTi0M', '1557698400', 'f'),
(1290, 1, '1fadruc4xNT', '1557698400', 'f'),
(1291, 1, '1faB4gXLTlH', '1557698400', 'f'),
(1292, 1, '1fa0j2KwGve', '1557698400', 'f'),
(1293, 1, '1fauBd9QjRx', '1557698400', 'f'),
(1294, 1, '1faehEUpcvi', '1557698400', 'f'),
(1295, 1, '1faOimDSXEJ', '1557698400', 'f'),
(1296, 1, '1faKuxoUgYS', '1557698400', 'f'),
(1297, 1, '1fahy5Y2OuT', '1557698400', 'f'),
(1298, 1, '1faTPtn84Ll', '1557698400', 'f'),
(1299, 1, '1fa0HkjQ6pS', '1557698400', 'f'),
(1300, 1, '1faey83pWOc', '1557698400', 'f'),
(1301, 1, '1faKwxXB0vc', '1557698400', 'f'),
(1302, 1, '1faMdSEBnEc', '1557698400', 'f'),
(1303, 1, '1faj5Wy3uOX', '1557698400', 'f'),
(1304, 1, '1fa9S1uXnqO', '1557698400', 'f'),
(1305, 1, '1fa6lWLi03V', '1557698400', 'f'),
(1306, 1, '1farmN9sEhU', '1557698400', 'f'),
(1307, 1, '1fa7hWSjq8P', '1557698400', 'f'),
(1308, 1, '1faNKcVzDPn', '1557698400', 'f'),
(1309, 1, '1faydMx2zmD', '1557698400', 'f'),
(1310, 1, '1fapnEt95Uu', '1557698400', 'f'),
(1311, 1, '1faVEglT4DQ', '1557698400', 'f'),
(1312, 1, '1faDJkhG4gp', '1557698400', 'f'),
(1313, 1, '1faMIgtiV8L', '1557698400', 'f'),
(1314, 1, '1faupWGXw1s', '1557698400', 'f'),
(1315, 1, '1faR6wOcQzI', '1557698400', 'f'),
(1316, 1, '1fax3TVhdK5', '1557698400', 'f'),
(1317, 1, '1faW2dAEXHm', '1557698400', 'f'),
(1318, 1, '1faXAG6X02b', '1557698400', 'f'),
(1319, 1, '1faOryvKnQh', '1557698400', 'f'),
(1320, 1, '1farpHPjtcv', '1557698400', 'f'),
(1321, 1, '1faO0EAiMzU', '1557698400', 'f'),
(1322, 1, '1fah2gAVRyI', '1557698400', 'f'),
(1323, 1, '1faJB4ut5E0', '1557698400', 'f'),
(1324, 1, '1faQxXKrBYj', '1557698400', 'f'),
(1325, 1, '1fa2ikT60zr', '1557698400', 'f'),
(1326, 1, '1faytgLAiPr', '1557698400', 'f'),
(1327, 1, '1faLx047bgv', '1557698400', 'f'),
(1328, 1, '1fahYJUR4bQ', '1557698400', 'f'),
(1329, 1, '1faeWyYUj2k', '1557698400', 'f'),
(1330, 1, '1fauELRkVys', '1557698400', 'f'),
(1331, 1, '1fa0v2AlLe9', '1557698400', 'f'),
(1332, 1, '1faPocl4XB6', '1557698400', 'f'),
(1333, 1, '1fawRitXL5X', '1557698400', 'f'),
(1334, 1, '1faKO9IVd8j', '1557698400', 'f'),
(1335, 1, '1fakXXOsTBu', '1557698400', 'f'),
(1336, 1, '1fat6x9PQiW', '1557698400', 'f'),
(1337, 1, '1faeR08uXQ3', '1557698400', 'f'),
(1338, 1, '1famtTcBVU6', '1557698400', 'f'),
(1339, 1, '1faEGXzB5VK', '1557698400', 'f'),
(1340, 1, '1fa0uUJnk3r', '1557698400', 'f'),
(1341, 1, '1faTYyruEQL', '1557698400', 'f'),
(1342, 1, '1faswnqrW73', '1557698400', 'f'),
(1343, 1, '1fa2dAmuV8r', '1557698400', 'f'),
(1344, 1, '1fah9GVwm0c', '1557698400', 'f'),
(1345, 1, '1fawc4ULW1E', '1557698400', 'f'),
(1346, 1, '1facYyPBs3j', '1557698400', 'f'),
(1347, 1, '1fab9ELl0nH', '1557698400', 'f'),
(1348, 1, '1fanQgJKREq', '1557698400', 'f'),
(1349, 1, '1fa7w1EoWjt', '1557698400', 'f'),
(1350, 1, '1favzYyQuWk', '1557698400', 'f'),
(1351, 1, '1faG5h7S1L2', '1557698400', 'f'),
(1352, 1, '1fao689SqBT', '1557698400', 'f'),
(1353, 1, '1fauw5M90HQ', '1557698400', 'f'),
(1354, 1, '1fag62IrSNP', '1557698400', 'f'),
(1355, 1, '1fa7hbscm9M', '1557698400', 'f'),
(1356, 1, '1facY8RLojD', '1557698400', 'f'),
(1357, 1, '1faNQIG5rlR', '1557698400', 'f'),
(1358, 1, '1faYKJG42lD', '1557698400', 'f'),
(1359, 1, '1faHPW9MKXr', '1557698400', 'f'),
(1360, 1, '1fapJchkwLb', '1557698400', 'f'),
(1361, 1, '1faNYmOkuEz', '1557698400', 'f'),
(1362, 1, '1faz5QxL8Gq', '1557698400', 'f'),
(1363, 1, '1fadQ7PkHnu', '1557698400', 'f'),
(1364, 1, '1faox6gq9XO', '1557698400', 'f'),
(1365, 1, '1faqvN0wXMr', '1557698400', 'f'),
(1366, 1, '1famE9WBset', '1557698400', 'f'),
(1367, 1, '1faIO9StcDN', '1557698400', 'f'),
(1368, 1, '1faS65PQ2HO', '1557698400', 'f'),
(1369, 1, '1faSkxH8Avw', '1557698400', 'f'),
(1370, 1, '1faYJrGvS7E', '1557698400', 'f'),
(1371, 1, '1faqukSt7RI', '1557698400', 'f'),
(1372, 1, '1favp2hUbIQ', '1557698400', 'f'),
(1373, 1, '1faOVmNGpdw', '1557698400', 'f'),
(1374, 1, '1fabiHIWs9A', '1557698400', 'f'),
(1375, 1, '1fa63GsAM2P', '1557698400', 'f'),
(1376, 1, '1faxDw3giqE', '1557698400', 'f'),
(1377, 1, '1faxEuGDXkV', '1557698400', 'f'),
(1378, 1, '1faqJiGBoXI', '1557698400', 'f'),
(1379, 1, '1faVduXx5RQ', '1557698400', 'f'),
(1380, 1, '1fa8nkJyoRD', '1557698400', 'f'),
(1381, 1, '1faLjXP4e3B', '1557698400', 'f'),
(1382, 1, '1fahxtXcmQE', '1557698400', 'f'),
(1383, 1, '1faVpAJormP', '1557698400', 'f'),
(1384, 1, '1fa7XWRi92l', '1557698400', 'f'),
(1385, 1, '1faWsHLn9hP', '1557698400', 'f'),
(1386, 1, '1faw4pyLGYu', '1557698400', 'f'),
(1387, 1, '1faX4bKYMjJ', '1557698400', 'f'),
(1388, 1, '1faPvUGBmSz', '1557698400', 'f'),
(1389, 1, '1fadvplnbxk', '1557698400', 'f'),
(1390, 1, '1fanQb8YLqV', '1557698400', 'f'),
(1391, 1, '1favOiwmuhl', '1557698400', 'f'),
(1392, 1, '1far61BKDUI', '1557698400', 'f'),
(1393, 1, '1fa20b7dLxO', '1557698400', 'f'),
(1394, 1, '1faYwuxWOhk', '1557698400', 'f'),
(1395, 1, '1fa37opQ2Ty', '1557698400', 'f'),
(1396, 1, '1faybRs8pnM', '1557698400', 'f'),
(1397, 1, '1faJLd9XIr2', '1557698400', 'f'),
(1398, 1, '1fadwiT2qtc', '1557698400', 'f'),
(1399, 1, '1faLIKXNE6D', '1557698400', 'f'),
(1400, 1, '1fakbTsd37V', '1557698400', 'f'),
(1429, 3, '3faivH0ckyj', '1557698400', 'f'),
(1430, 3, '3faQ3AOsnz1', '1557698400', 'f'),
(1431, 3, '3faB4RNneIM', '1557698400', 'f'),
(1432, 3, '3fa9gmnKT8A', '1557698400', 'f'),
(1433, 3, '3faojlkG169', '1557698400', 'f'),
(1434, 3, '3faPA7Bp0Vk', '1557698400', 'f'),
(1435, 3, '3faoV9uA0Xi', '1557698400', 'f'),
(1436, 3, '3fae4yKEjgo', '1557698400', 'f'),
(1437, 3, '3fazocYeUnM', '1557698400', 'f'),
(1438, 3, '3fa9tEizYyK', '1557698400', 'f'),
(1439, 3, '3fawzhHR93o', '1557698400', 'f'),
(1440, 3, '3fa9HPqDAvj', '1557698400', 'f'),
(1441, 3, '3faxORJskWX', '1557698400', 'f'),
(1442, 3, '3faPgvz3r4J', '1557698400', 'f'),
(1443, 3, '3fa5Xj1oOAy', '1557698400', 'f'),
(1444, 3, '3faTuKJyXjX', '1557698400', 'f'),
(1445, 3, '3fag8tQKSYb', '1557698400', 'f'),
(1446, 3, '3faJ6XY0dbu', '1557698400', 'f'),
(1447, 3, '3favKpsqzMH', '1557698400', 'f'),
(1448, 3, '3faNnwPlGhS', '1557698400', 'f'),
(1449, 3, '3faLQHYExGX', '1557698400', 'f'),
(1450, 3, '3fa0cyTMSjw', '1557698400', 'f'),
(1451, 3, '3fa8ukdKWLn', '1557698400', 'f'),
(1452, 3, '3faKEbY9j07', '1557698400', 'f'),
(1453, 3, '3faE3XiS1oH', '1557698400', 'f'),
(1454, 3, '3fav8wsOXp4', '1557698400', 'f'),
(1455, 3, '3fagcMSXEWp', '1557698400', 'f'),
(1456, 3, '3faP4VGsmNi', '1557698400', 'f'),
(1457, 3, '3fajmunHhYB', '1557698400', 'f'),
(1458, 3, '3faWJQc5yut', '1557698400', 'f'),
(1459, 3, '3faAMEnr32J', '1557698400', 'f'),
(1460, 3, '3fa0YRDlxKP', '1557698400', 'f'),
(1461, 3, '3facljBtKni', '1557698400', 'f'),
(1462, 3, '3fazNE3wiI0', '1557698400', 'f'),
(1463, 3, '3fa8XhBcxRW', '1557698400', 'f'),
(1464, 3, '3faKyHBOE2U', '1557698400', 'f'),
(1465, 3, '3fagxNlXsAo', '1557698400', 'f'),
(1466, 3, '3fadzpV0vMU', '1557698400', 'f'),
(1467, 3, '3fa83JvhjTW', '1557698400', 'f'),
(1468, 3, '3fa8B4xVky9', '1557698400', 'f'),
(1469, 3, '3fa58SJWTg0', '1557698400', 'f'),
(1470, 3, '3faXYveSE2m', '1557698400', 'f'),
(1471, 3, '3fayVhXw1Ab', '1557698400', 'f'),
(1472, 3, '3faoeKxrmEj', '1557698400', 'f'),
(1473, 3, '3faWD6dzXRK', '1557698400', 'f'),
(1474, 3, '3faBoX5YMj6', '1557698400', 'f'),
(1475, 3, '3fabDSLv4wJ', '1557698400', 'f'),
(1476, 3, '3fact1iVNoG', '1557698400', 'f'),
(1477, 3, '3faLHUDIdEJ', '1557698400', 'f'),
(1478, 3, '3faSbxD5w7u', '1557698400', 'f'),
(1479, 3, '3falvEmPMzc', '1557698400', 'f'),
(1480, 3, '3fad3oOBUeE', '1557698400', 'f'),
(1481, 3, '3fa3v9XAKW7', '1557698400', 'f'),
(1482, 3, '3fahvNUSnuV', '1557698400', 'f'),
(1483, 3, '3fa4XoeYwJu', '1557698400', 'f'),
(1484, 3, '3fax96s4HlG', '1557698400', 'f'),
(1485, 3, '3fa0hiNGV7O', '1557698400', 'f'),
(1486, 3, '3faV0NEIHXq', '1557698400', 'f'),
(1487, 3, '3faO0S5wkrv', '1557698400', 'f'),
(1488, 3, '3faeTEWYhg0', '1557698400', 'f'),
(1489, 3, '3famQY6r1vl', '1557698400', 'f'),
(1490, 3, '3fawWHd593R', '1557698400', 'f'),
(1491, 3, '3fas4By2goE', '1557698400', 'f'),
(1492, 3, '3faWRu6OkKj', '1557698400', 'f'),
(1493, 3, '3fau97P0BLd', '1557698400', 'f'),
(1494, 3, '3fa6XsyjPKh', '1557698400', 'f'),
(1495, 3, '3favsdXmHOI', '1557698400', 'f'),
(1496, 3, '3faGRPKU216', '1557698400', 'f'),
(1497, 3, '3fa96TkXgYE', '1557698400', 'f'),
(1498, 3, '3faQ7seP42o', '1557698400', 'f'),
(1499, 3, '3faLzDBd5m6', '1557698400', 'f'),
(1500, 3, '3faKXv6XJRG', '1557698400', 'f'),
(1501, 3, '3fagezcwPIb', '1557698400', 'f'),
(1502, 3, '3fa5kq8puOW', '1557698400', 'f'),
(1503, 3, '3fa10N2E4vm', '1557698400', 'f'),
(1504, 3, '3faM0PRLDYb', '1557698400', 'f'),
(1505, 3, '3faruMGeTP4', '1557698400', 'f'),
(1506, 3, '3fayrIDdEPc', '1557698400', 'f'),
(1507, 3, '3faEKL97bm6', '1557698400', 'f'),
(1508, 3, '3fa2yeTENHj', '1557698400', 'f'),
(1509, 3, '3falXxJk0B7', '1557698400', 'f'),
(1510, 3, '3fax1jJHAtD', '1557698400', 'f'),
(1511, 3, '3faOsjIpL87', '1557698400', 'f'),
(1512, 3, '3faj1LwPNUd', '1557698400', 'f'),
(1513, 3, '3faDr8HelP9', '1557698400', 'f'),
(1514, 3, '3faqbUPocVR', '1557698400', 'f'),
(1515, 3, '3fa5Ore9IRi', '1557698400', 'f'),
(1516, 3, '3fatc1YHsuT', '1557698400', 'f'),
(1517, 3, '3fa7JmwN86o', '1557698400', 'f'),
(1518, 3, '3fayKIswRzr', '1557698400', 'f'),
(1519, 3, '3facEGdxujT', '1557698400', 'f'),
(1520, 3, '3fagsPXBnhy', '1557698400', 'f'),
(1521, 3, '3faey31TmbS', '1557698400', 'f'),
(1522, 3, '3fapzvxN0EQ', '1557698400', 'f'),
(1523, 3, '3fawe6K1sXT', '1557698400', 'f'),
(1524, 3, '3faOKoM2mIw', '1557698400', 'f'),
(1525, 3, '3fa0zTdweEn', '1557698400', 'f'),
(1526, 3, '3faWH5ubQjx', '1557698400', 'f'),
(1527, 3, '3faXNb0S1Au', '1557698400', 'f'),
(1528, 3, '3fazqMi8tuD', '1557698400', 'f'),
(1529, 3, '3fadOy89U7q', '1557698400', 'f'),
(1530, 3, '3faNExhIG3k', '1557698400', 'f'),
(1531, 3, '3faQJt6DXim', '1557698400', 'f'),
(1532, 3, '3faeXlyIXAk', '1557698400', 'f'),
(1533, 3, '3fajpv98Ey7', '1557698400', 'f'),
(1534, 3, '3faswO8HMiY', '1557698400', 'f'),
(1535, 3, '3fa3sPS6uqx', '1557698400', 'f'),
(1536, 3, '3fahEz6bcli', '1557698400', 'f'),
(1537, 3, '3farWQP3AL2', '1557698400', 'f'),
(1538, 3, '3faj9QtMk2E', '1557698400', 'f'),
(1539, 3, '3fatjP5soRO', '1557698400', 'f'),
(1540, 3, '3faDL3l0JSK', '1557698400', 'f'),
(1541, 3, '3fa42IRTEP8', '1557698400', 'f'),
(1542, 3, '3faL3Md0zcV', '1557698400', 'f'),
(1543, 3, '3fa3HdeNEW8', '1557698400', 'f'),
(1544, 3, '3fae8O9Gcuv', '1557698400', 'f'),
(1545, 3, '3fawPYk8stu', '1557698400', 'f'),
(1546, 3, '3faJckBWiDP', '1557698400', 'f'),
(1547, 3, '3famgGlEKTp', '1557698400', 'f'),
(1548, 3, '3faT2KmMXBq', '1557698400', 'f'),
(1549, 3, '3fa6XgM7XyE', '1557698400', 'f'),
(1550, 3, '3fa8rcRSyp5', '1557698400', 'f'),
(1551, 3, '3faMHT2xd93', '1557698400', 'f'),
(1552, 3, '3faWbeMhQdT', '1557698400', 'f'),
(1553, 3, '3fage1zupH7', '1557698400', 'f'),
(1554, 3, '3fanzrXhVSx', '1557698400', 'f'),
(1555, 3, '3fapu58B0q4', '1557698400', 'f'),
(1556, 3, '3fahYkVnOP8', '1557698400', 'f'),
(1557, 3, '3faOAUSXlhq', '1557698400', 'f'),
(1558, 3, '3fae9NLIUhk', '1557698400', 'f'),
(1559, 3, '3faesKEoVEM', '1557698400', 'f'),
(1560, 3, '3fazVyxd8oO', '1557698400', 'f'),
(1561, 3, '3faBpo3VHtI', '1557698400', 'f'),
(1562, 3, '3faJ6VYcPnU', '1557698400', 'f'),
(1563, 3, '3faAm9UlIyp', '1557698400', 'f'),
(1564, 3, '3faMmWXLwPz', '1557698400', 'f'),
(1565, 3, '3faLW2EzPEO', '1557698400', 'f'),
(1566, 3, '3fazWgowHJD', '1557698400', 'f'),
(1567, 3, '3faxDGtdz4c', '1557698400', 'f'),
(1568, 3, '3faGeT7gSH1', '1557698400', 'f'),
(1569, 3, '3fa5u7Xyoch', '1557698400', 'f'),
(1570, 3, '3faIVdW7SoU', '1557698400', 'f'),
(1571, 3, '3faxQy3KpOM', '1557698400', 'f'),
(1572, 3, '3faeNMs4j57', '1557698400', 'f'),
(1573, 3, '3fauLBJDe46', '1557698400', 'f'),
(1574, 3, '3faVKI45nmU', '1557698400', 'f'),
(1575, 3, '3fam8nzN7XO', '1557698400', 'f'),
(1576, 3, '3faLVsEhlPX', '1557698400', 'f'),
(1577, 3, '3fasXw4AN20', '1557698400', 'f'),
(1578, 3, '3faOTt9xzVh', '1557698400', 'f'),
(1579, 3, '3faw40XbKpG', '1557698400', 'f'),
(1580, 3, '3faIrvi7zVu', '1557698400', 'f'),
(1581, 3, '3faNVIY1TlG', '1557698400', 'f'),
(1582, 3, '3fajNunlyPD', '1557698400', 'f'),
(1583, 3, '3faU5Kjsv4S', '1557698400', 'f'),
(1584, 3, '3faXBs2RN85', '1557698400', 'f'),
(1585, 3, '3faTy7k1dYx', '1557698400', 'f'),
(1586, 3, '3fa2LjT9DBr', '1557698400', 'f'),
(1587, 3, '3faKsU9W3Pr', '1557698400', 'f'),
(1588, 3, '3faxmz1g7vc', '1557698400', 'f'),
(1589, 3, '3faGURbuJxy', '1557698400', 'f'),
(1590, 3, '3fahX07bW4r', '1557698400', 'f'),
(1591, 3, '3fa3qzxknQ7', '1557698400', 'f'),
(1592, 3, '3faY4unmXWQ', '1557698400', 'f'),
(1593, 3, '3faNyKXD7Mn', '1557698400', 'f'),
(1594, 3, '3fak0GY5dQH', '1557698400', 'f'),
(1595, 3, '3fayvpT3i6B', '1557698400', 'f'),
(1596, 3, '3faBuO0M7kI', '1557698400', 'f'),
(1597, 3, '3fa8VpohKND', '1557698400', 'f'),
(1598, 3, '3fakAlrpX0u', '1557698400', 'f'),
(1599, 3, '3favEBUckDz', '1557698400', 'f'),
(1600, 3, '3faunAkEeEM', '1557698400', 'f'),
(1604, 4, '4faiu2Eh7BM', '1557698400', 'f'),
(1605, 4, '4fa5ubcxyAK', '1557698400', 'f'),
(1606, 4, '4faTKqlswoJ', '1557698400', 'f'),
(1607, 4, '4fa0sXoYGpz', '1557698400', 'f'),
(1608, 4, '4fa0mlh8czv', '1557698400', 'f'),
(1609, 4, '4faQEuXSLc1', '1557698400', 'f'),
(1610, 4, '4faqlLI56pG', '1557698400', 'f'),
(1611, 4, '4fasxjJlcun', '1557698400', 'f'),
(1612, 4, '4faV1qcE2Y9', '1557698400', 'f'),
(1613, 4, '4faMJqk7rpX', '1557698400', 'f'),
(1614, 4, '4faQDcOY6sv', '1557698400', 'f'),
(1615, 4, '4fayjAqnViX', '1557698400', 'f'),
(1616, 4, '4faJ4HS0RoA', '1557698400', 'f'),
(1617, 4, '4fajE70EQqU', '1557698400', 'f'),
(1618, 4, '4faIHzsqTg5', '1557698400', 'f'),
(1619, 4, '4fa4JY2R5nj', '1557698400', 'f'),
(1620, 4, '4faMXEmGyKd', '1557698400', 'f'),
(1621, 4, '4faqGHwlLDJ', '1557698400', 'f'),
(1622, 4, '4fa0PHrwIEg', '1557698400', 'f'),
(1623, 4, '4faDjPIwW74', '1557698400', 'f'),
(1624, 4, '4fav2DGcik4', '1557698400', 'f'),
(1625, 4, '4faX3OU2Iw6', '1557698400', 'f'),
(1626, 4, '4faeTPvxcmJ', '1557698400', 'f'),
(1627, 4, '4fasb6edjnt', '1557698400', 'f'),
(1628, 4, '4faP2gJMu6S', '1557698400', 'f'),
(1629, 4, '4faXANIDin8', '1557698400', 'f'),
(1630, 4, '4faTEQzMunl', '1557698400', 'f'),
(1631, 4, '4faNwV5ye1i', '1557698400', 'f'),
(1632, 4, '4fa5pdwGiWT', '1557698400', 'f'),
(1633, 4, '4faIKMy0nlQ', '1557698400', 'f'),
(1634, 4, '4faVd5W36gt', '1557698400', 'f'),
(1635, 4, '4faHjRMoNVp', '1557698400', 'f'),
(1636, 4, '4fapX1xvTDK', '1557698400', 'f'),
(1637, 4, '4fa6l5yG8mp', '1557698400', 'f'),
(1638, 4, '4fa1XhLgr5v', '1557698400', 'f'),
(1639, 4, '4faOb3nMioz', '1557698400', 'f'),
(1640, 4, '4falWAMYEtL', '1557698400', 'f'),
(1641, 4, '4faQkxs2Snd', '1557698400', 'f'),
(1642, 4, '4faEP1ORbil', '1557698400', 'f'),
(1643, 4, '4fahX4pkcLI', '1557698400', 'f'),
(1644, 4, '4fayBHlvEXj', '1557698400', 'f'),
(1645, 4, '4fa1rAkHGUO', '1557698400', 'f'),
(1646, 4, '4faw4rjpVny', '1557698400', 'f'),
(1647, 4, '4faXQwbGPyH', '1557698400', 'f'),
(1648, 4, '4faoXnAd9sQ', '1557698400', 'f'),
(1649, 4, '4fa2LhOb3Ud', '1557698400', 'f'),
(1650, 4, '4fa1q6DKXBV', '1557698400', 'f'),
(1651, 4, '4fa1WYJeSP4', '1557698400', 'f'),
(1652, 4, '4faz2g73VYR', '1557698400', 'f'),
(1653, 4, '4fa5W80xXHS', '1557698400', 'f'),
(1654, 4, '4faeptKocuI', '1557698400', 'f'),
(1655, 4, '4fawXlm6jOP', '1557698400', 'f'),
(1656, 4, '4faJPqLi7b8', '1557698400', 'f'),
(1657, 4, '4fat0RzT64h', '1557698400', 'f'),
(1658, 4, '4fahtX0R8K3', '1557698400', 'f'),
(1659, 4, '4faELNA9My8', '1557698400', 'f'),
(1660, 4, '4faQGJnMrs8', '1557698400', 'f'),
(1661, 4, '4faDlvKeLXy', '1557698400', 'f'),
(1662, 4, '4fa5cBQEvXl', '1557698400', 'f'),
(1663, 4, '4faVg8W7Dex', '1557698400', 'f'),
(1664, 4, '4faPimlrLRg', '1557698400', 'f'),
(1665, 4, '4fawU4vxEWh', '1557698400', 'f'),
(1666, 4, '4faitwuLVle', '1557698400', 'f'),
(1667, 4, '4fawEudpRGy', '1557698400', 'f'),
(1668, 4, '4faHOMNTlyc', '1557698400', 'f'),
(1669, 4, '4faTsXyuVe5', '1557698400', 'f'),
(1670, 4, '4fadXGmyANx', '1557698400', 'f'),
(1671, 4, '4fa9X5zvjBk', '1557698400', 'f'),
(1672, 4, '4faibIYK32M', '1557698400', 'f'),
(1673, 4, '4faqhKLVDpv', '1557698400', 'f'),
(1674, 4, '4fax0soLd1O', '1557698400', 'f'),
(1675, 4, '4faVqI5Qv1R', '1557698400', 'f'),
(1676, 4, '4famP9TYK1s', '1557698400', 'f'),
(1677, 4, '4faPtyqKUNS', '1557698400', 'f'),
(1678, 4, '4faeko0IKD8', '1557698400', 'f'),
(1679, 4, '4fa6LETzGBQ', '1557698400', 'f'),
(1680, 4, '4fazKUxmsdA', '1557698400', 'f'),
(1681, 4, '4faeWMyzRxo', '1557698400', 'f'),
(1682, 4, '4fa7dQHMEkA', '1557698400', 'f'),
(1683, 4, '4fapcrVwPYN', '1557698400', 'f'),
(1684, 4, '4faXw8VEk5t', '1557698400', 'f'),
(1685, 4, '4fajE53oqSL', '1557698400', 'f'),
(1686, 4, '4fabEuz1L0r', '1557698400', 'f'),
(1687, 4, '4faVPgsRB1T', '1557698400', 'f'),
(1688, 4, '4faXEjd4AUP', '1557698400', 'f'),
(1689, 4, '4fa0c7rX5YK', '1557698400', 'f'),
(1690, 4, '4fatGcrEOn2', '1557698400', 'f'),
(1691, 4, '4fa9w7Wlc5h', '1557698400', 'f'),
(1692, 4, '4farNVHud05', '1557698400', 'f'),
(1693, 4, '4faJEPdBucK', '1557698400', 'f'),
(1694, 4, '4faUvt2csd1', '1557698400', 'f'),
(1695, 4, '4fax5qQU9t3', '1557698400', 'f'),
(1696, 4, '4fax2V8Hp05', '1557698400', 'f'),
(1697, 4, '4faPeJzgIOn', '1557698400', 'f'),
(1698, 4, '4fab8MK90uc', '1557698400', 'f'),
(1699, 4, '4faPrWmxbKV', '1557698400', 'f'),
(1700, 4, '4fayrXqnlUz', '1557698400', 'f'),
(1701, 4, '4faOjipM8G6', '1557698400', 'f'),
(1702, 4, '4fa8YkQT3mp', '1557698400', 'f'),
(1703, 4, '4fa3o6JqURj', '1557698400', 'f'),
(1704, 4, '4faQ7tw8GiX', '1557698400', 'f'),
(1705, 4, '4faTDliSXoU', '1557698400', 'f'),
(1706, 4, '4faX6i7mHAg', '1557698400', 'f'),
(1707, 4, '4fa9O7hWzKN', '1557698400', 'f'),
(1708, 4, '4fa8xrbhWLq', '1557698400', 'f'),
(1709, 4, '4faEolOAn1q', '1557698400', 'f'),
(1710, 4, '4fau0GU47RO', '1557698400', 'f'),
(1711, 4, '4fa96t3koru', '1557698400', 'f'),
(1712, 4, '4faQeMcioYW', '1557698400', 'f'),
(1713, 4, '4fa7tdDPMop', '1557698400', 'f'),
(1714, 4, '4faMwmR7LSy', '1557698400', 'f'),
(1715, 4, '4fasKYBSm8h', '1557698400', 'f'),
(1716, 4, '4faErVum6p2', '1557698400', 'f'),
(1717, 4, '4faARrWwnqc', '1557698400', 'f'),
(1718, 4, '4fahiUvwpXQ', '1557698400', 'f'),
(1719, 4, '4fapMR7jrvy', '1557698400', 'f'),
(1720, 4, '4faEDj9pPHy', '1557698400', 'f'),
(1721, 4, '4faEIvJ5MT0', '1557698400', 'f'),
(1722, 4, '4fapPRwm4nK', '1557698400', 'f'),
(1723, 4, '4faNI5EBG7t', '1557698400', 'f'),
(1724, 4, '4fa15QJdSg6', '1557698400', 'f'),
(1725, 4, '4fakr3BY9QE', '1557698400', 'f'),
(1726, 4, '4faOmM0hBrg', '1557698400', 'f'),
(1727, 4, '4faNe4dDnmj', '1557698400', 'f'),
(1728, 4, '4faDEtyM05n', '1557698400', 'f'),
(1729, 4, '4faTdYzwn2P', '1557698400', 'f'),
(1730, 4, '4faJklbQ2cE', '1557698400', 'f'),
(1731, 4, '4faq1bsVpJG', '1557698400', 'f'),
(1732, 4, '4famc8kH06Y', '1557698400', 'f'),
(1733, 4, '4faTt1MNGQW', '1557698400', 'f'),
(1734, 4, '4faq6UO9gsx', '1557698400', 'f'),
(1735, 4, '4fagVdsT1bQ', '1557698400', 'f'),
(1736, 4, '4fai6xv9ST1', '1557698400', 'f'),
(1737, 4, '4favp4PAOi2', '1557698400', 'f'),
(1738, 4, '4fawBik731l', '1557698400', 'f'),
(1739, 4, '4fagurPVXB7', '1557698400', 'f'),
(1740, 4, '4fauzYpIXcW', '1557698400', 'f'),
(1741, 4, '4faY5hTXSqN', '1557698400', 'f'),
(1742, 4, '4faDrsRXtBi', '1557698400', 'f'),
(1743, 4, '4faNcGdrUW6', '1557698400', 'f'),
(1744, 4, '4faV51vLzEJ', '1557698400', 'f'),
(1745, 4, '4faER5o4qJ7', '1557698400', 'f'),
(1746, 4, '4fad21GITOm', '1557698400', 'f'),
(1747, 4, '4faIHBP9tY3', '1557698400', 'f'),
(1748, 4, '4faWwQ4lxBA', '1557698400', 'f'),
(1749, 4, '4faXuGgXc4t', '1557698400', 'f'),
(1750, 4, '4faz9LbBQNI', '1557698400', 'f'),
(1751, 4, '4faHAbULumN', '1557698400', 'f'),
(1752, 4, '4faBdj98ncI', '1557698400', 'f'),
(1753, 4, '4faUTNvRwL6', '1557698400', 'f'),
(1754, 4, '4faUOX50lIG', '1557698400', 'f'),
(1755, 4, '4fazIpgVUB2', '1557698400', 'f'),
(1756, 4, '4faKMBRkQEA', '1557698400', 'f'),
(1757, 4, '4famXhqwXKz', '1557698400', 'f'),
(1758, 4, '4faSkcmxE7P', '1557698400', 'f'),
(1759, 4, '4far1lOKipc', '1557698400', 'f'),
(1760, 4, '4fav2zs3nkU', '1557698400', 'f'),
(1761, 4, '4famOPeHV70', '1557698400', 'f'),
(1762, 4, '4faqOU8IGpd', '1557698400', 'f'),
(1763, 4, '4fa9V8zPRvp', '1557698400', 'f'),
(1764, 4, '4fakv58si73', '1557698400', 'f'),
(1765, 4, '4faxOGzPXrI', '1557698400', 'f'),
(1766, 4, '4faMvdj1nQb', '1557698400', 'f'),
(1767, 4, '4faLgNSiEzl', '1557698400', 'f'),
(1768, 4, '4faNExEjLdX', '1557698400', 'f'),
(1769, 4, '4favBNAdbLS', '1557698400', 'f'),
(1770, 4, '4faQB5SxcoD', '1557698400', 'f'),
(1771, 4, '4falu2p5sWV', '1557698400', 'f'),
(1772, 4, '4fayWsuKbJn', '1557698400', 'f'),
(1773, 4, '4faAU2SxEju', '1557698400', 'f'),
(1774, 4, '4faGRH2jAhz', '1557698400', 'f'),
(1775, 4, '4fa4tTNXOpX', '1557698400', 'f'),
(1776, 4, '4fapLRuScV3', '1557698400', 'f'),
(1777, 4, '4fagzHIqsJp', '1557698400', 'f'),
(1778, 4, '4faRjEMWtSo', '1557698400', 'f'),
(1779, 4, '4faqu7Sh4Jc', '1557698400', 'f'),
(1780, 4, '4fakjXOveEz', '1557698400', 'f'),
(1781, 4, '4faUt4cNsYj', '1557698400', 'f'),
(1782, 4, '4faxAVELImU', '1557698400', 'f'),
(1783, 4, '4fa6Ao0eYzx', '1557698400', 'f'),
(1784, 4, '4faHRujdIwh', '1557698400', 'f'),
(1785, 4, '4faEPLdx0zc', '1557698400', 'f'),
(1786, 4, '4faM5Wj0EXL', '1557698400', 'f'),
(1787, 4, '4fab9WnLGis', '1557698400', 'f'),
(1788, 4, '4falhvXngO0', '1557698400', 'f'),
(1789, 4, '4faVGwXU6Hd', '1557698400', 'f'),
(1790, 4, '4faGgVpUjqd', '1557698400', 'f'),
(1791, 4, '4fakqlXxGNz', '1557698400', 'f'),
(1792, 4, '4faW1luOdNc', '1557698400', 'f'),
(1793, 4, '4fadLns2R5j', '1557698400', 'f'),
(1794, 4, '4faG8u1zQE2', '1557698400', 'f'),
(1795, 4, '4faOLe5VY4t', '1557698400', 'f'),
(1796, 4, '4faUp7EednB', '1557698400', 'f'),
(1797, 4, '4fa0HBVXqNE', '1557698400', 'f'),
(1798, 4, '4fakMg0SXER', '1557698400', 'f'),
(1799, 4, '4faqsDP1Nov', '1557698400', 'f'),
(1800, 4, '4fanslWhApm', '1557698400', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_nmae` varchar(30) NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL,
  `x2` double NOT NULL,
  `x1` double NOT NULL,
  `y2` double NOT NULL,
  `y1` double NOT NULL,
  `zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_id`, `country_nmae`, `x`, `y`, `x2`, `x1`, `y2`, `y1`, `zone`) VALUES
(1, 1, ' Abia ', 7.5247, 5.4309, 4.8, 0.8, 14.2, 13, 2),
(2, 2, ' Adamawa ', 12.4381, 9.325, 13, 7, 30, 26.9, 5),
(3, 3, ' Akwa Ibom ', 7.8722, 4.93, 2.4, 0.1, 16, 13, 1),
(4, 4, ' Anambra ', 7.0068, 6.2758, 5.4, 3.1, 12.8, 11.6, 2),
(5, 5, ' Bauchi ', 9.8237, 10.301, 17.8, 11.6, 22.5, 16.1, 5),
(6, 6, ' Bayelsa ', 5.8987, 4.8678, 2.4, 0, 10.9, 8.5, 1),
(7, 7, ' Benue ', 8.8363, 7.3508, 8.5, 4.8, 19.1, 13, 4),
(8, 8, ' Borno ', 13.174, 12.1205, 20.1, 12.7, 28, 24.5, 5),
(9, 9, ' Cross River ', 8.6601, 6.167, 5.7, 0.1, 18.8, 15.1, 1),
(10, 10, ' Delta ', 5.8987, 5.5325, 5, 1.4, 11.7, 7.7, 1),
(11, 11, ' Ebonyi ', 7.9593, 6.178, 5.5, 3, 16.6, 13.9, 2),
(12, 12, ' Edo ', 5.8987, 6.5438, 7.3, 3.1, 11.8, 7, 1),
(13, 13, ' Ekiti ', 5.3103, 7.6656, 6.6, 8.6, 9.9, 7.4, 3),
(14, 14, ' Enugu ', 7.5247, 6.6069, 6.2, 3.7, 14.8, 12.9, 2),
(15, 15, ' Federal Capital Territory ', 7.3986, 9.0765, 11.5, 9, 14.4, 12.1, 4),
(16, 16, ' Gombe ', 11.1731, 10.2791, 15.8, 11.6, 25.3, 21.9, 5),
(17, 17, ' Imo ', 7.0068, 5.6039, 3.5, 2, 13.6, 11.5, 2),
(18, 18, ' Jigawa ', 9.7233, 12.446, 19.5, 14.8, 22, 16, 6),
(19, 19, ' Kaduna ', 7.4165, 10.5105, 15.8, 10.7, 17.4, 10.6, 6),
(20, 20, ' Kano ', 8.592, 12.0022, 18.5, 14, 18.9, 16.8, 6),
(21, 21, ' Katsina ', 7.6223, 12.9816, 20.2, 15.5, 18.1, 12.9, 6),
(22, 22, ' Kebbi ', 4.0695, 11.6781, 20.1, 16.6, 10.4, 4, 6),
(23, 23, ' Kogi ', 6.5783, 7.9075, 10.3, 5, 14.8, 8.7, 4),
(24, 24, ' Kwara ', 4.5624, 8.9848, 13.3, 8.5, 10.3, 1.8, 4),
(25, 25, ' Lagos ', 3.6218, 6.608, 5.6, 4.7, 5.8, 1.8, 3),
(26, 26, ' Nasarawa ', 8.3088, 8.5705, 20.2, 14.9, 13.3, 6.5, 4),
(27, 27, ' Niger ', 8.0817, 17.6078, 15.7, 8.9, 13.8, 4.2, 4),
(28, 28, ' Ogun ', 3.5813, 6.9075, 8.2, 5, 6.7, 1.5, 3),
(29, 29, ' Ondo ', 7.1, 6.0959, 7.8, 3.3, 9.5, 5.9, 3),
(30, 30, ' Osun ', 4.5624, 7.5876, 8.6, 5.9, 7.5, 5, 3),
(31, 31, ' Oyo ', 3.9368, 7.843, 11.1, 6.4, 6.6, 1.7, 3),
(32, 32, ' Plateau ', 9.3673, 9.2446, 13.6, 9.1, 22.4, 17, 4),
(33, 33, ' Rivers ', 4.8581, 6.9209, 2.7, 0, 13.8, 11, 1),
(34, 34, ' Sokoto ', 5.2267, 12.0004, 21, 17.5, 11, 5.6, 3),
(35, 35, ' Taraba ', 10.26, 8.0055, 11.9, 5.2, 25.1, 18.8, 5),
(36, 36, ' Yobe ', 11.7068, 12.1871, 20.3, 13.9, 20, 27, 5),
(37, 37, ' Zamfara ', 6.2376, 12.1844, 20.1, 14.9, 13, 6.5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `country3`
--

CREATE TABLE `country3` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_nmae` varchar(30) NOT NULL,
  `reg` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL,
  `x2` double NOT NULL,
  `x1` double NOT NULL,
  `y2` double NOT NULL,
  `y1` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country3`
--

INSERT INTO `country3` (`id`, `country_id`, `country_nmae`, `reg`, `zone`, `x`, `y`, `x2`, `x1`, `y2`, `y1`) VALUES
(1, 1, 'Abia', 2, 5, -3.65, -8, -2.7, -4.4, -6.8, -8.7),
(2, 2, 'adamawa', 4, 3, 6.75, 0.53, 8.6, 4.8, 4.2, -3.15),
(3, 3, 'Akwa ibom', 2, 4, -2.95, -8, -1.8, -3.9, -7.3, -9.6),
(4, 4, 'Anambra', 2, 5, -4.7, -5.27, -4, -5.5, -4.5, -7),
(5, 6, '4', 4, 3, 2.63, 4.9, 3.25, -1.25, 6.5, 1.1),
(7, 7, 'Bayesa', 2, 4, -6.95, -8.8, -5.8, -8.1, -7.5, -10.1),
(9, 9, 'Benue', 5, 1, -1, -3.7, 1.5, -3.5, -2, -5.4),
(10, 10, 'Cross River', 2, 4, -2.2, -6.9, 0.5, -3.9, -4.5, -9.3),
(11, 11, 'Delta', 2, 4, -7.25, -6.95, -5.5, -9, -5.5, -8.4),
(12, 12, 'Ebbonyi', 2, 5, -2.35, -5.7, -1.5, -3.2, -4.7, -6),
(13, 13, 'Edo', 1, 4, -6.95, -4.95, -5.5, -9, -2.9, -7),
(14, 14, 'Ekiti', 1, 6, -8.55, -2.8, -7.5, -9.4, -2.2, -3.4),
(15, 15, 'Enugu', 2, 5, -3.95, -5.35, -2.9, -4.8, -4.1, -6.6),
(16, 16, 'Federal Capital Territory', 5, 1, -4.3, 0.3, -3.9, -4.4, -0.5, -0.1),
(17, 17, 'Gombe', 4, 3, 4.1, 3.75, 5.7, 2.5, 5, 1.5),
(18, 18, 'Imo', 2, 5, -4.5, -7.5, -3.5, -5.5, -6.5, -8.5),
(19, 19, 'Jigawa', 3, 2, 1.3, 6.3, 2.6, -2.6, 8.5, 4.1),
(20, 20, 'Kaduna', 5, 2, -4.05, 2.75, -1.3, -6.8, 5.4, 0.1),
(21, 21, 'Kano', 3, 2, -0.95, 5.4, 0.4, -2.7, 6.65, 4.2),
(22, 22, 'Kastina', 3, 2, -2.2, 6.95, 0.7, -5.1, 9.2, 4.7),
(23, 23, 'Kebbi', 3, 2, -9.65, 6, -69, -12.4, 9.5, 2.5),
(24, 24, 'Kogi', 5, 1, 5.55, -3.05, -2.9, -8.2, -0.6, -5.5),
(25, 25, 'Kwara', 1, 1, -9.75, -0.1, -6.5, -13, 2.3, -2.5),
(26, 26, 'Lagos', 1, 6, -12.75, -5.25, -10.5, -14, -5, -5.5),
(27, 27, 'Nasarawa', 5, 1, -1.95, -0.45, 0.9, 4.8, 1.9, 2.8),
(28, 28, 'Niger', 5, 1, -7.5, 3.15, -4.3, -10, 4.8, 1.5),
(29, 29, 'Ogun', 1, 6, -11.5, -4.3, -9.9, -14, -2.6, -6),
(30, 30, 'Ondo', 1, 6, -8.65, -4.85, -68, -10.5, -3, -6.7),
(31, 31, 'Oyo', 1, 6, -12, -2, -10, -15, 0.5, -4.5),
(32, 32, 'Osun', 1, 6, -10.1, -3.25, -9, -11, -2, -4.5),
(33, 33, 'Plateau', 5, 1, 0.25, 0.925, 3, -1.5, 3.15, -1.3),
(34, 34, 'Rivers', 2, 4, -8.4, -8.4, -3.6, -6, -7, -9.8),
(35, 35, 'Sokoto', 3, 2, -8.25, -8.35, -5.5, -11, 10, 6.2),
(36, 36, 'Taraba', 4, 3, 3.05, -2.2, 5.8, -0.1, 1, -5.4),
(37, 37, 'Yobe', 4, 3, 4, 7.5, 6.3, 1.7, 9.5, 3.4),
(38, 38, 'Zamfara', 3, 2, 7.525, 6.2, -5.05, -10, 8.4, 4),
(39, 39, 'Borno', 4, 3, 8, 8.35, 11.1, 4.9, 10.4, 2.1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `tittle` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(45) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  `total` varchar(20) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `shipping` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `joined` varchar(40) NOT NULL,
  `img` varchar(225) NOT NULL,
  `date` varchar(40) NOT NULL,
  `trans` varchar(20) NOT NULL,
  `clog` int(11) NOT NULL,
  `vesname` varchar(50) NOT NULL,
  `cdis` varchar(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT '0',
  `token` varchar(300) NOT NULL,
  `passch` varchar(300) NOT NULL,
  `air` varchar(40) NOT NULL,
  `road` varchar(40) NOT NULL,
  `rail` varchar(40) NOT NULL,
  `dloc` varchar(50) NOT NULL,
  `dstate` varchar(50) NOT NULL,
  `dcountry` varchar(50) NOT NULL,
  `dadd` varchar(50) NOT NULL,
  `dnum` varchar(50) NOT NULL,
  `log` int(11) NOT NULL,
  `time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `tittle`, `fname`, `lname`, `email`, `password`, `salt`, `oid`, `address`, `loc`, `city`, `state`, `country`, `zipcode`, `hash`, `total`, `payment`, `shipping`, `telephone`, `joined`, `img`, `date`, `trans`, `clog`, `vesname`, `cdis`, `t_name`, `verify`, `token`, `passch`, `air`, `road`, `rail`, `dloc`, `dstate`, `dcountry`, `dadd`, `dnum`, `log`, `time`) VALUES
(12, 'mr', 'websmith', 'balogun', 'adioadeyoriazeez@yahoo.com', 'e45c27dd9302fa0e4a983d5dc6641e412000e9fa3a04d073269e89d7e6cb8548', '+ çû´_FÔRé¹ì¡ÊsvÝä~sv\rA÷q·ºn', '', '098158304888', '108', '10', '9', 'nigeria', 300001, 'ba98358be67af100b440f7def33c1bb423de556e311862b00e', '0', 'On Delivery', 'Standard', 'Abra aka umuta biase', '1547637105', 'IMG_5005.PNG', '2018-04-21', '0', 1, 'coaster', '11.783', ' oshodia', 1, '8fe16a58f9d64ab7cf90efab50b7eb29', 'sUX7mPDQ6BAke0ngirpIqOaEYzZcoTJwCRSVtjxylWMLvfG2bN491dKFH5uh3', '', '', '', '', '', '', '', '', 0, '1557945846'),
(18, 'mr', 'websmith', 'james', 'balop3e@gmail.com', '4ebdd9c91abd5c81a94879540b73e81385683a2a08e991a39f3f5e701c8bb2cb', 'K´r¿²MÛs»D–dg\rž¯åw®ÖiÎq:&ÀRd', '', '7a, otunubi street off college road, haruna b/stop, ogba', '9', '9', '2', 'Nigeria', 300001, '5dac45abe02b2bbbac314a0282820965a4a74dfcabbc2728bb', '4397.8', 'On Delivery', 'Free Shipping', '090989710194', '1547637105', '', '', '', 0, '', '', '', 1, '', '', '', '', '', '', '', '', '', '', 1547546455, ''),
(19, 'mr', 'websmith', 'james', 'beneantroptist@gmail.com', '9ff0f96a9f74e060f73f8793bd1edbab9b74db6d468e3e87c286431e743276cb', 'MŸ·¬ÒáÒòIÓŒí\\KÒn~B>ïG³ŠÙ–D¬', '', '7a, otunubi street off college road, haruna b/stop, ogba', '', 'Ikeja, Lagos', '', 'Nigeria', 300001, 'e6149bf07a44d9ea59d5709008df64cdcf90025fb5f6454006', '4397.8', 'On Delivery', 'Free Shipping', '08158304888', '1547637168', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', 0, ''),
(20, 'abe', 'olabis', 'augutine', 'bisi@gmail.com', '5798d93bdafce0e7d2f958f0ed896c4f6da6aec6512757dccad25f128fc4453f', '‘Œ÷äåÇ……²òMÖ\Z…§Z»ónfb€Àž,ò`', '', '7a, otunubi street off college road, haruna b/stop, ogba', '', 'ikeja', '', 'Nigeria', 300001, '8722f0dc58bc775efe080a53247789d831283350ea0a330dd5', '4397.8', 'On Delivery', 'Standard', '09025554902', '1547637105', '', 'Mon Feb 2018 ', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', 0, ''),
(31, 'Mrs', 'oguntade', 'omolara', 'lara@gmail.com', '3e44b60a81846bb32b67097bd8f1a14ad5b862973b2dc091fb955c7b02eab85e', 'ÑªùØ2êÆÏÝ…Î	à¨¨æ®¿¯Ÿ6êî=ï³œ', '', '121, oguntona streen, ewekoro ogun state', 'ifo', 'ogun', 'ogun', 'Nigeria', 300001, '90f89758bbc098e814f40bca4afde5435530a6335ec1313d33', '0', 'On Delivery', 'Standard', '08158304888', '1547637105', 'BL17_COM_PALM_2157602f.jpg', '2018-04-14', '0', 4, 'truck', '237.573', 'babaradantran', 1, '', '', '', '', '', '', '', '', '', '', 0, ''),
(32, 'Mr', 'odeblde', 'lumon', 'luk@gmail.com', 'f8609d37059c0b3e6d82c502cfa7fca632592b5a48528917032708b9b0cd8a7e', '`…mg(PÍµî¥ÁòØæï_Jú»“DÏš“ïì{‰E);', '', '114, Yejide road molete', '207', 'ebonyi', '12', 'Nigeria', 300001, '064661eb2165d371a49a1464563dce3500af31203d90b30b61', '600', 'On Delivery', 'Standard', '08064374020', '1547637200', 'brahma-1232489_1280.jpg', '2018-04-10', '772.98', 4, 'truck', '598.135', 'babaradantran', 0, '', '', '', '', '', '', '', '', '', '', 0, ''),
(33, 'coloniel', 'nwachuhwuku', 'gabriel', 'gabreil@gmail.com', '5ff13f0927fd8c53f65eb7c394b15f6b51c664bcd07802858e6fc8044d0103ac', 'ëR]ƒlå6×PfG`	ƒ\n|9A@H¦=:‘fI“F', '', '198, uwa avenu, anambra', 'nwa', 'obiko', 'anabra', 'nigeria', 300001, 'baf75a2d41940ab8ba9f96e179fb1566abf193a985c10324b8', '', '', '', '09025554945', '1547637200', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', 0, ''),
(34, 'mrs', 'arigbabu', 'emaka', 'meka@gmail.com', 'e9ca542a9632d32e5b20559cfab684f5bc66d99b63d5057df61fda6833f14593', 'èšäÆ‘@Ùy¶’2\"ñ†ÒÛ\\nNÈY8/^¸aýk÷', '', '12a, kika raod benin', 'kika', 'benin city', '', 'Nigeria', 3000345, '3ebd900466ac722a1718f98c6d84094101d6fadb20d70a069a', '520', 'Card Payment', 'Standard', '08158304888', '1547637200', '', '2018-03-31', '0', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', 0, ''),
(108, 'mr', 'Azeez', 'Adio', 'adioadeyoriyazeez@gmail.coms', 'ff85569ec5b8cf72329c1e2cfb5749ac61b7220ee01314ce66601cdb1cf631d1', '4QÉdý+²8 `«z}PÜùº””–=À–ùÚ`üÞñ', '', 'road 4 plot 21, favourland estate lifecamp, 21', 'ibadan-agodi gate', '', 'oyo', 'Nigria', 0, '1e0bdab810e586f09bc61c1cc8d21a26ad035e24ff0d472ab9', '8760', '', '', '09087675434', '1547637300', '', '', '9208', 0, '', '', '', 1, '', 'ckzqAEVQrvtiX9jZUp41oORJMHleNFIgD6B3WnGPm20wxSy7uasbhdfL5TKYC', '', '', '', '', '', '', '', '', 1547547964, '1547549593'),
(109, 'mr', 'adio', 'azeez', 'jobsiteonlyforadeyori@gmail.com', '7497e172956573e28674a316bf5d25ab600908ec7bd776a780d5baa1df82b20e', 'Jvð;Ï©§Ãd}#A3}ZÌmöaA]™^û\r8', '', '114,yejide road molete ', 'ibadan-ring road', '', 'oyo', 'Nigria', 0, '05467ee072b657bbd2767a5a7207b5dfa19e39d248f6f2c8e5', '0', '', '', '08064374020', '1547637300', '', '', '0', 0, '', '', '', 1, 'W4A3TvXMsyfolNFiJcgPUunICOYHp0QEGjwrRz75ZtxLqSeh9K26mkdDVb1aB', '', '', '', '', '', '', '', '', '', 0, ''),
(112, '', 'Adio', 'adewunmi', 'adioadeyoriazeez@gmail.com', '8c894280f981ca7664d7b9b0893a79327aebf9a16ba56c8aa3426ad879881ec1', 'SíÀèÃôFŸP¦ÛµÝ 7×•„¿® m•è@¾øµÚŠ', '', '7a,owennan delta', '154', '', '10', '', 0, '', '', '', '', '8158304888', '1547555150', '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '', '', '', '', 0, '1557964014');

-- --------------------------------------------------------

--
-- Table structure for table `customers_session`
--

CREATE TABLE `customers_session` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_session`
--

INSERT INTO `customers_session` (`id`, `users_id`, `hash`) VALUES
(32, 53, '6468efbf7c645056979a3193739d8952357c3fb823ca97bb2b'),
(33, 109, '30119d4aaabafc5c883beac20b58c7fac02666d42b8dfff862');

-- --------------------------------------------------------

--
-- Table structure for table `dedset`
--

CREATE TABLE `dedset` (
  `id` int(11) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `fr` double NOT NULL,
  `ca_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dedset`
--

INSERT INTO `dedset` (`id`, `ca_id`, `fr`, `ca_name`) VALUES
(1, 1, 0.1, 'dairies'),
(2, 2, 0.3, 'fruits'),
(3, 3, 0.3, 'grains'),
(4, 4, 0.12, 'livestocks'),
(5, 5, 0.08, 'nuts'),
(6, 6, 123, 'oil'),
(7, 7, 0.12, 'poultry'),
(8, 8, 0.11, 'sea produce'),
(9, 9, 0.09, 'spice'),
(10, 10, 0.07, 'tubers'),
(11, 11, 0.07, 'vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `drec`
--

CREATE TABLE `drec` (
  `id` int(11) NOT NULL,
  `tot` int(21) NOT NULL,
  `ma` int(21) NOT NULL,
  `pr` int(21) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drec`
--

INSERT INTO `drec` (`id`, `tot`, `ma`, `pr`, `date`) VALUES
(3, 5, 617109, 101400, '1555020000'),
(4, 15, 6171788, 1014679, '1555020078'),
(5, 8, 6777109, 2321400, '1555024550'),
(6, 19, 7171788, 1014679, '1555020078');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body_text` text NOT NULL,
  `body_html` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farbank`
--

CREATE TABLE `farbank` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(50) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `accounnumber` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `bkid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farbank`
--

INSERT INTO `farbank` (`id`, `fn`, `ln`, `bankname`, `accounnumber`, `email`, `bkid`) VALUES
(6, '', '', 'access', 1234567890, 'banana@gmail.com', 'sGBrCEqFpeoAmHD'),
(7, '', '', 'access', 1234567890, 'banana@gmail.com', 'HFsrEpeCBGoqmDA'),
(13, '', '', 'gtb', 128029805, 'jobsiteonlyforadeyori@gmail.com', 'soGHpBeACqDEmrF'),
(15, 'Adioo', 'Adeyori', 'rand', 1234567890, 'jobsiteonlyforadeyori@gmail.com', 'HrCmEFBpAqeDosG'),
(16, 'Adelani', 'Adeyori', 'access', 1234567890, 'jobsiteonlyforadeyori@gmail.com', 'oCemBrHGApsDFEq'),
(18, 'Adelani', 'adio', 'stanbic', 1234567890, 'jobsiteonlyforadeyori@gmail.com', 'AeroFGpmECHsBqD'),
(19, 'Azeez', 'adeyori', 'ecobank', 1234567890, 'balop3e@gmail.com', 'peFDGmoqsAErCBH'),
(24, 'azeez', 'adio', 'stanbic', 1234567890, 'adioadeyoriazeez@gmail.com', 'sqBpoeAmHGDFCrE'),
(26, 'adety', 'qwerty', 'stanbic', 1234567890, 'adioadeyoriazeez@yahoo.com', 'DCerEpBmqAGHosF'),
(27, 'werty', 'asdfgh', 'diamond', 1234567890, 'adioadeyoriazeez@yahoo.com', 'epCmsAGHroFqBE');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `agid` varchar(200) NOT NULL,
  `fn` varchar(150) NOT NULL,
  `mn` varchar(150) NOT NULL,
  `ln` varchar(150) NOT NULL,
  `ge` varchar(50) NOT NULL,
  `ag` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `bn` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `state` varchar(120) NOT NULL,
  `location` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `img` varchar(224) NOT NULL,
  `joined` int(200) NOT NULL,
  `regday` int(11) NOT NULL,
  `grp` int(11) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(222) NOT NULL,
  `pt` varchar(50) NOT NULL,
  `tk` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `log` int(11) NOT NULL,
  `puvc` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(40) NOT NULL,
  `conf` int(11) NOT NULL,
  `confd` varchar(40) NOT NULL,
  `ap` int(11) NOT NULL,
  `pach` int(11) NOT NULL,
  `paup` int(11) NOT NULL,
  `pachdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `pid`, `agid`, `fn`, `mn`, `ln`, `ge`, `ag`, `email`, `bn`, `password`, `salt`, `state`, `location`, `address`, `telephone`, `img`, `joined`, `regday`, `grp`, `bk`, `bkid`, `pt`, `tk`, `time`, `log`, `puvc`, `about`, `sn`, `conf`, `confd`, `ap`, `pach`, `paup`, `pachdate`) VALUES
(1, 'f4752319608', '', 'Azeeze', 'Enoedo', 'Adio', 'Male', '31', 'adioadeyoriazeez@gmail.com', 'abppreversity', '05583dd15011c44661227368f513eede8ef259c22212c79197d5ac1daded51c9', '£Ç_˜ŸúRëø;*â.BÀ…Î8ÊGg`ç', '10', '179', '114, Yejide road molete', '08189710194', 't5G90HeR6S9d.jpg', 1550407363, 1550407363, 1, 1, 'HrCmEFBpAqeDosG', '', '', '22:15:39', 1557870197, '', '', '', 1, '1557698400', 22, 1, 22, '1557698400'),
(3, 'f6870915469', '', 'sdfdghg', 'fcvg', 'v n vn', 'Male', '-0', 'adioadeyoriazeez@yahoo.com', 'fdfdfddfd', '5c228abe56e0e655dbdc643e416ade07b7ad57f16b3a847f60f50f6c4fb6ea7d', 'Xó›è\"”rmñÒ•[óCn,ñP/i³_Œ®', '3', '18', '4344r4', '222222222222', 'eon07SKmWJVG.jpg', 1554843558, 1554842417, 1, 1, 'epCmsAGHroFqB', '', 'd0bcea723416400e31bd0ed34a7a4778', '1554810017', 1557858853, '', '', '', 1, '1555192800', 19, 0, 0, ''),
(4, 'f7752319608', '', 'Azeez', 'Enoedo', 'Adio', 'Male', '31', 'adioadeyoriazeez@gmail3.com', 'cde-afgg', '0f62002e655351bc1e648a66fa8a0f5d9c9974d97caee35b9ffa6c554f3e3848', 'wÎìI-gÕDM N~änƒoJGr£”¹Š‰©ôø‰ì', '31', '952', '114, Yejide road molete', '08064374020', 'cmd5dsyGP2Ds.jpg', 1550407363, 1550407363, 1, 1, 'HrCmEFBpAqeDosH', '', '', '22:15:39', 1557802753, '', '', '', 1, '1555192800', 19, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fusers_session`
--

CREATE TABLE `fusers_session` (
  `id` int(11) NOT NULL,
  `users_id` int(111) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fusers_session`
--

INSERT INTO `fusers_session` (`id`, `users_id`, `hash`) VALUES
(1, 20, '54bfabf6fb22eab3b9f3665dc3b45f3d36258f1ee41a57794a'),
(2, 2, '78c1fa1e885dea223a1d7c65ef53fab71031b79ed5b55fbfb8'),
(3, 1, '09bf33c0af2f9231f19a8f79cf9b1158e691226a7d3b5ec649'),
(4, 3, '813e315e214247c4b6ec56597467f56629a73c6f98b83b12b3');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `name` varchar(50) NOT NULL,
  `desc` varchar(225) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quatity` int(11) NOT NULL,
  `tot` text NOT NULL,
  `img` varchar(225) NOT NULL,
  `delcost` varchar(50) NOT NULL,
  `oid` varchar(64) NOT NULL,
  `createon` varchar(50) NOT NULL,
  `time` varchar(40) NOT NULL,
  `tref` varchar(30) NOT NULL,
  `worth` float NOT NULL,
  `poc` varchar(20) NOT NULL,
  `paytok` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `pid`, `email`, `name`, `desc`, `price`, `quatity`, `tot`, `img`, `delcost`, `oid`, `createon`, `time`, `tref`, `worth`, `poc`, `paytok`) VALUES
(1, 63, 'jobsiteonlyforadeyori@gmail.com', 'banana', 'from me', '730', 13, '9490', '0uc05f97dmWSwqe2obs33hbacEi1k2ddgr9Atd4R6d993d2ioY2nTn9.jpg\r\n', '', '5bab3951cd10a', '2018-09-26', '08:46:25', 'express', 0, 'FvmQxXyw', ''),
(2, 67, 'jobsiteonlyforadeyori@gmail.com', 'hen', 'hen from me', '290', 140, '40716', '9R1oornWi092dd430qsh29iSTmdn9c3eEdb6w2dcYf7kdub3Ag2a9t5.jpg\r\n', '', '5bab3956f39f0', '2018-09-26', '08:46:31', 'road', 0, 'fICpVvbZ', ''),
(28, 75, 'balop3e@gmail.com', '', 'Fresh cow milk is is product that is naturally extracted from life cow. the product is good for human consumption because of the present of lactose which is dissacharide consist of glucose and galactose. the glucose monomer c', '1200', 5, '6000', 'milkf3058714269.jpg', '', '5c3c92ae6b660', '1547420400', '1547469982', '', 0, 'pK8nMw2S', ''),
(29, 73, 'balop3e@gmail.com', '', 'dxdxdfxxcrytiuiyuhiurhiurhr  fr rfr fr r frurruhrhirrhr h rhrhtruhiurtruhtuhr rtutruhturihturhturhr rutruihtrht', '750', 4, '3000', 'avatar-1f3058714269.jpg', '', '5c3d5a502cef0', '1547506800', '1547521088', '', 0, 'j4s8ardz', ''),
(30, 77, 'balop3e@gmail.com', '', 'the flesh contain a lot of mineral. the cow i strong and healthy', '120000', 5, '600000', 'cowa5632471890.jpg', '', '5c3d5c0a27ead', '1547506800', '1547521530', '', 0, 'eXTHPmEz', ''),
(32, 78, 'balop3e@gmail.com', '', 'life fowl', '1200', 1, '1200', 'fowl1f3058714269.jpg', '', '5c3d5c1d3cfaa', '1547506800', '1547521549', '', 0, 'HDiK5zrO', ''),
(33, 75, 'balop3e@gmail.com', '', 'Fresh cow milk is is product that is naturally extracted from life cow. the product is good for human consumption because of the present of lactose which is dissacharide consist of glucose and galactose. the glucose monomer c', '1200', 6, '7200', 'milkf3058714269.jpg', '', '5c3df27fb2600', '1547506800', '1547560047', '', 0, 'V7nKOUkF', ''),
(34, 75, 'balop3e@gmail.com', '', 'Fresh cow milk is is product that is naturally extracted from life cow. the product is good for human consumption because of the present of lactose which is dissacharide consist of glucose and galactose. the glucose monomer c', '1200', 6, '7200', 'milkf3058714269.jpg', '', '5c3df2ea95524', '1547506800', '1547560154', '', 0, 'z3L7p1hF', ''),
(35, 79, 'balop3e@gmail.com', '', 'fresh cow milk is a natural source milk that good for human health, this milk is harvested on /01/2019 ', '540', 1, '540', 'milk - Copy (2)f3058714269.jpg', '', '5c3df5bc0da08', '1547506800', '1547560876', '', 0, '97SAMk5D', ''),
(36, 98, 'adioadeyoriazeez@gmail.com', '', 'This Cassava_flakes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex', '6200', 1, '6200', '7h9yS0wSjie4.jpg', '', '5c9cf097d4a36', '1553727600', '1553785479', '', 0, 'PwI8BKUd', ''),
(37, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 2, '6400', '3cwOSGd2D7Hd.jpg', '', '5c9cf097e90c6', '1553727600', '1553785479', '', 0, 's80KgUAy', ''),
(38, 86, 'adioadeyoriazeez@gmail.com', '', '', '345', 4, '1380', 'baS40YGk7Dju.jpg', '', '5c9d0ca64360c', '1553727600', '1553792662', '', 0, 'XUEZBw63', ''),
(39, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 2, '6400', '3cwOSGd2D7Hd.jpg', '', '5c9d0ca660ef3', '1553727600', '1553792662', '', 0, 'GBJkpr9v', ''),
(40, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 4, '12800', '3cwOSGd2D7Hd.jpg', '', '5c9d0d94516de', '1553727600', '1553792900', '', 0, 'iYI1GLKd', ''),
(41, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 2, '6464', 'qX29EeH7mPYW.jpg', '', '5c9d0d946b24d', '1553727600', '1553792900', '', 0, 'INSMoR3r', ''),
(42, 86, 'adioadeyoriazeez@gmail.com', '', '', '345', 1, '345', 'baS40YGk7Dju.jpg', '', '5c9d0d948699e', '1553727600', '1553792900', '', 0, 'D9F2nsMf', ''),
(43, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 12, '38400', '3cwOSGd2D7Hd.jpg', '', '5ca9032a3575d', '1554501600', '1554576666', '', 0, '3nktNyUh', ''),
(44, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 6, '19392', 'qX29EeH7mPYW.jpg', '', '5ca9032a3f79d', '1554501600', '1554576666', '', 0, 'rs3vmxMP', ''),
(45, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 12, '38400', '3cwOSGd2D7Hd.jpg', '', '5ca90e136d33e', '1554501600', '1554579459', '', 0, 'POhomj2E', ''),
(46, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 6, '19392', 'qX29EeH7mPYW.jpg', '', '5ca90e1375675', '1554501600', '1554579459', '', 0, 'cYFDn1JL', ''),
(47, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 12, '38400', '3cwOSGd2D7Hd.jpg', '', '5ca91b24b010a', '1554501600', '1554582804', '', 0, 'CmiwJ6a7', ''),
(48, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 6, '19392', 'qX29EeH7mPYW.jpg', '', '5ca91b24b8e96', '1554501600', '1554582804', '', 0, '0QrRN1on', ''),
(49, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca94313b9343', '1554588000', '1554593027', '', 0, 'YgmOV5XW', ''),
(50, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca9438081a78', '1554588000', '1554593136', '', 0, 'JkRHFjVl', ''),
(51, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca9438087409', '1554588000', '1554593136', '', 0, 'BeSu7DYd', ''),
(52, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca94b5204b8e', '1554588000', '1554595138', '', 0, 'p65Y2t0T', ''),
(53, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca94b520dbd9', '1554588000', '1554595138', '', 0, 'sL1Im9WV', ''),
(54, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca9509dc431c', '1554588000', '1554596493', '', 0, 'HwFAyIaz', ''),
(55, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca9509dcf1f9', '1554588000', '1554596493', '', 0, 'Ii31Us24', ''),
(56, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 5, '16000', '3cwOSGd2D7Hd.jpg', '', '5ca958d0e0a71', '1554588000', '1554598592', '', 0, 'RGl7Mo5C', ''),
(57, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 1, '3232', 'qX29EeH7mPYW.jpg', '', '5ca958d0ea1d2', '1554588000', '1554598592', '', 0, 'IxN1paW3', ''),
(58, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca95b1ebf3cd', '1554588000', '1554599182', '', 0, 'znsNTtL3', ''),
(59, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca95b1ecd89a', '1554588000', '1554599182', '', 0, '2SrKzva5', ''),
(60, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca95d7b6cdbf', '1554588000', '1554599787', '', 0, '2uaO1y8F', ''),
(61, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca95d7b768cd', '1554588000', '1554599787', '', 0, 'MGio8SZ3', ''),
(62, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca95da3b2b68', '1554588000', '1554599827', '', 0, 'GxA2nXRU', ''),
(63, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca95da3baa2e', '1554588000', '1554599827', '', 0, 'WkjiTvcB', ''),
(64, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca95ddd6395c', '1554588000', '1554599885', '', 0, '1A3CQi6Y', ''),
(65, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca95ddd6c517', '1554588000', '1554599885', '', 0, 'oLKXshg8', ''),
(66, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca95e0f891fe', '1554588000', '1554599935', '', 0, 'ZWQfCrtT', ''),
(67, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca95e0f92946', '1554588000', '1554599935', '', 0, '4P2D0WFJ', ''),
(68, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca95e663522d', '1554588000', '1554600022', '', 0, 'HrhZxbDO', ''),
(69, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca95e663e29c', '1554588000', '1554600022', '', 0, 'PsrvRKxy', ''),
(70, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 3, '9600', '3cwOSGd2D7Hd.jpg', '', '5ca95ea173672', '1554588000', '1554600081', '', 0, 'ljnmChLd', ''),
(71, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 5, '16160', 'qX29EeH7mPYW.jpg', '', '5ca95ea17ce6d', '1554588000', '1554600081', '', 0, 'zy3KCu7s', ''),
(72, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 1, '3200', '3cwOSGd2D7Hd.jpg', '', '5cac2e954eba3', '1554760800', '1554784389', '', 0, '509cn1Yw', ''),
(73, 93, 'adioadeyoriazeez@gmail.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3200', 1, '3200', '3cwOSGd2D7Hd.jpg', '', '5cadf456d80ab', '1554847200', '1554900550', '', 0, 'tNwCFkur', ''),
(74, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 4, '38400', '9gdsKb06fJSd.jpg', '37000.805330096', '5cb8c3b65c969', '1555538400', '1555608998', '', 0, 'HZTCnGcp', ''),
(75, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 4, '38400', '9gdsKb06fJSd.jpg', '119841.49726359', '5cb8c7ac3c6c4', '1555538400', '1555610012', '', 0, '2fUiPzld', ''),
(76, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 4, '38400', '9gdsKb06fJSd.jpg', '119841.49726359', '5cb8c85922cd9', '1555538400', '1555610185', '', 0, 'wP3Q1Slp', ''),
(77, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 11, '105600', '9gdsKb06fJSd.jpg', '185004.02665048', '5cb9094b97957', '1555624800', '1555626811', '', 0, 'krtlQD2T', ''),
(78, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 2, '19200', '9gdsKb06fJSd.jpg', '46040.675261767', '5cb95f31621ae', '1555624800', '1555648801', '', 0, '7rHKCjJc', ''),
(79, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 2, '19200', '9gdsKb06fJSd.jpg', '72386.172772667', '5cb95f6d284f7', '1555624800', '1555648861', '', 0, 'zAbCZgsY', ''),
(80, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 2, '19200', '9gdsKb06fJSd.jpg', '72386.172772667', '5cb95f9c5ee9a', '1555624800', '1555648908', '', 0, 'ksQG7Bau', ''),
(81, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 2, '19200', '9gdsKb06fJSd.jpg', '46040.675261767', '5cb9609a521db', '1555624800', '1555649162', '', 0, 'eXrfhMCE', ''),
(82, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 2, '19200', '9gdsKb06fJSd.jpg', '72386.172772667', '5cb96166ad301', '1555624800', '1555649366', '', 0, 'xuMmIHhl', ''),
(83, 108, 'adioadeyoriazeez@gmail.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 2, '19200', '9gdsKb06fJSd.jpg', '148353.28695458', '5cb962e189663', '1555624800', '1555649745', '', 0, 'RXxOAFHc', ''),
(84, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 2, '6464', 'qX29EeH7mPYW.jpg', '95570.949993969', '5cb973fa68ee4', '1555624800', '1555654122', '', 0, '5l3eXsKA', ''),
(85, 88, 'adioadeyoriazeez@gmail.com', '', '', '3232', 2, '6464', 'qX29EeH7mPYW.jpg', '234453.69204094', '5cb97682c5680', '1555624800', '1555654770', '', 0, 'xItLhQfF', ''),
(86, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 1, '9600', '9gdsKb06fJSd.jpg', '24232.999733273', '5cbb354e611e9', '1555711200', '1555769150', '83b96670fd1895b067b8cb2525db50', 0, 'eo0Gj54M', ''),
(87, 93, 'adioadeyoriazeez@yahoo.com', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '3112', 1, '3112', '3cwOSGd2D7Hd.jpg', '4355.3865497553', '5cbb354e8d333', '1555711200', '1555769150', 'ffa538b9206d181ce364b29ccb7011', 0, 'yftGUXpK', ''),
(88, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 1, '9600', '9gdsKb06fJSd.jpg', '16574.284304163', '5cbcaefb35f13', '1555797600', '1555865835', 'a8d5e9ca91f7310d85db281f679b68', 0, 'dC8QjlwD', ''),
(89, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 1, '9600', '9gdsKb06fJSd.jpg', '11744.743238918', '5cbcc06794941', '1555797600', '1555870295', 'cd9359295b2b19e5e2454fc455174f', 0, '5avGCd1w', ''),
(90, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 1, '9600', '9gdsKb06fJSd.jpg', '11744.743238918', '5cbcc4b9e9fc6', '1555797600', '1555871402', 'fabb882b6c7b8afae4fa3041ad6d31', 0, 'NceaYbjA', ''),
(91, 78, 'adioadeyoriazeez@yahoo.com', '', 'life fowl', '1200', 12, '14400', 'fowl1f3058714269.jpg', '5514.6494963458', '5cbdbe0923070', '1555884000', '1555935225', '9b5ae406ff9476c06a100d6d93ebc2', 0, '5tpS7cZz', ''),
(92, 74, 'adioadeyoriazeez@yahoo.com', '', 'is a bird , the meat is good for consumption', '2200', 5, '11000', 'bfow2f3058714269.jpg', '5703.6085590833', '5cd433739ab70', '1557352800', '1557407075', '96625671b95d88f47332dbfd317a09', 0, 'rBinS4RW', ''),
(93, 74, 'adioadeyoriazeez@yahoo.com', '', 'is a bird , the meat is good for consumption', '2200', 5, '11000', 'bfow2f3058714269.jpg', '5703.6085590833', '5cd4337a44545', '1557352800', '1557407082', '51811015c21eb580e85c89c68e3f89', 0, 'hQJnpWCX', ''),
(94, 74, 'adioadeyoriazeez@yahoo.com', '', 'is a bird , the meat is good for consumption', '2200', 5, '11000', 'bfow2f3058714269.jpg', '5703.6085590833', '5cd43691aab9e', '1557352800', '1557407873', '52e456acfba26034e2c8d5d0bfecdb', 0, 'dm7kaQoN', ''),
(95, 74, 'adioadeyoriazeez@yahoo.com', '', 'is a bird , the meat is good for consumption', '2200', 5, '11000', 'bfow2f3058714269.jpg', '5703.6085590833', '5cd436999ea91', '1557352800', '1557407881', 'bd4180162a083b74d0d60bd1d3e918', 0, '2YyxJ9rl', ''),
(96, 74, 'adioadeyoriazeez@yahoo.com', '', 'is a bird , the meat is good for consumption', '2200', 5, '11000', 'bfow2f3058714269.jpg', '5703.6085590833', '5cd436b1add25', '1557352800', '1557407905', '650c01a716dfd87f2080a76c772af0', 0, '14jFQK2l', ''),
(97, 74, 'adioadeyoriazeez@yahoo.com', '', 'is a bird , the meat is good for consumption', '2200', 5, '11000', 'bfow2f3058714269.jpg', '5703.6085590833', '5cd43754dacf0', '1557352800', '1557408069', 'dc83060db8ad7cc6273e2a14894ac8', 0, 'U7pLriDe', ''),
(98, 74, 'adioadeyoriazeez@yahoo.com', '', 'is a bird , the meat is good for consumption', '2200', 5, '11000', 'bfow2f3058714269.jpg', '5703.6085590833', '5cd457186c425', '1557352800', '1557416200', '74c96952e7004e8d811f9bc07eaa4e', 0, '7ZHOQ2MD', ''),
(99, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 1, '9600', '9gdsKb06fJSd.jpg', '1652.7041874307', '5cd4578edb4e1', '1557352800', '1557416318', '93ae67112bd09730f07efd9262de6c', 0, 'wU8dy6st', ''),
(100, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 14, '134400', '9gdsKb06fJSd.jpg', '23137.85862403', '5cd457c7360e5', '1557352800', '1557416375', '66d5d0425dbb206bd7cd359a63bf21', 0, 'UOyBCs7i', ''),
(101, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 12, '115200', '9gdsKb06fJSd.jpg', '19832.450249169', '5cd457e5785f7', '1557352800', '1557416405', '390a083d7746c8c8203ba91e6bc7c1', 0, 'lCe80Mjv', ''),
(102, 108, 'adioadeyoriazeez@yahoo.com', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '9600', 1, '9600', '9gdsKb06fJSd.jpg', '1652.7041874307', '5cd458f55b35c', '1557352800', '1557416677', 'b4da9381e673a915f2835d6a9b1ee0', 0, '5ZCvaPoD', ''),
(103, 100, 'adioadeyoriazeez@yahoo.com', '', 'This cashews is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  abppreversity', '540', 1, '540', 'eaSSMHdAjU72.png', '342.1965391138', '5cd45a2287b00', '1557352800', '1557416978', '6282ffcee408db2b6f310977bc362e', 0, '3iuDhQxN', ''),
(104, 100, 'adioadeyoriazeez@yahoo.com', '', 'This cashews is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  abppreversity', '540', 1, '540', 'eaSSMHdAjU72.png', '342.1965391138', '5cd45d3e48c57', '1557352800', '1557417774', '5af023d519923dbe0031878ae89179', 0, 'J4kbzVp2', ''),
(106, 113, 'adioadeyoriazeez@yahoo.com', '', 'This 105#peppers is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Sun 12 May 2019 uploaded by  fdfdf', '3200', 13, '41600', 'baXn3tQhbhVd.jpg', '250717.32214848', '5cda4ce056450', '1557784800', '1557806800', '05e995877d2744c051c9537c81337f', 0, 'L3Wc5Gu1', ''),
(107, 113, 'adioadeyoriazeez@yahoo.com', '', 'This 105#peppers is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Sun 12 May 2019 uploaded by  fdfdf', '3200', 7, '22400', 'baXn3tQhbhVd.jpg', '115457.2246209', '5cdbb4b87bfb2', '1557871200', '1557898920', 'c03cb8e851a2ec8b7034a3c306aa62', 0, '9Q2HzsPO', ''),
(108, 74, 'adioadeyoriazeez@gmail.com', '', 'is a bird , the meat is good for consumption', '2200', 6243, '13734600', 'bfow2f3058714269.jpg', '13477282.518253', '5cdcc2c13f3ac', '1557961200', '1557968049', 'c9cf730947b6a8d831330351b31a1d', 0, 'Ayu5mN8I', ''),
(109, 115, 'adioadeyoriazeez@gmail.com', '', 'This 93#turkey is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfdd', '4900', 3, '14700', 'o34hdZjHdfQw.jpg', '6056.7679060467', '5cdcc2c1444a3', '1557961200', '1557968049', '40be5c6a621bedf048f2b191e75be0', 0, 'fp7dnKRP', ''),
(110, 116, 'adioadeyoriazeez@gmail.com', '', 'This duck is a natural product, produce and package under control conditions which make  suitable for human consumption, this product is produced from   Edo  in  Benin-Ekuku  and is harvested on Thu 01 Jan 1970 uploaded by  a', '3900', 1, '3900', 'dGdkbjUYd9Z9.jpg', '1484.5019377565', '5cdcc45c4c716', '1557961200', '1557968460', '70721c3b38544a12365c2552314d28', 0, 'A8P1i7Ia', ''),
(111, 115, 'adioadeyoriazeez@gmail.com', '', 'This 93#turkey is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfdd', '4900', 2, '9800', 'o34hdZjHdfQw.jpg', '4037.8452706978', '5cdcc45c5046e', '1557961200', '1557968460', '51bedb6488c00481c2155829649a63', 0, 'OhaUySfM', ''),
(112, 111, 'adioadeyoriazeez@gmail.com', '', 'This 45#pod_corn is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Delta  in  WARRI-EDJEBA  and is harvested on Wed 15 May 2019 uploaded by  abppreve', '7500', 6, '45000', '29KeOVAyi69G.jpeg', '40130.783770719', '5cdd69c4c8d3d', '1557961200', '1558010804', '97d97a7f5d39b555e57738a9fd66bd', 0, 'xf9jlKzn', ''),
(113, 121, 'adioadeyoriazeez@gmail.com', '', 'This cucumber is a natural product, produce and package under control conditions which make  suitable for human consumption, this product is produced from   Edo  in  Benin-Ekuku  and is harvested on Thu 16 May 2019 uploaded b', '4300', 11, '47300', 'VD2GF2XjdHqj.jpg', '18997.290751342', '5cdd69c4d272b', '1557961200', '1558010804', 'a673c9ac163d9b24cd3fe387d2485c', 0, 'Z2xIAw0r', '');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logbank`
--

CREATE TABLE `logbank` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(40) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `accounnumber` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `bkid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logbank`
--

INSERT INTO `logbank` (`id`, `fn`, `ln`, `bankname`, `accounnumber`, `email`, `bkid`) VALUES
(11, 'aderyi', 'queen', 'access', 2147483647, 'jobsiteonlyforadeyori@gmail.com', 'rBCmAesGEoFqHpD'),
(12, 'Adelani', 'Adeyori', 'skye', 2147483646, 'adioadeyoriazeez@gmail.com', 'EAqBpGCsmeDroHF');

-- --------------------------------------------------------

--
-- Table structure for table `logistics`
--

CREATE TABLE `logistics` (
  `log_id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `bty` varchar(300) NOT NULL,
  `laddress` varchar(300) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `lloc` varchar(50) NOT NULL,
  `lstate` varchar(50) NOT NULL,
  `lcountry` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `joined` varchar(50) NOT NULL,
  `conf` int(11) NOT NULL,
  `docconf` int(11) NOT NULL,
  `token` varchar(300) NOT NULL,
  `tokenconfirm` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `cac` varchar(30) NOT NULL,
  `cacexp` varchar(30) NOT NULL,
  `insimg` varchar(30) NOT NULL,
  `insexp` varchar(30) NOT NULL,
  `nafdac` varchar(30) NOT NULL,
  `nafexp` varchar(30) NOT NULL,
  `drif` varchar(30) NOT NULL,
  `drib` varchar(30) NOT NULL,
  `driexp` varchar(30) NOT NULL,
  `ideimg` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL,
  `passch` varchar(300) NOT NULL,
  `passconfirm` int(11) NOT NULL,
  `batch` varchar(220) NOT NULL,
  `ap` int(11) NOT NULL,
  `confd` int(20) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(222) NOT NULL,
  `upby` int(11) NOT NULL,
  `log` int(11) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(30) NOT NULL,
  `pach` int(11) NOT NULL,
  `paup` int(11) NOT NULL,
  `pachdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logistics`
--

INSERT INTO `logistics` (`log_id`, `company`, `bty`, `laddress`, `telephone`, `email`, `lloc`, `lstate`, `lcountry`, `password`, `salt`, `joined`, `conf`, `docconf`, `token`, `tokenconfirm`, `date`, `time`, `cac`, `cacexp`, `insimg`, `insexp`, `nafdac`, `nafexp`, `drif`, `drib`, `driexp`, `ideimg`, `img`, `passch`, `passconfirm`, `batch`, `ap`, `confd`, `bk`, `bkid`, `upby`, `log`, `about`, `sn`, `pach`, `paup`, `pachdate`) VALUES
(25, 'indu', 'Individual', '114,yejide road molete ', '08064374020', 'adioadeyoriazeez@gmail.com', '162', '37', 'Nigeria', '4cd7fbbfa1f2b5587b2bec4c4af4c74c21905273fe2b0d06a5369cda3bc3951d', 'cåðÙbp4­V½ËX6\Z4V2ç~î¡÷WÂk qk$', '1554821243', 1, 1, 'cfd12b305e28664aece905a8bdafd494', 0, '1547766000', '1555046557', 'DEQ3mSd7gnhd.jpg', '1560808800', 'eYMjwhqH7Xdk.jpg', '1564437600', 'GRnXdEZFOeKY.jpg', '1568329200', 'nfnQoHgG2AYV.jpg', 'orhTwSnddeVe.jpg', '1560204000', '', 'gbFPj02793a0.jpg', '', 0, 'qdBUOpyl5DnJIvYuV76wH1ox4fbTzZtrMPNGWLRiksc8ema0gASC2K3EjhFQ9X', 22, 1558047600, 1, 'EAqBpGCsmeDroHF', 19, 1558064552, '', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `logves`
--

CREATE TABLE `logves` (
  `id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `region` varchar(220) NOT NULL,
  `grp` int(11) NOT NULL,
  `vesname` varchar(50) NOT NULL,
  `vesimg` varchar(225) NOT NULL,
  `veslic` varchar(30) NOT NULL,
  `vesroa` varchar(30) NOT NULL,
  `vespro` varchar(30) NOT NULL,
  `vesins` varchar(30) NOT NULL,
  `veslicexp` varchar(30) NOT NULL,
  `vesroaexp` varchar(30) NOT NULL,
  `vesproexp` varchar(30) NOT NULL,
  `vesinsexp` varchar(30) NOT NULL,
  `vessp` int(11) NOT NULL,
  `vesnum` int(11) NOT NULL,
  `vescap` float NOT NULL,
  `vesava` int(11) NOT NULL,
  `conf` int(11) NOT NULL,
  `catelist` text NOT NULL,
  `reg` text NOT NULL,
  `regwh` text NOT NULL,
  `upby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logves`
--

INSERT INTO `logves` (`id`, `log_id`, `state`, `region`, `grp`, `vesname`, `vesimg`, `veslic`, `vesroa`, `vespro`, `vesins`, `veslicexp`, `vesroaexp`, `vesproexp`, `vesinsexp`, `vessp`, `vesnum`, `vescap`, `vesava`, `conf`, `catelist`, `reg`, `regwh`, `upby`) VALUES
(1, 5, 11, '', 1, 'Unmanned aerial vehicle', '5o2eMjGE1AS0.jpg', '0jQ29riWASUh.jpg', 'od1drVdjS3de.jpg', 'ddGd9Am6Eayq.png', '9HjojdqdiHJE.jpg', '1547506800', '1548889200', '1547334000', '1548284400', 0, 1, 2340, 1, 1, '1.2.3.4.5.6.7', '', '', 13),
(2, 24, 10, '', 1, 'Jet pack', 'jdPn6SsfdkhS.jpg', 'b4snKm91fukO.jpg', 'iMddeK2Q9YGi.jpg', 'diUjPG09Eyon.jpg', 'kdFASAd7nOhj.png', '1642892400', '1564437600', '1571695200', '1549062000', 0, 1, 3456, 1, 1, '', '', '', 0),
(3, 3, 11, '', 1, 'Traction engine', 'He1j9oj9jY0R.jpg', 'OMSKAdnrVAUD.png', 'dsSVXeo39Gfn.jpg', '9ZY27h2PkgdK.jpg', 'udAHASw5aFyj.jpg', '1552950000', '', '1274479200', '', 0, 1, 2345, 1, 1, '5.6.7.8.9', '5.6.7.8.9', '5.6.7.8.9', 0),
(4, 9, 31, '', 1, 'Tricycle', 'dniD9gkds7Ge.jpg', 'uaVYW1shMb53.jpg', 'sS1SdEQ2dhcH.jpg', 'jGng9SfAdP2j.jpg', 'rm4dEZ2b962d.png', '1566424800', '1567116000', '1550790000', '1576969200', 0, 1, 34567, 1, 1, '', '', '', 0),
(10, 25, 11, '20', 0, 'Bus', 'sdHfscnkjjjJ.jpg', 'D2bJ9c509dTb.jpg', '2m9GrD2E23IQ.jpg', 'd2ESdFMcjhmV.png', 'tV72eGcoj0dZ.jpg', '1582326000', '1676847600', '', '1618869600', 0, 0, 8000, 1, 0, '', '', '', 0),
(11, 32, 11, '20', 1, 'Truck', 'oMsmj1e39d2j.jpg', 'U1FeIMYjSSjO.jpg', 'dR90YdASuAnj.jpg', '3djJS290EWi9.jpg', 'GcVrVEadtfTS.jpg', '1555020000', '1636498800', '1548975600', '1729548000', 0, 0, 10000, 1, 0, '', '', '', 0),
(12, 33, 6, '75', 1, 'Bus', '9UTdG2Rd9n2g.jpg', 'd2Sd13kon5Xf.jpg', 'jWbioA3JQHrV.jpg', 'en2qdXoYQGSj.jpg', '3eodAZT0UVuF.jpg', '1995832800', '1645484400', '1989961200', '1677884400', 0, 0, 3456, 1, 0, '', '', '', 0),
(13, 33, 6, '75', 1, 'Truck', 'ddAoM9dmQ0wn.jpg', 'OAGbDAndhm9d.png', 'DeO73jeQ3EG9.jpg', '4eD0rnYSTZaf.jpg', 'HRiseAadd9H1.jpg', '1995832800', '1995832800', '1995832800', '1645570800', 0, 0, 0, 1, 0, '', '', '', 19),
(28, 32, 6, '75', 1, 'Fixed-wing aircraft', 'tSEanyAfjnuJ.jpg', '26gQd5jeecd9.jpg', '0MFYGja2edeE.png', 'gjeVdYbAhdFE.jpg', 'OF90Dj5VAenQ.jpg', '1558389600', '1556056800', '1556056800', '1556056800', 0, 0, 2345680, 1, 0, '', '', '', 0),
(29, 32, 6, '75', 1, 'Jet aircraft', '2AjfZHSnd6d9.jpg', '0hEFGmhd036c.jpg', 'dDMntS9SVV9h.jpg', 'S139X3oh072j.jpg', 'dfo3Mn5yoF3E.jpg', '1555452000', '1555452000', '1556143200', '1556056800', 0, 0, 34567, 1, 0, '', '', '', 0),
(31, 25, 13, '245', 0, 'Bus', 'AIJdny63m2dH.jpg', 'hR0HWYSGddaA.jpg', 'sifE19hefnHn.jpg', 'fdF6SAHmdXAS.jpg', 'Z0o27SokDGDg.jpg', '1556575200', '1571695200', '1571695200', '1571695200', 0, 0, 60000, 1, 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logvesdes`
--

CREATE TABLE `logvesdes` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `vesid` int(11) NOT NULL,
  `vescat` double NOT NULL,
  `vesreg` double NOT NULL,
  `vesregwh` double NOT NULL,
  `vescap` int(11) NOT NULL,
  `grp` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `vehs` int(11) NOT NULL,
  `vehr` int(11) NOT NULL,
  `delnum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logvesdes`
--

INSERT INTO `logvesdes` (`id`, `email`, `vesid`, `vescat`, `vesreg`, `vesregwh`, `vescap`, `grp`, `log_id`, `vehs`, `vehr`, `delnum`) VALUES
(5, 'adioadeyoriazeez@gmail.com', 25, -1, -1, -1, 800000, 0, 25, 9, 105, 2),
(6, 'adioadeyoriazeez@gmail.com', 10, 2, 31, 3, 800000, 0, 25, 3, 17, 0),
(7, 'adioadeyoriazeez@gmail.com', 31, 7, 7, 7, 6000000, 0, 25, 6, 66, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logvesdoc`
--

CREATE TABLE `logvesdoc` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `vesdoc1` varchar(50) NOT NULL,
  `vesdoc2` varchar(20) NOT NULL,
  `vesdoc3` varchar(200) NOT NULL,
  `vesdoc4` varchar(20) NOT NULL,
  `vesimg` varchar(20) NOT NULL,
  `exp1` int(120) NOT NULL,
  `exp2` int(120) NOT NULL,
  `exp3` int(120) NOT NULL,
  `exp4` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logvesdoc`
--

INSERT INTO `logvesdoc` (`id`, `email`, `vesdoc1`, `vesdoc2`, `vesdoc3`, `vesdoc4`, `vesimg`, `exp1`, `exp2`, `exp3`, `exp4`) VALUES
(1, 'adioadeyoriazeez@gmail.com', 'gXdSVeE9Pd.jpeg', '', '', '', '', 0, 0, 0, 0),
(21, 'adioadeyoriazeez@gmail.com', 'jjqbKjahHA.jpeg', 'krddfEb1ny.jpg', 'nRE01dcSio.jpeg', 'mHEfrXiJd3.jpeg', 'Gfec9gwXa5.jpeg', 0, 0, 0, 0),
(22, 'adioadeyoriazeez@gmail.com', 'DRE3dU32Js.jpeg', 'MnnicHdd4Y.jpeg', 'Rfs09hje7A.jpg', 'dhiIe3b270.jpg', '2VgAdIt9EG.jpeg', 0, 0, 0, 0),
(23, 'adioadeyoriazeez@gmail.com', '9kmgyEAf2s.jpeg', 'Tn3eMA3Iha.jpeg', 'dEY0KS5djn.jpg', 'yFfhM04nb2.jpg', 'XGhKReZ4P0.jpeg', 0, 0, 0, 0),
(24, 'adioadeyoriazeez@gmail.com', 'fSjj9ThEJU.jpeg', 'yYU6oR31c9.jpeg', '29GgSy49iV.jpg', 'aEDcXfIHUw.jpg', 'dnUFec3SKS.jpg', 0, 0, 0, 0),
(25, 'adioadeyoriazeez@gmail.com', 'FM2jdnesV9.jpeg', 'nT2IVH270q.jpeg', 'eSnKMscFVd.jpg', 'jXD3Yhyfmk.jpg', 'dyADEoGH2Y.jpg', 0, 0, 0, 0),
(26, 'adioadeyoriazeez@gmail.com', '2WS9hodjA9.jpeg', 'diTS6U0nXV.jpeg', 'jFqd31n2f2.jpg', 'dT2dJ0DquS.jpg', 'W619njdo29.jpg', 0, 0, 0, 0),
(27, 'adioadeyoriazeez@gmail.com', 'GFjU99ed7X.jpeg', 'b7nydEXiKc.jpeg', 'Hjc9e2Iy4h.jpg', 'HdEdPjK4To.jpg', 'nnYdPeSEAY.jpg', 0, 0, 0, 0),
(28, 'adioadeyoriazeez@gmail.com', 'j5kRtna0d0.jpeg', 'Wj2gP9n2Hr.jpeg', 'Vj9dSn3Qdd.jpg', 'dT50SdHd2E.jpg', 'DS03hGcS9t.jpg', 0, 0, 0, 0),
(29, 'adioadeyoriazeez@gmail.com', 'yPkDTAF9VH.jpeg', 'QhP2H991RZ.jpeg', '6T3HeiqFg9.jpg', 'Iykcu2no6F.jpg', 'SHdne0JiDK.jpeg', 0, 0, 0, 0),
(30, 'adioadeyoriazeez@gmail.com', '9IJu9bfA0j.jpg', 'Y2fuVidc2f.jpg', 'DVA79nq6GM.jpg', 'Zh209d4ded.jpg', 'V9yTR3scSD.jpg', 0, 0, 0, 0),
(31, 'adioadeyoriazeez@gmail.com', '2mqeyXs2R4.jpg', 'DDPnhyKddi.jpg', '2sMHTsItjm.jpg', 'jEMnYIF9X9.jpg', 'nXH9touS3y.jpg', 0, 0, 0, 0),
(32, 'adioadeyoriazeez@gmail.com', 'hsef9OdHnK.jpg', 'O496q2nd9S.jpg', '0SAdfdU9kH.jpg', 'SjSE0VesS7.jpg', '5Y2fD9dDeA.jpg', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lusers_session`
--

CREATE TABLE `lusers_session` (
  `id` int(11) NOT NULL,
  `users_id` int(111) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lusers_session`
--

INSERT INTO `lusers_session` (`id`, `users_id`, `hash`) VALUES
(2, 3, '830a88cb496d46f9a8b05366a52c27b9f3e25204e92024af6c'),
(8, 4, '0784e613d93ef2613831a4ac1bca9d8dd708a7d828dbc88e29'),
(9, 5, '54813ef6635e0284f4ee98bb72494f15a62c8b5d7398e95040'),
(11, 9, '1a62ad1b33bdcd539052a15bcf293451b787d75edbecbee3f3'),
(12, 1, 'ffb2e31293409932a9a756c863b6aefe0d326cfa8b246c8221'),
(13, 6, 'eb955b326b53c030a455f712130d438d6a06a6c8cd9e098ee6'),
(14, 7, '315971d24d326af3f03f1de856397061ceff0897e49c6efb9f'),
(15, 8, '96daf7fdfb304eb1956231eba1df359449fd32780f5940258b'),
(16, 2, '4a8e865dca1b58c12565c6630178507cd8cf3b67cf2487d69c'),
(31, 33, 'b9ddab2c8248b47b8e31a5c26cc7034c0ad1368c3f9319ad57');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mail_id` int(11) NOT NULL,
  `to` varchar(225) NOT NULL,
  `from` varchar(225) NOT NULL,
  `title` varchar(120) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(225) NOT NULL,
  `date` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL,
  `rd` int(11) NOT NULL,
  `delf` int(11) NOT NULL,
  `delt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mail_id`, `to`, `from`, `title`, `content`, `img`, `date`, `time`, `rd`, `delf`, `delt`) VALUES
(18, 'jobsiteonlyforadeyori@gmail.com', 'wertyuio', 'ewrtyui', 'we5r76tiuodfghjkxcvbnm', 'd9d2Sd1qwVGd70WIeDRbMYcYjSieOf3krnsshoTMeEncdhdoHjbj2SKH29um93Fyd9HDf0Zj6VA5S2AgGX9UiAEtan3nQPh4Jd.jpg', '1546988400', '03:51:12', 1, 0, 1),
(34, 'adioadeyoriaeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwe', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 0, 0, 0),
(40, 'adioadeyoriaeez@gmail.com', 'jobsiteonlyforadeyori@gmail.com', 'Upload rejected', 'rewrerwe', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 0, 0, 0),
(47, 'adioadeyoriaeez@gmail.com', 'jobsiteonlyforadeyori@gmail.com', 'Upload rejected', 'rewrerwe', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 0, 1, 0),
(48, 'adioadeyoriaeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwe', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 0, 0, 0),
(49, 'adioadeyoriaeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwe', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 0, 0, 0),
(50, 'adioadeyoriaeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwe', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 0, 0, 0),
(51, 'adioadeyoriaeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwe', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 0, 0, 0),
(129, 'adioadeyoriazeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwee\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\');', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 1, 0, 1),
(130, 'proli_tech@support.com', 'adioadeyoriazeez@yahoo.com', 'ghdfhcgcghcghchg testing', 'inknknknk nknknknkn', 'Jj6nkejGTbSa.jpg', '1554242400', '1554295340', 1, 0, 1),
(131, 'proli_tech@support.com', 'adioadeyoriazeez@gmail.com', 'ghdfhcgcghcghchg testing', 'hvhjvjvj hhcvhcjdvfd dhbfdhbvfdhbff dhdhvvfvfdhfcd hdvhjdvhjdvhjdvd djcvvcdvcdjvh d ddvjhvdvfcf dhfvfdfdvfjdhjvdh fdh fdhffdff', '', '1554242400', '1554296747', 1, 0, 1),
(133, 'adioadeyoriazeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwee\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\');', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 1, 0, 1),
(134, 'adioadeyoriazeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwee\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\');', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 1, 0, 1),
(135, 'adioadeyoriazeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwee\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\');', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 1, 0, 0),
(136, 'adioadeyoriazeez@gmail.com', 'proli_tech@support.com', 'Upload rejected', 'rewrerwee\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\'), (NULL, \'adioadeyoriazeez@gmail.com\', \'proli_tech@support.com\', \'Upload rejected\', \'rewrerwe\', \'ndddmZ62eHf2.jpg\', \'1547852400\', \'1547885877\', \'0\');', 'ndddmZ62eHf2.jpg', '1547852400', '1547885877', 1, 0, 0),
(137, 'proli_tech@support.com', 'jobsiteonlyforadeyori@gmail.com', 'sdsdddsdsdsdsd', '', 'd', '1554847200', '1554926125', 0, 1, 0),
(138, 'proli_tech@support.com', 'jobsiteonlyforadeyori@gmail.com', 'Testing the Farmer', 'hghchÂ  hhjvhjvjh h hjhkj kbkkgkgkgkgkgkgkgkgkgk kgkgkkkkkkkkggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg ggggggggggggggggggggggggggg kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk hhhhhhhhhhhhhhhhhhhhhhhhh yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyooooooooooooooooooooooooooooooooooooÂ  Â  Â  Â  Â  Â  Â  Â hhhhhhhhhhhhhhhhhhhhhhhhhh', '3', '1554847200', '1554926353', 0, 1, 0),
(139, 'proli_tech@support.com', 'jobsiteonlyforadeyori@gmail.com', 'Testing the Farmer', 'jfkjfdkfkfdkjfdjudud diugf dfuidfudÂ  fiudfidf id', 'y', '1554847200', '1554927410', 0, 1, 0),
(140, 'proli_tech@support.com', 'jobsiteonlyforadeyori@gmail.com', 'Testing the Farmer', 'hj s ssfsfcÂ  hg xzczxczxczcxz jx cxhjcx', 'S', '1554847200', '1554927560', 0, 1, 0),
(141, 'proli_tech@support.com', 'jobsiteonlyforadeyori@gmail.com', 'Testing the Farmer', 'fjfÂ  ttfyyj uj fjfjj j', 'QSdHs3wyGJDW.jpg', '1554847200', '1554927683', 0, 1, 0),
(142, 'proli_tech@support.com', 'jobsiteonlyforadeyori@gmail.com', 'sdsdddsdsdsdsd', 'gcgccnhvjvhjvhj hvhjhvjÂ hjvhjhj', 'JWFAdb9mEDKR.jpg', '1554847200', '1554928502', 0, 1, 0),
(143, 'adioadeyoriazeez@yahoo.com', 'adioadeyoriazeez@yahoo.com', 'Testing the Farmer', 'dsdsadsads', 'OAg2VG9HSyPS.jpg', '1554847200', '1554931648', 1, 1, 1),
(144, 'proli_tech@support.com', 'adioadeyoriazeezh@yahoo.com', 'Testing the Farmer', 'wdewdewdewdew wdewdewdewewew we wewewewew', '9P92jGYcaSZS.jpg', '1555365600', '1555423403', 0, 1, 0),
(145, 'proli_tech@support.com', 'adioadeyoriazeezh@yahoo.com', 'Testing the Farmer', '', '', '1555365600', '1555423659', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `moneydis`
--

CREATE TABLE `moneydis` (
  `id` int(11) NOT NULL,
  `cem` varchar(225) NOT NULL,
  `prid` int(11) NOT NULL,
  `patid` varchar(50) NOT NULL,
  `itpr` double NOT NULL,
  `logid` int(11) NOT NULL,
  `delc` double NOT NULL,
  `date` varchar(20) NOT NULL,
  `tref` varchar(120) NOT NULL,
  `oid` varchar(120) NOT NULL,
  `vat` double NOT NULL,
  `ds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moneydis`
--

INSERT INTO `moneydis` (`id`, `cem`, `prid`, `patid`, `itpr`, `logid`, `delc`, `date`, `tref`, `oid`, `vat`, `ds`) VALUES
(6, 'adioadeyoriazeez@gmail.com', 88, 'a5326790814', 6464, 25, 234453.69, '1555654770', '3edb5165a4c9df6665710788b874350b', '5cb97682c5680', 12045.88, 2),
(10, 'adioadeyoriazeez@yahoo.com', 108, 'f4752319608', 9600, 25, 11744.74, '1555870295', 'cd9359295b2b19e5e2454fc455174ff7', '5cbcc06794941', 1067.24, 0),
(14, 'adioadeyoriazeez@yahoo.com', 74, 'f3058714269', 11000, 25, 5703.61, '1557408069', 'dc83060db8ad7cc6273e2a14894ac878', '5cd43754dacf0', 835.18, 0),
(15, 'adioadeyoriazeez@yahoo.com', 74, 'f3058714269', 11000, 25, 5703.61, '1557416200', '74c96952e7004e8d811f9bc07eaa4eac', '5cd457186c425', 835.18, 0),
(16, 'adioadeyoriazeez@yahoo.com', 108, 'f4752319608', 9600, 25, 1652.7, '1557416319', '93ae67112bd09730f07efd9262de6c78', '5cd4578edb4e1', 562.64, 0),
(17, 'adioadeyoriazeez@yahoo.com', 108, 'f4752319608', 134400, 25, 23137.86, '1557416375', '66d5d0425dbb206bd7cd359a63bf2185', '5cd457c7360e5', 7876.89, 0),
(18, 'adioadeyoriazeez@yahoo.com', 108, 'f4752319608', 115200, 25, 19832.45, '1557416405', '390a083d7746c8c8203ba91e6bc7c175', '5cd457e5785f7', 6751.62, 0),
(19, 'adioadeyoriazeez@yahoo.com', 108, 'f4752319608', 9600, 25, 1652.7, '1557416677', 'b4da9381e673a915f2835d6a9b1ee015', '5cd458f55b35c', 562.64, 0),
(20, 'adioadeyoriazeez@yahoo.com', 100, 'f4752319608', 540, 25, 342.2, '1557416978', '6282ffcee408db2b6f310977bc362e11', '5cd45a2287b00', 44.11, 0),
(21, 'adioadeyoriazeez@yahoo.com', 100, 'f4752319608', 540, 25, 342.2, '1557417774', '5af023d519923dbe0031878ae8917978', '5cd45d3e48c57', 44.11, 0),
(22, 'adioadeyoriazeez@yahoo.com', 112, 'f6870915469', 5200, 25, 4500.05, '1557806800', '3b50ef0b923f9f8f3125f5b95c1bcc63', '5cda4ce01c21c', 485, 0),
(23, 'adioadeyoriazeez@yahoo.com', 113, 'f6870915469', 41600, 25, 250717.32, '1557806800', '05e995877d2744c051c9537c81337f85', '5cda4ce056450', 14615.87, 0),
(24, 'adioadeyoriazeez@yahoo.com', 113, 'f6870915469', 22400, 25, 115457.22, '1557898920', 'c03cb8e851a2ec8b7034a3c306aa629e', '5cdbb4b87bfb2', 6892.86, 0),
(25, 'adioadeyoriazeez@gmail.com', 74, 'f3058714269', 13734600, 25, 13477282.52, '1557968049', 'c9cf730947b6a8d831330351b31a1d3c', '5cdcc2c13f3ac', 1360594.13, 0),
(26, 'adioadeyoriazeez@gmail.com', 115, 'f6870915469', 14700, 25, 6056.77, '1557968049', '40be5c6a621bedf048f2b191e75be051', '5cdcc2c1444a3', 1037.84, 0),
(27, 'adioadeyoriazeez@gmail.com', 116, 'a5326790814', 3900, 25, 1484.5, '1557968460', '70721c3b38544a12365c2552314d28e8', '5cdcc45c4c716', 269.23, 0),
(28, 'adioadeyoriazeez@gmail.com', 115, 'f6870915469', 9800, 25, 4037.85, '1557968460', '51bedb6488c00481c2155829649a637d', '5cdcc45c5046e', 691.89, 0),
(29, 'adioadeyoriazeez@gmail.com', 111, 'f4752319608', 45000, 25, 40130.78, '1558010804', '97d97a7f5d39b555e57738a9fd66bd3f', '5cdd69c4c8d3d', 4256.54, 0),
(30, 'adioadeyoriazeez@gmail.com', 121, 'a5326790814', 47300, 25, 18997.29, '1558010804', 'a673c9ac163d9b24cd3fe387d2485cbc', '5cdd69c4d272b', 3314.86, 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsteller`
--

CREATE TABLE `newsteller` (
  `id` int(11) NOT NULL,
  `email` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsteller`
--

INSERT INTO `newsteller` (`id`, `email`) VALUES
(1, 'banana@gmail.com'),
(2, 'adioadeyoriazeez@gmail.com'),
(3, 'jobsiteonlyforadeyori@gmail.com'),
(4, 'adioadeyoriazeez@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL,
  `sto` int(11) NOT NULL,
  `sfrom` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `rp` int(11) NOT NULL,
  `delf` int(11) NOT NULL,
  `delt` int(11) NOT NULL,
  `nt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `time`, `sto`, `sfrom`, `content`, `date`, `rp`, `delf`, `delt`, `nt`) VALUES
(1, '2019-01-08 17:48:20', 5, 'admin', 'This is to notify you that an order has been forwarded to you at Tue 08 Jan 2019 17:45:05 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-08', 0, 0, 0, 0),
(2, '2019-01-08 17:51:23', 5, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-01-08', 0, 0, 0, 0),
(3, '2019-01-09 01:47:06', 5, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-01-09', 0, 0, 0, 0),
(4, '2019-01-09 02:16:06', 32, 'admin', 'This is to notify you that an order has been forwarded to you at Wed 09 Jan 2019 02:12:45 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-09', 1, 0, 1, 0),
(5, '2019-01-09 02:18:24', 32, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(6, '2019-01-09 14:26:15', 32, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(8, '2019-01-09 14:49:51', 32, 'admin', 'This is to notify you that an order has been forwarded to you at Wed 09 Jan 2019 14:45:48 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-09', 1, 0, 0, 0),
(9, '2019-01-09 14:58:18', 32, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(10, '2019-01-09 14:58:18', 0, 'admin', 'logistics wit id 32 has to acknowledge an order ', '2019-01-09', 1, 0, 1, 0),
(11, '2019-01-09 15:21:41', 32, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 1, 0),
(12, '2019-01-09 15:21:41', 0, 'admin', 'logistics with id 32 has  fail to acknowledge an order ', '2019-01-09', 1, 0, 1, 0),
(13, '2019-01-09 22:33:10', 0, 'admin', 'One, Warehouse has been confirmed', '2019-01-09', 1, 0, 1, 0),
(14, '2019-01-09 23:04:26', 0, 'admin', 'One, Warehouse has been confirmed', '2019-01-09', 1, 0, 1, 0),
(15, '2019-01-09 23:08:19', 0, 'admin', 'One, Warehouse has been confirmed', '2019-01-09', 1, 0, 1, 0),
(16, '2019-01-11 06:54:53', 0, 'admin', 'One  Product has been confirmed', '2019-01-11', 1, 0, 1, 0),
(17, '2019-01-11 23:01:28', 0, 'admin', 'One  Product has been confirmed', '2019-01-11', 1, 0, 1, 0),
(18, '2019-01-17 20:32:39', 0, 'admin', 'One, aggregator has been confirmed', '2019-01-17', 1, 0, 0, 0),
(19, '2019-01-17 20:46:56', 0, 'admin', 'One,  aggregators has been rejected', '2019-01-17', 1, 0, 0, 0),
(20, '2019-01-18 04:14:54', 0, 'admin', 'One, farmer has been confirmed', '2019-01-18', 1, 0, 1, 0),
(21, '2019-01-18 04:14:54', 0, 'admin', 'One, farmer has been confirmed', '2019-01-18', 1, 0, 1, 0),
(22, '2019-01-18 04:14:54', 0, 'admin', 'One, farmer has been confirmed', '2019-01-18', 1, 0, 1, 0),
(23, '2019-01-18 04:16:31', 0, 'admin', 'One,  farmer has been rejected', '2019-01-18', 1, 0, 1, 0),
(24, '2019-01-18 04:34:07', 0, 'admin', 'One, farmer has been confirmed', '2019-01-18', 1, 0, 1, 0),
(25, '2019-01-18 04:34:07', 0, 'admin', 'One, farmer has been confirmed', '2019-01-18', 1, 0, 1, 0),
(26, '2019-01-18 04:34:08', 0, 'admin', 'One, farmer has been confirmed', '2019-01-18', 1, 0, 1, 0),
(27, '2019-01-18 22:52:06', 0, 'admin', 'One  Product has been confirmed', '2019-01-18', 1, 0, 1, 0),
(28, '2019-01-19 00:53:06', 0, 'admin', 'One aggregator has been confirmed', '2019-01-19', 1, 0, 1, 0),
(29, '2019-01-29 07:55:28', 24, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-29', 0, 0, 0, 0),
(30, '2019-01-29 07:55:28', 0, 'admin', 'One  logistics has been confirmed', '2019-01-29', 0, 0, 0, 0),
(31, '2019-01-29 07:56:38', 24, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-29', 0, 0, 0, 0),
(32, '2019-01-29 07:56:38', 0, 'admin', 'One  logistics has been confirmed', '2019-01-29', 0, 0, 0, 0),
(33, '2019-01-29 08:00:46', 33, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-01-29', 0, 0, 0, 0),
(34, '2019-01-29 08:00:46', 0, 'admin', 'One  logistics has been confirmed', '2019-01-29', 0, 0, 0, 0),
(35, '2019-02-15 07:42:05', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(36, '2019-02-15 07:49:25', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(37, '2019-02-15 07:50:28', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(38, '2019-02-15 07:50:47', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 1, 0, 1, 0),
(39, '2019-02-15 07:51:48', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(40, '2019-02-15 07:53:26', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(41, '2019-02-15 07:55:30', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(42, '2019-02-15 08:47:48', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(43, '2019-02-15 08:47:51', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(44, '2019-02-15 08:48:46', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(45, '2019-02-15 08:49:06', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(46, '2019-02-15 08:51:53', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(47, '2019-02-15 09:07:17', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(48, '2019-02-15 09:10:51', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(49, '2019-02-15 09:12:30', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(50, '2019-02-15 09:17:53', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(51, '2019-02-15 09:25:15', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(52, '2019-02-15 09:27:41', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(53, '2019-02-15 10:07:07', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(54, '2019-02-15 10:12:54', 0, 'admin', 'One  Product has been confirmed', '2019-02-15', 0, 0, 0, 0),
(55, '2019-02-15 10:22:00', 0, 'admin', 'One  Product has been rejected', '2019-02-15', 0, 0, 0, 0),
(56, '2019-02-15 10:43:47', 24, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(57, '2019-02-15 10:43:47', 0, 'admin', 'One  logistics has been confirmed', '2019-02-15', 0, 0, 0, 0),
(58, '2019-02-15 10:50:15', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(59, '2019-02-15 10:50:16', 0, 'admin', 'One  logistics has been confirmed', '2019-02-15', 0, 0, 0, 0),
(60, '2019-02-15 11:02:34', 0, 'admin', 'One logistics has been rejected', '2019-02-15', 0, 0, 0, 0),
(61, '2019-02-15 11:03:19', 0, 'admin', 'One logistics has been rejected', '2019-02-15', 0, 0, 0, 0),
(62, '2019-02-15 11:06:03', 0, 'admin', 'One logistics has been rejected', '2019-02-15', 0, 0, 0, 0),
(63, '2019-02-15 11:16:14', 0, 'admin', 'One logistics has been rejected', '2019-02-15', 0, 0, 0, 0),
(64, '2019-02-15 11:17:37', 0, 'admin', 'One logistics has been rejected', '2019-02-15', 0, 0, 0, 0),
(65, '2019-02-15 11:20:29', 0, 'admin', 'One logistics has been rejected', '2019-02-15', 0, 0, 0, 0),
(66, '2019-02-15 11:34:26', 0, 'admin', 'One Warehouse has been confirmed', '2019-02-15', 0, 0, 0, 0),
(67, '2019-02-15 11:34:36', 0, 'admin', 'One Warehouse has been confirmed', '2019-02-15', 0, 0, 0, 0),
(68, '2019-02-15 11:40:03', 0, 'admin', 'One  warehouse has been rejected', '2019-02-15', 0, 0, 0, 0),
(69, '2019-02-15 11:43:05', 0, 'admin', 'One  warehouse has been rejected', '2019-02-15', 0, 0, 0, 0),
(70, '2019-02-15 12:11:37', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(71, '2019-02-15 12:12:56', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(72, '2019-02-15 12:13:48', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(73, '2019-02-15 12:13:50', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(74, '2019-02-15 12:13:50', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(75, '2019-02-15 12:14:07', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(76, '2019-02-15 12:15:22', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(77, '2019-02-15 12:16:34', 0, 'admin', 'One aggregator has been confirmed', '2019-02-15', 0, 0, 0, 0),
(78, '2019-02-15 12:26:17', 0, 'admin', 'One,  aggregators has been rejected', '2019-02-15', 0, 0, 0, 0),
(79, '2019-02-15 12:53:09', 0, 'admin', 'One, farmer has been confirmed', '2019-02-15', 0, 0, 0, 0),
(80, '2019-02-15 13:06:01', 0, 'admin', 'One farmer has been rejected', '2019-02-15', 0, 0, 0, 0),
(81, '2019-02-15 13:12:19', 0, 'admin', 'One farmer has been rejected', '2019-02-15', 0, 0, 0, 0),
(82, '2019-02-17 02:09:03', 0, 'admin', 'One  Product has been confirmed', '2019-02-17', 0, 0, 0, 0),
(83, '2019-02-17 02:09:15', 0, 'admin', 'One  Product has been confirmed', '2019-02-17', 0, 0, 0, 0),
(84, '2019-02-17 20:18:31', 0, 'admin', 'One  Product has been confirmed', '2019-02-17', 0, 0, 0, 0),
(85, '2019-02-17 20:18:44', 0, 'admin', 'One  Product has been confirmed', '2019-02-17', 0, 0, 0, 0),
(86, '2019-02-18 15:14:18', 0, 'admin', 'One  Product has been confirmed', '2019-02-18', 0, 0, 0, 0),
(87, '2019-04-13 13:28:32', 0, 'admin', 'One aggregator has been confirmed', '2019-04-13', 0, 0, 0, 0),
(88, '2019-04-13 13:46:39', 0, 'admin', 'One aggregator has been confirmed', '2019-04-13', 0, 0, 0, 0),
(89, '2019-04-13 13:48:54', 0, 'admin', 'One,  aggregators has been rejected', '2019-04-13', 0, 0, 0, 0),
(90, '2019-04-13 13:49:11', 0, 'admin', 'One,  aggregators has been rejected', '2019-04-13', 0, 0, 0, 0),
(91, '2019-04-13 13:50:52', 0, 'admin', 'One,  aggregators has been rejected', '2019-04-13', 0, 0, 0, 0),
(92, '2019-04-14 16:38:54', 0, 'admin', 'One, farmer has been confirmed', '2019-04-14', 0, 0, 0, 0),
(93, '2019-04-14 16:46:25', 0, 'admin', 'One, farmer has been confirmed', '2019-04-14', 0, 0, 0, 0),
(94, '2019-04-14 16:51:55', 0, 'admin', 'One, farmer has been confirmed', '2019-04-14', 0, 0, 0, 0),
(95, '2019-04-14 16:52:43', 0, 'admin', 'One, farmer has been confirmed', '2019-04-14', 0, 0, 0, 0),
(96, '2019-04-14 17:00:18', 0, 'admin', 'One, farmer has been confirmed', '2019-04-14', 0, 0, 0, 0),
(97, '2019-04-14 17:08:40', 0, 'admin', 'One, farmer has been confirmed', '2019-04-14', 0, 0, 0, 0),
(98, '2019-04-14 17:11:07', 0, 'admin', 'One farmer has been rejected', '2019-04-14', 0, 0, 0, 0),
(99, '2019-04-14 17:56:09', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(100, '2019-04-14 17:56:09', 0, 'admin', 'One  logistics has been confirmed', '2019-04-14', 0, 0, 0, 0),
(101, '2019-04-14 17:56:20', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(102, '2019-04-14 17:56:20', 0, 'admin', 'One  logistics has been confirmed', '2019-04-14', 0, 0, 0, 0),
(103, '2019-04-14 18:00:17', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(104, '2019-04-14 18:00:17', 0, 'admin', 'One  logistics has been confirmed', '2019-04-14', 0, 0, 0, 0),
(105, '2019-04-14 18:01:32', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(106, '2019-04-14 18:01:32', 0, 'admin', 'One  logistics has been confirmed', '2019-04-14', 0, 0, 0, 0),
(107, '2019-04-14 18:01:38', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(108, '2019-04-14 18:01:38', 0, 'admin', 'One  logistics has been confirmed', '2019-04-14', 0, 0, 1, 0),
(109, '2019-04-14 18:04:12', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-14', 0, 0, 0, 0),
(110, '2019-04-14 18:04:12', 0, 'admin', 'One  logistics has been confirmed', '2019-04-14', 0, 0, 0, 0),
(111, '2019-04-15 09:52:23', 0, 'admin', 'One logistics has been rejected', '2019-04-15', 0, 0, 0, 0),
(112, '2019-04-15 09:52:45', 0, 'admin', 'One logistics has been rejected', '2019-04-15', 0, 0, 0, 0),
(113, '2019-04-15 10:03:15', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-15', 0, 0, 0, 0),
(114, '2019-04-15 10:03:15', 0, 'admin', 'One  logistics has been confirmed', '2019-04-15', 0, 0, 0, 0),
(115, '2019-04-15 10:03:20', 0, 'admin', 'One logistics has been rejected', '2019-04-15', 0, 0, 0, 0),
(116, '2019-04-15 11:50:43', 0, 'admin', 'One  Product has been confirmed', '2019-04-15', 0, 0, 0, 0),
(117, '2019-04-15 12:04:21', 0, 'admin', 'One logistics has been rejected', '2019-04-15', 0, 0, 0, 0),
(118, '2019-04-15 12:22:40', 0, 'admin', 'One logistics has been rejected', '2019-04-15', 0, 0, 0, 0),
(119, '2019-04-15 12:29:36', 0, 'admin', 'One logistics has been rejected', '2019-04-15', 0, 0, 0, 0),
(120, '2019-04-15 17:05:23', 0, 'admin', 'One  Product has been confirmed', '2019-04-15', 0, 0, 0, 0),
(121, '2019-04-15 17:11:30', 0, 'admin', 'One  Product has been rejected', '2019-04-15', 0, 0, 0, 0),
(122, '2019-04-17 00:11:34', 0, 'admin', 'One  Product has been confirmed', '2019-04-17', 0, 0, 0, 0),
(123, '2019-04-17 00:45:17', 0, 'admin', 'One aggregator has been confirmed', '2019-04-17', 0, 0, 0, 0),
(124, '2019-04-17 01:04:31', 0, 'admin', 'One  Product has been confirmed', '2019-04-17', 0, 0, 0, 0),
(125, '2019-04-17 01:04:38', 0, 'admin', 'One  Product has been confirmed', '2019-04-17', 0, 0, 0, 0),
(126, '2019-04-19 15:29:28', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-19', 0, 0, 0, 0),
(127, '2019-04-19 15:29:28', 0, 'admin', 'One  logistics has been confirmed', '2019-04-19', 0, 0, 0, 0),
(128, '2019-04-19 15:39:17', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-04-19', 1, 0, 1, 0),
(129, '2019-04-19 15:39:17', 0, 'admin', 'One  logistics has been confirmed', '2019-04-19', 1, 0, 1, 0),
(130, '2019-04-22 08:15:58', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(131, '2019-04-22 08:15:58', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(132, '2019-04-22 08:16:05', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(133, '2019-04-22 08:16:05', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(134, '2019-04-22 08:16:10', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(135, '2019-04-22 08:16:10', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(136, '2019-04-22 08:18:16', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(137, '2019-04-22 08:18:20', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(138, '2019-04-22 08:18:24', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(139, '2019-04-22 08:19:42', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(140, '2019-04-22 08:19:42', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(141, '2019-04-22 08:22:43', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(142, '2019-04-22 08:22:43', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(143, '2019-04-22 08:25:44', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(144, '2019-04-22 08:25:44', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(145, '2019-04-22 08:28:46', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(146, '2019-04-22 08:28:46', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(147, '2019-04-22 08:31:02', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(148, '2019-04-22 08:31:02', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(149, '2019-04-22 08:31:10', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(150, '2019-04-22 08:31:10', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(151, '2019-04-22 08:32:05', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(152, '2019-04-22 08:32:05', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 0, 0, 0, 0),
(153, '2019-04-22 08:33:54', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 1, 0, 0, 0),
(154, '2019-04-22 08:33:54', 25, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-04-22', 1, 0, 0, 0),
(155, '2019-05-13 19:37:25', 0, 'admin', 'One  Product has been confirmed', '2019-05-13', 0, 0, 0, 0),
(156, '2019-05-13 19:37:33', 0, 'admin', 'One  Product has been confirmed', '2019-05-13', 0, 0, 0, 0),
(157, '2019-05-13 19:44:31', 0, 'admin', 'One, farmer has been confirmed', '2019-05-13', 0, 0, 0, 0),
(158, '2019-05-13 23:58:23', 0, 'admin', 'One  Product has been confirmed', '2019-05-13', 0, 0, 0, 0),
(159, '2019-05-14 04:12:52', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(160, '2019-05-14 05:15:30', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(161, '2019-05-14 05:15:34', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(162, '2019-05-14 05:15:37', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(163, '2019-05-14 06:31:46', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(164, '2019-05-14 20:44:03', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(165, '2019-05-14 20:44:11', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(166, '2019-05-14 20:44:18', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(167, '2019-05-14 20:44:29', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(168, '2019-05-14 20:44:32', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(169, '2019-05-14 20:44:36', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(170, '2019-05-14 23:46:25', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(171, '2019-05-14 23:46:28', 0, 'admin', 'One  Product has been confirmed', '2019-05-14', 0, 0, 0, 0),
(172, '2019-05-15 06:42:41', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(173, '2019-05-15 06:42:44', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(174, '2019-05-15 06:42:47', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(175, '2019-05-15 06:42:50', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(176, '2019-05-15 06:42:53', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(177, '2019-05-15 06:42:56', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(178, '2019-05-15 06:42:59', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(179, '2019-05-15 06:43:02', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(180, '2019-05-15 06:43:04', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(181, '2019-05-15 06:43:07', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(182, '2019-05-15 06:43:10', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(183, '2019-05-15 06:43:12', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(184, '2019-05-15 06:43:15', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(185, '2019-05-15 06:43:17', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(186, '2019-05-15 06:43:21', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(187, '2019-05-15 06:43:24', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(188, '2019-05-15 06:43:27', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(189, '2019-05-15 06:43:30', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(190, '2019-05-15 06:43:32', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(191, '2019-05-15 06:43:34', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(192, '2019-05-15 07:15:03', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(193, '2019-05-15 07:27:20', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(194, '2019-05-15 07:27:23', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(195, '2019-05-15 07:27:26', 0, 'admin', 'One  Product has been confirmed', '2019-05-15', 0, 0, 0, 0),
(196, '2019-05-17 04:39:56', 25, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-05-17', 0, 0, 0, 0),
(197, '2019-05-17 04:39:56', 0, 'admin', 'One  logistics has been confirmed', '2019-05-17', 0, 0, 0, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `notifyw`
--

CREATE TABLE `notifyw` (
  `id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL,
  `sto` int(11) NOT NULL,
  `sfrom` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `rp` int(11) NOT NULL,
  `delf` int(11) NOT NULL,
  `delt` int(11) NOT NULL,
  `nt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifyw`
--

INSERT INTO `notifyw` (`id`, `time`, `sto`, `sfrom`, `content`, `date`, `rp`, `delf`, `delt`, `nt`) VALUES
(1, '2019-01-08 17:48:20', 5, 'admin', 'This is to notify you that an order has been forwarded to you at Tue 08 Jan 2019 17:45:05 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-08', 0, 0, 0, 0),
(2, '2019-01-08 17:51:23', 5, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-01-08', 0, 0, 0, 0),
(3, '2019-01-09 01:47:06', 5, 'admin', 'This is to tell you that the order forwarded to you must be deliver by you because no other partner can do the delivery. Note, our customer is waiting for the goods', '2019-01-09', 0, 0, 0, 0),
(4, '2019-01-09 02:16:06', 32, 'admin', 'This is to notify you that an order has been forwarded to you at Wed 09 Jan 2019 02:12:45 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-09', 1, 0, 0, 0),
(5, '2019-01-09 02:18:24', 32, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(6, '2019-01-09 14:26:15', 0, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(8, '2019-01-09 14:49:51', 32, 'admin', 'This is to notify you that an order has been forwarded to you at Wed 09 Jan 2019 14:45:48 and this  required only 5 minute  to respond to the order, else the order will be forwarded to another logistics', '2019-01-09', 1, 0, 0, 0),
(9, '2019-01-09 14:58:18', 32, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 1, 0, 0, 0),
(10, '2019-01-09 14:58:18', 0, 'admin', 'logistics wit id 32 has to acknowledge an order ', '2019-01-09', 1, 0, 0, 0),
(11, '2019-01-09 15:21:41', 32, 'admin', 'Due to the fact that you have fail to accept an order forwarded to you, the order has been withdraw and given to another partner, yor warning is counting. ', '2019-01-09', 0, 0, 0, 0),
(12, '2019-01-09 15:21:41', 0, 'admin', 'logistics with id 32 has  fail to acknowledge an order ', '2019-01-09', 1, 0, 0, 0),
(13, '2019-01-09 22:33:09', 16, 'admin', 'Congrat,your document and your data has been sreen and you have been confirmed', '2019-01-09', 0, 0, 0, 0),
(14, '2019-01-09 23:04:26', 20, 'admin', 'Congrat,your document and your data has been sreen and you have been confirmed', '2019-01-09', 0, 0, 0, 0),
(15, '2019-01-09 23:08:19', 20, 'admin', 'Congrat,your document and your data has been sreen and you have been confirmed', '2019-01-09', 1, 0, 1, 0),
(16, '2019-02-15 11:34:26', 14, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0),
(17, '2019-02-15 11:34:36', 15, 'admin', 'Congrat,your document and your data has been screen and you have been confirmed', '2019-02-15', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `proli_orders`
--

CREATE TABLE `proli_orders` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` varchar(22) NOT NULL,
  `time` varchar(30) NOT NULL,
  `email` varchar(225) NOT NULL,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `cate` varchar(22) NOT NULL,
  `subcate` varchar(200) NOT NULL,
  `name` varchar(22) NOT NULL,
  `price` float NOT NULL,
  `quatity` int(11) NOT NULL,
  `tot` float NOT NULL,
  `mass` float NOT NULL,
  `desc` varchar(600) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `gimg` varchar(225) NOT NULL,
  `pay` int(11) NOT NULL,
  `shipping` varchar(20) NOT NULL,
  `region` varchar(100) NOT NULL,
  `cstate` varchar(70) NOT NULL,
  `address` varchar(225) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `carry` varchar(50) NOT NULL,
  `logpay` int(11) NOT NULL,
  `dis` varchar(220) NOT NULL,
  `transamount` float NOT NULL,
  `so` int(11) NOT NULL,
  `war_id` varchar(50) NOT NULL,
  `storage` varchar(225) NOT NULL,
  `owner` varchar(225) NOT NULL,
  `vesname` varchar(50) NOT NULL,
  `rs` int(11) NOT NULL,
  `ds` int(11) NOT NULL,
  `whenorder` varchar(30) NOT NULL,
  `storeid` varchar(30) NOT NULL,
  `delivery` varchar(40) NOT NULL,
  `tref` varchar(120) NOT NULL,
  `rmr` int(20) NOT NULL,
  `rail` varchar(20) NOT NULL,
  `free` varchar(20) NOT NULL,
  `pushtolog` int(11) NOT NULL,
  `driv` varchar(120) NOT NULL,
  `tok` int(11) NOT NULL,
  `tokval` varchar(225) NOT NULL,
  `rec` int(11) NOT NULL,
  `poc` varchar(20) NOT NULL,
  `getpoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proli_orders`
--

INSERT INTO `proli_orders` (`id`, `pid`, `date`, `time`, `email`, `fname`, `lname`, `cate`, `subcate`, `name`, `price`, `quatity`, `tot`, `mass`, `desc`, `oid`, `gimg`, `pay`, `shipping`, `region`, `cstate`, `address`, `telephone`, `carry`, `logpay`, `dis`, `transamount`, `so`, `war_id`, `storage`, `owner`, `vesname`, `rs`, `ds`, `whenorder`, `storeid`, `delivery`, `tref`, `rmr`, `rail`, `free`, `pushtolog`, `driv`, `tok`, `tokval`, `rec`, `poc`, `getpoc`) VALUES
(34, 93, '1555452000', '1555914834', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'fruits', 'apple', 'Purple Apple  ', 3200, 3, 9600, 1350, 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '5ca95e663522d', '3cwOSGd2D7Hd.jpg', 0, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, 'Intra-city/Inter-zonal', 6210, 1, '9/105', '114, Yejide road molete', 'a5326790814', '25', 4, 2, 'previous', '20w', '1554674400', '', 1, '', '', 0, 'Adio', 0, '', 0, 'HrhZxbDO', 1),
(35, 88, '1555452000', '1554600022', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'grains', 'beans', 'oloyin bean', 3232, 5, 16160, 139200, '', '5ca95e663e29c', 'qX29EeH7mPYW.jpg', 0, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, 'Intra-state/Inter-zonal', 54334, 1, '16/412', '114, Yejide road molete', 'a5326790814', '32', 4, 2, 'previous', '14w', '1555192800', '', 1, '', '', 0, 'sdfhyghj', 0, '', 0, 'PsrvRKxy', 1),
(36, 93, '1555452000', '1554600081', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'fruits', 'apple', 'Purple Apple  ', 3200, 3, 9600, 1350, 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '5ca95ea173672', '3cwOSGd2D7Hd.jpg', 1, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, 'Intra-city/Inter-zonal', 6210, 1, '9/105', '114, Yejide road molete', 'a5326790814', '32', 2, 0, 'previous', '14w', '1554674400', '', 0, '', '', 0, '', 0, '', 0, 'ljnmChLd', 0),
(37, 88, '1554588000', '1554600081', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'grains', 'beans', 'oloyin bean', 3232, 5, 16160, 139200, '', '5ca95ea17ce6d', 'qX29EeH7mPYW.jpg', 2, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, 'Intra-state/Inter-zonal', 54334, 1, '16/412', '114, Yejide road molete', 'a5326790814', '32', 0, 0, 'previous', '', '1555192800', '', 0, '', '', 0, '', 0, '', 0, 'zy3KCu7s', 0),
(38, 93, '1555884000', '1554784389', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'fruits', 'apple', 'Purple Apple  ', 3200, 1, 3200, 450, 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '5cac2e954eba3', '3cwOSGd2D7Hd.jpg', 3, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, 'Intra-city/Inter-zonal', 3165, 1, '9/105', '114, Yejide road molete', 'a5326790814', '32', 0, 0, 'previous', '', '1555365600', '', 0, '', '', 0, '', 0, '', 0, '509cn1Yw', 0),
(39, 93, '1555884000', '1554900550', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'fruits', 'apple', 'Purple Apple  ', 3200, 1, 3200, 450, 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '5cadf456d80ab', '3cwOSGd2D7Hd.jpg', 0, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, 'Intra-city/Inter-zonal', 3165, 1, '9/105', '114, Yejide road molete', 'a5326790814', '25', 4, 2, 'previous', '', '1555452000', '', 0, '', '', 0, 'azeez', 0, '', 0, 'tNwCFkur', 1),
(42, 108, '1555538400', '1555610185', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'sea_produce', 'fishes', 'Cat fish', 9600, 4, 38400, 40000, 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '5cb8c85922cd9', '9gdsKb06fJSd.jpg', 0, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, '1152.7575634105/902.84273270598', 119842, 1, '29/873', '', 'f4752319608', '5', 0, 0, 'previous', '20w', '1556143200', '', 0, '', '', 0, '', 0, '', 0, 'wP3Q1Slp', 0),
(51, 88, '1555624800', '1555654770', 'adioadeyoriazeez@gmail.com', 'Adio', 'adewunmi', 'grains', 'beans', 'oloyin bean', 3232, 2, 6464, 55680, '', '5cb97682c5680', 'qX29EeH7mPYW.jpg', 0, '', '155', '10', '114, Yejide road molete', '08064374020', '25', 0, '494.22434683047/673.83908501956', 234454, 1, '16/412', '114, Yejide road molete', 'a5326790814', '5', 0, 0, 'previous', '15', '1555711200', '3edb5165a4c9df6665710788b874350b', 1, '', '', 0, 'Adio', 0, '', 0, 'xItLhQfF', 1),
(55, 108, '1555797600', '15559148341555914834', 'adioadeyoriazeez@yahoo.com', 'websmith', 'balogun', 'sea_produce', 'fishes', 'Cat fish', 9600, 1, 9600, 10000, 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '5cbcc06794941', '9gdsKb06fJSd.jpg', 0, '', '316', '15', '12345678', 'ewrtyunhbvhbvj', '25', 0, '590.66847314728/583.80585074455', 11744.7, 1, '29/873', '', 'f4752319608', '5', 0, 0, 'previous', '20w', '1557007200', 'cd9359295b2b19e5e2454fc455174ff7', 0, '', '', 0, '', 0, '', 0, '5avGCd1w', 0),
(56, 108, '1555797600', '1555914834', 'adioadeyoriazeez@yahoo.com', 'websmith', 'balogun', 'sea_produce', 'fishes', 'Cat fish', 9600, 1, 9600, 10000, 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '5cbcc4b9e9fc6', '9gdsKb06fJSd.jpg', 0, '', '316', '15', '12345678', 'ewrtyunhbvhbvj', '25', 0, '590.66847314728/583.80585074455', 11744.7, 1, '29/873', '', 'f4752319608', '5', 0, 0, 'previous', '20w', '1557007200', 'fabb882b6c7b8afae4fa3041ad6d3103', 0, '', '', 0, 'sdfhyghj', 0, '', 0, 'NceaYbjA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proli_orders_toanother`
--

CREATE TABLE `proli_orders_toanother` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` varchar(22) NOT NULL,
  `time` varchar(30) NOT NULL,
  `email` varchar(225) NOT NULL,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `cate` varchar(22) NOT NULL,
  `subcate` varchar(200) NOT NULL,
  `name` varchar(22) NOT NULL,
  `price` float NOT NULL,
  `quatity` int(11) NOT NULL,
  `tot` float NOT NULL,
  `mass` float NOT NULL,
  `desc` varchar(600) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `gimg` varchar(225) NOT NULL,
  `pay` int(11) NOT NULL,
  `shipping` varchar(20) NOT NULL,
  `region` varchar(100) NOT NULL,
  `cstate` varchar(70) NOT NULL,
  `address` varchar(225) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `carry` varchar(50) NOT NULL,
  `dis` float NOT NULL,
  `transamount` float NOT NULL,
  `war_id` varchar(50) NOT NULL,
  `storage` varchar(225) NOT NULL,
  `owner` varchar(225) NOT NULL,
  `vesname` varchar(50) NOT NULL,
  `rs` int(11) NOT NULL,
  `ds` int(11) NOT NULL,
  `whenorder` varchar(30) NOT NULL,
  `modemethod` varchar(30) NOT NULL,
  `delivery` varchar(40) NOT NULL,
  `express` varchar(20) NOT NULL,
  `road` varchar(20) NOT NULL,
  `rail` varchar(20) NOT NULL,
  `free` varchar(20) NOT NULL,
  `pushtolog` int(11) NOT NULL,
  `driv` varchar(120) NOT NULL,
  `tok` int(11) NOT NULL,
  `tokval` varchar(225) NOT NULL,
  `rec` int(11) NOT NULL,
  `poc` varchar(20) NOT NULL,
  `getpoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proli_orders_toanother`
--

INSERT INTO `proli_orders_toanother` (`id`, `pid`, `date`, `time`, `email`, `fname`, `lname`, `cate`, `subcate`, `name`, `price`, `quatity`, `tot`, `mass`, `desc`, `oid`, `gimg`, `pay`, `shipping`, `region`, `cstate`, `address`, `telephone`, `carry`, `dis`, `transamount`, `war_id`, `storage`, `owner`, `vesname`, `rs`, `ds`, `whenorder`, `modemethod`, `delivery`, `express`, `road`, `rail`, `free`, `pushtolog`, `driv`, `tok`, `tokval`, `rec`, `poc`, `getpoc`) VALUES
(1, 63, '1546995642', '1546996365', 'jobsiteonlyforadeyori@gmail.com', 'adio', 'azeez', 'oil ', 'banana', 'banana', 730, 13, 9490, 330, 'from me', '5bab3951cd10a', '0uc05f97dmWSwqe2obs33hbacEi1k2ddgr9Atd4R6d993d2ioY2nTn9.jpg\r\n', 2, '', 'ibadan-ring road', '31', '114,yejide road molete ', '08064374020', '32', 610.59, 9302.25, '7', 'SW9/1337, Ring Road, Ibadan, O', 'f3058714269', '4', 1, 1, 'previous', 'express', '1545809563', '', '', '', '', 0, '', 0, '', 1, 'FvmQxXyw', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `email` varchar(225) NOT NULL,
  `rev` varchar(600) NOT NULL,
  `rating` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `pid`, `fname`, `email`, `rev`, `rating`, `time`, `date`) VALUES
(106, 78, 'adio', 'adioadeyoriazeez@yahoo.com', 'oh my God, has a man i have looking for this, i dont tire of going to market. now with proli Agro shopping I can order anything and it will get to my door step i time, proli please a create of egg for taste.', 2, ' 03:48:36', 'Tue Feb 2018 '),
(107, 78, 'adio', 'adioadeyoriazeez@yahoo.com', 'oh my God, has a man i have looking for this, i dont tire of going to market. now with proli Agro shopping I can order anything and it will get to my door step i time, proli please a create of egg for taste.', 2, ' 03:48:48', 'Tue Feb 2018 '),
(108, 77, 'adio', 'adioadeyoriazeez@yahoo.com', 'nice', 1, '02:30:12', 'Fri Apr 2018 '),
(109, 78, 'azeez', 'adioadeyoriazeez@gmail.com', 'nice one', 3, '06:33:56', 'Mon Jun 2018 '),
(110, 3, 'azeeez', 'wewefre@ganlco', 'efrefre', 4, '20:39:06', '2018-06-10'),
(111, 2, 'Azeez', 'adioadeyoriazeez@gmail.com', 'gfcgc', 0, '15:12:08', '2018-07-18'),
(112, 2, 'Azeez', 'adioadeyoriazeez@gmail.com', 'gfcgc', 0, '15:31:30', '2018-07-18'),
(113, 78, 'Azeez', 'adioadeyoriazeez@gmail.com', 'gfcgc', 3, '15:33:38', '2018-07-18'),
(114, 79, 'Azeez', 'adioadeyoriazeez@gmail.com', 'gfcgc', 3, '22:16:04', '2018-07-18'),
(115, 1, 'Azeez', 'adioadeyoriazeez@gmail.com', 'gfcgc', 3, '22:16:56', '2018-07-18'),
(116, 75, 'Azeez', 'adioadeyoriazeez@gmail.com', 'gfcgc', 3, '22:19:27', '2018-07-18'),
(117, 1, 'Azeez', 'adioadeyoriazeez@gmail.com', '', 4, '22:19:40', '2018-07-18'),
(118, 6, 'Azeez Addio', 'adioadeyoriazeez@gmail.com', 'gfcgc', 4, '02:15:34', '2018-07-20'),
(119, 6, 'Azeez Addio', 'adioadeyoriazeez@gmail.com', 'gfcgc', 0, '02:16:17', '2018-07-20'),
(120, 59, 'Azeez Addio', 'banana@gmail.com', 'gfcgc', 0, '09:58:54', '2018-07-23'),
(121, 59, 'Azeez Addio', 'adioadeyoriazeez@gmail.com', 'gfcgc', 3, '09:59:27', '2018-07-23'),
(123, 74, '234\\[]', 'adioadeyoriazdsee@gmail.com', 'gfgttrr', 1, '00:01:59', '2019-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `region_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region_id`, `region_name`) VALUES
(1, 1, ' ABA-CENTRAL LOCATIONS '),
(2, 1, ' IKWUANO '),
(3, 1, ' UMUAHIA-CENTRAL LOCATIONS '),
(4, 1, ' UMUDIKE '),
(5, 2, ' GOMBI '),
(6, 2, ' HONG '),
(7, 2, ' MAYO BELWA '),
(8, 2, ' MUBI '),
(9, 2, ' NGURORE '),
(10, 2, ' NUMAN '),
(11, 2, ' SONG '),
(12, 2, ' YOLA-CENTRAL LOCATIONS '),
(13, 3, ' ABAK '),
(14, 3, ' EKET '),
(15, 3, ' EKET-CENTRAL LOCATIONS '),
(16, 3, ' ETINAN '),
(17, 3, ' IKOT ABASSI '),
(18, 3, ' IKOT EKPENE '),
(19, 3, ' IKOT OSURA '),
(20, 3, ' MKPAT ENIN '),
(21, 3, ' ORON '),
(22, 3, ' QUA IBOH TERMINAL / QIT '),
(23, 3, ' UYO- IKOT EKPENE ROAD '),
(24, 3, ' UYO-ABAK ROAD '),
(25, 3, ' UYO-AKA ROAD '),
(26, 3, ' UYO-ATIKU ABUBAKA WAY '),
(27, 3, ' UYO-CALABAR ITU HIGH WAY '),
(28, 3, ' UYO-EKET LGA (Akwa Ibom) '),
(29, 3, ' UYO-ETINAN '),
(30, 3, ' UYO-EWET HOUSING ESTATE (GRA) '),
(31, 3, ' UYO-FOUR LINE '),
(32, 3, ' UYO-IBASIKPO '),
(33, 3, ' UYO-IBB WAY '),
(34, 3, ' UYO-IBONO LGA '),
(35, 3, ' UYO-IDORO ROAD '),
(36, 3, ' UYO-IKOT ABASI LGA '),
(37, 3, ' UYO-IKOT AKPAN-ABIA '),
(38, 3, ' UYO-IKOT EKPENE LGA '),
(39, 3, ' UYO-IKPA ROAD '),
(40, 3, ' UYO-ITU '),
(41, 3, ' UYO-ITU ROAD '),
(42, 3, ' UYO-NWANIBA ROAD '),
(43, 3, ' UYO-ORON LGA '),
(44, 3, ' UYO-ORUN ROAD '),
(45, 3, ' UYO-TWO LANE '),
(46, 3, ' UYO-UDOUDOMA '),
(47, 3, ' UYO-URUAN '),
(48, 3, ' UYO-WELLINGTON (BARRACKS) ROAD '),
(49, 4, ' ABAGANA '),
(50, 4, ' ACHALLA / AWKA '),
(51, 4, ' AMAWBIA / AWKA '),
(52, 4, ' AWKA TOWN '),
(53, 4, ' EKWULOBIA '),
(54, 4, ' NISE / AWKA '),
(55, 4, ' NKPOR '),
(56, 4, ' NNEWI-CENTRAL LOCATIONS '),
(57, 4, ' OGIDI / AWKA '),
(58, 4, ' ONITSHA '),
(59, 4, ' ONITSHA-CENTRAL LOCATIONS '),
(60, 4, ' UMUOKPE / AWKA '),
(61, 5, ' ABAGANA '),
(62, 5, ' ALKALERI '),
(63, 5, ' BAUCHI-CENTRAL LOCATIONS '),
(64, 6, ' AMASSOMA '),
(65, 6, ' Agbia-Yenagoa '),
(66, 6, ' Agudama-Epie-Yenagoa '),
(67, 6, ' Agudama-Yenagoa '),
(68, 6, ' Amarata-Yenagoa '),
(69, 6, ' Atissa-Yenagoa '),
(70, 6, ' Azikoro-Yenagoa7 '),
(71, 6, ' BRASS '),
(72, 6, ' Biogbolo-Yenagoa '),
(73, 6, ' Ede-Pie-Yenagoa '),
(74, 6, ' Ekeki-Yenagoa '),
(75, 6, ' Epie-Yenagoa '),
(76, 6, ' Fangbe-Yenagoa '),
(77, 6, ' Gbarain-Yenagoa '),
(78, 6, ' Igbogene-Yenagoa '),
(79, 6, ' KIAMA '),
(80, 6, ' Kpansia-Yenagoa '),
(81, 6, ' Mbiama Rd-Yenagoa '),
(82, 6, ' Melford Okilo Exp.Way-Yenagoa '),
(83, 6, ' ODI '),
(84, 6, ' OTUOKE '),
(85, 6, ' Okaka-Yenagoa '),
(86, 6, ' Okutukutu-Yenagoa '),
(87, 6, ' Opolo-Yenagoa '),
(88, 6, ' SAGBAMA '),
(89, 6, ' Tombia-Yenagoa '),
(90, 6, ' WILBERFORCE ISLAND '),
(91, 6, ' YENAGOA-CENTRAL LOCATIONS '),
(92, 6, ' Yenagoa-Yenagoa '),
(93, 6, ' Yenegwe-Yenagoa '),
(94, 6, ' Yeniozue-Epie-Yenagoa '),
(95, 7, ' GBOKO '),
(96, 7, ' KATSINA-ALA '),
(97, 7, ' MAKURDI-CENTRAL LOCATIONS '),
(98, 7, ' MKAR '),
(99, 7, ' VANDEKYA '),
(100, 7, ' YANDEV '),
(101, 9, ' AUNO '),
(102, 8, ' MAIDUGURI-CENTRAL LOCATIONS '),
(103, 9, ' Abi '),
(104, 9, ' Akamkpa '),
(105, 9, ' Akpabuyo '),
(106, 9, ' Bakassi '),
(107, 9, ' Bekwarra '),
(108, 9, ' Biase'),
(109, 9, ' Calabar Municipal-4 Miles '),
(110, 9, ' Calabar Municipal-Asari Eso '),
(111, 9, ' Calabar Municipal-Atimbo '),
(112, 9, ' Calabar Municipal-Barracks Road '),
(113, 9, ' Calabar Municipal-Diamond Hill '),
(114, 9, ' Calabar Municipal-EPZ '),
(115, 9, ' Calabar Municipal-Ediba Road '),
(116, 9, ' Calabar Municipal-Ekorinim '),
(117, 9, ' Calabar Municipal-Essien Town '),
(118, 9, ' Calabar Municipal-Etta Agbor '),
(119, 9, ' Calabar Municipal-Federal Housing '),
(120, 9, ' Calabar Municipal-Ikot Ansa '),
(121, 9, ' Calabar Municipal-Ikot Ishie '),
(122, 9, ' Calabar Municipal-Marian '),
(123, 9, ' Calabar Municipal-Muritala Mohammed Highway '),
(124, 9, ' Calabar Municipal-Nassarawa '),
(125, 9, ' Calabar Municipal-Parliamentary '),
(126, 9, ' Calabar Municipal-Parliamentary Extension '),
(127, 9, ' Calabar Municipal-Satelite Town '),
(128, 9, ' Calabar Municipal-State Housing '),
(129, 9, ' Calabar Municipal-Tinapa '),
(130, 9, ' Calabar South-Anantigha '),
(131, 9, ' Calabar South-Crutech '),
(132, 9, ' Calabar South-Ekpo Abasi '),
(133, 9, ' Calabar South-Goldie '),
(134, 9, ' Calabar South-Jebs '),
(135, 9, ' Calabar South-Marina Resort '),
(136, 9, ' Calabar South-Mary Slessor '),
(137, 9, ' Calabar South-Mount Zion '),
(138, 9, ' Calabar South-Unical '),
(139, 9, ' Calabar South-White House '),
(140, 9, ' Etung '),
(141, 9, ' Ikom '),
(142, 9, ' Obanliku '),
(143, 9, ' Obubra '),
(144, 9, ' Obudu '),
(145, 9, ' Odukpani '),
(146, 9, ' Ogoja '),
(147, 9, ' Yakuur '),
(148, 9, ' Yala '),
(149, 10, ' ABRAKA '),
(150, 10, ' AGBARHO '),
(151, 10, ' AGBOR '),
(152, 10, ' ALADJA '),
(153, 10, ' ASABA '),
(154, 10, ' EKU '),
(155, 10, ' FMCG-WAWAWAWA STATION '),
(156, 10, ' ISELE-UKU '),
(157, 10, ' OBIARUKU '),
(158, 10, ' OGHARA '),
(159, 10, ' OGWASHI-UKU '),
(160, 10, ' OLEH '),
(161, 10, ' OTOR-UDU '),
(162, 10, ' OVWIAN '),
(163, 10, ' OZORO '),
(164, 10, ' SAPELE-AJOGODO '),
(165, 10, ' SAPELE-AKINTOLA '),
(166, 10, ' SAPELE-GANA '),
(167, 10, ' SAPELE-JESSE '),
(168, 10, ' SAPELE-MOSOGAR '),
(169, 10, ' SAPELE-NEW ROAD '),
(170, 10, ' SAPELE-OGORODE '),
(171, 10, ' SAPELE-OKPE ROAD '),
(172, 10, ' SAPELE-UGBERIKOKO '),
(173, 10, ' SAPELE-WARRI SAPELE ROAD '),
(174, 10, ' SAPELE-YORUBA ROAD '),
(175, 10, ' Sapele-Amukpe '),
(176, 10, ' UGHELLI '),
(177, 10, ' UMUNEDE '),
(178, 10, ' WARRI-AIRPORT ROAD '),
(179, 10, ' WARRI-EDJEBA '),
(180, 10, ' WARRI-EFURUN '),
(181, 10, ' WARRI-EKPAN '),
(182, 10, ' WARRI-ENERHEN '),
(183, 10, ' WARRI-GRA '),
(184, 10, ' WARRI-JAKPA '),
(185, 10, ' WARRI-JEDDO '),
(186, 10, ' WARRI-N.P.A '),
(187, 10, ' WARRI-OGUNU '),
(188, 10, ' WARRI-OSUBI '),
(189, 10, ' WARRI-P.T.I '),
(190, 10, ' WARRI-REFINERY ROAD '),
(191, 10, ' WARRI-UBEJI '),
(192, 10, ' WARRI-UDU '),
(193, 10, ' WARRI-UGWUANGWE '),
(194, 11, ' ABAKALIKI '),
(195, 11, ' ABAKALIKI-CENTRAL LOCATIONS '),
(196, 12, ' Akoko Edo '),
(197, 12, ' Benin-Aduwawa '),
(198, 12, ' Benin-Agbor Park '),
(199, 12, ' Benin-Akpapava '),
(200, 12, ' Benin-Dumez '),
(201, 12, ' Benin-Ekae '),
(202, 12, ' Benin-Ekenwan '),
(203, 12, ' Benin-Ekhor '),
(204, 12, ' Benin-Ekosodin '),
(205, 12, ' Benin-Ekuku '),
(206, 12, ' Benin-Eriaria '),
(207, 12, ' Benin-Etete '),
(208, 12, ' Benin-Evbotube '),
(209, 12, ' Benin-Ewemade Village '),
(210, 12, ' Benin-Eyaen '),
(211, 12, ' Benin-GRA '),
(212, 12, ' Benin-Idogbo '),
(213, 12, ' Benin-Ihogben '),
(214, 12, ' Benin-Ikpoba hill '),
(215, 12, ' Benin-Ikpokan '),
(216, 12, ' Benin-Iwogban '),
(217, 12, ' Benin-Limits '),
(218, 12, ' Benin-Medical Road '),
(219, 12, ' Benin-NPDC '),
(220, 12, ' Benin-New Benin Market '),
(221, 12, ' Benin-Obe '),
(222, 12, ' Benin-Ogbelaka '),
(223, 12, ' Benin-Ohovbeokao '),
(224, 12, ' Benin-Oko-gba '),
(225, 12, ' Benin-Oregbeni '),
(226, 12, ' Benin-Ring road '),
(227, 12, ' Benin-Sapele Road>Benin-Sapele Road</option><option value= '),
(228, 12, ' Benin-Ugbekun '),
(229, 12, ' Benin-Ugbor '),
(230, 12, ' Benin-Ugbowo '),
(231, 12, ' Benin-Uhumwuimwu '),
(232, 12, ' Benin-Urhkwuosa '),
(233, 12, ' Benin-Urubi '),
(234, 12, ' Benin-Use '),
(235, 12, ' Benin-Uselu '),
(236, 12, ' Benin-Uwelu '),
(237, 12, ' Egor-Egor '),
(238, 12, ' Egor-Environ Camps '),
(239, 12, ' Egor-Oviasuyi Camp '),
(240, 12, ' Ekpoma- Ujoehenlen '),
(241, 12, ' Ekpoma-Afua '),
(242, 12, ' Ekpoma-Ebhoakhua '),
(243, 12, ' Ekpoma-Eguare '),
(244, 12, ' Ekpoma-Emado '),
(245, 12, ' Ekpoma-Idumebo '),
(246, 12, ' Ekpoma-Ile '),
(247, 12, ' Ekpoma-Iruekpen '),
(248, 12, ' Ekpoma-Okpenu '),
(249, 12, ' Ekpoma-Ujemen '),
(250, 12, ' Esan Center '),
(251, 12, ' Esan South-East '),
(252, 12, ' Esan West '),
(253, 12, ' Etsako Central '),
(254, 12, ' Etsako East '),
(255, 12, ' Etsako West '),
(256, 12, ' FMCG-BEBEBEBE STATION '),
(257, 12, ' Igueben '),
(258, 12, ' Ikpoba Okha '),
(259, 12, ' Okada '),
(260, 12, ' Oluku '),
(261, 12, ' Orhionmwon '),
(262, 12, ' Ovia North East '),
(263, 12, ' Ovia South West '),
(264, 12, ' Owan East '),
(265, 12, ' Owan West '),
(266, 12, ' Ubiaja '),
(267, 12, ' Ugbowo- Isiohor '),
(268, 12, ' Ugbowo-Adolor College Road '),
(269, 12, ' Ugbowo-BDPA '),
(270, 12, ' Ugbowo-Edpa '),
(271, 12, ' Ugbowo-Federal Road/ Osasogie '),
(272, 12, ' Ugbowo-Oluku '),
(273, 12, ' Ugbowo-S/T Barracks '),
(274, 12, ' Ugbowo-Technical College Road '),
(275, 12, ' Ugbowo-UBTH '),
(276, 12, ' Ugbowo-UNIBEN '),
(277, 12, ' Ugbowo-Uselu '),
(278, 12, ' Ugbowo-Uwagboe '),
(279, 12, ' Ugbowo-Uwasota '),
(280, 12, ' Ugbowo-Uwelu '),
(281, 12, ' Uhen '),
(282, 13, ' ADO-EKITI AFEBABALOLA UNIVERSITY '),
(283, 13, ' ADO-EKITI CENTRAL LOCATIONS '),
(284, 13, ' EFON-ALAAYE '),
(285, 13, ' EKITI-Aramoko '),
(286, 13, ' EKITI-Ido '),
(287, 13, ' EKITI-Ifaki '),
(288, 13, ' EKITI-Ijede '),
(289, 13, ' EKITI-Ijero '),
(290, 13, ' EKITI-Ikole '),
(291, 13, ' EKITI-Ilawe '),
(292, 13, ' EKITI-Iwokoro '),
(293, 13, ' EKITI-Iyin '),
(294, 13, ' EKITI-Oyee '),
(295, 13, ' IKOLE '),
(296, 13, ' ISE EKITI '),
(297, 13, ' OMUO '),
(298, 13, ' OTUN '),
(299, 14, ' AGBANI TOWN '),
(300, 14, ' ANIRI '),
(301, 14, ' ENUGU-ABAKPA NIKE '),
(302, 14, ' ENUGU-COAL CAMP '),
(303, 14, ' ENUGU-EMENE '),
(304, 14, ' ENUGU-GARIKI '),
(305, 14, ' ENUGU-GR '),
(306, 14, ' ENUGU-INDEPENDENCE LAYOUT '),
(307, 14, ' ENUGU-NEW HEAVEN '),
(308, 14, ' ENUGU-NSUKKA '),
(309, 14, ' ENUGU-OGUI ROAD '),
(310, 14, ' ENUGU-TRANS-EKULU '),
(311, 14, ' ENUGU-ZIK AVENUE '),
(312, 14, ' ITUKU OZALLA '),
(313, 15, ' ABAJI '),
(314, 15, ' ABUJA- APO CENTRA '),
(315, 15, ' ABUJA- APO LEGISLATIVE ZONE A '),
(316, 15, ' ABUJA- APO LEGISLATIVE ZONE B '),
(317, 15, ' ABUJA- APO LEGISLATIVE ZONE C '),
(318, 15, ' ABUJA- APO LEGISLATIVE ZONE D '),
(319, 15, ' ABUJA- APO LEGISLATIVE ZONE E '),
(320, 15, ' ABUJA- APO MECHANIC VILLAGE '),
(321, 15, ' ABUJA- APO RESETTLEMENT ZONE A '),
(322, 15, ' ABUJA- APO RESETTLEMENT ZONE B '),
(323, 15, ' ABUJA- APO RESETTLEMENT ZONE C '),
(324, 15, ' ABUJA- APO RESETTLEMENT ZONE D '),
(325, 15, ' ABUJA- APO RESETTLEMENT ZONE E '),
(326, 15, ' ABUJA- DURUMI '),
(327, 15, ' ABUJA- DURUMI PHASE 2 '),
(328, 15, ' ABUJA- GARKI AREA 1 '),
(329, 15, ' ABUJA- GARKI AREA 10 '),
(330, 15, ' ABUJA- GARKI AREA 11 '),
(331, 15, ' ABUJA- GARKI AREA 2 '),
(332, 15, ' ABUJA- GARKI AREA 3 '),
(333, 15, ' ABUJA- GARKI AREA 7 '),
(334, 15, ' ABUJA- GARKI AREA 8 '),
(335, 15, ' ABUJA- GWARINPA 1ST AVENUE '),
(336, 15, ' ABUJA- GWARINPA 2ND AVENUE '),
(337, 15, ' ABUJA- GWARINPA 3RD AVENUE '),
(338, 15, ' ABUJA- GWARINPA 4TH AVENUE '),
(339, 15, ' ABUJA- GWARINPA 5TH AVENUE '),
(340, 15, ' ABUJA- GWARINPA 6TH AVENUE '),
(341, 15, ' ABUJA- GWARINPA 7TH AVENUE '),
(342, 15, ' ABUJA- GWARINPA EXTENSION '),
(343, 15, ' ABUJA- KATAMPE EXTENSION '),
(344, 15, ' ABUJA- KATAMPE MAIN '),
(345, 15, ' ABUJA- KUBWA 2/1 PHASE 1 '),
(346, 15, ' ABUJA- KUBWA 2/2 PHASE 2 '),
(347, 15, ' ABUJA- KUBWA ARAB ROAD '),
(348, 15, ' ABUJA- KUBWA BYAZHIN '),
(349, 15, ' ABUJA- KUBWA EXTENSION 3 '),
(350, 15, ' ABUJA- KUBWA GBAZANGO '),
(351, 15, ' ABUJA- KUBWA PHASE 3 '),
(352, 15, ' ABUJA- KUBWA PW '),
(353, 15, ' ABUJA- KUBWA- FCDA/FHA '),
(354, 15, ' ABUJA- LIFE CAMP EXTENSION '),
(355, 15, ' ABUJA- MABUSHI1493 '),
(356, 15, ' ABUJA- MAITAMA ALEIRO '),
(357, 15, ' ABUJA- MAITAMA ASO DRIVE '),
(358, 15, ' ABUJA- MAITAMA CENTRAL '),
(359, 15, ' ABUJA- MAITAMA EXTENSION '),
(360, 15, ' ABUJA-AIRPORT ROAD '),
(361, 15, ' ABUJA-ASOKORO '),
(362, 15, ' ABUJA-BWARI '),
(363, 15, ' ABUJA-CENTRAL AREA '),
(364, 15, ' ABUJA-DAWAKI '),
(365, 15, ' ABUJA-DEI-DEI '),
(366, 15, ' ABUJA-DUTSE '),
(367, 15, ' ABUJA-EFAB '),
(368, 15, ' ABUJA-GALADIMAWA '),
(369, 15, ' ABUJA-GAMES VILLAGE '),
(370, 15, ' ABUJA-GARKI2 '),
(371, 15, ' ABUJA-GUDU '),
(372, 15, ' ABUJA-GUZAPE '),
(373, 15, ' ABUJA-GWAGWALADA '),
(374, 15, ' ABUJA-JABI '),
(375, 15, ' ABUJA-JIKWOYI '),
(376, 15, ' ABUJA-KABUSA '),
(377, 15, ' ABUJA-KADO '),
(378, 15, ' ABUJA-KARIMO '),
(379, 15, ' ABUJA-KARU '),
(380, 15, ' 628 '),
(381, 15, ' ABUJA-KAURA DISTRICT '),
(382, 15, ' ABUJA-KWALI '),
(383, 15, ' ABUJA-LIFE CAMP '),
(384, 15, ' ABUJA-LOKOGOMA '),
(385, 15, ' ABUJA-LUGBE '),
(386, 15, ' ABUJA-MARARABA '),
(387, 15, ' ABUJA-MPAPE '),
(388, 15, ' ABUJA-NYANYA '),
(389, 15, ' ABUJA-SUNCITY '),
(390, 15, ' ABUJA-SUNNY VALLE '),
(391, 15, ' ABUJA-UTAKO '),
(392, 15, ' ABUJA-WUSE ZONE 1 '),
(393, 15, ' ABUJA-WUSE ZONE 2 '),
(394, 15, ' ABUJA-WUSE ZONE 3 '),
(395, 15, ' ABUJA-WUSE ZONE 4 '),
(396, 15, ' ABUJA-WUSE ZONE 5 '),
(397, 15, ' ABUJA-WUSE ZONE 6 '),
(398, 15, ' ABUJA-WUSE ZONE 7 '),
(399, 15, ' ABUJA-WUSE11 '),
(400, 15, ' GIDAN MANGORO '),
(401, 15, ' GWAGWA '),
(402, 15, ' GWAGWALADA '),
(403, 15, ' IDU '),
(404, 15, ' KARMO '),
(405, 15, ' KARSHI '),
(406, 15, ' KARU0 '),
(407, 15, ' KUJE '),
(408, 15, ' KWALI '),
(409, 15, ' MINISTERS HILL '),
(410, 15, ' NICON JUNCTION '),
(411, 15, ' SHEDA '),
(412, 16, ' ASHAKA '),
(413, 16, ' BAJOGA '),
(414, 16, ' GOMBE '),
(415, 16, ' MALAMFIDI '),
(416, 17, ' AKABO '),
(417, 17, ' ALADIMMA '),
(418, 17, ' AMAKOHIA-AKWAKUMA '),
(419, 17, ' AWAKA '),
(420, 17, ' DOUGLAS '),
(421, 17, ' EGBADA5 '),
(422, 17, ' EGBU '),
(423, 17, ' EMII '),
(424, 17, ' IHIAGWA '),
(425, 17, ' IHIALA '),
(426, 17, ' IKENEGBU '),
(427, 17, ' ISUOCHI '),
(428, 17, ' MBAISE '),
(429, 17, ' MBANO '),
(430, 17, ' MGBIDI '),
(431, 17, ' NAZE '),
(432, 17, ' NEKEDE '),
(433, 17, ' NEW OWERRI '),
(434, 17, ' NGOR OKPALA '),
(435, 17, ' OBINZE '),
(436, 17, ' OKIGWE '),
(437, 17, ' ORJI '),
(438, 17, ' ORLU '),
(439, 17, ' OWERRI-CENTRAL LOCATIONS '),
(440, 17, ' UGWU ORJI '),
(441, 17, ' UMUGUMA HOUSE '),
(442, 17, ' UMUOBA-URATTA RD '),
(443, 17, ' WETHERAL '),
(444, 17, ' WORKS LAYOUT '),
(445, 18, ' DUTSE '),
(446, 18, ' GUMEL '),
(447, 18, ' HADEJA '),
(448, 18, ' JAHUM '),
(449, 18, ' KAZAURE '),
(450, 18, ' RINGIM '),
(451, 19, ' ABUJA JUNCTION '),
(452, 19, ' AIRPORT '),
(453, 19, ' ALALI AKILU ROAD '),
(454, 19, ' ANGWAN BORO '),
(455, 19, ' ANGWAN DOSA '),
(456, 19, ' ANGWAN RIMI '),
(457, 19, ' ANGWAN SARIKI '),
(458, 19, ' BARNAWA '),
(459, 19, ' BYE PASS '),
(460, 19, ' CENTRAL MARKET '),
(461, 19, ' CONSTITUTION ROAD '),
(462, 19, ' GONI GORA '),
(463, 19, ' IBB '),
(464, 19, ' IGABI LGA '),
(465, 19, ' IKARA '),
(466, 19, ' INDEPENDENCE ROAD '),
(467, 19, ' JAJI '),
(468, 19, ' KABALA '),
(469, 19, ' KACHIA '),
(470, 19, ' KAFANCHAN '),
(471, 19, ' KAKURI '),
(472, 19, ' KAWO-KADUNA '),
(473, 19, ' KIKINU '),
(474, 19, ' KURUMASHI '),
(475, 19, ' LOW COAST '),
(476, 19, ' MAKARFI '),
(477, 19, ' MALALI '),
(478, 19, ' NARAYI '),
(479, 19, ' NDA '),
(480, 19, ' NNCP '),
(481, 19, ' REGACHUKU '),
(482, 19, ' SABO '),
(483, 19, ' SAMINAKA '),
(484, 19, ' SAYE (Kaduna) '),
(485, 19, ' SHIKA '),
(486, 19, ' SIGN BOARD '),
(487, 19, ' TRIKANIA '),
(488, 19, ' TUNDU WADA '),
(489, 19, ' ZARIA '),
(490, 20, ' AIRFORCE BASE/AIRPORT ROAD '),
(491, 20, ' AUDU BAKO WA '),
(492, 20, ' BADARAWA '),
(493, 20, ' BICHI '),
(494, 20, ' BRIGADE '),
(495, 20, ' BUK OLD SITE/NEW SITE '),
(496, 20, ' COURT ROAD '),
(497, 20, ' FAGGE '),
(498, 20, ' FARM CENTRE '),
(499, 20, ' GADAN KAYA '),
(500, 20, ' GADUN ALBASU '),
(501, 20, ' GAYA '),
(502, 20, ' GEZEWA '),
(503, 20, ' GORON DUTSE '),
(504, 20, ' GWAMMAJA '),
(505, 20, ' GWARZO '),
(506, 20, ' GYADI-GYADI/ZARIA ROAD '),
(507, 20, ' HOTORO '),
(508, 20, ' KACHAKO '),
(509, 20, ' KANKIYA '),
(510, 20, ' KANO CITY '),
(511, 20, ' KARKASARA '),
(512, 20, ' KATSINA ROAD '),
(513, 20, ' KAWO-KANO '),
(514, 20, ' KURA '),
(515, 20, ' MURTALA MOHAMMED WAY '),
(516, 20, ' NASSARAWA GR '),
(517, 20, ' NO MANSLAND '),
(518, 20, ' PANSHEKARA '),
(519, 20, ' SABON GARI '),
(520, 20, ' SALLARI '),
(521, 20, ' SHARADA '),
(522, 20, ' TARAUN '),
(523, 20, ' TAWANAU '),
(524, 20, ' UNGOGO '),
(525, 20, ' WAJE '),
(526, 20, ' WUDIL '),
(527, 20, ' YANKABA/ HADEJIA ROAD '),
(528, 20, ' ZOO ROAD '),
(529, 21, ' BATAGAWARA '),
(530, 21, ' DAURA '),
(531, 21, ' DUTSINMA '),
(532, 21, ' FUNTUA '),
(533, 21, ' KATSINA '),
(534, 21, ' KATSINA TOWN-CENTRAL LOCATIONS '),
(535, 21, ' MASHI '),
(536, 22, ' AMBRUSA '),
(537, 22, ' ARGUNGU '),
(538, 22, ' BIRNIN KEBBI '),
(539, 23, ' ABOBO '),
(540, 23, ' AJAOKUTA '),
(541, 23, ' ANKPA '),
(542, 23, ' AYANGBA '),
(543, 23, ' IDAH '),
(544, 23, ' ITAKPE '),
(545, 23, ' KABBA '),
(546, 23, ' LOKOJA-CENTRAL LOCATIONS '),
(547, 23, ' OBAJANA '),
(548, 23, ' OKENNE '),
(549, 24, ' ILORIN-Adewole Estate '),
(550, 24, ' ILORIN-Agaka/Ojo Oba '),
(551, 24, ' ILORIN-Agba dam '),
(552, 24, ' ILORIN-Agbo Oba '),
(553, 24, ' ILORIN-Airport '),
(554, 24, ' ILORIN-Asa Dam '),
(555, 24, ' ILORIN-Basin '),
(556, 24, ' ILORIN-CENTRAL LOCATION '),
(557, 24, ' ILORIN-Challenge '),
(558, 24, ' ILORIN-Cocacola Road '),
(559, 24, ' ILORIN-College of Education '),
(560, 24, ' ILORIN-Elekoyangan '),
(561, 24, ' ILORIN-Emirs Road '),
(562, 24, ' ILORIN-Fate Tanke '),
(563, 24, ' ILORIN-GRA '),
(564, 24, ' ILORIN-Gaa Akanbi '),
(565, 24, ' ILORIN-General Hospital '),
(566, 24, ' ILORIN-Irewolede '),
(567, 24, ' ILORIN-Kwara Polytechnic '),
(568, 24, ' ILORIN-Maraba '),
(569, 24, ' ILORIN-Michael Imodu '),
(570, 24, ' ILORIN-New Yidi Road '),
(571, 24, ' ILORIN-Offa garage '),
(572, 24, ' ILORIN-Olorunsogo '),
(573, 24, ' ILORIN-Olunlade '),
(574, 24, ' ILORIN-Opo Malu '),
(575, 24, ' ILORIN-Pipeline Road '),
(576, 24, ' ILORIN-Post Office '),
(577, 24, ' ILORIN-Sabo '),
(578, 24, ' ILORIN-Sango '),
(579, 24, ' ILORIN-Saw mill '),
(580, 24, ' ILORIN-Surulere '),
(581, 24, ' ILORIN-Taiwo(oke and Isale) '),
(582, 24, ' ILORIN-Tank '),
(583, 24, ' ILORIN-Unity Road '),
(584, 24, ' ILORIN-University of Ilorin '),
(585, 24, ' OFFA '),
(586, 24, ' University of Ilorin Teaching Hospital '),
(587, 25, ' AGBARA INDUSTRIAL ESTATE (Lagos) '),
(588, 25, ' AGILITI '),
(589, 25, ' AGRIC '),
(590, 25, ' AGUNGI (LEKKI) '),
(591, 25, ' AJAH (LEKKI)>AJAH (LEKKI)</option><option value= '),
(592, 25, ' ALABA '),
(593, 25, ' ALAPERE '),
(594, 25, ' ALFA BEACH '),
(595, 25, ' ANTHONY VILLAGE '),
(596, 25, ' AWOYAYA '),
(597, 25, ' Abule Egba (Agbado Ijaye Road) '),
(598, 25, ' Abule Egba (Ajasa Command Road) '),
(599, 25, ' Abule Egba (Ajegunle) '),
(600, 25, ' Abule Egba (Alagbado) '),
(601, 25, ' Abule Egba (Alakuko) '),
(602, 25, ' Abule Egba (Ekoro road) '),
(603, 25, ' Abule Egba (Meiran Road) '),
(604, 25, ' Abule Egba (New Oko Oba) '),
(605, 25, ' Abule Egba (Old Otta Road)3 '),
(606, 25, ' Agege (Ajuwon Akute Road) '),
(607, 25, ' Agege (Dopemu) '),
(608, 25, ' Agege (Iju Road) '),
(609, 25, ' Agege (Old Abeokuta Road) '),
(610, 25, ' Agege (Old Otta Road) '),
(611, 25, ' Agege (Orile Agege) '),
(612, 25, ' Ajah (Abraham Adesanya) '),
(613, 25, ' Apapa (Ajegunle) '),
(614, 25, ' Apapa (Amukoko) '),
(615, 25, ' Apapa (GRA) '),
(616, 25, ' Apapa (Kiri kiri) '),
(617, 25, ' Apapa (Olodi) '),
(618, 25, ' Apapa (Suru Alaba) '),
(619, 25, ' Apapa (Tincan) '),
(620, 25, ' Apapa (Warf Rd) '),
(621, 25, ' BADAGRY (AJARA) '),
(622, 25, ' BADAGRY (AJIBADE) '),
(623, 25, ' BADAGRY (ARADAGUN) '),
(624, 25, ' BADAGRY (BADAGRY TOWN) '),
(625, 25, ' BADAGRY (CHECKING POINT) '),
(626, 25, ' BADAGRY (CHURCH GATE) '),
(627, 25, ' BADAGRY (IBIYE) '),
(628, 25, ' BADAGRY (IKOGA) '),
(629, 25, ' BADAGRY (IMEKE) '),
(630, 25, ' BADAGRY (IWORO-AJIDO) '),
(631, 25, ' BADAGRY (JAH-MICHAEL) '),
(632, 25, ' BADAGRY (MAGBON) '),
(633, 25, ' BADAGRY (MOROGBO) '),
(634, 25, ' BADAGRY (MOWO) '),
(635, 25, ' BADAGRY (OKO-AFOR) '),
(636, 25, ' BADAGRY (OWODE APA) '),
(637, 25, ' BADAGRY (PURE WATER) '),
(638, 25, ' BADAGRY (TOLL GATE) '),
(639, 25, ' BADORE (LEKKI) '),
(640, 25, ' BERGER '),
(641, 25, ' Baale '),
(642, 25, ' CHEVRON '),
(643, 25, ' CHISCO '),
(644, 25, ' Coker '),
(645, 25, ' Doyin '),
(646, 25, ' EJIGBO (Lagos) '),
(647, 25, ' ELF '),
(648, 25, ' EPE '),
(649, 25, ' FESTAC (1st Avenue) '),
(650, 25, ' FESTAC (2nd Avenue)>FESTAC (2nd Avenue)</option><option value= '),
(651, 25, ' FESTAC (4th Avenue) '),
(652, 25, ' FESTAC (5th Avenue) '),
(653, 25, ' FESTAC (6th Avenue) '),
(654, 25, ' FESTAC (7th Avenue) '),
(655, 25, ' FESTAC (Festac Access road) '),
(656, 25, ' GBAGADA '),
(657, 25, ' IDIMU '),
(658, 25, ' IGANDO '),
(659, 25, ' IGBOEFON '),
(660, 25, ' IJANIKIN '),
(661, 25, ' IJEGUN IKOTUN '),
(662, 25, ' IJORA '),
(663, 25, ' IKATE ELEGUSHI '),
(664, 25, ' IKORODU (Adamo) '),
(665, 25, ' IKORODU (Agbede)3 '),
(666, 25, ' IKORODU (Bayeku) '),
(667, 25, ' IKORODU (Eyita) '),
(668, 25, ' IKORODU (Gberigbe) '),
(669, 25, ' IKORODU (Imota) '),
(670, 25, ' IKORODU (Ita oluwo) '),
(671, 25, ' IKORODU (Itamaga) '),
(672, 25, ' IKORODU (Offin) '),
(673, 25, ' IKORODU (Owode-Ibese) '),
(674, 25, ' IKORODU(Elepe) '),
(675, 25, ' IKORODU(Laspotech) '),
(676, 25, ' IKORODU(Sabo '),
(677, 25, ' IKOTA3 '),
(678, 25, ' IKOTUN '),
(679, 25, ' ILAJE '),
(680, 25, ' ILASAN '),
(681, 25, ' ILOGBO '),
(682, 25, ' ILUPEJU (Lagos) '),
(683, 25, ' ISHERI IKOTUN '),
(684, 25, ' ISHERI MAGODO '),
(685, 25, ' ISOLO '),
(686, 25, ' IYANA IBA '),
(687, 25, ' IYANA ISHASHI '),
(688, 25, ' Igbogbo '),
(689, 25, ' Ijede '),
(690, 25, ' Ikeja (ADENIYI JONES) '),
(691, 25, ' Ikeja (ALAUSA) '),
(692, 25, ' Ikeja (ALLEN AVENUE) '),
(693, 25, ' Ikeja (GRA) '),
(694, 25, ' Ikeja (MANGORO) '),
(695, 25, ' Ikeja (MMA) '),
(696, 25, ' Ikeja (OBA-AKRAN) '),
(697, 25, ' Ikeja (OGBA) '),
(698, 25, ' Ikeja (OPEBI) '),
(699, 25, ' Ikeja (computer village '),
(700, 25, ' Ikorodu (Agbowa) '),
(701, 25, ' Ikorodu(Ogolonto) '),
(702, 25, ' Ikoyi (Awolowo Road) '),
(703, 25, ' Ikoyi (Bourdillon) '),
(704, 25, ' Ikoyi (Dolphin) '),
(705, 25, ' Ikoyi (Glover road) '),
(706, 25, ' Ikoyi (Keffi) '),
(707, 25, ' Ikoyi (Kings way road) '),
(708, 25, ' Ikoyi (Obalende) '),
(709, 25, ' Ikoyi (Queens Drive) '),
(710, 25, ' Ikoyi MTN (Golden Plaza) '),
(711, 25, ' Iyana Ipaja (Abesan) '),
(712, 25, ' Iyana Ipaja (Command Road) '),
(713, 25, ' Iyana Ipaja (Egbeda) '),
(714, 25, ' Iyana Ipaja (Ikola Road) '),
(715, 25, ' Iyana Ipaja (Iyana Ipaja Road) '),
(716, 25, ' Iyana Ipaja (Shasha '),
(717, 25, ' JAKANDE '),
(718, 25, ' KETU'),
(719, 25, ' LAKOWE '),
(720, 25, ' LANGBASA '),
(721, 25, ' Lagos Island (Adeniji) '),
(722, 25, ' Lagos Island (Marina) '),
(723, 25, ' Lagos Island (Onikan) '),
(724, 25, ' Lagos Island (Sura) '),
(725, 25, ' Lagos Island (TBS) '),
(726, 25, ' Lekki Phase 1 (Admiralty Road) '),
(727, 25, ' Lekki Phase 1 (Admiralty way) '),
(728, 25, ' Lekki Phase 1 (Bishop Durosimi Etim) '),
(729, 25, ' Lekki Phase 1 (F.T Kuboye street '),
(730, 25, ' Lekki Phase 1 (Fola Osibo) '),
(731, 25, ' Lekki Phase 1 (Omorinre Johnson) '),
(732, 25, ' MAGODO '),
(733, 25, ' MARUWA '),
(734, 25, ' MARYLAND '),
(735, 25, ' MEBANMU9 '),
(736, 25, ' MILE 12 '),
(737, 25, ' MILE 2 '),
(738, 25, ' MUSHIN '),
(739, 25, ' OBADORE '),
(740, 25, ' OGOMBO '),
(741, 25, ' OGUDU '),
(742, 25, ' OJO '),
(743, 25, ' OJO-AFROMEDIA '),
(744, 25, ' OJO-AJAGBANDI '),
(745, 25, ' OJO-MILITARY CANTONMENT '),
(746, 25, ' OJODU '),
(747, 25, ' OJOKORO '),
(748, 25, ' OJOTA '),
(749, 25, ' OKOKOMAIKO '),
(750, 25, ' OKOTA '),
(751, 25, ' ONIRU ESTATE '),
(752, 25, ' OREGUN '),
(753, 25, ' ORILE '),
(754, 25, ' OSAPA (LEKKI) '),
(755, 25, ' OSHODI-BOLADE '),
(756, 25, ' OSHODI-ISOLO '),
(757, 25, ' OSHODI-MAFOLUKU '),
(758, 25, ' OSHODI-ORILE '),
(759, 25, ' OSHODI-SHOGUNLE '),
(760, 25, ' Odongunyan '),
(761, 25, ' Odunade '),
(762, 25, ' Omole Phase 1 '),
(763, 25, ' Omole Phase 2 '),
(764, 25, ' Oreyo- Igbe '),
(765, 25, ' Owode Onirin '),
(766, 25, ' SANGOTEDO (LEKKI) '),
(767, 25, ' SATELLITE TOWN '),
(768, 25, ' SEME8 '),
(769, 25, ' SOMOLU '),
(770, 25, ' Sari-Iganmu '),
(771, 25, ' Surulere (Adeniran Ogunsanya) '),
(772, 25, ' Surulere (Aguda) '),
(773, 25, ' Surulere (Bode Thomas) '),
(774, 25, ' Surulere (Fatia Shitta) '),
(775, 25, ' Surulere (Idi Araba) '),
(776, 25, ' Surulere (Ijesha) '),
(777, 25, ' Surulere (Iponri) '),
(778, 25, ' Surulere (Itire) '),
(779, 25, ' Surulere (Lawanson) '),
(780, 25, ' Surulere (Masha) '),
(781, 25, ' Surulere (Ogunlana drive) '),
(782, 25, ' Surulere (Ojuelegba) '),
(783, 25, ' TOPO '),
(784, 25, ' TRADE FAIR '),
(785, 25, ' VGC '),
(786, 25, ' Victoria Island (Adeola Odeku) '),
(787, 25, ' Victoria Island (Adetokunbo Ademola) '),
(788, 25, ' Victoria Island (Ahmed Bello way) '),
(789, 25, ' Victoria Island (Ajose Adeogun) '),
(790, 25, ' Victoria Island (Akin Adeshola) '),
(791, 25, ' Victoria Island (Bishop Oluwale) '),
(792, 25, ' Victoria Island (Kofo Abayomi) '),
(793, 25, ' Victoria Island (Yusuf Abiodun) '),
(794, 25, ' YABA '),
(795, 25, ' YABA-UNILAG '),
(796, 25, ' YABATECH '),
(797, 26, ' AKWANGA '),
(798, 26, ' DOMA '),
(799, 26, ' KEFFI '),
(800, 26, ' LAFIA '),
(801, 26, ' LAFIA-CENTRAL LOCATIONS '),
(802, 26, ' MASAKA '),
(803, 26, ' NEW KARU '),
(804, 26, ' WAMBA '),
(805, 27, ' AGAI '),
(806, 27, ' BADDEGI '),
(807, 27, ' BIDA '),
(808, 27, ' KONTAGORA '),
(809, 27, ' LAPAI '),
(810, 27, ' MADALA '),
(811, 27, ' MINNA '),
(812, 27, ' MINNA-CENTRAL LOCATIONS '),
(813, 27, ' SULEJA '),
(814, 27, ' ZUBA '),
(815, 28, ' ABEOKUTA-ABIOLA WAY '),
(816, 28, ' ABEOKUTA-ADATAN '),
(817, 28, ' ABEOKUTA-ADEDOTUN '),
(818, 28, ' ABEOKUTA-ADIGBE8 '),
(819, 28, ' ABEOKUTA-AGO IBA9 '),
(820, 28, ' ABEOKUTA-AGO IKA '),
(821, 28, ' ABEOKUTA-AGO OKO '),
(822, 28, ' ABEOKUTA-AKE '),
(823, 28, ' ABEOKUTA-AKIN OLUGBADE '),
(824, 28, ' ABEOKUTA-ALABATA '),
(825, 28, ' ABEOKUTA-ASHERO '),
(826, 28, ' ABEOKUTA-BODE OLUDE '),
(827, 28, ' ABEOKUTA-BREWERY '),
(828, 28, ' ABEOKUTA-CAMP '),
(829, 28, ' ABEOKUTA-ELEGA '),
(830, 28, ' ABEOKUTA-ELEWE ERAN '),
(831, 28, ' ABEOKUTA-FAJOL '),
(832, 28, ' ABEOKUTA-FEDERAL HOUSING ESTATE '),
(833, 28, ' ABEOKUTA-GRAMMAR SCHOOL '),
(834, 28, ' ABEOKUTA-IBARA '),
(835, 28, ' ABEOKUTA-IBARA HOUSING ESTATE '),
(836, 28, ' ABEOKUTA-IDI ABA '),
(837, 28, ' ABEOKUTA-IJAYE '),
(838, 28, ' ABEOKUTA-IJEMO '),
(839, 28, ' ABEOKUTA-ISABO '),
(840, 28, ' ABEOKUTA-ISALE AKE '),
(841, 28, ' ABEOKUTA-ISALE IGBEIN '),
(842, 28, ' ABEOKUTA-ITA EKO '),
(843, 28, ' ABEOKUTA-ITA OSHIN '),
(844, 28, ' ABEOKUTA-ITOKU '),
(845, 28, ' ABEOKUTA-IYANA MOTUARY '),
(846, 28, ' ABEOKUTA-KUTO '),
(847, 28, ' ABEOKUTA-LAFENWA '),
(848, 28, ' ABEOKUTA-LEME '),
(849, 28, ' ABEOKUTA-MEGA STATION '),
(850, 28, ' ABEOKUTA-MOKOLA '),
(851, 28, ' ABEOKUTA-MOORE JUNCTION '),
(852, 28, ' ABEOKUTA-MTD '),
(853, 28, ' ABEOKUTA-NEPA ROAD '),
(854, 28, ' ABEOKUTA-OBANTOKO '),
(855, 28, ' ABEOKUTA-ODO OYO '),
(856, 28, ' ABEOKUTA-OJERE '),
(857, 28, ' ABEOKUTA-OKE ILEWO '),
(858, 28, ' ABEOKUTA-OKE IYEKE '),
(859, 28, ' ABEOKUTA-OKE MOSAN '),
(860, 28, ' ABEOKUTA-OLOMOORE '),
(861, 28, ' ABEOKUTA-OLORUNSOGO '),
(862, 28, ' ABEOKUTA-OLUWO '),
(863, 28, ' ABEOKUTA-OMIDA '),
(864, 28, ' ABEOKUTA-ONICOLOBO '),
(865, 28, ' ABEOKUTA-OSIELE '),
(866, 28, ' ABEOKUTA-PANSEKE '),
(867, 28, ' ABEOKUTA-QUARRY ROAD '),
(868, 28, ' ABEOKUTA-SAJE '),
(869, 28, ' ABEOKUTA-SAPON '),
(870, 28, ' ABEOKUTA-SOKORI '),
(871, 28, ' ABEOKUTA-TOTORO '),
(872, 28, ' AGBARA INDUSTRIAL ESTATE (Ogun) '),
(873, 28, ' AGO IWOYE '),
(874, 28, ' AJEGUNLE '),
(875, 28, ' AKUTE '),
(876, 28, ' ALAGBADO '),
(877, 28, ' AWODE APA '),
(878, 28, ' EWEKORO/ WAPCO '),
(879, 28, ' IJEBU IFE '),
(880, 28, ' IJEBU IGBO '),
(881, 28, ' IJEBU ODE-CENTRAL LOCATIONS '),
(882, 28, ' IMAGBON '),
(883, 28, ' ITELE (Ijebu) '),
(884, 28, ' ITELE (Ota) '),
(885, 28, ' IWUOPIN '),
(886, 28, ' KOBAPE '),
(887, 28, ' MOSIMI/WAPCO '),
(888, 28, ' OBA '),
(889, 28, ' OBADA '),
(890, 28, ' ODEDA '),
(891, 28, ' OGIJO '),
(892, 28, ' OGUN-Aiyepe '),
(893, 28, ' OGUN-Ikenne-Remo '),
(894, 28, ' OGUN-Ilishan-Remo '),
(895, 28, ' OGUN-Iperu-Remo '),
(896, 28, ' OGUN-Isara '),
(897, 28, ' OGUN-Ope '),
(898, 28, ' OGUN-Sagamu-Remo '),
(899, 28, ' OKE ATA '),
(900, 28, ' ORU '),
(901, 28, ' OTTA TOWN '),
(902, 28, ' REDEEMED CAMP '),
(903, 28, ' SANGO OTTA '),
(904, 28, ' WASIMI '),
(905, 29, ' AKURE '),
(906, 29, ' AKURE-CENTRAL LOCATIONS '),
(907, 29, ' ALA ST '),
(908, 29, ' ALAGBAKA '),
(909, 29, ' FUTA '),
(910, 29, ' IGBATORO ROAD '),
(911, 29, ' IGBOKODA '),
(912, 29, ' IJAPO ESTATE '),
(913, 29, ' IJOKA ROAD '),
(914, 29, ' OBA ILE '),
(915, 29, ' OLUWATUYI ROAD '),
(916, 29, ' ONDO ROAD '),
(917, 29, ' ONDO TOWN '),
(918, 29, ' ORE '),
(919, 29, ' ORITA OBELE '),
(920, 29, ' OSHINLE QUARTERS '),
(921, 29, ' OWENA '),
(922, 29, ' OYEMEKUN ROAD '),
(923, 30, ' ARAKEJI '),
(924, 30, ' EDE '),
(925, 30, ' EJIGBO (Osun) '),
(926, 30, ' ESAOKE '),
(927, 30, ' IFE '),
(928, 30, ' IJEBU-JESA '),
(929, 30, ' IKIRE '),
(930, 30, ' IKIRUN '),
(931, 30, ' ILA '),
(932, 30, ' ILA-ORANGUN '),
(933, 30, ' ILE-IFE '),
(935, 30, ' ILESHA '),
(936, 30, ' ILOKO '),
(937, 30, ' IREE '),
(938, 30, ' IWO (Osun) '),
(939, 30, ' OKUKU '),
(940, 30, ' OSHOGBO-CENTRAL LOCATIONS '),
(941, 30, ' OSOGBO '),
(942, 31, ' AKINYELE '),
(943, 31, ' ALOMOJA '),
(944, 31, ' APETE '),
(945, 31, ' EGBEDA (Oyo) '),
(946, 31, ' ERUWA '),
(947, 31, ' GOSPEL TOWN '),
(948, 31, ' IBADAN-7UP '),
(949, 31, ' IBADAN-ADAMASINGBA '),
(950, 31, ' IBADAN-AGODI GATE '),
(951, 31, ' IBADAN-AKOBO '),
(952, 31, ' IBADAN-ALAKIA '),
(953, 31, ' IBADAN-ANTHONY VILLAGE '),
(954, 31, ' IBADAN-APATA '),
(955, 31, ' IBADAN-ARAPAJA '),
(956, 31, ' IBADAN-ASHIPA '),
(957, 31, ' IBADAN-BASHORUN '),
(958, 31, ' IBADAN-BODIJA '),
(959, 31, ' IBADAN-CHALLENGE '),
(960, 31, ' IBADAN-DALUTE '),
(961, 31, ' IBADAN-DUGBE '),
(962, 31, ' IBADAN-ELEBU '),
(963, 31, ' IBADAN-ELEBU OJA '),
(964, 31, ' IBADAN-ELEYELE '),
(965, 31, ' IBADAN-FELELE '),
(966, 31, ' IBADAN-IDI APE '),
(967, 31, ' IBADAN-IDI-IROKO '),
(968, 31, ' IBADAN-IITA '),
(969, 31, ' IBADAN-IKOLABA '),
(970, 31, ' IBADAN-IWO ROAD '),
(971, 31, ' IBADAN-IYAGANKU -GRA '),
(972, 31, ' IBADAN-JERICHO '),
(973, 31, ' IBADAN-MOKOLA '),
(974, 31, ' IBADAN-MOLETE '),
(975, 31, ' IBADAN-NEW GARAGE '),
(976, 31, ' IBADAN-NEW GBAGI MARKET '),
(977, 31, ' IBADAN-NISER '),
(978, 31, ' IBADAN-NNPC '),
(979, 31, ' IBADAN-ODO-ONA ELEWE '),
(980, 31, ' IBADAN-OJE '),
(981, 31, ' IBADAN-OJOO '),
(982, 31, ' IBADAN-OKE-ADO '),
(983, 31, ' IBADAN-OKE-BOLA>IBADAN-OKE-BOLA</option><option value= '),
(984, 31, ' IBADAN-OLUYOLE '),
(985, 31, ' IBADAN-OMI ADIO '),
(986, 31, ' IBADAN-OROGUN '),
(987, 31, ' IBADAN-P&G '),
(988, 31, ' IBADAN-PODO '),
(989, 31, ' IBADAN-POOLA '),
(990, 31, ' IBADAN-RING ROAD '),
(991, 31, ' IBADAN-SANGO '),
(992, 31, ' IBADAN-SECRATARIAT '),
(993, 31, ' IBADAN-TIPPER GARAGE '),
(994, 31, ' IBADAN-TOLL GATE '),
(995, 31, ' IBADAN-UCH '),
(996, 31, ' IBADAN-UNIVERSITY OF IBADAN '),
(997, 31, ' IBADAN-YEMETU '),
(998, 31, ' IDI IROKO '),
(999, 31, ' IGBO OLOYIN '),
(1000, 31, ' ISEBO '),
(1001, 31, ' ISEYIN '),
(1002, 31, ' IWO (Oyo) '),
(1003, 31, ' IYANA CHURCH '),
(1004, 31, ' LALUPON '),
(1005, 31, ' LANLATE '),
(1006, 31, ' MONIYA '),
(1007, 31, ' OGBOMOSO '),
(1008, 31, ' OLOGUN-ERU '),
(1009, 31, ' OWODE-OYO '),
(1010, 31, ' OYO TOWN '),
(1011, 31, ' SAGBE '),
(1012, 32, ' BARIKIN LADI '),
(1013, 32, ' HAIPANG '),
(1014, 32, ' JOS '),
(1015, 32, ' JOS-CENTRAL LOCATIONS '),
(1016, 32, ' KURU '),
(1017, 32, ' KURU JANTER '),
(1018, 32, ' RIYOM '),
(1019, 32, ' VOM '),
(1020, 32, ' ZAWAN '),
(1021, 33, ' ABHONEMA '),
(1022, 33, ' AHOADA '),
(1023, 33, ' AIRPORT ROAD - PORT HARCOURT '),
(1024, 33, ' BONNY ISLAND-CENTRAL LOCATIONS '),
(1025, 33, ' ELELE '),
(1026, 33, ' ELEME-AGBONCHIA '),
(1027, 33, ' ELEME-AKPAJO '),
(1028, 33, ' ELEME-ALESA '),
(1029, 33, ' ELEME-ALETO '),
(1030, 33, ' ELEME-ALODE '),
(1031, 33, ' ELEME-EBUBU '),
(1032, 33, ' ELEME-EKPORO '),
(1033, 33, ' ELEME-ETEO '),
(1034, 33, ' ELEME-NCHIA '),
(1035, 33, ' ELEME-ODIDO '),
(1036, 33, ' ELEME-OGALE '),
(1037, 33, ' ELEME-ONNE '),
(1038, 33, ' EMOUHA '),
(1039, 33, ' ETCHE '),
(1040, 33, ' FMCG-PHPHPHPH STATION '),
(1041, 33, ' GOKANA '),
(1042, 33, ' IGWURUTA '),
(1043, 33, ' ISIOKPO '),
(1044, 33, ' OKRIKA-ABAM â€“ AMA II '),
(1045, 33, ' OKRIKA-ABULOME '),
(1046, 33, ' OKRIKA-BOLO TOWN '),
(1047, 33, ' OKRIKA-DIKIBOAMA '),
(1048, 33, ' OKRIKA-EKEREKANA '),
(1049, 33, ' OKRIKA-GEORGE -AMA '),
(1050, 33, ' OKRIKA-IBAKA '),
(1051, 33, ' OKRIKA-IBAKA TOWN '),
(1052, 33, ' OKRIKA-IBULUY-DIKIBOAMA '),
(1053, 33, ' OKRIKA-IKIRIKOAMA '),
(1054, 33, ' OKRIKA-KALIO -AMA '),
(1055, 33, ' OKRIKA-KONIJU TOWN '),
(1056, 33, ' OKRIKA-NDUBUSIAMA '),
(1057, 33, ' OKRIKA-OBA â€“ AMA '),
(1058, 33, ' OKRIKA-OBIARIME -AMA '),
(1059, 33, ' OKRIKA-OGAN-AMA '),
(1060, 33, ' OKRIKA-OGBOGBO '),
(1061, 33, ' OKRIKA-OGBOGBO TOWN '),
(1062, 33, ' OKRIKA-OGU TOWN '),
(1063, 33, ' OKRIKA-OKIRIKA TOWN '),
(1064, 33, ' OKRIKA-OKOCHIRI '),
(1065, 33, ' OKRIKA-OKRIKA TOWN(KIRIKE) '),
(1066, 33, ' OKRIKA-OKUJAGU AMA '),
(1067, 33, ' OKRIKA-OKUMGBA -AMA '),
(1068, 33, ' OMAGWA '),
(1069, 33, ' OMOKU '),
(1070, 33, ' OYIGBO-AFAM '),
(1071, 33, ' OYIGBO-EGBERU '),
(1072, 33, ' OYIGBO-IZUOMA '),
(1073, 33, ' OYIGBO-KOMKOM '),
(1074, 33, ' OYIGBO-MIRINWANYI '),
(1075, 33, ' OYIGBO-NDOKI '),
(1076, 33, ' OYIGBO-OBEAMA '),
(1077, 33, ' OYIGBO-UMUAGBAI '),
(1078, 33, ' PORTHARCOURT-ABO AMA '),
(1079, 33, ' PORTHARCOURT-ABONNEMA TOWN '),
(1080, 33, ' PORTHARCOURT-ABONNEMA WHARF '),
(1081, 33, ' PORTHARCOURT-ABULOMA '),
(1082, 33, ' PORTHARCOURT-ADA GEORGE '),
(1083, 33, ' PORTHARCOURT-AGIP '),
(1084, 33, ' PORTHARCOURT-AHODA '),
(1085, 33, ' PORTHARCOURT-AKPAJO '),
(1086, 33, ' PORTHARCOURT-ALAKAHIA '),
(1087, 33, ' PORTHARCOURT-AMADI AMA '),
(1088, 33, ' PORTHARCOURT-AYA-OGOLOGO '),
(1089, 33, ' PORTHARCOURT-AZUBIE '),
(1090, 33, ' PORTHARCOURT-BAKANA '),
(1091, 33, ' PORTHARCOURT-BONNY '),
(1092, 33, 'PORT HARCOURT-BORI 1'),
(1093, 33, ' PORTHARCOURT-BORI CAMP '),
(1094, 33, ' PORTHARCOURT-BOROKIRI '),
(1095, 33, ' PORTHARCOURT-BUGUMA '),
(1096, 33, ' PORTHARCOURT-BUNDU AMA '),
(1097, 33, ' PORTHARCOURT-BUNDU WATERSIDE '),
(1098, 33, ' PORTHARCOURT-CHOBA '),
(1099, 33, ' PORTHARCOURT-CHURCHHILL '),
(1100, 33, ' PORTHARCOURT-D/LINE '),
(1101, 33, ' PORTHARCOURT-DARICK POLO '),
(1102, 33, ' PORTHARCOURT-DEGEMA '),
(1103, 33, ' PORTHARCOURT-DIOBU '),
(1104, 33, ' PORTHARCOURT-EAGLE ISLAND '),
(1105, 33, ' PORTHARCOURT-EGBELU '),
(1106, 33, ' PORTHARCOURT-ELEKAHIA '),
(1107, 33, ' PORTHARCOURT-ELELEWON '),
(1108, 33, ' PORTHARCOURT-ELIBOLO '),
(1109, 33, ' PORTHARCOURT-ELIGBAM '),
(1110, 33, ' PORTHARCOURT-ELIMBU '),
(1111, 33, ' PORTHARCOURT-ELIMGBU '),
(1112, 33, ' PORTHARCOURT-ELINPARAWON '),
(1114, 33, ' PORTHARCOURT-ELIOHANI '),
(1115, 33, ' PORTHARCOURT-ENEKA '),
(1116, 33, ' PORTHARCOURT-GOKANA '),
(1117, 33, ' PORTHARCOURT-IGBO ETCHE '),
(1118, 33, ' PORTHARCOURT-IGRITA '),
(1119, 33, ' PORTHARCOURT-IGWURUTA '),
(1120, 33, ' PORTHARCOURT-INTELS KM 16 '),
(1121, 33, ' PORTHARCOURT-MARINE BASE '),
(1122, 33, ' PORTHARCOURT-MGBUOBA '),
(1123, 33, ' PORTHARCOURT-MILE 1 '),
(1124, 33, ' PORTHARCOURT-MILE 2 '),
(1125, 33, ' PORTHARCOURT-MILE 3 '),
(1126, 33, ' PORTHARCOURT-MILE 4 '),
(1127, 33, ' PORTHARCOURT-MILE 5 '),
(1128, 33, ' PORTHARCOURT-MUGBUOSIMINI '),
(1129, 33, ' PORTHARCOURT-NEW GRA '),
(1130, 33, ' PORTHARCOURT-NEW GRA -PHASE 1 2 3 4 '),
(1131, 33, ' PORTHARCOURT-NKPOGU '),
(1132, 33, ' PORTHARCOURT-NKPOLU '),
(1133, 33, ' PORTHARCOURT-NPA WHARF '),
(1134, 33, ' PORTHARCOURT-OGBATAI '),
(1135, 33, ' PORTHARCOURT-OGBOGORO '),
(1136, 33, ' PORTHARCOURT-OGBUNABALI '),
(1137, 33, ' PORTHARCOURT-OGINIGBA '),
(1138, 33, ' PORTHARCOURT-OKPORO ROAD '),
(1139, 33, ' PORTHARCOURT-OKURU '),
(1140, 33, ' PORTHARCOURT-OLD GRA '),
(1141, 33, ' PORTHARCOURT-OMAGWA '),
(1142, 33, ' PORTHARCOURT-OMOKU '),
(1143, 33, ' PORTHARCOURT-ORAZI '),
(1144, 33, ' PORTHARCOURT-OZUBOKO '),
(1145, 33, ' PORTHARCOURT-PIPELINE '),
(1146, 33, ' PORTHARCOURT-RECLAMATION '),
(1147, 33, ' PORTHARCOURT-RUMEME '),
(1148, 33, ' PORTHARCOURT-RUMUAGHAOLU '),
(1149, 33, ' PORTHARCOURT-RUMUAKPAKOLOSI '),
(1150, 33, ' PORTHARCOURT-RUMUDARA '),
(1151, 33, ' PORTHARCOURT-RUMUEPIRIKOM '),
(1152, 33, ' PORTHARCOURT-RUMUEVOLU '),
(1153, 33, ' PORTHARCOURT-RUMUIBEKWE '),
(1154, 33, ' PORTHARCOURT-RUMUIGBO '),
(1155, 33, ' PORTHARCOURT-RUMUKALAGBOR '),
(1156, 33, ' PORTHARCOURT-RUMUKRUSHI '),
(1157, 33, ' PORTHARCOURT-RUMUMASI '),
(1158, 33, ' PORTHARCOURT-RUMUODUMAYA '),
(1159, 33, ' PORTHARCOURT-RUMUOGBA '),
(1160, 33, ' PORTHARCOURT-RUMUOKE '),
(1161, 33, ' PORTHARCOURT-RUMUOKORO '),
(1162, 33, ' PORTHARCOURT-RUMUOKWUTA '),
(1163, 33, ' PORTHARCOURT-RUMUOLA '),
(1164, 33, ' PORTHARCOURT-RUMUOLUMENI '),
(1165, 33, ' PORTHARCOURT-RUMUOROSI '),
(1166, 33, ' PORTHARCOURT-RUMUOWAH '),
(1167, 33, ' PORTHARCOURT-STADIUM ROAD '),
(1168, 33, ' PORTHARCOURT-TAI '),
(1169, 33, ' PORTHARCOURT-TOWN '),
(1170, 33, ' PORTHARCOURT-TRANS AMADI '),
(1171, 33, ' PORTHARCOURT-UBE SANDFILLED '),
(1172, 33, ' PORTHARCOURT-UMUROLU '),
(1173, 33, ' PORTHARCOURT-WOJI '),
(1174, 33, ' RUMUAGHOLU '),
(1175, 33, ' RUMUODUOMAYA '),
(1176, 34, ' SOKOTO TOWN-CENTRAL LOCATIONS '),
(1177, 34, ' SOKOTO/GUSAU '),
(1178, 35, ' JALINGO'),
(1179, 35, ' ZING '),
(1180, 36, ' DAMATURU '),
(1181, 36, ' GAKIGANA '),
(1182, 36, ' POTISKUM '),
(1183, 37, ' GUSAU '),
(1184, 37, ' TALATA MAFARA ');

-- --------------------------------------------------------

--
-- Table structure for table `rejadmin`
--

CREATE TABLE `rejadmin` (
  `id` int(11) NOT NULL,
  `fn` varchar(20) NOT NULL,
  `mn` varchar(20) NOT NULL,
  `ln` varchar(20) NOT NULL,
  `ge` varchar(20) NOT NULL,
  `ag` varchar(20) NOT NULL,
  `ad` varchar(120) NOT NULL,
  `st` varchar(20) NOT NULL,
  `re` varchar(20) NOT NULL,
  `tk` varchar(64) NOT NULL,
  `pn` varchar(20) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `quali` varchar(20) NOT NULL,
  `quali2` varchar(20) NOT NULL,
  `sn` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `img` varchar(225) NOT NULL,
  `de` int(11) NOT NULL,
  `log` varchar(60) NOT NULL,
  `pe1` int(11) NOT NULL,
  `pe2` int(11) NOT NULL,
  `pe3` int(11) NOT NULL,
  `pe4` int(11) NOT NULL,
  `pe5` int(11) NOT NULL,
  `pe6` int(11) NOT NULL,
  `pe7` int(11) NOT NULL,
  `al` int(11) NOT NULL,
  `about` text NOT NULL,
  `conf` int(11) NOT NULL,
  `confd` varchar(40) NOT NULL,
  `ap` int(11) NOT NULL,
  `pach` int(11) NOT NULL,
  `paup` int(11) NOT NULL,
  `pachdate` varchar(40) NOT NULL,
  `cvimg` varchar(225) NOT NULL,
  `ecrtimg` varchar(225) NOT NULL,
  `ppw` varchar(200) NOT NULL,
  `rep` varchar(200) NOT NULL,
  `bkid` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejadmin`
--

INSERT INTO `rejadmin` (`id`, `fn`, `mn`, `ln`, `ge`, `ag`, `ad`, `st`, `re`, `tk`, `pn`, `email`, `password`, `salt`, `quali`, `quali2`, `sn`, `date`, `time`, `img`, `de`, `log`, `pe1`, `pe2`, `pe3`, `pe4`, `pe5`, `pe6`, `pe7`, `al`, `about`, `conf`, `confd`, `ap`, `pach`, `paup`, `pachdate`, `cvimg`, `ecrtimg`, `ppw`, `rep`, `bkid`) VALUES
(12, 'abel', 'gangra', 'homes', 'Male', '30-06-1999', '123, island avenue gbagada ogbada', 'lagos', 'Nigeria', 'tomato.jpeg', '08158304888', 'turky@gmail.com', '382d23d5e393b2501cd2612895c438ad9467ee919becd2a32b2abe2910b1090e', 'gŽó¸Ý˜^êÿO…#¹¬e[WÇ÷ÄwŒšÎ|©]„uøz', 'B.Sc', 'php writer', '5 yrears', 'Mon Mar 2018 ', '00:02:50', '', 3, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, 0, 0, '', 'tomato.jpeg', 'tomato.jpeg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rejected`
--

CREATE TABLE `rejected` (
  `id` int(11) NOT NULL,
  `ca` varchar(120) NOT NULL,
  `su` varchar(120) NOT NULL,
  `na` varchar(200) NOT NULL,
  `ty` varchar(200) NOT NULL,
  `co` varchar(300) NOT NULL,
  `ma` float NOT NULL,
  `pi` int(11) NOT NULL,
  `ml` float NOT NULL,
  `ms` float NOT NULL,
  `wo` float NOT NULL,
  `am` float NOT NULL,
  `twa` float NOT NULL,
  `ia` float NOT NULL,
  `gi1` varchar(64) NOT NULL,
  `gi2` varchar(64) NOT NULL,
  `gi3` varchar(64) NOT NULL,
  `gi4` varchar(64) NOT NULL,
  `de` text NOT NULL,
  `cd` text NOT NULL,
  `up` text NOT NULL,
  `puvc` varchar(20) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `da` int(20) NOT NULL,
  `ti` int(20) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `ps` int(11) NOT NULL,
  `pr` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `ws` int(11) NOT NULL,
  `wr` int(11) NOT NULL,
  `conf` int(11) NOT NULL,
  `ptr` int(11) NOT NULL,
  `ap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejected`
--

INSERT INTO `rejected` (`id`, `ca`, `su`, `na`, `ty`, `co`, `ma`, `pi`, `ml`, `ms`, `wo`, `am`, `twa`, `ia`, `gi1`, `gi2`, `gi3`, `gi4`, `de`, `cd`, `up`, `puvc`, `batch`, `da`, `ti`, `pid`, `ps`, `pr`, `wid`, `ws`, `wr`, `conf`, `ptr`, `ap`) VALUES
(6, 'dairy', 'milk', 'holandia peak milk', 'fresh', 'tin', 0.07, 20, 0.06, 0.0134, 7, 150, 15000, 150, 'n05euhs9d9RY7rddtfd9961Wi9aEo0Twio2m22qnbkd43323dgbScAc.jpeg', 'n05euhs9d9RY7rddtfd9961Wi9aEo0Twio2m22qnbkd43323dgbScAc.jpeg', 'n05euhs9d9RY7rddtfd9961Wi9aEo0Twio2m22qnbkd43323dgbScAc.jpeg', 'n05euhs9d9RY7rddtfd9961Wi9aEo0Twio2m22qnbkd43323dgbScAc.jpeg', 'Hollandia can milk is a pasteurized milk confirmed by NAFDDAC for safety consumptio.it has it Expiring date display of the can in the image can as well container', 'store in cool dry play in Hamarade store', 'all part remain the same as the initial condition', '15aIcvSLeE7', 'LWQCZGSRJXDaKefPcUIFHOTYBMbNEdVA', 1545519600, 1545555693, 'f3058714269', 2, 5, 3, 2, 5, 0, 0, 11),
(22, 'oil', 'olive', 'indiana oive iol', 'fresh', 'tin', 0.07, 0, 0, 0, 7, 150, 15000, 150, 'ngnT32d04qed21td2c3AYd9r99i9S5REbkhoo670d3W9fiwmdsc2uba.jpeg', 'ngnT32d04qed21td2c3AYd9r99i9S5REbkhoo670d3W9fiwmdsc2uba.jpeg', 'ngnT32d04qed21td2c3AYd9r99i9S5REbkhoo670d3W9fiwmdsc2uba.jpeg', 'ngnT32d04qed21td2c3AYd9r99i9S5REbkhoo670d3W9fiwmdsc2uba.jpeg', 'Hollandia can milk is a pasteurized milk confirmed by NAFDDAC for safety consumptio.it has it Expiring date display of the can in the image ', 'store in cool dry play in Hamarade store', 'all part remain the same as the initial condition', '15aIcvSLeff', 'OKQ95CBRUMSJIWG@LVTP#HF2306ND4AE', 1545519600, 1545555693, 'f3058714269', 2, 5, 3, 2, 5, 0, 0, 0),
(102, 'fruits', 'apple', 'Red apple', 'Fried', 'Create', 400, 0, 0, 0, 4000, 1200, 12000, 1200, 'nVriH4nAdi9H.jpg', 'Y3dAHcocj9Gd.jpg', '', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Mon 15 Apr 2019 uploaded by  azFarmex. ', '', '', '24gaq5PSVoiw', 'Ccur2fJVgOME1RSGo9HI57QjwnveNKqk8FytamYXTdZWxbP3Lspl0B6AU4zhDi', 1555106400, 1555182985, 'a5326790814', 12, 205, 24, 12, 205, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rejectedagg`
--

CREATE TABLE `rejectedagg` (
  `id` int(11) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `agid` varchar(200) NOT NULL,
  `fn` varchar(150) NOT NULL,
  `mn` varchar(150) NOT NULL,
  `ln` varchar(150) NOT NULL,
  `ge` varchar(50) NOT NULL,
  `ag` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `bn` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `state` varchar(120) NOT NULL,
  `location` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `img` varchar(224) NOT NULL,
  `joined` int(200) NOT NULL,
  `regday` int(11) NOT NULL,
  `grp` int(11) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(222) NOT NULL,
  `pt` varchar(50) NOT NULL,
  `tk` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `log` int(11) NOT NULL,
  `puvc` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(40) NOT NULL,
  `conf` int(11) NOT NULL,
  `confd` varchar(40) NOT NULL,
  `ap` int(11) NOT NULL,
  `gn` varchar(200) NOT NULL,
  `gemail` varchar(220) NOT NULL,
  `gpn` varchar(30) NOT NULL,
  `gmi` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedagg`
--

INSERT INTO `rejectedagg` (`id`, `pid`, `agid`, `fn`, `mn`, `ln`, `ge`, `ag`, `email`, `bn`, `password`, `salt`, `state`, `location`, `address`, `telephone`, `img`, `joined`, `regday`, `grp`, `bk`, `bkid`, `pt`, `tk`, `time`, `log`, `puvc`, `about`, `sn`, `conf`, `confd`, `ap`, `gn`, `gemail`, `gpn`, `gmi`) VALUES
(2, '', '', '', '', '', 'banana ', '', 'banana@gmail.com', 'bablo500', '044aeb389fe9576f88357dee004d7b3504af4c5a377131afff64cbf841ed1abb', 'ªó™˜±¦_\"ãƒðÅgYå…ºmJÉTX½3', '', '114, YEJIDEROAD ', '144, alien avenue', '08064374026', 'purple-grapes-vineyard-napa-valley-napa-vineyard-39511.jpeg', 1546190809, 0, 0, 1, 'sCroeBmFEGqApHD', '', '4c911c25bd6e8cfb1887ad471fe7c1c6', '', 1546181766, '', '', '', 0, '1550185200', 19, '', '', '', ''),
(27, 'a0425378916', '', 'ade', 'adelani', 'adewunmi', 'Male', '78', 'adioadeyoriazeez@yahoo.com', 'adeyes', '951f51abb3493a0ecd72d35553c99013c1ed2463b2e487c6babd8f80a13a5444', 'ñÿè::õIN ,D¼¨åk#9 mÕ–Åk·1‹rÈB', '3', '15', '122 adeyemo layout ekiti', '08078976567', 'g6ndhSbP12YA.jpg', 1554834958, 1554834958, 1, 1, 'DEqmFGpHCroAeBs', '', '83405bab440ed8ef180d1adcf3e8d991', '1554802558', 1555049018, '', '', '', 0, '', 0, 'ademola', 'ademo@gmail.com', '08097676545', '0ARm5n1Ag4ce.jpg'),
(29, 'a0425378934', '', 'aderemin', 'adin', 'ade', 'Male', '77', 'adioaginiz@yahoo.com', 'adeyestyrufsfx', '951f51abb3493a0ecd72d35553c99013c1ed2463b2e487c6babd8f80a13a5444', 'ñÿè::õIN ,D¼¨åk#9 mÕ–Åk·1‹rÈB', '3', '15', '122 adeyemo layout ekiti', '08078976567', 'g6ndhSbP12YA.jpg', 1554834958, 1554834958, 1, 1, 'DEqmFGpHCroAeBs', '', '83405bab440ed8ef180d1adcf3e8d991', '1554802558', 1555049018, '', '', '', 0, '', 0, 'ademola', 'ademo@gmail.com', '08097676545', '0ARm5n1Ag4ce.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedfar`
--

CREATE TABLE `rejectedfar` (
  `id` int(11) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `agid` varchar(200) NOT NULL,
  `fn` varchar(150) NOT NULL,
  `mn` varchar(150) NOT NULL,
  `ln` varchar(150) NOT NULL,
  `ge` varchar(50) NOT NULL,
  `ag` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `bn` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `state` varchar(120) NOT NULL,
  `location` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `img` varchar(224) NOT NULL,
  `joined` int(200) NOT NULL,
  `regday` int(11) NOT NULL,
  `grp` int(11) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(222) NOT NULL,
  `pt` varchar(50) NOT NULL,
  `tk` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `log` int(11) NOT NULL,
  `puvc` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(40) NOT NULL,
  `conf` int(11) NOT NULL,
  `confd` varchar(40) NOT NULL,
  `ap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedfar`
--

INSERT INTO `rejectedfar` (`id`, `pid`, `agid`, `fn`, `mn`, `ln`, `ge`, `ag`, `email`, `bn`, `password`, `salt`, `state`, `location`, `address`, `telephone`, `img`, `joined`, `regday`, `grp`, `bk`, `bkid`, `pt`, `tk`, `time`, `log`, `puvc`, `about`, `sn`, `conf`, `confd`, `ap`) VALUES
(5, 'f6870915342', '', 'sdfdghg', 'fcvg', 'v n vn', 'Male', '-0', 'adioadeyoriazeez3@yahoo.com', 'abt-farms', '5c228abe56e0e655dbdc643e416ade07b7ad57f16b3a847f60f50f6c4fb6ea7d', 'Xó›è\"”rmñÒ•[óCn,ñP/i³_Œ®', '12', '167', '4344r4', '222222222222', 'eon07SKmWJVG.jpg', 1554843558, 1554842417, 1, 1, '', '', 'd0bcea723416400e31bd0ed34a7a4778', '1554810017', 1554933611, '', '', '', 0, '1555192800', 19),
(20, 'f3058714269', '', 'Adio', 'azeez', 'Adeyori', 'Male', '30', 'adioadeyoriazeez@gmail.com', 'azFarmex', 'ea62345ad0135533c8c145e329ec8978919d5af76d91e2acf3392e74721bc7bb', '£“©Ü]Œ:¥nió^šip&8WNÎVáø™¬Á£”', '11', 'ABAKALIKi', '7a, otunubi street off college road, haruna b/stop, ogba', '08064374020', 'qsnud1dm9EQf.png', 1546234532, 1546234532, 1, 1, 'AHCGorDFqBsEpem', '', '76a702a6727ae53f272125e92b5f370f', '1546288532', 1547886446, '7ak0HL1Ewm', 'Grandfather programmer, programmed for  80 years and still a programmer at 96', '09087654356', 0, '1547766000', 20);

-- --------------------------------------------------------

--
-- Table structure for table `rejectedlog`
--

CREATE TABLE `rejectedlog` (
  `log_id` int(11) NOT NULL,
  `company` varchar(50) NOT NULL,
  `bty` varchar(300) NOT NULL,
  `laddress` varchar(300) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(300) NOT NULL,
  `lloc` varchar(50) NOT NULL,
  `lstate` varchar(50) NOT NULL,
  `lcountry` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `joined` datetime NOT NULL,
  `conf` int(11) NOT NULL,
  `docconf` int(11) NOT NULL,
  `token` varchar(300) NOT NULL,
  `tokenconfirm` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `cac` varchar(30) NOT NULL,
  `cacexp` varchar(30) NOT NULL,
  `insimg` varchar(30) NOT NULL,
  `insexp` varchar(30) NOT NULL,
  `nafdac` varchar(30) NOT NULL,
  `nafexp` varchar(30) NOT NULL,
  `drif` varchar(30) NOT NULL,
  `drib` varchar(30) NOT NULL,
  `driexp` varchar(30) NOT NULL,
  `ideimg` varchar(30) NOT NULL,
  `img` varchar(30) NOT NULL,
  `passch` varchar(300) NOT NULL,
  `passconfirm` int(11) NOT NULL,
  `batch` varchar(220) NOT NULL,
  `ap` int(11) NOT NULL,
  `confd` int(20) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(222) NOT NULL,
  `upby` int(11) NOT NULL,
  `log` int(11) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedlog`
--

INSERT INTO `rejectedlog` (`log_id`, `company`, `bty`, `laddress`, `telephone`, `email`, `lloc`, `lstate`, `lcountry`, `password`, `salt`, `joined`, `conf`, `docconf`, `token`, `tokenconfirm`, `date`, `time`, `cac`, `cacexp`, `insimg`, `insexp`, `nafdac`, `nafexp`, `drif`, `drib`, `driexp`, `ideimg`, `img`, `passch`, `passconfirm`, `batch`, `ap`, `confd`, `bk`, `bkid`, `upby`, `log`, `about`, `sn`) VALUES
(9, 'nhl', 'Individual', 'wrewrererree', 'wrerere', 'adioadeyoriazee@gmail.come', '20', '11', 'nigeria', 'f72bbfa5980c58fea8c717e69b029d5591d3b168881bb26868f0e9c81c11b384', 'Ø¡ô1¦v„¥€gR3ñ[šUµèÃ]Ý‘\"p7õA', '2018-06-05 09:50:57', 1, 0, 'q1COIZvshUPVflDHnbuaNJdYK9FQcgEW6xXmAw3TtRMjo7kz5p4L0BieyrSG2', 1, '2018-06-05', '09:50:57', '', '', '', '', '', '', '', '', '', '', '', '', 0, ' wQlnb1JXRZxhuiISLzcYe83D7paOArfsdEH6tKqNyGg4MBVoFPUCW2vT9j50mk', 0, 0, 0, '', 0, 0, '', ''),
(32, 'azFarmexr43rt', 'Individual', '7a, otunubi street off college road, haruna b/stop, ogba', '090881221265', 'jobsiteonlyforadeyori@gmail.com', '', '6', '', '098a54c179b87932dc1d97dd0bffbb5e8d5b30ae02744d95535c7f735ad39e8f', '«ã†jµQB	a±Nï¿ìÓ«tÐÔ*Æä×ÐÎÀ', '0000-00-00 00:00:00', 1, 0, 'a4ea7df0fbcbe4afdce2b546b8dbcfbe', 0, '1547766000', '1547835299', 'VjsH6wIHb0yR.jpg', '1780956000', 'YWg71h3hdhAc.jpg', '1838584800', 'Yd4udcoG7aMn.jpg', '1712181600', 'bhS2jFdUdAED.jpg', 'Sd9dEH5FhMdj.jpg', '1844373600', '', 'hqdVMJkoSRm9.jpg', '', 0, 'EoOD8e3VpiG4BvJUsP50qIHk1CgbS2ZfcQymM6N7dt9lWYRAnTXxjrzLwFahKu', 19, 1555279200, 1, 'rBCmAesGEoFqHpD', 0, 1555258341, 'This log', '0908098989');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedwar`
--

CREATE TABLE `rejectedwar` (
  `war_id` int(11) NOT NULL,
  `bn` varchar(300) NOT NULL,
  `bty` varchar(30) NOT NULL,
  `cap` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `docconf` int(11) NOT NULL,
  `wloc` varchar(50) NOT NULL,
  `wstate` varchar(50) NOT NULL,
  `wcountry` varchar(50) NOT NULL,
  `locadd` varchar(400) NOT NULL,
  `de` varchar(20) NOT NULL,
  `pn` varchar(20) NOT NULL,
  `wid` varchar(50) NOT NULL,
  `noo` varchar(40) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `joined` int(20) NOT NULL,
  `conf` int(10) NOT NULL,
  `imgp` varchar(200) NOT NULL,
  `img` varchar(225) NOT NULL,
  `intimg` varchar(222) NOT NULL,
  `cac` varchar(225) NOT NULL,
  `insimg` varchar(225) NOT NULL,
  `maa` varchar(226) NOT NULL,
  `cal` varchar(225) NOT NULL,
  `nafdac` varchar(220) NOT NULL,
  `nafreg` varchar(222) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `ap` int(11) NOT NULL,
  `confd` int(20) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(20) NOT NULL,
  `log` int(11) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rejectedwar`
--

INSERT INTO `rejectedwar` (`war_id`, `bn`, `bty`, `cap`, `email`, `password`, `salt`, `docconf`, `wloc`, `wstate`, `wcountry`, `locadd`, `de`, `pn`, `wid`, `noo`, `capacity`, `joined`, `conf`, `imgp`, `img`, `intimg`, `cac`, `insimg`, `maa`, `cal`, `nafdac`, `nafreg`, `batch`, `ap`, `confd`, `bk`, `bkid`, `about`, `sn`, `log`, `token`) VALUES
(16, '', '', '', 'dal@gmail.com', '26b91c1816fc8190bcc5e97d4440022da80b5a2092c1bcbac71841af1b87b94e', 'Ê	ÚP5€«Ò‚ÐæVÍû°ÊÄ’÷]£Ör³Žz1å³', 0, '', '9', 'nigeria', '121 dalade avenue ', 'may of june 2009', '090786543452', '6805914732', 'dalalda', '50000', 2147483647, 1, '', '', '', '', '', '', '', '', '', 'BT9quAHyOiorLV0JExCctNDYWInez6QMjwdfFZXvks123USl4pPKGg57a8mRhb', 13, 1546988400, 0, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `salesrecord`
--

CREATE TABLE `salesrecord` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `date` varchar(22) NOT NULL,
  `email` varchar(225) NOT NULL,
  `fname` varchar(22) NOT NULL,
  `lname` varchar(22) NOT NULL,
  `cate` varchar(22) NOT NULL,
  `name` varchar(22) NOT NULL,
  `price` float NOT NULL,
  `quatity` int(11) NOT NULL,
  `tot` float NOT NULL,
  `desc` varchar(600) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `gimg` varchar(225) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `shipping` varchar(20) NOT NULL,
  `region` varchar(100) NOT NULL,
  `cstate` varchar(70) NOT NULL,
  `address` varchar(225) NOT NULL,
  `telephone` varchar(225) NOT NULL,
  `carry` varchar(50) NOT NULL,
  `dis` float NOT NULL,
  `transamount` float NOT NULL,
  `war_id` varchar(50) NOT NULL,
  `storage` varchar(225) NOT NULL,
  `owner` varchar(225) NOT NULL,
  `vesname` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `whenorder` varchar(30) NOT NULL,
  `modemethod` varchar(30) NOT NULL,
  `delivery` varchar(40) NOT NULL,
  `express` varchar(20) NOT NULL,
  `road` varchar(20) NOT NULL,
  `rail` varchar(20) NOT NULL,
  `free` varchar(20) NOT NULL,
  `pushtolog` int(11) NOT NULL,
  `driv` varchar(120) NOT NULL,
  `tok` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesrecord`
--

INSERT INTO `salesrecord` (`id`, `pid`, `date`, `email`, `fname`, `lname`, `cate`, `name`, `price`, `quatity`, `tot`, `desc`, `oid`, `gimg`, `payment`, `shipping`, `region`, `cstate`, `address`, `telephone`, `carry`, `dis`, `transamount`, `war_id`, `storage`, `owner`, `vesname`, `status`, `whenorder`, `modemethod`, `delivery`, `express`, `road`, `rail`, `free`, `pushtolog`, `driv`, `tok`) VALUES
(10, 47, '2018-05-26', '', '', '', '', '', 0, 400, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(11, 45, '2018-05-26', '', '', '', '', '', 0, 6000, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', ''),
(12, 44, '2018-05-26', '', '', '', '', '', 0, 30000, 0, '', '', '', '', '', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `saletrend0`
--

CREATE TABLE `saletrend0` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(200) NOT NULL,
  `qty` float NOT NULL,
  `pri` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saletrend0`
--

INSERT INTO `saletrend0` (`id`, `cate_id`, `cate_name`, `qty`, `pri`) VALUES
(1, 0, 'dairies', 20000, 20000000),
(2, 0, 'fruits', 30000, 12999),
(3, 0, 'grians', 201983, 222002),
(4, 0, 'livestocks', 23232, 87768400),
(5, 0, 'nuts', 333099, 33554400),
(6, 0, 'oil', 35354300, 556565),
(7, 0, 'poultry', 55554500, 53534500),
(8, 0, 'seaproduces', 56656, 134356000),
(9, 0, 'spices', 5545460, 656256000),
(10, 0, 'tubers', 55455, 565657000),
(11, 0, 'vegetable', 33545, 5767790);

-- --------------------------------------------------------

--
-- Table structure for table `saletrend1`
--

CREATE TABLE `saletrend1` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(200) NOT NULL,
  `qty` float NOT NULL,
  `pri` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setsys`
--

CREATE TABLE `setsys` (
  `id` int(11) NOT NULL,
  `em` varchar(225) NOT NULL,
  `em2` varchar(225) NOT NULL,
  `pn1` varchar(40) NOT NULL,
  `pn2` varchar(40) NOT NULL,
  `ci1` double NOT NULL,
  `ci2` double NOT NULL,
  `re1` double NOT NULL,
  `re2` double NOT NULL,
  `st1` double NOT NULL,
  `st2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setsys`
--

INSERT INTO `setsys` (`id`, `em`, `em2`, `pn1`, `pn2`, `ci1`, `ci2`, `re1`, `re2`, `st1`, `st2`) VALUES
(1, 'proli_tech@support.com', 'proli_tech@support.com', '0908098780', '678908900', 800, 1200, 3000, 4200, 5000, 5100);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `country_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `country_name`) VALUES
(1, 1, ' Abia '),
(2, 2, ' Adamawa '),
(3, 3, ' Akwa Ibom '),
(4, 4, ' Anambra '),
(5, 5, ' Bauchi '),
(6, 6, ' Bayelsa '),
(7, 7, ' Benue '),
(8, 8, ' Borno '),
(9, 9, ' Cross River '),
(10, 10, ' Delta '),
(11, 11, ' Ebonyi '),
(12, 12, ' Edo '),
(13, 13, ' Ekiti '),
(14, 14, ' Enugu '),
(15, 15, ' Federal Capital Territory '),
(16, 16, ' Gombe '),
(17, 17, ' Imo '),
(18, 18, ' Jigawa '),
(19, 19, ' Kaduna '),
(20, 20, ' Kano '),
(21, 21, ' Katsina '),
(22, 22, ' Kebbi '),
(23, 23, ' Kogi '),
(24, 24, ' Kwara '),
(25, 25, ' Lagos '),
(26, 26, ' Nasarawa '),
(27, 27, ' Niger '),
(28, 28, ' Ogun '),
(29, 29, ' Ondo '),
(30, 30, ' Osun '),
(31, 31, ' Oyo '),
(32, 32, ' Plateau '),
(33, 33, ' Rivers '),
(34, 34, ' Sokoto '),
(35, 35, ' Taraba '),
(36, 36, ' Yobe '),
(37, 37, ' Zamfara ');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cate_id`, `name`, `des`) VALUES
(1, 1, 'butter ', 'A soft yellowish or whitish emulsion of butterfat, water, air, and sometimes salt, churned from milk or cream and processed for use in cooking and as a food. A soft solid having at room temperature a consistency like that of butter'),
(2, 1, 'cheese ', 'Cheese is a dairy product derived from milk that is produced in a wide range of flavors, textures, and forms by coagulation of the milk protein casein. It comprises proteins and fat from milk, usually the milk of cows, buffalo, goats, or sheep. ... Most cheeses melt at cooking temperature'),
(3, 1, 'milk ', 'A whitish liquid containing proteins, fats, lactose, and various vitamins and minerals that is produced by the mammary glands of all mature female mammals after they have given birth and serves as nourishment for their young'),
(4, 1, ' yogurt ', ' yoghourt is a food produced by bacterial fermentation of milk.The bacteria used to make yogurt are known as yogurt cultures(Streptococcus thermophilus). The fermentation of lactose by these bacteria produces lactic acid, which acts on milk protein to give yogurt its texture and characteristic tart flavor.[1] Cow\'s milk is commonly available worldwide and, as such, is the milk most commonly used to make yogurt. Milk from water buffalo.'),
(5, 2, ' apple ', ' An apple is a sweet, edible fruit produced by an apple tree (Malus pumila). Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. Apples are a rich source of various phytochemicals including flavonoids (e.g., catechins, flavanols, and quercetin) and other phenolic compounds (e.g., epicatechin and procyanidins) found in the skin, core, and pulp of the apple;[69] they have unknown health value in humans.Phenolic compounds, such as polyphenol oxidase, are the main driving force behind browning in apples. Polyphenol oxidase catalyzes the reaction of phenolic compounds to o-quinones causing the pigment to turn darker and therefore brown.Ideain (cyanidin 3-O-galactoside) is an anthocyanin, a type of pigment, which is found in some red apple cultivars'),
(6, 2, ' apricot ', 'Apricot, (Prunus armeniaca), stone fruit of the family Rosaceae (order Rosales), closely related to peaches, almonds, plums, and cherries. Apricots are cultivated throughout the temperate regions of the world, especially in the Mediterranean. They are eaten fresh or cooked and are preserved by canning or drying. The fruit is also widely made into jam and is often used to flavour liqueurs. Apricots are a good source of vitamin A and are high in natural-sugar content. Dried apricots are an excellent source of iron'),
(7, 2, ' avocado ', 'Avocado, Persea americana, is an evergreen tree in the family Lauraceae which grown for its nutritious fruit, the avocado. The avocado tree is large and dome shaped with oval or elliptical leaves arranged in a spiral on the tips of branches. The leaves have a red pigmentation when they first emerge and turn green as they mature. Avocado trees produce clusters of small, green-yellow flowers at the end of twigs and a large, fleshy, pear-shaped fruit with a single large seed. The fruits can be purple to green in color with smooth or warty skin depending on variety. The flesh of the fruit is yellow-green in color and has the consistency of butter. Each fruit contains one large seed. Avocado trees grown from seed can take 4–6 years to produce fruit whereas grafted plants may produce fruit within 1–2 years. The tree can reach a height of 20 m (65.6 ft) and originated in the rainforests of Central America.'),
(8, 2, ' banana ', 'A banana is an edible fruit – botanically a berry produced by several kinds of large herbaceous flowering plants in the genus Musa. In some countries, bananas used for cooking may be called \"plantains\", distinguishing them from dessert bananas. The fruit is variable in size, color, and firmness, but is usually elongated and curved, with soft flesh rich in starch covered with a rind, which may be green, yellow, red, purple, or brown when ripe. The fruits grow in clusters hanging from the top of the plant.'),
(9, 2, ' blackcurrant ', 'The Blackcurrant: A sweet earthy taste unlike other berries. Fresh gooseberry and passion-fruit flavour-aromas and hints of raspberry, combined with the floral aromatic notes of carnations and roses. An underlying tannic structure adds complexity and balance to the blackcurrant’s acidity and sweetness. The aftertaste is fresh and sharply cleansing, with no residual sweetness.'),
(10, 2, ' blackbery ', 'Blackberry, usually prickly fruit-bearing bush of the genus Rubus of the rose family (Rosaceae), known for its dark edible fruits. Native chiefly to north temperate regions, wild blackberries are particularly abundant in eastern North America and on the Pacific coast of that continent and are cultivated in many areas of North America and Europe. Blackberries are a fairly good source of iron, vitamin C, and antioxidants and are generally eaten fresh, in preserves, or in baked goods such as cobblers and pies.'),
(11, 2, ' blueberry ', '.Blueberries are perennial flowering plants with blue– or purple–colored berries. They are classified in the section Cyanococcus within the genus Vaccinium. Vaccinium also includes cranberries, bilberries, and huckleberries. Studies have shown that cashew fruit is one of the most nutritious fruits in the world.  The fruit is a powerhouse of protein and minerals that include copper, calcium, magnesium, iron, phosphorus, potassium, and zinc.  Further studies also show that cashew contains vitamin C, vitamin B1 (thiamin), vitamin B2(riboflavin), vitamin B3 (niacin), vitamin B6, folate, vitamin E (alpha-tocopherol), and vitamin K.'),
(12, 2, 'cashew ', 'The cashew tree is a tropical evergreen tree that produces the cashew seed and the cashew apple. It can grow as high as 14 m, but the dwarf cashew, growing up to 6 m, has proved more profitable, with earlier maturity and higher yields.Studies have shown that cashew fruit is one of the most nutritious fruits in the world.  The fruit is a powerhouse of protein and minerals that include copper, calcium, magnesium, iron, phosphorus, potassium, and zinc.  Further studies also show that cashew contains vitamin C, vitamin B1 (thiamin), vitamin B2(riboflavin), vitamin B3 (niacin), vitamin B6, folate, vitamin E (alpha-tocopherol), and vitamin K.'),
(13, 2, ' cherry ', 'A small, round stone fruit that is typically bright or dark red. 2. (also cherry tree) the tree (genus Prunus) of the rose family that bears such fruit. Cultivated, edible cherries are derived from the mazzard (or sweet) cherry (P. avium) and the morello (or sour) cherry (P. cerasus).Cherries may be either deliciously sweet and deep brown-red, or quite tart and bright red. The two most common are the sweet cherry, Prunus avium L., and the sour (often referred to by growers as the pie or tart) cherry Prunus cerasus L.. Sour cherries have a lower sugar content and a higher acid content than its sweet counterpar'),
(14, 2, ' coconut ', 'The coconut tree (Cocos nucifera) is a tropical plant from the palm family grown primarily for its fruit, coconuts. The tree is native to the South Pacific region and is widely cultivated in all the tropical regions of the world, growing particularly well in coastal areas. The fruit of the tree is the most utilized nut in the world and the tree itself is the most important member of the palm family, cites the University of Florida Extension website. Coconut trees have distinct growth traits.  ... Coconut trees grow best near the coast. VIDEO OF THE DAY  Size and Form The single-trunked tree has a mature height of 80 to 100 feet. The dwarf-sized varieties tend to grow much shorter. The straight, columnar trunk is light gray in color and often develops a swollen base with maturity. Certain cultivars have curved or slightly leaning trunks. The trunk diameter generally remains a consistent 10 to 13 inches from the base to the top.  Foliage and Flowers Foliage grows on top of the trunk. The yellowish-green leaves are 8 to 18 feet long with a width of 3 to 5 feet. The tree sheds and produces 10 to 15 leaves every year. The feathery-textured foliage is pinnate and grows on 3- to 5-foot long, spineless stalks. At the age of 4 to 6 years, coconut trees start to produce flowers in the form of canoe-like inflorescences. Inflorescences are 2 to 3 feet in length. The light yellow, smaller male flowers grow at the ends of the branchlets while the larger female flowers grow at the base.  Fruit The ovoid fruit is about 15 inches long and 12 inches wide. A thick, fibrous husk covers the fruit or the nut within. The nut, which is 10 to 12 inches long, has a diameter of 6 to 8 inches with distinct sunken holes, referred to as eyes, at one end. Immature nuts have white, gelatinous flesh that gradually matures to a 1-inch thick meat called copra. The inner nut contains a watery liquid called coconut milk. Younger fruit has more milk that gradually dries to create the meat in mature nuts.  Growth Traits The coconut tree starts to bear fruit within six to 10 years of seed germination. The full production age is achieved at 15 to 20 years. A healthy coconut tree continues to produce a full harvest until the age of 80 years, with a count of 50 to 200 fruits per tree over the course of a lifetime. Fruit count is affected by cultivar and climatic conditions. It takes about a year for the fruit to reach maturity on tree. Coconut palms continue to flower and fruit throughout the year.     Show Comments  RELATED ARTICLES How to Distress Furniture How to Distress Furniture The Life Cycle of a Palm Tree The Life Cycle of a Palm Tree How to Freeze Fresh Raw Coconut How to Freeze Fresh Raw Coconut What Are the Functions of Seeds in a Plant? What Are the Functions of Seeds in a Plant? How to Make Coconut Shell Candles How to Make Coconut Shell Candles Breakfast in Bed Never Looked So Good Breakfast in Bed Never Looked So Good  Subscribe for weekly inspiration.  Email Address Subscribe We respect your privacy. Follow on social About UsAdvertiseTerms Of UseHome Hacks & AnswersCopyright PolicyPrivacy PolicyContact Us © 2019 LEAF GROUP LTD. / LEAF GROUP LIFESTYLE'),
(15, 2, ' fig ', 'The fig \"fruit\" is a composite formed of a hollow shell of receptacle tissue enclosing hundreds of individual pedicellate drupelets that develop from the individual female flowers lining the. receptacle wall, with a small scale-lined opening (called the ostiole or eye) at the distal end.'),
(16, 2, ' honey_melon ', 'A honeydew melon, also known as a honeymelon, is the fruit of one cultivar group of the muskmelon, Cucumis melo in the gourd family. The Inodorus group includes honeydew, crenshaw, casaba, winter, and other mixed melons'),
(17, 2, ' rock_melon ', 'Rock melon is also known as cantaloupe and musk melon. They are related to honeydews, watermelons, cucumbers, squash and pumpkins. They are commonly round with firm, scaly skin, greyish green buff rind skin. Some Rock melons have grooves and seams, which circle the rock melon.'),
(18, 2, ' grape ', ' grape is a fruit, botanically a berry, of the deciduous woody vines of the flowering plant genus Vitis. Grapes can be eaten fresh as table grapes or they can be used for making wine, jam, juice, jelly, grape seed extract, raisins, vinegar, and grape seed oil'),
(19, 2, ' kiwi ', 'Kiwi berries are edible berry- or grape-sized fruits similar to fuzzy kiwifruit in taste and appearance, but with thin, smooth green skin. They are primarily produced by three species: Actinidia arguta (hardy kiwi)'),
(20, 2, ' lemon ', 'Lemon, Citrus limon, is a small evergreen tree in the family Rutaceae grown for its edible fruit which, among other things, are used in a variety of foods and drinks. The tree has a spreading, upright growth habit, few large branches and stiff thorns'),
(21, 2, ' lime ', 'Image result for description of lime fruitplantvillage.psu.edu There are several species of citrus trees whose fruits are called limes, including the Key lime (Citrus aurantifolia), Persian lime, kaffir lime, and desert lime. Limes are a rich source of vitamin C, sour and are often used to accent the flavours of foods and beverages. They are grown year-round.'),
(22, 2, ' lychee ', 'e lychee fruit is about 1½ to 2 inches in size, oval to rounded heart shaped and the bumpy skin is red in color. Once you peel the skin off, the crisp juicy flesh of a lychee fruit is white or pinkish, translucent and glossy like the consistency of a grape, but the taste is sweete'),
(23, 2, ' mango ', 'Mango, Mangifera indica, is an evergreen tree in the family Anacardiaceae grown for its edible fruit. The mango tree is erect and branching with a thick trunk and broad, rounded canopy. ... The skin of the fruit is yellow-green to red'),
(24, 2, ' melon ', 'A melon is any of various plants of the family Cucurbitaceae with sweet edible, fleshy fruit. The word \"melon\" can refer to either the plant or specifically to the fruit. Botanically, a melon is a kind of berry'),
(25, 2, ' nectarine ', ' Nectarine. The nectarine is a rounded fruit, with juicy meat and stone, similar to the peach. ... The nectarine is a rounded fruit, with juicy meat and with stone, similar to the peach. The skin is not hairy but smooth, as the plum\'s skin, and it can be consumed peeled or unpeeled'),
(26, 2, ' orange ', 'Orange trees are the most commonly cultivated fruit trees in the world. Oranges are a popular fruit because of their natural sweetness, wide variety of types and diversity of uses, from juices and marmalades to face masks and candied orange slices.According to the American Heart Association (AHA), eating higher amounts of a compound found in citrus fruits like oranges and grapefruit may lower ischemic stroke risk Oranges are low in calories and full of nutrients, they promote clear, healthy, skin and can help to lower our risk for many diseases as part of an overall healthy and varied diet'),
(27, 2, ' pawpaw ', 'pawpaw is a fruit being enjoyed for its sweetness across the world. Its products for medicinal purposes is on the rise.Papaya contains dietary fiber, folate, vitamin A, C and E. It also contains small amount of calcium, iron, riboflavin, thiamine and niacine.  Pawpaw is very rich in antioxidant nutrients flavonoids and carotenes; very high in vitamin C plus A, and low in calories and sodium'),
(28, 2, ' passion fruit ', 'his tropical fruit is actually considered a type of berry, according to botanists. It is the fruit of the Passiflora vine, a type of passion flower.this small fruit contains 17 calories of energy.  it\'s a good source of fiber, vitamin C and vitamin A.'),
(29, 2, ' peach ', 'Peaches are a characteristically fuzzy fruit native to northwest China. They are a member of the stone fruit family, having one large middle seed, as do cherries, apricots, plums, and nectarines.fruits have bioactive and phenolic compounds with anti-obesity and anti-inflammatory properties that may also reduce the bad cholesterol (LDL) associated with cardiovascular disease.'),
(30, 2, ' pear ', 'Pears are a mild, sweet fruit with a fibrous center. They are rich in important antioxidants, flavonoids, and dietary fiber and pack all of these nutrients in a fat-free, cholesterol-free, 100-calorie package.Many studies have suggested that increasing consumption of plant foods like pears decreases the risk of obesity, diabetes, heart disease, and overall mortality while promoting a healthy complexion, increased energy, and a lower weight'),
(31, 2, ' pineapple ', 'Pineapples are tropical fruit that are rich in vitamins, enzymes and antioxidents. They may help boost the immune system, build strong bones and aid indigestion. Also, despite their sweetness, pineapples are low in caloriesPineapples are tropical fruit that are rich in vitamins, enzymes and antioxidents. They may help boost the immune system, build strong bones and aid indigestion. Also, despite their sweetness, pineapples are low in calories.which is important for antioxidant defenses, pineapples also contain high amounts of thiamin, a B vitamin that is involved in energy production'),
(32, 2, ' plum ', 'Plums and prunes are impressively high in nutrients. They contain over 15 different vitamins and minerals, in addition to fiber and antioxidants.Plums are relatively low in calories, but contain a fair amount of important vitamins and minerals'),
(33, 2, ' water melon ', 'Despite the popular belief that watermelon is just water and sugar, watermelon is actually a nutrient dense food. It provides high levels of vitamins, minerals, and antioxidants and just a small number of calories.increasing consumption of plant foods like watermelon decreases the risk of obesity and overall mortality, diabetes, and heart disease'),
(34, 2, ' tangrine ', 'The tangerine (Citrus tangerina) is an orange-colored citrus fruit that is closely related to the mandarin tangerine (Citrus reticulata). Tangerines are smaller than common tangerines and are usually easier to peel and to split into segments. The taste is considered less sour, as well as sweeter and stronger, than that of an orange.Several components of tangerines, such as potassium, folate, and various antioxidants are known to provide neurological benefits. Folate has been known to reduce the occurrence of Alzheimer’s disease and cognitive decline. Potassium has been linked to increased blood flow to the brain and enhances cognition, concentration, and neural activity.'),
(35, 3, ' hulled_barley ', 'Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(36, 3, ' hulless_berley ', 'Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(37, 3, ' barley_grits ', 'Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(38, 3, ' barley_flakes ', 'Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(39, 3, ' barley_flour ', 'Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(40, 3, ' pearl_barley ', 'Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(41, 3, ' quick_pearl_barley ', 'Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(42, 3, ' beans ', 'Beans are seeds from the Fabaceae family, commonly known as the legume, pea, or bean family. They are an affordable source of protein, fiber, and vitamins that offer many health benefits.Protein is a vital nutrient that plays a key role in virtually everything the body does. Beans are high in amino acids, the building blocks of protein.'),
(43, 3, ' corn ', 'Corn is one of the most widely consumed cereals grains. Being a good source of antioxidant carotenoids, such as lutein and zeaxanthin, yellow (or colored) corn may promote eye health. It is also a rich source of many vitamins and minerals Whole-grain corn is as healthy as any cereal grain, rich in fiber and many vitamins, minerals, and antioxidants. Corn is typically yellow, but comes in a variety of other colors, such as red, orange, purple, blue, white, and black'),
(44, 3, ' dent_corn ', 'Corn is one of the most widely consumed cereals grains. Being a good source of antioxidant carotenoids, such as lutein and zeaxanthin, yellow (or colored) corn may promote eye health. It is also a rich source of many vitamins and minerals Whole-grain corn is as healthy as any cereal grain, rich in fiber and many vitamins, minerals, and antioxidants. Corn is typically yellow, but comes in a variety of other colors, such as red, orange, purple, blue, white, and black'),
(45, 3, ' pod_corn ', 'Corn is one of the most widely consumed cereals grains. Being a good source of antioxidant carotenoids, such as lutein and zeaxanthin, yellow (or colored) corn may promote eye health. It is also a rich source of many vitamins and minerals Whole-grain corn is as healthy as any cereal grain, rich in fiber and many vitamins, minerals, and antioxidants. Corn is typically yellow, but comes in a variety of other colors, such as red, orange, purple, blue, white, and black'),
(46, 3, ' corn_flakes ', 'Corn is one of the most widely consumed cereals grains. Being a good source of antioxidant carotenoids, such as lutein and zeaxanthin, yellow (or colored) corn may promote eye health. It is also a rich source of many vitamins and minerals Whole-grain corn is as healthy as any cereal grain, rich in fiber and many vitamins, minerals, and antioxidants. Corn is typically yellow, but comes in a variety of other colors, such as red, orange, purple, blue, white, and black'),
(47, 3, ' foxtail ', 'The benefits of foxtail millets help the body reducing the factors of diabetes, fortifying it with enough components against heart attacks and developing body tissues. Foxtail millets are ideal for reducing the cholesterol of the body, controlling blood sugar and aiding metabolism rate.Foxtail millet is said to be a very rich source of carbohydrates, dietary fibres, proteins and high calories. Foxtail millet has ease of consumption as it is easy to digest.Foxtail millet helps in detoxification as it contains a high level of antioxidants'),
(48, 3, ' finger ', 'Health benefits of finger millet (ragi) Finger millet is an excellent source of natural calcium which helps in strengthening bones for growing children and aging people. Regular consumption of finger millet is good for bone health and keeps diseases such as osteoporosis at bay and could reduce risk of fractur.Finger millet  is an excellent source of natural calcium which helps in strengthening bones for growing children and aging people. Regular consumption of finger millet is good for bone health and keeps diseases such as osteoporosis at bay and could reduce risk of fractur'),
(49, 3, ' pearl ', 'This is a form barley.Barley is one of the most widely consumed grains.This versatile grain has a somewhat chewy consistency and a slightly nutty flavor that can complement many dishes.When consumed as a whole grain, barley is a particularly rich source of fiber, molybdenum, manganese and selenium. It also contains good amounts of copper, vitamin B1, chromium, phosphorus, magnesium and niacin'),
(50, 3, ' barnyard ', 'The Barnyard millet (Echinochloa frumantacea) is a wild seed and not a grain, mainly grown in the hilly areas of Uttaranchal, India. The barnyard millet is the fastest growing crop, which can produce ripe grains within 45 days from the sowing time under optimal weather conditions.Barnyard millet is a good source of highly digestible protein and at the same time is least caloric dense compared to all other cereals. It is a grain which makes one feel light and energetic after consumption. A serving of barnyard millets (25g, raw) gives 75 calories and 1.5g of protein.'),
(51, 3, ' kodo ', 'Kodo Millet is a monocot tufted annual or perennial grass that grows up to 150 cm tall. The plant typically occurs in seasonally flooded areas and wet depressions, often association with cultivation and settlements, such as along roadsides, ditches, and waste ground and rice fields.Kodo millet is a good substitute to rice or wheat. Protein, fiber, and mineral content are much higher than the major cereals like rice. It can be cooked just like rice or ground into flour. It provides balanced nutrition, unlike polished white rice'),
(52, 3, ' millet ', 'Millets are cereal crops and small seed grasses.The presence of iron and calcium in this millet helps in strengthening immunity. This millet is known for its umpteen health benefits. Packed with the goodness of iron,protein, fibre, and minerals such as calcium and magnesium; the daily consumption or inclusion of this millet can work wonders'),
(53, 3, ' rice ', 'Rice (Oryza sativa) is a food staple and primary crop grown all over the world. There are many different types of rice — including long-grain basmati, black rice, white rice and sticky (or glutinous) rice — but in terms of health benefits, not all are created equal.rice is a highly nutritious food. It is a whole grain that is relatively low in calories (216 calories per cup), high in fiber, gluten-free and can be incorporated into a variety of dishes'),
(54, 3, ' sorghum ', 'Sorghum, an ancient cereal grain that\'s a staple crop in India and throughout Africa, has long been considered a safe grain alternative for people with celiac disease and gluten insensitivity. New molecular evidence confirms that sorghum is completely gluten-free, and reports that the grain provides health benefits that make it a worthy addition to any diet..Recent research suggests that certain phytochemicals allow sorghum consumption to reduce the risk of colon and skin cancer '),
(55, 3, ' wheat ', 'Wheat is the most common cereal grain, which comes from a type of grass (Triticum). The whole grain kernel of wheat, composed of bran (outer layer), wheat germ, and endosperm (innermost part), is an immense energy source. Wheat originated in Southwestern Asia, but today it is one of the top cereal crops grown in several countries for human consumption.Wheat, a whole grain, has a natural ability to control weight, but this ability is more pronounced among women.Whole wheat with its vitamin B content helps provide the body with energy.Whole grains like wheat are immensely effective in patients with metabolic disorders.Wheat is rich in magnesium that acts as a co-factor for more than 300 enzymes. These enzymes are involved in the body’s functional use of insulin and glucose secretion'),
(56, 4, ' cattle ', 'Cattle is livestock rear for meat production. The beef has the following importance: Muscle Building and Tissue Repair. The protein comprised in one daily serving of red meat contains the amino acids you need for muscle building and tissue repair.  Red Blood Cell, immune strength and overall well-being; Development and general health; A healthy nervous, immune and digestive system. Causion: People abouve age of 40 should avoid eating excess beef to prevent uric acid accumulation around the jiont which can lead to gout'),
(57, 4, 'dog', '  Dogs are usually pet.Dogs  don’t just fill your heart; they actually make it stronger. Studies show that having a canine companion is linked to lower blood pressure, reduced cholesterol, and decreased triglyceride levels, which contribute to better overall cardiovascular health and fewer heart attacks'),
(59, 4, 'goat', 'Goat is livestock rear for meat production. An increasing number of experts, however, are saying that goat meat (chevon) has a number of nutritional benefits. Low in calories, total fat, saturated fat and cholesterol than traditional meats, goat meat has higher levels of iron when compared to a similar serving size of beef, pork, lamb and chicken.'),
(63, 4, ' pig ', 'Pig is livestock rear for meat production. Pork contains a number of bioactive meat compounds, such as creatine, taurine, and glutathione, that may benefit health in various ways.'),
(64, 4, 'sheep', 'Sheep (ram /ewe) is livestock rear for meat production.Not only is it a rich source of high-quality protein, but it is also an outstanding source of many vitamins and minerals, including iron, zinc, and vitamin B12. Because of this, regular consumption of lamb may promote muscle growth, maintenance, and performance'),
(65, 4, 'horse', 'Horse is livestock rear for meat production and outdoor game activities. riding horse promote body health. The meat derived from horse is a good source of many proteins and minerals.'),
(66, 5, ' almond ', 'Almonds are the edible seeds of Prunus dulcis, more commonly called the almond tree.They are native to the Middle East, but the US is now the world\'s largest producer.The almonds you can buy in stores usually have the shell removed, revealing the edible nut inside. They are sold either raw or roasted.They are also used to produce almond milk, oil, butter, flour or paste — also known as marzipan. Antioxidants in almond help protect against oxidative stress, which can damage molecules in your cells and contribute to inflammation, aging and diseases like cancer'),
(67, 5, ' bitter cola ', 'The nut comes from the evergreen kola tree, which is found in the rainforests of Africa. Inside the tree\'s star-shaped fruits are white shells, which contain the seeds or kola nuts.The kola nut naturally stimulates the central nervous system, which may increase alertness and boost energy levels. Antibacterial benefits: One study reported in the Journal of Biosciences and Medicines indicates that the use of kola nut extract might stop the growth of harmful bacteria'),
(68, 5, ' cashews ', 'Cashews are nutritionally dense. The nut comes from the evergreen kola tree, which is found in the rainforests of Africa. Inside the tree\'s star-shaped fruits are white shells, which contain the seeds or kola nuts.The kola nut naturally stimulates the central nervous system, which may increase alertness and boost energy levels. Antibacterial benefits: One study reported in the Journal of Biosciences and Medicines indicates that the use of kola nut extract might stop the growth of harmful bacteria.ashews are a good source of healthy dietary fats, which are essential for our body to absorb the fat-soluble vitamins (vitamin A, D, E, and K) and produce fatty acids that are vital for the development of the brain and blood clotting.'),
(69, 5, ' cocoa ', 'Coca is a tropical rain forest tree.Cocoa is rich in polyphenols, which have significant health benefits, including reduced inflammation and improved cholesterol levels. However, processing cocoa into chocolate or other products can substantially decrease the polyphenol content.'),
(70, 5, ' hazelnut ', 'Hazelnuts (Filberts) Rich in unsaturated fats (mostly oleic acid), high in magnesium, calcium and vitamins B and E. Hazelnuts are good for your heart, help reduce the risk of cancer, and aid in muscle, skin, bone, joint and digestive health'),
(71, 5, ' kola ', ' Coca is a tropical rain forest tree. Kola nut powder and extract may help digestion. They are thought to promote the production of gastric acid, which increases digestive enzyme effectiveness in the stomach. Increase in circulation: The caffeine and theobromine in the kola nut may speed up the heart rate, which increases circulation.'),
(72, 5, ' palm kernel ', 'Palm kernel is nut derived from palm tree. the nut has many important purposes because many products are derived form the nut and most of the products are the raw materials for many industrial product. the nut produce oil, fire chaff and shell is used in production of break pad. Palm kernel contains may biological important subatnce that promote human help. these include : proteins, fat and oil as well as many minerals '),
(73, 5, ' peanuts ', 'Peanuts are as popular as they are healthy. They\'re an excellent plant-based source of protein and high in various vitamins, minerals, and plant compounds. They can be useful as a part of a weight loss diet and may reduce your risk of both heart disease and gallstones'),
(74, 5, ' pecans ', 'Like most other nuts, pecans contain various nutrients, minerals, antioxidants and vitamins that offer some wonderful health benefits'),
(75, 5, ' pine ', 'Pine nuts can also contribute to a healthy heart. They are an excellent source of monounsaturated fatty acids. A healthy intake of monounsaturated fats has been linked to lower cholesterol levels and a lower risk of having a heart attack'),
(76, 5, ' pistachios ', 'Pistachios are high in protein, fiber and antioxidants. They also have several other important nutrients, including vitamin B6 and potassium'),
(77, 5, ' walnut ', 'Walnuts are round, single-seeded stone fruits that grow from the walnut tree. They are a good source of healthful fats, protein, and fiber. They may enhance heart and bone health and help in weight management, among other benefits.The monounsaturated and polyunsaturated fatty acids found in walnuts have been shown to decrease LDL (harmful) cholesterol and triglyceride levels'),
(78, 6, ' avocado ', 'Avocado oil is rich in fatty acids and is excellent for moisturizing the skin. In addition to vitamin E, avocado oil contains potassium, lecithin, and many other nutrients that can nourish and moisturize the skin'),
(79, 6, ' groundnut ', 'Groundnut oil is a good source of vitamin E, an antioxidant that has many health benefits like protecting the body from free radical damage and reducing the risk of heart disease'),
(80, 6, ' mustard ', 'Mustard oil is rich in monounsaturated fatty acids, which could mean that it benefits cardiovascular health. It also contains a compound that may have anti-inflammatory properties'),
(81, 6, ' olive ', 'Olive oil is made from the fruit of the olive tree, which is naturally high in healthy fatty acids. There are several types of olive oil on the market today, including extra virgin olive oil, virgin olive oil and regular olive oil — but research shows that extra virgin olive oil benefits are more abundant than the other varieties.Olive oil is made from the fruit of the olive tree, which is naturally high in healthy fatty acids. There are several types of olive oil on the market today, including extra virgin olive oil, virgin olive oil and regular olive oil — but research shows that extra virgin olive oil benefits are more abundant than the other varieties'),
(82, 6, ' palm ', 'Benefits of palm oil include decreasing cholesterol levels, reducing oxidative stress, boosting brain health, slowing the progression of heart disease, increasing vitamin A status, and improving skin and hair health'),
(83, 6, ' peanut ', 'Peanut oil is high in monounsaturated “good” fat, and low in saturated “bad” fat, which is believed to help prevent heart disease and lower cholesterol. However, in animal studies, peanut oil has been shown to clog arteries, and this would increase the risk for heart disease'),
(84, 6, ' rice bran ', 'Rice Bran Oil has a balanced amount of monounsaturated, polyunsaturated and saturated fats. It is also considered a heart-friendly oil that can help improve your cholesterol. \"Rice bran might help lower cholesterol because it contains the right amount of oryzanol which is an antioxidant'),
(85, 6, ' palm kernel ', ' Palm kernel oil is extracted from palm fruit. It is dark black in colour and distinguishes itself with a unique strong taste and smell.It is also useful for cooking as it is free of cholesterol. As a matter of fact, medical practitioners do advise people suffering from heart problems and high cholesterol level to make use of palm kernel oil when cooking because it is more beneficial to their health.'),
(86, 6, ' peanuts ', 'Peanuts oil is a good source of vitamin E, an antioxidant that has many health benefits like protecting the body from free radical damage and reducing the risk of heart disease'),
(87, 7, ' chicken ', 'Health Benefits of Chicken Breast. Chicken breast is an excellent source of low-fat protein. Protein helps your body to maintain muscle mass and also helps you to build muscle if you are participating in a strength program. Chicken breast is also a very good source of selenium, phosphorus, vitamin B6, and niaci. Care must be taken in consumption of high amunt of white meat chicken skin beacuse, it has high cholesterol content that if accunlated in blood causes cardiovascular disorder'),
(88, 7, ' duck ', 'Duck is a lean meat – comparable in fat and calories to a skinless chicken or turkey breast. It\'s also an excellent source of selenium and zinc, both of which encourage good cellular metabolism. Since duck is a red meat, it contains higher amounts of iron than other poultry'),
(89, 7, ' fowl ', 'Health Benefits of Chicken Breast. Chicken breast is an excellent source of low-fat protein. Protein helps your body to maintain muscle mass and also helps you to build muscle if you are participating in a strength program. Chicken breast is also a very good source of selenium, phosphorus, vitamin B6, and niaci. Care must be taken in consumption of high amunt of white meat chicken skin beacuse, it has high cholesterol content that if accunlated in blood causes cardiovascular disorder'),
(90, 7, ' goose ', ' Goose fat is also good for you in comparison to other animal fats. It is high in \'heart healthy\' monounsaturated fats which can lower blood cholesterol level. As with all fats, goose fat is a good source of energy; 1 gram of fat provides 9 Kcal'),
(91, 7, ' quail ', 'Quail is a generic term for a number of medium-sized game birds. Although some people hunt wild quail, you can also purchase farm-raised quail. These birds are filled with protein and essential vitamins and minerals, making them a nutritious type of poultry, especially if you remove the skin before eating them and cook them without a lot of added fat'),
(92, 7, ' pigeon ', 'High nutritional value of pigeon, only rare delicacies, but also a high tonic. Pigeon as a high protein, low fat foods, protein content of 24.47%, more than rabbits, cattle, pigs, sheep, chickens, ducks, geese and dogs and other meat, the protein contained in many essential amino acids the human body, and the digestion and absorption rate of 95%, pigeon meat, the fat content of only 0.73%, lower than other meat, is the ideal food of mankind. Pigeon eggs are known as “animal ginseng” is rich in protein'),
(93, 7, ' turkey ', 'Turkey meat is sold in various forms, including whole, prepackaged slices, breast, thighs, mince, cutlets and tenderloins. Turkey farming is significantly different from other poultry farming. However, turkey consumption is growing. The health benefit of Turkey meat are Turkey is a rich source of protein. Skinless turkey is low in fat. White meat is lower in kilojoules and has less fat than the dark meat. A typical turkey consists of 70 per cent white meat and 30 per cent dark meat. Turkey meat is a source of iron, zinc, potassium and phosphorus. It is also a source of vitamin B6 and niacin, which are both essential for the body\'s energy production. Regular turkey consumption can help lower cholesterol levels. The meat is low-GI and can help keep insulin levels stable. Turkey contains the amino acid tryptophan, which produces serotonin and plays an important role in strengthening the immune system. It is also a source of selenium, which is essential for thyroid hormone metabolism. It also boosts immunity and acts as an antioxidant.'),
(94, 8, ' crabs ', 'Mental Activity. Crab meat also includes copper, vitamin B2, selenium, and omega-3 fatty acids. This combination is great for cognition and nervous system activity. It also reduces inflammation and plaque in your neural pathways'),
(95, 8, ' crayfishe ', 'Crey fish  is loaded with important nutrients, such as protein and vitamin D. Fish is also the world\'s best source of omega-3 fatty acids, which are incredibly important for your body and brain'),
(96, 8, ' fishes ', 'Fish is high in many important nutrients, including high-quality protein, iodine and various vitamins and minerals. Fatty types of fish are also high in omega-3 fatty acids and vitamin D'),
(97, 8, ' lobster ', 'Lobsters are a great source of selenium and also contain omega-3 fatty acids. They can help protect against thyroid disease, depression, and anemia. Lobster can serve as the main source of protein in a meal. Defrost frozen lobster in the refrigerator, not at room temperature'),
(98, 8, ' mussel ', 'Mussels are one of the most natural, organic products available in today\'s market. Mussels offer several health benefits. They are high in B12 vitamins and provide a readily absorbed source of many other B & C vitamins, amino acids, vital minerals including iron, manganese, phosphorus, potassium, selenium and zinc'),
(99, 8, ' oyster ', 'They are low in calories, low in fat and a good source of protein which makes you feel fuller after eating. 4. Oysters are a good source of other essential nutrients. These include vitamins A, E, and C, zinc, iron, calcium, selenium, and vitamin B12'),
(100, 8, ' prawn ', 'Eating prawns regularly will provide the following nutritional benefits: ... In fact, the cholesterol contained in prawns is vital for a healthy diet. Prawns are a great source of Vitamins B-6, B-12 and Niacin, which help the body produce energy, build muscle and replenish red blood cells'),
(101, 8, ' shrimps ', 'Shrimp may have a variety of health benefits. It is high in several vitamins and minerals, and is a rich source of protein. Eating shrimp may also promote heart and brain health due to its content of omega-3 fatty acids and the antioxidant astaxanthin'),
(102, 9, ' garlic ', ' Garlic is an undergroun creeping plant.Garlic is so potent in controling combined effects on reducing cholesterol and blood pressure, as well as the antioxidant properties, may reduce the risk of common brain diseases like Alzheimer\'s disease and dementia ( 21 , 22 ). Summary Garlic contains antioxidants that protect against cell damage and aging'),
(103, 9, ' ginger ', ' Ginger is one of the rhizome underground part of the stem is the part commonly used as a spice. It is often called ginger root, or simply ginger.Ginger can be used fresh, dried, powdered, or as an oil or juice, and is sometimes added to processed foods and cosmetics.Gingerol is the main bioactive compound in ginger, responsible for much of its medicinal properties. It has powerful anti-inflammatory and antioxidant effects'),
(104, 9, ' onions ', ' Onions are nutrient-dense, meaning they\'re low in calories but high in vitamins and minerals.  May Benefit Heart Health. Loaded With Antioxidants.  Contain Cancer-Fighting Compounds.  Help Control Blood Sugar. May Boost Bone Density. Have Antibacterial Properties.  May Boost Digestive Health'),
(105, 9, ' peppers ', 'Here are five reasons to increase your red pepper consumption: Red peppers contain more than 200 percent of your daily vitamin C intake.  Red bell peppers are a great source of vitamin B6 and folate. Red bell peppers help support healthy night vision. ... Red bell peppers are packed with antioxidants'),
(106, 9, ' tomatoes ', 'Tomatoes are the major dietary source of the antioxidant lycopene, which has been linked to many health benefits, including reduced risk of heart disease and cancer. They are also a great source of vitamin C, potassium, folate, and vitamin K.'),
(107, 10, 'cinnamon', ' cinnamon is one of the most delicious and healthiest spices on the planet. It can lower blood sugar levels, reduce heart disease risk factors and has a plethora of other impressive health benefits. Just make sure to get Ceylon cinnamon or stick to small doses if you\'re using the Cassia variety'),
(108, 10, ' beet ', ' Beets boast an impressive nutritional importance which are: Help Keep Blood Pressure in Check.  Can Improve Athletic Performance.  May Help Fight Inflammation.  May Improve Digestive Health.  May Help Support Brain Health.  May Have Some Anti-Cancer Properties.  May Help You Lose Weight.'),
(109, 10, ' carrot ', 'arrots contain vitamin A, antioxidants, and other nutrients. Evidence suggests that eating more antioxidant-rich fruits and vegetables, such as carrots, can help reduce the risks of cancer and cardiovascular disease. Carrots are also rich in vitamins, minerals, and fiber'),
(110, 10, ' cassava ', 'Cassava is a calorie-rich vegetable that contains plenty of carbohydrate and key vitamins and minerals. Cassava is a good source of vitamin C, thiamine, riboflavin, and niacin'),
(111, 10, ' potatoes ', ' The potato\'s fiber, potassium, vitamin C, and vitamin B6 content, coupled with its lack of cholesterol, all support heart health. Potatoes contain significant amounts of fiber. Fiber helps lower the total amount of cholesterol in the blood, thereby decreasing the risk of heart disease'),
(112, 10, ' radish ', 'itamin C is an antioxidant that helps battle free radicals in your body and helps prevent cell damage caused by aging, an unhealthy lifestyle, and environmental toxins. Vitamin C also plays a key role in collagen production, which supports healthy skin and blood vessels. Radishes contain small amounts of: potassium'),
(113, 10, ' taro ', 'Cocoyam is a root food that boast of many benefits for a healthy living. It has properties that prevent, fight and cure many diseases. Below the health expert warns against eating raw Cocoyam leaves and recommends how to cook Cocoyam to yield highest benefits to consumers. Taro root plays an important part in the antioxidant activity in our bodies. High level of vitamin A, vitamin C, and various other phenolic antioxidants found in taro root help to boost immune system and help eliminate dangerous free radicals from our system.'),
(114, 10, ' yam ', 'Yams are starchy tuber vegetables of West African origin. The yam vegetable has a lot of ritualism and symbolism associated with itself, especially in Africa, Asia and Latin America. Yam belongs botanically to the Dioscoreaceae family, in Dioscorea genus.Yam is a good source of energy and each 100 grams contain 118 calories. It is mainly composed of complex carbohydrates and soluble fiber. It is an excellent source of B complex vitamins like Vitamin B6, Vitamin B1, riboflavin, folic acid, pantothenic acid and niacin. It also contains a good amount of antioxidants and Vitamin C.  It provides around 20% of the required Vitamin C in the body per 100 grams.'),
(115, 11, ' brussels ', 'Brussels sprouts contain small amounts of vitamin B6, potassium, iron, thiamine, magnesium and phosphorus (1). Summary: Brussels sprouts are low in calories but high in many nutrients, especially fiber, vitamin K and vitamin C'),
(116, 11, ' broccoli ', 'Broccoli is a great source of vitamins K and C, a good source of folate (folic acid) and also provides potassium, fiber. Vitamin C – builds collagen, which forms body tissue and bone, and helps cuts and wounds heal. Vitamin C is a powerful antioxidant and protects the body from damaging free radicals'),
(117, 11, ' cauliflower ', 'Cauliflower is an excellent source of vitamins and minerals, containing some of almost every vitamin and mineral that you need'),
(118, 11, ' corchorus ', 'Nutritionally, the leaves offer an appreciable amount of vitamin C, beta-carotene (pre-vitamin A), calcium and iron. The fiber helps keep the intestines running smoothly. Fiber also helps in the prevention of certain cancers'),
(119, 11, ' cucumber ', 'Cucumbers are low in calories but high in many important vitamins and minerals: It Contains Antioxidants. It Promotes Hydration.  It May Aid in Weight Loss.  It May Lower Blood Sugar.  It Could Promote Regularity. Easy to Add to Your Diet.'),
(120, 11, ' flutted pumpkin ', 'Here are some nutritional benefits of fluted pumpkin leaves or vegetables; Good Source of Dietary Fibre.  Maintains the Body Tissues. Rich in Antioxidants.  Balances the Hormones.  Serve as Anti-Diabetic Agent. Improves Blood Production.  Improves the Bones and Teeth.  Treat Convulsion.'),
(121, 11, ' luttuce ', 'Lettuce can help you to meet the standard daily requirements for several vitamins and minerals. They include: Vitamin C, a powerful antioxidant that helps keep your immune system healthy.'),
(122, 11, ' silverbeet ', 'Silverbeet is a good source of vitamins A, C, B6 and K (important for helping your blood to clot). It also contains riboflavin and folate and minerals such as potassium (which helps to regulate blood pressure) and manganese (involved in the regulation of brain and nerve function).'),
(123, 11, ' spinach ', ' Dark, leafy greens like spinach are important for skin, hair, and bone health. They also provide protein, iron, vitamins, and minerals');
INSERT INTO `subcategory` (`id`, `cate_id`, `name`, `des`) VALUES
(124, 11, ' zucchini ', ' This popular succulent vegetable does well in warm weather, in places with moist, fertile soil. It takes 35 to 60 days from planting to first harvest. The plant grows to a height of two and a half feet. For best flavor, zucchini fruits are harvested when they are 4-8 inches. Zucchini is high in water. It also contains significant amounts of fiber, electrolytes, and other nutrients that are necessary for a healthy digestive system'),
(125, 5, 'groundnut', 'Groundnut are as popular as they are healthy. They\'re an excellent plant-based source of protein and high in various vitamins, minerals, and plant compounds. They can be useful as a part of a weight loss diet and may reduce your risk of both heart disease and gallstones'),
(126, 11, 'jute leave', 'Jute is rich in minerals, vitamins and antioxidants. It also contains iron, calcium, sodium, phosphorus, potassium, proteins, fibers, Vitamins A, C and E, riboflavin, niacin and folate. These are nutrients that help the body to fight diseases and maintain good health'),
(127, 1, 'ice cream', 'Ice cream isn\'t exactly a health food. Its main ingredients are cream, milk, sugar and flavoring. That being said, ice cream does provide your body with a handful of key nutrients, including bone-strengthening calcium and , blood-pressure-lowering potassium and energizing B vitamins'),
(128, 10, 'yam_flakes', 'Yams are starchy tuber vegetables of West African origin. The yam vegetable has a lot of ritualism and symbolism associated with itself, especially in Africa, Asia and Latin America. Yam belongs botanically to the Dioscoreaceae family, in Dioscorea genus.Yam is a good source of energy and each 100 grams contain 118 calories. It is mainly composed of complex carbohydrates and soluble fiber. It is an excellent source of B complex vitamins like Vitamin B6, Vitamin B1, riboflavin, folic acid, pantothenic acid and niacin. It also contains a good amount of antioxidants and Vitamin C.  It provides around 20% of the required Vitamin C in the body per 100 grams.'),
(129, 10, 'cassava_flakes', 'Cassava is a calorie-rich vegetable that contains plenty of carbohydrate and key vitamins and minerals. Cassava is a good source of vitamin C, thiamine, riboflavin, and niacin'),
(130, 6, 'vegetable_oil', 'Vegetable oil is derived from rapeseed, a flowering plant, and contains a good amount of monounsaturated fats and a decent amount of polyunsaturated fats. Of all vegetable oils, canola oil tends to have the least amount of saturated fats. It has a high smoke point, which means it can be helpful for high-heat cooking'),
(131, 7, 'egg', 'Eggs are a very good source of inexpensive, high quality protein. More than half the protein of an egg is found in the egg white along with vitamin B2 and lower amounts of fat than the yolk. Eggs are rich sources of selenium, vitamin D, B6, B12 and minerals such as zinc, iron and copper'),
(132, 10, 'cocoyam', 'Cocoyam is a root food that boast of many benefits for a healthy living. It has properties that prevent, fight and cure many diseases. Below the health expert warns against eating raw Cocoyam leaves and recommends how to cook Cocoyam to yield highest benefits to consumers.\r\nTaro root plays an important part in the antioxidant activity in our bodies. High level of vitamin A, vitamin C, and various other phenolic antioxidants found in taro root help to boost immune system and help eliminate dangerous free radicals from our system.'),
(133, 11, 'water  leaf', 'Waterleaf is an annual herbaceous plant of West Africa that is seen in most of the states in Nigeria mainly in the south. It is called Gbure in Yoruba; Mgbolodi in Igbo, in Edo, it is regarded as Ebe-dondon and generally referred to as waterleaf.\r\nThis vegetable contains lots of water and nutrients such as minerals, vitamins, crude fibre, lipids, crude protein and other which make them nutritious and medicinal in several ways such as\r\nRegular consumption of this vegetable has a good effect on the cognitive ability because of the presence of certain constituents which helps to improve cerebral blood flow and cognitive function\r\nThe crude protein contained in waterleaf is an important supplement both in quality and nutritional perspective which play a very important role in the human blood cell.\r\nWaterleaves, when consumed on daily basis, perform a key role in the maintaining the cardiovascular system');

-- --------------------------------------------------------

--
-- Table structure for table `warbank`
--

CREATE TABLE `warbank` (
  `id` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(50) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `accounnumber` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `bkid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warbank`
--

INSERT INTO `warbank` (`id`, `fn`, `ln`, `bankname`, `accounnumber`, `email`, `bkid`) VALUES
(1, '', '', 'Keystone', 2147483647, 'adioadeyoriazeez@gmail.com', 'BEFHrspGmDCqoAe'),
(2, 'websmithwater', 'balogunna', 'fcmb', 2147483647, 'adioadeyoriazeez@gmail.com', 'FCoqEDmrHAseGpB'),
(3, 'Adelani', 'balogun', 'sterling', 1234345678, 'adioadeyoriazeezh@yahoo.com', 'CoFpGsqmDABEeHr');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `war_id` int(11) NOT NULL,
  `bn` varchar(300) NOT NULL,
  `bty` varchar(30) NOT NULL,
  `cap` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `docconf` int(11) NOT NULL,
  `wloc` varchar(50) NOT NULL,
  `wstate` varchar(50) NOT NULL,
  `wcountry` varchar(50) NOT NULL,
  `locadd` varchar(400) NOT NULL,
  `de` varchar(20) NOT NULL,
  `pn` varchar(20) NOT NULL,
  `wid` varchar(50) NOT NULL,
  `noo` varchar(40) NOT NULL,
  `capacity` varchar(50) NOT NULL,
  `joined` int(20) NOT NULL,
  `conf` int(10) NOT NULL,
  `imgp` varchar(200) NOT NULL,
  `img` varchar(225) NOT NULL,
  `intimg` varchar(222) NOT NULL,
  `cac` varchar(225) NOT NULL,
  `insimg` varchar(225) NOT NULL,
  `maa` varchar(226) NOT NULL,
  `cal` varchar(225) NOT NULL,
  `nafdac` varchar(220) NOT NULL,
  `nafreg` varchar(222) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `ap` int(11) NOT NULL,
  `confd` int(20) NOT NULL,
  `bk` int(11) NOT NULL,
  `bkid` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `sn` varchar(20) NOT NULL,
  `log` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `pach` int(11) NOT NULL,
  `paup` int(11) NOT NULL,
  `pachdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`war_id`, `bn`, `bty`, `cap`, `email`, `password`, `salt`, `docconf`, `wloc`, `wstate`, `wcountry`, `locadd`, `de`, `pn`, `wid`, `noo`, `capacity`, `joined`, `conf`, `imgp`, `img`, `intimg`, `cac`, `insimg`, `maa`, `cal`, `nafdac`, `nafreg`, `batch`, `ap`, `confd`, `bk`, `bkid`, `about`, `sn`, `log`, `token`, `pach`, `paup`, `pachdate`) VALUES
(14, 'azFarmexr346', 'single', '', 'adioadeyoriazeezh@yahoo.com', '574784e8468b6b8176744787fad4e716f7602ed69e6f43f599ee725f43ce5503', 'øú„\ZcÕr@(œf#$Å,×Þ$CÖ´l,zÅIA', 1, '56', '5', 'nigeria', '7, Gunning Road, Abakaliki, Ebonyi, Nigeria', '1555418499', '08189710194', '2DTQGB7FI1', 'ifeokwu', '20000', 2147483647, 1, '', 'cheklog.jpg', '', '', '', '', '', '', '', 'UcRiYkorLDtZfgwQvxn2e97VzFWKsdj1mBySq56AEHlX3pTGN8hCauI04bMJPO', 19, 1550185200, 1, 'CoFpGsqmDABEeHr', '', '', 1555423715, '84442960ec940ac400416bb684ec8a64', 0, 0, ''),
(15, 'azFarmexr3', 'group', '', 'jobsiteonlyforadeyori.com', 'e34103fc5a3b72f3f2e98e2e50a169fd8f46618245ab2f5ed9f09c99166572c9', '±ubÆ,y˜²(cv9ìiWöþµu¸%ÊÊ3U`\r', 0, '102', '8', 'nigeria', '114,jigawa', '09-08-2009', '08064374020', '5279346108', 'adonama', '6900', 2147483647, 0, 'f3j29YSuecdH.jpg', '', '', '', '', '', '', '', '', '2xjQdpZ946tXGzgDew5oc70YWBLEfHlARShPr3KTb1VqkMJFCmNu8IOyasnviU', 19, 1555365600, 0, '', '', '', 0, '', 1, 19, '2019-04-16'),
(20, 'azFarmexr344', 'single', '345678', 'adioadeyoriazeez@gmail.com', 'cb3bc2735b7af89a436a2af37bbb5323ab83f18ed5ee38de8b060349e0981988', 'µÌË°ÿÌœ\r#Cájù£û‘eËXÖÈ>;ßGñ¦Rˆ', 1, '873', '28', '', '7, Gunning Road, Abakaliki, Ebonyi, Nigeria', '1557943137', '090989710109', '', '', '', 0, 1, 'YJEcewR0IfcS.jpg', 'dASwjGSXed2H.jpg', 'ARY9YndfIhbh.jpg', 'Hr9YMe20AG50.jpg', 'ecoVEsTf67DX.png', '6nojdAdd7jO1.jpg', 'ItEdGe2hhhW3.jpg', 'sdemIAntZ2Sj.jpg', 'dftyrf3ert', 'jLf7YCmb20JXxaSzN5K9wQkTBD4GVi3cWyvR6EsMld1nOHthguroeIP8pZUAqF', 13, 1546988400, 1, 'FCoqEDmrHAseGpB', 'Grandmotherprogrammer, programmed for  80 years and still a programmer at 96', '980092323232', 1558065180, 'fb20cf25e2d2924a403e026aa893d15a', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `warpay`
--

CREATE TABLE `warpay` (
  `id` int(11) NOT NULL,
  `bn` varchar(200) NOT NULL,
  `em` varchar(225) NOT NULL,
  `am` float NOT NULL,
  `ref` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wgoods`
--

CREATE TABLE `wgoods` (
  `id` int(11) NOT NULL,
  `ca` varchar(120) NOT NULL,
  `ca_id` int(11) NOT NULL,
  `su` varchar(120) NOT NULL,
  `su_id` int(11) NOT NULL,
  `na` varchar(200) NOT NULL,
  `ty` varchar(200) NOT NULL,
  `co` varchar(300) NOT NULL,
  `ma` float NOT NULL,
  `pi` int(11) NOT NULL,
  `ml` float NOT NULL,
  `ms` float NOT NULL,
  `wo` float NOT NULL,
  `am` float NOT NULL,
  `twa` float NOT NULL,
  `od` float NOT NULL,
  `ia` float NOT NULL,
  `gi1` varchar(64) NOT NULL,
  `nc` int(11) NOT NULL,
  `gi2` varchar(64) NOT NULL,
  `gi3` varchar(64) NOT NULL,
  `gi4` varchar(64) NOT NULL,
  `de` text NOT NULL,
  `cd` text NOT NULL,
  `up` text NOT NULL,
  `puvc` varchar(20) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `da` int(20) NOT NULL,
  `ti` int(20) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `ps` int(11) NOT NULL,
  `pr` int(11) NOT NULL,
  `wid` varchar(20) NOT NULL,
  `ws` int(11) NOT NULL,
  `wr` varchar(150) NOT NULL,
  `so` int(11) NOT NULL,
  `conf` int(11) NOT NULL,
  `ptr` int(11) NOT NULL,
  `ap` int(11) NOT NULL,
  `confd` int(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `promo` float NOT NULL,
  `ss` int(11) NOT NULL,
  `hd` varchar(40) NOT NULL,
  `storage` varchar(500) NOT NULL,
  `spn` varchar(20) NOT NULL,
  `upd` varchar(50) NOT NULL,
  `upby` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wgoods`
--

INSERT INTO `wgoods` (`id`, `ca`, `ca_id`, `su`, `su_id`, `na`, `ty`, `co`, `ma`, `pi`, `ml`, `ms`, `wo`, `am`, `twa`, `od`, `ia`, `gi1`, `nc`, `gi2`, `gi3`, `gi4`, `de`, `cd`, `up`, `puvc`, `batch`, `da`, `ti`, `pid`, `ps`, `pr`, `wid`, `ws`, `wr`, `so`, `conf`, `ptr`, `ap`, `confd`, `rating`, `promo`, `ss`, `hd`, `storage`, `spn`, `upd`, `upby`) VALUES
(74, 'poultry', 7, 'chicken', 87, 'broiler fowl', 'Life', 'Whole', 5000, 0, 0, 0, 50000000, 2200, 22000, 0, 2200, 'bfow2f3058714269.jpg', 10000, 'bfow2f3058714269.jpg', 'bfowlf3058714269.png', 'bfowlf3058714269.png', 'is a bird , the meat is good for consumption', 'in clean pen', '', '14aE08mgBQV', 'cZOWeT6qsA9VMwa8JovYjtkxhQy7HzdX53FbIBE0NLulgC2rPiGpDUfS4nKm1R', 1546383600, 1546461273, 'f3058714269', 11, 0, '20w', 12, '220', 2, 1, 0, 0, 0, 1, 46.32, 0, '598662000', '114, Yejide road molete', '08064374020', '1546383600', ''),
(75, 'dairies', 1, 'milk', 3, 'Naturally extrated caw milk', 'Fresh', 'Bottle', 12000, 0, 0, 0, 12000000, 1028, 2, 1046, 12000, 'milkf3058714269.jpg', 0, 'milk - Copy (3)f3058714269.jpg', 'milk - Copyf3058714269.jpg', 'milk - Copy (2)f3058714269.jpg', 'Fresh cow milk is product that is naturally extracted from life cow. the product is good for human consumption because of the present of lactose which is dissacharide consist of glucose and galactose. the glucose monomer can be flush into Ent-Meyerhoff pathway which galactose can enter the pahtway in alternative fate.so milk is therefore source of high energy nutrition ', 'save in fridge', '', '14ao3riEcMY', 'lxRs6r1GLj3I5iJST4ohtUYmv278A9pdXQuNeH0CykcVnWEzMqfaZwPKDgbBOF', 1558047600, 1550271600, 'f3058714269', 11, 0, '20w', 7, '290', 1, 1, 0, 0, 0, 3, 23.33, 0, '598662000', '114, Yejide road molete', '08064374022', '1555020000', ''),
(76, 'vegetables', 11, 'zucchini', 124, 'Jute leave on heap', 'Fresh', 'Bunch', 12, 0, 0, 0, 109, 130, 0, 132, 150, 'ewedu - Copy (2)f3058714269.jpg', 0, 'ewedu - Copyf3058714269.jpg', 'eweduf3058714269.jpg', 'ewedu - Copy (3)f3058714269.jpg', 'good for you and baby inside you as a pregnant woman', 'in storage farm yard', '', '7ak0HL1Ewm', '4YOLUurZPG1fw9b3XtJdsIxz0a7kqh2Fjvmp6ilNAVRgCEcyWTeKoMBQnS5HD8', 1558047600, 1550271600, 'f3058714269', 11, 0, '20w', 14, '500', 2, 1, 0, 13, 1546383600, 3, 14.99, 0, '598662000', '114, Yejide road molete', '08064374021', '1555020000', ''),
(77, 'livestock', 4, 'cattle', 56, 'Sokoto cow', 'Life', 'Whole', 600800, 10, 33, 12, 600800, 120000, 0, 0, 120000, 'Cow.jpg', 1, 'Cow .jpg', 'cow.jpg', 'cow - Copya5632471890.jpg', 'the flesh contain a lot of mineral. the cow i strong and healthy', 'pasture field', '', '14a0lNb75gR', 'd4IJZg2ouEMW6YXmsh9UnNx5p7bCSH3PtvFRKc8Ql1i0qrkBfwVOjyezLDaAGT', 1546383600, 1546406009, 'a5632471890', 12, 0, '20w', 15, '1009', 1, 1, 0, 13, 1547161200, 1, 50.01, 0, '598662000', '114, Yejide road molete', '08064374456', '1555020000', ''),
(78, 'poultry', 7, 'fowl', 89, 'jungle fowl', 'Life', 'Whole', 120, 0, 0, 0, 1200, 1200, 0, 0, 1200, 'fowl1f3058714269.jpg', 30, 'bfowlf3058714269.png', 'fowl2f3058714269.png', 'bfow2f3058714269.jpg', 'life fowl', 'in pen', '', '14aTAODJNoi', 'IhPiAUzorWG01XFmqEwCn7VLleMSZQD8t3vOx6uRcYKs9kyHBTjfbpd4NaJ25g', 1547074800, 1547142158, 'a5326790814', 11, 0, '20w', 14, '78', 1, 1, 0, 0, 1547161200, 3, 49.6, 0, '598662000', '114, Yejide road molete', '080643742345', '1547074800', ''),
(79, 'dairies', 1, 'milk', 3, 'banj ab fulani milk', 'Fresh', 'Bottle', 150, 0, 0, 0, 1500, 475, 5400, 483, 540, 'milk - Copy (2)f3058714269.jpg', 0, 'milkf3058714269.jpg', 'milk - Copyf3058714269.jpg', 'milk - Copy (3)f3058714269.jpg', 'fresh cow milk is a natural source milk that good for human healthwertyuiop[ertyuio, this milk is harvested on /01/2019 ', 'store in refrigerator', '', '15aFnbYszdc', 'lB8DEn1m9HSGdQgAMstPr3bIjWRpTJzC6oxyVaOwf7YZKh2q5X4cLuNevk0iUF', 1558047600, 1550271600, 'a5326790814', 11, 0, '15w', 31, '45', 1, 1, 0, 13, 1547161200, 3, 8.6, 0, '598662000', '114, Yejide road molete', '08064374090', '1555020000', ''),
(85, 'poultry', 7, 'fowl', 89, 'Broiler fowl', 'Dried', 'Bunch', 400, 0, 0, 0, 400, 2345, 23450, 0, 2345, 'Aj2ituXddoD0.jpg', 10, 'whcjjKHU9dd2.png', '', '', 'this is the latest product', '', '', '15a54wRgEF1', 'S4uapQMJge1ohvGUKzxZkAb7VnDL38c6WrRdCl9HTqi2P5sFy0tmjYXEfBOINw', 1547679600, 1547756943, 'a5326790814', 12, 205, '14w', 9, '115', 1, 1, 0, 19, 1550185200, 1, 33.3, 0, '598662000', '114, Yejide road molete', '08064374087', '1547679600', ''),
(86, 'livestock', 4, 'cattle', 56, 'Cow ', 'Life', 'Basket', 180000, 0, 0, 0, 630000, 180000, 80730, 0, 345, 'Cow.jpg', 234, 'Cow.jpg', '', '', '', '', '', '15a54wRgEF1', '9SpVfJi1t3yCecjADxoQnmIKU4F25EPzsNbRghdTOZ8WrqHYaw0LuGM6BlkX7v', 1547679600, 1547758782, 'a5326790814', 12, 205, '0', 15, '320', 2, 1, 0, 19, 1550185200, 1, 72.4, 0, '1517526000', '114, Yejide road molete', '08064374023', '1547679600', ''),
(88, 'grains', 3, 'beans', 42, 'oloyin bean', 'Iced', 'Bunch', 27840, 0, 0, 0, 0, 3232, 0, 0, 3232, 'qX29EeH7mPYW.jpg', 0, '3hSMDd2mjjSf.jpg', '', '', '', '', '', '15a54wRgEF1', 'h4FCLuegViyGNMtE1ZspPASJH9mjcRorI3vB7XQWxzkKq2fY8Tnd0alUbDwO56', 1547679600, 1547759412, 'a5326790814', 12, 205, '15', 16, '412', 1, 1, 0, 19, 1550185200, 1, 65, 0, '1229108460', '114, Yejide road molete', '08064374345', '1547679600', ''),
(91, 'poultry', 7, 'fowl', 89, 'broiler', 'Fresh', 'Chunk', 12, 0, 0, 0, 5316, 34, 15062, 0, 34, 'QJW99AG9iHK2.jpg', 443, 'y9929SG9eRTD.png', '', '', '', '', '', '7amqAz9STI9', 'AbfwacPTHiQj9uvsoYrm1x6LztIBFK2dJRVONglSDy0q3GCWEenhp7UkM48XZ5', 1547679600, 1547690809, 'f3058714269', 11, 0, '7', 10, '159', 2, 1, 0, 19, 1550185200, 1, 80.1, 0, '1545346800', '114, Yejide road molete', '08064374011', '1547679600', ''),
(93, 'fruits', 2, 'apple', 5, 'Purple Apple  ', 'Fresh', 'Create', 450, 0, 0, 0, 3600, 3058, 28800, 3112, 3200, '3cwOSGd2D7Hd.jpg', 8, '0hHPWigdcUMS.jpg', '', '', 'This apple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '', '', '24gaxKIboOu8', 'bxs2kTBEDm3u4cyRPOCZUnJq5dwKhS6zoIGXYlF8NvteVQa019gALWifMpjH7r', 1558047600, 1550209770, 'a5326790814', 12, 205, '24g', 9, '105', 1, 1, 0, 19, 1550358000, 0, 83.3, 0, '1549407600', '114, Yejide road molete', '08064374020', '1555020000', ''),
(94, 'tubers', 10, 'yam', 114, 'white yam', 'Fresh', 'Pack', 500, 0, 0, 0, 10000, 1200, 24000, 0, 1200, 'diDAeI423rZ9.jpg', 20, 'hhnhYH9ET32G.jpg', '', '', 'This yam is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Tue 12 Feb 2019 uploaded by  azFarmex. ', '', '', '24gaxKIboOu8', 'Md41a9UuDy0QBAeCpc86iobKGYTXOhEgRlnqLHvwmS2fFI3zNjWts75kxPJrVZ', 1550358000, 1550418943, 'a5326790814', 12, 205, '24g', 31, '1005', 1, 1, 0, 19, 1550358000, 0, 0, 0, '1549926000', '114, Yejide road molete', '080643740123', '1550358000', ''),
(98, 'tubers', 10, 'cassava_flakes', 129, 'Yellow gari', 'Fried', 'Bag', 20000, 0, 0, 0, 200000, 6200, 62000, 0, 6200, '7h9yS0wSjie4.jpg', 10, '4dh59SQ7fPbc.jpg', '', '', 'This Cassava_flakes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Wed 06 Feb 2019 uploaded by  azFarmex. ', '', '', '24gami9XB7yd', 'E9LFmws6eMyGVKkfAOUnruqgRI7aCt18cS2DhYbHd5lpPJjoTW3Qv4XZxizNB0', 1550358000, 1550440311, 'a5326790814', 12, 205, '24g', 9, '106', 2, 1, 0, 19, 1550358000, 0, 0, 0, '1549407600', '114, Yejide road molete', '08064374009', '1550358000', ''),
(99, 'tubers', 10, 'cassava_flakes', 129, 'Yellow gari2', 'Fried', 'Bag', 60000, 0, 0, 0, 1200000, 2230, 44600, 0, 2230, '4dh59SQ7fPbc.jpg', 20, 'Z1OHHUA90w2Y.jpg', '', '', 'This Cassava_flakes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Fri 01 Feb 2019 uploaded by  abppreversity. ', '', '', '1fam0TMRkvp', 'hdmNTDwv5EIznLkWFe340Qlb8CKV7YBafRMO62ZJgySX9qu1roPUsHtxGpciAj', 1550358000, 1550397505, 'f4752319608', 31, 952, '1f', 7, '97', 2, 1, 0, 19, 1555279200, 0, 0, 0, '1548975600', '114, Yejide road molete', '080643740234', '1550358000', ''),
(100, 'nuts', 5, 'cashew', 68, 'Cashew Nut', 'Dried', 'Pack of seeds', 20, 0, 0, 0, 80, 540, 2160, 0, 540, 'eaSSMHdAjU72.png', 4, 'cfosAeetcEbd.jpg', '', '', 'This cashews is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  abppreversity. ', '', '', '1faY5qI2Xis', 'OFgxasLCcYrbde0QUS5jIio8lAzVEtWBZumhXHvGNJfw31D9KqRy7kM42T6npP', 1550444400, 1550466413, 'f4752319608', 31, 952, '1f', 31, '974', 2, 1, 0, 19, 1550444400, 0, 0, 0, '1548975600', '114, Yejide road molete', '08064374123', '1550444400', ''),
(105, 'poultry', 7, 'fowl', 89, 'Broiler white fowl', 'Life', 'Whole', 2000, 0, 0, 0, 12000, 2500, 15000, 0, 2500, 'IoAGEdnH2Vc2.jpg', 6, 'Pj6uiSZ9VJDY.jpg', '', '', 'This fowl is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Thu 01 Jan 1970 uploaded by  azFarmex. ', '', '', '24gab7vSJd30', 'FaOtkCiW4wJVLZfrcu8nIUhRbM56mgy17DpXl0vBHzeSsPodKG3xE2QTjNAq9Y', 1555106400, 1555188806, 'a5326790814', 12, 205, '24g', 10, '154', 1, 1, 0, 0, 1555452000, 0, 0, 0, '1555279200', '234 sataret line line edelta', '08097976567', '1555106400', ''),
(107, 'oil', 6, 'Vegetable', 130, 'Mamador', 'Fresh', 'Container', 24000, 0, 0, 0, 240000, 6500, 65000, 0, 6500, 'palm_oil_1.jpg', 10, 'palm_oil_1.jpg', '', '', 'This Vegetable is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Thu 01 Jan 1970 uploaded by  azFarmex. ', '', '', '14waKokA7d9x', '5BwIuzZG3E8aUlVmPLA61OF94jc7oyrtJpCKqNMbSvidensWgDTfXY0hQx2RkH', 1555365600, 1555369288, 'f4752319608', 10, 179, '14w', 5, '63', 1, 1, 0, 13, 1555452000, 0, 0, 0, '1555365600', '7, Gunning Road, Abakaliki, Ebonyi, Nigeria', '08189710194', '1555365600', ''),
(108, 'sea_produce', 8, 'fishes', 96, 'Cat fish', 'Life', 'Pack', 10000, 0, 0, 0, 200000, 9600, 192000, 0, 9600, '9gdsKb06fJSd.jpg', 20, 'nUATj9coKHnG.jpg', '', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Thu 01 Jan 1970 uploaded by  cde-afgg. ', '', '', '20warFuqQO3A', 'Jae7QAYXSbx8t4LdnGj0M5oEghcOuprVHsBINqRCkZ269fi3PTUylDW1vmFKwz', 1555365600, 1555371566, 'f4752319608', 31, 952, '20w', 29, '873', 1, 1, 0, 13, 1555452000, 0, 52, 0, '', '', '090989710109', '1555365600', '4'),
(109, 'spices', 9, 'onions', 104, 'Alubasa', 'Fresh', 'Bunch', 200, 0, 0, 0, 400000, 1300, 2600000, 0, 1300, 'diAVmZDMO9K3.jpeg', 2000, '3SVHd2jaMofZ.jpg', '', '', 'This onions is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Edo  in  Benin-Ekuku  and is harvested on Fri 17 May 2019 uploaded by  azFarmex. ', '', '', '14wa8O4zJfiF', 'uocjBbE0YHwmPe1r5Fx3yQGL7VpNsCA9k6Ti2tXSz8DUnIhaWvK4fRJlZqMgdO', 1557698400, 1557736178, 'f4752319608', 10, 179, '14w', 5, '56', 1, 1, 0, 22, 1557698400, 0, 0, 0, '1558044000', '7, Gunning Road, Abakaliki, Ebonyi, Nigeria', '08189710194', '1557698400', 'a5326790814'),
(110, 'spices', 9, 'tomatoes', 106, 'Tomatoes', 'Fresh', 'Container', 300, 0, 0, 0, 3000, 750, 7500, 0, 750, '9ebMw03PT2j9.jpeg', 10, 'djoo999awA0d.jpeg', '', '', 'This tomatoes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Delta  in  WARRI-EDJEBA  and is harvested on Thu 16 May 2019 uploaded by  abppreversity. ', '', '', '1fapyueLYgA', 'fXxdFyvCzJU8YhZ6uR9kNqP4slK3021eQETBnWOpSLHgGcjA5MowirtbV7DmIa', 1557698400, 1557838252, 'f4752319608', 10, 179, '1f', 10, '179', 2, 1, 0, 22, 1557698400, 0, 0, 0, '1557957600', '114, Yejide road molete', '08189710194', '1557698400', '1'),
(111, 'grains', 3, 'pod_corn', 45, 'Agbado', 'Fresh', 'Bag', 20000, 0, 0, 0, 500000, 7500, 187500, 0, 7500, '29KeOVAyi69G.jpeg', 25, '4eotDG792H3r.jpeg', '', '', 'This 45#pod_corn is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Delta  in  WARRI-EDJEBA  and is harvested on Wed 15 May 2019 uploaded by  abppreversity. ', '', '', '1faH5vWlJ02', '87E5Cjno961OerYzwNK0BbxiHlguya3FWhISd4stGMZcXqfDUpv2kVJQLmPTRA', 1557784800, 1557853424, 'f4752319608', 10, 179, '1f', 10, '179', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557871200', '114, Yejide road molete', '08189710194', '1557784800', '1'),
(112, 'poultry', 7, 'egg', 131, 'Egg', 'Fresh', 'Create', 3500, 0, 0, 0, 56000, 650, 10400, 0, 650, 'd9eES2drdjSd.jpg', 16, 'dSHqkV9PdQsZ.jpg', '', '', 'This 131#egg is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3faiKNGygbD', 'HXorIJqwj0ZSLv6lV8bnTyEO3g597MpkKhQUmPDBWeC1Fuxi2zGNfsdcaYA4Rt', 1557784800, 1557857056, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557784800, 0, 0, 0, '', '4344r4', '222222222222', '1557784800', '3'),
(113, 'spices', 9, 'peppers', 105, 'Chilli pepper', 'Fresh', 'Basket', 120000, 0, 0, 0, 3600000, 3200, 96000, 0, 3200, 'baXn3tQhbhVd.jpg', 30, 'Td1dSG5eMidd.jpg', '', '', 'This 105#peppers is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Sun 12 May 2019 uploaded by  fdfdfddfd. ', '', '', '3farmAbeQwt', 'JA6Epz2x1wKO0rk4ZX8UBuqjiFgv5tQGNoWICdmShcV7LabnPYT9Rf3HlsMyDe', 1557784800, 1557857480, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557612000', '4344r4', '222222222222', '1557784800', '3'),
(114, 'poultry', 7, 'egg', 131, 'egg', 'Fresh', 'Basket', 3000, 0, 0, 0, 78000, 300, 7800, 0, 300, 'PdH4EdVni9cD.jpg', 26, 'Z0Oq5Ho7DT6Q.jpg', '', '', 'This 131#egg is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3faUelJY6cT', 'Y7KglQP3hSBFLzUad4ruIDbyGNkqRvi6XCf8opswHn10EWme5Ot9JcZTjMA2Vx', 1557784800, 1557857620, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557784800', '3'),
(115, 'poultry', 7, 'turkey', 93, 'Turkey', 'Life', 'Whole', 6800, 0, 0, 0, 34000, 4900, 24500, 0, 4900, 'o34hdZjHdfQw.jpg', 5, 'SSnddVQKd97e.jpg', '', '', 'This 93#turkey is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3fa6UPeryAx', 'DV5tOcx4KPilosEy9MAQ2mFRp80XHwBT1j3UkCZaLSgIz6GdJvY7bhfuNrenqW', 1557784800, 1557862029, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557784800', '3'),
(116, 'poultry', 7, 'duck', 88, 'white duck', 'Life', 'Whole', 5000, 0, 0, 0, 5000, 3900, 3900, 0, 3900, 'dGdkbjUYd9Z9.jpg', 1, 'ji9723De0nc9.jpg', '', '', 'This duck is a natural product, produce and package under control conditions which make  suitable for human consumption, this product is produced from   Edo  in  Benin-Ekuku  and is harvested on Thu 01 Jan 1970 uploaded by  azFarmex. ', '', '', '24gaboMpE1j3', 'M9pfElb2ez1gjOIDkniF6qtNdcyAvsZTLJo43PaxHhK8R0GSmWBrYQV57UCwuX', 1557784800, 1557823764, 'a5326790814', 12, 205, '24g', 3, '19', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557784800', '114, Yejide road molete', '', '1557784800', 'a5326790814'),
(117, 'dairies', 1, 'butter', 1, 'Devondale butter', 'Iced', 'Container', 500, 0, 0, 0, 10000, 750, 15000, 0, 750, 'm9HqnXVk35JQ.jpg', 20, 'H2WrDSndDS6H.jpg', '', '', 'This butter is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3fasyt4gDkK', '7InNoVcwlMyZBSjgqs3K4AFpJxPR52XvGmaTDUhE6CYLtbHQifd98zeWuOkr01', 1557784800, 1557824229, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557784800', '3'),
(118, 'dairies', 1, 'butter', 1, 'Magarine', 'Iced', 'Container', 350, 0, 0, 0, 7000, 350, 7000, 0, 350, 'HMrbc2TW4neg.jpg', 20, '12hc9emXA3PF.jpg', '', '', 'This butter is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3fabIS2rq6o', 'IBC1hdVxNqQptvU5JKuoyZH8Db3XTfaL2s9gAk4FnjSWRc0M6OzErm7YGiwePl', 1557784800, 1557824512, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557784800', '3'),
(119, 'dairies', 1, 'butter', 1, 'Milky mist', 'Iced', 'Container', 450, 0, 0, 0, 6750, 600, 9000, 0, 600, '1jQeMifAXd2m.jpg', 15, 'jbSAgVhaSJEQ.jpg', '', '', 'This butter is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3faelQp71Xi', 'fZ8FpsJ0yBI96oPbXDYmULGR4rigz7lCKuVHWjnMT25vtqekNc1hxd3EAaOwQS', 1557784800, 1557824638, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557784800', '3'),
(120, 'dairies', 1, 'milk', 3, 'Panhydric Milk', 'Fresh', 'Bottle', 700, 0, 0, 0, 21000, 4100, 123000, 0, 4100, 'jhRHsddqnn3d.jpg', 30, 'segASUdhEdAS.jpg', '', '', 'This milk is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Delta  in  WARRI-EDJEBA  and is harvested on Thu 01 Jan 1970 uploaded by  abppreversity. ', '', '', '1famkLPx7QJ', 'tk5mVOlLT387gwKpjcxJnRPdMyZiC9FbUfXr1sDq4hSoHzaEeNWvQA2I60GuBY', 1557784800, 1557825238, 'f4752319608', 10, 179, '1f', 10, '179', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557784800', '114, Yejide road molete', '08189710194', '1557784800', '1'),
(121, 'vegetables', 11, 'cucumber', 119, 'cucumber', 'Fresh', 'Pack of fruit', 4000, 0, 0, 0, 80000, 4300, 86000, 0, 4300, 'VD2GF2XjdHqj.jpg', 20, 'SYSGd9Vh9jme.jpg', '', '', 'This cucumber is a natural product, produce and package under control conditions which make  suitable for human consumption, this product is produced from   Edo  in  Benin-Ekuku  and is harvested on Thu 16 May 2019 uploaded by  azFarmex. ', '', '', '24garXzjwSX6', 'WkDovlps4LhTtzPfbKdJCI5xZqyj0OFVQH3MaeiNrEmgwUY9B62X1S8nR7AucG', 1557784800, 1557826836, 'a5326790814', 12, 205, '24g', 12, '205', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557957600', '7a, otunubi street off college road, haruna b/stop, ogba', '08064374020', '1557784800', 'a5326790814'),
(122, 'fruits', 2, 'apple', 5, 'Apple', 'Fresh', 'Create', 6000, 0, 0, 0, 138000, 1220, 28060, 0, 1220, 'ehQDhSqHWVu9.jpg', 23, 'dVhGfdPdkiYD.jpg', '', '', 'This apple is a natural product, produce and package under control conditions which make  suitable for human consumption, this product is produced from   Borno  in  AUNO  and is harvested on Thu 16 May 2019 uploaded by  azFarmexsdfg. ', '', '', '26gaoFrIE0Rv', 'ijQTY6hUGuNx9wnH241vqLaty8sRDcEVzlCMPgker0bSXmdWOBfK3pIoJZ57AF', 1557784800, 1557923668, 'a8729514063', 12, 205, '26g', 8, '101', 2, 1, 0, 22, 1557784800, 0, 0, 0, '1557957600', '7a, otunubi street off college road, haruna b/stop, ogba', '090989710178', '1557784800', 'a8729514063'),
(123, 'fruits', 2, 'banana', 8, 'Banana', 'Fried', 'Bunch', 1200, 0, 0, 0, 30000, 800, 20000, 0, 800, 'JSyScdAA2j4j.jpg', 25, '5HeA29VRoddi.jpg', '', '', 'This banana is a natural product, produce and package under control conditions which make  suitable for human consumption, this product is produced from   Borno  in  AUNO  and is harvested on Wed 15 May 2019 uploaded by  azFarmexsdfg. ', '', '', '20waYkMes4gv', 'azh5rgvSB26DF9K8QcGl3mU7wZ4YIRyOokuebWtAfdTCjENn1qHpJxiPVM0XsL', 1557784800, 1557924122, 'f4752319608', 10, 179, '20w', 28, '873', 1, 1, 0, 22, 1557784800, 0, 0, 0, '1557871200', '7, Gunning Road, Abakaliki, Ebonyi, Nigeria', '090989710109', '1557784800', 'a8729514063'),
(124, 'fruits', 2, 'apricot', 6, 'Avocado', 'Fried', 'Pack', 2340, 0, 0, 0, 28080, 890, 10680, 0, 890, 'YideR7e9D6dd.jpg', 12, 'okr23u20MH1h.jpg', '', '', 'This apricot is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Tue 07 May 2019 uploaded by  fdfdfddfd. ', '', '', '3fa6WUDYRz5', 'P6Te3fBbu2nCFrzhlj4dDO7ymow8INSWUv910tRgsMEX5HxJqQYkapGZicKVAL', 1557784800, 1557924785, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557180000', '4344r4', '222222222222', '1557784800', '3'),
(125, 'fruits', 2, 'banana', 8, 'banana', 'Fresh', 'Bunch', 1234, 0, 0, 0, 16042, 1240, 16120, 0, 1240, 'ndDYyoSmtnJ3.jpg', 13, 'aHJMTrKd3VU2.jpg', '', '', 'This banana is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Sat 11 May 2019 uploaded by  fdfdfddfd. ', '', '', '3faE9MWQk5N', '7NW8Um3lRM4tVFB9HZgr2sbTLPdzSQeIXckoEOnyuwKJ6afqGvpi0C5Dhj1AYx', 1557784800, 1557924894, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557525600', '4344r4', '222222222222', '1557784800', '3'),
(126, 'fruits', 2, 'banana', 8, 'banana', 'Fresh', 'Bunch', 3090, 0, 0, 0, 40170, 1200, 15600, 0, 1200, 'jP2dbASoSdWj.jpg', 13, '9VHadZjXdhRf.jpg', '', '', 'This banana is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 09 May 2019 uploaded by  fdfdfddfd. ', '', '', '3faI7WODyUY', 'PjJrx8As67MldvUVHef9NaRzZmCup3tIhgWcXkyiSTDOw5QB2F0Eo4KGYbnL1q', 1557784800, 1557924970, 'f6870915469', 3, 18, '3f', 3, '18', 1, 1, 0, 22, 1557871200, 0, 0, 0, '1557352800', '4344r4', '222222222222', '1557784800', '3'),
(127, 'tubers', 10, 'potatoes', 111, 'potatoes', 'Fresh', 'Basket', 800, 0, 0, 0, 15200, 670, 12730, 0, 670, 'YjwZb2GS9SP4.jpg', 19, 'niuAgwAJGWVH.jpg', '', '', 'This potatoes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 09 May 2019 uploaded by  fdfdfddfd. ', '', '', '3fakvhXAGNm', 'AyI1tUMzsbXuhjqg4iPFfSBG7xYVNQOJcdmCDE65wk08orZaKl32WRTvep9nLH', 1557784800, 1557925137, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557352800', '4344r4', '222222222222', '1557784800', '3'),
(130, 'nuts', 5, 'cashew', 68, 'cashew  nut', 'Dried', 'Pack', 10000, 0, 0, 0, 200000, 2000, 40000, 0, 2000, 'brOM9AtGdo4f.jpg', 20, 'G3Gs3nSHHmDh.jpg', '', '', 'This cashews is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3faEGkUOPoX', 'VWRf3jE1iom8pxb0zr6BQnTIP9FSeqykgNaLMUuXtvl7GsYcKCHJOdZwDh542A', 1557871200, 1557935944, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557871200', '4344r4', '222222222222', '1557871200', '3'),
(131, 'nuts', 5, 'cashew', 68, 'cashew nut', 'Dried', 'Pack', 12000, 0, 0, 0, 144000, 1200, 14400, 0, 1200, 'hZHd0diA9U5b.jpg', 12, 'wiYc9EeIdhYD.jpg', '', '', 'This cashews is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3faBODXrV4J', 'Gf5ZXAaDHoRJz1L076Uiwqy9ruNYmVTcdpQxWBKt42MjCk3sEhnvFIO8eSbgPl', 1557871200, 1557936059, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557871200', '4344r4', '222222222222', '1557871200', '3'),
(132, 'fruits', 2, 'cherry', 13, 'Agbalumo', 'Fresh', 'Pack of fruit', 5000, 0, 0, 0, 60000, 600, 7200, 0, 600, 'SH093Qdn9SSd.jpg', 12, 'idnc14HRdGoE.jpg', '', '', 'This cherry is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Fri 10 May 2019 uploaded by  fdfdfddfd. ', '', '', '3faj6w1dBbS', 'KUpbELtmDB2lcnyNSHPfQxAj1zGYgFioCZVhX8673J9IdWOvR5qkMwTeasu4r0', 1557871200, 1557936157, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557439200', '4344r4', '222222222222', '1557871200', '3'),
(133, 'fruits', 2, 'cherry', 13, 'cherry', 'Fresh', 'Bunch', 7000, 0, 0, 0, 105000, 900, 13500, 0, 900, 'hjo0dSrusWiX.jpg', 15, 'dfIeSdhf9cdn.jpg', '', '', 'This cherry is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Sat 11 May 2019 uploaded by  fdfdfddfd. ', '', '', '3fa91joy4cw', 'siGnbIaoqg6lUHd8P3vzWrTBJ1Y9MDF7eNR2LtO4kcSwjpVfuE0QKxmCZ5AhXy', 1557871200, 1557936245, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557525600', '4344r4', '222222222222', '1557871200', '3'),
(134, 'fruits', 2, 'cherry', 13, 'Agbalumo', 'Fresh', 'Pack', 12000, 0, 0, 0, 240000, 5000, 100000, 0, 5000, 'hsJw0hfdGeh9.jpg', 20, 'SjAkEwVne560.jpg', '', '', 'This cherry is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Tue 14 May 2019 uploaded by  fdfdfddfd. ', '', '', '3fabMIw70nP', 'bBG5QxcvaH1ePVhkLt3oFlETudpmAisgCj9rWyUI4SwDnZ07q6zRMNOfJKX8Y2', 1557871200, 1557936345, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557871200', '3'),
(135, 'fruits', 2, 'coconut', 14, 'Agbon', 'Fresh', 'Pack', 500, 0, 0, 0, 7000, 800, 11200, 0, 800, 'TR3tXfd90EgS.jpg', 14, 'ZiiXMdPdfQj2.jpg', '', '', 'This coconut is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Sat 11 May 2019 uploaded by  fdfdfddfd. ', '', '', '3faAgEL46Vb', 'Phixk25EceWXjUbCTNd813Mtwv70p6InJsV4BHLlFGSQY9gzqoAOyZDfRrumKa', 1557871200, 1557936440, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557525600', '4344r4', '222222222222', '1557871200', '3'),
(136, 'fruits', 2, 'coconut', 14, 'Coconut', 'Fresh', 'Pack of fruit', 13000, 0, 0, 0, 273000, 8000, 168000, 0, 8000, '2OdFdGfR9nj2.jpg', 21, '9tbdE2W1s9SV.jpg', '', '', 'This coconut is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Fri 10 May 2019 uploaded by  fdfdfddfd. ', '', '', '3faNehz6Joj', '3AOTtGp8J2sjlkDg6VXMYeWd4z7Sn9owcihPR0EyrfHKBLmvbQxUaZCFqIN5u1', 1557871200, 1557936543, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557439200', '4344r4', '222222222222', '1557871200', '3'),
(137, 'tubers', 10, 'taro', 113, 'Cocoyam', 'Fresh', 'Basket', 500000, 0, 0, 0, 500000, 35000, 35000, 0, 35000, 'QHedd2mAru23.jpg', 1, 'KSTYESMSO9hd.jpg', '', '', 'This taro is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 09 May 2019 uploaded by  fdfdfddfd. ', '', '', '3farljvSqbK', '0LYxPTaEHyb3JeKO4n1U5Mt9f6As2GmIQdqlBkpWuV7XrRjihZwSgcNF8DvzCo', 1557871200, 1557936972, 'f6870915469', 3, 18, '3f', 3, '18', 1, 1, 0, 22, 1557871200, 0, 0, 0, '1557352800', '4344r4', '222222222222', '1557871200', '3'),
(138, 'fruits', 2, 'coconut', 14, 'coconut green', 'Fresh', 'Bunch', 4000, 0, 0, 0, 80000, 3000, 60000, 0, 3000, 'd5ddnoIWsbe4.jpg', 20, '71SUiVAhoMJg.jpg', '', '', 'This coconut is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Mon 13 May 2019 uploaded by  fdfdfddfd. ', '', '', '3fatNknV32M', '9KkQZWtH7V1reGYJcqT8blfIdFO3UPopmNXvzgAMi52Sj0hDawC4BnysLER6ux', 1557871200, 1557942505, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557698400', '4344r4', '222222222222', '1557871200', '3'),
(139, 'sea_produce', 8, 'fishes', 96, 'fish', 'Iced', 'Pack', 25000, 0, 0, 0, 375000, 15000, 225000, 0, 15000, '30ddsdhid2Jq.jpg', 15, 'X5Wd1RriGMye.jpg', '', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3faeHA1UX2L', 'JYRPap4O8lcdok2sNifxrnQDzFySChH9BMjA0mUKG6vXgLZTWbu3w5VqI71teE', 1557871200, 1557948756, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557871200', '4344r4', '222222222222', '1557871200', '3'),
(140, 'sea_produce', 8, 'fishes', 96, 'fish', 'Iced', 'Pack', 12000, 0, 0, 0, 168000, 12000, 168000, 0, 12000, '6eMjRAXS3mSS.jpg', 14, '1huGHG9MSsKd.jpg', '', '', 'This fishes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 01 Jan 1970 uploaded by  fdfdfddfd. ', '', '', '3faqoWg0zEK', 'mBIM31jGFWzuqrosVS0lfXvJLhUiYpC7HE9k2Q8ATZnw4gbecNRyPaOtd5xKD6', 1557871200, 1557948859, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557871200', '4344r4', '222222222222', '1557871200', '3'),
(141, 'tubers', 10, 'cassava_flakes', 129, 'Gari egba', 'Fried', 'Bag', 12000, 0, 0, 0, 60000, 5200, 26000, 0, 5200, 'sJdohMAcH1oj.jpg', 5, 'eHAcd2Sc99ba.jpg', '', '', 'This cassava_flakes is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Tue 14 May 2019 uploaded by  fdfdfddfd. ', '', '', '3faJEzSRUAi', 'khwnB0b8Ot9pqRE47aGCxJHiQP2TcUoZNl5eWFdXDKyuIrvLYzfmMS1sAg3j6V', 1557871200, 1557949048, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557871200', '3'),
(142, 'fruits', 2, 'grape', 18, 'grape', 'Fresh', 'Pack of fruit', 6000, 0, 0, 0, 36000, 1200, 7200, 0, 1200, 'HUTSQFhj9AIS.jpg', 6, 'KderSOUVcY2j.jpg', '', '', 'This grape is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Tue 14 May 2019 uploaded by  fdfdfddfd. ', '', '', '3faYnE3p8iJ', '4TWwb6z8um1R0QGsarvdUl7A3NLKiSZpjCxektHDVXMIBFgEf5oq9OcYhyn2PJ', 1557871200, 1557949189, 'f6870915469', 3, 18, '3f', 3, '18', 1, 1, 0, 22, 1557871200, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557871200', '3'),
(143, 'fruits', 2, 'grape', 18, 'grape', 'Fried', 'Bunch', 12000, 0, 0, 0, 60000, 5800, 29000, 0, 5800, '7sbU9a3S3eSc.jpg', 5, 'e9h0h9oahSsM.jpg', '', '', 'This grape is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Thu 09 May 2019 uploaded by  fdfdfddfd. ', '', '', '3fatpyDR0W8', 'Fl5IWHEwOhLrvd31izX9gD7nBcNRYUQoTZPJkjtu8sfb0yx4p6VCMKS2ameGAq', 1557871200, 1557949297, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557352800', '4344r4', '222222222222', '1557871200', '3'),
(144, 'fruits', 2, 'cashew', 12, 'cashew', 'Fresh', 'Bunch', 1200, 0, 0, 0, 1200, 900, 900, 0, 900, 'WsYiimA1UMjo.jpg', 1, '9schF9jVoMce.jpg', '', '', 'This caschew is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Akwa Ibom  in  IKOT EKPENE  and is harvested on Tue 14 May 2019 uploaded by  fdfdfddfd. ', '', '', '3fa1YPD5VWs', '6RUxNJcegy7KwAzSCt3FrpVEkjmauq40ib2OIPso8dHGB9nWhlfD5vYTQ1MZLX', 1557871200, 1557951269, 'f6870915469', 3, 18, '3f', 3, '18', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557784800', '4344r4', '222222222222', '1557871200', '3'),
(145, 'fruits', 2, 'orange', 26, 'orange', 'Fresh', 'Basket', 7500, 0, 0, 0, 157500, 2300, 48300, 0, 2300, 'ebVwhD3ddE2g.jpg', 21, 'dcbmh0WjnU1E.jpg', '', '', 'This orange is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Tue 07 May 2019 uploaded by  cde-afgg. ', '', '', '4fac2XW6xiN', 'tMp4W69ocg5SIxQ1AauF8JfOqjRs7PmE2LbKTGwedz0rhnUBXylDZvkC3VNiHY', 1557871200, 1557951763, 'f7752319608', 31, 952, '4f', 31, '952', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557180000', '114, Yejide road molete', '08064374020', '1557871200', '4'),
(146, 'fruits', 2, 'water', 33, 'water melon', 'Fresh', 'Basket', 10000, 0, 0, 0, 50000, 12000, 60000, 0, 12000, 'cb9O0DrAk9V6.jpg', 5, 'sdXnKdGid9Mb.jpg', '', '', 'This water is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Sat 11 May 2019 uploaded by  cde-afgg. ', '', '', '4fajQSy6WTm', 'IvQfWZCLdyA69o7j5uxFwskeq1HRzmOE20XNJTiS3gbcnDVlMKBaGp4UtY8rPh', 1557871200, 1557951892, 'f7752319608', 31, 952, '4f', 31, '952', 2, 1, 0, 22, 1557871200, 0, 0, 0, '1557525600', '114, Yejide road molete', '08064374020', '1557871200', '4'),
(147, 'fruits', 2, 'pineapple', 31, 'pineapple', 'Fresh', 'Basket', 12000, 0, 0, 0, 156000, 6000, 78000, 0, 6000, 'iMFVjQsDghd9.jpg', 13, 'VJhSUjDESHuj.jpg', '', '', 'This pineapple is a natural product, produce and package under control condition to be suitable for human consumption, this product is from  Oyo  in  IBADAN-ALAKIA  and is harvested on Fri 10 May 2019 uploaded by  cde-afgg. ', '', '', '4faWQXxmB19', 'WMpxbw6hFREGvCjceSqy8Ks0lU2Y1tDVQrXJ3PLAOBoaZ9niug4HINdT7kfzm5', 1557871200, 1557951989, 'f7752319608', 31, 952, '4f', 31, '952', 2, 0, 0, 22, 1557871200, 0, 0, 0, '1557439200', '114, Yejide road molete', '08064374020', '1557871200', '4');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `ci` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `ci`, `pid`) VALUES
(2, 18, 75),
(3, 18, 73),
(6, 18, 74),
(7, 112, 74),
(8, 112, 77),
(9, 112, 79),
(10, 12, 86),
(11, 12, 108),
(12, 12, 91),
(13, 12, 74),
(14, 12, 88);

-- --------------------------------------------------------

--
-- Table structure for table `wusers_session`
--

CREATE TABLE `wusers_session` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wusers_session`
--

INSERT INTO `wusers_session` (`id`, `users_id`, `hash`) VALUES
(1, 1, 'd4d84436f0285980a9b10850d47fc7dc1104ad3b2851bdb3b4'),
(2, 22, '46ade885e8f69082fb40e8c1a9f14d3e3614bf85ab539b7561'),
(5, 10, 'b9e49d01f1ec845a488382807cc0705cb433d0acfe6c3820d8'),
(8, 2147483647, '1f545e58bca077f1caf6089656eae4ff1bc9a1132fe24ef81c'),
(9, 2147483647, '9936cf407c7a76a30757d79b5f3aadc97fa0560559ff0a7606'),
(14, 19, 'bef41c0a55078438a2b67190b722d713f70374e946c5718b42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressbook`
--
ALTER TABLE `addressbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admbank`
--
ALTER TABLE `admbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_session`
--
ALTER TABLE `admin_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aggfarlist`
--
ALTER TABLE `aggfarlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aggregators`
--
ALTER TABLE `aggregators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agg_session`
--
ALTER TABLE `agg_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codetable`
--
ALTER TABLE `codetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country3`
--
ALTER TABLE `country3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_session`
--
ALTER TABLE `customers_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dedset`
--
ALTER TABLE `dedset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drec`
--
ALTER TABLE `drec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farbank`
--
ALTER TABLE `farbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fusers_session`
--
ALTER TABLE `fusers_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbank`
--
ALTER TABLE `logbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logistics`
--
ALTER TABLE `logistics`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `logves`
--
ALTER TABLE `logves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logvesdes`
--
ALTER TABLE `logvesdes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logvesdoc`
--
ALTER TABLE `logvesdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lusers_session`
--
ALTER TABLE `lusers_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `moneydis`
--
ALTER TABLE `moneydis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsteller`
--
ALTER TABLE `newsteller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifyfa`
--
ALTER TABLE `notifyfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifyw`
--
ALTER TABLE `notifyw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proli_orders`
--
ALTER TABLE `proli_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proli_orders_toanother`
--
ALTER TABLE `proli_orders_toanother`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejadmin`
--
ALTER TABLE `rejadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected`
--
ALTER TABLE `rejected`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejectedagg`
--
ALTER TABLE `rejectedagg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejectedfar`
--
ALTER TABLE `rejectedfar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejectedlog`
--
ALTER TABLE `rejectedlog`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `rejectedwar`
--
ALTER TABLE `rejectedwar`
  ADD PRIMARY KEY (`war_id`);

--
-- Indexes for table `salesrecord`
--
ALTER TABLE `salesrecord`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saletrend0`
--
ALTER TABLE `saletrend0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saletrend1`
--
ALTER TABLE `saletrend1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setsys`
--
ALTER TABLE `setsys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warbank`
--
ALTER TABLE `warbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`war_id`);

--
-- Indexes for table `warpay`
--
ALTER TABLE `warpay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wgoods`
--
ALTER TABLE `wgoods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wusers_session`
--
ALTER TABLE `wusers_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressbook`
--
ALTER TABLE `addressbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `admbank`
--
ALTER TABLE `admbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admin_session`
--
ALTER TABLE `admin_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aggfarlist`
--
ALTER TABLE `aggfarlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `aggregators`
--
ALTER TABLE `aggregators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `agg_session`
--
ALTER TABLE `agg_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `codetable`
--
ALTER TABLE `codetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1801;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `country3`
--
ALTER TABLE `country3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `customers_session`
--
ALTER TABLE `customers_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `dedset`
--
ALTER TABLE `dedset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `drec`
--
ALTER TABLE `drec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farbank`
--
ALTER TABLE `farbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fusers_session`
--
ALTER TABLE `fusers_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logbank`
--
ALTER TABLE `logbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logistics`
--
ALTER TABLE `logistics`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `logves`
--
ALTER TABLE `logves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `logvesdes`
--
ALTER TABLE `logvesdes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logvesdoc`
--
ALTER TABLE `logvesdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lusers_session`
--
ALTER TABLE `lusers_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `moneydis`
--
ALTER TABLE `moneydis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `newsteller`
--
ALTER TABLE `newsteller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `notifyfa`
--
ALTER TABLE `notifyfa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `notifyw`
--
ALTER TABLE `notifyw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `proli_orders`
--
ALTER TABLE `proli_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `proli_orders_toanother`
--
ALTER TABLE `proli_orders_toanother`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1185;

--
-- AUTO_INCREMENT for table `rejadmin`
--
ALTER TABLE `rejadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rejected`
--
ALTER TABLE `rejected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `rejectedagg`
--
ALTER TABLE `rejectedagg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `rejectedfar`
--
ALTER TABLE `rejectedfar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rejectedlog`
--
ALTER TABLE `rejectedlog`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rejectedwar`
--
ALTER TABLE `rejectedwar`
  MODIFY `war_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `salesrecord`
--
ALTER TABLE `salesrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `saletrend0`
--
ALTER TABLE `saletrend0`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `saletrend1`
--
ALTER TABLE `saletrend1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `warbank`
--
ALTER TABLE `warbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `war_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `warpay`
--
ALTER TABLE `warpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wgoods`
--
ALTER TABLE `wgoods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wusers_session`
--
ALTER TABLE `wusers_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
