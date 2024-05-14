-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2024 at 01:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin1', '$2y$12$jZ.knX6SdQKL8TFVh8tCLu1nMN.q0r6./0tikHLjpDCf8sVw66D9y', NULL, '2024-04-04 02:16:31', '2024-04-04 02:16:31'),
(2, 'admin2', '$2y$10$/MzNYb/7uRPzRgItzOmePOL1/tmIDLrHWzZbG2zOKXq5Hfr.D34Tm', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `id_parent` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_schedule`
--

CREATE TABLE `child_schedule` (
  `id_child_schedule` int NOT NULL,
  `id_child` int NOT NULL,
  `id_schedule` int NOT NULL,
  `status` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `immunization_schedule`
--

CREATE TABLE `immunization_schedule` (
  `id_schedule` int NOT NULL,
  `type_vaccines` varchar(30) NOT NULL,
  `year` int NOT NULL,
  `month` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `immunization_schedule`
--

INSERT INTO `immunization_schedule` (`id_schedule`, `type_vaccines`, `year`, `month`, `updated_at`, `created_at`, `id_admin`) VALUES
(9, 'Hepatitis B', 0, 0, '2024-04-21 06:12:33', '2024-04-21 06:12:33', 1),
(10, 'DP-HiB 1', 0, 2, '2024-04-21 06:13:16', '2024-04-21 06:13:16', 1),
(11, 'Polio 1', 0, 2, '2024-04-21 06:13:46', '2024-04-21 06:13:46', 1),
(12, ' Hepatitis B 2', 0, 2, '2024-04-21 13:15:51', '2024-04-21 13:15:51', 1),
(13, 'Rotavirus', 0, 2, '2024-04-21 13:15:51', '2024-04-21 13:15:51', 1),
(14, 'PCV', 0, 2, '2024-04-21 13:15:51', '2024-04-21 13:15:51', 1),
(15, ' DPT-HiB 2', 0, 3, '2024-04-21 13:18:13', '2024-04-21 13:18:13', 1),
(16, 'Polio 2', 0, 3, '2024-04-21 13:18:13', '2024-04-21 13:18:13', 1),
(17, 'hepatitis B 3', 0, 3, '2024-04-21 13:18:13', '2024-04-21 13:18:13', 1),
(26, 'DPT-HiB 3', 0, 4, '2024-04-21 13:20:46', '2024-04-21 13:20:46', 1),
(27, 'Polio 3 ', 0, 4, '2024-04-21 13:20:46', '2024-04-21 13:20:46', 1),
(28, 'Hepatitis B 4', 0, 4, '2024-04-21 13:20:46', '2024-04-21 13:20:46', 1),
(29, 'Rotavirus 2', 0, 4, '2024-04-21 13:20:46', '2024-04-21 13:20:46', 1),
(30, 'PCV 3', 0, 6, '2024-04-21 13:22:34', '2024-04-21 13:22:34', 1),
(31, ' Influenza 1', 0, 6, '2024-04-21 13:22:34', '2024-04-21 13:22:34', 1),
(32, 'rotavirus 3 (pentavalen)', 0, 6, '2024-04-21 13:22:34', '2024-04-21 13:22:34', 1),
(33, 'Campak atau MR', 0, 9, '2024-04-21 13:23:54', '2024-04-21 13:23:54', 1),
(34, 'japanese encephalitis 1', 0, 9, '2024-04-21 13:23:54', '2024-04-21 13:23:54', 1),
(35, ' Polio 0 ', 0, 1, '2024-04-21 13:25:15', '2024-04-21 13:25:15', 2),
(36, 'BCG', 0, 1, '2024-04-21 13:25:15', '2024-04-21 13:25:15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id_parent` int NOT NULL,
  `email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_wa` varchar(225) NOT NULL,
  `otp` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id_parent`, `email`, `username`, `password`, `no_wa`, `otp`, `updated_at`, `created_at`) VALUES
(33, NULL, NULL, NULL, '$2y$12$LdLSG1Z9HH4zJp9bCc9gfeR5pxWwNCUUPgbx5cpQI/LRlHcTOQW/a', 746644, '2024-05-13 00:03:27', '2024-05-13 00:03:27'),
(34, 'udin@gmail.com', 'udin', '$2y$12$u.FYmLCqtc1R5Fix3rAH8uvJW9Ax2SOWw3IG8j2ytsyfYwsmPi2uS', '$2y$12$5ykXONo9eAk97OGlPprGSO1Nmo.2ndKRZ/HEG1cFltCDQJdZvqhRm', 774128, '2024-05-13 00:06:44', '2024-05-13 00:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parent` (`id_parent`);

--
-- Indexes for table `child_schedule`
--
ALTER TABLE `child_schedule`
  ADD PRIMARY KEY (`id_child_schedule`),
  ADD KEY `id_child` (`id_child`,`id_schedule`),
  ADD KEY `id_schedule` (`id_schedule`);

--
-- Indexes for table `immunization_schedule`
--
ALTER TABLE `immunization_schedule`
  ADD PRIMARY KEY (`id_schedule`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id_parent`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `child_schedule`
--
ALTER TABLE `child_schedule`
  MODIFY `id_child_schedule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `immunization_schedule`
--
ALTER TABLE `immunization_schedule`
  MODIFY `id_schedule` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id_parent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `parents` (`id_parent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `child_schedule`
--
ALTER TABLE `child_schedule`
  ADD CONSTRAINT `child_schedule_ibfk_1` FOREIGN KEY (`id_child`) REFERENCES `child` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `child_schedule_ibfk_2` FOREIGN KEY (`id_schedule`) REFERENCES `immunization_schedule` (`id_schedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `immunization_schedule`
--
ALTER TABLE `immunization_schedule`
  ADD CONSTRAINT `immunization_schedule_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
