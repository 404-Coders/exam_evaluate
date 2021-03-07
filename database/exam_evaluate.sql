-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2021 at 05:20 PM
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
  `class_id` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `tea_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_classes`
--

INSERT INTO `exam_classes` (`s.no.`, `class_id`, `class_name`, `sub_name`, `tea_id`) VALUES
(1, 'CSE1-AI', 'CSE1', 'AI', 3),
(2, 'CSE1-JAVA', 'CSE1', 'JAVA', 2),
(3, 'CSE2-JAVA', 'CSE2', 'JAVA', 2),
(4, 'CSE2-ADA', 'CSE2', 'ADA', 1),
(5, 'CSE2-AI', 'CSE2', 'AI', 3),
(6, 'CSE1-ADA', 'CSE1', 'ADA', 1),
(7, 'CSE3-JAVA', 'CSE3', 'JAVA', 2),
(8, 'CSE3-ADA', 'CSE3', 'ADA', 1),
(9, 'CSE3-AI', 'CSE3', 'AI', 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `s.no.` int(11) NOT NULL,
  `stu_rollNo` int(11) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `tea_id` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `Q1` int(11) DEFAULT 0,
  `Q2` int(11) DEFAULT 0,
  `Q3` int(11) DEFAULT 0,
  `Q4` int(11) DEFAULT 0,
  `Q5` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`s.no.`, `stu_rollNo`, `class_id`, `tea_id`, `sub_name`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`) VALUES
(1, 1, 'CSE1-ADA', 1, 'ADA', 10, 9, 0, 0, 0),
(2, 1, 'CSE1-JAVA', 2, 'JAVA', 0, 0, 0, 0, 0),
(3, 1, 'CSE1-AI', 3, 'AI', 0, 0, 0, 0, 0),
(4, 2, 'CSE1-ADA', 1, 'ADA', 0, 0, 0, 0, 0),
(5, 2, 'CSE1-JAVA', 2, 'JAVA', 0, 0, 0, 0, 0),
(6, 2, 'CSE1-AI', 3, 'AI', 0, 0, 0, 0, 0),
(7, 3, 'CSE2-ADA', 1, 'ADA', 0, 0, 0, 0, 0),
(8, 3, 'CSE2-JAVA', 2, 'JAVA', 0, 0, 0, 0, 0),
(9, 3, 'CSE2-AI', 3, 'AI', 0, 0, 0, 0, 0),
(10, 4, 'CSE2-ADA', 1, 'ADA', 0, 0, 0, 0, 0),
(11, 4, 'CSE2-JAVA', 2, 'JAVA', 0, 0, 0, 0, 0),
(12, 4, 'CSE2-AI', 3, 'AI', 0, 0, 0, 0, 0),
(13, 5, 'CSE3-ADA', 1, 'ADA', 0, 0, 0, 0, 0),
(14, 5, 'CSE3-JAVA', 2, 'JAVA', 0, 0, 0, 0, 0),
(15, 5, 'CSE3-AI', 3, 'AI', 0, 0, 0, 0, 0),
(16, 6, 'CSE3-ADA', 1, 'ADA', 0, 0, 0, 0, 0),
(17, 6, 'CSE3-JAVA', 2, 'JAVA', 0, 0, 0, 0, 0),
(18, 6, 'CSE3-AI', 3, 'AI', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam_sheet`
--

CREATE TABLE `exam_sheet` (
  `s.no.` int(11) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `stu_rollNo` int(11) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `answersheet` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_sheet`
--

INSERT INTO `exam_sheet` (`s.no.`, `class_id`, `stu_rollNo`, `sub_name`, `answersheet`) VALUES
(1, 'CSE1-JAVA', 1, 'JAVA', 'https://drive.google.com/file/d/1SvQp16pPvusGSP6O7elvk9kysihkSKiO/view?usp=sharing'),
(2, 'CSE1-ADA', 1, 'ADA', 'https://drive.google.com/file/d/1SvQp16pPvusGSP6O7elvk9kysihkSKiO/view?usp=sharing'),
(3, 'CSE1-AI', 1, 'AI', 'https://drive.google.com/file/d/1SvQp16pPvusGSP6O7elvk9kysihkSKiO/view?usp=sharing'),
(4, 'CSE1-JAVA', 2, 'JAVA', 'https://drive.google.com/file/d/1QVp71tM2KXPIcaM-fH7pJU2z8nxj56uT/view?usp=sharing'),
(5, 'CSE1-ADA', 2, 'ADA', 'https://drive.google.com/file/d/1QVp71tM2KXPIcaM-fH7pJU2z8nxj56uT/view?usp=sharing'),
(6, 'CSE1-AI', 2, 'AI', 'https://drive.google.com/file/d/1QVp71tM2KXPIcaM-fH7pJU2z8nxj56uT/view?usp=sharing'),
(7, 'CSE2-JAVA', 3, 'JAVA', 'https://drive.google.com/file/d/1CtzlY5sAb4CyF_p4wSyuPToyx5-Q406U/view?usp=sharing'),
(8, 'CSE2-ADA', 3, 'ADA', 'https://drive.google.com/file/d/1CtzlY5sAb4CyF_p4wSyuPToyx5-Q406U/view?usp=sharing'),
(9, 'CSE2-AI', 3, 'AI', 'https://drive.google.com/file/d/1CtzlY5sAb4CyF_p4wSyuPToyx5-Q406U/view?usp=sharing'),
(10, 'CSE2-JAVA', 4, 'JAVA', 'https://drive.google.com/file/d/1kPfofwOSv3vZruDVGysv9mgaOIiXyMFZ/view?usp=sharing'),
(11, 'CSE2-ADA', 4, 'ADA', 'https://drive.google.com/file/d/1kPfofwOSv3vZruDVGysv9mgaOIiXyMFZ/view?usp=sharing'),
(12, 'CSE2-AI', 4, 'AI', 'https://drive.google.com/file/d/1kPfofwOSv3vZruDVGysv9mgaOIiXyMFZ/view?usp=sharing'),
(13, 'CSE3-JAVA', 5, 'JAVA', 'https://drive.google.com/file/d/1nzdWCNrmFQexUiRHv_ro22dl3yD-Wxuk/view?usp=sharing'),
(14, 'CSE3-ADA', 5, 'ADA', 'https://drive.google.com/file/d/1nzdWCNrmFQexUiRHv_ro22dl3yD-Wxuk/view?usp=sharing'),
(15, 'CSE3-AI', 5, 'AI', 'https://drive.google.com/file/d/1nzdWCNrmFQexUiRHv_ro22dl3yD-Wxuk/view?usp=sharing'),
(16, 'CSE3-JAVA', 6, 'JAVA', 'https://drive.google.com/file/d/1xAgA3YXU_B8GdPKCfgtwllpCcdMY4nxt/view?usp=sharing'),
(17, 'CSE3-ADA', 6, 'ADA', 'https://drive.google.com/file/d/1xAgA3YXU_B8GdPKCfgtwllpCcdMY4nxt/view?usp=sharing'),
(18, 'CSE3-AI', 6, 'AI', 'https://drive.google.com/file/d/1xAgA3YXU_B8GdPKCfgtwllpCcdMY4nxt/view?usp=sharing');

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

--
-- Dumping data for table `student_cred`
--

INSERT INTO `student_cred` (`stu_rollNo`, `stu_name`, `stu_email`, `stu_pass`, `stu_class`, `stu_picture`) VALUES
(1, 'Kushdeep Singh', 'skushdeep5@gmail.com', '12345678', 'CSE1', 'https://drive.google.com/file/d/18trOjv5VsHiCjEPIiBGMPNZyI7lNmwed/view?usp=sharing'),
(2, 'Jasveen Kaur', 'kjasveen23@gmail.com', '12345678', 'CSE1', 'https://drive.google.com/file/d/11t-LTEGYIVIiPWpljaSHT_n9eOGPGJ71/view?usp=sharing'),
(3, 'Deepak Kumar', 'dkarya.delhi.uk@gmail.com', '12345678', 'CSE2', 'https://drive.google.com/file/d/15S0oeuUIqAnu26nuVHrihjtnCwXOa8Mk/view?usp=sharing'),
(4, 'Devender Kumar', 'devender00999@gmail.com', '12345678', 'CSE2', 'https://drive.google.com/file/d/1_rXpgHtXH5YLjS1aKZs_L2lXIupVsFQA/view?usp=sharing'),
(5, 'Aastha Bhasin', 'aastha.bhasin16@gmail.com', '12345678', 'CSE3', 'https://drive.google.com/file/d/1igagGZ2Ir4fkBIiA2h0S_kX0wXagSNjx/view?usp=sharing'),
(6, 'Sumit Kumar', 'sumitkumar@gmail.com', '12345678', 'CSE3', 'https://drive.google.com/file/d/17AoInUcDO6FYjXmI1R8FY0OzI2vd9h34/view?usp=sharing');

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
(1, 'Munshi Yadav', 'munshiyadav@gtbit.org', '12345678', 'https://drive.google.com/file/d/1zK58eNTgeeoHvwwbTyg-Qca-kFSkDr4O/view?usp=sharing'),
(2, 'Rajiv Chopra', 'rajivchopra@gtbit.org', '12345678', 'https://drive.google.com/file/d/1szBJlEPklW-rkrql0BaFY9Kb1d235lij/view?usp=sharing'),
(3, 'Dr. Ashish Bhardwaj', 'ashishbhardwaj@gtbit.org', '12345678', 'https://drive.google.com/file/d/1dMRtkfc4pKqeW_lSfl3Kl78j8Z5fxUq3/view?usp=sharing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_classes`
--
ALTER TABLE `exam_classes`
  ADD PRIMARY KEY (`s.no.`),
  ADD UNIQUE KEY `UNIQUE` (`class_id`);

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
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `exam_sheet`
--
ALTER TABLE `exam_sheet`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacher_cred`
--
ALTER TABLE `teacher_cred`
  MODIFY `tea_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
