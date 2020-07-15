-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2020 at 05:02 PM
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
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `img_url` varchar(200) DEFAULT NULL,
  `last_activity_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `fullname`, `username`, `email`, `password`, `level`, `img_url`, `last_activity_time`, `created_at`) VALUES
(24, 'Nguyen Thanh Hung', 'nthung', 'nthung@gmail.com', 'hung123', 'admin', '../img/managers/cool-background.5f073199edd97.png', '2020-07-12 02:40:26', '2020-07-09 15:02:49'),
(25, 'Nguyen Thanh Tung', 'admin', 'nttung@gmail.com', 'admin', 'super-admin', '../img/managers/background-business-camera-593322.5f07d1907768a.jpg', '2020-07-12 14:59:13', '2020-07-10 02:25:20'),
(29, 'Ngo Thi Mai', 'ntmai', 'ntmai@gmail.com', 'mai123', 'manager', '../img/managers/gal-gadot-2880x1800-red-carpet-european-premiere-4k-3338.5f09e5f4dd38e.jpg', '2020-07-11 16:16:52', '2020-07-11 16:16:52'),
(30, 'Nguyen Thanh Minh', 'ntminh', 'ntminh@gmail.com', 'duc123', 'manager', '../img/managers/ilya-pavlov-87438-unsplash.5f0a86455c132.jpg', '2020-07-12 03:52:48', '2020-07-11 16:36:25');

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
