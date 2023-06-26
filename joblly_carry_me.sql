-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2023 at 07:25 AM
-- Server version: 5.7.42-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joblly_carry_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `apis`
--

CREATE TABLE `apis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apis`
--

INSERT INTO `apis` (`id`, `api_name`, `api_key`, `created_at`, `updated_at`) VALUES
(2, 'Razor', 'sdfsdf+6262+', '2023-05-08 05:37:15', '2023-05-08 05:37:15'),
(4, 'Strip', '1165fs5dfs5456', '2023-05-10 16:21:56', '2023-05-10 16:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_name`, `currency_symbol`, `created_at`, `updated_at`) VALUES
(2, 'Dollar', '$', '2023-05-06 04:45:55', '2023-05-06 04:45:55'),
(3, 'Indian Rupees', '₹', '2023-05-06 04:46:33', '2023-05-06 04:46:33'),
(6, 'Nigerian Naira', '₦', '2023-05-10 16:11:13', '2023-05-10 16:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `distributor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invite_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `is_admin`, `email`, `distributor_name`, `invite_code`, `start_date`, `end_date`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Carry Me', 1, 'Admin@carryme.com', '', '', '0000-00-00', '0000-00-00', '$2y$10$cfm6TvsPpNjkSAd2n2ZOi.LfDkfeYV1INVRjY8Y/HXh0b/taQ/P7G', '2023-05-09 17:11:09', '2023-05-09 17:11:09'),
(3, 'kishan', 0, 'kishan@gmail.com', 'kishan', '65421', '2023-05-09', '2023-05-23', '$2y$10$8jBY7c7XRce2Vdiht.26e.2SGnM9R2GiU8BsY1NPi6RIIURd6Hv0e', '2023-05-10 17:02:36', '2023-05-10 17:02:36'),
(4, 'Arsh', 0, 'aasifdev5@gmail.com', 'Arsh', '9876', '2023-05-22', '2023-05-31', '$2y$10$vMyyKGJhLM3rOulJ8ja5ouG1W8g.ccV.xTBp40SyT2mQ1nDMP5crW', '2023-05-22 10:31:38', '2023-05-22 10:31:38'),
(6, 'Arsh', 0, 'aasifdevv5@gmail.com', NULL, NULL, NULL, NULL, 'Dev55', '2023-06-10 15:05:51', '2023-06-10 15:05:51'),
(7, 'uihju87yu', 0, '152@gmail.com', NULL, NULL, NULL, NULL, '123456', '2023-06-10 15:06:04', '2023-06-10 15:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `distributor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invite_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `distributor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `distributor_name`, `invite_code`, `start_date`, `end_date`, `distributor_email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'comedian 1', '4563', '2023-05-03', '2023-05-13', 'comedian@gmail.com', '4482', '2023-05-10 16:36:16', '2023-05-10 16:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language_name`, `language_photo`, `created_at`, `updated_at`) VALUES
(1, 'russian', 'e1908d3f0dd8b620c827afb86fe91de9-russia-flag-language-icon-circle.png', '2023-05-06 06:48:45', '2023-05-06 07:46:12'),
(3, 'Arabi', '1200px-Flag_of_the_Arabic_language.svg.png', '2023-05-06 07:50:16', '2023-05-06 07:50:16'),
(5, 'English', 'png-clipart-logo-primera-air-organization-business-english-language-british-flag-flag-logo.png', '2023-05-10 16:16:24', '2023-05-10 16:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language_photo`, `code`, `created_at`, `updated_at`) VALUES
(6, 'English', 'png-clipart-logo-primera-air-organization-business-english-language-british-flag-flag-logo.png', 'en', '2023-05-13 11:20:12', '2023-05-13 11:20:12'),
(7, 'Arabi', '1200px-Flag_of_the_Arabic_language.png', 'ar', '2023-05-13 11:36:40', '2023-05-13 11:36:40'),
(8, 'Russian', 'e1908d3f0dd8b620c827afb86fe91de9-russia-flag-language-icon-circle.png', 'ru', '2023-05-13 12:58:18', '2023-05-13 12:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `luggage`
--

CREATE TABLE `luggage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `luggage_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `luggage`
--

INSERT INTO `luggage` (`id`, `luggage_name`, `created_at`, `updated_at`) VALUES
(2, 'Bags', '2023-05-06 05:48:32', '2023-05-06 06:03:40'),
(4, 'Garment Bags', '2023-05-06 06:03:21', '2023-05-06 06:03:21'),
(5, 'big cartoon', '2023-05-10 16:13:55', '2023-05-10 16:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(12, '2023_05_06_113945_languages', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'jwd3@infocentroidtech.com', 'IG8nu0G8wLSo6Y1HVHbFcYPj838DnlwsJVoIoIv9', '2023-05-20 05:05:12'),
(11, 'aasifdev5@gmail.com', 'mHbNoInHQwAyscDBu8OmE5CiyXCVX1AuNzBQG8jK', '2023-06-21 17:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\Customers', 1, 'Carry Me', 'esNoD0aLLW2isO5cXrjS3Con8TckHjjQD6CNiC0P', NULL, NULL, NULL, '2023-05-15 18:10:42', '2023-05-15 18:10:42'),
(3, 'App\\Models\\Customers', 1, 'Carry Me', 'CRuAWwl9KOXU6qjbYQMutCrrOrm4K8hcEgM6J7bF', NULL, NULL, NULL, '2023-05-15 18:25:03', '2023-05-15 18:25:03'),
(4, 'App\\Models\\Customers', 1, 'Carry Me', 'GVekNvz901fUGmZIe63rPpM5tx8XYiExzfdb338H', NULL, NULL, NULL, '2023-05-15 21:29:32', '2023-05-15 21:29:32'),
(5, 'App\\Models\\Customers', 1, 'Carry Me', 'njLSLLmeyeoR0146FPtYKbA8nkEJLdOk3eAeBbka', NULL, NULL, NULL, '2023-05-15 21:31:51', '2023-05-15 21:31:51'),
(6, 'App\\Models\\Customers', 1, 'Carry Me', '7tqXFL1x7eWPUFOZ00trPHTymvoNS67MdzN98TDn', NULL, NULL, NULL, '2023-05-16 09:24:24', '2023-05-16 09:24:24'),
(7, 'App\\Models\\Customers', 1, 'Carry Me', '5092RHZE44798bxWxyLHaJx1fbQDatoHOnQcgxsx', NULL, NULL, NULL, '2023-05-16 17:01:28', '2023-05-16 17:01:28'),
(9, 'App\\Models\\Customers', 1, 'Carry Me', 'UL8UlPkDr7OJZYhwLLsUVU0p9Z6g2mzUsiAoF3Yj', NULL, NULL, NULL, '2023-05-16 18:31:40', '2023-05-16 18:31:40'),
(10, 'App\\Models\\Customers', 1, 'Carry Me', 'fUu8tq2luTd83in4XOVBUIWruLjDmj6PEpYgA3AO', NULL, NULL, NULL, '2023-05-17 10:02:03', '2023-05-17 10:02:03'),
(14, 'App\\Models\\Customers', 3, 'kishan', '9lCyeJdAkaX8tc3fGyKl5M304XP9pxNIPTnZhtkU', NULL, NULL, NULL, '2023-05-17 10:49:47', '2023-05-17 10:49:47'),
(15, 'App\\Models\\Customers', 1, 'Carry Me', 'VHz3HQoMdum8861xjAN7eshhnCt3dANCqXt0ODGV', NULL, NULL, NULL, '2023-05-17 11:46:18', '2023-05-17 11:46:18'),
(16, 'App\\Models\\Customers', 1, 'Carry Me', 'OTD6RwnAqlIzSHKcpnyhlOpz9IwHMjt6NAGbsnhq', NULL, NULL, NULL, '2023-05-17 15:40:55', '2023-05-17 15:40:55'),
(17, 'App\\Models\\Customers', 1, 'Carry Me', 'Umjdag8ltinVrdAcvqL1F2kEywCevfJwGZcUmJRt', NULL, NULL, NULL, '2023-05-19 14:29:29', '2023-05-19 14:29:29'),
(19, 'App\\Models\\Customers', 1, 'Carry Me', 'F6d8kM2hlZ9DddVWap85UKvgJ1CpVTVQIu9TEASp', NULL, NULL, NULL, '2023-05-20 21:26:17', '2023-05-20 21:26:17'),
(20, 'App\\Models\\Customers', 1, 'Carry Me', 'JeY1BqyWwqSkVJm7yZuyNcx6oARuYM9AhZcG3MOi', NULL, NULL, NULL, '2023-05-20 21:30:55', '2023-05-20 21:30:55'),
(21, 'App\\Models\\Customers', 1, 'Carry Me', '13PmTQWuK19a2VJl2bvGWzF4JGa9NAZQefVLPcR2', NULL, NULL, NULL, '2023-05-22 10:29:58', '2023-05-22 10:29:58'),
(23, 'App\\Models\\Customers', 1, 'Carry Me', 'Nw65v4jveUsygSo0yDp9zeXPhuOhMVIAKcWynb8G', NULL, NULL, NULL, '2023-05-23 16:44:57', '2023-05-23 16:44:57'),
(24, 'App\\Models\\Customers', 1, 'Carry Me', 'TPFRjU8bSGlArpx1RI8arKwIY4SWLRLr2s4fWdfy', NULL, NULL, NULL, '2023-05-23 16:55:12', '2023-05-23 16:55:12'),
(25, 'App\\Models\\Customers', 1, 'Carry Me', 'VC5131Bv3lDYQH5O8IFrfgajDMLDbAURwgyn3sij', NULL, NULL, NULL, '2023-05-23 16:57:34', '2023-05-23 16:57:34'),
(29, 'App\\Models\\Customers', 1, 'Carry Me', 'dT2BJSZiQNHSBImyxlfneLq9IgL4FeIj1ldyObCj', NULL, NULL, NULL, '2023-06-12 11:38:51', '2023-06-12 11:38:51'),
(30, 'App\\Models\\Customers', 1, 'Carry Me', 'hTAVN9XfILKUzP1Ya8iBfkkYOucqnxqFVXozqjaj', NULL, NULL, NULL, '2023-06-16 14:03:27', '2023-06-16 14:03:27'),
(31, 'App\\Models\\Customers', 1, 'Carry Me', 'do5iZcLxa1JqsdMtiQ92qrDPf3r2OhwakPdhHSWm', NULL, NULL, NULL, '2023-06-22 16:50:11', '2023-06-22 16:50:11');

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `premium_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, 'Silver', '₹', 1500.00, 750.00, 60, '2023-05-13 01:39:42', '2023-05-13 01:55:32'),
(5, 'GOLD', '₦', 499.00, 399.00, 45, '2023-05-13 13:00:24', '2023-05-13 13:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `push_notifications`
--

INSERT INTO `push_notifications` (`id`, `user_type`, `message`, `created_at`, `updated_at`) VALUES
(1, 'users_invite_code', 'Hey You have Special Offer', '2023-05-19 00:44:50', '2023-05-19 14:30:54'),
(2, 'users_first_register', 'kishan you have offer claim it asap', '2023-05-19 01:20:20', '2023-05-19 14:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `lang_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workman_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invite_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remainder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_date` date DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_limitation`
--

CREATE TABLE `user_limitation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'users_invite_code', 5, 1, 3, '2023-05-09 02:34:58', '2023-05-16 17:28:59'),
(2, 'users_invite_code', 8, 2, 3, '2023-05-09 02:45:52', '2023-05-16 17:29:24'),
(4, 'all', 2, 10, 1, '2023-05-10 16:31:39', '2023-05-16 17:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_terms`
--

CREATE TABLE `user_terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_terms`
--

INSERT INTO `user_terms` (`id`, `term_name`, `created_at`, `updated_at`) VALUES
(1, 'Subject to the terms and conditions specified herein, the Site offers Users information regarding us and our programs. The Site also offers Users the possibility of accessing video content, obtaining information about the programs, communicating through c', '2023-05-08 07:09:41', '2023-05-08 07:09:41'),
(2, 'Certain of our Services, including signing up for updates regarding our programs or participating in certain functions provided by the Site, require Users to provide personal data, as detailed in our Privacy Policy. If you wish to obtain information regarding the Services, we may direct you away from the Site to a third-party site.', '2023-05-08 18:05:23', '2023-05-08 18:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nick_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ride_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `departure_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destination_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_price` decimal(32,2) DEFAULT NULL,
  `luggage_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_name`, `nick_name`, `vehicle_photo_name`, `ride_type`, `transport_type`, `seats`, `departure_address`, `destination_address`, `currency`, `fixed_price`, `luggage_type`, `description`, `created_at`, `updated_at`) VALUES
(2, 'car', 'cargo', 'Mahindra-Scorpio-N-300620221053.jpg', 'car', NULL, 8, 'burhanpur', 'indore', '', 3500.00, '5', 'car', '2023-05-08 15:10:50', '2023-06-16 14:04:15'),
(5, 'Auto', 'riksha', '00.png', 'auto', NULL, 4, 'indore', 'burhanpur', '', 5000.00, '2', 'auto', '2023-05-13 11:45:26', '2023-06-16 14:10:08'),
(6, NULL, NULL, 'platine.png', 'bike', 'passebger', 2, 'indore', 'rau', '', NULL, 'bags', 'indore to rau', '2023-06-21 14:47:25', '2023-06-21 14:47:25'),
(7, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/cf73243e-dc5b-421d-820d-157c402cb020.jpg', 'car', 'passenger', 4, 'sdffdsfdfds', 'sdfsdf', '', NULL, 'Bag', 'asdsfsafafsfsa', '2023-06-22 09:40:56', '2023-06-22 09:40:56'),
(8, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/54e9ea27-4cb4-4435-9c59-6a131a362402.jpg', 'Car', 'Passenger', 4, 'Rewdf', 'Rrdff', '', NULL, 'Bags', 'Wwdd', '2023-06-22 10:28:59', '2023-06-22 10:28:59'),
(9, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/a10b1e48-864a-4b76-82af-9e969d7822ee.jpg', 'Bicycle', 'Passenger', 2, 'Hii', 'Hii', '', NULL, 'Bags', 'Hii', '2023-06-23 17:11:20', '2023-06-23 17:11:20'),
(10, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/958051f5-7441-41db-91f7-5ce582a2c44f.jpg', 'Car', 'Passenger', 4, 'Dhanbad', 'Ranchi', '', NULL, 'big cartoon', 'Nice', '2023-06-23 17:20:05', '2023-06-23 17:20:05'),
(11, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/7d92e7a1-007c-4a25-b139-e0ce0ebb5a96.jpg', 'Motorbike', 'Passenger', 2, 'Delhi', 'Noida', '', NULL, 'Garment Bags', 'Hii', '2023-06-23 17:27:35', '2023-06-23 17:27:35'),
(12, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/3f54ed71-89e8-47ab-aa08-8e7d181c7293.jpg', 'Truck', 'Passenger', 4, 'Ranchi', 'Patna', '', 1300.00, 'Garment Bags', 'Hii', '2023-06-23 17:30:59', '2023-06-23 17:30:59'),
(13, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/d572f652-4e10-40df-9309-a86e5807102a.jpg', 'Bicycle', 'Passenger', 2, 'Patna', 'Ranchi', NULL, 1500.00, 'Bags', 'Hii', '2023-06-23 17:35:14', '2023-06-23 17:35:14'),
(14, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/f0787093-2269-4ce8-8f37-a2f19c062f88.jpg', 'Bicycle', 'Passenger', 3, 'Def', 'Ds', NULL, 1400.00, 'Bags', 'Fii', '2023-06-23 17:36:23', '2023-06-23 17:36:23'),
(15, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/fe5d3a17-96c1-49ab-a750-1e4484311385.jpg', 'Car', 'Passenger', 3, 'Gredd', 'Dhhg', 'Dollar', 455.00, 'big cartoon', 'Fii', '2023-06-23 17:39:51', '2023-06-23 17:39:51'),
(16, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/675b2c33-948b-46e7-8823-6d4addb5eb51.jpg', 'Bicycle', 'Passenger', 2, 'New', 'York', '$', 15.00, 'Garment Bags', 'Hii', '2023-06-23 17:44:46', '2023-06-23 17:44:46'),
(17, NULL, NULL, 'file:///storage/emulated/0/Android/data/com.toneop/files/Pictures/c2dd30c7-a76a-4466-b379-5269bffe485c.jpg', 'Tricycle', 'Passenger', 3, 'Trfghj', 'Gedhj', '₦', 8000.00, 'big cartoon', 'Reshhj', '2023-06-23 17:56:38', '2023-06-23 17:56:38'),
(18, NULL, 'kishan', '/tmp/phpc5x8q0', 'bike', 'passebger', 2, 'indore', 'rau', '$', 7500.00, 'bags', 'indore to rau', '2023-06-24 13:07:21', '2023-06-24 13:07:21');

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `luggage`
--
ALTER TABLE `luggage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
