-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 09:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `useraddressofpickup`
--

CREATE TABLE `useraddressofpickup` (
  `pickup_address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_address_1` varchar(150) NOT NULL,
  `p_address_2` varchar(150) NOT NULL,
  `p_address_land_mark` varchar(150) NOT NULL,
  `p_address_lat` varchar(20) NOT NULL,
  `p_address_lang` varchar(20) NOT NULL,
  `p_address_pincode` varchar(20) NOT NULL,
  `p_address_city` varchar(100) NOT NULL,
  `p_address_state` varchar(100) NOT NULL,
  `p_address_country` varchar(100) NOT NULL,
  `p_address_contact` varchar(20) NOT NULL,
  `p_address_verified` tinyint(4) NOT NULL,
  `p_address_verified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `useraddressofpickup`
--
ALTER TABLE `useraddressofpickup`
  ADD PRIMARY KEY (`pickup_address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `useraddressofpickup`
--
ALTER TABLE `useraddressofpickup`
  MODIFY `pickup_address_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
