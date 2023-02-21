-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 12:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

--
-- revista official database import file (accurate as of 21 february 2023)
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revista`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--
-- Creation: Feb 20, 2023 at 11:00 PM
-- Last update: Feb 21, 2023 at 11:40 PM
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--
-- Creation: Feb 17, 2023 at 07:01 PM
-- Last update: Feb 20, 2023 at 10:09 PM
--

CREATE TABLE `comments` (
  `tovideoid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Feb 20, 2023 at 11:25 PM
-- Last update: Feb 20, 2023 at 11:25 PM
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `subscribers` int(11) NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT 'v',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pfp` varchar(255) NOT NULL DEFAULT 'acc.jpg',
  `is_admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--
-- Creation: Feb 17, 2023 at 07:01 PM
-- Last update: Feb 21, 2023 at 03:11 AM
--

CREATE TABLE `videos` (
  `videotitle` varchar(255) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `filename` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
