-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2022 at 04:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT 1,
  `user_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_status`, `user_timestamp`) VALUES
(1, 'tdev', '1234', 1, '2022-10-23 01:56:28'),
(2, 'tdev1', '1234', 1, '2022-10-23 01:58:00'),
(3, 'tdev3', '1234', 1, '2022-10-23 01:59:08'),
(4, 'tdevuser', '', 1, '2022-10-23 01:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vm_id` int(10) NOT NULL,
  `vm_name` varchar(1000) NOT NULL,
  `vm_content` varchar(250) NOT NULL,
  `vm_img` varchar(100) DEFAULT NULL,
  `vm_own` int(10) NOT NULL,
  `vm_status` int(1) NOT NULL DEFAULT 1,
  `vm_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vm_id`, `vm_name`, `vm_content`, `vm_img`, `vm_own`, `vm_status`, `vm_timestamp`) VALUES
(1, 'ทดสอบ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam alias ab quos. Totam quam ad dolores! Consectetur enim aliquam dicta ipsa rem aut assumenda omnis voluptatibus est labore? Autem ut labore fugit reprehenderit tenetur sed perspiciatis i', '1381369517.jpg', 1, 0, '2022-10-23 07:54:41'),
(2, 'ทดสอบ vote 2', 'vote content 2', '1299116051.jpg', 1, 1, '2022-10-24 01:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `votes_option`
--

CREATE TABLE `votes_option` (
  `vo_id` int(10) NOT NULL,
  `vo_name` varchar(100) NOT NULL,
  `vo_ownvm` int(10) NOT NULL,
  `vo_status` int(1) NOT NULL DEFAULT 1,
  `vo_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes_option`
--

INSERT INTO `votes_option` (`vo_id`, `vo_name`, `vo_ownvm`, `vo_status`, `vo_timestamp`) VALUES
(6, 'test', 1, 1, '2022-10-23 09:05:05'),
(7, 'ทดสอบ vote 2', 2, 1, '2022-10-24 02:01:58'),
(8, 'ทดสอบ vote 2.1', 2, 1, '2022-10-24 02:02:06'),
(9, 'ทดสอบ vote 2.2', 2, 1, '2022-10-24 02:02:10'),
(10, 'test', 2, 1, '2022-10-24 02:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `votes_stats`
--

CREATE TABLE `votes_stats` (
  `vs_id` int(10) NOT NULL,
  `vs_own` int(10) NOT NULL,
  `vs_ownvo` int(10) NOT NULL,
  `vs_ownvm` int(10) NOT NULL,
  `vs_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes_stats`
--

INSERT INTO `votes_stats` (`vs_id`, `vs_own`, `vs_ownvo`, `vs_ownvm`, `vs_timestamp`) VALUES
(1, 1, 8, 2, '2022-10-24 02:14:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vm_id`),
  ADD KEY `vm_own` (`vm_own`);

--
-- Indexes for table `votes_option`
--
ALTER TABLE `votes_option`
  ADD PRIMARY KEY (`vo_id`),
  ADD KEY `vo_ownvm` (`vo_ownvm`);

--
-- Indexes for table `votes_stats`
--
ALTER TABLE `votes_stats`
  ADD PRIMARY KEY (`vs_id`),
  ADD KEY `vs_own` (`vs_own`,`vs_ownvo`,`vs_ownvm`),
  ADD KEY `vs_ownvm` (`vs_ownvm`),
  ADD KEY `vs_ownvo` (`vs_ownvo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votes_option`
--
ALTER TABLE `votes_option`
  MODIFY `vo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `votes_stats`
--
ALTER TABLE `votes_stats`
  MODIFY `vs_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`vm_own`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes_option`
--
ALTER TABLE `votes_option`
  ADD CONSTRAINT `votes_option_ibfk_1` FOREIGN KEY (`vo_ownvm`) REFERENCES `votes` (`vm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes_stats`
--
ALTER TABLE `votes_stats`
  ADD CONSTRAINT `votes_stats_ibfk_1` FOREIGN KEY (`vs_ownvm`) REFERENCES `votes` (`vm_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_stats_ibfk_2` FOREIGN KEY (`vs_ownvo`) REFERENCES `votes_option` (`vo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_stats_ibfk_3` FOREIGN KEY (`vs_own`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
