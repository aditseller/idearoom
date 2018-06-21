-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2018 at 11:07 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idearoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id_channel` int(11) NOT NULL,
  `channel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id_channel`, `channel`) VALUES
(1, 'News');

-- --------------------------------------------------------

--
-- Table structure for table `read`
--

CREATE TABLE `read` (
  `id_read` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `channel` varchar(100) NOT NULL,
  `tag` varchar(500) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `url` varchar(500) NOT NULL,
  `poster` varchar(500) NOT NULL,
  `source` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Writter');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `joindate` datetime NOT NULL,
  `role` int(10) NOT NULL,
  `active` enum('0','1') NOT NULL,
  `authKey` varchar(500) NOT NULL,
  `accessToken` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `fullname`, `phone`, `joindate`, `role`, `active`, `authKey`, `accessToken`) VALUES
(1, 'tezaraditya@gmail.com', '746f6f72', 'Tezar Aditya', '081314421461', '2018-06-20 04:27:45', 1, '1', '52ca6f764e239e4d9e9e67c89fcf0cae6a4e8ac5', '356a192b7913b04c54574d18c28d46e6395428ab'),
(2, 'prioknews@gmail.com', '746f6f72', 'volunteer', '080989999', '2018-06-20 09:55:48', 3, '1', 'b46deda09533491b109e6b049fa5145b39130d45', 'da4b9237bacccdf19c0760cab7aec4a8359010b0'),
(3, 'aditseller@gmail.com', '746f6f72', 'aditseller', '089928834483', '2018-06-20 09:57:56', 3, '0', 'e7410ca731339e97cfad3ee3fd61ea2ed0bb5886', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_channel`),
  ADD UNIQUE KEY `channel` (`channel`);

--
-- Indexes for table `read`
--
ALTER TABLE `read`
  ADD PRIMARY KEY (`id_read`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `channel` (`channel`),
  ADD KEY `tag` (`tag`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `source` (`source`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `fullname` (`fullname`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id_channel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `read`
--
ALTER TABLE `read`
  MODIFY `id_read` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `read`
--
ALTER TABLE `read`
  ADD CONSTRAINT `read_ibfk_1` FOREIGN KEY (`channel`) REFERENCES `channel` (`channel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `read_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`fullname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
