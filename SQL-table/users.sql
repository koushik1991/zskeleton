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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(250) NOT NULL,
  `user_mname` varchar(250) NOT NULL,
  `user_lname` varchar(250) NOT NULL,
  `user_picture` text NOT NULL,
  `user_date_of_birth` varchar(20) NOT NULL,
  `user_password` text NOT NULL,
  `user_identification` varchar(100) NOT NULL,
  `user_gender` enum('M','F','O') NOT NULL,
  `user_phone_number` varchar(20) NOT NULL,
  `user_altername_phone_number` varchar(20) NOT NULL,
  `user_email` varchar(75) NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL,
  `user_register_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_register_medium` enum('web','fb','gmail') NOT NULL,
  `user_last_login` datetime NOT NULL,
  `user_phone_number_validated` tinyint(4) NOT NULL,
  `user_email_validated` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
