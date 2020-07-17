-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2020 at 04:39 PM
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
  `last_activity_time` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `fullname`, `username`, `email`, `password`, `level`, `img_url`, `last_activity_time`, `created_at`) VALUES
(24, 'Nguyen Thanh Hung', 'nthung', 'nthung@gmail.com', '$2y$10$YXCykgTp5gdO2XgRqc3NC.BtmulNUXaxLQoGMneX6RQe4irmdIUjm', 'admin', '../img/managers/colors.5f11b67dc505f.jpg', '2020-07-17 21:36:12', '2020-07-09 01:02:49'),
(25, 'Nguyen Thanh Tung', 'admin', 'nttung@gmail.com', '$2y$10$W3DCLbnKp8.Qsi8xVS45Du65BRbJ6Ah.a.rt7zomA6hXDRt7I33Le', 'super-admin', '../img/managers/code.5f10387bd26b3.jpg', '2020-07-17 21:35:17', '2020-07-09 12:25:20'),
(29, 'Ngo Thi Mai', 'ntmai', 'ntmai@gmail.com', '$2y$10$d74AMl4JWn.7lg19RPtsIe53f9TGGvy7nY0X3E4m0tY3GeyPq1PVi', 'manager', '../img/managers/gal-galdot.5f1039e1a8358.jpg', '2020-07-16 11:28:33', '2020-07-11 02:16:52'),
(30, 'Nguyen Anh Duc', 'naduc', 'naduc@gmail.com', '$2y$10$CyGbPT2/ISH9zztk5G01eeCt4k8sFHJNFLTuPdXyBu8Zkx6pgvYnq', 'manager', '../img/managers/dna.5f103a3fc8612.jpg', '2020-07-16 11:34:41', '2020-07-16 11:10:54');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
