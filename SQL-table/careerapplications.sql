-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 09:08 AM
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
-- Table structure for table `careerapplications`
--

CREATE TABLE `careerapplications` (
  `cr_application_id` int(11) NOT NULL,
  `cr_id` int(11) NOT NULL,
  `cr_applicant_fname` varchar(250) NOT NULL,
  `cr_applicant_mname` varchar(250) NOT NULL,
  `cr_applicant_lname` varchar(250) NOT NULL,
  `cr_applicant_age` varchar(10) NOT NULL,
  `cr_applicant_gender` enum('M','F','O') NOT NULL,
  `cr_applicant_phonenumber` varchar(20) NOT NULL,
  `cr_applicant_address1` varchar(100) DEFAULT NULL,
  `cr_applicant_address2` varchar(100) DEFAULT NULL,
  `cr_applicant_city` varchar(100) DEFAULT NULL,
  `cr_applicant_state` varchar(100) DEFAULT NULL,
  `cr_applicant_pincode` varchar(20) DEFAULT NULL,
  `cr_applicant_country` varchar(100) DEFAULT NULL,
  `cr_applicant_cv` text,
  `cr_application_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careerapplications`
--
ALTER TABLE `careerapplications`
  ADD PRIMARY KEY (`cr_application_id`),
  ADD KEY `cr_id_cons` (`cr_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `careerapplications`
--
ALTER TABLE `careerapplications`
  ADD CONSTRAINT `cr_id_cons` FOREIGN KEY (`cr_id`) REFERENCES `career` (`cr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
