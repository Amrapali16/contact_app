-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 03:45 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contacts_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `fullname`, `email`, `mobile`, `pass`, `created`, `updated`, `photo`) VALUES
(14, 'simarn raju vaidya', 'simranvaidya123@gmail.com', 6733882738, '0367f9e0cf4653f94110318342ea249a', '2021-09-26 14:17:48', NULL, 'upload/profile/n5.jpg'),
(16, 'riya vaidya', 'riyavaidyanewuser123@gmail.com', 9857362794, '66e8d1766d4c7a6a78d3337d1519c264', '2021-09-27 09:45:15', NULL, 'upload/profile/fashion 4.png'),
(17, 'Rinku darane', 'daranerinku1234@gmail.com', 6789367899, 'e75b7b30c019801a94030db9cae3d89e', '2021-09-27 09:52:10', NULL, 'upload/profile/n3.jpg'),
(18, 'shubham raju vaidya', 'shubham123@gmail.com', 6734027788, '5559e198d7a24841cae9cf5bf1f1d89e', '2021-09-27 12:40:34', NULL, 'upload/profile/n2.jpg'),
(19, 'Amrapali Raju Vaidya', 'amrapalivaidya1999@gmail.com', 6766933737, '8d47ca52c3f00e8e7a94b5035e7bbab2', '2021-09-27 16:22:26', NULL, 'upload/profile/slide1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `userID` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `useremail` varchar(300) DEFAULT NULL,
  `userprofile` varchar(500) DEFAULT NULL,
  `usermobile` varchar(300) DEFAULT NULL,
  `useraddress` varchar(2000) DEFAULT NULL,
  `addemail` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
