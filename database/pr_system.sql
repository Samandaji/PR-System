-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 01:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pr_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `sn` int(11) NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `oname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`sn`, `admin_id`, `fname`, `lname`, `oname`, `email`, `phone`, `password`) VALUES
(1, 'admin', 'Haruna', 'Ahmed', 'Abdullahi', 'harunaahmedabdullahi@gmail.com', '07039238106', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `sn` int(11) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `department_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`sn`, `department_name`, `department_id`) VALUES
(1, 'Computer Science', '1'),
(2, 'Software Engineering', '2'),
(3, 'Cyber Security', '3'),
(4, 'Information Technology', '4');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `sn` int(11) NOT NULL,
  `contributors` varchar(200) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `abstract` text NOT NULL,
  `supervisor` varchar(200) NOT NULL,
  `session` varchar(200) NOT NULL,
  `year_of_graduation` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `project_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`sn`, `contributors`, `topic`, `abstract`, `supervisor`, `session`, `year_of_graduation`, `department`, `project_file`) VALUES
(7, 'Abdulhamid Idris, Auwal Ismail Muhammad & Abubakar Usman', 'Solution of Linear Diophantine Equations using Modified Gauss-Jordan Elimination method', '\r\n          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'saminuaminu@gmail.com', '2026/2027', '2022', 'Software Engineering', '../uploads/citation tags.docx');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sn` int(11) NOT NULL,
  `reg_number` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_added` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sn`, `reg_number`, `full_name`, `email`, `department`, `faculty`, `level`, `username`, `password`, `date_added`, `gender`) VALUES
(3, 'CST/16/COM/00836', 'Auwal Ismail Muhammad', 'JAIZNANANA@GMAIL.COM', '2', '', '', 'JAIZ', 'JAIZ', '', ''),
(1, 'CST/16/COM/00850', 'Abduhamid Idris', 'abdulhamididris16@gmail.com', 'Computer Science', 'Computer Science and Information Technology', '400', 'student', 'student', '03/05/2023', 'Male'),
(2, 'CST/16/COM/44', 'Dauda Bala', 'daudabala@gmail.com', 'Computer Science', 'FCSIT', '3', 'DAUDA', 'BALA', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `sn` int(11) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `oname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_added` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`sn`, `staff_id`, `fname`, `lname`, `oname`, `email`, `phone`, `password`, `date_added`) VALUES
(1, 'SP 001', 'Saminu', 'Aminu', '', 'saminuaminu@gmail.com', '07039238106', '12345', ''),
(2, 'SP 002', 'Saman', 'Daji', '', 'samandaji@gmail.com', '09000000000', '12345', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`reg_number`),
  ADD UNIQUE KEY `sn` (`sn`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `sn` (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
