-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 12:54 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `document_access`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pwd`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'CYNTHIA'),
(2, 'lapfund');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(255) NOT NULL,
  `depart_name` varchar(255) NOT NULL,
  `companyId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `depart_name`, `companyId`) VALUES
(1, 'shhsh', 1),
(2, 'hahahhaa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `companyId` int(255) NOT NULL,
  `departmentId` int(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `companyId`, `departmentId`, `document`, `userId`) VALUES
(28, 'whhddhh', '                hhdhdhdhdhd\r\n                        ', 1, 1, '', '1'),
(29, '', '\r\n            ', 1, 1, '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `addCompany` varchar(255) NOT NULL,
  `addDepartment` varchar(255) NOT NULL,
  `addDocument` varchar(255) NOT NULL,
  `viewAllDocuments` varchar(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `registerUsers` varchar(255) NOT NULL,
  `assignRoles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `addCompany`, `addDepartment`, `addDocument`, `viewAllDocuments`, `userId`, `registerUsers`, `assignRoles`) VALUES
(1, 'NO', 'NO', 'NO', 'YES', 1, 'NO', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `companyId` int(255) NOT NULL,
  `departId` int(255) NOT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `role` int(10) NOT NULL,
  `superUser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pwd`, `companyId`, `departId`, `last_login`, `role`, `superUser`) VALUES
(5, 'Victor', 'Victor', 'victor@gmail.com', 'dd51f82491a8c840ff1388ef23c8208c', 1, 1, '2018-05-16 01:29:00', 0, 'YES'),
(6, 'Faima', 'Faima', 'mwami@gmail.com', '7e8f489b82e679828defc302766f5484', 1, 1, '2018-05-16 12:06:40', 0, 'YES'),
(11, 'sgsgs', 'sgsgs', 'erick@gmail.com', '10ef013c978968b8be23a648801548cb', 1, 2, '2018-05-21 00:04:57', 0, 'YES'),
(12, 'Cynthia', 'Cynthia', 'c@gmail.com', '31210b48a47b3d498784831b8dd6e9f5', 1, 1, '2018-05-21 00:13:02', 0, 'NO'),
(17, 'ddhhqh', 'ddhhqh', 'steve@gmail.com', '97b691cbe6a457fe1de58da61d411e0a', 1, 1, '0', 0, 'YES'),
(18, 'shsh', 'shsh', 'ken@gmail.com', '1e72d7bcd14512016242b145a3ebfc52', 1, 1, '0', 0, 'YES'),
(19, 'sgsgs', 'sgsgs', 'jk@gmail.com', '1cebdd5186a678b6d02bd66c7ad20586', 1, 1, '0', 0, 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
