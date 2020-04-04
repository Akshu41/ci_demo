-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 09:25 AM
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
-- Table structure for table `festival`
--

CREATE TABLE `festival` (
  `id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `festival_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `festival_sms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `festival`
--

INSERT INTO `festival` (`id`, `religion_id`, `festival_name`, `festival_sms`, `status`) VALUES
(1, 1, 'Holi', 'I wish you to have a colorful and joy able holi. May the color of happiness fulfill your life’s Journey throughout the Life.', '1'),
(2, 1, 'Diwali ', 'May this diwali bring universal compassion, inner joy of peace, love and the awareness of ONENESS to all. Happy Diwali.', '1'),
(3, 2, 'ID UL ZUHA', 'On the occasion of Eid-ul-Adha, I send you my best wishes! Eid Mubarak! I wish your life is as spicy as biryani and sweet as kheer.', '1'),
(4, 2, 'Muharram', 'In this holy month of Muharram, May Allah give you strength to replicate the sufferings of Hussain ibn Ali(R.A)', '1'),
(5, 3, 'ID UL ZUHA', 'On the occasion of Eid-ul-Adha, I send you my best wishes! Eid Mubarak! I wish your life is as spicy as biryani and sweet as kheer.', '1'),
(6, 3, 'Muharram', 'In this holy month of Muharram, May Allah give you strength to replicate the sufferings of Hussain ibn Ali(R.A)', '1'),
(7, 4, 'Lohri ', 'Enjoy the festive season Sing and Dance with Fun\r\nWishing You Happiness On this Lohri.', '1'),
(8, 4, 'Gurupurab', 'Satguru Nanak Pargateya Mitti Dund Jag Chanan Hoya, Aap ji nu Sri Guru Nanak Devji De Gurpurab dian Lakh-Lakh Vadaiyan', '1'),
(9, 5, 'Easter', 'As the season of Resurrection comes,\r\nMay the miracle of Easter fuil your heart with joy!\r\nHappy Easter', '1'),
(10, 5, 'Christmas ', 'Wishing you a magical and blissful holiday!\r\nHave a merry Christmas and prosperous New Year!', '1'),
(11, 6, 'other ', 'other sms', '1'),
(12, 6, 'other_festival', 'othere sms 2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reminder_date` date NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `c_reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `name_religion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `name_religion`, `status`) VALUES
(1, 'Hindu', '1'),
(2, 'Muslim', '1'),
(3, 'Bohra', '1'),
(4, 'Sikh', '1'),
(5, 'Christian', '1'),
(6, 'Others', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `festival` int(11) NOT NULL,
  `sms_content` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'admin', 'admin', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `visit_update`
--

CREATE TABLE `visit_update` (
  `id` int(11) NOT NULL,
  `c_user_id` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `remark_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
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
-- Indexes for table `visit_update`
--
ALTER TABLE `visit_update`
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
-- AUTO_INCREMENT for table `festival`
--
ALTER TABLE `festival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cust`
--
ALTER TABLE `tbl_cust`
  MODIFY `c_user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visit_update`
--
ALTER TABLE `visit_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
