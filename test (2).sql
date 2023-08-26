-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 08:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`name`, `gender`, `location`, `username`, `password`) VALUES
('test12', 'Male', 'Gurugram', 'test12', 'test12');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `pos` varchar(50) NOT NULL,
  `func` varchar(50) NOT NULL,
  `adv` varchar(50) NOT NULL,
  `preadd` varchar(255) NOT NULL,
  `peradd` varchar(255) NOT NULL,
  `phone1` bigint(10) NOT NULL,
  `phone2` bigint(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nat` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `blgrp` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `name`, `date`, `pos`, `func`, `adv`, `preadd`, `peradd`, `phone1`, `phone2`, `email`, `nat`, `status`, `blgrp`, `username`) VALUES
(28, 'abcd', '2001-11-11', 't', 'test', 'Linkedin', 'test', 'test', 9876543210, 9876453210, 's@gmail.com', 'indian', 'test', 'test', 'abcd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `emp2`
--

CREATE TABLE `emp2` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `detail1` varchar(255) NOT NULL,
  `detail2` varchar(255) NOT NULL,
  `ta1` varchar(255) NOT NULL,
  `ta2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp3`
--

CREATE TABLE `emp3` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ta3` varchar(255) NOT NULL,
  `ta4` varchar(255) NOT NULL,
  `ta5` varchar(255) NOT NULL,
  `selectop` varchar(255) NOT NULL,
  `passno` varchar(255) NOT NULL,
  `passval` varchar(255) NOT NULL,
  `ta6` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp4`
--

CREATE TABLE `emp4` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ta7` varchar(255) NOT NULL,
  `ta8` varchar(255) NOT NULL,
  `ta9` varchar(255) NOT NULL,
  `ta10` varchar(255) NOT NULL,
  `ta11` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `extra_detail`
--

CREATE TABLE `extra_detail` (
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `appname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_details`
--

CREATE TABLE `family_details` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `relation` varchar(255) NOT NULL,
  `rname` varchar(255) NOT NULL,
  `roccup` varchar(255) NOT NULL,
  `rage` varchar(255) NOT NULL,
  `rdepend` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `family_details`
--

INSERT INTO `family_details` (`id`, `username`, `relation`, `rname`, `roccup`, `rage`, `rdepend`) VALUES
(39, 'abcd@gmail.com', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `orgstart` varchar(255) NOT NULL,
  `orgend` varchar(255) NOT NULL,
  `orgname` varchar(255) NOT NULL,
  `orgposj` varchar(255) NOT NULL,
  `orgposl` varchar(255) NOT NULL,
  `lastpos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lang` varchar(255) NOT NULL,
  `speak` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `write` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `insname` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `majarea` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `changed` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`name`, `gender`, `location`, `username`, `password`, `changed`) VALUES
('abcd12', 'Male', 'Gurugram', 'abcd@gmail.com', 'abcd23', 'Y'),
('test', 'Male', 'Gurugram', 'chauhan.sanjeev@hotmail.com', 'sanjeev12', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `emp2`
--
ALTER TABLE `emp2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `emp3`
--
ALTER TABLE `emp3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `emp4`
--
ALTER TABLE `emp4`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `extra_detail`
--
ALTER TABLE `extra_detail`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `family_details`
--
ALTER TABLE `family_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `emp2`
--
ALTER TABLE `emp2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emp3`
--
ALTER TABLE `emp3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `emp4`
--
ALTER TABLE `emp4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `family_details`
--
ALTER TABLE `family_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emp`
--
ALTER TABLE `emp`
  ADD CONSTRAINT `fk_emp_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);

--
-- Constraints for table `emp2`
--
ALTER TABLE `emp2`
  ADD CONSTRAINT `fk_emp2_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);

--
-- Constraints for table `emp3`
--
ALTER TABLE `emp3`
  ADD CONSTRAINT `fk_emp3_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);

--
-- Constraints for table `emp4`
--
ALTER TABLE `emp4`
  ADD CONSTRAINT `fk_lang_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);

--
-- Constraints for table `extra_detail`
--
ALTER TABLE `extra_detail`
  ADD CONSTRAINT `fk_extdetails_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);

--
-- Constraints for table `family_details`
--
ALTER TABLE `family_details`
  ADD CONSTRAINT `fk_famdetails_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);

--
-- Constraints for table `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `fk_qual_username` FOREIGN KEY (`username`) REFERENCES `user_details` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
