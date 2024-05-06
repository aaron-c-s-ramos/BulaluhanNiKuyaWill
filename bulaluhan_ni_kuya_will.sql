-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 06, 2024 at 07:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bulaluhan_ni_kuya_will`
--
CREATE DATABASE IF NOT EXISTS `bulaluhan_ni_kuya_will` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bulaluhan_ni_kuya_will`;

-- --------------------------------------------------------

--
-- Table structure for table `current_reservations`
--

CREATE TABLE `current_reservations` (
  `Reservation_ID` int(11) NOT NULL,
  `Customer_Name` varchar(255) NOT NULL,
  `Customer_Phone` bigint(20) NOT NULL,
  `Reservation_Date` date NOT NULL,
  `Reservation_Time` time NOT NULL,
  `Number_Of_Guests` int(11) NOT NULL DEFAULT 1,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Submitted_Reservation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_reservations`
--
ALTER TABLE `current_reservations`
  ADD PRIMARY KEY (`Reservation_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_reservations`
--
ALTER TABLE `current_reservations`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
