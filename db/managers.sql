-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2020 at 01:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadon_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `img_url` text DEFAULT NULL,
  `last_activity_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `fullname`, `username`, `email`, `password`, `level`, `img_url`, `last_activity_time`, `created_at`) VALUES
(25, 'Nguyen Thanh Tung', 'admin', 'nttung@gmail.com', '$2y$10$MweEAMGW4GqgVpVcUNW/GeEabeLiH42FIS5K98crDald6v3SC00hG', 'super-admin', '../img/managers/code.5f10387bd26b3.jpg', '2020-07-16 11:35:04', '2020-07-09 12:25:20'),
(30, 'Nguyen Anh Duc', 'naduc', 'naduc@gmail.com', '$2y$10$kUtcgwbMuqiXiFnVKlS78udTeg.jwGjdsiVCKaNEvpjNqnHEfiT2K', 'admin', '../img/managers/dna.5f103a3fc8612.jpg', '2020-07-16 11:34:41', '2020-07-16 11:10:54'),
(24, 'Nguyen Thanh Hung', 'nthung', 'nthung@gmail.com', '$2y$10$iUkwi7XIXhddHWKWyGCmeOaypZ4rz74iZ6129PVvTcbgNvqduj86G', 'admin', '../img/managers/blue.5f10381a8b960.png', '2020-07-16 11:20:58', '2020-07-09 01:02:49'),
(29, 'Ngo Thi Mai', 'ntmai', 'ntmai@gmail.com', '$2y$10$3F1lWsVsYACoTN78Bozd4eJKz4rePZnOjkbCAbmqCiV4j0JxVIlWa', 'manager', '../img/managers/gal-galdot.5f1039e1a8358.jpg', '2020-07-16 11:28:33', '2020-07-11 02:16:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
