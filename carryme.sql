-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 02:56 PM
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
-- Database: `toneop_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_name` varchar(255) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apis`
--

INSERT INTO `apis` (`id`, `api_name`, `api_key`, `created_at`, `updated_at`) VALUES
(2, 'Razor', 'sdfsdf+6262+', '2023-05-08 05:37:15', '2023-05-08 05:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_symbol` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'Rupee', '₹', '2023-05-06 04:25:20', '2023-05-06 04:50:37'),
(2, 'Dollar', '$', '2023-05-06 04:45:55', '2023-05-06 04:45:55'),
(3, 'Indian Rupees', '₹', '2023-05-06 04:46:33', '2023-05-06 04:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `distributor_name` varchar(255) NOT NULL,
  `invite_code` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `is_admin`, `email`, `distributor_name`, `invite_code`, `start_date`, `end_date`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Carry Me', 1, 'Admin@carryme.com', '', '', '0000-00-00', '0000-00-00', '$2y$10$cfm6TvsPpNjkSAd2n2ZOi.LfDkfeYV1INVRjY8Y/HXh0b/taQ/P7G', '2023-05-09 17:11:09', '2023-05-09 17:11:09'),
(3, 'Ankita', 0, 'ankita@gmail.com', 'Ankita', '985252', '2023-05-04', '2023-05-12', '$2y$10$nzlXYKsp43k74aFGZT4k2uaXMDQQAAEDfN7bQsSMuljrJv9A6sbEm', '2023-05-13 04:02:37', '2023-05-19 05:21:34'),
(4, 'Aasif Ahmed', 0, 'aasifdev5@gmail.com', 'Aasif Ahmed', '5', '2023-05-03', '2023-05-31', '$2y$10$ajdwRh9TO1S7by1QGaWFz.V/rurwfVHZWTV0RxlgfBTdQCjUpnZWG', '2023-05-20 00:44:45', '2023-05-20 07:22:50'),
(5, 'kishan', 0, 'jwd3@infocentroidtech.com', 'kishan', 'pawar', '2023-04-01', '2023-05-20', '$2y$10$n7ncp3mCe2dtU0ZzqDqqoOnKvxupUkcVT5ePiwFhuoSD01pYOEy/i', '2023-05-20 04:59:26', '2023-05-20 04:59:26');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distributor_name` varchar(255) NOT NULL,
  `invite_code` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `distributor_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `distributor_name`, `invite_code`, `start_date`, `end_date`, `distributor_email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ajay Patil', '789', '2023-05-17', '2023-05-31', 'ajay@gmail.com', '4482', '2023-05-10 03:47:31', '2023-05-10 03:47:31');

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
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `language_photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `language_photo`, `created_at`, `updated_at`) VALUES
(1, 'russians', 'e1908d3f0dd8b620c827afb86fe91de9-russia-flag-language-icon-circle.png', '2023-05-06 06:48:45', '2023-05-08 04:20:34'),
(3, 'Arabi', '1200px-Flag_of_the_Arabic_language.svg.png', '2023-05-06 07:50:16', '2023-05-06 07:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `language_photo` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language_photo`, `code`, `created_at`, `updated_at`) VALUES
(6, 'English', 'png-clipart-logo-primera-air-organization-business-english-language-british-flag-flag-logo.png', 'en', '2023-05-13 00:56:28', '2023-05-13 00:56:28'),
(7, 'Arabi', '1200px-Flag_of_the_Arabic_language.png', 'ar', '2023-05-13 03:42:26', '2023-05-13 03:42:26'),
(8, 'Russian', 'e1908d3f0dd8b620c827afb86fe91de9-russia-flag-language-icon-circle.png', 'ru', '2023-05-13 04:30:06', '2023-05-13 04:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `luggage`
--

CREATE TABLE `luggage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `luggage_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `luggage`
--

INSERT INTO `luggage` (`id`, `luggage_name`, `created_at`, `updated_at`) VALUES
(1, 'Hardside Luggage', '2023-05-06 05:48:09', '2023-05-06 05:48:09'),
(2, 'Bags', '2023-05-06 05:48:32', '2023-05-06 06:03:40'),
(4, 'Garment Bags', '2023-05-06 06:03:21', '2023-05-06 06:03:21');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_05_03_063425_users', 1),
(5, '2023_05_03_073402_users', 2),
(6, '2023_05_03_073651_customers', 2),
(7, '2023_05_05_071655_vehicle', 3),
(8, '2023_05_05_071655_vehicles', 4),
(9, '2023_05_06_072019_premium', 5),
(10, '2023_05_06_091353_currency', 6),
(11, '2023_05_06_103646_luggage', 7),
(12, '2023_05_06_113945_languages', 8),
(13, '2023_05_08_051316_payment_setting', 9),
(14, '2023_05_08_121456_user_term', 10),
(15, '2023_05_08_131853_multi_language', 11),
(16, '2023_05_09_073141_user_limitation', 11),
(17, '2023_05_10_054007_distributors', 12),
(18, '2023_05_10_090934_customers', 13),
(19, '2023_05_10_100906_customers', 14),
(20, '2023_05_11_065859_create_language_table', 15),
(21, '2023_05_17_102658_users', 16),
(22, '2023_05_19_053909_create_push_notifications_table', 17),
(23, '2023_05_20_103415_password_reset_tokens', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'jwd3@infocentroidtech.com', 'IG8nu0G8wLSo6Y1HVHbFcYPj838DnlwsJVoIoIv9', '2023-05-20 05:05:12');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(18, 'App\\Models\\Customers', 1, 'Carry Me', 'dPG5sCNYf85NvXyKUSvsPaPPLBsNJAgwrx8XtDSV', NULL, NULL, NULL, '2023-05-15 07:48:02', '2023-05-15 07:48:02'),
(19, 'App\\Models\\Customers', 1, 'Carry Me', 'kBAl7jAklHY8I0JQZIEGhqulThQRkAF2CYpqsHN3', NULL, NULL, NULL, '2023-05-16 04:59:31', '2023-05-16 04:59:31'),
(20, 'App\\Models\\Customers', 1, 'Carry Me', 'mYDuPgDADYEB01x0yM8uEBSVLyoKbYQ2GTt7tnfK', NULL, NULL, NULL, '2023-05-16 05:44:57', '2023-05-16 05:44:57'),
(21, 'App\\Models\\Customers', 1, 'Carry Me', 'fQwyZEi0wIuk93NAHPKTYOE4SsPrQ8n5Gc5Bw74f', NULL, NULL, NULL, '2023-05-16 23:26:20', '2023-05-16 23:26:20'),
(22, 'App\\Models\\Customers', 1, 'Carry Me', 'FwrVLlIwXDznUufmnjbz13sbOLZwcrf1n8ysKUt4', NULL, NULL, NULL, '2023-05-17 04:58:09', '2023-05-17 04:58:09'),
(23, 'App\\Models\\Customers', 1, 'Carry Me', 'kSouKNOjrJvHvHcC7e94ugFR69Ih60OoqZSAq6rA', NULL, NULL, NULL, '2023-05-17 07:13:33', '2023-05-17 07:13:33'),
(30, 'App\\Models\\Customers', 1, 'Carry Me', 'cHxmwJ16hQLbDbROyS55TzzJvpEaOcjauC8OI56m', NULL, NULL, NULL, '2023-05-19 05:31:52', '2023-05-19 05:31:52'),
(31, 'App\\Models\\Customers', 1, 'Carry Me', 'JbpFoSINsoFpkxb6yM0bVtVzsjxQybFG96025aKY', NULL, NULL, NULL, '2023-05-19 23:29:52', '2023-05-19 23:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `premium_plan` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `price_invite_code` decimal(8,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `premium`
--

INSERT INTO `premium` (`id`, `premium_plan`, `currency`, `price`, `price_invite_code`, `duration`, `created_at`, `updated_at`) VALUES
(4, 'Silver', '₹', 1500.00, 750.00, 60, '2023-05-13 01:39:42', '2023-05-13 01:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `push_notifications`
--

INSERT INTO `push_notifications` (`id`, `user_type`, `message`, `created_at`, `updated_at`) VALUES
(1, 'premium_users', 'Hey You have Special Offer', '2023-05-19 00:44:50', '2023-05-19 01:19:26'),
(2, 'users_invite_code', 'kishan you have offer claim it asap', '2023-05-19 01:20:20', '2023-05-19 01:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'free',
  `lang_id` varchar(255) NOT NULL,
  `workman_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `invite_code` varchar(255) DEFAULT NULL,
  `security_date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_limitation`
--

CREATE TABLE `user_limitation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `chat_limit` int(11) NOT NULL,
  `add_offer_limit` int(11) NOT NULL,
  `swipe_limit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_limitation`
--

INSERT INTO `user_limitation` (`id`, `user_type`, `chat_limit`, `add_offer_limit`, `swipe_limit`, `created_at`, `updated_at`) VALUES
(1, 'users_invite_code', 5, 1, 3, '2023-05-09 02:34:58', '2023-05-16 06:46:39'),
(2, 'users_first_register', 8, 2, 3, '2023-05-09 02:45:52', '2023-05-16 06:46:59'),
(4, 'premium_users', 5, 2, 31, '2023-05-16 06:40:08', '2023-05-16 06:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_terms`
--

CREATE TABLE `user_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_terms`
--

INSERT INTO `user_terms` (`id`, `term_name`, `created_at`, `updated_at`) VALUES
(1, 'rfsfasdffsfsfdsfsf         sdfsfsf      term and conditions\r\ndsfsdafdsfdsfsf', '2023-05-08 07:09:41', '2023-05-13 02:10:18'),
(3, '8787', '2023-05-13 02:14:21', '2023-05-13 02:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `vehicle_photo_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_name`, `vehicle_photo_name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Auto Riksha', '00.png', 'Auto', '2023-05-19 04:04:51', '2023-05-19 04:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `luggage`
--
ALTER TABLE `luggage`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_limitation`
--
ALTER TABLE `user_limitation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_terms`
--
ALTER TABLE `user_terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apis`
--
ALTER TABLE `apis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `luggage`
--
ALTER TABLE `luggage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_limitation`
--
ALTER TABLE `user_limitation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_terms`
--
ALTER TABLE `user_terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
