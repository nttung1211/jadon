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
-- Table structure for table `home_slideshow`
--

CREATE TABLE `home_slideshow` (
  `id` int(11) NOT NULL,
  `img_url` text DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `img_order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slideshow`
--

INSERT INTO `home_slideshow` (`id`, `img_url`, `title`, `caption`, `img_order`, `created_at`) VALUES
(32, '../img/home-slideshow/wall.5f1031963db53.jpg', 'stars', 'mistery', 1, '2020-07-14 06:36:23'),
(33, '../img/home-slideshow/colors.5f1031ae0a6ce.jpg', 'wall', 'rough', 2, '2020-07-14 06:36:50'),
(35, '../img/home-slideshow/dna.5f1031b53ef16.jpg', 'code', 'hard', 5, '2020-07-14 06:43:45'),
(36, '../img/home-slideshow/blue.5f1031bc7e957.png', 'Macbook', 'modern', 4, '2020-07-14 06:50:23'),
(37, '../img/home-slideshow/devices.5f1031f46e8bc.jpg', 'apple products', 'delicate', 6, '2020-07-16 10:54:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_slideshow`
--
ALTER TABLE `home_slideshow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_slideshow`
--
ALTER TABLE `home_slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
