-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 09:13 AM
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
-- Database: `ci4ama`
--

-- --------------------------------------------------------

--
-- Table structure for table `ama_edit_history`
--

CREATE TABLE `ama_edit_history` (
  `edit_id` int(11) NOT NULL,
  `reg_num` bigint(20) NOT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `edited_details` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Edit History';

-- --------------------------------------------------------

--
-- Table structure for table `ama_students`
--

CREATE TABLE `ama_students` (
  `id` int(11) NOT NULL,
  `reg_num` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `aadhaar` bigint(20) DEFAULT NULL,
  `mother` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Students';

-- --------------------------------------------------------

--
-- Table structure for table `ama_students_reg`
--

CREATE TABLE `ama_students_reg` (
  `id` int(11) NOT NULL,
  `reg_num` bigint(20) NOT NULL,
  `student_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhaar` bigint(20) DEFAULT NULL,
  `blood_group` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_rel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occup` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_qual` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_mob` bigint(20) NOT NULL,
  `father_occup` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_qual` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_mob` bigint(20) NOT NULL,
  `income` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Students Registration';

-- --------------------------------------------------------

--
-- Table structure for table `ama_tmp_students_reg`
--

CREATE TABLE `ama_tmp_students_reg` (
  `id` int(11) NOT NULL,
  `token_num` bigint(20) DEFAULT NULL,
  `student_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhaar` bigint(20) DEFAULT NULL,
  `blood_group` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp_rel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occup` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_qual` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_mob` bigint(20) DEFAULT NULL,
  `father_occup` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_qual` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_mob` bigint(20) DEFAULT NULL,
  `income` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `step` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Temporary Students Registration';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ama_edit_history`
--
ALTER TABLE `ama_edit_history`
  ADD PRIMARY KEY (`edit_id`);

--
-- Indexes for table `ama_students`
--
ALTER TABLE `ama_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ama_students_reg`
--
ALTER TABLE `ama_students_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ama_tmp_students_reg`
--
ALTER TABLE `ama_tmp_students_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ama_edit_history`
--
ALTER TABLE `ama_edit_history`
  MODIFY `edit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ama_students`
--
ALTER TABLE `ama_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ama_students_reg`
--
ALTER TABLE `ama_students_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ama_tmp_students_reg`
--
ALTER TABLE `ama_tmp_students_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
