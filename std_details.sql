-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 12:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slaite exam apply`
--

-- --------------------------------------------------------

--
-- Table structure for table `std_details`
--

CREATE TABLE `std_details` (
  `title` varchar(10) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `nameWithInitials` varchar(255) NOT NULL,
  `registrationNumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobileNumber` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std_details`
--

INSERT INTO `std_details` (`title`, `fullName`, `nameWithInitials`, `registrationNumber`, `address`, `mobileNumber`, `email`, `gender`, `password`) VALUES
('Mr', 'Charuka', 'Kushan', '5555', 'D15/6, Bilingahahena', '0776790011', 'lessonsmyse@gmail.com', 'male', '123456@Ab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `std_details`
--
ALTER TABLE `std_details`
  ADD PRIMARY KEY (`registrationNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
