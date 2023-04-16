-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2023 at 07:41 PM
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
  `security_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `security_code`) VALUES
(1, 'admin02', '$2y$10$YOtOJiT0/iLSWwgffIQ7gOxYuWLubWHqKnrYFkYHYnaRhlrx7Ekjq', 'admin02@mail.com', '7596526');

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
(1, 'Anuj Vinod Barve', 'vinodbarve19@gmail.com', 'Site is finally live ', 'Site is finally live \r\nyayyyy!!!', '2022-05-30 06:40:40', 1),
(2, 'Alex', 'alex@mail.com', 'Congratulations', 'Congratulations on making the website live my friend', '2022-05-30 06:47:09', 0);

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
  `teacher_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `teacherName`, `teacherEmail`, `teacherAddr`, `teacherPhone`, `teacherUid`, `teacherPwd`, `teacher_ln`, `teacher_gh`, `teacher_in`, `teacher_tw`, `teacher_desc`, `teacher_photo`) VALUES
(10, 'Anuj Vinod Barve', 'anujbarve27@gmail.com', '102,bell avenue', '09604345549', 'alexg', '$2y$10$WNo.4qemsiuPgALbrl2u4u/97KOMZg3cmELw/rT/Tm2Vb7WvFDJKK', 'https://www.linkedin.com/', 'https://github.com/', 'https://github.com/anujbarve/', 'https://github.com/anujbarve/', 'Hello this is Anuj, I\'m an upcoming SDE', 'anno.jpg'),
(14, 'Anuj Barve', 'a@m.com', 'New york', '465465454', 'a', '$2y$10$buDS1vIWONPYkPWBmc5/ZuHMuo3AhQ5dJ7NL1LCOyXDBwRUlgYOSm', ' https://github.com/anujbarve/', ' https://github.com/anujbarve/', ' https://github.com/anujbarve/', ' https://github.com/anujbarve/', 'Hello there', 'anno.png');

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
  `user_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userAddr`, `userPhone`, `userUid`, `userPwd`, `user_ln`, `user_gh`, `user_in`, `user_tw`, `user_desc`, `user_photo`) VALUES
(10, 'Anuj Vinod Barve', 'anujbarve27@gmail.com', '102,bell avenue', '09604345549', 'alexg', '$2y$10$WNo.4qemsiuPgALbrl2u4u/97KOMZg3cmELw/rT/Tm2Vb7WvFDJKK', 'https://www.linkedin.com/', 'https://github.com/', 'https://github.com/anujbarve/', 'https://github.com/anujbarve/', 'Hello this is Anuj, I\'m an upcoming SDE', 'anno.jpg'),
(14, 'Anuj Barve', 'a@m.com', 'New york', '465465454', 'a', '$2y$10$buDS1vIWONPYkPWBmc5/ZuHMuo3AhQ5dJ7NL1LCOyXDBwRUlgYOSm', ' https://github.com/anujbarve/', ' https://github.com/anujbarve/', ' https://github.com/anujbarve/', ' https://github.com/anujbarve/', 'Hello there', 'anno.png');

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
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_files`
--

INSERT INTO `user_files` (`id`, `name`, `extension`, `source_code`, `user_name`, `time_stamp`) VALUES
(11, 'LL_hello.cpp', '71', '#include <iostream>\r\n\r\nint main() {\r\n    std::cout << \"hello, world\" << std::endl;\r\n    return 0;\r\n}\r\n', 'lalex', '2023-04-16 13:34:02'),
(7, 'LL_hello.py', '71', 'print(\"Hello lalex\")', 'lalex', '2023-04-16 13:34:02'),
(8, 'LL_hello.js', '71', 'console.log(\"Hello using JS\");', 'lalex', '2023-04-16 13:34:02'),
(9, 'LL_hello.java', '71', 'public class Main {\r\n    public static void main(String[] args) {\r\n        System.out.println(\"hello, world\");\r\n    }\r\n}\r\n', 'lalex', '2023-04-16 13:34:02'),
(10, 'LL_hello.c', '71', '// Powered by Judge0\r\n#include <stdio.h>\r\n\r\nint main(void) {\r\n    printf(\"Hello Judge0!\\n\");\r\n    return 0;\r\n}', 'lalex', '2023-04-16 13:34:02'),
(23, 'hello.py', '71', 'print(\"Hello World\")', 'alexg', '2023-04-16 13:34:02'),
(24, 'hello.js', '63', 'console.log(\"HEHEHE\");', 'alexg', '2023-04-16 13:34:02'),
(28, 'newone.c', '50', '#include <stdio.h>\n\nint main()\n{\n    printf(\"Hello Anuj\");\n}', 'a', '2023-04-16 13:34:02');

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
-- Dumping data for table `user_posts`
--

INSERT INTO `user_posts` (`id`, `title`, `username`, `description`, `scode`, `date`, `fname`) VALUES
(14, 'noice js', 'alexg', 'noice js', 'js', '2022-05-30 05:18:39', 'hello.js');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_files`
--
ALTER TABLE `user_files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;