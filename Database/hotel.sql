-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 11:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `status`, `admin_name`) VALUES
(1, 'ala', 'ala777', 'Admin', 'Alaa Eldeen Abbas');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookin_id` int(11) NOT NULL,
  `cust_name` varchar(200) NOT NULL,
  `cust_phone` int(100) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_nic` varchar(200) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `price` int(100) NOT NULL,
  `nit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookin_id`, `cust_name`, `cust_phone`, `cust_address`, `cust_nic`, `room_no`, `room_type`, `booking_date`, `check_in`, `check_out`, `price`, `nit`) VALUES
(1, 'Yousif Mohammed', 117778574, 'جبرة 19', 'S112356543', 'A-2', 'Single', '2022-11-20 10:34:03', '2022-09-12', '2022-09-14', 3000, 'Sudanese'),
(3, 'Ahmed Mohammed Ali', 1245178091, 'Cairo', 'E6524562763', 'S-1', 'Mini Suite', '2022-11-20 10:44:30', '2022-11-21', '2022-11-30', 2000, 'Egyption');

-- --------------------------------------------------------

--
-- Table structure for table `recept`
--

CREATE TABLE `recept` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `recept_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recept`
--

INSERT INTO `recept` (`id`, `name`, `password`, `status`, `recept_name`) VALUES
(1, 'omer', 'omer1', 'Receptionist', 'Omer Babkr');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` varchar(200) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `room_type`, `price`) VALUES
(4, 'A-1', 'Single', 2000),
(5, 'A-2', 'Single', 2000),
(6, 'A-3', 'Single', 2000),
(7, 'A-4', 'Single', 2000),
(8, 'B-1', 'Duble', 4500),
(9, 'B-2', 'Duble', 4500),
(10, 'B-3', 'Single', 4500),
(11, 'T-1', 'Triple', 6000),
(12, 'T-2', 'Triple', 6000),
(13, 'S-1', 'Single', 30000),
(14, 'S-2', 'Single', 30000),
(15, 'S-2', 'Suite', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_type`
--

CREATE TABLE `rooms_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms_type`
--

INSERT INTO `rooms_type` (`id`, `type`) VALUES
(1, 'Single'),
(2, 'Double'),
(3, 'Triple'),
(4, 'Kids'),
(5, 'Mini Suite'),
(6, 'Suite');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_staff` varchar(100) NOT NULL,
  `Phone` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `emp_name`, `emp_staff`, `Phone`, `email`, `address`, `shift`, `join_date`, `salary`) VALUES
(1, 'Mohammed Ali ', 'Manager', 912911919, 'mohammed@gmail.com', 'Bahri Safia', 'Evening - 4:00 PM - 1:00 AM', 'Mar 5, -2022', 200000),
(2, 'maab khalid', 'Front Desk Receptionist', 162789, 'obaa123@gmail.com', 'jabra19', 'Morning - 9:00 AM - 3:00 PM', 'Mar 14, -2022', 70000),
(4, 'Reham Mahmood', 'Housekeeping Manager', 990909091, 'rehammaho44@gmail.com', 'khartoum sahafa', 'Night - 12:00 AM - 8:00 AM', 'Apr 2, -2022', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookin_id`);

--
-- Indexes for table `recept`
--
ALTER TABLE `recept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_type`
--
ALTER TABLE `rooms_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recept`
--
ALTER TABLE `recept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms_type`
--
ALTER TABLE `rooms_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
