-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2021 at 07:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `c_id` int(5) NOT NULL,
  `sb_id` int(3) NOT NULL,
  `c_titel` varchar(255) NOT NULL,
  `c_description` text NOT NULL,
  `c_type` enum('text','video') NOT NULL,
  `c_date` date NOT NULL,
  `c_create` datetime NOT NULL,
  `c_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `content_read`
--

CREATE TABLE `content_read` (
  `cr_id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `cr_date` datetime NOT NULL,
  `cr_ datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news & events`
--

CREATE TABLE `news & events` (
  `n_id` int(5) NOT NULL,
  `n_titel` varchar(255) NOT NULL,
  `n_description` text NOT NULL,
  `n_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_test`
--

CREATE TABLE `online_test` (
  `o_id` int(5) NOT NULL,
  `sb_id` int(5) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_marks` int(3) NOT NULL,
  `o_duration` int(3) NOT NULL,
  `o_description` text NOT NULL,
  `o_active` enum('yes','no') NOT NULL,
  `o_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_test_answer`
--

CREATE TABLE `online_test_answer` (
  `ota_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `q_id` int(5) NOT NULL,
  `oat_answer` enum('a','b','c','d') NOT NULL,
  `oat_datetime` datetime NOT NULL,
  `q_result` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(5) NOT NULL,
  `sb_id` int(5) NOT NULL,
  `q_name` text NOT NULL,
  `q_a` text NOT NULL,
  `q_b` text NOT NULL,
  `q_c` text NOT NULL,
  `q_d` text NOT NULL,
  `q_rightans` enum('a','b','c','d') NOT NULL,
  `q_marks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `st_id` int(3) NOT NULL,
  `st_name` varchar(255) NOT NULL,
  `st_email` varchar(255) NOT NULL,
  `st_password` varchar(255) NOT NULL,
  `st_mobile` int(10) NOT NULL,
  `st_address` varchar(255) NOT NULL,
  `st_pincode` int(6) NOT NULL,
  `st_document` varchar(255) NOT NULL,
  `st_create` datetime NOT NULL,
  `st_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(5) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_address` varchar(255) NOT NULL,
  `s_pincode` int(6) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_document` varchar(255) NOT NULL,
  `s_active` enum('no','yes') NOT NULL,
  `s_create` datetime NOT NULL,
  `s_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_course_allocation`
--

CREATE TABLE `student_course_allocation` (
  `a_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `a_finish` enum('yes','no') NOT NULL,
  `a_date` datetime NOT NULL,
  `a_finish date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sb_id` int(3) NOT NULL,
  `sb_name` varchar(255) NOT NULL,
  `sb_create` datetime NOT NULL,
  `sb_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test_history`
--

CREATE TABLE `test_history` (
  `th_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `o_id` int(5) NOT NULL,
  `th_start` datetime NOT NULL,
  `th_endtime` datetime NOT NULL,
  `th_result` enum('pass','fail') NOT NULL,
  `th_certificate generate` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `content_read`
--
ALTER TABLE `content_read`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `news & events`
--
ALTER TABLE `news & events`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `online_test`
--
ALTER TABLE `online_test`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `online_test_answer`
--
ALTER TABLE `online_test_answer`
  ADD PRIMARY KEY (`ota_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_course_allocation`
--
ALTER TABLE `student_course_allocation`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sb_id`);

--
-- Indexes for table `test_history`
--
ALTER TABLE `test_history`
  ADD PRIMARY KEY (`th_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_read`
--
ALTER TABLE `content_read`
  MODIFY `cr_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news & events`
--
ALTER TABLE `news & events`
  MODIFY `n_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_test`
--
ALTER TABLE `online_test`
  MODIFY `o_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `st_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_course_allocation`
--
ALTER TABLE `student_course_allocation`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sb_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_history`
--
ALTER TABLE `test_history`
  MODIFY `th_id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
