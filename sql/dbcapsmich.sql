-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 04:45 AM
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
-- Database: `dbcapsmich`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) DEFAULT NULL,
  `building_structure` varchar(255) DEFAULT NULL,
  `building_type` varchar(255) DEFAULT NULL,
  `building_area` double(8,2) DEFAULT NULL,
  `lot_area` double(8,2) DEFAULT NULL,
  `building_location` varchar(255) DEFAULT NULL,
  `building_in_charge` varchar(255) DEFAULT NULL,
  `date_of_completion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `building_structure`, `building_type`, `building_area`, `lot_area`, `building_location`, `building_in_charge`, `date_of_completion`, `created_at`, `updated_at`) VALUES
(1, 'Academic Building A', 'Concrete', 'Two Story', 12.12, 11.18, 'Maura', 'GSO OFFICERS', '1999-05-01', '2024-05-13 11:11:34', '2024-05-19 22:07:09'),
(2, 'Academic Building B', 'wood', 'One Story', 24.12, 12.24, 'Maura', 'DEAN', '2005-07-26', '2024-05-14 11:50:57', '2024-05-20 06:55:23'),
(3, 'Academic Building C', 'wood', 'One Story', 24.12, 12.24, 'Maura', 'Dean', '2005-07-25', '2024-05-14 11:51:44', '2024-05-20 06:55:35'),
(4, 'Academic Building D', 'Concrete', 'Two Story', 32.12, 12.32, 'Maura', 'PROFESSOR', '2011-06-30', '2024-05-14 11:59:53', '2024-05-20 06:55:48'),
(5, 'Academic Building E', 'Concrete', 'Two Story', 32.12, 12.32, 'Maura', 'PROFESSOR', '2009-08-20', '2024-05-14 12:04:23', '2024-05-20 06:55:59'),
(6, 'Academic Building F', 'Concrete', 'Two Story', 32.12, 12.32, 'Maura', 'PROFESSOR', '2013-05-01', '2024-05-14 12:08:24', '2024-05-20 06:56:12'),
(7, 'Academic Building G', 'Concrete', 'Two Story', 24.12, 11.14, 'Maura', 'GSO OFFICER', '9999-09-09', '2024-05-14 12:15:59', '2024-05-20 06:56:23'),
(8, 'Academic Building H', 'Concrete', 'Two Story', 24.12, 11.16, 'Maura', 'GSO OFFICER', '2000-01-05', '2024-05-15 21:33:52', '2024-05-20 06:56:35'),
(9, 'Academic Building I', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1108-11-11', '2024-05-21 08:47:07', '2024-05-21 08:47:07'),
(10, 'Academic Building I', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1111-11-11', '2024-05-28 12:04:27', '2024-05-28 12:04:27'),
(11, 'Academic Building I', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1110-11-11', '2024-05-28 12:05:42', '2024-05-28 12:05:42'),
(12, 'Academic Building I', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1111-11-11', '2024-05-28 12:22:54', '2024-05-28 12:22:54'),
(13, 'Academic Building I', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1110-11-11', '2024-05-28 12:25:00', '2024-05-28 12:25:00'),
(14, 'Academic Building I', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1111-11-11', '2024-05-28 12:25:53', '2024-05-28 12:25:53'),
(15, 'Academic Building A', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1111-11-11', '2024-05-28 12:30:17', '2024-05-28 12:30:17'),
(16, 'Academic Building A', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1110-11-11', '2024-05-28 12:36:51', '2024-05-28 12:36:51'),
(17, 'Academic Building A', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1111-11-11', '2024-05-29 06:05:05', '2024-05-29 06:05:05'),
(18, 'Academic Building A', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '1111-11-11', '2024-05-29 06:08:42', '2024-05-29 06:08:42'),
(19, 'Academic Building A', 'wood', 'one story', 12.12, 11.14, 'Maura', 'qwgwduh', '2024-10-03', '2024-10-01 23:14:50', '2024-10-01 23:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `email`, `rate`, `comments`, `created_at`, `updated_at`) VALUES
(1, 'mich2@gmail.com', '1', 'pangit', '2024-05-19 21:54:36', '2024-05-19 21:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buildings_name` varchar(255) DEFAULT NULL,
  `rooms_name` int(11) NOT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `location_description` varchar(255) DEFAULT NULL,
  `maintenance_type` varchar(255) DEFAULT NULL,
  `issue_description` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `attachments` varchar(255) DEFAULT NULL,
  `submitter_name` varchar(255) DEFAULT NULL,
  `submitter_email` varchar(255) DEFAULT NULL,
  `submitter_phone` int(11) NOT NULL,
  `submittion_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_12_123519_create_roles_table', 1),
(6, '2023_12_12_123555_create_role_user_table', 1),
(7, '2024_02_20_082913_create_feedbacks_table', 1),
(8, '2024_02_21_034054_create_products_table', 1),
(9, '2024_02_27_011539_create_curricula_table', 1),
(11, '2024_02_27_011539_create_buildings_table', 2),
(12, '2024_05_16_072125_create_rooms_table', 3),
(14, '2024_05_16_174948_create_rooms_table', 4),
(15, '2024_05_27_104242_create_maintenances_table', 5),
(16, '2024_05_28_161334_create_maintenances_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `pdesc` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `stocks` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-05-22 10:44:53', '2024-05-22 10:44:53'),
(2, 'user', '2024-05-22 10:44:53', '2024-05-22 10:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, NULL, NULL),
(2, 2, 5, NULL, NULL),
(3, 2, 6, NULL, NULL),
(4, 2, 7, NULL, NULL),
(5, 2, 8, NULL, NULL),
(6, 2, 9, NULL, NULL),
(7, 2, 10, NULL, NULL),
(8, 2, 11, NULL, NULL),
(9, 2, 12, NULL, NULL),
(10, 2, 13, NULL, NULL),
(11, 2, 14, NULL, NULL),
(12, 2, 15, NULL, NULL),
(13, 2, 16, NULL, NULL),
(14, 2, 17, NULL, NULL),
(15, 2, 18, NULL, NULL),
(16, 2, 19, NULL, NULL),
(17, 2, 20, NULL, NULL),
(18, 2, 21, NULL, NULL),
(19, 2, 22, NULL, NULL),
(20, 2, 23, NULL, NULL),
(21, 1, 1, NULL, NULL),
(22, 1, 2, NULL, NULL),
(23, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_area` double DEFAULT NULL,
  `room_capacity` int(11) DEFAULT NULL,
  `room_door` varchar(255) DEFAULT NULL,
  `room_window` varchar(255) DEFAULT NULL,
  `room_size` double(8,2) DEFAULT NULL,
  `room_use` varchar(255) DEFAULT NULL,
  `room_remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_id`, `room_area`, `room_capacity`, `room_door`, `room_window`, `room_size`, `room_use`, `room_remark`, `created_at`, `updated_at`) VALUES
(1, 14, 11.12, 58, '58', '58', 58.00, '58', '58', '2024-05-21 08:50:42', '2024-05-21 08:50:42'),
(2, 14, 11.12, 58, '58', '58', 58.00, '58', '58', '2024-05-21 09:15:36', '2024-05-21 09:15:36'),
(3, 14, 11.12, 58, '58', '58', 58.00, '58', '58', '2024-05-21 09:21:54', '2024-05-21 09:21:54'),
(4, 14, 11.12, 58, '58', '58', 58.00, '58', '58', '2024-05-21 09:24:31', '2024-05-21 09:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@mail.com', NULL, '$2y$12$QC6DJflRvJzdz1y7hNO7hOxjhVCTxIOSAfhOSrMMJAhhrvD05Gafm', NULL, '2024-05-22 10:44:54', '2024-05-22 10:44:54'),
(2, 'Administrator(Leo)', 'l30pmsit@gmail.com', NULL, '$2y$12$WMKWoouP8t..6lgXdyaEyO9h9TSti0kAo9VmY/uqiuGBFEbp5Tlsy', NULL, '2024-05-22 10:44:55', '2024-05-22 10:44:55'),
(3, 'User', 'user@mail.com', NULL, '$2y$12$g1R1LWwKj9ZvZkss0wIgdO9Y8iiUQTQOouHuX8IsabA2X/L8l.V3q', 'yjuVCG6V0pgtA1HsnveywMEKPZxQRlRqDIsbSHEOLhfDuo17ALk5zauNmhaM', '2024-05-22 10:44:55', '2024-05-22 10:44:55'),
(4, 'User1', 'user1@mail.com', NULL, '$2y$12$QbEzFOO2.1CPfPHTl8sFUuf7tYowPxL9x71hJKtpQFXFKrFjxxHHS', NULL, '2024-05-22 10:44:56', '2024-05-22 10:44:56'),
(5, 'User2', 'user2@mail.com', NULL, '$2y$12$HcevOkSO.zpnCD8r3ziF2eZV7FcUEGliAMZV3F8XJszR0SL7fFhrO', NULL, '2024-05-22 10:44:56', '2024-05-22 10:44:56'),
(6, 'User3', 'user3@mail.com', NULL, '$2y$12$RH7xUe8tDlrwz9Jg1675HuZ2T9s7d1.OnfznaiZ8xK0B6RkUR2Nym', NULL, '2024-05-22 10:44:57', '2024-05-22 10:44:57'),
(7, 'User4', 'user4@mail.com', NULL, '$2y$12$dBRo3cKRrTHXi12xqgShxOgtFtsSkwtHXaEJ/4e0leuxNeZ9vwp9C', NULL, '2024-05-22 10:44:57', '2024-05-22 10:44:57'),
(8, 'User5', 'user5@mail.com', NULL, '$2y$12$ag.1fXLXsT13SWOKD7q.DeiaCsFCtOypGObZoBGazGUrIqsJAsvUC', NULL, '2024-05-22 10:44:58', '2024-05-22 10:44:58'),
(9, 'User6', 'user6@mail.com', NULL, '$2y$12$uawMClwswq4P44iB3rkELua/0RE8GIDb1UTwya39VRt/BsD0I3QdS', NULL, '2024-05-22 10:44:58', '2024-05-22 10:44:58'),
(10, 'User7', 'user7@mail.com', NULL, '$2y$12$Ese6/JDmz9yE5duPvz4Jk.pcgUBkj1g1Lv1HOHoE08AfQJEvaBoY6', NULL, '2024-05-22 10:44:59', '2024-05-22 10:44:59'),
(11, 'User8', 'user8@mail.com', NULL, '$2y$12$IkkOQ3BhidcHnhieUksn/eJ97c1pk28odxg4zJdsVxpp8s2Axm1Yi', NULL, '2024-05-22 10:44:59', '2024-05-22 10:44:59'),
(12, 'User9', 'user9@mail.com', NULL, '$2y$12$4ER/K6NSPALobTDo3HboKOHWUgfDyabnXg1NOkXZflPKhuyEUo8f6', NULL, '2024-05-22 10:45:00', '2024-05-22 10:45:00'),
(13, 'User10', 'user10@mail.com', NULL, '$2y$12$B09olxKBjzH2ayCvHxDnae2RBEKxgJpudO9fLgJHj9MXLLNKvT/2.', NULL, '2024-05-22 10:45:00', '2024-05-22 10:45:00'),
(14, 'User11', 'user11@mail.com', NULL, '$2y$12$73DIlrZDFrO2Mxk8rm/cr.nlYdTjttGEjx7sRzC.SSlFq58ap98zW', NULL, '2024-05-22 10:45:01', '2024-05-22 10:45:01'),
(15, 'User12', 'user12@mail.com', NULL, '$2y$12$HtkUQOUqQHJFnALin/uCa.RJZCMFE/9d/KCis8GYEOxYfuPraTaA.', NULL, '2024-05-22 10:45:01', '2024-05-22 10:45:01'),
(16, 'User13', 'user13@mail.com', NULL, '$2y$12$cklHAaBAU.HhGUdNcCXxiuEwg4n9yQ3XZKj0Pq4CEHZSjTeyR06be', NULL, '2024-05-22 10:45:02', '2024-05-22 10:45:02'),
(17, 'User14', 'user14@mail.com', NULL, '$2y$12$wVpm2yDzNKk6QzphINUX5.X65mr7gJhphfKffb11y.oRJRI0W8JD2', NULL, '2024-05-22 10:45:02', '2024-05-22 10:45:02'),
(18, 'User15', 'user15@mail.com', NULL, '$2y$12$8dgOjePnqYhlt8u/gtUm6.cOxnYaVeCjcLi8h8ChFlovhRZraQ3EG', NULL, '2024-05-22 10:45:03', '2024-05-22 10:45:03'),
(19, 'User16', 'user16@mail.com', NULL, '$2y$12$ogNDzOgacP1rF4awVCVU7OjvGJjhijlH6Dd4.flO1dSeBFUgg2nY2', NULL, '2024-05-22 10:45:03', '2024-05-22 10:45:03'),
(20, 'User17', 'user17@mail.com', NULL, '$2y$12$PrlSMnvyRUlCqxKSTWc.EuADsYUbMyE1lhYdKl7AJlu2nQmR//q0i', NULL, '2024-05-22 10:45:04', '2024-05-22 10:45:04'),
(21, 'User18', 'user18@mail.com', NULL, '$2y$12$gFH5itwTLTkDtHte1UTcaeIHCMeCfALYSPjBpyhcGPbZYswww1l4y', NULL, '2024-05-22 10:45:05', '2024-05-22 10:45:05'),
(22, 'User19', 'user19@mail.com', NULL, '$2y$12$oqvR8eBvqwxxkmnMIh83b.Yo0mvO0CsIlfRX7ZtypeGZh6ex0D7tS', NULL, '2024-05-22 10:45:05', '2024-05-22 10:45:05'),
(23, 'User20', 'user20@mail.com', NULL, '$2y$12$LDc3p06CmULQXI5sxXo8W.j3FvgEuSOueKNQotzAXAdnEREfOL.0a', NULL, '2024-05-22 10:45:05', '2024-05-22 10:45:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
