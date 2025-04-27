-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2025 at 04:34 PM
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
-- Database: `applicants_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `applicant_no` varchar(20) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `applicant_no`, `last_name`, `first_name`, `middle_name`, `course`) VALUES
(5, '2025025', 'Ignacio', 'Mark Elezar', 'Pogi', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `completed_interviews`
--

CREATE TABLE `completed_interviews` (
  `id` int(11) NOT NULL,
  `applicant_no` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `interview_score` int(11) DEFAULT NULL,
  `completion_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `completed_interviews`
--

INSERT INTO `completed_interviews` (`id`, `applicant_no`, `last_name`, `first_name`, `middle_name`, `course`, `interview_score`, `completion_date`, `created_at`) VALUES
(1, '2025003', 'Garcia', 'Maria', 'C.', 'Engineering', 1, '2025-03-24 10:02:33', '2025-03-24 10:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `interview_schedules`
--

CREATE TABLE `interview_schedules` (
  `id` int(11) NOT NULL,
  `applicant_no` varchar(50) DEFAULT NULL,
  `schedule_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `mode` varchar(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `panel1` varchar(100) DEFAULT NULL,
  `panel2` varchar(100) DEFAULT NULL,
  `panel3` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `interview_schedules`
--

INSERT INTO `interview_schedules` (`id`, `applicant_no`, `schedule_date`, `start_time`, `end_time`, `mode`, `location`, `panel1`, `panel2`, `panel3`, `created_at`) VALUES
(1, '2025001', '2025-02-24', '14:56:00', '14:56:00', 'online', 'adsa', 'dasd', 'sadsa', 'dssadsad', '2025-03-24 05:56:52'),
(2, '2025001', '2025-02-24', '15:57:00', '13:58:00', 'online', 'asdsa', 'sadas', 'dasd', 'sadsad', '2025-03-24 05:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_interviews`
--

CREATE TABLE `ongoing_interviews` (
  `id` int(11) NOT NULL,
  `applicant_no` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `panel1` varchar(100) DEFAULT NULL,
  `panel2` varchar(100) DEFAULT NULL,
  `panel3` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ongoing_interviews`
--

INSERT INTO `ongoing_interviews` (`id`, `applicant_no`, `last_name`, `first_name`, `middle_name`, `course`, `date`, `start_time`, `end_time`, `mode`, `location`, `panel1`, `panel2`, `panel3`, `created_at`) VALUES
(1, '2025001', 'Doe', 'John', 'A.', 'Information Technology', '2025-03-06', '14:09:00', '14:12:00', 'online', 'asd', 'sad', 'sadsa', 'dasdsa', '2025-03-24 06:16:47'),
(4, '2025100', 'Dela Cruz', 'Juan', 'One', 'Engineering', '2025-02-25', '06:06:00', '09:06:00', 'online', 'Sa pangasinan', 'asdsa', 'zsas', 'sASas', '2025-03-24 10:05:11'),
(5, '2025010', 'Rome', 'Ray Gerald', 'Macabante', 'Information Technology', '2025-03-01', '18:25:00', '18:23:00', 'online', 'Sa pangasinan', 'asdsa', 'asdsa', 'ignacio', '2025-03-24 10:24:13'),
(6, '2025002', NULL, NULL, NULL, NULL, '2025-02-26', '04:03:00', '17:02:00', 'online', 'Sa pangasinan', 'dasd', 'dasd', 'ASDSA', '2025-03-24 10:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `pending_interviews`
--

CREATE TABLE `pending_interviews` (
  `id` int(11) NOT NULL,
  `applicant_no` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `panel1` varchar(100) DEFAULT NULL,
  `panel2` varchar(100) DEFAULT NULL,
  `panel3` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'pending_confirmation'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reschedule_requests`
--

CREATE TABLE `reschedule_requests` (
  `id` int(11) NOT NULL,
  `applicant_no` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_interviews`
--
ALTER TABLE `completed_interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongoing_interviews`
--
ALTER TABLE `ongoing_interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_interviews`
--
ALTER TABLE `pending_interviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reschedule_requests`
--
ALTER TABLE `reschedule_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `completed_interviews`
--
ALTER TABLE `completed_interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ongoing_interviews`
--
ALTER TABLE `ongoing_interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pending_interviews`
--
ALTER TABLE `pending_interviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reschedule_requests`
--
ALTER TABLE `reschedule_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
