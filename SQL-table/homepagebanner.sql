-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2017 at 01:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skeleton`
--

-- --------------------------------------------------------

--
-- Table structure for table `homePageBanner`
--

CREATE TABLE `homePageBanner` (
  `banner_id` int(11) NOT NULL,
  `banner_image_path` text CHARACTER SET utf8 NOT NULL,
  `banner_alt_text` varchar(100) CHARACTER SET utf8 NOT NULL,
  `banner_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `banner_isVisible` tinyint(4) NOT NULL,
  `banner_redirect` text CHARACTER SET utf8 NOT NULL,
  `banner_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homePageBanner`
--
ALTER TABLE `homePageBanner`
  ADD PRIMARY KEY (`banner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homePageBanner`
--
ALTER TABLE `homePageBanner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
