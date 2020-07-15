-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2020 at 06:23 AM
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
  `img_url` varchar(200) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `img_order` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slideshow`
--

INSERT INTO `home_slideshow` (`id`, `img_url`, `title`, `caption`, `img_order`, `created_at`) VALUES
(32, '../img/home-slideshow/cool-background.5f0db4d76e1be.png', 'stars', 'mistery', 1, '2020-07-14 13:36:23'),
(33, '../img/home-slideshow/martin-211-unsplash.5f0db4f25a690.jpg', 'wall', 'rough', 2, '2020-07-14 13:36:50'),
(35, '../img/home-slideshow/ilya-pavlov-87438-unsplash.5f0db691a9432.jpg', 'code', 'hard', 5, '2020-07-14 13:43:45'),
(36, '../img/home-slideshow/background-business-camera-593322.5f0db81f2a122.jpg', 'Macbook', 'modern', 4, '2020-07-14 13:50:23');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
