-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2023 at 10:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(32) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_addr` varchar(255) DEFAULT NULL,
  `admin_phone` varchar(255) DEFAULT NULL,
  `admin_ln` text DEFAULT NULL,
  `admin_in` text DEFAULT NULL,
  `admin_gh` text DEFAULT NULL,
  `admin_tw` text DEFAULT NULL,
  `admin_desc` text DEFAULT NULL,
  `admin_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `security_code`, `admin_name`, `admin_addr`, `admin_phone`, `admin_ln`, `admin_in`, `admin_gh`, `admin_tw`, `admin_desc`, `admin_photo`) VALUES
(1, 'admin02', '$2y$10$SLU7.nBgkfijYEv3iWIGCO/ObECw9wqwFQciEU8eczhO0QJwU71Zy', 'anujbarve27@gmail.com', '7596526', 'The BOSS', '102,bell avenue', '09604345549', 'asfd', 'asfd', 'asdfsfdasadf', 'asfdsfasdfa', 'asfdsadf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `assigned_course` int(11) NOT NULL,
  `assignment_desc` text NOT NULL,
  `assignment_date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `assignment_name`, `assigned_course`, `assignment_desc`, `assignment_date`) VALUES
(1, 'Implement Tree ', 1, 'Implement Tree DS using CPP', '2023-05-07 00:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `completed_assignments`
--

CREATE TABLE `completed_assignments` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `source_code` text NOT NULL,
  `lang` int(11) NOT NULL,
  `completed_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_assignments`
--

INSERT INTO `completed_assignments` (`id`, `filename`, `assignment_name`, `user`, `source_code`, `lang`, `completed_time`) VALUES
(1, '', 'Implement Tree ', 'anujbarve', 'asdfsadfsadf', 50, '2023-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(32) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `time`, `status`) VALUES
(6, 'Anuj', 'anujbarve27@gmail.com', 'SITE Almost Done', 'The website is almost complete', '2023-05-04 18:34:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_teacher` varchar(255) NOT NULL,
  `assignments_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_teacher`, `assignments_no`) VALUES
(1, 'DSA', 'DSA Teacher', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(128) NOT NULL,
  `teacherEmail` varchar(128) NOT NULL,
  `teacherAddr` varchar(255) DEFAULT NULL,
  `teacherPhone` varchar(255) DEFAULT NULL,
  `teacherUid` varchar(128) NOT NULL,
  `teacherPwd` varchar(128) NOT NULL,
  `teacher_ln` text DEFAULT NULL,
  `teacher_gh` text DEFAULT NULL,
  `teacher_in` varchar(255) DEFAULT NULL,
  `teacher_tw` varchar(255) DEFAULT NULL,
  `teacher_desc` text DEFAULT NULL,
  `teacher_photo` varchar(255) DEFAULT NULL,
  `last_login` bigint(20) DEFAULT NULL,
  `assigned_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `teacherName`, `teacherEmail`, `teacherAddr`, `teacherPhone`, `teacherUid`, `teacherPwd`, `teacher_ln`, `teacher_gh`, `teacher_in`, `teacher_tw`, `teacher_desc`, `teacher_photo`, `last_login`, `assigned_course`) VALUES
(1, 'DSA Teacher', 'dsateach@mail.com', '', '', 'dsa', '$2y$10$18JLjtr9BPZobzH.gsNUvenXpmzLrnm5bOL5RaK.knfMMh4Jnd0Zm', '', '', '', '', '', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userAddr` varchar(255) DEFAULT NULL,
  `userPhone` varchar(255) DEFAULT NULL,
  `userUid` varchar(128) NOT NULL,
  `userPwd` varchar(128) NOT NULL,
  `user_ln` text DEFAULT NULL,
  `user_gh` text DEFAULT NULL,
  `user_in` varchar(255) DEFAULT NULL,
  `user_tw` varchar(255) DEFAULT NULL,
  `user_desc` text DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `last_login` bigint(20) DEFAULT NULL,
  `assigned_course` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userAddr`, `userPhone`, `userUid`, `userPwd`, `user_ln`, `user_gh`, `user_in`, `user_tw`, `user_desc`, `user_photo`, `last_login`, `assigned_course`) VALUES
(1, 'Anuj Vinod Barve', 'anujbarve27@gmail.com', 'Nasik, Maharashtra, India ', '9604345549', 'anujbarve', '$2y$10$SLU7.nBgkfijYEv3iWIGCO/ObECw9wqwFQciEU8eczhO0QJwU71Zy', 'https://in.linkedin.com/in/anuj-barve-838b9b162', 'https://github.com/anujbarve/', 'https://www.instagram.com/anuj_barve/', 'https://twitter.com/BarveAnuj', 'Web and App Developer | Flutter Enthusiast | Student | Aspiring Computer Engineer | Introvert / Extrovert Depends on the situation ; )', 'pfp.jpg', 1683403587, 1),
(2, 'Pratik Rahane', 'pratikrahane@gmail.com', '', '', 'pratikrahane', '$2y$10$qU1SuYDVzyqWxDdbn2ec3eYA3uUOEihZvYR/VZ/trYWORGb4dcb22', '', '', '', '', '', NULL, NULL, NULL),
(3, 'Om Thorat', 'omthorat@gmail.com', NULL, NULL, 'omthorat', '$2y$10$j40GIO1PU.3g7B8uoCWd3OJvErCKGlnZN4TVvI1l/o29nDV.Ez30S', NULL, NULL, NULL, NULL, NULL, NULL, 1683214610, NULL),
(4, 'Dhiraj Yadav', 'dhirajyadav@gmail.com', NULL, NULL, 'dhirajyadav', '$2y$10$/tGEMK1tbNg4CeHjv6Vefe3nH.xgb8FKeJBRCXQnM3J1XgIy8eJZm', NULL, NULL, NULL, NULL, NULL, NULL, 1683214701, NULL),
(5, 'Swarali Surve', 'swaralisurve@gmail.com', NULL, NULL, 'swaralisurve', '$2y$10$TG44Va8HmoBPMMQtRJbLcueRDUv9f5YslZf.uXeVFPwP3/k77QyDy', NULL, NULL, NULL, NULL, NULL, NULL, 1683214836, NULL),
(6, 'Ishwari Yadav', 'ishwariyadav@gmail.com', NULL, NULL, 'ishwariyadav', '$2y$10$SLU7.nBgkfijYEv3iWIGCO/ObECw9wqwFQciEU8eczhO0QJwU71Zy', NULL, NULL, NULL, NULL, NULL, NULL, 1683214934, NULL),
(8, 'dedemo ', 'sdfgsdfg@mail.com', NULL, NULL, 'alex', '$2y$10$Ko0W19z/bB/ZvN/2h7a8EeHwVMSVAV4NBaWoHQgFdyVPi4hFxQgK2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_files`
--

CREATE TABLE `user_files` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `source_code` text DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `assignment_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `name`, `extension`, `source_code`, `user_name`, `assignment_id`, `time_stamp`) VALUES
(1, 'Hello World In CPP', '52', '#include <iostream>\n\nusing namespace std;\n\nint main()\n{\n    cout<<\"Hello World\";\n}', 'anujbarve', 0, '2023-05-04 15:56:30'),
(3, 'Python hello world', '71', 'print(\"Hello world\")', 'anujbarve', 0, '2023-05-04 18:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

CREATE TABLE `user_posts` (
  `id` int(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `scode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_assignments`
--
ALTER TABLE `completed_assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_files`
--
ALTER TABLE `user_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `completed_assignments`
--
ALTER TABLE `completed_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;