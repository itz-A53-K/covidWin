-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 06:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaccination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT 'admin123'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `password`) VALUES
(2, 'Simanta', 'covVacAdmin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `book_slot`
--

CREATE TABLE `book_slot` (
  `slot_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phNo` bigint(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `id_num` varchar(100) NOT NULL,
  `g_name` varchar(100) NOT NULL,
  `g_ph` bigint(20) NOT NULL,
  `vacDist` varchar(100) NOT NULL,
  `vacCenter` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `dose` varchar(100) NOT NULL,
  `age` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(20) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `userName` varchar(100) NOT NULL,
  `userAge` int(5) NOT NULL,
  `ph_No` bigint(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `idProof_Name` varchar(20) NOT NULL,
  `idProof_No` varchar(50) NOT NULL,
  `userAddress` text NOT NULL,
  `photoName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_dist_wise`
--

CREATE TABLE `vaccine_dist_wise` (
  `dist_id` int(20) NOT NULL,
  `dist_name` varchar(100) NOT NULL,
  `vacCenter` text NOT NULL,
  `slot` int(20) NOT NULL,
  `stock` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine_dist_wise`
--

INSERT INTO `vaccine_dist_wise` (`dist_id`, `dist_name`, `vacCenter`, `slot`, `stock`) VALUES
(4, 'Nalbari', 'Milanpur L.P. School', 297, 5441),
(5, 'Jorhat', '', 247, 401),
(6, 'Tezpur', '', 300, 500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book_slot`
--
ALTER TABLE `book_slot`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`),
  ADD UNIQUE KEY `ph_No` (`ph_No`);

--
-- Indexes for table `vaccine_dist_wise`
--
ALTER TABLE `vaccine_dist_wise`
  ADD PRIMARY KEY (`dist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_slot`
--
ALTER TABLE `book_slot`
  MODIFY `slot_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vaccine_dist_wise`
--
ALTER TABLE `vaccine_dist_wise`
  MODIFY `dist_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
