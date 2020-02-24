-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 11:48 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reminder_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cust`
--

CREATE TABLE `tbl_cust` (
  `c_user_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `c_dob` date NOT NULL,
  `c_religion` varchar(50) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_vehicle_no` varchar(50) NOT NULL,
  `c_vehicle_type` varchar(50) NOT NULL,
  `c_product_type` varchar(50) NOT NULL,
  `c_remarkes` varchar(100) NOT NULL,
  `c_rem_date` date NOT NULL,
  `c_last_fill_date` date NOT NULL,
  `c_reg_date` date NOT NULL,
  `c_visit` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cust`
--

INSERT INTO `tbl_cust` (`c_user_id`, `c_name`, `mobile`, `c_dob`, `c_religion`, `c_email`, `c_vehicle_no`, `c_vehicle_type`, `c_product_type`, `c_remarkes`, `c_rem_date`, `c_last_fill_date`, `c_reg_date`, `c_visit`) VALUES
(39, 'Ankit Joshi', 9999999999, '2020-02-07', 'Muslim', 'akshujoshi41@gmail.com', 'MP098702', 'Bike', 'Diesel', 'sasasasasdfdfdfdfdfd  vdfddfdfdfdf', '2020-02-14', '2020-01-31', '2020-02-13', 0),
(40, 'Akshay Joshi', 7898727671, '2020-02-12', 'Muslim', 'akassasasshu@gmail.com', 'MP098702', 'Truck', 'Diesel', 'Oil filled 340/-', '2020-02-18', '2020-02-18', '2020-02-12', 0),
(41, 'Reminder date', 8827058271, '2020-02-13', 'Hindu', 'akshu@gmail.com', 'MP098702', 'Bike', 'Petrol', 'Oil filled 340/-', '2020-02-29', '2020-02-18', '2020-02-11', 0),
(42, 'Ankit Joshi', 12345678, '0000-00-00', 'Religion Type', 'ankit@gmail.com', 'MP09QG8702', 'Vehicle Type', 'Product Type', 'sasasasasdfdfdfdfdfd  vdfddfdfdfdf', '2020-02-17', '2020-02-17', '0000-00-00', 0),
(43, 'Ankit Joshi', 8839677915, '0000-00-00', 'Muslim', 'akshyu@gmail.com', 'MP09QG8702', 'Truck', 'Diesel', 'Oil filled 340/-', '2020-02-18', '2020-02-17', '2020-02-08', 0),
(44, 'ayush jain', 8602639829, '2020-02-01', 'Bohra', 'ay@gmail.com', 'dsdd', 'MUV', 'Oil', 'cxcxcxcxcccccccccccccc', '2020-02-18', '2020-02-01', '2020-02-13', 0),
(45, 'tanay ', 7049810843, '2020-02-01', 'Hindu', 'tanay@gmail.com', 'MP09SJ8702', 'Bike', 'Petrol', 'sasasasasdfdfdfdfdfd  vdfddfdfdfdf', '2020-02-17', '2020-02-17', '2020-01-13', 0),
(46, 'Vipin Patel', 8839678915, '2020-02-11', 'Religion Type', 'akshujfoshi41@gmail.com', 'MP098702', 'Vehicle Type', 'Product Type', 'Oil filled 340/-', '2020-02-29', '2020-02-18', '2020-02-12', 0),
(47, 'Abhimanyu Joshi', 9827555621, '2020-02-01', 'Religion Type', 'akshujoshi4111@gmail.com', 'MP09QG8702', 'Vehicle Type', 'Product Type', 'sasasasasdfdfdfdfdfd  vdfddfdfdfdf', '2020-02-11', '2020-02-08', '2020-02-06', 0),
(48, 'cvcv', 123, '2020-02-07', 'Religion Type', 'akshs@gmail.com', 'MP098702', 'Vehicle Type', 'Product Type', 'sdsdsdsds', '2020-02-11', '2020-02-19', '2020-02-18', 0),
(49, 'sdsds', 78987276711, '2020-02-20', 'Muslim', 'aksshujoshi41@gmail.com', 'MP098702', 'Scooter', 'Diesel', 'sssss', '2020-02-11', '2020-02-15', '2020-02-20', 0),
(50, 'Ankit Joshi', 1231231230, '0000-00-00', 'Religion Type', 'addmi@gmail.com', '', 'Vehicle Type', 'Product Type', '', '2020-02-11', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pword`, `fname`, `lname`) VALUES
(1, 'admin', 'admin', 'Akshay ', 'Joshi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cust`
--
ALTER TABLE `tbl_cust`
  ADD PRIMARY KEY (`c_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cust`
--
ALTER TABLE `tbl_cust`
  MODIFY `c_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
