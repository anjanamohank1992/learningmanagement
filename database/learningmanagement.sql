-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2025 at 12:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learningmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Laravel for Beginners 2', 'Learn the basics of Laravel  framework including routing, migrations, and authentication.', 599.99, '2025-09-17 01:21:30', '2025-09-17 03:44:34'),
(2, 'Advanced Laravel', 'Deep dive into Laravel features like queues, events, broadcasting, and testing.', 999.99, '2025-09-17 01:21:30', '2025-09-17 01:21:30'),
(3, 'Business Analytics with SQL', 'Learn SQL queries and data analysis for business intelligence.', 1099.99, '2025-09-17 01:21:30', '2025-09-17 01:21:30'),
(4, 'Data Analytics', 'Data analytics with python and r programming', 699.99, '2025-09-17 02:31:35', '2025-09-17 02:33:13'),
(5, 'cjvghjkf', NULL, 5555.00, '2025-09-17 04:21:14', '2025-09-17 04:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourses`
--

CREATE TABLE `studentcourses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentcourses`
--

INSERT INTO `studentcourses` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 4, 4, '2025-09-17 03:05:31', '2025-09-17 03:05:31'),
(2, 4, 2, '2025-09-17 03:45:19', '2025-09-17 03:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin', 'admin@example.com', '$2y$10$iMYKa8qBAn55fgOYV7Rko.yiSGY0mhl7niiSKAN7v1IPg9B/SeVjK', '2025-09-17 01:16:28', '2025-09-17 01:16:28'),
(2, 'Student User1', 'student', 'student1@example.com', '$2y$10$iMYKa8qBAn55fgOYV7Rko.yiSGY0mhl7niiSKAN7v1IPg9B/SeVjK', '2025-09-17 01:16:28', '2025-09-17 01:16:28'),
(3, 'Student User2', 'student', 'student2@example.com', '$2y$10$iMYKa8qBAn55fgOYV7Rko.yiSGY0mhl7niiSKAN7v1IPg9B/SeVjK', '2025-09-17 01:16:28', '2025-09-17 01:16:28'),
(4, 'Student User3', 'student', 'student3@example.com', '$2y$10$iMYKa8qBAn55fgOYV7Rko.yiSGY0mhl7niiSKAN7v1IPg9B/SeVjK', '2025-09-17 02:03:59', '2025-09-17 02:03:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentcourses`
--
ALTER TABLE `studentcourses`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentcourses`
--
ALTER TABLE `studentcourses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
