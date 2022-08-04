-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 08:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aosacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `reply` varchar(10000) NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `subject` varchar(225) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(100) DEFAULT NULL,
  `user_level` enum('Administrator','Staff','Student','Spammer','guest') NOT NULL DEFAULT 'Student',
  `login_time` datetime NOT NULL,
  `login_ip` varchar(100) DEFAULT NULL,
  `last_ip` varchar(100) NOT NULL,
  `login_count` int(11) NOT NULL DEFAULT '0',
  `online` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`login_id`, `login_username`, `user_level`, `login_time`, `login_ip`, `last_ip`, `login_count`, `online`) VALUES
(1, 'Rajih', 'Administrator', '2018-02-26 23:52:11', '::1', '::1', 9, '0'),
(2, 'admin', 'Administrator', '2018-02-25 19:00:54', '::1', '::1', 10, '0');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` bigint(20) NOT NULL,
  `userid` varchar(225) NOT NULL,
  `notification_type` varchar(225) NOT NULL,
  `is_read` varchar(225) NOT NULL DEFAULT '0',
  `notification_message` text,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `userid`, `notification_type`, `is_read`, `notification_message`, `datetime`) VALUES
(1, '1', 'New User', '0', 'Rajih as now been part of New Student.', '2018-02-23 13:52:09'),
(2, '1', 'New User', '0', 'admin as now been part of New Student.', '2018-02-23 13:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_qoute` varchar(226) NOT NULL,
  `image1` blob NOT NULL,
  `image2` blob NOT NULL,
  `image3` blob NOT NULL,
  `slider_title` varchar(50) CHARACTER SET utf16 NOT NULL,
  `album_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `update`
--

CREATE TABLE `update` (
  `postid` int(11) NOT NULL,
  `user_level` varchar(50) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  `short_content` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `user_level` enum('Administrator','Staff','Student','Spammer','guest') NOT NULL DEFAULT 'Student',
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `user_password` varchar(1000) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `reg_time` time DEFAULT NULL,
  `user_lastlogin` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `user_url` varchar(100) DEFAULT NULL,
  `user_ip` varchar(26) DEFAULT NULL,
  `user_lastip` varchar(26) DEFAULT '0',
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `public_email` varchar(100) DEFAULT NULL,
  `user_avatar_source` blob,
  `user_occupation` varchar(100) DEFAULT NULL,
  `facebook` varchar(225) DEFAULT NULL,
  `yahoo` varchar(225) DEFAULT NULL,
  `googleplus` varchar(225) DEFAULT NULL,
  `user_language` varchar(30) DEFAULT NULL,
  `status_switch` tinyint(4) DEFAULT '0',
  `status_comment` tinyint(4) DEFAULT '0',
  `status_email` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `user_login`, `user_level`, `user_name`, `user_email`, `phone`, `user_password`, `firstname`, `lastname`, `gender`, `reg_date`, `reg_time`, `user_lastlogin`, `user_url`, `user_ip`, `user_lastip`, `address`, `city`, `state`, `country`, `public_email`, `user_avatar_source`, `user_occupation`, `facebook`, `yahoo`, `googleplus`, `user_language`, `status_switch`, `status_comment`, `status_email`) VALUES
(1, 'Rajih', 'Administrator', 'Rajih', 'rajiatlive@gmail.com', '08167735273', 'd93a5def7511da3d0f2d171d9c344e917c4a8d09ca3762af61e59520943dc26494f8941b', 'Raji', 'Samad', NULL, '2018-02-23', '14:52:09', '0000-00-00 00:00:00', NULL, '::1', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1),
(2, 'admin', 'Administrator', 'admin', 'rajiatlive@yahoo.com', '08167735275', 'd93a5def7511da3d0f2d171d9c344e917c4a8d09ca3762af61e59520943dc26494f8941b', 'Olawale', 'Raji', NULL, '2018-02-23', '14:52:37', '0000-00-00 00:00:00', NULL, '::1', '::1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tracker`
--

CREATE TABLE `visitor_tracker` (
  `id` int(11) NOT NULL,
  `country` varchar(50) CHARACTER SET utf8 NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `ip` varchar(20) CHARACTER SET utf8 NOT NULL,
  `web_page` varchar(255) CHARACTER SET utf8 NOT NULL,
  `query_string` varchar(255) CHARACTER SET utf8 NOT NULL,
  `http_referer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `http_user_agent` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_bot` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactid`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update`
--
ALTER TABLE `update`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `user_login` (`user_login`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `visitor_tracker`
--
ALTER TABLE `visitor_tracker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `update`
--
ALTER TABLE `update`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visitor_tracker`
--
ALTER TABLE `visitor_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
