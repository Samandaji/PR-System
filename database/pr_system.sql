-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2023 at 08:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `sn` int NOT NULL,
  `admin_id` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `oname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `sn` int NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `department_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `sn` int NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `supervisor_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `subject` varchar(50) NOT NULL,
  `notification_time` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`sn`, `student_email`, `supervisor_id`, `admin_id`, `subject`, `notification_time`) VALUES
(1, '1', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(2, 'Array', NULL, NULL, 'Proposal', '2023-04-14 19:59:11.27456'),
(3, 'Array', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(4, 'Array', NULL, NULL, 'Proposal', '2023-04-14 19:59:11.27456'),
(5, 'Array', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(6, 'Array', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(7, 'Array', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(8, 'Array', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(9, 'Array', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(10, 'Array@gmail.com', NULL, NULL, 'Abstract', '2023-04-14 19:59:11.27456'),
(11, 'JAIZNANANA@GMAIL.COM', NULL, NULL, 'Proposal', '2023-04-14 19:59:11.27456'),
(12, 'JAIZNANANA@GMAIL.COM', NULL, NULL, 'Chapter', '2023-04-14 20:02:21.36220');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_types`
--

CREATE TABLE `notifications_types` (
  `sn` int NOT NULL,
  `types` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications_types`
--

INSERT INTO `notifications_types` (`sn`, `types`) VALUES
(1, 'Proposal'),
(2, 'Abstract'),
(3, 'Chapter'),
(8, 'Correction');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `sn` int NOT NULL,
  `contributors` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `topic` varchar(200) NOT NULL,
  `abstract` text NOT NULL,
  `supervisor` varchar(200) NOT NULL,
  `session` varchar(200) NOT NULL,
  `year_of_graduation` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `project_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`sn`, `contributors`, `topic`, `abstract`, `supervisor`, `session`, `year_of_graduation`, `department`, `project_file`) VALUES
(7, 'Abdulhamid Idris, Auwal Ismail Muhammad & Abubakar Usman', 'Solution of Linear Diophantine Equations using Modified Gauss-Jordan Elimination method', '\r\n          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'saminuaminu@gmail.com', '2026/2027', '2022', 'Software Engineering', '../uploads/citation tags.docx'),
(8, NULL, 'adsdsd', 'hhhh', 'samandaji@gmail.com', '2022/2023', '2023', 'Software Engineering', '../uploads/IMG_20230414_102134_863.jpg'),
(9, NULL, 'dfdfdf', 'ghhgh', 'samandaji@gmail.com', '2021/2022', '2023', 'Software Engineering', '../uploads/IMG_20230414_102134_863.jpg'),
(10, NULL, 'adsdsd', 'hhh', 'saminuaminu@gmail.com', '2021/2022', '2023', 'Software Engineering', '../uploads/IMG_20230414_102134_863.jpg'),
(11, NULL, 'dfdfdf', 'yyyy', 'saminuaminu@gmail.com', '2023/2024', '2023', 'Computer Science', '../uploads/IMG_20230414_102134_863.jpg'),
(12, NULL, 'adsdsd', 'jjjjj', 'saminuaminu@gmail.com', '2021/2022', '2022', 'Cyber Security', '../uploads/rsz_img_20230412_170139_339.jpg'),
(13, NULL, 'adsdsd', 'jjjjj', 'saminuaminu@gmail.com', '2021/2022', '2022', 'Cyber Security', '../uploads/rsz_img_20230412_170139_339.jpg'),
(14, NULL, 'adsdsd', 'hhh', 'samandaji@gmail.com', '2022/2023', '2023', 'Software Engineering', '../uploads/IMG_20230414_102134_863.jpg'),
(15, NULL, 'dfdfdf', 'hhh', 'saminuaminu@gmail.com', '2021/2022', '2022', 'Software Engineering', '../uploads/IMG_20230414_102134_863.jpg'),
(16, NULL, 'adsdsd', 'hhhh', 'samandaji@gmail.com', '2022/2023', '2021', 'Software Engineering', '../uploads/rsz_img_20230414_102134_863.jpg'),
(17, NULL, 'adsdsd', 'ju', 'saminuaminu@gmail.com', '2021/2022', '2022', 'Software Engineering', '../uploads/IMG_20230414_102134_863.jpg'),
(18, NULL, 'adsdsd', 'hhh', 'samandaji@gmail.com', '2022/2023', '2021', 'Cyber Security', '../uploads/IMG_20230414_102134_863.jpg'),
(19, NULL, 'adsdsd', 'HHH', 'saminuaminu@gmail.com', '2022/2023', '2022', 'Computer Science', '../uploads/IMG_20230414_102134_863.jpg'),
(20, NULL, 'dfdfdf', 'nn', 'saminuaminu@gmail.com', '2021/2022', '2021', 'Cyber Security', '../uploads/rsz_img_20230414_102134_863.jpg'),
(21, NULL, 'blockchain tech', 'test', 'saminuaminu@gmail.com', '2022/2023', '2022', 'Computer Science', '../uploads/IMG_20230414_102134_863.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sn` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `sn` int NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `oname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_added` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `notifications_types`
--
ALTER TABLE `notifications_types`
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
  MODIFY `sn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `sn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `sn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications_types`
--
ALTER TABLE `notifications_types`
  MODIFY `sn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `sn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `sn` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
