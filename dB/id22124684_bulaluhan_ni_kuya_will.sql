-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 17, 2024 at 04:09 PM
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
-- Database: `id22124684_bulaluhan_ni_kuya_will`
--
CREATE DATABASE IF NOT EXISTS `id22124684_bulaluhan_ni_kuya_will` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `id22124684_bulaluhan_ni_kuya_will`;

-- --------------------------------------------------------

--
-- Table structure for table `current_reservations`
--

CREATE TABLE `current_reservations` (
  `Reservation_ID` int(11) NOT NULL,
  `Customer_First_Name` varchar(255) NOT NULL,
  `Customer_Last_Name` varchar(255) NOT NULL,
  `Customer_Phone` bigint(20) NOT NULL,
  `Reservation_Date` date NOT NULL,
  `Reservation_Time` time NOT NULL,
  `Number_Of_Guests` int(11) NOT NULL DEFAULT 1,
  `Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Submitted_Reservation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `current_reservations`
--

INSERT INTO `current_reservations` (`Reservation_ID`, `Customer_First_Name`, `Customer_Last_Name`, `Customer_Phone`, `Reservation_Date`, `Reservation_Time`, `Number_Of_Guests`, `Status`, `Submitted_Reservation`) VALUES
(45, 'Aaron Christopher', 'Ramos', 9777443078, '2024-05-17', '13:20:00', 1, 'Approved', '2024-05-17 03:42:58'),
(47, 'Vince Emmanuel', 'Sy', 9123567912, '2024-05-17', '23:05:00', 2, 'Pending', '2024-05-17 14:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'KuyaWill', '$2y$10$L6Lou8eVZTuePLmq5bkNNe.8Gae/38rkw9yGfYhMqo.GLs1OpKOca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_reservations`
--
ALTER TABLE `current_reservations`
  ADD PRIMARY KEY (`Reservation_ID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_reservations`
--
ALTER TABLE `current_reservations`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
