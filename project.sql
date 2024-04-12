-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 10:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'tiger_0296');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `course`, `price`) VALUES
(1, 'Dance Fitness Classes', 1000),
(2, 'Zumba', 1025),
(3, 'HIIT', 1500),
(4, 'Cycling', 1200),
(5, 'Boxing', 1800),
(6, 'Personal Training', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `leftmember`
--

CREATE TABLE `leftmember` (
  `lid` int(11) NOT NULL,
  `rid` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `course` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `registered_at` datetime(6) NOT NULL,
  `left_gym` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leftmember`
--

INSERT INTO `leftmember` (`lid`, `rid`, `name`, `gender`, `dob`, `email`, `course`, `contact`, `registered_at`, `left_gym`) VALUES
(1, 3, 'Meenal', 'Female', '2006-02-21', 'meenal@gmail.com', 'Boxing', '7890456783', '2014-07-06 13:00:58.000000', '2023-07-08 13:35:14.000000');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mbno` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `createdat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `mbno`, `email`, `createdat`) VALUES
(7, 'Mayank', '9254859277', 'mayank@gmail.com', '10am to 12pm');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `rid` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `cid` int(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `registered_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`rid`, `name`, `gender`, `dob`, `email`, `cid`, `course`, `contact`, `registered_at`) VALUES
(1, 'Rishabh', 'Male', '1998-07-06', 'rishabh123@gmail.com', 5, 'Boxing', '986473567', '2023-02-13 12:58:47'),
(2, 'Rinky', 'Female', '1998-01-23', 'rinky@gmail.com', 4, 'Cycling', '9735647839', '2023-05-01 12:58:47');

--
-- Triggers `registered`
--
DELIMITER $$
CREATE TRIGGER `triggertable` BEFORE DELETE ON `registered` FOR EACH ROW INSERT INTO leftmember(lid, rid, name, gender, dob, email, course, contact, registered_at, left_gym)
VALUES (null, OLD.rid, OLD.name, OLD.gender, OLD.dob, OLD.email, OLD.course, OLD.contact, OLD.registered_at, CURRENT_TIMESTAMP)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `leftmember`
--
ALTER TABLE `leftmember`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`rid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cid` (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leftmember`
--
ALTER TABLE `leftmember`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registered`
--
ALTER TABLE `registered`
  ADD CONSTRAINT `registered_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `course` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
