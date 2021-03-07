-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2021 at 09:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_evaluate`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_classes`
--

CREATE TABLE `exam_classes` (
  `s.no.` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `sub_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `s.no.` int(11) NOT NULL,
  `stu_rollNo` int(11) NOT NULL,
  `tea_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `Q1` int(11) DEFAULT NULL,
  `Q2` int(11) DEFAULT NULL,
  `Q3` int(11) DEFAULT NULL,
  `Q4` int(11) DEFAULT NULL,
  `Q5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_sheet`
--

CREATE TABLE `exam_sheet` (
  `s.no.` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stu_rollNo` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `answersheet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_cred`
--

CREATE TABLE `student_cred` (
  `stu_rollNo` int(11) NOT NULL,
  `stu_name` varchar(50) NOT NULL,
  `stu_email` varchar(50) NOT NULL,
  `stu_pass` varchar(50) NOT NULL,
  `stu_class` varchar(10) NOT NULL,
  `stu_picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_cred`
--

CREATE TABLE `teacher_cred` (
  `tea_id` int(25) NOT NULL,
  `tea_name` varchar(50) NOT NULL,
  `tea_email` varchar(50) NOT NULL,
  `tea_pass` varchar(50) NOT NULL,
  `tea_picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_cred`
--

INSERT INTO `teacher_cred` (`tea_id`, `tea_name`, `tea_email`, `tea_pass`, `tea_picture`) VALUES
(1, 'Deepak Kumar', 'dkarya.delhi.uk@gmail.com', '1234', 'https://drive.google.com/uc?id=1pIn_EOigZXo1uD2pm97lOERKQXjv6W03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD PRIMARY KEY (`s.no.`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`s.no.`);

--
-- Indexes for table `exam_sheet`
--
ALTER TABLE `exam_sheet`
  ADD PRIMARY KEY (`s.no.`);

--
-- Indexes for table `student_cred`
--
ALTER TABLE `student_cred`
  ADD PRIMARY KEY (`stu_rollNo`);

--
-- Indexes for table `teacher_cred`
--
ALTER TABLE `teacher_cred`
  ADD PRIMARY KEY (`tea_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_classes`
--
ALTER TABLE `exam_classes`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_sheet`
--
ALTER TABLE `exam_sheet`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_cred`
--
ALTER TABLE `teacher_cred`
  MODIFY `tea_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
