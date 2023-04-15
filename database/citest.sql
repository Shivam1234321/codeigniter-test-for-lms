-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 06:31 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminlogin`
--

CREATE TABLE `tbl_adminlogin` (
  `admin_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `LastLoginDate` varchar(25) NOT NULL,
  `LastLoginTime` varchar(25) NOT NULL,
  `LastLogoutDate` varchar(255) NOT NULL,
  `LastLogoutTime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_adminlogin`
--

INSERT INTO `tbl_adminlogin` (`admin_id`, `name`, `email`, `password`, `status`, `LastLoginDate`, `LastLoginTime`, `LastLogoutDate`, `LastLogoutTime`) VALUES
(1, 'Admin', 'admin@gmail.com', '12345678', 1, '2023-04-14', '09:19:42 pm', '2023-04-14', '09:19:32 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `name`, `image`, `image_url`, `description`, `status`, `date`, `time`, `updated_at`) VALUES
(1, 'IFRS', '9bb39c296a3b3e33738bca3538fe58a29940.png', 'uploads/category/', 'Description', 1, '2023-04-14', '09:20:14 pm', '2023-04-14 22:14:32'),
(2, 'ACCA', 'b21756cf61eb5001ecbb48a7dffd30d27430.png', 'uploads/category/', 'descriptioin', 1, '2023-04-14', '09:20:36 pm', '2023-04-14 22:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logindetails`
--

CREATE TABLE `tbl_logindetails` (
  `ID` int(255) NOT NULL,
  `LoginID` int(255) NOT NULL,
  `LoginType` enum('admin','user','vendor') NOT NULL,
  `IP` varchar(100) NOT NULL,
  `MAC` varchar(100) NOT NULL,
  `BrowserVersion` varchar(100) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `BrowserName` varchar(50) NOT NULL,
  `OSName` varchar(25) NOT NULL,
  `Country` varchar(25) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Latitude` varchar(100) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `ServiceProvider` text NOT NULL,
  `HostName` text NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topper`
--

CREATE TABLE `tbl_topper` (
  `topper_id` int(10) NOT NULL,
  `category` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_topper`
--

INSERT INTO `tbl_topper` (`topper_id`, `category`, `name`, `image`, `image_url`, `description`, `status`, `date`, `time`) VALUES
(4, 1, 'Jasmine', '5f3b980f0213c331c10559468a556d314023.png', 'uploads/topper/', 'Enrolled Agent', 1, '2023-04-14', '09:57:16 pm'),
(5, 1, 'Ritu', 'd9b6f4554ead74cebd62effb6a671a529298.png', 'uploads/topper/', 'Enrolled Agent', 1, '2023-04-14', '09:58:30 pm'),
(6, 2, 'Rishabh', '79d59b191996ede84d98442fd4613cb01949.png', 'uploads/topper/', 'CPM Exam', 1, '2023-04-14', '09:58:47 pm'),
(7, 2, 'Akhil', 'afc8e8f20f2d9785d7bcd30c11fbfe513484.png', 'uploads/topper/', 'Enrolled Agent', 1, '2023-04-14', '09:59:06 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_logindetails`
--
ALTER TABLE `tbl_logindetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_topper`
--
ALTER TABLE `tbl_topper`
  ADD PRIMARY KEY (`topper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminlogin`
--
ALTER TABLE `tbl_adminlogin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_logindetails`
--
ALTER TABLE `tbl_logindetails`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_topper`
--
ALTER TABLE `tbl_topper`
  MODIFY `topper_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
