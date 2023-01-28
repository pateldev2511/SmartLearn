-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2021 at 07:06 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartlearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_username` varchar(25) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `a_username`, `a_password`, `last_login`) VALUES
(1, '<admin_username>', '<admin_password>', '2021-02-17 12:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `c_id` int(5) NOT NULL AUTO_INCREMENT,
  `sb_id` int(3) NOT NULL,
  `c_titel` varchar(255) NOT NULL,
  `c_description` text NOT NULL,
  `c_type` enum('text','video') NOT NULL,
  `c_date` date NOT NULL,
  `c_create` datetime NOT NULL,
  `c_update` datetime NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `content_read`
--

DROP TABLE IF EXISTS `content_read`;
CREATE TABLE IF NOT EXISTS `content_read` (
  `cr_id` int(5) NOT NULL AUTO_INCREMENT,
  `c_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `cr_date` datetime NOT NULL,
  `cr_ datetime` datetime NOT NULL,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `fd_id` int(11) NOT NULL AUTO_INCREMENT,
  `fd_name` varchar(255) NOT NULL,
  `fd_email` varchar(255) NOT NULL,
  `fd_desc` text NOT NULL,
  `fd_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fd_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news & events`
--

DROP TABLE IF EXISTS `news & events`;
CREATE TABLE IF NOT EXISTS `news & events` (
  `n_id` int(5) NOT NULL AUTO_INCREMENT,
  `n_titel` varchar(255) NOT NULL,
  `n_description` text NOT NULL,
  `n_date` date NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_test`
--

DROP TABLE IF EXISTS `online_test`;
CREATE TABLE IF NOT EXISTS `online_test` (
  `o_id` int(5) NOT NULL AUTO_INCREMENT,
  `sb_id` int(5) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_marks` int(3) NOT NULL,
  `o_duration` int(3) NOT NULL,
  `o_description` text NOT NULL,
  `o_active` enum('yes','no') NOT NULL,
  `o_date` datetime(6) NOT NULL,
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_test_answer`
--

DROP TABLE IF EXISTS `online_test_answer`;
CREATE TABLE IF NOT EXISTS `online_test_answer` (
  `ota_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `q_id` int(5) NOT NULL,
  `oat_answer` enum('a','b','c','d') NOT NULL,
  `oat_datetime` datetime NOT NULL,
  `q_result` int(3) NOT NULL,
  PRIMARY KEY (`ota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `q_id` int(5) NOT NULL,
  `sb_id` int(5) NOT NULL,
  `q_name` text NOT NULL,
  `q_a` text NOT NULL,
  `q_b` text NOT NULL,
  `q_c` text NOT NULL,
  `q_d` text NOT NULL,
  `q_rightans` enum('a','b','c','d') NOT NULL,
  `q_marks` int(3) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `st_id` int(3) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(255) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_password` varchar(255) NOT NULL,
  `st_mobile` text NOT NULL,
  `st_address` varchar(255) NOT NULL,
  `st_pincode` int(6) NOT NULL,
  `st_document` varchar(255) NOT NULL,
  `st_create` datetime NOT NULL,
  `st_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `st_token` varchar(255) DEFAULT NULL,
  `st_active` varchar(255) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`st_id`, `st_name`, `st_email`, `st_password`, `st_mobile`, `st_address`, `st_pincode`, `st_document`, `st_create`, `st_update`, `st_token`, `st_active`) VALUES
(1, 'Max Willam', 'max.willam@gmail.com', 'db3b852a890b67b15bf98dfde832d2b5', '8320142418', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 384004, 'images.png', '2021-02-16 08:41:14', '2021-03-24 12:53:42', NULL, 'yes'),
(2, 'Mikel Jorden', 'mikeljorden123@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9409244271', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 384009, '6a2523959209d902adc540345120f22d.jpg', '2021-02-16 08:49:48', '2021-03-24 12:53:39', NULL, 'yes'),
(4, 'Luis Miller', 'luis.miller@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9409244271', 'Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore', 560016, 'simple_luis.jpg', '2021-02-17 09:45:12', '2021-02-17 15:15:12', NULL, 'yes'),
(6, 'Dev Patel', 'pateldev0306@gmail.com', 'f2f0c254b80c4eeab291b95e2ae3c37a', '8320142418', '55, Opp Toyota Showroom, Vinayak Apt, Link Road, Malad (west)', 384001, 'simple_luis.jpg', '2021-03-26 16:58:21', '2021-03-27 15:54:28', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_pincode` int(6) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_document` text NOT NULL,
  `s_active` enum('no','yes') NOT NULL,
  `s_token` varchar(255) DEFAULT NULL,
  `s_create` datetime NOT NULL,
  `s_update` datetime DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_address`, `s_pincode`, `s_email`, `s_password`, `s_document`, `s_active`, `s_token`, `s_create`, `s_update`) VALUES
(4, 'Dev Patel', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 384002, 'pateldev081999@gmail.com', 'ae46b75e99acd5e581308416e05293fe', 'images.png', 'yes', '', '2021-02-15 08:04:20', NULL),
(5, 'Darsh Patel', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 384001, 'pateldarsh422@gmail.com', 'a7bca7506cdd0eae3a7d2764f1ed9085', 'wallhaven-w8xwpx.jpg', 'yes', '', '2021-02-15 08:08:32', NULL),
(7, 'Poonam Prajapati', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 384001, 'poonamoza10299@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'steam_profile_design___hinata_and_naruto_by_robertorevolution_ddn9nuf.png', 'yes', '', '2021-02-15 08:11:34', NULL),
(8, 'Shivam', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 384002, 'abc@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'wallhaven-ym1wp7.jpg', 'yes', '', '2021-02-16 08:08:07', NULL),
(10, 'Vishal Modi', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 384002, 'modivishal123@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2794b585f834468939ce843cdde3cb55.jpg', 'yes', '', '2021-02-16 10:12:59', NULL),
(11, 'Dax Shah', 'Akshya Nagar 1st Block 1st Cross, Rammurthy nagar, Bangalore.', 560016, 'daxshah123@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'images.png', 'no', '', '2021-02-18 07:25:07', NULL),
(12, 'Max Willam', 'Block-18, Bldg 03, Kapadia Indl Est, 123-124 Andheri Kurla K Rd, Andheri (e)', 382001, 'pateldarsh422@gmailc.om', '25f9e794323b453885f5181f1b624d0b', 'images.png', 'no', '502754-602f3a0db40c6', '2021-02-19 04:09:49', NULL),
(18, 'Recon', 'awgdyauiwvgdbaujhwvdyuawv', 384002, 'darshpatel820@gmail.com', '25f9e794323b453885f5181f1b624d0b', '6a2523959209d902adc540345120f22d.jpg', 'yes', '', '2021-02-19 04:59:51', NULL),
(19, 'Recon Blaze', 'liawgduiwagdawgdiug', 384001, 'kitel58402@seacob.com', '25f9e794323b453885f5181f1b624d0b', '2794b585f834468939ce843cdde3cb55.jpg', 'no', '910949-602f4a80bac5e', '2021-02-19 05:20:00', NULL),
(20, 'Recon temp', 'kjbefiusbefuiseuifb', 384001, 'jwngxyembxnnti@maxresistance.com', 'e807f1fcf82d132f9bb018ca6738a19f', '2794b585f834468939ce843cdde3cb55.jpg', 'yes', '', '2021-02-19 05:21:18', NULL),
(36, 'Dev Patel', '55, Opp Toyota Showroom, Vinayak Apt, Link Road, Malad (west)', 384001, 'pateldev0306@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'images.png', 'yes', '', '2021-03-27 06:50:05', NULL),
(37, 'Hiral Patel', 'ejhdbuyavdyuvduvauev', 384002, 'patelhinalj@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'images.png', 'no', '984900-605ee0f623703', '2021-03-27 07:38:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_course_allocation`
--

DROP TABLE IF EXISTS `student_course_allocation`;
CREATE TABLE IF NOT EXISTS `student_course_allocation` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `a_finish` enum('yes','no') NOT NULL,
  `a_date` datetime NOT NULL,
  `a_finish date` datetime NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `sb_id` int(3) NOT NULL AUTO_INCREMENT,
  `sb_name` varchar(255) NOT NULL,
  `sb_create` datetime NOT NULL,
  `sb_update` datetime DEFAULT NULL,
  PRIMARY KEY (`sb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test_history`
--

DROP TABLE IF EXISTS `test_history`;
CREATE TABLE IF NOT EXISTS `test_history` (
  `th_id` int(5) NOT NULL AUTO_INCREMENT,
  `s_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `th_start` datetime NOT NULL,
  `th_endtime` datetime NOT NULL,
  `th_result` enum('pass','fail') NOT NULL,
  `th_certificate generate` enum('yes','no') NOT NULL,
  PRIMARY KEY (`th_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
